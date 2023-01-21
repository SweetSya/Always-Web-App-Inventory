<div class="modal fade add-model" id="modal-add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add more data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form id="form-add" method="POST">
            @foreach (array_combine($head, $index) as $data1 => $data2)
                <div class="mb-3">
                    <label for="data{{ $data2 }}" class="form-label">{{ $data1 }}</label>
                    <input type="text" class="form-control" id="data{{ $data2 }}" name="{{ $data2 }}">
                </div>
            @endforeach
            {{-- <div class="mb-3">
              <label for="data2" class="form-label">Nama Barang</label>
              <input type="text" class="form-control" id="data2" name="brg_nama">
            </div>
            <div class="mb-3">
              <label for="data3" class="form-label">Harga Jual</label>
              <input type="text" class="form-control" id="data3" name="brg_harga_jual">
            </div>
            <div class="mb-3">
              <label for="data4" class="form-label">Harga Beli</label>
              <input type="text" class="form-control" id="data4" name="brg_harga_beli">
            </div>
            <div class="mb-3">
              <label for="data5" class="form-label">Stok</label>
              <input type="text" class="form-control" id="data5" name="brg_stok">
            </div>
            <div class="mb-3">
              <label for="data6" class="form-label">Supplier ID</label>
              <input type="text" class="form-control" id="data6" name="brg_supplier_id">
            </div> --}}
          </form>
        
        </div>
        <div class="modal-footer">
          <button type="button" id="btn-add" class="btn btn-dark" data-bs-dismiss="modal">Save</button>
        </div>
      </div>
    </div>
  </div>