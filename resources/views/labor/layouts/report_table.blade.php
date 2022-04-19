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

        <h3>Reaktivlar xisoboti </h3>
      </div>
      <div class="row">
          <div class="col-md-12">
            <form class="container" action="{{route('report.find')}}" method="post">
                @csrf
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
            <table class="table table-hover table-sm table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Reaktiv nomi</th>
                    <th scope="col">Kirim</th>
                    <th scope="col">Chiqim</th>
                    <th scope="col">Ba'zada mavjud bo'lgan</th>
                    <th scope="col">Oraliq</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($reaktives as $ritem)
                    <tr>
                        <td>{{$ritem->id}} </td>
                        <td>{{$ritem->name}} </td>
                        <?php   $k = 0; $u_at = ''; ?>
                        @foreach ($kirim as $kitem)
                            @if ($ritem->id == $kitem->reaktiv_id)
                                <?php
                                $k = $k + $kitem->amount;
                                $u_at = $kitem->created_at;
                                ?>

                            @endif
                        @endforeach
                        <td align="center">{{$k}}</td>
                        <?php $ch = 0; ?>
                        @foreach ($chiqim as $chitem)
                            @if ($ritem->id == $chitem->reaktiv_id)
                                <?php
                                $ch = $ch + $chitem->xarajat_soni;
                                ?>

                            @endif
                        @endforeach
                        <td align="center">{{$ch}}</td>
                        <td align="center">{{$k - $ch}}</td>
                        <td align="center">{{$u_at}}</td>

                    </tr>
                  @endforeach

                </tbody>
              </table>
          </div>
      </div>
    </div>
</section>
