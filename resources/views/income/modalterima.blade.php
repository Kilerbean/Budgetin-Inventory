

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop{{ $income->id }}"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Terima Barang</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <form action="{{ route('Income.Diterima',$income->id) }}" method="POST">
            @csrf
            @method('PUT')
        <div class="modal-body">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Barang</strong>
                    <input class="form-control" name="Catalog_Number" placeholder="Masukan Catalog Number" value="{{ $income->Name_of_Material }} | {{ $income->Catalog_Number }} " @disabled(true)>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>No PR</strong>
                    <input type="text" name="No_PR" value="{{ $income->No_PR }}" class="form-control" placeholder="No">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Quantity</strong>
                    <input class="form-control" input type="number" name="Quantity" placeholder="Masukan " value="{{ $income->Quantity }}">
                </div>
            </div>
            <div class="col-md-2"hidden>
              <div class="form-group"hidden>
                  <strong>Expire Date</strong>
                  <input class="form-control" type="date" name="Expire_Date" placeholder=" masukan Expire Date" value="{{ $income->Expire_Date}}">
              </div>
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
