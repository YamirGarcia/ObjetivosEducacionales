@extends('layouts.app')

@section('estilos')
<link rel="stylesheet" type="text/css" href="css/estiloTablaCarreraIndex.css">
<link rel="stylesheet" type="text/css" href="css/botonFlotante.css">
<link rel="stylesheet" type="text/css" href="css/iconos.css">
<link rel="stylesheet" type="text/css" href="css/badges.css">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">
            <a style="text-decoration: none; color: #6c757d" href="/carreras">Carreras</a>
        </h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow p-3 mb-5 bg-body rounded">
                    @if ($carreras->count()==0)
                        <h1 class="text-center">No existen carreras que mostrar</h1> 
                    @else                            
                    <div class="card-body">
                        <table class="tabla-general">
                            <thead>
                                <tr class="table100-head">
                                    <th class="column1">Carrera</th>
                                    <th class="column2">Plan de estudios</th>
                                    <th class="column3">Propiedades</th>
                                    <th class="column4">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carreras as $carrera)
                                <tr class="table100-head">
                                    <td class="column1">{{$carrera->carrera}}</td>
                                    <td class="column2">{{$carrera->planEstudios}}</td>
                                    <td class="column3">
                                        <div class="acciones">
                                            <button class="chip primary" data-toggle="modal" data-target="#modalCarreraUsuario{{$carrera->id}}">
                                                <span>
                                                    Usuarios: {{$carrera->usuarios->count()}}
                                                </span>
                                            </button>                                                                      
                                                <button class="chip primary" data-toggle="modal" data-target="#modalAtributosCarrera{{$carrera->id}}">
                                                    <span>
                                                        Atributos: {{$carrera->atributos->count()}}
                                                    </span>
                                                </button>                                                                    
                                                <button class="chip primary" data-toggle="modal" data-target="#modalObjetivosCarrera{{$carrera->id}}">
                                                    <span>
                                                        Objetivos: {{$carrera->objetivos->count()}}
                                                    </span> 
                                                </button>
                                        </div>               
                                    </td>
                                    <td class="column4">
                                        <div class="acciones">
                                            @can('editar-carrera')
                                                <a href="#" data-toggle="modal" data-target="#modalEditar{{$carrera->id}}">
                                                    <div class="icon edit-fill">
                                                        <i>
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M490.3 40.4C512.2 62.27 512.2 97.73 490.3 119.6L460.3 149.7L362.3 51.72L392.4 21.66C414.3-.2135 449.7-.2135 471.6 21.66L490.3 40.4zM172.4 241.7L339.7 74.34L437.7 172.3L270.3 339.6C264.2 345.8 256.7 350.4 248.4 353.2L159.6 382.8C150.1 385.6 141.5 383.4 135 376.1C128.6 370.5 126.4 361 129.2 352.4L158.8 263.6C161.6 255.3 166.2 247.8 172.4 241.7V241.7zM192 63.1C209.7 63.1 224 78.33 224 95.1C224 113.7 209.7 127.1 192 127.1H96C78.33 127.1 64 142.3 64 159.1V416C64 433.7 78.33 448 96 448H352C369.7 448 384 433.7 384 416V319.1C384 302.3 398.3 287.1 416 287.1C433.7 287.1 448 302.3 448 319.1V416C448 469 405 512 352 512H96C42.98 512 0 469 0 416V159.1C0 106.1 42.98 63.1 96 63.1H192z"/></svg>
                                                        </i>
                                                    </div>
                                                    <label class="etiqueta">Editar</label>
                                                </a>
                                            @endcan
<<<<<<< HEAD
                                            {!! Form::open(['method' => 'GET', 'route' => ['ObjetivoEducacional.show', $carrera->id],'style'=>'margin: 4px']) !!}
                                            {!! Form::submit('Objetivos Educacionales', ['class' => 'dropdown-item']) !!}
                                            {!! Form::close() !!}

                                            {!! Form::open(['method' => 'GET', 'route' => ['Atributos.show', $carrera->id],'style'=>'margin: 4px']) !!}
                                            {!! Form::submit('Atributos', ['class' => 'dropdown-item']) !!}
                                            {!! Form::close() !!}


                                        </div>
                                        </div>
                                        <div class="submenu"></div>                                        
