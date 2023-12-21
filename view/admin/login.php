<?php
if(isset($_SESSION['loggedin']) == true){
    header("Location: " . URL);
exit();
}else{
?>
<div class="container-sm">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">

            <div class="row mb-5">
                <div class="col-md-6 col-lg-3 mb-3">
                </div>
                <div class="col-md-6 col-lg-6 mb-3">
                    <!-- Register -->
                    <div class="card card-xsm">
                        <div class="card-body xsm">
                            <!-- Logo -->
                            <div class="app-brand justify-content-center">
                                <img src="<?php echo URL; ?>view/template/assets/img/logos/logo_login.png" alt="logo" width="150">
                            </div>
                            <!-- /Logo -->
                            
                            <form id="formAuthentication" class="mb-3 mt-5 text-center" action="index.html" method="POST">
                                <div class="mb-3 text-center" >
                                <label for="email" class="form-label">Usuario</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="username"
                                    name="username"
                                    placeholder="Cuenta institucional"
                                    autofocus
                                />
                                </div>
                                <div class="mb-3 form-password-toggle text-center">
                                <div class="justify-content-between text-center">
                                    <label class="form-label" for="password">Contraseña</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input
                                    type="password"
                                    id="password"
                                    class="form-control"
                                    name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password"
                                    />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                </div>
                                
                                <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="button" name="btn_acceder" id="btn_acceder">Acceder</button>
                                </div>
                            </form>
                            <div id="respLogin"></div>
                        </div>
                    </div>
                    <!-- /Register -->
                </div>
                <div class="col-md-6 col-lg-3 mb-3">
                </div>
            </div>

            
        </div>
      </div>
    </div>
<script>
    $("#btn_acceder").click(function(){
        var username = $("#username").val();
        var password = $("#password").val();
        
        var ruta = '<?php echo URL; ?>controller/login.php';
        console.log('La ruta es: ' + ruta);
        var datos = {
            username : username,
            password : password,
            accion : 'login'
        }

        $.ajax({
            url: ruta,
            type: 'POST',
            dataType: false,
            data: datos
        })
        .done(function(resp){
            $("#respLogin").html(resp);
            console.log('Realizado: ' + resp);
        })
        .fail(function(jqXHR, textStatus, errorThrown){
            console.log("Error: " + errorThrown);
            console.log("Error: " + jqXHR);
            console.log("Error: " + textStatus);
        })
        .always(function(resp){
            console.log("Finalizado: " + resp);
        });
                
    });
</script>
<?php
}
?>