<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use App\Models\utente;

class LoginController extends BaseController
{
    public function signup() 
    {
        if(Session::get('user_id'))
        {
            return redirect('home');
        }
        
        $error = Session::get('error');
        Session::forget('error');
        return view('signup')->with('error', $error);
    }

    public function do_signup()
    {
        if(Session::get('user_id'))
        {
            return redirect('home');
        }
        // validare i dati (in caso tornare al form)
        if(strlen(request('Nome_Utente')) == 0 || strlen(request('Password')) == 0 || strlen(request('Nome')) == 0 || strlen(request('Cognome')) == 0)
        {
            // Session::put('error', 'empty_fields'); //informati meglio 
            return redirect('signup')->withInput();
        }
        // else if 
        else if(utente::where('id', request('Nome_Utente'))->first()) //sostituisco username con id prima del req
        {
            // Session::put('error', 'existing');
            return redirect('signup')->withInput();            
        }
        else if(request('Password') != request('Conferma_Password'))
        {
            return redirect('signup')->withInput();
            // return $error;
            // return "ok";
        }
        
        // creazione utente
        $utente = new utente;
        $utente->nome = request('Nome');
        $utente->cognome = request('Cognome');
        $utente->email = request('Email');
        // 
        $utente->id = request('Nome_Utente'); 
        // 
        $utente->password = password_hash(request('Password'), PASSWORD_BCRYPT);
        $utente->data_nascita = request('Data_Nascita');
        $utente->sesso = request('genere');
        $utente->paese = request('Paese');
        $utente->n_telefono = request('n_telefono');
        $utente->avatar = request('fileToUpload');
        $utente->save();
        // effettuare login in automatico
        Session::put('user_id', $utente->id);
        Session::put('avatar', $utente->avatar);
        // redirect to home
        return redirect('home');
        // return Session::get('user_id');
    }

    public function logout()
    {
        Session::flush();
        return redirect('login');
    }

    public function login()
    {
        if(Session::get('user_id'))
        {
            return redirect('home');
        }
        
        $error = Session::get('error');
        Session::forget('error');
        return view('login')->with('error', $error);        
    }

    public function do_login()
    {
        if(Session::get('user_id'))
        {
            return redirect('home');
            echo "ciao";
        }
        if(strlen(request('Nome_Utente')) == 0 || strlen(request('Password')) == 0)
        {
            
            return redirect('login')->withInput();
            echo "sus1";
        }

        $utente = utente::where('id', request('Nome_Utente'))->first();
        
        if(!$utente || !password_verify(request('Password'), $utente->password))
        {
            
            return redirect('login')->withInput();
            echo "sus2";
        }
        Session::put('user_id', $utente->id);

        return redirect('home');
    }
}
