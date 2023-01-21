<div class="modal fade add-model" id="modal-add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add More Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            @include('sections.gudang.form')

        </div>
        <div class="modal-footer">
          <button type="button" id="btn-cancel" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
          <button type="button" id="btn-save" class="btn btn-dark" style="width: 150px;" data-bs-dismiss="modal" onclick="saveGudangData()">Save</button>
        </div>
      </div>
    </div>
</div>

<script>
  function saveGudangData() {
    //SAVE GUDANG
    const grandtotal = document.querySelector('#grandtotal').value
    var targetURL = window.location.href+'/add/'+grandtotal
    $.ajax({
        url: targetURL,
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: new FormData(document.querySelector('#form-order')),
        contentType: false,
        cache: false,
        processData: false,
        async: false,
        success: (obj) => {
            // const obj = JSON.parse(data)
            $( '.main-table' ).load( window.location.href+' .main-table' );
            toast({
                title: "Database",
                message: "Data successfully uploaded!",
                type: "success",
                duration: 2000
            })
        },
        error: (err)=> {
            toast({
                title: "Database",
                message: "Something went wrong!",
                type: "error",
                duration: 2000
            })
            console.log(err)
        }
    })
    //SAVE DETAIL
    const row = document.querySelectorAll('#table-detail tr')
    const id_order = document.querySelector('#order-id').value

    for(var x = 0; x < row.length; x++) {
      const id_barang = row[x].children[0].textContent
      const nama = row[x].children[1].textContent
      const jumlah = row[x].children[2].textContent
      const harga = row[x].children[3].textContent
      const subtotal = row[x].children[4].textContent

      targetURL = window.location.href+'/adddetil/'+id_order+'/'+id_barang+'/'+nama+'/'+jumlah+'/'+harga+'/'+subtotal

      console.log(targetURL)
      $.ajax({
          url: targetURL,
          type: 'get',
          dataType: 'json',
          async: false,
          success: (obj) => {
              // const obj = JSON.parse(data)
              // RefreshTable('.table', window.location.href)

              // toast({
              //     title: "Database",
              //     message: "Data succesfully Inserted!",
              //     type: "success",
              //     duration: 3000
              // })
          },
          error: (err)=> {
              console.log(err)
              toast({
                  title: "Database",
                  message: "Something went wrong!",
                  type: "error",
                  duration: 3000
              })
          }
      })
    }
  }
</script>
