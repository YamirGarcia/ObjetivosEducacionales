@extends('layouts.app')

@section('estilos')
<link rel="stylesheet" type="text/css" href="../css/estiloRoles.css">
<link rel="stylesheet" type="text/css" href="/css/estilofondo.css">
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Rol</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert" >
                                    <strong>¡Revisa los Campos!</strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{$error}}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            
                            {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                            <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Nombre del Rol</label>
                                            {!! Form::text('name', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="bloque">
                                        <h3>Roles</h3>
                                        <div class="column">
                                            <input type="checkbox" id="Seleccion-Roles"> Seleccionar Todos
                                        </div>
                                            <div class="column" id="lista-roles">
                                                <input class="opcion" type="checkbox" name="permission[]" value="1"> Ver Roles
                                            </div>
                                            <div class="opcion" class="column" id="lista-roles">
                                                <input type="checkbox" name="permission[]" value="2"> Crear Roles
                                            </div>
                                            <div class="opcion" class="column" id="lista-roles">
                                                <input type="checkbox" name="permission[]" value="3"> Editar Roles
                                            </div>
                                            <div class="opcion" class="column" id="lista-roles">
                                                <input type="checkbox" name="permission[]" value="4"> Eliminar Roles
                                            </div>
                                    </div>
                                    <div class="bloque">
                                        <h3>Carreras</h3>
                                        <div class="column">
                                            <input type="checkbox" id="Seleccion-Carreras"> Seleccionar Todos
                                        </div>
                                            <div class="column" id="lista-carreras">
                                                <input class="opcion" type="checkbox" name="permission[]" value="5"> Ver Carreras
                                            </div>
                                            <div class="opcion" class="column" id="lista-carreras">
                                                <input type="checkbox" name="permission[]" value="6"> Crear Carreras
                                            </div>
                                            <div class="opcion" class="column" id="lista-carreras">
                                                <input type="checkbox" name="permission[]" value="7"> Editar Carreras
                                            </div>
                                            <div class="opcion" class="column" id="lista-carreras">
                                                <input type="checkbox" name="permission[]" value="8"> Eliminar Carreras
                                            </div>
                                            
                                    </div>
                                    <div class="bloque">
                                        <h3>Usuarios</h3>
                                        <div class="column">
                                            <input type="checkbox" id="Seleccion-Usuarios"> Seleccionar Todos
                                        </div>
                                            <div class="column" id="lista-usuarios">
                                                <input class="opcion" type="checkbox" name="permission[]" value="9"> Ver Usuarios
                                            </div>
                                            <div class="opcion" class="column" id="lista-usuarios">
                                                <input type="checkbox" name="permission[]" value="10"> Crear Usuarios
                                            </div>
                                            <div class="opcion" class="column" id="lista-usuarios">
                                                <input type="checkbox" name="permission[]" value="11"> Editar Usuarios
                                            </div>
                                            <div class="opcion" class="column" id="lista-usuarios">
                                                <input type="checkbox" name="permission[]" value="12"> Eliminar Usuarios
                                            </div>                                         
                                    </div>
                                    <div class="bloque" style="width: 400px; height: 400px">
                                        <h3>Objetivos Educacionales</h3>
                                        <div class="column">
                                            <input type="checkbox" id="Seleccion-Objetivos"> Seleccionar Todos
                                        </div>
                                            <div class="column" id="lista-objetivos">
                                                <input class="opcion" type="checkbox" name="permission[]" value="13"> Ver Objetivos Educacionales
                                            </div>
                                            <div class="opcion" class="column" id="lista-objetivos">
                                                <input type="checkbox" name="permission[]" value="14"> Crear Objetivos Educacionales
                                            </div>
                                            <div class="opcion" class="column" id="lista-objetivos">
                                                <input type="checkbox" name="permission[]" value="15"> Editar Objetivos Educacionales
                                            </div>
                                            <div class="opcion" class="column" id="lista-objetivos">
                                                <input type="checkbox" name="permission[]" value="16"> Eliminar Objetivos Educacionales
                                            </div>
                                            <h5>Aspectos</h5> 
                                            <div class="opcion" class="column" id="lista-objetivos">
                                                <input type="checkbox" name="permission[]" value="17"> Ver Aspectos
                                            </div> 
                                            <div class="opcion" class="column" id="lista-objetivos">
                                                <input type="checkbox" name="permission[]" value="18"> Crear Aspectos
                                            </div>
                                            <div class="opcion" class="column" id="lista-objetivos">
                                                <input type="checkbox" name="permission[]" value="19"> Editar Aspectos
                                            </div> 
                                            <div class="opcion" class="column" id="lista-objetivos">
                                                <input type="checkbox" name="permission[]" value="20"> Eliminar Aspectos
                                            </div>
                                            <h5>Preguntas</h5> 
                                            <div class="opcion" class="column" id="lista-objetivos">
                                                <input type="checkbox" name="permission[]" value="21"> Ver Preguntas 
                                            </div> 
                                            <div class="opcion" class="column" id="lista-objetivos">
                                                <input type="checkbox" name="permission[]" value="22"> Crear Preguntas 
                                            </div>
                                            <div class="opcion" class="column" id="lista-objetivos">
                                                <input type="checkbox" name="permission[]" value="23"> Editar Preguntas 
                                            </div> 
                                            <div class="opcion" class="column" id="lista-objetivos">
                                                <input type="checkbox" name="permission[]" value="24"> Eliminar Preguntas 
                                            </div>    
                                                                                    
                                    </div>
                                    <div class="bloque" style="height: 400px">
                                        <h3>Atributos</h3>
                                        <div class="column">
                                            <input type="checkbox" id="Seleccion-Atributos"> Seleccionar Todos
                                        </div>
                                            <div class="column" id="lista-atributos">
                                                <input class="opcion" type="checkbox" name="permission[]" value="25"> Ver Atributos
                                            </div>
                                            <div class="opcion" class="column" id="lista-atributos">
                                                <input type="checkbox" name="permission[]" value="26"> Crear Atributos
                                            </div>
                                            <div class="opcion" class="column" id="lista-atributos">
                                                <input type="checkbox" name="permission[]" value="27"> Editar Atributos
                                            </div>
                                            <div class="opcion" class="column" id="lista-atributos">
                                                <input type="checkbox" name="permission[]" value="28"> Eliminar Atributos
                                        </div>
                                        <h5>Aspectos</h5> 
                                        <div class="opcion" class="column" id="lista-atributos">
                                            <input type="checkbox" name="permission[]" value="29"> Ver Aspectos
                                        </div> 
                                        <div class="opcion" class="column" id="lista-atributos">
                                            <input type="checkbox" name="permission[]" value="30"> Crear Aspectos
                                        </div>
                                        <div class="opcion" class="column" id="lista-atributos">
                                            <input type="checkbox" name="permission[]" value="31"> Editar Aspectos
                                        </div> 
                                        <div class="opcion" class="column" id="lista-atributos">
                                            <input type="checkbox" name="permission[]" value="32"> Eliminar Aspectos
                                        </div>
                                        <h5>Preguntas</h5> 
                                        <div class="opcion" class="column" id="lista-atributos">
                                            <input type="checkbox" name="permission[]" value="33"> Ver Preguntas 
                                        </div> 
                                        <div class="opcion" class="column" id="lista-atributos">
                                            <input type="checkbox" name="permission[]" value="34"> Crear Preguntas 
                                        </div>
                                        <div class="opcion" class="column" id="lista-atributos">
                                            <input type="checkbox" name="permission[]" value="35"> Editar Preguntas 
                                        </div> 
                                        <div class="opcion" class="column" id="lista-atributos">
                                            <input type="checkbox" name="permission[]" value="36"> Eliminar Preguntas 
                                        </div>                                     
                                    </div>
                                    
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
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
</script>
@endsection

