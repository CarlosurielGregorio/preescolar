<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Búsqueda /</span> Resultados HISTOCLIN</h4>

  <div class="row">
    <div class="col-md-12">
      
      <div class="card mb-4">
        <h5 class="card-header">Resultados de la búsqueda...</h5>
        <!-- Account -->
        <div class="card-body">
          <div id="resultDatos"></div>
          <span id="respDatos"></span>
          
        </div>
        <!-- /Account -->
      </div>
      
    </div>
  </div>
</div>
<script>
    
    buscador();

    function buscador(){
        console.log("A ver si entra el buscador");
        var argumento = $("#argumento-bsc").val();
        var datos = {
            argumento : argumento,
            accion : "datosHistoclin"

        }
        console.log('La acción es: datosHistoclin');
        var ruta = "<?php echo URL; ?>controller/buscador.php";
        $.ajax({
            url: ruta,
            type: 'POST',
            dataType: false,
            data: datos,
        })
        .done(function(resp){
            $("#resultDatos").html(resp);
        })
        .fail(function(){

        })
        .always(function(resp){
            console.log("se ha finalizado la petición: " + resp);
            
        });
    }
</script>