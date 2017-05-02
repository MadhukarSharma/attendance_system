<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
use App\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Input;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::all();
        return view('admin.contact.index')->withcontacts($contact);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        // $data = $request->all();
        // dd($data);
        $contact = new Contact;
        $contact->name    = $request->name;
        $contact->email   = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;

        // dd($contact->name);
        $contact->save();
        return redirect()->route('contact.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function mail_reply($id)
    {
        $contact = Contact::findorfail($id);
        // dd($contact);

        return view('admin.contact.mail_reply',compact('contact'));
    }

    public function send_email(Request $request)
    {
        $data = [

            'email_from'        => $request->email_from,
            'email_to'          => $request->email_to,
            'subject'           => $request->subject,
        ];

       Mail::send('admin.contact.mail', $data, function($message) use($data){

        $message->from($data['email_from']);
        $message->to($data['email_to']);
        $message->subject($data['subject']);

       });
    }

}
