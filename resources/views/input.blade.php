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
            <form id= "form_surat" action= "{{Route('surat.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <legend>Surat</legend>
                    <p>
                        <label for= "pengirim"> Pengirim:</label>
                        <input  name="pengirim" id="pengirim" class="form-control form-control-lg" type="text" aria-label=".form-control-lg example">
                     </p>
                     <p>
                         <label for= "nomorsurat"> Nomor Surat :</label>
                         <input  name="nomorsurat" id="nomorsurat" class="form-control form-control-lg" type="text"  aria-label=".form-control-lg example">
                     </p>
                     <p>
                        <label  for="jenis">Jenis  :</label>
                        <select name="jenis" id="jenis" class="form-select" type="text"  aria-label=".form-control-lg example">>
                          <option></option>
                          <option>Masuk</option>
                          <option>Keluar</option>
                        </select>
                     </p>
                     
                     <p>
                         <label for= "tanggal">Tanggal:</label>
                         <input  name="tanggal" id="tanggal" class="form-control form-control-lg" type="date"  aria-label=".form-control-lg example">
                     </P>
                     <p>
                        <label for= "nomoragenda"> Nomor agenda:</label>
                        <input  name="nomoragenda" id="nomoragenda" class="form-control form-control-lg" type="text" aria-label=".form-control-lg example">
                     </p>
                     <p>
                         <label for= "perihal"> Perihal :</label>
                         <input  name="perihal" id="perihal" class="form-control form-control-lg" type="text"  aria-label=".form-control-lg example">
                     </p>
                     <p>
                         <label for= "asal"> Asal:</label>
                         <input  name="asal" id="asal" class="form-control form-control-lg" type="text"  aria-label=".form-control-lg example">
                     </p>
                     <p>
                        <label for= "diteruskan"> Diteruskan:</label>
                        <input  name="diteruskan" id="diteruskan" class="form-control form-control-lg" type="text"  aria-label=".form-control-lg example">
                    </p>
                     
                    
                    <p>
                        <label for= "document">Documen: jpg</label>
                        <input  name="document" id="document" class="form-control form-control-lg" type="file" aria-label=".form-control-lg example">
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