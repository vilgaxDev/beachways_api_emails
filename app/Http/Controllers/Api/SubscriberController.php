<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Jobs\SendSubscriptionConfirmationEmail;

class SubscriberController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email'
        ]);

        $subscriber = Subscriber::create([
            'email' => $request->email
        ]);

        // Dispatch job to send confirmation email
        
        SendSubscriptionConfirmationEmail::dispatch($subscriber);

        return response()->json(['message' => 'Thank you for subscribing! Check your email for a confirmation.'], 201);
    }

    public function index()
    {
        return Subscriber::all();
    }
}
