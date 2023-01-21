<div class="modal fade add-model" id="modal-detail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="align-items: flex-start;">
          <div class="modal-title" style="" id="staticBackdropLabel">
            <h5>Detail Order <span class="d_id_order"></span></h5>
            <p style="margin: 2px;">Tanggal : <span class="d_tanggal_order"></span></p>
            <p style="margin: 2px;">Supplier : <span class="d_supplier_order"></span></p>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table class="table" style="border-radius: 8px; overflow:hidden;">
                <thead>
                  <tr class="table-dark">
                    <td>ID Barang</td>
                    <td>Nama Barang</td>
                    <td>Jumlah</td>
                    <td>Harga Satuan</td>
                    <td>Subtotal</td>
                  </tr>
                </thead>
                <tbody class="d_body_data">
                  {{-- <tr>
                    <td>Test</td>
                    <td>Test</td>
                    <td>Test</td>
                    <td>Test</td>
                  </tr> --}}
                </tbody>
            </table>
            <h5>Grand Total : <span class="d_total_order"></span></h5>
        </div>
        <div class="modal-footer">
          <button type="button" id="btn-close" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>