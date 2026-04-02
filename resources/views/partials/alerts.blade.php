@if(session('success') || session('error'))

@php
    $tipo = session('success') ? 'success' : 'danger';
    $mensaje = session('success') ?? session('error');
    $titulo = session('success') ? '¡Éxito!' : '¡Error!';
@endphp

    <div id="alert" class="alert alert-{{ $tipo }} alert-dismissible d-flex align-items-center fade show">
    <i class="fa-solid {{ $tipo == 'success' ? 'fa-circle-check' : 'fa-circle-xmark' }}"></i>
    <!-- Obtener mensaje desde la sesión -->
    <strong class="mx-2">{{ $titulo }}</strong> 
    {{ $mensaje }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>

    <script>
        setTimeout(function() {
            // Obtener el elemento por el Id
            let alerta = document.getElementById('alert');

            if(alert){
                // Quitar clase que permite ver la alerta
                alerta.classList.remove('show');
                // Añadir animación Fade
                alert.classList.add('fade');

                setTimeout(() => alerta, 500);
            }
            
        }, 3000); // Desaparecer después de 3 segundos
    </script>

@endif