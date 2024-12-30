<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\ContactReply;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function showContacts()
    {
        $contacts = Contact::latest()->paginate(10); // Paginate to display messages in manageable chunks
        return view('admin.contacts.index', compact('contacts'));
    }

    // View a specific contact message
    public function viewContact($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contacts.view', compact('contact'));
    }

    // Reply to a contact message
    public function replyContact(Request $request, $id)
    {
    $contact = Contact::findOrFail($id);
    $replyMessage = $request->input('reply');

    // Send email
    Mail::to($contact->email)->send(new ContactReply($replyMessage));

    return redirect()->route('admin.contacts.view', $id)
                     ->with('success', 'Reply sent successfully.');
    }



    public function newsletterList()
    {
        $newsletters = Newsletter::latest()->get();
        return view('admin.newsletters.index', compact('newsletters'));
    }

    // Show the form to send newsletters
    public function sendNewsletterForm()
    {
        return view('admin.newsletters.send');
    }

    // Send newsletters to all subscribers
    public function sendNewsletter(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $subscribers = Newsletter::all();
        foreach ($subscribers as $subscriber) {
            Mail::send('emails.newsletter', ['messageBody' => $request->message], function ($message) use ($subscriber) {
                $message->to($subscriber->email)->subject('Newsletter from LinkrVibe');
            });
        }

        return redirect()->route('admin.newsletters.index')->with('success', 'Newsletter sent to all subscribers successfully!');
    }
}
