<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 21.11.16
 * Time: 13:56
 */

namespace WebNote\Http\Controllers;


class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function testAccount(){
        return view('notes.note');
    }

    public function viewAccount(){

        $title = 'Compte';

        return view ('accounts/account', ['title' => $title]);
    }
}