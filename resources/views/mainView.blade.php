<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Always Web App</title>
    <link rel="icon" href="{{ asset('res/img/icons.JPG') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('res/css/main.css') }}">
    </head>

    @if (Auth::check())
        @if(Auth::user()->role == 'operator' || Auth::user()->role == 'admin')
            <style>
                .yield-content {
                    width: auto;
                    margin-left: 215px;
                    margin-top: 15px;
                    margin-right: 15px;
                    margin-bottom: 15px;
                }
                
                @media only screen and (max-width: 911px) {
                    .yield-content {
                        margin-left: 90px;
                    }
                }
            </style>
        @else
        <style>
            .yield-content {
                width: auto;
                margin-left: 15px;
                margin-top: 15px;
            }
        </style>
        @endif
    @endif
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    
    {{-- COMPONENETS --}}
    @include('components.toast')
    @include('components.navbar')

    <div class="yield-content">
        @yield('content')
    </div>
   
    {{-- CHECK IF THERE IS RESTRICTED ACCESS DATA PASSED FROM CHECKROLE --}}
    @if(Session::has('checkRoleInfo'))
        <script>
            toast({
                title: "Error",
                message: {!! json_encode(Session::get('checkRoleInfo')) !!},
                type: "error",
                duration: 6000
            })
        </script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>