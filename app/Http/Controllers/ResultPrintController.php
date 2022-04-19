<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultPrintController extends Controller
{

    public function index(){
        $js = date('Y-m-d');
        $clients = DB::select("SELECT * from clients where created_at > '$js'  ORDER BY id DESC");
        $resdb = DB::select("SELECT  clients.*, analiz_templates.*, results.* FROM results, clients, analiz_templates where clients.id = results.client_id and analiz_templates.id = results.analiz_template_id and results.created_at > '$js'");
        //dd($resdb);
        return view('labor.result_print',[
            'resdb' => $resdb
            //'clients' => $clients
        ]);
    }

    public function show($id){
        // $pc = DB::select("SELECT * from analiz_templates");
        // foreach ($pc as $item) {

        //     $a_id = $item->id;
        //     $a_temp = $item->template;
        //     $a_temp = str_replace('<p>',' ',$a_temp);
        //     DB::update("UPDATE analiz_templates set template = '$a_temp' where id = '$a_id'");
        // }

        $client = DB::select("SELECT  clients.*, analiz_templates.*, results.* FROM results, clients, analiz_templates where results.id = '$id' and clients.id = results.client_id and analiz_templates.id = results.analiz_template_id ");
       // dd($client);
        return view('labor.result_print',[
            'c_id' => $id,
            'client' => $client
        ]);
    }
}
