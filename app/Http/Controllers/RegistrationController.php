<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\analiz;
use App\Models\analiz_template;
use App\Models\client;
use App\Models\reaktive;
use App\Models\result;
use App\Models\xarajat;
use App\Models\sana;

class RegistrationController extends Controller
{
    public function index($save = null){
        $ana = analiz::all();
        $sana = DB::table('sana_tr')
            ->where('id',1)->get();
        $bs =  $sana[0]->sana;
        $js = date('Y-m-d');
        if($bs != $js){
            $upsana = DB::update("UPDATE sana_tr SET sana = '$js',tr = 0 WHERE `id` = 1;");
        }
        $clients = DB::select("SELECT * from clients where created_at > '$js'  ORDER BY id DESC");
        return view('labor.index',[
            'anals' => $ana,
            'res' => $save,
            'clients' => $clients
        ]);
    }

    public function add(Request $request){ //  Registratsiyani saqlash uchun
        $created = date('Y-m-d')." ".date('H:m:s');
       $data =$request->all();   //  kelganlarni olish boshlandi
       $fio = $data['fio'];
       $ty = $data['ty'];
       $anals = analiz::latest('id')->first();
        $anal_count = $anals['id'];
        $s = '';
        $anal_ids = '';
        $b = false;
        for($i = 1;$i<=$anal_count;$i++){
            $s = 'anal'.$i;
            if (isset($data[$s])){
                $b = true;
                $anal_ids =$i.':'.$anal_ids;
            }
        }
        if($b == false){
            return redirect()->route('index',['save' => 'noanal']);
        }
            //  kelganlarni olish tugadi
        $sanadb = DB::select('select * from sana_tr where id = ?', [1]);
        $tr = $sanadb[0]->tr;
        $tr = $tr + 1;
        $upsana = DB::update("UPDATE sana_tr SET tr = '$tr' WHERE `id` = 1;");  //  Tartib raqam yangilandi

        // clientga yozish boshlandi
        $anal_ids = substr($anal_ids,0,-1);
        $c_id = DB::table('clients')->insertGetId([
            'fio' => $fio,
            'ty' => $ty,
            'tartib_raqami' => $tr,
            'c_analiz_ids' => $anal_ids

        ]);

        // clientga yozish tugadi

        //  Resultga yozish boshlandi
        $anal_ids = explode(":",$anal_ids);
        $temp_ids = '';
        foreach($anal_ids as $item) {
            $analdb = DB::select("SELECT * from analizs where id = $item");
            $temp_ids = $temp_ids.$analdb[0]->temp_id.":";
        }
        $temp_ids = substr($temp_ids,0,-1);
        $temp_ids = explode(":",$temp_ids);
        $temp_ids = array_unique($temp_ids);
        foreach ($temp_ids as $value) {
            DB::insert("INSERT into results (client_id, analiz_template_id) VALUE ('$c_id',$value)");

        }
        //  Resultga yozish tugadi
        return redirect()->route('index',['save' => 'status']);
    }
}
