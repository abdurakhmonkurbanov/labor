 <!-- ======= Appointment Section ======= -->
 <section id="appointment" class="appointment section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
          <?php
             if($res == 'status')
             {
                 echo "Ma`lumotlar saqlandi!";
             }
             if($res == 'noanal')
             {
                 echo "Analiz belgilanmadi";
             }

          ?>
        <h3>Registratsiya</h3>
      </div>

      <form action="{{route('reg')}}" method="post">
          @csrf
        <div class="row">
          <div class="col-md-6 form-group">
            <input type="text" name="fio" class="form-control" id="name" placeholder="Familiya Ism Otasining ismi" required>
          </div>
          <div class="col-md-6 form-group mt-3 mt-md-0">
            <input type="ty" class="form-control" name="ty" id="email" placeholder="Tug'ilgan yili" required>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 form-group m-3 text-center">
            <b>Analizlarni belgilang</b>
          </div>
          <div style="height: 300px" class="col-md-8 form-group mt-3 overflow-auto border  border-primary">
              @foreach ($anals as $item)
                  <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="control-input" name="anal{{$item->id}}" id="anal{{$item->id}}">
                      <label class="control-label m-2" for="anal{{$item->id}}">
                          {{$item->name}}
                      </label>
                  </div>
              @endforeach
          </div>
        </div>
        <div class="row">
            <div class="col text-center mt-3">
                <input class="btn btn-primary" type="submit" value="Saqlash"></div>
        </div>
      </form>
    </div>
  </section><!-- End Appointment Section -->

  <section>
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <div class="text-center">
                      <h3>Bugungi Analizlar</h3>
                  </div>
                  <table class="table">
                      <thead>
                        <tr>
                          <th scope="col" width="10%">Tartib raqam</th>
                          <th scope="col" width="25%">FIO</th>
                          <th scope="col" width="55%">Analizlar</th>
                          <th scope="col" width="10%">Vaqti</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($clients as $item)
                        <tr>
                          <th scope="row"> {{$item->tartib_raqami}} </th>
                          <td> {{$item->fio}} </td>
                          <td>
                          <?php
                          $a_ids = $item->c_analiz_ids;
                          $a_ids = explode(":",$a_ids);
                              foreach ($a_ids as  $value) {
                                  $i = 1;
                                 ?>
                                      @foreach ($anals as $item_anal)

                                          @if ($item_anal->id == $value)
                                           {{$item_anal->name}} <br>

                                          @endif
                                      @endforeach
                                 <?php

                              }
                          ?>
                          </td>
                          <td>
                              <?php
                                  $timestamp = $item->created_at;
                                  //echo $timestamp;
                                  $datetime = explode(" ",$timestamp);
                                  $date = $datetime[0];
                                  $time = $datetime[1];
                                  echo($time);
                              ?>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
              </div>
          </div>
      </div>
  </section>
