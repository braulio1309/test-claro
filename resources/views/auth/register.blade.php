@extends('layouts.app')
<?php
    use App\Models\Paises;
    $paises = Paises::all();
?>

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Cedula</label>

                            <div class="col-md-6">
                                <input id="cedula" type="text" class="form-control"  name="cedula"  required  autofocus>

                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Telefono</label>

                            <div class="col-md-6">
                                <input id="cedula" type="text" class="form-control"  name="celular"   autofocus>

                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">Fecha Nacimiento</label>

                            <div class="col-md-6">
                                <input id="name" type="date" class="form-control" name="nacimiento"  required>

                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-4">
                                <select class="form-control" name="paises" id="paises">
                                    @foreach($paises as $pais)
                                        <option value="{{$pais->id}}">{{ $pais->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div  class="col-sm-4">
                                <select class="form-control" name="estados" id="estados">
                                    
                                </select>
                            </div>
                            <div  class="col-sm-4">
                                <select class="form-control" name="ciudad" id="ciudades">
                                    
                                </select>
                            </div>
                            
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>   
$(document).ready(function(){
    
    $("#paises").change(function(){
    var paises = $(this).val();
    $.get('estados/show/'+paises, function(data){
        console.log(data);
        var producto_select;
            for (var i=0; i<data.length; i++){
            producto_select += `
                <option value="${data[i].id}">${data[i].name}</option>
            `
            }

            $("#estados").html(producto_select);

    });
    });

    $("#estados").change(function(){
    var estados = $(this).val();
    $.get('ciudades/show/'+estados, function(data){
        console.log(data);
        var ciudad_select;
            for (var i=0; i<data.length; i++){
            ciudad_select += `
                <option value="${data[i].id}">${data[i].name}</option>
            `
            }

            $("#ciudades").html(ciudad_select);

    });
    });
});
</script>
@endsection
