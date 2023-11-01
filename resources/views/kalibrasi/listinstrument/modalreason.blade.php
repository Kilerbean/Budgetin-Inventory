<!-- Modal -->

<style>

.right-align-text {
    text-align: left;
}
</style>

<div class="modal fade" id="staticBackdropsreject{{ $kalibrasis->id }}"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Reason Rejected </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <form action="{{ route('kalibrasi.terjadwal.gagal',$kalibrasis->id) }}" method="POST">
            @csrf
            @method('PUT')
        <div class="modal-body">
            <div class="col-xs-12 col-sm-12 col-md-12 right-align-text">
                <div class="form-group">
                    <strong>Name Instrument | Instrument ID</strong>
                    <input class="form-control" name="instrumentname" placeholder="Input Catalog Number" value="{{ $kalibrasis->instrumentname }} | {{ $kalibrasis->instrumentid }} " @disabled(true)>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 right-align-text">
                <div class="form-group">
                    <strong>Reason Rejected</strong>
                    <input type="text" name="reason_notapprove" value="{{ $kalibrasis->reason_notapprove }}" class="form-control" placeholder="Input Reason Here">
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>
