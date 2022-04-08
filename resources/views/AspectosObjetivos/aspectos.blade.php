@extends('layouts.app')

@section('estilos')
@endsection
@section('cssObjetivos')
<style>
    /* Estilos generales */
    a,
p,
h1,
h2,
h3,
h4,
h5,
button,
label,
span,
tr,
th,
td {
    font-family: 'Poppins', sans-serif;
}

body {
    background: #f8f9fa;
}
    /* Boton flotante */
    .btn-flotante {
    font-size: 16px;
    /* Cambiar el tamaÃ±o de la tipografia */
    text-transform: uppercase;
    /* Texto en mayusculas */
    font-weight: bold;
    /* Fuente en negrita o bold */
    color: #ffffff;
    /* Color del texto */
    text-decoration: none;
    font-family: Poppins;
    border-radius: 5px;
    /* Borde del boton */
    letter-spacing: 2px;
    /* Espacio entre letras */
    background-color: #2c2fa5;
    /* Color de fondo */
    padding: 18px 30px;
    /* Relleno del boton */
    position: fixed;
    bottom: 50px;
    right: 50px;
    transition: all 300ms ease 0ms;
    box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
    z-index: 99;
}

.btn-flotante:hover {
    background-color: #ffffff;
    /* Color de fondo al pasar el cursor */
    color: #2c2fa5;
    box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.3);
    border: 1px solid #2c2fa5;
    transform: translateY(-7px);
    text-decoration: none;
}


/* iconos */
.btn-tabla{
    padding-left: 1px;
    border: none; 
    background: none;
}

.acciones {
    margin-top: 5px;
    margin-bottom: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    right: 1%;
    top: 0;
}

.container {
    display: table;
    height: 95vh;
    width: 90%;
    padding-bottom: 5vh;
    margin: auto auto;
    @media (max-width: 900px) {}
    background: #2d2c3e;
    z-index: -1;
}

.content {
    display: table-cell;
    text-align: center;
    vertical-align: middle;
}

.icon-container {
    margin-top: 30px;
    width: 100%;
    height: 60px;
}

.icon {
    background: none;
    cursor: pointer;
    position: relative;
    display: inline-block;
    width: 55px;
    height: 55px;
    margin-left: 60px/5;
    margin-right: 60px/5;
    border-radius: 60px*.5;
    overflow: hidden;
}

.icon::before,
.icon::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    transition: all 0.25s ease;
    border-radius: 60px*.5;
}

i {
    position: relative;
    top: 30%;
    color: #FFFFFF;
    font-size: 40px/2;
    margin-top: 40px/4;
    transition: all 0.25s ease;
}

svg {
    position: relative;
    fill: black;
    height: 40%;
    margin-top: 40px/4;
    transition: all 0.25s ease;
}

.svg {
    position: relative;
    fill: black;
    height: 40%;
    margin-top: -25px;
    margin-left: 17px;
    transition: all 0.25s ease;
}
.svg-delete{
    position: relative;
    fill: black;
    height: 40%;
    margin-top: -24px;
    transition: all 0.25s ease;
}

.edit-fill::before {
    transition-duration: 0.5s;
    box-shadow: inset 0 0 0 2px #0096c7;
    border-radius: 50px;
}

.edit-fill:hover::before {
    box-shadow: inset 0 0 0 60px #0096c7;
    border-radius: 50px;
    fill: white;
}

.trash-fill::before {
    transition-duration: 0.5s;
    box-shadow: inset 0 0 0 2px #e5383b;
    border-radius: 50px;
}

.trash-fill:hover::before {
    box-shadow: inset 0 0 0 60px #e5383b;
    border-radius: 50px;
}

.search-fill::before {
    transition-duration: 0.2s;
    box-shadow: inset 0 0 0 2px #8e9aaf;
    border-radius: 50px;
}

.search-fill:hover::before {
    box-shadow: inset 0 0 0 60px #8e9aaf;
    border-radius: 50px;
}

.create-fill::before {
    transition-duration: 0.2s;
    box-shadow: inset 0 0 0 2px #56ab91;
    border-radius: 50px;
}

.create-fill:hover::before {
    box-shadow: inset 0 0 0 60px #56ab91;
    border-radius: 50px;
}

.objetivos-fill::before {
    transition-duration: 0.2s;
    box-shadow: inset 0 0 0 2px #ff8800;
    border-radius: 50px;
}

.objetivos-fill:hover::before {
    box-shadow: inset 0 0 0 60px #ff8800;
    border-radius: 50px;
}

.atributos-fill::before {
    transition-duration: 0.2s;
    box-shadow: inset 0 0 0 2px #c77dff;
    border-radius: 50px;
}

.atributos-fill:hover::before {
    box-shadow: inset 0 0 0 60px #c77dff;
    border-radius: 50px;
}

/* Tabla */


.limiter {
    width: 100%;
    margin: 0 auto;
}
.container-table100 {
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
}

.wrap-table100 {
    width: 1170px;
}

table {
    border-spacing: 1;
    border-collapse: collapse;
    background: white;
    border-radius: 10px;
    overflow: hidden;
    width: 100%;
    margin: 0 auto;
    position: relative;
}

