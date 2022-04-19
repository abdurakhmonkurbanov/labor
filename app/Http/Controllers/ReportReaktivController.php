<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportReaktivController extends Controller
{
    public function index(){
        $dan = date('Y-m-d',strtotime("-1 month"));
        $gacha = date('Y-m-d',strtotime("1 day"));
        $reaktives = DB::select("SELECT * FROM reaktives ");
        $kirim = DB::select("SELECT * FROM kirim_reaktivs where (created_at >= '$dan') and (created_at <= '$gacha')");
        //dd($kirim);

        $chiqim = DB::select("SELECT * from xarajats where (created_at >= '$dan') and (created_at <= '$gacha')");
        return view('labor.report',[
            'reaktives' => $reaktives,
            'kirim' => $kirim,
            'chiqim' => $chiqim
        ]);
    }

    public function find(Request $request){
        $rep = $request->all();
        $dan = $rep['dan'];
        $gacha = $rep['gacha'];
        $gacha1 = date('Y-m-d', strtotime("+1 day", strtotime($gacha)));
        $reaktives = DB::select("SELECT * FROM reaktives ");
        $kirim = DB::select("SELECT * FROM kirim_reaktivs where (created_at >= '$dan') and (created_at <= '$gacha1')");

        $chiqim = DB::select("SELECT * from xarajats where (created_at >= '$dan') and (created_at <= '$gacha1')");
        return view('labor.report',[
            'reaktives' => $reaktives,
            'kirim' => $kirim,
            'chiqim' => $chiqim,
            'dan' =>$dan,
            'gacha' =>$gacha
        ]);
    }

    public function show($id){

    }
}
