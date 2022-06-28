<?php

namespace App\Http\Controllers;

// use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session;
use App\Models\utente;
use App\Models\post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;
// use Illuminate\Http\Request;

class create_post extends BaseController
{
    public function create_post()
    {
        return view("create_post");
    }

    public function do_search(
        // Request $request
        )
    {
        // if(isset($request->contenuto) && $request->servizio=='Carte Magic')
        // {
        //     $rarità=$request->contenuto;
        //     $rarità=urlencode($rarità);
        //     $curl = curl_init();
        //     curl_setopt($curl, CURLOPT_URL,"https://api.magicthegathering.io/v1/cards?rarity=".$rarità);
        //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        //     $result = curl_exec($curl);
        //     echo $result;
        //     curl_close($curl);
        //     //return $result;
        // }
        if(request('contenuto') && request('servizio')=='NASA')
        {
            $data=request('contenuto');
            // $request->contenuto;
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL,"https://api.nasa.gov/planetary/apod?api_key=DEMO_KEY&date=".$data);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($curl);
            // echo $result;
            return $result;
            curl_close($curl);
            // return $result;
        }
        // else
        // {
        //     $data=$request->contenuto;
        //     $curl = curl_init();
        //     curl_setopt($curl, CURLOPT_URL,"https://api.nasa.gov/planetary/apod?api_key=DEMO_KEY&date=");
        //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        //     $result = curl_exec($curl);
        //     echo $result;
        //     curl_close($curl);
        // }
    }
/////////da fare
    public function send_post(
        Request $request
        )
    {
    //     print_r($request->contenuto);
    //     print_r($request->contenuto != 'NULL');
        if($request->contenuto)
        {
        $utente = Session::get('user_id');
        $descrizione = request('descrizione');
        $send_content = request('contenuto');
    //    if(request('servizio')=="Carte Magic")
    //    {
    //         // $utente->posts()->create([
    //         //     'data_pubblicazione'=>now(),
    //         //     'descrizione'=>$descrizione,
    //         //     'contenuto_multimediale'=>$send_content.'&type=card',
    //         //     'numero_like'=>0
    //         // ]);
    //    }
    //    else
    //    {
            // $utente->posts()->create([
                DB::table('post')->insert([
                'data_pubblicazione'=>now(),
                'descrizione'=>$descrizione,
                'contenuto_multimediale'=>$send_content,
                'utente_id'=>$utente,
                'numero_like'=>0
            ]);

            // DB::table('segue')->insert([
            //     'seguito' => $id,
            //     'seguace' => $iduser
            // ]);
            // return $cicci;
    //    }
    // return redirect('create_post'); ///////////riattiva
            }
            return redirect('create_post');
}
///////////////
}
