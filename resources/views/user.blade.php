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
            <div class="card mt-5">
              <div class="card-header">
                <h3>Pengguna</h3>
              </div>
              <div class="card-body">
                @if (session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                  <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                 <p>
                <a class="btn btn-primary" href="{{ Route('user.create') }}">input data</a>
               
                  
                
                <table class="table table-striped table-bordered">
                  <thead class="table table-dark">
                    <tr>
                     <th>name</th>
                     <th>Email</th>
                     <th>role</th>
                     <th>Pilihan</th>      
                    
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($user as $s)
                      <tr>
                       <td>{{ $s->name}}</td>
                        <td>{{ $s->email}} </td>
                        <td>{{ $s->role}}</td>
                        <td>
                          
                           
                          
                                
                                <a href="{{ route('user.editUser', $s->id) }}"
                                    class="btn btn-secondary btn-sm">edit</a>
                                <a href="{{ route('user.destroy', $s->id) }}"
                                    class="btn btn-sm btn-danger"
                                    onclick="
                                                  event.preventDefault();
                                                  if (confirm('Do you want to remove this?')) {
                                                  document.getElementById('delete-row-$s->id').submit();
                                                   }">
                                    delete
                                </a>

                                <form id="delete-row-$s->id"
                                    action="{{ route('user.destroy', $s->id) }}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    @csrf
                                </form>
                           
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
    </div>

  </body>
 
</html>
@endsection