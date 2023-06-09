<?php

namespace App\Http\Controllers;

use App\Helpers\NotificationHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\ContactMail;
use App\Models\NewsletterContact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    /**
     * POST
     */
    public function sendContactUs(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'message' => 'required'
            ]);

            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($request->all(), 'contactUs','Contact Us: Linig-on!'));

            Session::flash('sent-contact-success', 'Thank you for contacting us! we will contact you shortly.');
            return redirect()->back();
        } catch (ValidationException $th) {
            Session::flash('sent-contact-error', 'Please fill in all of the required fields.');
            return redirect()->back();
        }
    }

    /**
     * POST
     */
    public function subscribeToNewsletter(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
            ]);

            if (DB::table('newsletter_contacts')->where('email', $request->input('email'))->first() == null) {
                NewsletterContact::create($request->all());
            }

            Mail::to($request->input('email'))->send(new ContactMail($request->all(), 'newsletter', 'Subscribed to Newsletter: Linig-on!'));

            // send notification
            if (Auth::check()) {
                NotificationHandler::createOnSubscribeToNewsletter(Auth::user()->id);
            }

            Session::flash('sent-newsletter-success', 'Thank you for contacting us! we will contact you shortly.');
            return redirect()->back();
        } catch (ValidationException $th) {
            Session::flash('sent-newsletter-error', 'Please fill in all of the required fields.');
            return redirect()->back();
        }
    }
}
