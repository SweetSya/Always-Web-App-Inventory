<style>
    .table-sizing-inventory td:nth-child(1) {
        width: 50px;
    }
    .table-sizing-inventory td:nth-child(2) {
        width: 90px;
    }
    .table-sizing-inventory td:nth-child(3) {
        width: 1fr;
    }
    .table-sizing-inventory td:nth-child(4) {
        width: 120px;
    }
    .table-sizing-inventory td:nth-child(5) {
        width: 100px;
        text-align: center;
    }
    ::-webkit-scrollbar {
        width: 0px;
    }
    .table-sizing-detail td:nth-child(1) {
        width: 150px;
    }
    .table-sizing-detail td:nth-child(2) {
        width: 1fr;
    }
    .table-sizing-detail td:nth-child(3) {
        width: 100px;
    }
    .table-sizing-detail td:nth-child(4) {
        width: 190px;
    }
    .table-sizing-detail td:nth-child(5) {
        width: 190px;
    }

    @media only screen and (max-width: 700px) {
        .form-container {
            flex-direction: column !important; 
        }
    }
</style>

<div>
    <div style="display: flex; flex-direction: row; gap: 20px;" class="form-container">
        <div style="flex-grow: 3;" method="POST">
            <form method="POST" id="form-order">
                <div class="mb-3">
                    <label for="order-id" class="form-label">ID Order</label>
                    <input type="text" class="form-control" id="order-id" name="order_id" style="pointer-events: none !important; filter: brightness(.9) !important;">
                  </div>
                <div class="mb-3">
                  <label for="data2" class="form-label">Tanggal Order</label>
                  <input type="date" class="form-control" id="data2" name="order_date">
                </div>
                <div class="mb-3">
                  <label for="data3" class="form-label">ID Supplier</label>
                  <input type="text" class="form-control" id="data3" name="sup_id">
                </div>
                <div class="mb-3">
                    <label for="data4" class="form-label">Keterangan</label>
                    <input type="text" class="form-control" id="data4" name="order_keterangan">
                </div>
            </form>
        </div>
        <div style="display: flex; flex-direction: column; gap: 10px; flex-grow: 1;">
            <div style="height: min-content;">
                <table class="table table-sizing-inventory" style="border-radius: 7px 7px 0px 0px; max-height: 390px; overflow: hidden; margin-bottom: 0px;">
                    <thead>
                        <tr class="table-dark">
                            <td>Stok</td>
                            <td>ID Barang</td>
                            <td>Nama</td>
                            <td>Harga Beli</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                </table>
            </div>
            <div style="overflow-y: scroll; height: 196px;">
                <table class="table table-sizing-inventory">
                    <tbody id="table-inventory">

                    </tbody>
                </table>
            </div>
            <div style="height: min-content;">
                <form method="POST" id="form-order-total">
                    <div class="mb-3">
                        <label for="grandtotal" class="form-label" style="font-weight: 600">Total</label>
                        <input type="text" class="form-control" id="grandtotal" name="order_total" disabled>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div style="max-height: 450px;">
        <h1>Current Detail</h1>
        <div style="height: min-content;">
            <table class="table table-sizing-detail" style="border-radius: 7px 7px 0px 0px; max-height: 390px; overflow: hidden; margin-bottom: 5px;">
                <thead>
                    <tr class="table-dark">
                        <td>ID Barang</td>
                        <td>Nama</td>
                        <td>Jumlah</td>
                        <td>Harga Satuan</td>
                        <td>Subtotal</td>
                    </tr>
                </thead>
            </table>
        </div>
        <div style="overflow-y: scroll; max-height: 400px;">
            <table class="table table-sizing-detail">
                <tbody id="table-detail">
                           
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="inputJumlahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: rgba(var(--mainColor), .5);">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Masukkan Jumlah</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="data" class="form-label">Jumlah</label>
                <input type="text" class="form-control" id="data-jumlah" name="jumlah">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-dark" onclick="addDetails(this)">Add</button>
        </div>
      </div>
    </div>
  </div>

<script>
    const buttonViewAdd = document.querySelector('.btn-add-data')
    var currentSelectedRow

    buttonViewAdd.addEventListener('click', () => {
        document.querySelector('#order-id').value = guidGenerator()
    })

    function guidGenerator() {
        var S4 = function() {
        return (((1+Math.random())*0x10000)|0).toString(16).substring(1);
        };
        return (S4()+"-"+S4()+"-"+S4()+"-"+S4());
    }

    function addTotal() {
        const rows = document.querySelectorAll('.table-subtotal')
        let total = 0

        for(data of rows) {
            total = total + parseInt(data.textContent)
        }
        
        document.querySelector('#grandtotal').value = total
    }
    function addJumlah(e) {
        $('#inputJumlahModal').modal('show')
        
        currentSelectedRow = e
    }
    function addDetails(e) {
        jumlah = e.closest('.modal').querySelector('#data-jumlah').value
        
        data = currentSelectedRow.closest('tr').querySelectorAll('td') //Fething data from font end table

        const table = document.querySelector('#table-detail')
        row = document.createElement('tr')
                    row.className = 'table-light'
                    row.innerHTML = `
                        <td>`+data[1].textContent+`</td>
                        <td>`+data[2].textContent+`</td>
                        <td>`+jumlah+`</td>
                        <td>`+data[3].textContent+`</td>
                        <td class="table-subtotal">`+data[3].textContent*jumlah+`</td>
                    `
                    table.insertAdjacentElement('beforeend', row)

        $('#inputJumlahModal').modal('hide');
        e.closest('.modal').querySelector('#data-jumlah').value = ''

        addTotal()
    }

    buttonViewAdd.addEventListener('click', () => {
        tableDetail = document.querySelector('#table-detail').innerHTML = ''
        const targetURL = 'loadData/inventory'

        const table = document.querySelector('#table-inventory')
        table.innerHTML = ''

        $.ajax({
            url: targetURL,
            type: 'get',
            dataType: 'json',
            async: false,
            success: (obj) => {
                for(var data of obj) {
                    row = document.createElement('tr')
                    row.className = 'table-light'
                    row.innerHTML = `
                        <td>`+data.brg_stok+`</td>
                        <td>`+data.brg_id+`</td>
                        <td>`+data.brg_nama+`</td>
                        <td>`+data.brg_harga_beli+`</td>
                        <td><button class="btn btn-dark" onclick="addJumlah(this)">Add</button></td>
                    `
                    table.insertAdjacentElement('beforeend', row)
                }
                
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
    })

    
</script>
