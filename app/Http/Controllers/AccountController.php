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

    public function getResetPass(){
        return view('accounts/resetPass');
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
        $icon = $request->file('avatar')->store('users_avatar', 'public');
        $user->avatar = $icon;
        $user->save();

        return redirect('account/');
    }

    public function updatePass(Request $request, $id){
        $user = WebNote\User::find($id);
        if (strcmp($user->password, $request->pass)){
            $user->password = bcrypt($request->password);
            $user->save();
            //TODO ajouter texte a la vole pour la page de resultat
            return view('accounts/resultatChangePass');
        }
        else{
            return redirect('account/');
        }


    }
}