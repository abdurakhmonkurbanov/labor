<section id="appointment" class="appointment section-bg">
    <div class="section-title">
        <h4>Natijalarni kiritish <i class="bi bi-check2-circle"></i> </h4>
      </div>
    <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-md-6 form-group text-center">
            FIO<b> {{$client[0]->fio}}</b>
          </div>
          <div class="col-md-6 form-group text-center">
            Tug'ilgan yili:  <b>{{$client[0]->ty}}</b>
          </div>
        </div>
        <div class="row">
            <div class="col">
                {!! $b_analiz !!}


            </div>
        </div>
        <div class="row">
          <div class="col-md-12 form-group mt-3 text-center">
               <form action="{{route('resultsave')}}" method="post">
                @csrf

                <input type="hidden" name="res_id" value="{{$c_id}}">
                <input type="hidden" name="client_id" value="{{$client[0]->client_id}}">
                <input type="hidden" name="analiz_template_id" value="{{$client[0]->analiz_template_id}}">
                <input type="hidden" name="anal_ids" value="{{ $anal_ids }}">
            <h5 class="text-center">{!!$client[0]->name!!} </h5>
                    {!!$client[0]->form!!}
            <input class="btn btn-primary mt-3" type="submit" value="Saqlash">
            <a class="btn btn-danger mt-3" href="{{route('resultindex')}}">Bekor qilish</a>
                </form>
          </div>
        </div>

    </div>
  </section><!-- End Appointment Section -->
