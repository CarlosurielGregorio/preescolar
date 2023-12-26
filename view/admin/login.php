<?php
if(isset($_SESSION['loggedin']) == true){
    header("Location: " . URL);
exit();
}else{
?>
<div class="contenedor-padre">
    <div class="overlay">
        <div class="login-form">
            <img src="<?php echo URL; ?>view/template/assets/img/elements/letras.png" alt="logo" width="200" class="mb-5 logo-login">
            <h2>Iniciar sesión</h2>
            <form>
                <div class="input-group">
                    <label for="username">Usuario:</label>
                    <div class="input-group input-group-merge">
                        <input type="text" id="username" name="username" placeholder="Ingresa tu usuario" required class="form-control input-login">
                    </div>
                </div>
                <div class="input-group  form-password-toggle">
                    <label for="username">Contraseña:</label>
                    <div class="input-group input-group-merge">
                        <input
                        type="password"
                        id="password"
                        class="form-control input-login"
                        name="password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password"
                        />
                        <span class="input-group-text cursor-pointer input-login"><i class="bx bx-hide"></i></span>
                    </div>
                </div>
                <button type="submit">Ingresar</button>
            </form>
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