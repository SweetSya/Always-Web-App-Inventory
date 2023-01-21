@extends('mainView')

@section('content')

    @if (Auth::check())
        <style>
            .account-container > * {
                font-size: 1.1rem;
            }
            .account-container {
                width: 60%;
                max-width: 500px;
                min-width: 350px;
                padding: 25px;
                margin-left: auto;
                margin-right: auto;
                min-height: 70vh;
                margin-top: 50px;
                margin-bottom: 30px;
                background-color: rgba(var(--secondColor), 1);
                display: flex;
                gap: 15px;
                flex-direction: column;
                border-radius: 25px;
            }
            .account-container div:first-child {
                margin-left: auto;
                margin-right: auto;
                width: 80%;
                gap: 15px;
                display: flex;
                align-items: center;
                flex-direction: column;
            }
            .account-container div:first-child > h2{
                background: -webkit-linear-gradient(90deg, rgba(128,157,210,.7) 0%, rgba(69,252,229,.7) 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
            .account-container div:first-child img {
                width: 150px;
                height: 150px;
                object-fit: cover;
                border-radius: 100px;
                background: rgb(128,157,210);
                background: linear-gradient(90deg, rgba(128,157,210,.7) 0%, rgba(69,252,229,.7) 100%);
                padding: 5px;
            }
            .account-container div:nth-child(2) > * {
                color: rgba(var(--secondColor), 1);
            }
            .account-container div:nth-child(2) {
                display: flex;
                flex-direction: column;
                background: rgb(128,157,210);
                background: linear-gradient(90deg, rgba(128,157,210,.7) 0%, rgba(69,252,229,.7) 100%);
                padding: 20px;
                border-radius: 10px;
            }
            .file {
                position: relative;
                display: flex;
                flex-direction: column;
                justify-content: center;
                gap: 5px;
            }

            .file > input[type='file'] {
                display: none
            }

            .file > label {
                font-size: 1rem;
                font-weight: 300;
                cursor: pointer;
                outline: 0;
                user-select: none;
                border-color: rgb(216, 216, 216) rgb(209, 209, 209) rgb(186, 186, 186);
                border-style: solid;
                border-radius: 4px;
                border-width: 1px;
                background-color: hsl(0, 0%, 100%);
                color: hsl(0, 0%, 29%);
                padding-left: 16px;
                padding-right: 16px;
                padding-top: 16px;
                padding-bottom: 16px;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .file > label:hover {
                border-color: hsl(0, 0%, 21%);
            }

            .file > label:active {
                background-color: hsl(0, 0%, 96%);
            }

            .file > label > i {
                padding-right: 5px;
            }
            
            /* MAKE SURE IF USING ADMIN THERE ON SPECIFIC PALCE, NO SIDEBAR SPACING GIVEN*/
            .yield-content {
                width: auto !important;
                margin-left: 15px !important;
                margin-top: 15px !important;
            }
            
            @media only screen and (max-width: 911px) {
                .yield-content {
                    width: auto !important;
                    margin-left: 15px !important;
                    margin-top: 15px !important;
                }
            }
        </style>

        <div class="account-container">
            <div>
                <span class="account-img">
                    <img src="{{ asset(Auth::user()->img) }}" alt="">
                </span>
                <h2>{!! Auth::user()->name !!}</h2>
            </div>
            <div>
                <table class="table" style="border-radius: 10px; overflow: hidden; color:rgba(var(--mainColor), .7);">
                    <tr>
                        <td>role</td>
                        <td>:</td>
                        <td>{!! Auth::user()->role !!}</td>
                    </tr>
                    <tr>
                        <td>e-mail</td>
                        <td>:</td>
                        <td>{!! Auth::user()->email !!}</td>
                    </tr>
                    <tr>
                        <td>created at</td>
                        <td>:</td>
                        <td>{!! Auth::user()->created_at !!}</td>
                    </tr>
                </table>
                <p style="text-align: center; margin-top:10px; padding: 5px;border-radius: 7px; background: rgba(var(--mainColor), 1)">Upload Image</p>
                <form class='file' enctype="multipart/form-data" method="POST">
                    {{ csrf_field() }}
                    <input id="user-id" hidden value="{!! Auth::user()->id !!}">
                    <label for='input-file'>
                      <img src="{{ asset('res/img/cloud.png') }}" style="width: 30px; margin-right:10px; margin-top:-2px;" alt="">Select a file
                    </label>
                    <input name="img" id='input-file' type='file' />
                    <span style="display: flex; font-size: 15px !important; color: rgba(var(--mainColor), 1)">File Uploaded :&nbsp;<p id="input-file-name" style="margin: 0px;"></p></span>
                </form>
            </div>
        </div>

        <script>
            const fileUpload = document.querySelector('#input-file')
            const fileName = document.querySelector('#input-file-name')
            const idUser = document.querySelector('#user-id').value
            const upButton = 
            fileUpload.addEventListener('change', (e) => {
                e.preventDefault()
                fileName.textContent = fileUpload.value
                
                $.ajax({
                    url:'http://localhost/PWL_UAS_TESTING/account/uploadimage',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: new FormData(document.querySelector('.file')),
                    contentType: false,
                    cache: false,
                    processData: false,
                    async: false,
                    success: (obj) => {
                        // const obj = JSON.parse(data)
                        toast({
                            title: "File",
                            message: "Image succesfully uploaded! reloading page...",
                            type: "info",
                            duration: 2000
                        })
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    },
                    error: (err)=> {
                        console.log(err)
                    }
                })
                
            })
        </script>
    @endif

@endsection