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
use Illuminate\Support\Facades\Hash;

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

    public function overview(Request $request, $id){
        $user = WebNote\User::find($id);

        return view('accounts/accountOverview', compact('user'));
    }

    public function getResetPass(){
        return view('accounts/resetPass');
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
        if(Hash::check($request->pass, $user->password))
        {
            $request->user()->fill(['password' => Hash::make($request->password)])->save();
            $resultat = "Mot de passe changer avec succès !";
        }
        else{
            $resultat = "Ancien mot de passe incorrect ! Le mot de passe n'est pas changé !";
        }
        return view('accounts/resultatChangePass', compact('resultat'));
    }
}