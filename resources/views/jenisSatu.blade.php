@extends('layouts.nav')
@section('content')
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
   
    <div id="app">
      <div class="main-wrapper">
        <div class="main-content">
          <div class="container">
            
              
                <h3>Surat masuk smk 4</h3>
            
              <div class="card-body">
                @if (session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                  <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <p>
                  <a class="btn btn-primary" href="{{Route('surat.create')}}">input Surat</a>
                </p>
                <p>
                  
                </p>
                <div class="table-responsive">
                  <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                     <tr>
                      <th>Pengirim</th>
                      <th>Nomor surat</th>
                      <th>Jenis</th>
                      <th>Tanggal</th>
                      <th>Nomor agenda</th>
                      <th>Perihal</th>
                      <th>Asal</th>    
                      <th>Diteruskan</th>                
                       <th>Pilihan </th>
                    
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($jenisSatu as $s)
                      <tr>
                        <td>{{ $s->pengirim }}</td>
                        <td>{{ $s->nomorsurat }}</td>
                        <td>{{ $s->jenis }}</td>
                        <td>{{ $s->tanggal}}</td>
                        <td>{{ $s->nomoragenda }}</td>
                        <td width="200px">{{ $s->perihal }}</td>
                        <td width="200px">{{ $s->asal}}</td>
                        <td>{{$s->diteruskan}}</td>
                       
                        
                        <td width="300px">
                          <a href="{{route('surat.show',$s->id)}}" class="btn btn-warning btn-sm">Lihat</a>
                          
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="8">
                            No record found!
                        </td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
                </div>
                
              
          </div>
        </div>
      </div>
    </div>
  </body>
 
</html>
@endsection