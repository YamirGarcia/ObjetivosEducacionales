@extends('layouts.app')


@section('estilos')
<link rel="stylesheet" type="text/css" href="/css/estiloRoles.css">
<link rel="stylesheet" type="text/css" href="/css/estilofondo.css">
@endsection

@section('content')

    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Rol</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            
                        @if ($errors->any())                                                
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos!</strong>                        
                                @foreach ($errors->all() as $error)                                    
                                    <span class="badge badge-danger">{{ $error }}</span>
                                @endforeach                        
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        @endif

                    {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">Nombre del Rol:</label>      
                                {!! Form::text('name', null, array('class' => 'form-control')) !!}
                            </div>
                        </div>



                        <div class="bloque">
                            <h3>Roles</h3>
                            <div class="column">
                                <input type="checkbox" id="Seleccion-Roles"> Seleccionar Todos
                            </div>
                                <div class="column" id="lista-roles">
                                    <input class="opcion" type="checkbox" name="permission[]" value="1"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 1) checked 
                                        @endif
                                    @endforeach
                                    > Ver Roles
                                </div>
                                <div class="opcion" class="column" id="lista-roles">
                                    <input type="checkbox" name="permission[]" value="2"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 2) checked 
                                        @endif
                                    @endforeach
                                    > Crear Roles
                                </div>
                                <div class="opcion" class="column" id="lista-roles">
                                    <input type="checkbox" name="permission[]" value="3"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 3) checked 
                                        @endif
                                    @endforeach
                                    > Editar Roles
                                </div>
                                <div class="opcion" class="column" id="lista-roles">
                                    <input type="checkbox" name="permission[]" value="4"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 4) checked 
                                        @endif
                                    @endforeach
                                    > Eliminar Roles
                                </div>
                        </div>
                        <div class="bloque">
                            <h3>Carreras</h3>
                            <div class="column">
                                <input type="checkbox" id="Seleccion-Carreras"> Seleccionar Todos
                            </div>
                                <div class="column" id="lista-carreras">
                                    <input class="opcion" type="checkbox" name="permission[]" value="5"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 5) checked 
                                        @endif
                                @endforeach> Ver Carreras
                                </div>
                                <div class="opcion" class="column" id="lista-carreras">
                                    <input type="checkbox" name="permission[]" value="6"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 6) checked 
                                        @endif
                                @endforeach> Crear Carreras
                                </div>
                                <div class="opcion" class="column" id="lista-carreras">
                                    <input type="checkbox" name="permission[]" value="7"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 7) checked 
                                        @endif
                                @endforeach> Editar Carreras
                                </div>
                                <div class="opcion" class="column" id="lista-carreras">
                                    <input type="checkbox" name="permission[]" value="8"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 8) checked 
                                        @endif
                                @endforeach> Eliminar Carreras
                                </div>
                                
                        </div>
                        <div class="bloque">
                            <h3>Usuarios</h3>
                            <div class="column">
                                <input type="checkbox" id="Seleccion-Usuarios"> Seleccionar Todos
                            </div>
                                <div class="column" id="lista-usuarios">
                                    <input class="opcion" type="checkbox" name="permission[]" value="9"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 9) checked 
                                        @endif
                                @endforeach> Ver Usuarios
                                </div>
                                <div class="opcion" class="column" id="lista-usuarios">
                                    <input type="checkbox" name="permission[]" value="10"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 10) checked 
                                        @endif
                                @endforeach> Crear Usuarios
                                </div>
                                <div class="opcion" class="column" id="lista-usuarios">
                                    <input type="checkbox" name="permission[]" value="11"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 11) checked 
                                        @endif
                                @endforeach> Editar Usuarios
                                </div>
                                <div class="opcion" class="column" id="lista-usuarios">
                                    <input type="checkbox" name="permission[]" value="12"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 12) checked 
                                        @endif
                                @endforeach> Eliminar Usuarios
                                </div>                                            
                        </div>


                        {{-- En teoria esto ya no sirve --}}
                        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">Permisos para este Rol:</label>
                                <br/>
                                @foreach($permission as $value)
                                    <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                    {{ $value->name }}</label>
                                <br/>
                                @endforeach
                            </div>
                        </div> --}}
                        
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        
                    </div>
                    {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('scripts')
<script>
    // Sccript para roles
    $(function(){
        $('#Seleccion-Roles').change(function() {
          $('#lista-roles > input[type=checkbox]').prop('checked', $(this).is(':checked'));
        });
      });

    //   script para carreras
    $(function(){
        $('#Seleccion-Carreras').change(function() {
          $('#lista-carreras > input[type=checkbox]').prop('checked', $(this).is(':checked'));
        });
      });

    //   script para usuarios
    $(function(){
        $('#Seleccion-Usuarios').change(function() {
          $('#lista-usuarios > input[type=checkbox]').prop('checked', $(this).is(':checked'));
        });
      });
</script>
@endsection