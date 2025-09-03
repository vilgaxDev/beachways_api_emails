<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactSubmission;
use App\Mail\ContactSubmissionMail;
use App\Mail\UserConfirmationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Log the incoming request for debugging
        Log::info('Contact form submission received:', $request->all());
        
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'company' => 'required|string|max:255',
            'message' => 'nullable|string',
            'packageType' => 'required|string|in:A,B,C,D,E,F',
            'selectedPackage.name' => 'required|string',
            'selectedPackage.price' => 'required|string',
            'selectedPackage.description' => 'required|string',
            'contactNumber' => 'required|string',
            'submittedAt' => 'required|string',
        ]);

        if ($validator->fails()) {
            Log::error('Validation failed:', $validator->errors()->toArray());
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Get selectedPackage data properly
            $selectedPackage = $request->input('selectedPackage', []);
            
            // Save to DB with explicit field mapping
            $submission = ContactSubmission::create([
                'first_name' => $request->input('firstName'),
                'last_name' => $request->input('lastName'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'company' => $request->input('company'),
                'message' => $request->input('message', ''), // Default empty string if null
                'package_type' => $request->input('packageType'),
                'package_name' => $selectedPackage['name'] ?? 'Unknown Package',
                'package_price' => $selectedPackage['price'] ?? 'Unknown Price',
                'package_description' => $selectedPackage['description'] ?? 'No description',
                'contact_number' => $request->input('contactNumber'),
                'submitted_at' => $request->input('submittedAt'),
            ]);

            Log::info('Contact submission saved successfully:', ['id' => $submission->id]);

            // Send emails
            try {
                Mail::to('info@beachwaysgroup.com')->send(new ContactSubmissionMail($request->all()));
                Mail::to($request->email)->send(new UserConfirmationMail($request->all()));

                Log::info('Emails queued successfully');
            } catch (\Exception $e) {
                Log::error('Email sending failed:', ['error' => $e->getMessage()]);
                return response()->json([
                    'message' => 'Booking saved, but email sending failed.',
                    'error' => $e->getMessage()
                ], 500);
            }

            return response()->json([
                'message' => 'Booking saved and emails queued successfully!',
                'submission_id' => $submission->id
            ], 200);

        } catch (\Exception $e) {
            Log::error('Database error:', [
                'error' => $e->getMessage(),
                'request_data' => $request->all()
            ]);
            
            return response()->json([
                'message' => 'Database error occurred.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getAllSubmissions()
    {
        try {
            $submissions = ContactSubmission::orderBy('created_at', 'desc')->get();

            return response()->json([
                'message' => 'All submissions fetched successfully!',
                'data' => $submissions
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching submissions:', ['error' => $e->getMessage()]);
            
            return response()->json([
                'message' => 'Error fetching submissions.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}