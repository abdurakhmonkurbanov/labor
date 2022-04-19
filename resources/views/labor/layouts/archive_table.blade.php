<?php
if(isset($dan) and isset($gacha))
{
    $dan = $dan;
    $gacha = $gacha;
    //$gacha = date('Y-m-d', strtotime("+1 day", strtotime($gacha)));
}
else {
    $dan= date('Y-m-d',strtotime("-1 month"));
    $gacha = date('Y-m-d');
}

?>
<section id="appointment" class="appointment section-bg">
    <div class="container-fluid" data-aos="fade-up">

      <div class="section-title">

        <h3>Arxiv </h3>
      </div>
      <div class="row">
          <div class="col-md-12">
            <form class="container" action="{{route('archive.find')}}" method="post">
                @csrf
                <input type="text" name="fio" class="fio_input" id="name" placeholder="Familiya Ism Otasining ismi" size="30"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <b> Sanani belgilang:  &nbsp; &nbsp;</b>
                <input type="date" name="dan" class="date_input" id="dan" value="<?php echo($dan);?>">
                <label for="dan" class="form-label">dan</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                <input type="date" name="gacha" class="date_input" value="<?php echo($gacha);?>">
                <label for="dan" class="form-label">gacha</label>
                 &nbsp; &nbsp; &nbsp;
                 <input type="submit" class="btn btn-outline-success" value="Filterlash">
            </form>
          </div>
      </div>
      <div class="row">
          <div class="col-md-12 mt-3">

            <table class="table table-sm table-bordered">
                <thead>
                      <tr>
                           <th scope="col" width="5%">Tartib raqam</th>
                           <th scope="col" width="20%">FIO</th>
                              <th scope="col" width="30%">Analiz forma</th>
                              <th scope="col" width="30%">Analizlar</th>
                              <th scope="col" width="20%">Vaqti</th>
                          </tr>
                  </thead>
                       <tbody>
                             @foreach ($resdb as $item)
                             @if ($item->analiz_template != null)
                             <tr>
                                 @else
                                 <tr class="table-danger">
                             @endif

                                  <th scope="row"> {{$item->tartib_raqami}} </th>
                                    <td> {{$item->fio}}
                                      </td>
                                       <td>
                                          @if ($item->analiz_template != null)
                                          <a href="{{route('resultprint')}}/{{$item->id}}">{!!$item->name!!}</a>
                                              @else
                                              {!!$item->name!!}
                                          @endif
                                        </td>
                                        <td>
<?php
$a_anal_ids = $item->analiz_ids;
$c_anal_ids = $item->c_analiz_ids;

$c_anal_ids = explode(":",$c_anal_ids);
$a_anal_ids = explode(":",$a_anal_ids);

$imp_ids = array_intersect($c_anal_ids,$a_anal_ids);
foreach ($imp_ids as $key => $value) {
    foreach ($analizs as  $a_item) {
        if($value == $a_item->id){
            echo($a_item->name."<br>");
        }
    }
}

?>
                                        </td>
                                   <td>
                                     {{$item->created_at}}
                                    </td>
                              </tr>
                              @endforeach
                                          </tbody>
                                        </table>

          </div>
      </div>
    </div>
</section>
