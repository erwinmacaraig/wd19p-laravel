<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function insertUser()
    {
        DB::insert('INSERT INTO users (strFullName, gender, dteDOB) VALUES (?, ?, ?)', [
            "Juan dela Cruz", "M", "1989-01-06"
        ]);


        return "<h1>Added New Record</h1>";
    }
    public function retrieveAllUsers()
    {
        $results = DB::select('SELECT * FROM users'); // stdClass         
        // return (array)$results;
        return view('users.all-users')->with('users', $results);
    }

    public function editUser(int $member)
    {
        $u = DB::select("SELECT * FROM users WHERE intMemberId = ?", [$member]);
        return view('users.edit-user-form')->with('u', $u[0]);
    }

    public function updateUser(Request $request)
    {
        $intMemberId = $request->input('intMemberId');
        $name = $request->input('full-name');
        $gender = $request->input('gender');
        $dob = $request->input('dob');
        DB::update("UPDATE users SET strFullName = ?, gender = ?, dteDOB = ? WHERE intMemberId = ?", [$name, $gender, $dob, $intMemberId]);

        return redirect()->route('allUsers');
    }
}
