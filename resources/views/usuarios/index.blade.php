@extends('layouts.app')

@section('estilos')
<link rel="stylesheet" type="text/css" href="css/botonFlotante.css">
<link rel="stylesheet" type="text/css" href="css/iconos.css">
<link rel="stylesheet" type="text/css" href="css/estiloTablaUsuariosIndex.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@livewireStyles
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Usuarios</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow p-3 mb-5 bg-body rounded">
                    {{-- @if ($usuarios->count() == 0)
                        <h1 class="text-center">No Existen Usuarios Asigandos</h1> 
                    @else --}}
                        
                    
                    <div class="card-body">
                        @livewire('usuarios.tabla-usuarios-component')
                        <div class="pagination justify-content-end">
                            {!! $usuarios->links() !!}
                        </div>
                    </div>
                    {{-- @endif --}}
                    <a href="{{route('usuarios.create')}}" class="btn-flotante">Agregar Usuario</a>
                </div>
            </div>
        </div>
    </div>
</section>
@livewireScripts
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
                title: '¿Está seguro de borrar este Usuario',
                text: "¡Se borrará el Usuario y no tendrá acceso al sistema!",
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
                    setTimeout(() => {
                        formulario.submit();
                    }, 1000);
                }
                })
            })
        });
    </script>
@endsection