table * {
    position: relative;
}

table td,
table th {
    padding-left: 8px;
}

table thead tr {
    height: 60px;
    background: #36304a;
}

table tbody tr {
    height: 50px;
}

table tbody tr:last-child {
    border: 0;
}

table td,
table th {
    text-align: left;
}

table td.l,
table th.l {
    text-align: right;
}

table td.c,
table th.c {
    text-align: center;
}

table td.r,
table th.r {
    text-align: center;
}

.table100-head th {
    font-family: OpenSans-Regular;
    font-size: 18px;
    color: #fff;
    line-height: 1.2;
    font-weight: unset;
}

.table100-head-modal th {
    font-family: OpenSans-Regular;
    font-size: 18px;
    color: #fff;
    line-height: 1.2;
    font-weight: unset;
}

tbody tr:nth-child(even) {
    background-color: #f5f5f5;
}

tbody tr {
    font-family: OpenSans-Regular;
    font-size: 15px;
    color: black;
    line-height: 1.2;
    font-weight: unset;
}

tbody tr:hover {
    color: #555555;
    background-color: #f5f5f5;
    cursor: pointer;
}

.column1 {
    width: 10%;
    text-align: center;
}
.column1-modal {
    width: 10%;
    text-align: center;
}

.column2 {
    width: 60%;
    text-align: center;
}
.column2-modal {
    width: 20%;
    text-align: center;
}
.column2-modal-objetivos-atributos {
    width: 90%;
    text-align: center;
}

.column3 {
    width: 30%;
    text-align: center;
}
.column3-modal {
    width: 15%;
    text-align: center;
}

.column4 {
    width: 20%;
    text-align: center;
}
.column4-modal {
    width: 40%;
    text-align: center;
}

.column5 {
    width: 30%;
    text-align: center;
}
.column5-modal {
    width: 15%;
    text-align: center;
}

.column6 {
    width: 222px;
    text-align: center;
    padding-right: 62px;
}

@media screen and (max-width: 992px) {
    .tabla-general {
        display: block;
    }
    .tabla-general>*,
    .tabla-general tr,
    .tabla-general td,
    .tabla-general th {
        display: block;
    }
    .tabla-general thead {
        display: none;
    }
    .tabla-general tbody tr {
        height: auto;
        padding: 37px 0;
    }
    .tabla-general tbody tr td {
        padding-left: 40% !important;
        margin-bottom: 24px;
        width: 100%;
        align-items: center;
    }
    .tabla-general tbody tr td:last-child {
        margin-bottom: 0;
    }
    .tabla-general tbody tr td:before {
        font-size: 14px;
        color: #999999;
        line-height: 1.2;
        font-weight: unset;
        position: absolute;
        width: 40%;
        left: 30px;
        top: 0;
    }
    .tabla-general tbody tr td:nth-child(1):before {
        content: "Carrera";
    }
    .tabla-general tbody tr td:nth-child(2):before {
        content: "Plan de estudios:";
    }
    .tabla-general tbody tr td:nth-child(3):before {
        content: "Propiedades";
    }
    .tabla-general tbody tr td:nth-child(4):before {
        content: "Acciones";
    }
    .tabla-general tbody tr td:nth-child(5):before {
        content: "Acciones";
    }
    .tabla-general tbody tr td:nth-child(6):before {
        content: "Total";
    }
    .tabla-general.column1,
    .tabla-general.column2,
    .tabla-general.column6 {
        text-align: center;
    }
    .tabla-general.column4,
    .tabla-general.column5,
    .tabla-general.column6,
    .tabla-general.column1,
    .tabla-general.column2,
    .tabla-general.column3 {
        width: 100%;
    }
    .tabla-general tbody tr {
        font-size: 14px;
    }
}

