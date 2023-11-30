<!-- Modal -->
<div class="modal fade" id="staticBackdropspo{{ $income->id }}"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Input PO Number </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <form action="{{ route('Income.inputpo',$income->id) }}" method="POST">
            @csrf
            @method('PUT')
        <div class="modal-body">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name Material</strong>
                    <input class="form-control" name="Catalog_Number" placeholder="Input Catalog Number" value="{{ $income->Name_of_Material }} | {{ $income->Catalog_Number }} " @disabled(true)>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>No PO</strong>
                    <input type="text" name="No_PO" value="{{ $income->No_PO }}" class="form-control" placeholder="No">
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>
