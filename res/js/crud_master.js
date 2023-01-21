addSubmit.addEventListener('click', ()=> {
    const form = document.querySelector('#form-add')
    const targetURL = currentURL+'/add'
    $.ajax({
        url: targetURL,
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: new FormData(document.querySelector('#form-add')),
        contentType: false,
        cache: false,
        processData: false,
        async: false,
        success: (obj) => {
            // const obj = JSON.parse(data)
            RefreshTable('.table', window.location.href)
            RefreshInput(form)

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
})

function prepareUpdate(elem) {
    const form = document.querySelector('#form-update').querySelectorAll('input')
    let data = elem.closest('tr').children
    console.log(form)
    for(var x = 0; x < data.length-1; x++) {
        form[x].value = data[x].textContent
    }
}

updateSubmit.addEventListener('click', ()=> { 
    const form = document.querySelector('#form-update')
    const id = form[0].value
    const targetURL = currentURL+'/update/'+id
    
    $.ajax({
        url: targetURL,
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: new FormData(document.querySelector('#form-update')),
        contentType: false,
        cache: false,
        processData: false,
        async: false,
        success: (obj) => {
            // const obj = JSON.parse(data)
            RefreshTable('.table', window.location.href)
            RefreshInput(form)

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
})

function RefreshTable(table, url) {
    $( table ).load( url+' '+table );
}

function RefreshInput(elem) {
  elem = elem.querySelectorAll('input')
  elem.forEach(e => {
    e.value = ''
  });
}

function deleteData(elem) {
  const id = elem.closest('tr').children[0].id
  const targetURL = currentURL+'/delete/'+id

  $.ajax({
      url: targetURL,
      type: 'get',
      dataType: 'json',
      async: false,
      success: (obj) => {
          // const obj = JSON.parse(data)
          RefreshTable('.table', window.location.href)
          
          toast({
              title: "Database",
              message: "Data succesfully deleted!",
              type: "success",
              duration: 3000
          })
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