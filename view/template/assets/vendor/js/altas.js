$("#fechaNacimiento").blur(function(){
    let fechaNacimiento = $(this).val()
     let edad = calcularEdad(fechaNacimiento);
     $("#edad").val(edad);
});

$("#formFileImage").change(function(e){
    
    let input = e.target;
    if(input.files && input.files[0]){
        let reader = new FileReader();
        reader.onload = function(e){
            let img = new Image();
            img.src = e.target.result;

            img.onload = function(){
                var canvas = document.getElementById('canvasRecortado');
                var context = canvas.getContext('2d');

                // Redimensiona la imagen
                context.clearRect(0, 0, canvas.width, canvas.height);
                context.drawImage(img, 0, 0, canvas.width, canvas.height);

                // Muestra el canvas recortado
                //canvas.style.display = 'block';

                
                var imagenRecortada = document.getElementById('imagenRecortada');
                imagenRecortada.src = canvas.toDataURL('image/jpeg');
                imagenRecortada.style.display = 'block';
                
            };

        };
        reader.readAsDataURL(input.files[0]);
    }

});

$("#btn_guardar_datos").click(function(){
    let guardarInfo = false;
    let categoria = $("#selectCategoria").val();
    let app = $("#appPaterno").val().trim();
    let nombre = $("#nombreJugador").val().trim();
    let lugarNacimiento = $("#lugarNacimiento").val().trim();
    let fechaNacimiento = $("#fechaNacimiento").val().trim();
    let Nacionalidad = $("#nacionalidad").val().trim();
    let edad = $("#edad").val().trim();
    let peso = $("#peso").val().trim();
    let estatura = $("#Estatura").val().trim();

    let estadoCivil = $("#estadoCivil").val().trim();
    let inputImage = $("#formFileImage")[0];


    if(categoria === ""){
        $("#selectCategoria").addClass("bg-label-danger");
        $("#small-error").html("Categoria");
        $("#texto-error").html("Seleccione la categoría");

        let toast = document.querySelector("#toastError");
        let toastError = new bootstrap.Toast(toast);
        toastError.show();
        vCategoria = false;
    }else{
        $("#selectCategoria").removeClass("bg-label-danger");
        vCategoria = true;
        
    }

    if (app === ""){
        $("#appPaterno").addClass("bg-label-danger");
        $("#small-error").html("Apellido paterno");
        $("#texto-error").html("Ingrese el apellido paterno");

        let toast = document.querySelector("#toastError");
        let toastError = new bootstrap.Toast(toast);
        toastError.show();
        vapp = false;
    }else{
        $("#appPaterno").removeClass("bg-label-danger");
        vapp = true;
    }

    if (nombre === ""){
        $("#nombreJugador").addClass("bg-label-danger");
        $("#small-error").html("Nombre");
        $("#texto-error").html("Ingrese el nombre");

        let toast = document.querySelector("#toastError");
        let toastError = new bootstrap.Toast(toast);
        toastError.show();
        vNombre = false;
    }else{
        $("#nombreJugador").removeClass("bg-label-danger");
        vNombre = true;
    }

    if (lugarNacimiento === ""){
        $("#lugarNacimiento").addClass("bg-label-danger");
        $("#small-error").html("Lugar de Nacimiento");
        $("#texto-error").html("Ingrese el lugar de nacimiento");

        let toast = document.querySelector("#toastError");
        let toastError = new bootstrap.Toast(toast);
        toastError.show();
        vLugarNacimiento = false;
    }else{
        $("#lugarNacimiento").removeClass("bg-label-danger");
        vLugarNacimiento = true;
    }

    if (fechaNacimiento === ""){
        $("#fechaNacimiento").addClass("bg-label-danger");
        $("#small-error").html("Fecha de nacimiento");
        $("#texto-error").html("Ingrese la fecha de nacimiento");

        let toast = document.querySelector("#toastError");
        let toastError = new bootstrap.Toast(toast);
        toastError.show();
        vFechaNacimiento = false;
    }else{
        $("#fechaNacimiento").removeClass("bg-label-danger");
        vFechaNacimiento = true;
    }

    if (Nacionalidad === ""){
        $("#nacionalidad").addClass("bg-label-danger");
        $("#small-error").html("Nacionalidad");
        $("#texto-error").html("Ingrese la nacionalidad");

        let toast = document.querySelector("#toastError");
        let toastError = new bootstrap.Toast(toast);
        toastError.show();
        vNacionalidad = false;
    }else{
        $("#nacionalidad").removeClass("bg-label-danger");
        vNacionalidad = true;
    }

    if (edad === ""){
        $("edad").addClass("bg-label-danger");
        $("#small-error").html("Edad");
        $("#texto-error").html("Ingrese la edad");

        let toast = document.querySelector("#toastError");
        let toastError = new bootstrap.Toast(toast);
        toastError.show();
        vEdad = false;
    }else{
        if (verificaEntero(peso)) {
            $("#edad").removeClass("bg-label-danger");
            vEdad = true;
        } else {
    
            $("#edad").addClass("bg-label-danger");
            $("#small-error").html("Edad");
            $("#texto-error").html("Ingrese un número válido");
    
            let toast = document.querySelector("#toastError");
            let toastError = new bootstrap.Toast(toast);
            toastError.show();
            vEdad = false;
        }
        
    }

    if (peso === ""){
        $("#peso").addClass("bg-label-danger");
        $("#small-error").html("Peso");
        $("#texto-error").html("Ingrese el peso");

        let toast = document.querySelector("#toastError");
        let toastError = new bootstrap.Toast(toast);
        toastError.show();
        vPeso = false;
    }else{
        if (verificaDecimal(peso)) {
            $("#peso").removeClass("bg-label-danger");
            vPeso = true;
        } else {
    
            $("#peso").addClass("bg-label-danger");
            $("#small-error").html("Peso");
            $("#texto-error").html("Ingrese un número válido");
    
            let toast = document.querySelector("#toastError");
            let toastError = new bootstrap.Toast(toast);
            toastError.show();
            vPeso = false;
        }
        
    }

    if(estatura === ""){
        $("#Estatura").addClass("bg-label-danger");
        $("#small-error").html("Estatura");
        $("#texto-error").html("Ingrese la estatura");

        let toast = document.querySelector("#toastError");
        let toastError = new bootstrap.Toast(toast);
        toastError.show();
        vEstatura = false;
    }else{
        if (verificaEntero(peso)) {
            $("#Estatura").removeClass("bg-label-danger");
            vEstatura = true;
        } else {
    
            $("#peso").addClass("bg-label-danger");
            $("#small-error").html("Estatura");
            $("#texto-error").html("Ingrese un número válido");
    
            let toast = document.querySelector("#toastError");
            let toastError = new bootstrap.Toast(toast);
            toastError.show();
            vEstatura = false;
        }
        
    }

    if(estadoCivil === ""){
        $("#estadoCivil").addClass("bg-label-danger");
        $("#small-error").html("Estado Civil");
        $("#texto-error").html("Ingrese el estado civil");

        let toast = document.querySelector("#toastError");
        let toastError = new bootstrap.Toast(toast);
        toastError.show();
        vEstadoCivil = false;
    }else{
        $("#estadoCivil").removeClass("bg-label-danger");
        vEstadoCivil = true;
    }

    if(!$("#generoHombre").prop("checked")){
        if(!$("#generoMujer").prop("checked")){
            $("#small-error").html("Género ");
            $("#texto-error").html("Seleccione un género");

            let toast = document.querySelector("#toastError");
            let toastError = new bootstrap.Toast(toast);
            toastError.show();
            vGenero = false;
        }else{
            vGenero = true;
        }
    }else{
        vGenero = true;
    }

    if (inputImage.files.length === 0) {
        $("#formFileImage").addClass("bg-label-danger");
        $("#small-error").html("Archivo");
        $("#texto-error").html("Seleccione una imagen");
        let toast = document.querySelector("#toastError");
        let toastError = new bootstrap.Toast(toast);
        toastError.show();
        vImagen = false;
    } else {
        let pesoMaximo = 50 * 1024; 
        let archivo = inputImage.files[0];
        console.log("El peso de la imagen es " + archivo.size + " | o bien " + inputImage.size);
        if (archivo.size > pesoMaximo) {
            $("#formFileImage").addClass("bg-label-danger");
            $("#small-error").html("Archivo");
            $("#texto-error").html("El archivo que intenta subir supera los 50KB permitidos");
            let toast = document.querySelector("#toastError");
            let toastError = new bootstrap.Toast(toast);
            toastError.show();
            vImagen = false;
        }else{
            $("#formFileImage").removeClass("bg-label-danger");
            vImagen = true;
        }

        
    }


    if(vCategoria && vapp && vNombre && vLugarNacimiento && vFechaNacimiento && vNacionalidad && vEdad && vPeso && vEstatura && vGenero && vEstadoCivil && vImagen){
        insertarInfoJugador(categoria, app, nombre, lugarNacimiento, fechaNacimiento, Nacionalidad, edad, peso, estatura, estadoCivil, inputImage);
    }else{
        console.log("No se imprimirán los resultados");
        /*
        console.log("El resultado de vCategoria es: "+ vCategoria);
        console.log("El resultado de vapp es: "+ vapp);
        console.log("El resultado de vNombre es: "+ vNombre);
        console.log("El resultado de vLugarNacimiento es: "+ vLugarNacimiento);
        console.log("El resultado de vFechaNacimiento es: "+ vFechaNacimiento);
        console.log("El resultado de vNacionalidad es: "+ vNacionalidad);
        console.log("El resultado de vEdad es: "+ vEdad);
        console.log("El resultado de vPeso es: "+ vPeso);
        console.log("El resultado de vEstatura es: "+ vEstatura);
        console.log("El resultado de vGenero es: "+ vGenero);
        console.log("El resultado de vEstadoCivil es: "+ vEstadoCivil);
        console.log("El resultado de vImagen es: "+ vImagen);
        */
    }



    

});