=======
                                            @can('borrar-carrera')
                                                <form action="{{route ('carreras.destroy', $carrera->id)}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" style="border: none; background: none">
                                                    <div class="icon trash-fill">
                                                        <i>
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM31.1 128H416V448C416 483.3 387.3 512 352 512H95.1C60.65 512 31.1 483.3 31.1 448V128zM111.1 208V432C111.1 440.8 119.2 448 127.1 448C136.8 448 143.1 440.8 143.1 432V208C143.1 199.2 136.8 192 127.1 192C119.2 192 111.1 199.2 111.1 208zM207.1 208V432C207.1 440.8 215.2 448 223.1 448C232.8 448 240 440.8 240 432V208C240 199.2 232.8 192 223.1 192C215.2 192 207.1 199.2 207.1 208zM304 208V432C304 440.8 311.2 448 320 448C328.8 448 336 440.8 336 432V208C336 199.2 328.8 192 320 192C311.2 192 304 199.2 304 208z"/></svg>
                                                        </i>
                                                    </div>
                                                    <label class="etiqueta">Eliminar</label>
                                                </button>
                                                </form>
                                            @endcan
                                            <form action="{{route ('ObjetivoEducacional.show', $carrera->id)}}" method="GET">
                                            @csrf
                                                <button class="btn-tabla" type="submit">
                                                    <div class="icon objetivos-fill">
                                                        <i>                        
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M223.7 130.8L149.1 7.77C147.1 2.949 141.9 0 136.3 0H16.03c-12.95 0-20.53 14.58-13.1 25.18l111.3 158.9C143.9 156.4 181.7 137.3 223.7 130.8zM256 160c-97.25 0-176 78.75-176 176S158.8 512 256 512s176-78.75 176-176S353.3 160 256 160zM348.5 317.3l-37.88 37l8.875 52.25c1.625 9.25-8.25 16.5-16.63 12l-46.88-24.62L209.1 418.5c-8.375 4.5-18.25-2.75-16.63-12l8.875-52.25l-37.88-37C156.6 310.6 160.5 299 169.9 297.6l52.38-7.625L245.7 242.5c2-4.25 6.125-6.375 10.25-6.375S264.2 238.3 266.2 242.5l23.5 47.5l52.38 7.625C351.6 299 355.4 310.6 348.5 317.3zM495.1 0H375.7c-5.621 0-10.83 2.949-13.72 7.77l-73.76 122.1c42 6.5 79.88 25.62 109.5 53.38l111.3-158.9C516.5 14.58 508.9 0 495.1 0z"/></svg>
                                                        </i>
                                                    </div>
                                                    <label class="etiqueta-objetivos">Objetivo Educacional</label>
                                                </button>
                                            </form>
                                            <form action="#">
                                                <button class="btn-tabla" type="submit">
                                                    <div class="icon atributos-fill">
                                                        <i>                        
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M45.63 79.75L52 81.25v58.5C45 143.9 40 151.3 40 160c0 8.375 4.625 15.38 11.12 19.75L35.5 242C33.75 248.9 37.63 256 43.13 256h41.75c5.5 0 9.375-7.125 7.625-13.1L76.88 179.8C83.38 175.4 88 168.4 88 160c0-8.75-5-16.12-12-20.25V87.13L128 99.63l.001 60.37c0 70.75 57.25 128 128 128s127.1-57.25 127.1-128L384 99.62l82.25-19.87c18.25-4.375 18.25-27 0-31.5l-190.4-46c-13-3-26.62-3-39.63 0l-190.6 46C27.5 52.63 27.5 75.38 45.63 79.75zM359.2 312.8l-103.2 103.2l-103.2-103.2c-69.93 22.3-120.8 87.2-120.8 164.5C32 496.5 47.53 512 66.67 512h378.7C464.5 512 480 496.5 480 477.3C480 400 429.1 335.1 359.2 312.8z"/></svg>
                                                        </i>
                                                    </div>
                                                    <label class="etiqueta">Atributos</label>
                                                </button>
                                            </form>
                                        </div>                                  
>>>>>>> 6803f3ef4031561a716da58105b92b2836409014
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination justify-content-end">
                            {{-- {!! $carreras->links() !!} --}}
                        </div>
                    </div>
                    @endif
                    @can('crear-carrera')
                        <a href="#" class="btn-flotante" data-toggle="modal" data-target="#modalAgregar">Agregar Carrera</a>
                    @endcan
                    </div>                    
                </div>
            </div>
        </div>
    </section>
    
    @foreach ($carreras as $carrera)
        @include('profile.editar_carrera')  
        @include('profile.add_user_to_degree')
        @include('profile.atributos_carrera')  
        @include('profile.objetivos_carrera')
    @endforeach

    <!-- Modal para añadir carrera -->
    @include('profile.añadir_carrera')

@endsection