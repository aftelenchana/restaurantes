<?php
date_default_timezone_set($_SESSION["zona_horaria"]);
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
$fecha = date("d-m-Y");
$fechaa = date("m-Y");
?>

<input type="hidden" id="moneda" value="<?php echo $_SESSION["moneda"]; ?>"/>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2></h2>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeIn">
	<div class="ibox">
		<div class="ibox-title">
			<div class="ibox-title-buttons pull-right">
				<a class="btn btn-warning" ui-sref="informes.ventas" href="lista_tm_informes.php"> <i class="fa fa-arrow-left"></i> Atr&aacute;s </a>
			</div>
			<h5><strong><i class="fa fa-list"></i> Todos los ingresos</strong></h5>
		</div>
		<div class="ibox-content" style="position: relative; min-height: 30px;">
            <div class="row">
                <form method="post" enctype="multipart/form-data" target="_blank" action="#">
                    <div class="col-sm-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="control-label">Rango de fechas</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-r text-center" name="start" id="start" value="<?php echo '01-'.$fechaa; ?>"/>
                                        <span class="input-group-addon">al</span>
                                        <input type="text" class="form-control bg-r text-center" name="end" id="end" value="<?php echo $fecha; ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                <table id="table" class="table table-hover table-condensed table-striped" width="100%">
                    <thead>
	                    <tr>
	                        <th>Fecha</th>
	                        <th>Caja</th>
	                        <th>Usuario</th>
	                        <th>Concepto</th>
	                        <th class="text-center">Estado</th>
                            <th class="text-right">Monto</th>
	                    </tr>
                    </thead>
                </table>
            </div>
		</div>
	</div>
</div>

<script src="assets/scripts/informes/finanzas/func-ingresos.js"></script>