
<div id="main">
   <div class="card">
    <div class="card-header">
        <input wire:model="search"  class="form-control" placeholder="Ingrese el nombre o correo de un usuario">
    </div>

@if ($users->count())
    

    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>EMAIL</th>
                    <th>ROL</th>
                    <th> ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role_name}}</td>
                        @can('admin.users.edit')
                            <td width="10px">
                                <a href="{{route('admin.users.edit',$user)}}" class="btn btn-primary"> Editar</a>
                            </td>
                        @else
                            <td width="10px">
                                <a href="#" class="btn btn-primary" > Editar</a>
                            </td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    
    <div class="card-footer">
        {{$users->links()}}
    </div>

@else
    

    <div class="card-body">
        <strong>No se encontraron usuarios</strong>
    </div>
 

@endif


   </div>
</div>
