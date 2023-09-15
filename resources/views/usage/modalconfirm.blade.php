
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop{{ $usages->id }}"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Use Material confirmation</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <form action="{{ route('Usage.Digunakan',$usages->id) }}" method="POST">
            @csrf
            @method('PUT')
        <div class="modal-body">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Material Name</strong>
                    <input class="form-control" name="Catalog_Number" placeholder="Input Catalog Number" value="|{{ $usages->Name_of_Material }}|{{ $usages->Type_of_Material }} | {{ $usages->Catalog_Number }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Open By</strong>
                    <input type="text" name="Open_By" value="{{ $usages->Open_By }}" class="form-control" placeholder="Nama">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Quantity</strong>
                    <input class="form-control" input type="number" name="Quantity" placeholder="Input " value="{{ $usages->Quantity }}">
                </div>
            </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
          <button type="submit" class="btn btn-primary">Confirm</button>
        </div>
        </form>
      </div>
    </div>
  </div>
