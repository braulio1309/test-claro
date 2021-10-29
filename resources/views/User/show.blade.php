@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Fecha de nacimiento</th>
                    <th scope="col">Ciudad</th>
                    <th scope="col">Acciones</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->cedula}}</th>
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->email}}</td>
                            <td>{{ $user->telefono}}</td>
                            <td>
                                <?php 
                                    $date1 = new DateTime($user->birthdate);
                                    $date2 = new DateTime( parse_str(date('m-d-Y')));
                                    $diff = $date1->diff($date2);
                                ?>
                                    {{$diff->y}}      
                                </td>
                            <td>{{ $user->birthdate}}</td>
                            <td>{{ $user->ciudad}}</td>
                            <td>
                                <form accion="{{route("user.destroy", $user->id)}}" method='POST'>
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger"> Eliminar </button>
                             </form>
                                
                                <a class="btn btn-success" href="{{route('user.edit',['user'=>$user->id] )}}">Actualizar</a>

                            </td>
                        </tr>
                    @endforeach
                    {{ $users->links() }}
                  
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection

