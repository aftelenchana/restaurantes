<?php
date_default_timezone_set($_SESSION["zona_horaria"]);
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
$fecha = date("d-m-Y h:i A");
$fechaa = date("m-Y h:i: A");
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
			<h5><strong><i class="fa fa-list"></i> Ventas por mozo</strong></h5>
		</div>
		<div class="ibox-content" style="position: relative; min-height: 30px;">
            <div class="row">
                <form method="post" enctype="multipart/form-data" target="_blank" action="#">
                    <div class="col-sm-4">
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
                    <div class="col-sm-3">
                        &nbsp;
                    </div>
                    <div class="col-sm-5">
                        <label class="control-label">Mozo</label>
                        <div class="form-group">
                            <select name="mozo" id="mozo" class="selectpicker form-control" data-live-search="true" autocomplete="off" data-size="5">
                                <option value="%" active>Mostrar Todo</option>
                                <optgroup>
                                    <?php foreach($this->model->Mozos() as $r): ?>
                                        <option value="<?php echo $r->id_usu; ?>"><?php echo $r->nombre; ?></option>
                                    <?php endforeach; ?>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="punteo">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="no-margins"><strong>Cantidad de Ventas</strong></h5>
                        <h1 class="no-margins"><strong id="cant_v"></strong></h1>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="no-margins"><strong>Total de ventas</strong></h5>
                        <h1 class="no-margins"><strong id="total_v"></strong></h1>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="table" class="table table-hover table-condensed table-striped" width="100%">
                    <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Mozo</th>
                        <th>Cliente</th>
                        <th>Documento</th>
                        <th>Num. doc.</th>
                        <th class="text-right">Total</th>
                    </tr>
                    </thead>
                </table>
            </div>
		</div>
	</div>
</div>

<script src="assets/scripts/informes/ventas/func-mozos.js"></script>