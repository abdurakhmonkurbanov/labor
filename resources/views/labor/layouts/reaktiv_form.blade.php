<section id="appointment" class="appointment section-bg">
    <div class="container-fluid" data-aos="fade-up">

      <div class="section-title">

        <h3>Reaktivlar kirim chiqimlari</h3>
      </div>
        <div class="row">
          <div class="col-md-6"><h5 align="center"  class="alert alert-primary" >Kirim </h5>
            <div  style="height: 300px" class="overflow-auto border  border-primary">
                <form action="{{route('reaktiv_in')}}" method="post">
                    @csrf
              <table class="table">
                <thead>
                    <tr>
                        <th scope="col" width="50%">Reaktiv nomi</th>
                        <th scope="col" width="25%">Miqdor</th>
                        <th scope="col" width="25%">Izoh</th>
                      </tr>
                </thead>
                <tbody>
                    @foreach ($reaktiv as $item)
                  <tr>
                    <th scope="row"> {{$item->name}} </th>
                    <td><input style="width: 150px" type="text" name="reaktiv{{$item->id}}"> </td>
                    <td>
                        <input style="width: 150px" type="text" name="reaktiv_comment{{$item->id}}">
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

            </div>

            <div class="row">
            <div class="col text-center mt-3">
                <input class="btn btn-primary" type="submit" value="Saqlash"></div>
        </div>
      </form>
          </div>
          <div class="col-md-6"><h5 align="center"  class="alert alert-primary" >Chiqim </h5>
            <div  style="height: 300px" class="overflow-auto border  border-primary">
                <form action="{{route('reaktiv_out')}}" method="post">
                    @csrf
              <table class="table">
                <thead>
                    <tr>
                        <th scope="col" width="50%">Reaktiv nomi</th>
                        <th scope="col" width="25%">Miqdor</th>
                        <th scope="col" width="25%">Izoh</th>
                      </tr>
                </thead>
                <tbody>
                    @foreach ($reaktiv as $item)
                  <tr>
                    <th scope="row"> {{$item->name}} </th>
                    <td><input style="width: 150px" type="text" name="reaktiv{{$item->id}}"> </td>
                    <td>
                        <input style="width: 150px" type="text" name="reaktiv_comment{{$item->id}}">
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

            </div>

            <div class="row">
            <div class="col text-center mt-3">
                <input class="btn btn-primary" type="submit" value="Saqlash"></div>
        </div>
      </form>
          </div>

        </div>


    </div>
  </section><!-- End Appointment Section -->
