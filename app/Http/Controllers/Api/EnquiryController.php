<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function index()
    {
        return Enquiry::orderBy('created_at', 'desc')->get();
    }

    public function store(Request $request)
    {
        try {
            \Log::info('Enquiry submission attempt', ['data' => $request->all()]);
            
            $validated = $request->validate([
                'property_id' => 'nullable|string',
                'property_title' => 'nullable|string',
                'property_url' => 'nullable|string',
                'customer_name' => 'required|string',
                'customer_email' => 'required|email',
                'customer_phone' => 'required|string',
                'message' => 'required|string',
            ]);

            $enquiry = Enquiry::create($validated);
            
            \Log::info('Enquiry created successfully', ['id' => $enquiry->id]);

            // Send Emails
            try {
                \Illuminate\Support\Facades\Mail::to('test@ardhiworth.co.ke')->send(new \App\Mail\EnquiryAdminMail($enquiry));
                \Illuminate\Support\Facades\Mail::to($enquiry->customer_email)->send(new \App\Mail\EnquiryCustomerMail($enquiry));
                \Log::info('Enquiry emails sent successfully');
            } catch (\Exception $e) {
                \Log::error('Failed to send enquiry emails', ['error' => $e->getMessage()]);
                // We still return 201 because the enquiry was saved
            }
            
            return response()->json($enquiry, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation failed', ['errors' => $e->errors()]);
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            \Log::error('Enquiry creation failed', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['error' => 'Failed to create enquiry'], 500);
        }
    }

    public function update(Request $request, Enquiry $enquiry)
    {
        $validated = $request->validate([
            'status' => 'sometimes|string',
            'reply' => 'sometimes|string',
        ]);

        $enquiry->update($validated);
        return $enquiry;
    }

    public function destroy(Enquiry $enquiry)
    {
        $enquiry->delete();
        return response()->noContent();
    }
}
