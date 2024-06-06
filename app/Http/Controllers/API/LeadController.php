<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\NewLeadMessage;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

        // send the email
        Mail::to('marinodilauro@email.com')->send(new NewLeadMessage($newLead));

        // return the response
        return response()->json([
            'success' => true,
            'message' => 'Email sent!'
        ]);
    }
}
