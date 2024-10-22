<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmailJob;
use Mail;
use App\Models\EmailLog;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $emailData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ];

        try {
            SendEmailJob::dispatch($emailData)->onQueue('emails');
            return redirect()->back()->with('success',"Email Send Successfully !....");
        } catch (\Exception $e) {
            return redirect()->back()->with('failure', 'Failed to send email. Please try again later.');
        }

    }

    public function viewEmailLogs()
    {
        $emailLogs = EmailLog::all();
        return view('email-logs', compact('emailLogs'));
    }

    public function welcome()
    {
        return view('welcome');
    }

}
