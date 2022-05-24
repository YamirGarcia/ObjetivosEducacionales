@extends('layouts.app')

@section('estilos')
    <link rel="stylesheet" type="text/css" href="css/botonFlotante.css">
    <link rel="stylesheet" type="text/css" href="css/iconos.css">
    <link rel="stylesheet" type="text/css" href="css/estiloTablaUsuariosIndex.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles
@endsection

@section('content')
    

    @livewire('usuarios.tabla-usuarios-component')
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
