<br>

<form action="{{url('/companies/')}}" method="post" enctype="multipart/form-data">

    @csrf
    @include('companies.form',['modo'=>'Crear']);

</form>