$("#peso").change(function() {
       
    var peso = $(this).val().trim();


    if (verificaDecimal(peso)) {
        $(this).removeClass("bg-label-primary");
    } else {

        $(this).addClass("bg-label-primary");

        $("#small-warning").html("Peso");
        $("#texto-warning").html("Ingrese un número válido");

        let toast = document.querySelector("#toastAlerta");
        let toastError = new bootstrap.Toast(toast);
        toastError.show();
    }
});

$("#Estatura").change(function() {
       
    var estatura = $(this).val().trim();

    

    if (verificaEntero(estatura)) {
        $(this).removeClass("bg-label-primary");
    } else {
        $(this).addClass("bg-label-primary");

        $("#small-warning").html("Estatura");
        $("#texto-warning").html("Ingrese un número entero válido");

        let toast = document.querySelector("#toastAlerta");
        let toastError = new bootstrap.Toast(toast);
        toastError.show();
    }
});





/**
 * ACCIONES PARA EL REGISTRO DE CATEGORÍAS
 */

$("#registroCategoria").click(function(e){
    let guardarCategoria = false;
    var idEquipo = $("#selectEquipo").val();
    var nombreCategoria = $("#nombrecategoria").val().trim();
    if( idEquipo === ""){
        $("#selectEquipo").addClass("bg-label-danger");
        $("#small-error").html("Equipo");
        $("#texto-error").html("Seleccione el equipo");

        let toast = document.querySelector("#toastError");
        let toastError = new bootstrap.Toast(toast);
        toastError.show();
        statusEquipo = false;
    } else {
        $("#selectEquipo").removeClass("bg-label-danger");
        statusEquipo = true;
    }
    if( nombreCategoria === ""){
        $("#nombrecategoria").addClass("bg-label-danger");
        $("#small-error").html("Categoria");
        $("#texto-error").html("Ingrese la categoria a registrar");

        let toast = document.querySelector("#toastError");
        let toastError = new bootstrap.Toast(toast);
        toastError.show();
        statusNombreCategoria = false;
    } else {
        $("#nombrecategoria").removeClass("bg-label-danger");
        statusNombreCategoria = true;
    }

    if(statusEquipo && statusNombreCategoria){
        registrarCategoria(idEquipo, nombreCategoria);
    }else{
        return;
    }
});




