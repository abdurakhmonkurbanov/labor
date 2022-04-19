<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArchiveController extends Controller
{
    public function index(){

        $dan = date('Y-m-d',strtotime("-1 month"));
        $gacha = date('Y-m-d',strtotime("1 day"));
        $resdb = DB::select("SELECT analiz_templates.*,  clients.*, results.* FROM results, clients, analiz_templates where clients.id = results.client_id and analiz_templates.id = results.analiz_template_id and (results.created_at >= '$dan' and results.created_at <= '$gacha') ORDER BY results.id DESC");
        //dd($resdb);
        $analizs = DB::select("SELECT * from  analizs");
        return view('labor.archive',[
            'resdb' => $resdb,
            'analizs' => $analizs
        ]);
    }


    public function find(Request $request){
        $data = $request->all();
        $dan = $data['dan'];
        $gacha = $data['gacha'];
        $gacha = date('Y-m-d', strtotime("+1 day", strtotime($gacha)));
        $fio = $data['fio'];

        $resdb = DB::select("SELECT analiz_templates.*,  clients.*, results.* FROM results, clients, analiz_templates where clients.id = results.client_id and analiz_templates.id = results.analiz_template_id and (results.created_at >= '$dan' and results.created_at <= '$gacha') and (fio LIKE '$fio%') ORDER BY results.id DESC");
        //dd($resdb);
        $analizs = DB::select("SELECT * from  analizs");
        $gacha = date('Y-m-d', strtotime("-1 day", strtotime($gacha)));
        return view('labor.archive',[
            'resdb' => $resdb,
            'analizs' => $analizs,
            'dan' => $dan,
            'gacha' => $gacha
        ]);


    }
}
