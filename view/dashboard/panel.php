<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-8 col-sm-12">
            <div class="card mb-3">
                <h5 class="card-header">Buscador</h5>
                <div class="card-body">
                    <form>
                        <div class="row mb-1">
                            <div class="col-sm-12">
                                <div class="input-group input-group-merge">
                                    <span id="label-matricula-alumno" class="input-group-text"><i class='bx bx-barcode-reader'></i></span>
                                    <input type="text" class="form-control" id="matricula-alumno" placeholder="Matrícula alumno" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <div class="input-group input-group-merge">
                                    <span id="label-nombre-alumno" class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" id="nombre-alumno" placeholder="Nombre del alumno" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive text-nowrap">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm 12">
                    <div class="card" style="overflow: auto;">
                        <h5 class="card-header">Todos los alumnos</h5>
                        <div class="card-body">
                            <div class="table-responsive text-nowrap">
                                <table id="table-simbologia" class="table table-bordered text-center mb-3">
                                    <thead>
                                        <tr>
                                            <th>Registrado</th>
                                            <th>No Registrado</th>
                                            <th>Retardo</th>
                                            <th>Salida antes de tiempo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><i class='bx bx-user-check text-success'></i></td>
                                            <td><i class='bx bx-user-x text-danger'></i></td>
                                            <td><i class='bx bxs-watch text-info'></i></td>
                                            <td><i class='bx bx-run text-info'></i></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table id="tabla_alumno" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Alumno</th>
                                            <th>Matrícula</th>
                                            <th>ingreso</th>
                                            <th>Salida</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="datosAlumnos">
                                        <?php
                                            for($i=0; $i<10; $i++){
                                                ?>
                                                <tr>
                                                    <td>
                                                        <img src="<?php echo URL; ?>view/template/assets/img/avatars/avatar_usuario.png" alt class="w-px-30 h-auto rounded-circle" />
                                                    </td>
                                                    <td>
                                                        Nombre del alumno
                                                    </td>
                                                    <td>
                                                        23167892A
                                                    </td>
                                                    <td class="text-center">
                                                        <?php
                                                            $numero = rand(1, 10);
                                                            
                                                            if($numero < 8){
                                                                if($numero % 2 == 0){
                                                                    echo "<i class='bx bx-user-check text-success'></i>";
                                                                }else{
                                                                    echo "<i class='bx bxs-watch text-info'></i>";
                                                                }
                                                            }else{
                                                                echo "<i class='bx bx-user-x text-danger'></i>";
                                                            }
                                                        ?>
                                                    </td>
                                                    <td class="text-center">
                                                    <?php
                                                            $numero = rand(1, 10);
                                                            
                                                            if($numero < 8){
                                                                if($numero % 2 == 0){
                                                                    echo "<i class='bx bx-user-check text-success'></i>";
                                                                }else{
                                                                    echo "<i class='bx bx-run text-info'></i>";
                                                                }
                                                            }else{
                                                                echo "<i class='bx bx-user-x text-danger'></i>";
                                                            }
                                                        ?>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12">
            <div class="card mb-3">
                <div class="card-body text-center">
                    <img src="<?php echo URL; ?>view/template/assets/img/avatars/avatar_preescolar.png" width="210"/>
                    <h4><strong>NOMBRE DEL ALUMNO</strong></h4>
                    <h6><strong>234561A</strong></h6>
                    <button class="btn btn-outline-dark">
                        <i class='bx bx-log-in'></i>
                        <br>
                        Ingreso
                    </button>
                    <button class="btn btn-outline-dark" disabled>
                        <i class='bx bx-log-out'></i>
                        <br>
                        Salida
                    </button>
                    <button class="btn btn-outline-dark">
                        <i class='bx bx-clipboard'></i>
                        <br>
                        Nota Médica
                    </button>
                </div>
                <div class="table-responsive text-nowrap">
                </div>
            </div>
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Ingresos y salidas del día</h5>
                        <small class="text-muted"><?php date('y-m-d')?></small>
                    </div>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                            <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                            <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0 mt-5">
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded color-orange-preescolar">
                                <i class='bx bxs-group'></i>
                            </span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">Todos los alumnos</h6>
                            </div>
                            <div class="user-progress">
                                <small class="fw-semibold">47</small>
                            </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded color-orange-preescolar">
                                <i class='bx bx-user-check'></i>
                            </span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">Accesos</h6>
                            </div>
                            <div class="user-progress">
                                <small class="fw-semibold">40</small>
                            </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded color-orange-preescolar">
                                <i class='bx bxs-watch'></i>
                            </span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">Accesos con retardo</h6>
                            </div>
                            <div class="user-progress">
                                <small class="fw-semibold">5</small>
                            </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded color-orange-preescolar">
                                <i class='bx bx-user-x'></i>
                            </span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">Sin acceso registrado</h6>
                                <small class="text-muted">(Faltas)</small>
                            </div>
                            <div class="user-progress">
                                <small class="fw-semibold">2</small>
                            </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded color-orange-preescolar">
                                <i class='bx bx-user-check'></i>
                            </span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">Salidas registrada</h6>
                            </div>
                            <div class="user-progress">
                                <small class="fw-semibold">43</small>
                            </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded color-orange-preescolar">
                                <i class='bx bx-run'></i>
                            </span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">Salidas antes de tiempo</h6>
                            </div>
                            <div class="user-progress">
                                <small class="fw-semibold">2</small>
                            </div>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded color-orange-preescolar">
                                <i class='bx bx-user-x'></i>
                            </span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">Salidas no registrada</h6>
                            </div>
                            <div class="user-progress">
                                <small class="fw-semibold">2</small>
                            </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>