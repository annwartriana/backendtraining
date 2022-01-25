<br>

<form action="{{url('/companies/'.$companie->id)}}" method="post" enctype="multipart/form-data">    

@csrf

{{method_field('PATCH')}}

@include('companies.form',['modo'=>'Editar']);





</form>