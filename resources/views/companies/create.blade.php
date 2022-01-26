@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{url('/companies/')}}" method="post" enctype="multipart/form-data">

    @csrf
    @include('companies.form',['modo'=>'Crear']);

</form>
</div>
@endsection