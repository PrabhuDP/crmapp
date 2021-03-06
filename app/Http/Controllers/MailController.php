<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CommonHelper;
use Auth;use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;
use DB;

class MailController extends Controller
{
    public function sendMail()
    {
        try
        {
            //Set mail configuration
            CommonHelper::setMailConfig();

            $data = ['name' => "Virat Gandhi"];

            $body = [
                    'content' => 'test content of the crm by durariaj'
                ];
            $send_mail = new TestEmail($body);
            // return $send_mail->render();
            Mail::to('duraibytes@gmail.com')->send($send_mail);


            // Mail::send(['text' => 'mail'], $data, function ($message)
            // {
            //     $message->to('duraibytes@gmail.com', 'Lorem Ipsum')
            //         ->subject('Laravel Basic Testing Mail');
            //     $message->from('durairajnet@gmail.com', $data['name']);
            // });
            // echo 'Test email sent successfully';
            // return redirect()->back()->with('success', 'Test email sent successfully');
        }
        catch(\Exception $e)
        {
            dd( $e->getMessage() );
            // return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
