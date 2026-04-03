<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boostrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/fbfafbdcc5.js" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container p-5 my-5 border">

        <!-- Uso de blade para definir la plantilla -->
        @yield('content')

    </div>
</body>
</html>