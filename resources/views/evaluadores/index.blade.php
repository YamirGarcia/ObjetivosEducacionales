@extends('layouts.app')

@section('estilos')
<link rel="stylesheet" type="text/css" href="css/estiloTablaEvaluadores.css">
<link rel="stylesheet" type="text/css" href="css/botonFlotante.css">
<link rel="stylesheet" type="text/css" href="css/iconos.css">
<link rel="stylesheet" type="text/css" href="css/estilosGenerales.css">
@livewireStyles
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Evaluadores</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow p-3 mb-5 bg-body rounded">
                        @if ($evaluadores->count()==0)
                        <h1 class="text-center">No existen Evaluadores</h1>
                        @else
                        <div class="card-body">
                            @livewire('evaluadores.tabla-evaluadores-component')
                            <div class="pagination justify-content-end">
                                {!! $evaluadores->links() !!}
                            </div>
                            
                            
                        </div>
                        
                        @endif
                        <a href="{{route('evaluadores.create')}}" class="btn-flotante">Agregar Evaluador</a>
                        @extends('evaluadores.grupointeresModal')
                    
                </div>
                </div>
        </div>
    </div>
</section>

{{-- Modal para visualizar info del evaluador --}}

@foreach($evaluadores as $evaluador)
<div class="modal fade" id="modalVisualizarInfo{{$evaluador->id}}" >
    <div class="modal-dialog modal-dialog-centered" style="z-index: 4000;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Visualizar Información</h4>
                <button class="btn-tabla" type="button" data-dismiss="modal">
                    <div class="icon trash-fill">
                        <i> 
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"/></svg>
                        </i>
                    </div>
                </button>
            </div>
            <div class="modal-body">
                <div class="column">
                    <div class="row">
                        <label>Nombre: {{$evaluador->nombres}} {{$evaluador->apellidos}}</label>
                    </div>
                    <div class="row">
                        <label>Emnpresa: {{$evaluador->empresa}}</label>
                    </div>
                    <div class="row">
                        <label>Departamento: {{$evaluador->idDepartamento}}</label>
                    </div>
                    <div class="row">
                        <label>Grupo de Interes: {{$evaluador->idGrupoDeInteres}}</label>
                    </div>
                    <h5>Contacto:</h5>
                    <div class="row">
                        <label>Correo: {{$evaluador->correo}}</label>
                    </div>
                    <div class="row">
                        <label>Teléfono: {{$evaluador->telefono}}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@livewireStyles
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let forms = document.querySelectorAll('.form-eliminar');

        forms.forEach(formulario => {
            formulario.addEventListener('submit', event => {
                // if(confirm('Desea eliminar?')){
                //     return true;
                // }

                event.preventDefault();
                Swal.fire({
                title: '¿Está seguro de borrar este Evaluador',
                text: "¡Se borrará el evaluador y no podrá ingresar al sistema!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar',
                }).then((result) => {
                if (result.isConfirmed) {
                    // 
                    Swal.fire(
                    'Borrado',
                    '',
                    'success'
                    )
                    formulario.submit();
                }
                })
            })
        });
    </script>
@endsection