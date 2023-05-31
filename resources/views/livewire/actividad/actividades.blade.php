<div>


    {{-- Alertas --}}

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif


    <div class="card">

             <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <input wire:model="search" class="form-control" placeholder="Buscar por fecha, acción o categoría">
                    </div>
                    <div>
                        <button wire:click="generarReporte" class="btn btn-primary">Generar Reporte por Email</button>
                    </div>
                </div>
            </div>
        
        @if ($actividades->count()) 
            <div class="card-body">
                <table class="table table-striped" id="tabla">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Fecha</th>
                             <th scope="col">IP</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Acción</th>
                           
                            <th scope="col">Detalles</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($actividades as $actividad)
                        <tr>
                            <th scope="row">{{$actividad->id}}</th>
                            <td>{{$actividad->name}}</td>
                            <td>{{$actividad->fecha}}</td>
                            <td>{{$actividad->ip}}</td>
                            <td>{{$actividad->hora}}</td>
                            <td>{{$actividad->accion}}</td>
                            <td>{{$actividad->detalles}}</td>
                        </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>
        
            <div class="card-footer">
                {{ $actividades->links() }}
            </div>
        
        
        @else
            
            <div class="card-body">
                <strong>No se encontraron actividades</strong>
            </div>
        
        @endif
    
    </div>

    
</div>

