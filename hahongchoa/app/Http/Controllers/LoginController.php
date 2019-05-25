<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Socialite;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $check = User::where(function ($query) use ($request) {
            $query->where('email', '=', $request->mail)
                ->where('password', '=', $request->pass);
        })->first();

        if ($check) {
            Auth::login($check);
            return redirect('/managerroom');
        } else {
            return redirect('/login')->withErrors('loginfail', 'ไม่มีข้อมูลในระบบ');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Response
     */
    public function destroy(User $user)
    {
        //


    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function loginsocial($provider)
    {


        return Socialite::driver($provider)->redirect();
    }


    public function Callback($provider)
    {
        $userSocial = Socialite::driver($provider)->stateless()->user();
//        $userSocial = Socialite::driver($provider)->stateless()->user();
//        $users = User::where(['email' => $userSocial->getEmail()])->first();


        $username = $userSocial->name;
        $email = $userSocial->email;
        $token = $userSocial->token;


        $chk_user = User::where('email', '=', $email)->first();

//        return $userSocial;

        if ($chk_user) {

            Auth::login($chk_user);
            return redirect('/managerroom');


        } else {
            $Adduser = new User();
            $Adduser->email = $email;
            $Adduser->username = $username;
            $Adduser->password = null;
            $Adduser->telephone = null;
            $Adduser->remember_token = $token;
            $Adduser->url_facebook = null;
            $Adduser->line_qrcode = null;
            $Adduser->save();

            Auth::login($chk_user);
            return redirect('/managerroom');
        }


//

//        dd($userSocial);
//
//        if ($users) {
//            Auth::login($users);
//            return redirect('/');
//        } else {
//
//            $user = User::create([
//                'name' => $userSocial->getName(),
//                'email' => $userSocial->getEmail(),
//                'image' => $userSocial->getAvatar(),
//                'provider_id' => $userSocial->getId(),
//                'provider' => $provider,
//            ]);
//            return $user;

//            return redirect()->route('home');
//        }
    }


}
