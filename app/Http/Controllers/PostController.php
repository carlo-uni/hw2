<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use App\Models\utente;
use App\Models\post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PostController extends BaseController
{
    public function home() 
    {
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }
        $utente = Session::get('user_id');
        $avatar = Session::get('avatar');
        return view('home')->with('id', $utente)->with('avatar', $avatar);
        // return $utente;
        // return Session::get('user_id');
    }

    public function post()
    {
        if(!Session::get('user_id'))
        {
            return [];
        }
        // $utente = utente::where('username', request('Nome_Utente'))->first();
        $utente = utente::find(Session::get('user_id'));
        // $post = post::find('id', Session::get('user_id'));
        // (utente::where('id', request('Nome_Utente'))
        return $utente->post;
    }

    public function view_post()
    {
        $user = utente::find(Session::get('user_id'));
        // $user = Auth::user()->id;
        
        $query=DB::select(DB::raw("SELECT p.id_post,p.data_pubblicazione,p.descrizione,p.contenuto_multimediale,p.utente_id,p.numero_like,coalesce(m.id_utente,0) as liked from post p left join (select * FROM mipiace WHERE id_utente = '$user->id') as m on p.id_post = m.id_post WHERE p.utente_id ='$user->id' or p.utente_id in (select seguito from segue WHERE seguace = '$user->id') order by p.data_pubblicazione desc"));
        return json_encode($query);
        // echo $query;
        // return $query;
    }

    public function show_like(
        Request $request
        )
    {
        $id_post = $request->id_post;
        // $id_post=Session::get('id_post');
        $query=DB::select(DB::raw("SELECT id, avatar FROM utente WHERE id IN(SELECT id_utente FROM mipiace WHERE id_post='$id_post')"));
        return json_encode($query);
    }

    public function i_like(
        Request $request
        ){
        $id_post = $request->id_post;
        
        // $id_post = Session::get('id_post');
        
        // $id_post = Session::get('id_post');
        // return $id_post;
        // $user = Auth::user();
        // $user = utente::find(Session::get('user_id'));
        $user = Session::get('user_id');
        // $userid=$user->id;
        
        
        
        $mipiace = DB::table('mipiace')->where("id_post", $id_post)->where("id_utente", $user)->first(); //select

        if($mipiace){
            DB::table('mipiace')->where("id_post", $id_post)->where("id_utente", $user)->delete(); //elimina
            DB::table('post')->where('id_post', $id_post)->decrement('numero_like'); //aggiorna tabella post
        }
        else {
            //inserimento
            DB::table('mipiace')->insert(
            ['id_post' => $id_post, 'id_utente' => $user]
            );
            //update n_like
            DB::table('post')->where('id_post',$id_post)->increment('numero_like'); //aggiorna tabella post
        }
    }
}
