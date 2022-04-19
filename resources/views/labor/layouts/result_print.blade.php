<section id="appointment" class="appointment section-bg">
    <script>
		function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;

		}
	</script>
    <div id="printMe">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <img src="/assets/img/logo.png" alt="">
            </div>
            <div class="col-9">Sirdaryo viloyati Guliston shahar <br>
                Xalqlar Dо’stligi №9 <br>
                «SIRDARYO DARMON SERVIS»MCHJ <br>
                xususiy klinika.Tel:+998672360170 <br></div>
        </div>
    </div>
    <div class="container-fluid" data-aos="fade-up">

        <div class="row">
            <div class="col-md-12 text-center"><hr>
                <h3>{!!$client[0]->name!!}</h3>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12 form-group text-center">
            FIO<b> {{$client[0]->fio}}</b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Tug'ilgan yili:  <b>{{$client[0]->ty}}</b>
          </div>



        </div>
        <div class="row">
          <div class="col-md-12 mt-3 text-center">{!!$client[0]->analiz_template!!}</div>
        </div>
    </div>
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-6 text-center"> <b> Подпись:  ________  </b></div>
           <div class="col-6 text-center"> <b> Дата:.2022 г </b></div>
       </div>
    </div>
</div>
<div class="text-center">
<a class="btn btn-danger mt-3" href="{{ URL::previous() }}"><i class="bi bi-backspace"></i> Orqaga</a>
<input onclick="printDiv('printMe')" class="btn btn-primary mt-3" type="submit" value="Chop etish">

</div>

</section><!-- End Appointment Section -->
