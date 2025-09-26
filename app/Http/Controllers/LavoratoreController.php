<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use DB;
use Users;


class LavoratoreController extends Controller

{
    /**
     * Mostra il form di registrazione del lavoratore.
     *
     * @return \Illuminate\View\View
     */
    public function main()
    {
        $id_user=0;
        return view('lavoratore.main',compact('id_user'));
    }

    public function cerca_nome(Request $request) {
	    $cognome=$request->input('cognome');$cognome=trim($cognome);
        $nome=$request->input('nome');$nome=trim($nome);
        $codfisc=$request->input('codfisc');$codfisc=trim($codfisc);
        $nominativo="$cognome $nome";
        
        if (strlen($codfisc)==0) $codfisc="xxx!!!";
        $data_nascita=$request->input('data_nascita');

		$check_nome=DB::table('anagrafe.t2_tosc_a')
		->select('sindacato')
        ->where(function ($query) use ($nominativo,$data_nascita) {
            $query->where('nome','=',$nominativo)
            ->where("attivi",'=','S')
            ->whereRaw("CAST(datanasc AS DATE)='$data_nascita'");
        })
        ->orWhere('codfisc','=',$codfisc)
		->get();	
        $resp=array();
        $resp['header']="OK";
        $resp['info']=$check_nome;
        return json_encode($resp);

    }
}
