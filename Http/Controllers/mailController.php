<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Mail\FormMail;

use Illuminate\Http\Request;

class mailController extends Controller
{
public function open_form()
{
return view('Mails/Mail_form');
}

public function send_mail(Request $req){
    $emails = [
    'email' => $req->get('email'),
    'cc' => $req->get('cc'),
    'bcc' => $req->get('bcc')
    ];

    $details = [
    'subject' => $req->get('subject'),
    'body' => $req->get('details')
    ];


     $attachments = $req->file('attachment');


        $attachmentPaths = [];


        if ($attachments) {
            foreach ($attachments as $attachment) {

                $attachmentPath = $attachment->store('temp');


                $attachmentFullPath = Storage::path($attachmentPath);


                $attachmentPaths[] = $attachmentFullPath;
            }
        }


        Mail::to($emails['email'])->cc($emails['cc'])->send(new FormMail($details, $attachmentPaths));

//deleting temp
        if (!empty($attachmentPaths)) {
            Storage::delete($attachmentPaths);
        }

        return redirect('mail_form')->with('status', 'Email Sent Successfully!');
    }
}