<?php

namespace App\Http\Controllers;

use App\Register;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('auth.manager-register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $email = $request->inputEmail;
        $pass = $request->password;
        $username = $request->usersurname;
        $phone = $request->telphone;
        $urlfacebook = $request->urlfacebook;
        $linelink = $request->linelink;
        $hashpass = md5($pass);

//        DB::table('user')->insert([
//            'username' => $username,
//            'password' => $pass,
//            'telephone' => $phone,
//            'remember_token' => $hashpass,
//            'email' => $email
//        ]);
        $Adduser = new User();
        $Adduser->email = $email;
        $Adduser->username = $username;
        $Adduser->password = $pass;
        $Adduser->telephone = $phone;
        $Adduser->remember_token = $hashpass;
        $Adduser->url_facebook = $urlfacebook;
        $Adduser->line_qrcode = $linelink;
        $Adduser->save();


        return redirect('/login')->with('success');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Register $register
     * @return \Illuminate\Http\Response
     */
    public function show(Register $register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Register $register
     * @return \Illuminate\Http\Response
     */
    public function edit(Register $register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Register $register
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Register $register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Register $register
     * @return \Illuminate\Http\Response
     */
    public function destroy(Register $register)
    {
        //
    }
}