@media (max-width: 576px) {
    .container-table100 {
        padding-left: 15px;
        padding-right: 15px;
    }
}
</style>
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">
            <a style="text-decoration: none; color: #6c757d" href="/carreras">Carreras</a>
            <a style="text-decoration: none; color: #6c757d" href="{{route ('ObjetivoEducacional.show', $id)}}">/Objetivos Educacionales</a>
            <a style="text-decoration: none; color: #6c757d" href="{{route ('aspectosObjetivos.show', $id)}}">/Aspectos</a>
        </h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow p-3 mb-5 bg-body rounded">   
                    <div class="card-body">
                        <label for="">Agrega un nuevo aspecto:</label>
                        <div>
                            <form action="{{route ('aspectosObjetivos.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-11">
                                        <input type="text" class="form-control" style="margin-right: 1rem;" name="descripcionAspectoObjetivo">
                                    </div>
                                    <div class="col-1">
                                        <button type="submit" class="btn btn-success btn-hg">Agregar</button>
                                    </div>
                                </div>
                                <input type="text" style="visibility: hidden;" value="{{$id}}" name="idObjetivo">
                            </form>
                        </div>
                        @foreach ($aspectos as $aspecto)
                        <div class="accordion"  id="accordionExample{{$aspecto->id}}">
                            <div class="card" style="border: 1px solid black; margin-bottom: 0rem;">
                                <div class="card-header" id="heading{{$aspecto->id}}">
                                  <h2 class="mb-0" style="display: flex">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse{{$aspecto->id}}" aria-expanded="true" aria-controls="collapse{{$aspecto->id}}" style="text-decoration: none">
                                        {{$loop->iteration}}.-  {{$aspecto->nombre}}
                                    </button>
                                    <div class="acciones">
                                        <a href="#" data-toggle="modal" data-target="">
                                            <div class="icon edit-fill">
                                                <i>
                                                    <svg class="svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M490.3 40.4C512.2 62.27 512.2 97.73 490.3 119.6L460.3 149.7L362.3 51.72L392.4 21.66C414.3-.2135 449.7-.2135 471.6 21.66L490.3 40.4zM172.4 241.7L339.7 74.34L437.7 172.3L270.3 339.6C264.2 345.8 256.7 350.4 248.4 353.2L159.6 382.8C150.1 385.6 141.5 383.4 135 376.1C128.6 370.5 126.4 361 129.2 352.4L158.8 263.6C161.6 255.3 166.2 247.8 172.4 241.7V241.7zM192 63.1C209.7 63.1 224 78.33 224 95.1C224 113.7 209.7 127.1 192 127.1H96C78.33 127.1 64 142.3 64 159.1V416C64 433.7 78.33 448 96 448H352C369.7 448 384 433.7 384 416V319.1C384 302.3 398.3 287.1 416 287.1C433.7 287.1 448 302.3 448 319.1V416C448 469 405 512 352 512H96C42.98 512 0 469 0 416V159.1C0 106.1 42.98 63.1 96 63.1H192z"/></svg>
                                                </i>
                                            </div>
                                        </a>
                                        <form action="{{route ('aspectosObjetivos.destroy', [$aspecto->id])}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" style="border: none; background: none">
                                                <div class="icon trash-fill">
                                                    <i>
                                                        <svg class="svg-delete" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM31.1 128H416V448C416 483.3 387.3 512 352 512H95.1C60.65 512 31.1 483.3 31.1 448V128zM111.1 208V432C111.1 440.8 119.2 448 127.1 448C136.8 448 143.1 440.8 143.1 432V208C143.1 199.2 136.8 192 127.1 192C119.2 192 111.1 199.2 111.1 208zM207.1 208V432C207.1 440.8 215.2 448 223.1 448C232.8 448 240 440.8 240 432V208C240 199.2 232.8 192 223.1 192C215.2 192 207.1 199.2 207.1 208zM304 208V432C304 440.8 311.2 448 320 448C328.8 448 336 440.8 336 432V208C336 199.2 328.8 192 320 192C311.2 192 304 199.2 304 208z"/></svg>
                                                    </i>
                                                </div>
                                            </button>
                                            </form>
                                    </div>
                                  </h2>
                                </div>
                            
                                <div id="collapse{{$aspecto->id}}" class="collapse" aria-labelledby="heading{{$aspecto->id}}" data-parent="#accordionExample{{$aspecto->id}}">
                                  <div class="card-body">
                                      <table class="tabla-general">
                                        <thead>
                                            <tr class="table100-head">
                                                <th class="column1">No.</th>
                                                <th class="column2">Pregunta</th>
                                                <th class="column3">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                      @foreach ($aspecto->preguntas as $pregunta)
                                            <tr class="table100-head">
                                                <td class="column1">{{$loop->iteration}}</td>
                                                <td class="column2">{{$pregunta->Pregunta}}</td>
                                                <td class="column3">
                                                    <button class="btn btn-primary">Editar</button>
                                                   <button class="btn btn-danger">Borrar</button>
                                                </td>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                      <h4>Agregar Nueva Pregunta:</h4>
                                    <form action="{{route ('preguntaAspectosObjetivos.store')}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-11">
                                                <input type="text" class="form-control" style="margin-right: 1rem;" name="Pregunta">
                                            </div>
                                            <div class="col-1">
                                                <button type="submit" class="btn btn-success btn-hg">Agregar</button>
                                            </div>
                                        </div>
                                        <input type="text" style="visibility: hidden;" value="{{$aspecto->id}}" name="idAspectoObjetivo">
                                        <input type="text" style="visibility: hidden;" value="{{$id}}" name="idObjetivo">
                                    </form>
                                  </div>
                                </div>
                              </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- MODAL EDITAR ASPECTO --}}
@foreach ($aspectos as $aspecto)
    <div class="modal fade" id="modalEditar{{$aspecto->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">EDITAR ASPECTO</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route ('aspectosObjetivos.update', [$aspecto->id])}}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="modal-body">
                        <label for="nombre">Nombre:</label>
                        <textarea name="nombre" class="form-control" id="nombre" rows="5" style="resize: none; height: 6rem;">{{$aspecto->nombre}}</textarea>

                        <input type="text" style="visibility: hidden;" value="{{$id}}" name="idObjetivo">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                        <button type="submit" class="btn btn-primary">ACTUALIZAR INFORMACION</button>
                    </div>
                </form>
            </div>
        </div>
    </div>  
@endforeach

@endsection