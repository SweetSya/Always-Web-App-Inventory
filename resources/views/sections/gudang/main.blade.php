@extends('mainView')

@section('content')
    @if(Auth::check() && Auth::user()->role == 'admin' || Auth::user()->role == 'gudang')
        @include('components.sidebar')
    @endif
<div>
    @php
        $head = ['ID Order', 'Tanggal Order', 'ID Supplier', 'Keterangan', 'Total'];
        // $ids = ['order_id', 'order_date', 'sup_id', 'order_total', 'order_keterangan'];
    @endphp
    @include('sections.gudang.add')
    @include('sections.gudang.detail')

    <h1 class="main-heading">
        Gudang
        <div class="d-flex my-auto" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-dark">Search</button>
        </div>
    </h1>
    <div class="filter-bar">
        <div class="d-flex my-auto" id="filter-date">
            <input class="form-control me-2 param-filter-date" type="date" placeholder="From" aria-label="Search">
            <input class="form-control me-2 param-filter-date" type="date" placeholder="To" aria-label="Search">
            <button class="btn btn-dark" id="btn-filter-date" style="white-space: nowrap;">Filter Date</button>
        </div>
    </div>
    @include('components.table', ['head'=> $head, 'db' => $db, 'view' => 'gudang'])
</div>
<script>
    const btnFilterDate = document.querySelector('#btn-filter-date')
    const formFilter = document.querySelectorAll('.param-filter-date')

    for(form of formFilter) {
        form.addEventListener('change', (e) => {
            //tampilkan clear dan do filter
            if(!document.querySelector('.btn-clear-filter')) {
                form = document.querySelector('#filter-date')
                btn = document.createElement('button')
                btn.innerHTML = 'Clear'
                btn.className = 'btn btn-danger btn-clear-filter'
                btn.style.cssText = 'margin-left: 10px;'
                btn.onclick = () => {
                    //Remove all filter
                    formFilter[0].value = ''
                    formFilter[1].value = ''
                    const targetURL = 'loadData/gudang'
                    const table = document.querySelector('.table-data')
                    filterDataAjax(targetURL, table)
                    document.querySelector('.btn-clear-filter').remove()
                }
                form.insertAdjacentElement('beforeend', btn)
            }
        })
    }

    btnFilterDate.addEventListener('click', ()=> {
        form = document.querySelector('#filter-date')
        param1 = form.children[0].value
        param2 = form.children[1].value

        const targetURL = 'loadFilteredData/gudang/order_date/'+param1+'/'+param2
        const table = document.querySelector('.table-data')
        filterDataAjax(targetURL, table)
    })

    function filterDataAjax(targetURL, table) {
        $.ajax({
            url: targetURL,
            type: 'get',
            dataType: 'json',
            async: false,
            success: (obj) => {
                // const obj = JSON.parse(data)
                // RefreshTable('.table', window.location.href)
                table.innerHTML = ''
                for(data of obj) {
                    row = document.createElement('tr')
                        row.className = 'table-light'
                        row.innerHTML = `
                            <td>`+data.order_id+`</td>
                            <td>`+data.order_date+`</td>
                            <td>`+data.sup_id+`</td>
                            <td>`+data.order_total+`</td>
                            <td>`+data.order_keterangan+`</td>
                            <td style="text-align: center;">
                                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modal-detail" onclick="openDetailGudang(this)">Detail</button>
                            </td>
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
    }

    function openDetailGudang(e) {
        const id_order = e.closest('tr').children[0].textContent
        const targetURL = 'loadData/gudang/detail_gudang/gudang.order_id/detail_gudang.order_id/gudang.order_id/'+id_order
        const table = document.querySelector('.d_body_data')

        $.ajax({
            url: targetURL,
            type: 'get',
            dataType: 'json',
            async: false,
            success: (obj) => {
                // const obj = JSON.parse(data)
                // RefreshTable('.table', window.location.href)
                table.innerHTML = ''
                for(data of obj) {
                    row = document.createElement('tr')
                        row.className = 'table-light'
                        row.innerHTML = `
                            <td>`+data.dg_brg_id+`</td>
                            <td>`+data.dg_brg_nama+`</td>
                            <td>`+data.dg_jumlah+`</td>
                            <td>`+data.dg_brg_harga+`</td>
                            <td>`+data.dg_subtotal+`</td>
                        `
                        table.insertAdjacentElement('beforeend', row)
                }
                document.querySelector('.d_tanggal_order').textContent = obj[0].order_date
                document.querySelector('.d_id_order').textContent = obj[0].order_id
                document.querySelector('.d_supplier_order').textContent = obj[0].sup_id
                document.querySelector('.d_total_order').textContent = obj[0].order_total
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
</script>
@endsection
