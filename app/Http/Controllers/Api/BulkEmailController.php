<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BulkEmailController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'recipients' => 'required|array',
            'recipients.*' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        \App\Jobs\SendBulkEmail::dispatch(
            $validated['recipients'],
            $validated['subject'],
            $validated['message']
        );

        return response()->json([
            'message' => 'Bulk email dispatch has been queued successfully.'
        ]);
    }
}
