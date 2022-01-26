@extends('layouts.app')

@section('content')
<div class="container">
<br>
@if(Session::has('mensaje'))
{{Session::get('mensaje')}}
@endif
<br>
<a href="{{url('companies/create')}}" class= "btn btn-success">Ingresar Nueva Compañia</a>
<br>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Website</th>
            <th>Logo</th>
            <th>Acciones</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($companiesList as $companies)
        <tr>
            <td>{{$companies->id}}</td>

            <td>{{$companies->name}}</td>

            <td>{{$companies->email}}</td>

            <td>{{$companies->website}}</td>

            <td>
                <img src="{{asset('storage').'/'.$companies->logo}}" width="100" height="100" alt="LogoCompanie">
                {{$companies->logo}}
            </td>


            <td>
            
            <a href ="{{url('/companies/'.$companies->id.'/edit')}}" class="btn btn-primary">Editar </a>

            <form action="{{url('/companies/'.$companies->id)}}" method="post">
            @csrf
            {{method_field('DELETE')}}
            <input type="submit" onclick="return confirm('Eliminarás el registro')" class="btn btn-danger" value="Eliminar">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection