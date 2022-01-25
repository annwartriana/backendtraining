<h1>{{$modo }} Compañia</h1>
    <br>
    <label for="Nombre"> Nombre</label>
    <input type="text" name="Name" value="{{isset($companie->name)? $companie->name:''}}" id="name"><br>
    
    <label for="email"> Email</label>
    <input type="text" name="email" value="{{isset($companie->email)? $companie->email:''}}" id="email"><br>

    <label for="website"> Website</label>
    <input type="text" name="website" value="{{isset($companie->website)? $companie->website: ''}}" id="website"><br>

    <label for="logo"> Logo</label>
    

    @if (isset ($companie->logo))
    <img src="{{asset('storage').'/'.$companie->logo}}" width="100" height="100" alt="LogoCompanie">
    @endif
    <input type="file" name="logo"  id="logo"> <br>

    <input type="submit" value="{{ $modo }} datos"><br>

    <br>
    <a href="{{url('companies')}}">Regresar</a>