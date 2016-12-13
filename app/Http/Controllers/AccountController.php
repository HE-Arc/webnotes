<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 21.11.16
 * Time: 13:56
 */

namespace WebNote\Http\Controllers;


use Illuminate\Http\Request;
use WebNote;
use WebNote\User;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewAccount(){
        return view ('accounts/account');
    }

    public function accountSettings(){
        return view('accounts/accountSetting');
    }

    public function overview(){
        return view('accounts/accountOverview');
    }

    public function deleteAccount(){
        return view('accounts/deleteAccount');
    }

    public function getHelp(){
        return view('accounts/help');
    }

    public function update(Request $request, $id){
        $user = WebNote\User::find($id);
        $inputs = array_filter($request->except(['_token']));
        $user->update($inputs);
        $icon = $request->file('avatar');
        if($icon != null){
            $icon->store('users_avatar', 'public');
            $user->avatar = $icon;
        }
        $user->save();

        /*if($request->name != null){
            $notes = WebNote\user()->notes();
            foreach($notes as $element){
                $element->auteur = $request->name;
                $element->save();
            }
        }*/


        return redirect('account/');
        //return $request->file('avatar');
    }
}