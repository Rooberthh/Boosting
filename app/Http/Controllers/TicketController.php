<?php

namespace App\Http\Controllers;

use App\Mail\SupportTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    public function index()
    {
        return view('support.index');
    }

    public function create()
    {
        request()->validate([
            'name' => ['required'],
            'from' => ['required', 'email'],
            'body' => ['required']
        ]);

        $data = [
            'name' => request('name'),
            'from' => request('from'),
            'body' => request('body')
        ];


        Mail::to('us@example.com')->send(new SupportTicket($data));

        return response('Mail has been sent', 200);

    }

}
