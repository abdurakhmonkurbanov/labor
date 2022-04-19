<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center">
                    <h3>Reaktivlar</h3>
                </div>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col" width="60%">Reaktiv nomi</th>
                        <th scope="col" width="20%">Bazadagi soni</th>
                        <th scope="col" width="20%">Oxirgi vaqti</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($reaktiv as $item)
                      <tr>
                        <th scope="row"> {{$item->name}} </th>
                        <td> {{$item->soni}} </td>

                        <td>
                            {{$item->updated_at}}
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</section>
