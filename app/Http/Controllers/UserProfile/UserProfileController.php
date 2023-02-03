<?php

namespace App\Http\Controllers\UserProfile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class UserProfileController extends Controller
{
    public function retrieveAllUsers(Request $request, Response $res)
    {
        $result = (array)DB::select("SELECT * FROM users WHERE intMemberId = ?", [$request->input('intMemberId')]);
        if (isset($result[0])) {
            return $result[0];
        }
        return $result;
    }

    public function addNewDepartment(Request $req)
    {
        $rowsAffected = DB::insert("INSERT INTO departments (intDepartmentHead, strDepartmentName) VALUES (?, ?)", [$req->input('user'), $req->input('department')]);

        return ['rows' => $rowsAffected];
    }

    public function newUser(Request $req, Response $res)
    {

        DB::insert('INSERT INTO users (strFullName, gender, dteDOB) VALUES (?, ?, ?)', [
            $req->input('name'), $req->input('gender'), $req->input('dob')
        ]);
        return ["status" => 200, "message" =>  $req->input('name') . "was successfully created"];
    }
}
