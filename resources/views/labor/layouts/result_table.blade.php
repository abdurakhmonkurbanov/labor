<section id="appointment" class="appointment section-bg">
    <div class="container-fluid" data-aos="fade-up">

      <div class="section-title">
        <h4>Natijalarni kiritish <i class="bi bi-check2-circle"></i> </h4>
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
                       @foreach ($resdb as $item)
                       @if ($item->analiz_template == null)
                       <tr>
                           @else
                           <tr class="table-info">
                       @endif

                            <th scope="row"> {{$item->tartib_raqami}} </th>
                              <td> {{$item->fio}}
                                </td>
                                 <td>
                                    @if ($item->analiz_template == null)
                                    <a href="{{route('resultindex')}}/{{$item->id}}">{!!$item->name!!}</a>
                                        @else
                                        {!! $item->name !!}
                                    @endif


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


  </section><!-- End Appointment Section -->