/**
 * ACCIONES PARA EL REGISTRO DE EQUIPOS
 */

$("#registroEquipo").click(function(){
    let nombreEquipo = $("#nombreEquipo").val().trim();
    if( nombreEquipo === ""){
        $("#nombreEquipo").addClass("bg-label-danger");
        $("#small-error").html("Equipo");
        $("#texto-error").html("Seleccione el equipo");

        let toast = document.querySelector("#toastError");
        let toastError = new bootstrap.Toast(toast);
        toastError.show();
        return;
    } else {
        $("#nombreEquipo").removeClass("bg-label-danger");
        registrarEquipo(nombreEquipo);
    }
})


/**
 * ACCIONES PARA EL REGISTRO DE TORNEOS
 */

$("#registroTorneo").click(function(){
    let nombreTorneo = $("#nombreTorneo").val().trim();
    if( nombreTorneo === ""){
        $("#nombreTorneo").addClass("bg-label-danger");
        $("#small-error").html("Torneo");
        $("#texto-error").html("Ingrese el nombre del torneo");

        let toast = document.querySelector("#toastError");
        let toastError = new bootstrap.Toast(toast);
        toastError.show();
        return;
    } else {
        $("#nombreTorneo").removeClass("bg-label-danger");
        registrarTorneo(nombreTorneo);
    }
})


