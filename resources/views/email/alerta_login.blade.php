<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alerta de seguridad</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f6f9; font-family:Arial, Helvetica, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f6f9; padding:20px;">
        <tr>
            <td align="center">

                <!-- CONTENEDOR -->
                <table width="500" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:12px; overflow:hidden; box-shadow:0 5px 15px rgba(0,0,0,0.1);">
                    
                    <!-- HEADER -->
                    <tr>
                        <td style="background:#0d6efd; padding:20px; text-align:center; color:#ffffff;">
                            <h2 style="margin:0;">🔐 Alerta de Seguridad</h2>
                        </td>
                    </tr>

                    <!-- BODY -->
                    <tr>
                        <td style="padding:30px; color:#333333; text-align:center;">
                            
                            <h3 style="margin-top:0;">Nuevo inicio de sesión detectado</h3>

                            <p style="font-size:15px; line-height:1.6;">
                                Hemos detectado un nuevo acceso a tu cuenta.  
                                Si fuiste tú, puedes ignorar este mensaje.
                            </p>

                            <!-- BOTÓN -->
                            <a href="{{ route('acceso') }}"
                               style="display:inline-block; margin-top:20px; padding:12px 25px; background:#0d6efd; color:#ffffff; text-decoration:none; border-radius:8px; font-weight:bold;">
                                Verificar actividad
                            </a>

                            <p style="margin-top:25px; font-size:14px; color:#777;">
                                Si no reconoces esta actividad, te recomendamos cambiar tu contraseña inmediatamente  
                                y contactar al administrador del sistema.
                            </p>

                        </td>
                    </tr>

                    <!-- FOOTER -->
                    <tr>
                        <td style="background:#f1f1f1; padding:15px; text-align:center; font-size:12px; color:#777;">
                            © {{ date('Y') }} Tu Sistema | Todos los derechos reservados
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>