<div class="modal fade add-model" id="modal-update" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Update data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form id="form-update" method="POST">
            <?php $con = true ?>
            @foreach (array_combine($head, $index) as $data1 => $data2)
                <div class="mb-3">
                    <label for="datau{{ $data2 }}" class="form-label">{{ $data1 }}</label>
                    <input type="text" class="form-control" id="datau{{ $data2 }}" name="{{ $data2 }}" @if ($con) disabled @endif>
                </div>
                <?php $con = false ?>
            @endforeach
            {{-- <div class="mb-3">
              <label for="datau2" class="form-label">Nama Barang</label>
              <input type="text" class="form-control" id="datau2" name="brg_nama">
            </div>
            <div class="mb-3">
              <label for="datau3" class="form-label">Harga Jual</label>
              <input type="text" class="form-control" id="datau3" name="brg_harga_jual">
            </div>
            <div class="mb-3">
              <label for="datau4" class="form-label">Harga Beli</label>
              <input type="text" class="form-control" id="datau4" name="brg_harga_beli">
            </div>
            <div class="mb-3">
              <label for="datau5" class="form-label">Stok</label>
              <input type="text" class="form-control" id="datau5" name="brg_stok">
            </div>
            <div class="mb-3">
              <label for="datau6" class="form-label">Supplier ID</label>
              <input type="text" class="form-control" id="datau6" name="brg_supplier_id">
            </div> --}}
          </form>
        
        </div>
        <div class="modal-footer">
          <button type="button" id="btn-update" class="btn btn-dark" data-bs-dismiss="modal">Save</button>
        </div>
      </div>
    </div>
  </div>