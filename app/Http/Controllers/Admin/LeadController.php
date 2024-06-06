<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::paginate(8);
        return view('admin.leads.index', compact('leads'));
    }

    public function generateReply(Lead $lead)
    {


        // perform an HTTP request to the GPT-4 endpoint
        $response = Http::withToken(env('OPENAI_SECRET_API_KEY'))->post(env('OPENAI_CHAT_API_ENDP'), [
            'model' => 'gpt-4o-2024-05-13',
            'temperature' => 1,
            'max_tokens' => 300,
            'messages' => [
                [
                    'role' => 'system',
                    'content' => "You are PortyAI, my assistant. Tour main task is to provide a reply message to my lead's enquiry. 
                    You will be provided the message's content and you must return a reply and nothing else."
                ],
                [
                    'role' => 'user',
                    'content' => $lead->message . 'Reply: '
                ]
            ]
        ]);

        // dd($response->json());

        // handle the response 
        if ($response->successful()) {

            // get the generated message
            $replyMessage = $response->json()['choices'][0]['message']['content'];


            // update the given model with the generated message
            $lead->reply = $replyMessage;
            $lead->save();

            // redirect the user back to the leads message index page
            return to_route('admin.leads.index')->with('message', "Hi, PortyAI here. Your reply message has been generated succesfully!");
        } else {
            return redirect()->back()->with('error', 'Failed to generate reply message');
        }
    }
}
