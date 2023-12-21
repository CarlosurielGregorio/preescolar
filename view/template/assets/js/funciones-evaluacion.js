$(document).ready(function() {
    const RUTA = "http://localhost:8080/Nutricion/";
   

    $("#selectPaciente").change(function(){
        var tipoPaciente = $(this).val();
        if(tipoPaciente == "A"){
            
            

            $("#divMatricula").removeAttr("hidden");
            $("#divNombre").removeAttr("hidden");
            
            $("#btnGuardarExpediente").removeAttr("hidden");
            
            $("#divNumeroEmpleado").attr("hidden", "hidden");
            
            $("#numeroEmpleado").val('');
            
            
        }else if(tipoPaciente == "E"){
            $("#divNumeroEmpleado").removeAttr("hidden");
            
            $("#btnGuardarExpediente").removeAttr("hidden");

            $("#divMatricula").attr("hidden", "hidden");
            
            $("#matriculaAlumno").val('');
            
        }else{
            
            $("#divMatricula").attr("hidden", "hidden");
            $("#divNumeroEmpleado").attr("hidden", "hidden");
            $("#btnGuardarExpediente").attr("hidden", "hidden");


            $("#matriculaAlumno").val('');
            $("#numeroEmpleado").val('');
            
            $("#nombrePaciente").val('');
            
        }
    });

    $("#inputPeso").keyup(function(){
        var mensajeError = '<div class="alert alert-danger alert-dismissible" role="alert">Ingrese solo valores numéricos con máximo 3 decimales<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        var pesoInput = $(this).val();
        
        
        var regex = /^([0-9]+\.?[0-9]{0,3})$/; 
      
        if (pesoInput.match(regex)) {
            $("#valorPeso").html(pesoInput);
            $("#rspPeso").html('');
        } else {
          $("#rspPeso").html(mensajeError);
        }


        
        
    });

    $("#inputTalla").keyup(function(){
        var mensajeError = '<div class="alert alert-danger alert-dismissible" role="alert">Ingrese solo valores numéricos con máximo 3 decimales<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        var tallaInput = $(this).val();
        var regexEntero = /^[0-9]+$/; 
      
        if (tallaInput.match(regexEntero)) {
            $("#valorTalla").html(tallaInput);
            $("#rspTalla").html('');
        } else {
            $("#rspTalla").html(mensajeError);
        }
        
    });

    $("#inputCintura").keyup(function(){
        var mensajeError = '<div class="alert alert-danger alert-dismissible" role="alert">Ingrese solo valores numéricos con máximo 3 decimales<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        var cinturaInput = $(this).val();
        var regexEntero = /^[0-9]+$/; 
      
        if (cinturaInput.match(regexEntero)) {
            $("#valorCintura").html(cinturaInput);
            $("#rspCintura").html('');
        } else {
            $("#rspCintura").html(mensajeError);
        }
    });

    $("#inputIMC").focus(function(){
        var peso = $("#inputPeso").val();
        var talla = $("#inputTalla").val();
        
        
        var estaturaMetros = talla / 100;
  
        // Calcular el IMC
        var imc = peso / (estaturaMetros * estaturaMetros);
        imc = imc.toFixed(2);
        
        $(this).val(imc);
        $("#valorIMC").html(imc);

        let observaciones = $("#observacionesPac").val();
        let recomendaciones = $("#recomendacionesPac").val();

        $("#resumenObservaciones").text(observaciones);
        $("#resumenRecomendaciones").text(recomendaciones);

        var selectColor = document.getElementById('select-gpo-kcal');


        if(imc <= 18.5){

            rutaImagen = RUTA + "view/template/assets/img/icons/unicons/icono_bajo_peso.png";
            rutaSilueta = RUTA + "view/template/assets/img/illustrations/silueta_h_bajo_peso.png";
            
            
                $("#statusActual").text('Bajo peso');
                $("#resumenStatus").text('Bajo peso');
                
                $("#IconoIMC").attr('src', rutaImagen);
                $("#figuraSilueta").attr('src', rutaSilueta);

                $('.list-group-item').removeClass('list-group-item-saludable');
                $('.list-group-item').removeClass('list-group-item-sobrepeso');
                $('.list-group-item').addClass('list-group-item-bajo-peso');

                var colorKcal = 'Morado';
                console.log('El color es: ' + colorKcal);
                for(var i = 0; i < selectColor.options.length; i ++){
                    var option = selectColor.options[i];
                    console.log('La opción es: ' + i);

                    if(option.text === colorKcal){
                        option.selected = true;
                        console.log('es morado');
                        break;
                    }
                }
                
                
            
            //desnutricion
        }else if (imc > 18.5 & imc < 24.9){
            //peso normal
            rutaImagen = RUTA + "view/template/assets/img/icons/unicons/icono_saludable.png";
            rutaSilueta = RUTA + "view/template/assets/img/illustrations/silueta_h_saludable.png";
                $("#statusActual").text('Peso normal');
                $("#resumenStatus").text('Peso normal');
                $("#IconoIMC").attr('src', rutaImagen);
                $("#figuraSilueta").attr('src', rutaSilueta);

                $('.list-group-item').removeClass('list-group-item-bajo-peso');
                $('.list-group-item').removeClass('list-group-item-sobrepeso');
                $('.list-group-item').addClass('list-group-item-saludable');
               
                let colorKcal = 'Verde';
                for(var i = 0; i < selectColor.options.length; i ++){
                    let option = selectColor.options[i];

                    if(option.text === colorKcal){
                        option.selected = true;
                        break;
                    }
                }
            
        }else if(imc >= 25.0){
            rutaImagen = RUTA + "view/template/assets/img/icons/unicons/icono_sobrepeso.png";
            rutaSilueta = RUTA + "view/template/assets/img/illustrations/silueta_h_sobrepeso.png";
                $("#statusActual").text('Sobrepeso');
                $("#resumenStatus").text('Sobrepeso');
                $("#IconoIMC").attr('src', rutaImagen);
                $("#figuraSilueta").attr('src', rutaSilueta);

                $('.list-group-item').removeClass('list-group-item-bajo-peso');
                $('.list-group-item').removeClass('list-group-item-saludable');
                $('.list-group-item').addClass('list-group-item-sobrepeso');

                let colorKcal = 'Naranja';
                for(var i = 0; i < selectColor.options.length; i ++){
                    let option = selectColor.options[i];

                    if(option.text === colorKcal){
                        option.selected = true;
                        break;
                    }
                }
               
            
        }

        $("#select-gpo-kcal").change(function(){
            var color = $("#select-gpo-kcal option:selected").text();

            if(color === 'Morado'){
                rutaImagen = RUTA + "view/template/assets/img/icons/unicons/icono_bajo_peso.png";
            rutaSilueta = RUTA + "view/template/assets/img/illustrations/silueta_h_bajo_peso.png";
            
            
                $("#statusActual").text('Bajo peso');
                $("#resumenStatus").text('Bajo peso');
                
                $("#IconoIMC").attr('src', rutaImagen);
                $("#figuraSilueta").attr('src', rutaSilueta);

                $('.list-group-item').removeClass('list-group-item-saludable');
                $('.list-group-item').removeClass('list-group-item-sobrepeso');
                $('.list-group-item').addClass('list-group-item-bajo-peso');

                
                
            }else if(color === 'Verde'){
                rutaImagen = RUTA + "view/template/assets/img/icons/unicons/icono_saludable.png";
                rutaSilueta = RUTA + "view/template/assets/img/illustrations/silueta_h_saludable.png";
                    $("#statusActual").text('Peso normal');
                    $("#resumenStatus").text('Peso normal');
                    $("#IconoIMC").attr('src', rutaImagen);
                    $("#figuraSilueta").attr('src', rutaSilueta);

                    $('.list-group-item').removeClass('list-group-item-bajo-peso');
                    $('.list-group-item').removeClass('list-group-item-sobrepeso');
                    $('.list-group-item').addClass('list-group-item-saludable');
            }else if(color === 'Naranja'){
                rutaImagen = RUTA + "view/template/assets/img/icons/unicons/icono_sobrepeso.png";
                rutaSilueta = RUTA + "view/template/assets/img/illustrations/silueta_h_sobrepeso.png";
                    $("#statusActual").text('Sobrepeso');
                    $("#resumenStatus").text('Sobrepeso');
                    $("#IconoIMC").attr('src', rutaImagen);
                    $("#figuraSilueta").attr('src', rutaSilueta);

                    $('.list-group-item').removeClass('list-group-item-bajo-peso');
                    $('.list-group-item').removeClass('list-group-item-saludable');
                    $('.list-group-item').addClass('list-group-item-sobrepeso');
            }

        });

        
    });

    $("#inputSuperficie").focus(function(){
        var altura = $("#inputTalla").val();
        var peso = $("#inputPeso").val();

        

        // Aplicar la fórmula de Dubois
        var sc = 0.007184 * Math.pow(peso, 0.425) * Math.pow(altura, 0.725);

        // Redondear el resultado a dos decimales
        sc = sc.toFixed(2);

        $(this).val(sc);

    });

    

    
});