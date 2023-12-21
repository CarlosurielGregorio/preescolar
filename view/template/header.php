<?php
   if(!isset($_SESSION)){
    session_start();
   }
   

    
    
?>
        <!DOCTYPE html>

        <html
        lang="es"
        class="light-style layout-menu-fixed"
        dir="ltr"
        data-theme="theme-default"
        data-assets-path="<?php echo URL; ?>view/template/assets/"
        data-template="vertical-menu-template-free"
        >
        <head>
            <meta charset="utf-8" />
            <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
            />

            <title>Maternal y preescolar</title>

            <meta name="description" content="" />

            <!-- Favicon -->
            <link rel="icon" type="image/x-icon" href="<?php echo URL; ?>view/template/assets/img/favicon/icono_ufd.png" />

            <!-- Fonts -->
           

            <!-- Icons. Uncomment required icon fonts -->
            <link rel="stylesheet" href="<?php echo URL; ?>view/template/assets/vendor/fonts/boxicons.css" />

            <!-- Core CSS -->
            <link rel="stylesheet" href="<?php echo URL; ?>view/template/assets/vendor/css/core.css" class="template-customizer-core-css" />
            <link rel="stylesheet" href="<?php echo URL; ?>view/template/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
            <link rel="stylesheet" href="<?php echo URL; ?>view/template/assets/css/demo.css" />

            <!-- Vendors CSS -->
            <link rel="stylesheet" href="<?php echo URL; ?>view/template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

            <link rel="stylesheet" href="<?php echo URL; ?>view/template/assets/vendor/libs/apex-charts/apex-charts.css" />

            <!-- Page CSS -->

            <!-- Helpers -->
            <script src="<?php echo URL; ?>view/template/assets/vendor/js/helpers.js"></script>
            

            <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
            <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
            <script src="<?php echo URL; ?>view/template/assets/js/config.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            

        </head>

        <body>
        <?php
                if(isset($_SESSION['loggedin']) == true){

            ?>
            <!-- Layout wrapper -->
            <div class="layout-wrapper layout-content-navbar">
                <div class="layout-container">
                    <!-- Layout container -->
                    <div class="layout-page">
                        <!-- Navbar -->
                        <img src="<?php echo URL; ?>view/template/assets/img/elements/header.png" 
                            alt="header" class="header-image">
                            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                <div class="container-fluid">
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                            <li class="nav-item">
                                                <a class="nav-link active" aria-current="page" href="javascript:void(0)"> <i class='bx bx-home-smile'></i> Inicio</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="javascript:void(0)"> <i class='bx bx-list-check'></i> Ingresos</a>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class='bx bx-bed'></i> Reposos
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    <li><a class="dropdown-item" href="javascript:void(0)">Deportivos</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0)">Domicilio</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                                            <!-- User -->
                                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                                    <div class="avatar avatar-online">
                                                        <img src="<?php echo URL; ?>view/template/assets/img/avatars/avatar_usuario.png" alt class="w-px-30 h-auto rounded-circle" />
                                                    </div>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                    <a class="dropdown-item" href="#">
                                                        <div class="d-flex">
                                                        <div class="flex-shrink-0 me-3">
                                                            <div class="avatar avatar-online">
                                                            <img src="<?php echo URL; ?>view/template/assets/img/avatars/avatar_usuario.png" alt class="w-px-40 h-auto rounded-circle" />
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <span class="fw-semibold d-block">USuario</span>
                                                            <small class="text-muted">Admin</small>
                                                        </div>
                                                        </div>
                                                    </a>
                                                    </li>
                                                    
                                                    <li>
                                                    <div class="dropdown-divider"></div>
                                                    </li>
                                                    <li>
                                                    <a class="dropdown-item" href="index.php?controller=admin&action=logout" >
                                                        <i class="bx bx-power-off me-2"></i>
                                                        <span class="align-middle">Salir</span>
                                                    </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <!--/ User -->
                                        </ul>
                                    </div>
                                </div>
                            </nav>

                        
                       
               
                        <!-- Content wrapper -->
                        <div class="content-wrapper">
                        
                        <script>
                            
                            $("#btn-buscar-alumno").click(function(e){
                                let parametro = $("#txtParametro").val();
                                //let ruta = "<?php echo URL; ?>busqueda/resultados/" +  parametro;
                                let ruta = "index.php?controller=busqueda&action=resultados&id=" +  parametro;
                
                                e.preventDefault(); // Evita el comportamiento predeterminado del enlace
                                window.location.href = ruta;
                            });
                            $("#txtParametro").keyup(function(e){
                                if(e.which===13){
                                    let parametro = $("#txtParametro").val();
                                    let ruta = "index.php?controller=busqueda&action=resultados&id=" +  parametro;
                    
                                    e.preventDefault(); // Evita el comportamiento predeterminado del enlace
                                    window.location.href = ruta;
                                }
                            });
                            

                        </script>
                        <?php
                            }
                        ?>