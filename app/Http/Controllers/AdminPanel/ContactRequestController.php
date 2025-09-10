<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\ContactRequest;

class ContactRequestController extends Controller
{
    public function index()
    {
        $contacts = ContactRequest::orderBy('created_at', 'desc')->get();
        return view('admin-panel.contact.index', compact('contacts'));
    }
}
