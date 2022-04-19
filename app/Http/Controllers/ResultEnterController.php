<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultEnterController extends Controller
{
    //
    public function index(){
        $js = date('Y-m-d');
        $clients = DB::select("SELECT * from clients where created_at > '$js'  ORDER BY id DESC");
        $resdb = DB::select("SELECT  clients.*, analiz_templates.*, results.* FROM results, clients, analiz_templates where clients.id = results.client_id and analiz_templates.id = results.analiz_template_id and results.created_at > '$js'");
        //dd($resdb);
        return view('labor.result_enter',[
            'resdb' => $resdb
            //'clients' => $clients
        ]);
    }
    public function show($id){
        $client = DB::select("SELECT   analiz_templates.*, clients.*, results.* FROM results, clients, analiz_templates where results.id = '$id' and clients.id = results.client_id and analiz_templates.id = results.analiz_template_id");
        $anal_temp_ids =  $client[0]->analiz_template_id;
        $anal_temp = DB::select("SELECT * from analiz_templates where id = '$anal_temp_ids'");
        $c_anal_ids = $client[0]->c_analiz_ids;
        $a_anal_ids = $anal_temp[0]->analiz_ids;
        $c_anal_ids = explode(":",$c_anal_ids);
        $a_anal_ids = explode(":",$a_anal_ids);

        $imp_ids = array_intersect($c_anal_ids,$a_anal_ids);
        $s = 'Belgilangan analizlar: <br><b>';
        $anal_ids = '';
        foreach ($imp_ids as $key => $value) {
            $anal_db = DB::select("SELECT * from analizs where id = '$value'");
            $s = $s.$anal_db[0]->name."<br>";
            $anal_ids = $value.":".$anal_ids;
        }
        $s = $s."</b>";
        $anal_ids = substr($anal_ids,0,-1);

        return view('labor.result_enter',[
            'c_id' => $id,
            'client' => $client,
            'b_analiz' => $s,
            'anal_ids' => $anal_ids
        ]);
    }

    public function store(Request $request){
        $data = $request->all();
        $res_id = $data['res_id'];
        $client_id = $data['client_id'];
        $anal_ids = $data['anal_ids'];
        $analiz_template_id = $data['analiz_template_id'];
        $tempdb = DB::select("SELECT * from analiz_templates where id = '$analiz_template_id'");
        $temp_str = $tempdb[0]->template;
        $anal_count = $tempdb[0]->count;
        $s = '';
        for($i=1;$i<=$anal_count;$i++){
            $s = 'analiz'.$i;
            if(isset($data[$s]) != null){
                $s1 = '[[analiz'.$i.']]';
                $temp_str = str_replace($s1,$data[$s],$temp_str);
            }
            else{
                $s1 = '[[analiz'.$i.']]';
                $temp_str = str_replace($s1,'',$temp_str);
            }
        }
        DB::update("UPDATE results SET analiz_template = '$temp_str' where id = '$res_id'");
        //  xarajatga yozish boshlandi Buni bu yerga yozmaslik kerak
        $anal_ids = explode(":",$anal_ids);
        foreach($anal_ids as $item) {
            $reaktivs = DB::select("SELECT * from analizs where id = $item");
            foreach($reaktivs as $r_item){
                $reak_ids = $r_item->reaktiv_ids;
                $reak_ids = explode(":",$reak_ids);
                foreach($reak_ids as $id){
                    if($id != "")
                    {
                     DB::insert("INSERT into xarajats (reaktiv_id, xarajat_soni,maqsad,  client_id) values ('$id', '1','null' ,'$client_id')");
                     DB::table('reaktives')->
                     where('id',$id)->
                     decrement('soni', 1);
                    }
                }
            }
        }
        //  xarajatga yozish boshlandi Buni bu yerga yozmaslik kerak
        return redirect()->route('resultindex');
    }
}
