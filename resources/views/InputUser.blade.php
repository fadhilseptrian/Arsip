@extends('layouts.nav')
@section('content')
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Input') }}</title>
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
      
        <h1>input data</h1>
        <div class="container">
            <form id= "form_surat" action= "{{Route('user.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <legend>Surat</legend>
                    <p>
                        <label for= "name"> name:</label>
                        <input  name="name" id="username" class="form-control form-control-lg" type="text" aria-label=".form-control-lg example">
                     </p>
                     <p>
                         <label for= "email">  Email:</label>
                         <input  name="email" id="email" class="form-control form-control-lg" type="text"  aria-label=".form-control-lg example">
                     </p>
                     <p>
                         <label for= "password"> Password:</label>
                         <input  name="password" id="password" class="form-control form-control-lg" type="text"  aria-label=".form-control-lg example">
                     </p>
                     
                     <p>
                         <label for= "role">Role:</label>
                         <input  name="role" id="role" class="form-control form-control-lg" type="text"  aria-label=".form-control-lg example">
                     </P>
                    
                </fieldset>
                <p>
                    <input type="submit" name="input" value="Tambah Data">
                </p>
            </form>  
        </div>      
    </body>
</html>    
@endsection