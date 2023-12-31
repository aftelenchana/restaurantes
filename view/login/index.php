<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema para restaurantes, cevicherias, entre otros</title>
    <link href='assets/img/restepe.ico' rel='shortcut icon' type='image/x-icon'/>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/plugins/select/bootstrap-select.css" rel="stylesheet">
    <link href="assets/css/plugins/formvalidation/formValidation.min.css" rel="stylesheet">
</head>

<body class="gray-bg" style="background: url(assets/img/login-bg.png) #e9e9e9 repeat;">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div class="ibox-content">
                <center><img src="assets/img/logo-sistema.png"/></center>
            </div>
            <div class="ibox-content" style="background: #f8f7f7">
                <form class="m-t" id="frm-login" role="form" method="post" action="controller/login.controller.php" autocomplete="off">
                    <div class="form-group">
                        <select class="selectpicker show-tick form-control cb_tpuser" id="cb_tpuser" name="txt_rol"  data-live-search-style="begins" data-live-search="true" title="Seleccionar Rol de Usuario" autocomplete="off">
                            <option value="1" title="Rol: ADMINISTRADROR">ADMINISTRADOR</option>
                            <option value="2" title="Rol: CAJA">CAJA</option>
                            <option value="3" title="Rol: AREA DE PRODUCCION">AREA DE PRODUCCION</option>
                            <option value="4" title="Rol: MOZO">MOZO</option>
                          </select>
                    </div>
                    <div class="opc1">
                        <div class="form-group">
                            <select name="txt_caja" class="selectpicker show-tick form-control cb_caja" data-live-search-style="begins" data-live-search="true" title="Seleccionar Caja" autocomplete="off" required>
                                <?php foreach($this->model->Caja() as $r): ?>
                                    <option value="<?php echo $r->id_caja; ?>"><?php echo $r->descripcion; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="txt_turno" class="selectpicker show-tick form-control cb_turno" data-live-search-style="begins" data-live-search="true" title="Seleccionar Turno" autocomplete="off">
                                <?php foreach($this->model->Turno() as $r): ?>
                                    <option value="<?php echo $r->id_turno; ?>"><?php echo $r->descripcion; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="opc4">
                        <div class="form-group">
                            <select name="txt_area" class="selectpicker show-tick form-control cb_area" data-live-search-style="begins" data-live-search="true" title="Seleccionar Area Produccion" autocomplete="off" required>
                                <?php foreach($this->model->AreaProduccion() as $r): ?>
                                    <option value="<?php echo $r->id_areap; ?>"><?php echo $r->nombre; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="opc2">
                        <div class="form-group">
        				    <div class="input-group">
        				      	<span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>
        					  	<input type="text" name="txt_usuario" class="form-control" placeholder="Usuario" aria-describedby="basic-addon1" value="" autocomplete="false">
        				    </div>
        				</div>
                        <div class="form-group">
        				    <div class="input-group">
        				      	<span class="input-group-addon" id="basic-addon1"><i class="fa fa-certificate"></i></span>
        					  	<input type="password" name="txt_password" class="form-control" placeholder="Contrase&ntilde;a" aria-describedby="basic-addon1" value="" autocomplete="off">
        					</div>
        				</div>
                    </div>
                    <div class="opc3">
                        <button type="submit" class="btn btn-primary block full-width m-b" id="btn-submit">INGRESAR</button>
                    </div>
                    <?php
                        if (isset($_GET['m']) == 'e'){
                            echo '<div class="alert alert-danger alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><i class="fa fa-warning"></i> Datos incorrectos.</div>';
                        } elseif (isset($_GET['me']) == 'a') {
                            echo '<div class="alert alert-warning alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><i class="fa fa-bolt"></i> Debe Aperturar Caja</div>';
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="assets/js/jquery-2.1.1.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/plugins/select/bootstrap-select.min.js"></script>
<script src="assets/js/plugins/formvalidation/formValidation.min.js"></script>
<script src="assets/js/plugins/formvalidation/framework/bootstrap.min.js"></script>
<script src="assets/scripts/login/login.js"></script>
