<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Redis;

//use Illuminate\Redis;
use Illuminate\Support\Facades\Redis;
//use Predis\Command\Redis;
//use Redis;
//use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function index()
    {

        Redis::set('user','rox2');
        Redis::del('user');
        return response(Redis::get('user'),200);
    }

    public function sendLink(Request $request)
    {

        $request->validate([
//            'email'=> 'required|email|exists:users,email'
            'email'=> 'required'
        ]);


        try {
            $token=\Str::random(64);
//            Redis::set($request->email,$token);

            $link = route('user_reset_password_form',['token'=>$token, 'email'=>$request->email]);
            $body = '';
//            Mail::send([‘text’=>’text.view’], $data, $callback);
            \Mail::send('email_forgot',['link'=>$link, 'body'=> $body],function ($mesage) use ($request){
                $mesage->from('noreply@webagent.ir', 'webagent');
                $mesage->to($request->email, 'roxana')
                    ->subject('reset password');

            });
            return 'ok';
        }catch (\Exception $exception){
            return $exception;
        }
//        return back()->with('success','password reset link has been sent to your email!');
    }

}
