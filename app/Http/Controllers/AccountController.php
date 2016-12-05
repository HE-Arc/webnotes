<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 21.11.16
 * Time: 13:56
 */

namespace WebNote\Http\Controllers;


use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewAccount(){

        $title = 'Account';

        return view ('accounts/account');
    }

    public function accountSettings(){
        return view('accounts/accountSetting');
    }

    public function overview(){
        return "Overview";
    }

    public function deleteAccount(){
        return view('accounts/deleteAccount');
    }

    public function getHelp(){
        return view('accounts/help');
    }

    public function update(Request $request, $id){

    }
}