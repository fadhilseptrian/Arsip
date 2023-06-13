@extends('layouts.nav')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @viteReactRefresh
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<style>
    img{
        margin-left: 25%;
        width: 50%;
        height: 50%;;
    }
</style>
<body>
    <div class="container">
        
    @foreach ($surats as $surat)
        
    <img src="{{asset('file/'. $surat->document)}}">
    
    @endforeach
    </div>
   
 
</body>
</html>
@endsection