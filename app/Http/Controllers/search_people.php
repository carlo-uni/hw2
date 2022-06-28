<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\User;
use Illuminate\Routing\Controller as BaseController;

class search_people extends BaseController
{
    public function search_people()
    {
        return view("search_people");
    }

    public function do_search_people(Request $request)
    {
        //dd($request->all());
        // $user = Auth::user()->id;
        // $id = request('utente_cercato');
        $id = $request->utente_cercato;
        // echo $id;
        $iduser = Session::get('user_id');
        if($id!=null)
        {
            $query=DB::select( DB::raw("SELECT * FROM utente WHERE id = '$id' AND id != '$iduser'"));
            // print_r($query);
            return json_encode($query);
            // echo "SELECT * FROM utente WHERE id = '$id' AND id != '$iduser'";
        }
        else
        {
           // $query=DB::raw("");
            $query= DB::select( DB::raw("SELECT * FROM utente WHERE id != '$iduser'"));
            return json_encode($query);
        }

//         if($_GET['utente_cercato']!=null)
// $query = "SELECT * from utente where id = '".$_GET['utente_cercato']."' AND id != '".$_SESSION['Nome_Utente']."'";
// else
// $query = "SELECT * FROM utente WHERE id != '".$_SESSION['Nome_Utente']."'";

    }

    public function follow_user(Request $request)
    {
        // $user = Auth::user()->id;
        // $id_user=$request->id;
        // $id = request('utente_cercato');
        $id = $request->id;
        $iduser= Session::get('user_id');
        // echo $id;
        // echo $iduser;
        // $query= DB::select( DB::raw("SELECT * FROM segue WHERE seguito = ':utente_cercato' AND seguace=:seguace"), ['utente_cercato'=>$id, 'seguace'=>$iduser]);
        $query= DB::select( DB::raw("SELECT * FROM segue WHERE seguito = '$id' AND seguace = '$iduser'"));
        if(empty($query))
        {
            DB::table('segue')->insert([
                'seguito' => $id,
                'seguace' => $iduser
            ]);
            echo "true";
        }

        else{
            DB::table('segue')->where('seguito','=',$id)->where('seguace','=',$iduser)->delete();
            $query2 = DB::raw("DELETE FROM segue WHERE seguito= '$id' AND seguace= '$iduser'");
            echo"false";
        }
    }

}
