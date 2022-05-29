@extends('layouts.app')

@section('estilos')
    <link rel="stylesheet" type="text/css" href="../css/estiloRoles.css">
    <link rel="stylesheet" type="text/css" href="/css/estilofondo.css">
    <link rel="stylesheet" type="text/css" href="/css/estilosGenerales.css">
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">

                <a style="text-decoration: none; color: #6c757d" href="/roles">Roles</a>

                <a style="text-decoration: none; color: #6c757d" href="{{ route('roles.create') }}">/ Crear Rol</a>
            </h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>¡Revisa los Campos!</strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{ $error }}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            {!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Nombre del Rol</label>
                                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                        {{-- <select class="form-control" name="rol">
                                            <option value="Administrador">Administrador</option>
                                            <option value="Jefe de Departamento">Jefe de Departamento</option>
                                            <option value="Jefe de Vinculación">Jefe de Vinculación</option>
                                            <option value="Director">Director</option>
                                            <option value="Subdirector">Subdirector</option>
                                            <option value="Evaluador">Evaluador</option>
                                        </select> --}}
                                    </div>
                                </div>

                                <div class="container-role">
                                    <div class="courses-container">
                                        <div class="course">
                                            <div class="course-preview">
                                                <h2>Roles</h2>
                                            </div>
                                            <div class="course-info">
                                                <input type="checkbox" id="Seleccion-Roles"> Seleccionar Todos
                                                <div class="column" id="lista-roles">
                                                    <input class="opcion" type="checkbox" name="permission[]"
                                                        value="1">
                                                    Ver
                                                    Roles
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
                                        </div>
                                    </div>
                                    <div class="courses-container">
                                        <div class="course">
                                            <div class="course-preview">
                                                <h2>Carreras</h2>
                                            </div>
                                            <div class="course-info">
                                                <input type="checkbox" id="Seleccion-Carreras"> Seleccionar Todos
                                                <div class="column" id="lista-carreras">
                                                    <input class="opcion" type="checkbox" name="permission[]"
                                                        value="5">
                                                    Ver
                                                    Carreras
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
                                        </div>
                                    </div>
                                    <div class="courses-container">
                                        <div class="course">
                                            <div class="course-preview">
                                                <h2>Usuarios</h2>
                                            </div>
                                            <div class="course-info">
                                                <input type="checkbox" id="Seleccion-Usuarios"> Seleccionar Todos
                                                <div class="column" id="lista-usuarios">
                                                    <input class="opcion" type="checkbox" name="permission[]"
                                                        value="9">
                                                    Ver
                                                    Usuarios
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
                                        </div>
                                    </div>
                                    <div class="courses-container">
                                        <div class="course">
                                            <div class="course-preview" style="width: 420px">
                                                <h2>Evaluadores</h2>
                                            </div>
                                            <div class="course-info">
                                                <input type="checkbox" id="Seleccion-Evaluadores"> Seleccionar Todos
                                                <div class="column" id="lista-evaluadores">
                                                    <input class="opcion" type="checkbox" name="permission[]"
                                                        value="37"> Ver
                                                    Evaluadores
                                                </div>
                                                <div class="opcion" class="column" id="lista-evaluadores">
                                                    <input type="checkbox" name="permission[]" value="38"> Crear Evaluadores
                                                </div>
                                                <div class="opcion" class="column" id="lista-evaluadores">
                                                    <input type="checkbox" name="permission[]" value="39"> Editar
                                                    Evaluadores
                                                </div>
                                                <div class="opcion" class="column" id="lista-evaluadores">
                                                    <input type="checkbox" name="permission[]" value="40"> Eliminar
                                                    Evaluadores
                                                </div>
                                                <div class="opcion" class="column" id="lista-evaluadores">
                                                    <input type="checkbox" name="permission[]" value="41"> Visualizar
                                                    Información
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="courses-container">
                                        <div class="course">
                                            <div class="course-preview" style="width: 420px">
                                                <h2>Contestar Encuestas</h2>
                                            </div>
                                            <div class="course-info">
                                                <div class="opcion" class="column" id="lista-Cencuestas">
                                                    <input type="checkbox" name="permission[]" value="50"> Contestar
                                                    Encuestas
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="courses-container">
                                        <div class="course">
                                            <div class="course-preview" style="width: 420px">
                                                <h2>Estadísticas</h2>
                                            </div>
                                            <div class="course-info">
                                                <div class="opcion" class="column" id="lista-estadisticas">
                                                    <input type="checkbox" name="permission[]" value="55"> Ver Estadísticas
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="courses-container">
                                        <div class="course" style="width: 1050px; height: 200px">
                                            <div class="course-preview">
                                                <h2>Objetivos Educacionales</h2>
                                            </div>
                                            <div class="course-info">
                                                <input type="checkbox" id="Seleccion-Objetivos"> Seleccionar Todos
                                                <div class="row">
                                                    <div class="" style="width: 40%">
                                                        <h5>Objetivos Educacionales</h5>
                                                        <div class="column" id="lista-objetivos">
                                                            <input class="opcion" type="checkbox"
                                                                name="permission[]" value="13"> Ver
                                                            Objetivos Educacionales
                                                        </div>
                                                        <div class="opcion" class="column"
                                                            id="lista-objetivos">
                                                            <input type="checkbox" name="permission[]" value="14"> Crear
                                                            Objetivos Educacionales
                                                        </div>
                                                        <div class="opcion" class="column"
                                                            id="lista-objetivos">
                                                            <input type="checkbox" name="permission[]" value="15"> Editar
                                                            Objetivos
                                                            Educacionales
                                                        </div>
                                                        <div class="opcion" class="column"
                                                            id="lista-objetivos">
                                                            <input type="checkbox" name="permission[]" value="16"> Eliminar
                                                            Objetivos
                                                            Educacionales
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <h5>Aspectos</h5>
                                                        <div class="opcion" class="column"
                                                            id="lista-objetivos">
                                                            <input type="checkbox" name="permission[]" value="17"> Ver
                                                            Aspectos
                                                        </div>
                                                        <div class="opcion" class="column"
                                                            id="lista-objetivos">
                                                            <input type="checkbox" name="permission[]" value="18"> Crear
                                                            Aspectos
                                                        </div>
                                                        <div class="opcion" class="column"
                                                            id="lista-objetivos">
                                                            <input type="checkbox" name="permission[]" value="19"> Editar
                                                            Aspectos
                                                        </div>
                                                        <div class="opcion" class="column"
                                                            id="lista-objetivos">
                                                            <input type="checkbox" name="permission[]" value="20"> Eliminar
                                                            Aspectos
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <h5>Preguntas</h5>
                                                        <div class="opcion" class="column"
                                                            id="lista-objetivos">
                                                            <input type="checkbox" name="permission[]" value="21"> Ver
                                                            Preguntas
                                                        </div>
                                                        <div class="opcion" class="column"
                                                            id="lista-objetivos">
                                                            <input type="checkbox" name="permission[]" value="22"> Crear
                                                            Preguntas
                                                        </div>
                                                        <div class="opcion" class="column"
                                                            id="lista-objetivos">
                                                            <input type="checkbox" name="permission[]" value="23"> Editar
                                                            Preguntas
                                                        </div>
                                                        <div class="opcion" class="column"
                                                            id="lista-objetivos">
                                                            <input type="checkbox" name="permission[]" value="24"> Eliminar
                                                            Preguntas
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="courses-container">
                                        <div class="course" style="width: 1050px; height: 180px">
                                            <div class="course-preview">
                                                <h2>Atributos</h2>
                                            </div>
                                            <div class="course-info">
                                                <input type="checkbox" id="Seleccion-Atributos"> Seleccionar Todos
                                                <div class="row">
                                                    <div class="col">
                                                        <h5>Atributos</h5>
                                                        <div class="column" id="lista-atributos">
                                                            <input class="opcion" type="checkbox"
                                                                name="permission[]" value="25"> Ver
                                                            Atributos
                                                        </div>
                                                        <div class="opcion" class="column"
                                                            id="lista-atributos">
                                                            <input type="checkbox" name="permission[]" value="26"> Crear
                                                            Atributos
                                                        </div>
                                                        <div class="opcion" class="column"
                                                            id="lista-atributos">
                                                            <input type="checkbox" name="permission[]" value="27"> Editar
                                                            Atributos
                                                        </div>
                                                        <div class="opcion" class="column"
                                                            id="lista-atributos">
                                                            <input type="checkbox" name="permission[]" value="28"> Eliminar
                                                            Atributos
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <h5>Aspectos</h5>
                                                        <div class="opcion" class="column"
                                                            id="lista-atributos">
                                                            <input type="checkbox" name="permission[]" value="29"> Ver
                                                            Aspectos
                                                        </div>
                                                        <div class="opcion" class="column"
                                                            id="lista-atributos">
                                                            <input type="checkbox" name="permission[]" value="30"> Crear
                                                            Aspectos
                                                        </div>
                                                        <div class="opcion" class="column"
                                                            id="lista-atributos">
                                                            <input type="checkbox" name="permission[]" value="31"> Editar
                                                            Aspectos
                                                        </div>
                                                        <div class="opcion" class="column"
                                                            id="lista-atributos">
                                                            <input type="checkbox" name="permission[]" value="32"> Eliminar
                                                            Aspectos
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <h5>Preguntas</h5>
                                                        <div class="opcion" class="column"
                                                            id="lista-atributos">
                                                            <input type="checkbox" name="permission[]" value="33"> Ver
                                                            Preguntas
                                                        </div>
                                                        <div class="opcion" class="column"
                                                            id="lista-atributos">
                                                            <input type="checkbox" name="permission[]" value="34"> Crear
                                                            Preguntas
                                                        </div>
                                                        <div class="opcion" class="column"
                                                            id="lista-atributos">
                                                            <input type="checkbox" name="permission[]" value="35"> Editar
                                                            Preguntas
                                                        </div>
                                                        <div class="opcion" class="column"
                                                            id="lista-atributos">
                                                            <input type="checkbox" name="permission[]" value="36"> Eliminar
                                                            Preguntas
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="courses-container">
                                        <div class="course" style="width: 1050px">
                                            <div class="course-preview">
                                                <h2>Encuestas</h2>
                                            </div>
                                            <div class="course-info">
                                                <input type="checkbox" id="Seleccion-Encuestas"> Seleccionar Todos
                                                <div class="row">
                                                    <div class="col">
                                                        <h5>Encuestas Objetivos Educaionales</h5>
                                                        <div class="opcion" id="lista-encuestas">
                                                            <input type="checkbox" name="permission[]" value="42"> Ver
                                                            Encuestas
                                                            de
                                                            Objetivos Educacioanles
                                                        </div>
                                                        <div class="opcion" id="lista-encuestas">
                                                            <input type="checkbox" name="permission[]" value="43"> Crear
                                                            Encuestas de
                                                            Objetivos Educacioanles
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <h5>Encuestas Atributos</h5>
                                                        <div class="opcion" id="lista-encuestas">
                                                            <input type="checkbox" name="permission[]" value="46"> Ver
                                                            Encuestas de
                                                            Atributos
                                                        </div>
                                                        <div class="opcion" id="lista-encuestas">
                                                            <input type="checkbox" name="permission[]" value="47"> Crear
                                                            Encuestas de
                                                            Atributos
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
        $(function() {
            $('#Seleccion-Roles').change(function() {
                $('#lista-roles > input[type=checkbox]').prop('checked', $(this).is(':checked'));
            });
        });

        //   script para carreras
        $(function() {
            $('#Seleccion-Carreras').change(function() {
                $('#lista-carreras > input[type=checkbox]').prop('checked', $(this).is(':checked'));
            });
        });

        //   script para usuarios
        $(function() {
            $('#Seleccion-Usuarios').change(function() {
                $('#lista-usuarios > input[type=checkbox]').prop('checked', $(this).is(':checked'));
            });
        });

        // script para Objetivos educaionales
        $(function() {
            $('#Seleccion-Objetivos').change(function() {
                $('#lista-objetivos > input[type=checkbox]').prop('checked', $(this).is(':checked'));
            });
        });

        // scirpt para atributos
        $(function() {
            $('#Seleccion-Atributos').change(function() {
                $('#lista-atributos > input[type=checkbox]').prop('checked', $(this).is(':checked'));
            });
        });

        // scirpt para evaluadores
        $(function() {
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

        // scirpt para residentes
        $(function() {
            $('#Seleccion-Residentes').change(function() {
                $('#lista-residentes > input[type=checkbox]').prop('checked', $(this).is(':checked'));
            });
        });
    </script>
@endsection