/**
 * ACCIONES PARA EL REGISTRO DE POSICIONES
 */

$("#registroPosicion").click(function(){
    let nombrePosicion = $("#nombrePosicion").val().trim();
    if( nombrePosicion === ""){
        $("#nombrePosicion").addClass("bg-label-danger");
        $("#small-error").html("Posicion");
        $("#texto-error").html("Ingrese el nombre de la posición");

        let toast = document.querySelector("#toastError");
        let toastError = new bootstrap.Toast(toast);
        toastError.show();
        return;
    } else {
        $("#nombrePosicion").removeClass("bg-label-danger");
        registrarPosicion(nombrePosicion);
    }
})


/**
 * ACCIONES PARA EL REGISTRO DE MOVIMIENTOS
 */

$("#registroMovimientoTipo").click(function(){
    let nombreMovimiento = $("#nombreMovimiento").val().trim();
    if( nombreMovimiento === ""){
        $("#nombreMovimiento").addClass("bg-label-danger");
        $("#small-error").html("Movimiento");
        $("#texto-error").html("Ingrese el nombre del movimiento");

        let toast = document.querySelector("#toastError");
        let toastError = new bootstrap.Toast(toast);
        toastError.show();
        return;
    } else {
        $("#nombreMovimiento").removeClass("bg-label-danger");
        registrarMovimiento(nombreMovimiento);
    }
});










/**
 * FUNCIONES ADICIONALES 
 */

function verificaEntero(valor){
    var regex = /^[1-9]\d*$/;
    if (regex.test(valor)){
        return true;
    }else{
        return false;
    }
}

function verificaDecimal(valor){
    var regex = /^[1-9]\d*(\.\d+)?$/;
    if (regex.test(valor)){
        return true;
    }else{
        return false;
    }
}

function calcularEdad(fechaNacimiento) {
    
    let fechaActual = new Date();
    let fechaNacimientoObj = new Date(fechaNacimiento);
    let diferencia = fechaActual - fechaNacimientoObj;

    var edadA = Math.floor(diferencia / (1000 * 60 * 60 * 24 * 365.25));
    var meses = Math.floor((diferencia % (1000 * 60 * 60 * 24 * 365.25)) / (1000 * 60 * 60 * 24 * (365.25/12)));
    var dias = Math.floor((diferencia % (1000 * 60 * 60 * 24 * (365.25/12))) / (1000 * 60 * 60 * 24));

    return edadA;
}

