@extends('layouts.app')


@section('estilos')
<link rel="stylesheet" type="text/css" href="/css/estiloRoles.css">
<link rel="stylesheet" type="text/css" href="/css/estilofondo.css">

<link rel="stylesheet" type="text/css" href="/css/estilosGenerales.css">
@endsection

@section('content')

    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">

            <a style="text-decoration: none; color: #6c757d" href="/roles">Roles</a>

            <a style="text-decoration: none; color: #6c757d" href="{{ route('roles.edit', $role->id) }}">/ Editar Rol</a>
            </h3>
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
                        <div class="bloque" style="width: 400px; height: 400px">
                            <h3>Objetivos Educacionales</h3>
                            <div class="column">
                                <input type="checkbox" id="Seleccion-Objetivos"> Seleccionar Todos
                            </div>
                                <div class="column" id="lista-objetivos">
                                    <input class="opcion" type="checkbox" name="permission[]" value="13"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 13) checked 
                                        @endif
                                @endforeach> Ver Objetivos Educacionales
                                </div>
                                <div class="opcion" class="column" id="lista-objetivos">
                                    <input type="checkbox" name="permission[]" value="14"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 14) checked 
                                        @endif
                                @endforeach> Crear Objetivos Educacionales
                                </div>
                                <div class="opcion" class="column" id="lista-objetivos">
                                    <input type="checkbox" name="permission[]" value="15"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 15) checked 
                                        @endif
                                @endforeach> Editar Objetivos Educacionales
                                </div>
                                <div class="opcion" class="column" id="lista-objetivos">
                                    <input type="checkbox" name="permission[]" value="16"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 16) checked 
                                        @endif
                                @endforeach> Eliminar Objetivos Educacionales
                                </div>
                                
                                <h5>Aspectos</h5> 
                                <div class="opcion" class="column" id="lista-objetivos">
                                    <input type="checkbox" name="permission[]" value="17"@foreach ( $rolePermissions as $rol)
                                    @if ( $rol == 17) checked 
                                    @endif
                            @endforeach> Ver Aspectos
                                </div> 
                                <div class="opcion" class="column" id="lista-objetivos">
                                    <input type="checkbox" name="permission[]" value="18"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 18) checked 
                                        @endif
                                @endforeach> Crear Aspectos
                                </div>
                                <div class="opcion" class="column" id="lista-objetivos">
                                    <input type="checkbox" name="permission[]" value="19"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 19) checked 
                                        @endif
                                @endforeach> Editar Aspectos
                                </div> 
                                <div class="opcion" class="column" id="lista-objetivos">
                                    <input type="checkbox" name="permission[]" value="20"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 20) checked 
                                        @endif
                                @endforeach> Eliminar Aspectos
                                </div>
                                <h5>Preguntas</h5> 
                                <div class="opcion" class="column" id="lista-objetivos">
                                    <input type="checkbox" name="permission[]" value="21"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 21) checked 
                                        @endif
                                @endforeach> Ver Preguntas 
                                </div> 
                                <div class="opcion" class="column" id="lista-objetivos">
                                    <input type="checkbox" name="permission[]" value="22"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 22) checked 
                                        @endif
                                @endforeach> Crear Preguntas 
                                </div>
                                <div class="opcion" class="column" id="lista-objetivos">
                                    <input type="checkbox" name="permission[]" value="23"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 23) checked 
                                        @endif
                                @endforeach> Editar Preguntas 
                                </div> 
                                <div class="opcion" class="column" id="lista-objetivos">
                                    <input type="checkbox" name="permission[]" value="24"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 24) checked 
                                        @endif
                                @endforeach> Eliminar Preguntas 
                                </div>                                          
                        </div>
                        <div class="bloque" style="height: 400px">
                            <h3>Atributos</h3>
                            <div class="column">
                                <input type="checkbox" id="Seleccion-Atributos"> Seleccionar Todos
                            </div>
                                <div class="column" id="lista-atributos">
                                    <input class="opcion" type="checkbox" name="permission[]" value="25"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 25) checked 
                                        @endif
                                @endforeach> Ver Atributos
                                </div>
                                <div class="opcion" class="column" id="lista-atributos">
                                    <input type="checkbox" name="permission[]" value="26"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 26) checked 
                                        @endif
                                @endforeach> Crear Atributos
                                </div>
                                <div class="opcion" class="column" id="lista-atributos">
                                    <input type="checkbox" name="permission[]" value="27"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 27) checked 
                                        @endif
                                @endforeach> Editar Atributos
                                </div>
                                <div class="opcion" class="column" id="lista-atributos">
                                    <input type="checkbox" name="permission[]" value="28"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 28) checked 
                                        @endif
                                @endforeach> Eliminar Atributos
                                </div>
                                <h5>Aspectos</h5> 
                                <div class="opcion" class="column" id="lista-atributos">
                                    <input type="checkbox" name="permission[]" value="29"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 29) checked 
                                        @endif
                                @endforeach> Ver Aspectos
                                </div> 
                                <div class="opcion" class="column" id="lista-atributos">
                                    <input type="checkbox" name="permission[]" value="30"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 30) checked 
                                        @endif
                                @endforeach> Crear Aspectos
                                </div>
                                <div class="opcion" class="column" id="lista-atributos">
                                    <input type="checkbox" name="permission[]" value="31"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 31) checked 
                                        @endif
                                @endforeach> Editar Aspectos
                                </div> 
                                <div class="opcion" class="column" id="lista-atributos">
                                    <input type="checkbox" name="permission[]" value="32"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 32) checked 
                                        @endif
                                @endforeach> Eliminar Aspectos
                                </div>
                                <h5>Preguntas</h5> 
                                <div class="opcion" class="column" id="lista-atributos">
                                    <input type="checkbox" name="permission[]" value="33"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 33) checked 
                                        @endif
                                @endforeach> Ver Preguntas 
                                </div> 
                                <div class="opcion" class="column" id="lista-atributos">
                                    <input type="checkbox" name="permission[]" value="34"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 34) checked 
                                        @endif
                                @endforeach> Crear Preguntas 
                                </div>
                                <div class="opcion" class="column" id="lista-atributos">
                                    <input type="checkbox" name="permission[]" value="35"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 35) checked 
                                        @endif
                                @endforeach> Editar Preguntas 
                                </div> 
                                <div class="opcion" class="column" id="lista-atributos">
                                    <input type="checkbox" name="permission[]" value="36"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 36) checked 
                                        @endif
                                @endforeach> Eliminar Preguntas 
                                </div>                                           
                        </div>
                        <div class="bloque">
                            <h3>Evaluadores</h3>
                            <div class="column">
                                <input type="checkbox" id="Seleccion-Evaluadores"> Seleccionar Todos
                            </div>
                                <div class="column" id="lista-evaluadores">
                                    <input class="opcion" type="checkbox" name="permission[]" value="37"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 37) checked 
                                        @endif
                                @endforeach> Ver Evaluadores
                                </div>
                                <div class="opcion" class="column" id="lista-evaluadores">
                                    <input type="checkbox" name="permission[]" value="38"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 38) checked 
                                        @endif
                                @endforeach> Crear Evaluadores
                                </div>
                                <div class="opcion" class="column" id="lista-evaluadores">
                                    <input type="checkbox" name="permission[]" value="39"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 39) checked 
                                        @endif
                                @endforeach> Editar Evaluadores
                                </div>
                                <div class="opcion" class="column" id="lista-evaluadores">
                                    <input type="checkbox" name="permission[]" value="40"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 40) checked 
                                        @endif
                                @endforeach> Eliminar Evaluadores
                                </div>   
                                <div class="opcion" class="column" id="lista-evaluadores">
                                    <input type="checkbox" name="permission[]" value="41"
                                    @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 41) checked 
                                        @endif
                                @endforeach> Visualizar Datos
                                </div>                                       
                        </div>

                        <div class="bloque" style="width: auto; height: auto;">
                            <h3>Encuestas</h3>
                            <div class="column">
                                <input type="checkbox" id="Seleccion-Encuestas"> Seleccionar Todos
                            </div>
                            <div class="row" style="display: flex;">
                                <div style="width: 400px; margin-right: 20px; height: auto;">
                                    <h5>Encuestas Objetivos Educaionales</h5>
                                    <div class="opcion" id="lista-encuestas">
                                        <input type="checkbox" name="permission[]" value="42"
                                        @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 42) checked 
                                        @endif
                                @endforeach> Ver Encuestas de
                                        Objetivos Educacioanles
                                    </div>
                                    <div class="opcion" id="lista-encuestas">
                                        <input type="checkbox" name="permission[]" value="43"
                                        @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 43) checked 
                                        @endif
                                @endforeach> Crear Encuestas de
                                        Objetivos Educacioanles
                                    </div>
                                    {{-- <div class="opcion" id="lista-encuestas">
                                        <input type="checkbox" name="permission[]" value="44"
                                        @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 44) checked 
                                        @endif
                                @endforeach> Editar Encuestas de
                                        Objetivos Educacioanles
                                    </div>
                                    <div class="opcion" id="lista-encuestas">
                                        <input type="checkbox" name="permission[]" value="45"
                                        @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 45) checked 
                                        @endif
                                @endforeach> Eliminar Encuestas de
                                        Objetivos Educacioanles
                                    </div> --}}
                                </div>
                                <div style="width: 400px">
                                    <h5>Encuestas Atributos</h5>
                                    <div class="opcion" id="lista-encuestas">
                                        <input type="checkbox" name="permission[]" value="46"
                                        @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 46) checked 
                                        @endif
                                @endforeach> Ver Encuestas de Atributos
                                    </div>
                                    <div class="opcion" id="lista-encuestas">
                                        <input type="checkbox" name="permission[]" value="47"
                                        @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 47) checked 
                                        @endif
                                @endforeach> Crear Encuestas de Atributos
                                        Evaluaasdfdores
                                    </div>
                                    {{-- <div class="opcion" id="lista-encuestas">
                                        <input type="checkbox" name="permission[]" value="48"
                                        @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 48) checked 
                                        @endif
                                @endforeach> Ediar Encuestas de Atributos
                                        Evalasdfuadores
                                    </div>
                                    <div class="opcion" id="lista-encuestas">
                                        <input type="checkbox" name="permission[]" value="49"
                                        @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 49) checked 
                                        @endif
                                @endforeach> Eliminar Encuestas de Atributos
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="bloque">
                            <h3>Contestar Encuestas</h3>
                            <div class="opcion" class="column" id="lista-Cencuestas">
                                <input type="checkbox" name="permission[]" value="50"
                                @foreach ( $rolePermissions as $rol)
                                        @if ( $rol == 50) checked 
                                        @endif
                                @endforeach> Contestar Encuestas
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <button type="submit" class="boton-submit">Guardar</button>
                        </div>
                        
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
      // script para Objetivos educaionales
      $(function(){
        $('#Seleccion-Objetivos').change(function() {
          $('#lista-objetivos > input[type=checkbox]').prop('checked', $(this).is(':checked'));
        });
      });

      // scirpt para atributos
      $(function(){
        $('#Seleccion-Atributos').change(function() {
          $('#lista-atributos > input[type=checkbox]').prop('checked', $(this).is(':checked'));
        });
      });

      // scirpt para evaluadores
      $(function(){
        $('#Seleccion-Evaluadores').change(function() {
          $('#lista-evaluadores > input[type=checkbox]').prop('checked', $(this).is(':checked'));
        });
      });
      
      // scirpt para encuestas
      $(function() {
            $('#Seleccion-Encuestas').change(function() {
                $('#lista-encuestas > input[type=checkbox]').prop('checked', $(this).is(':checked'));
            });
        });
</script>
@endsection