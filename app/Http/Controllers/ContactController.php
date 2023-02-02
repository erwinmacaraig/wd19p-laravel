<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $companies = array(
            1 => ['name' => "ABC", 'contact' => 1],
            2 => ['name' => "DEF", 'contact' => 2]
        );

        return view('contacts.contact-list')->with('companies', $companies);
    }
}
