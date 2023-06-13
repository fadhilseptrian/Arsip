@extends('layouts.nav')
@section('content')
    <!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

        <!-- Scripts -->
        @viteReactRefresh
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My App</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>

    <body>
    
        <div id="app">
            <div class="main-wrapper">
                <div class="main-content">

                    <div class="container">
                        
                            <div class="card-header">

                                <h3>Surat smk 4</h3>
                            </div>
                            
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif

                                @if(Auth::user()->role==0 || Auth::user()->role==1)                                  
                               
                            <p>
                                    <a class="btn btn-primary" href="{{ Route('surat.create') }}">input Surat</a>

                                
                                @endif
                            @if(Auth::user()->role==0)
                                <a class="btn btn-primary" href="{{ Route('user.index') }}">Lihat pengguna</a>
                            @endif  
                            
                            </p>
<div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="table table-dark">
                                        <tr>
                                            <th>Pengirim</th>
                                            <th>Nomor surat</th>
                                            <th>Jenis</th>
                                            <th>Tanggal</th>
                                            <th>Nomor agenda</th>
                                            <th>Perihal</th>
                                            <th>Asal</th>
                                            <th>diteruskan</th>
                                            <th>Pilihan </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($surat as $s)
                                            <tr>
                                                <td>{{ $s->pengirim }}</td>
                                                <td>{{ $s->nomorsurat }}</td>
                                                <td>{{ $s->jenis }}</td>
                                                <td>{{ $s->tanggal }}</td>
                                                <td>{{ $s->nomoragenda }}</td>
                                                <td>{{ $s->perihal }}</td>
                                                <td>{{ $s->asal }}</td>
                                                <td>{{ $s->diteruskan }}</td>


                                                <td width="300px">
                                                    @if (Auth::user()->role == 1 || Auth::user()->role == 2)
                                                        <a href="{{ route('surat.show', $s->id) }}"
                                                            class="btn btn-warning btn-sm">Lihat</a>
                                                    @elseif (Auth::user()->role == 0)
                                                        <a href="{{ route('surat.show', $s->id) }}"
                                                            class="btn btn-warning btn-sm">Lihat</a>
                                                        <a href="{{ route('surat.edit', $s->id) }}"
                                                            class="btn btn-secondary btn-sm">edit</a>
                                                        <a href="{{ route('surat.destroy', $s->id) }}"
                                                            class="btn btn-sm btn-danger"
                                                            onclick="
                                                                          event.preventDefault();
                                                                          if (confirm('Do you want to remove this?')) {
                                                                          document.getElementById('delete-row-$s->id').submit();
                                                                           }">
                                                            delete
                                                        </a>

                                                        <form id="delete-row-$s->id"
                                                            action="{{ route('surat.destroy', $s->id) }}" method="POST">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            @csrf
                                                        </form>
                                                    @endif
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
