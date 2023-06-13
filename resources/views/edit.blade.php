@extends('layouts.admin')
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
            
            <form action= "{{route('surat.update', $surats->id)}}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <fieldset>
                    <legend>Surat</legend>
                    <p>
                       <label for= "pengirim"> Pengirim:</label>
                       <input  name="pengirim" id="pengirim" class="form-control form-control-lg" type="text" value="{{$surats->pengirim}}"  aria-label=".form-control-lg example">
                    </p>
                    <p>
                        <label for= "nomorsurat"> Nomor Surat :</label>
                        <input  name="nomorsurat" id="nomorsurat" class="form-control form-control-lg" type="text" value="{{$surats->nomorsurat}}"  aria-label=".form-control-lg example">
                    </p>
                    <p>
                        <label for= "jenis"> Jenis:</label>
                        <input  name="jenis" id="jenis" class="form-control form-control-lg" type="text" value="{{$surats->jenis}}"  aria-label=".form-control-lg example">
                    </p>
                    
                    <p>
                        <label for= "tanggal">Tanggal:</label>
                        <input  name="tanggal" id="tanggal" class="form-control form-control-lg" type="date" value="{{$surats->tanggal}}"  aria-label=".form-control-lg example">
                    </P>
                     <p>
                       <label for= "nomoragenda"> Nomor agenda:</label>
                       <input  name="nomoragenda" id="nomoragenda" class="form-control form-control-lg" type="text" value="{{$surats->nomoragenda}}"  aria-label=".form-control-lg example">
                    </p>
                    <p>
                        <label for= "perihal"> Perihal :</label>
                        <input  name="perihal" id="perihal" class="form-control form-control-lg" type="text" value="{{$surats->perihal}}"  aria-label=".form-control-lg example">
                    </p>
                    <p>
                        <label for= "asal"> Asal:</label>
                        <input  name="asal" id="asal" class="form-control form-control-lg" type="text" value="{{$surats->asal}}"  aria-label=".form-control-lg example">
                    </p>
                    <p>
                        <label for= "diteruskan"> Diteruskan:</label>
                        <input  name="diteruskan" id="diteruskan" class="form-control form-control-lg" type="text" value="{{$surats->diteruskan}}"  aria-label=".form-control-lg example">
                    </p>
                    <p>
                        <label for= "document">Documen</label>
                        <input  name="document" id="document" class="form-control form-control-lg" type="file" value="{{$surats->document}}" aria-label=".form-control-lg example">
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