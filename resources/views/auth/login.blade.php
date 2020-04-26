<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Konecta Test</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>
    
    <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-login">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-6">
                                    <a href="#" class="active" id="login-form-link">Iniciar sesión Konecta Test</a>
                                </div>
                                
                            </div>
                            <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="login-form" action="" method="post" role="form" style="display: block;">
                                        <div class="form-group">
                                            <input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="Usuario" value="">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Contraseña">
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <a type="button" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Iniciar sesión">Iniciar Sesion</a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $('#login-submit').on('click',function() {
                var email = $("#email").val();
                var password = $("#password").val()
                var role = $("#role").val()
                console.log(email+" "+password+" "+role)
                if(email!='' && password!=''){
                    var url = '/api/login';
                        var data = {
                            'email': email,
                            'password': password
                        }

                        var request = $.post(url, data);
                        
                        request.done(function(response) {            
                            var data = {
                                'name': response.user.name,
                                'role': response.user.role,
                                'token': response.token
                            }
                            
                            localStorage.setItem('user', JSON.stringify(data));
                            if (response.token) {
                                window.location.href = '/getClients';
                            }
                        })

                        request.fail(function(res) {
                            console.log(res.readyState);
                            if (res.readyState == 4) {
                                alert('Credenciales incorrectas')
                            }
                        });
                }else{
                    alert('todos los campos son obligatorios')
                }
                
            })
        </script>
</body>
</html>





<!------ Include the above in your HEAD tag ---------->
