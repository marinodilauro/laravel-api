<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\NewLeadMessage;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->all();

        // validate
        $val_data = Validator::make($data, [
            'name' => 'required|max:70',
            'email' => 'required|email|max:70',
            'message' => 'required'
        ]);

        // return response json with errors if the validator fails
        if ($val_data->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $val_data->errors()
            ]);
        }

        $newLead = Lead::create($data);

        try {
            $newLead = Lead::create($data);

            // send the email with error handling
            try {
                Mail::to('dilamar900@gmail.com')->send(new NewLeadMessage($newLead));
                Log::info('Email sent successfully for lead: ' . $newLead->id);
            } catch (\Exception $e) {
                Log::error('Failed to send email: ' . $e->getMessage());
                return response()->json([
                    'success' => false,
                    'message' => 'Message saved but email delivery failed'
                ], 500);
            }

            return response()->json([
                'success' => true,
                'message' => 'Email sent successfully!'
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to create lead: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to process request'
            ], 500);
        }
    }
}
