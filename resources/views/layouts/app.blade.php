<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> 
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    

    
    <title>Test Konecta</title>
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
            <li class="nav-item active" id="url_users">
                <a class="nav-link" href="/getUsers">Usuarios <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item" id="url_clients">
                <a class="nav-link" href="/getClients">Clientes</a>
            </li>

            <li class="nav-item" id="url_clients">
                <a class="nav-link" id="cerrar_sesion">Cerrar Sesion</a>
            </li>
            
            </ul>
        </div>
        </nav>
        <div class="container">
  ...       @yield('content')
        </div>


        <script>
            var rol = JSON.parse(localStorage.getItem('user'))

            if(rol.role ==='Vendedor'){
                $("#url_users").hide();
            }

            $("#cerrar_sesion").on('click',function (params) {
                window.location.href='/'
                localStorage.clear()
            })
        </script>
</body>
</html>