<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\reaktive;

class AddReaktivController extends Controller
{

    public function index(){
        $reaktiv = DB::select("SELECT * from reaktives");
        return view('labor.reaktive',[
            'reaktiv' => $reaktiv
        ]);
    }
    public function reaktiv_in(Request $request){
        $now = date("Y-m-d h:i:s");
        $data =  reaktive::latest('id')->first();
        $lastid = $data['id'];
        $data = $request->all();
        for($i = 1; $i<=$lastid;$i++){
            if($data['reaktiv'.$i]!=null){
                if($data['reaktiv_comment'.$i]==null){
                    $data['reaktiv_comment'.$i] = '';
                };
                DB::table('kirim_reaktivs')->insert([
                    'reaktiv_id' => $i,
                    'amount' => $data['reaktiv'.$i],
                    'comments' => $data['reaktiv_comment'.$i]
                ]);
                DB::table('reaktives')->
                where('id',$i)->
                increment('soni', $data['reaktiv'.$i]);
                DB::table('reaktives')->
                where('id',$i)->
                update(['updated_at' => $now]);
            }
        }


        return redirect()->route('reaktiv');
    }
    public function reaktiv_out(Request $request){
        $now = date("Y-m-d h:i:s");
        $data =  reaktive::latest('id')->first();
        $lastid = $data['id'];
        $data = $request->all();
        for($i = 1; $i<=$lastid;$i++){
            if($data['reaktiv'.$i]!=null){
                if($data['reaktiv_comment'.$i]==null){
                    $data['reaktiv_comment'.$i] = '';
                };
                DB::table('xarajats')->insert([
                    'reaktiv_id' => $i,
                    'xarajat_soni' => $data['reaktiv'.$i],
                    'maqsad' => $data['reaktiv_comment'.$i]
                ]);
                DB::table('reaktives')->
                where('id',$i)->
                decrement('soni', $data['reaktiv'.$i]);
                DB::table('reaktives')->
                where('id',$i)->
                update(['updated_at' => $now]);
            }
        }


        return redirect()->route('reaktiv');
    }

}
