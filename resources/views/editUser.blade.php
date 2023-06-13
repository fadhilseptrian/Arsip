@extends('layouts.nav')
@section('content')
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    
        <!-- Scripts -->
        @viteReactRefresh
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <style>
            h1{
                text-align : center;
            }
            .container{
                width : 400px;
                margin : auto;
            }
        </style>
    </head>
    <body>
        <h1>Edit data</h1>
        <div class="container">
            
            <form action= "{{route('user.update', $users)}}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <fieldset>
                    <legend>Data</legend>
                    <p>
                       <label for= "name"> Name:</label>
                       <input  name="name" id="name" class="form-control form-control-lg" type="text" value="{{$users->name}}"  aria-label=".form-control-lg example" readonly>
                    </p>
                    <p>
                        <label for= "email"> Email :</label>
                        <input  name="email" id="email" class="form-control form-control-lg" type="text" value="{{$users->email}}"  aria-label=".form-control-lg example" readonly>
                    </p>
                    <p>
                        <label for= "password"> Password:</label>
                        <input  name="password" id="password" class="form-control form-control-lg" type="text" value="{{$users->password}}"  aria-label=".form-control-lg example" readonly>
                    </p>
                    
                    <p>
                        <label for= "role">Role:</label>
                        <input  name="role" id="role" class="form-control form-control-lg" type="text" value="{{$users->role}}"  aria-label=".form-control-lg example">
                    </P>
                     
                </fieldset>
                <p>
                    <input type="submit" name="input" value="Edit Data">
                </p>
            </form>  
        </div>      
    </body>
</html> 
@endsection   