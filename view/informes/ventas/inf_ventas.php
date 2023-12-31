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
        <form method="post" enctype="multipart/form-data" target="_blank" action="?c=Informe&a=ExportExcel">
		<div class="ibox-title">
			<div class="ibox-title-buttons pull-right">
                <button type="submit" class="btn btn-primary"><i class="fa fa-file-excel-o"></i> Excel</button>
				<a class="btn btn-warning" href="lista_tm_informes.php"><i class="fa fa-arrow-left"></i> Atr&aacute;s </a>
			</div>
			<h5><strong><i class="fa fa-list"></i> Total de las Ventas</strong></h5>
		</div>
		<div class="ibox-content" style="position: relative; min-height: 30px;">
            <div class="row">
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
                <div class="col-sm-2">
                    <label class="control-label">Tipo Pedido</label>
                    <div class="form-group">
                        <select name="tipo_ped" id="tipo_ped" class="selectpicker form-control" data-live-search="true" autocomplete="off" data-size="5">
                            <option value="%" active>Mostrar Todo</option>
                            <optgroup>
                                <?php foreach($this->model->TipoPedido() as $r): ?>
                                    <option value="<?php echo $r->id_tipo_pedido; ?>"><?php echo $r->descripcion; ?></option>
                                <?php endforeach; ?>
                            </optgroup>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <label class="control-label">Cliente</label>
                    <div class="form-group">
                        <select name="cliente" id="cliente" class="selectpicker form-control" data-live-search="true" autocomplete="off" data-size="5">
                            <option value="%" active>Mostrar Todo</option>
                            <optgroup>
                                <?php foreach($this->model->Clientes() as $r): ?>
                                    <option value="<?php echo $r->id_cliente; ?>"><?php echo $r->nombre; ?></option>
                                <?php endforeach; ?>
                            </optgroup>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <label class="control-label">Caja</label>
                    <div class="form-group">
                        <select name="cod_cajas" id="cod_cajas" class="selectpicker form-control" data-live-search="true" autocomplete="off" data-size="5">
                        <option value="%">Mostrar Todo</option>
                        <optgroup>
                            <?php foreach($this->model->Cajas() as $r): ?>
                              <option value="<?php echo $r->id_caja; ?>"><?php echo $r->descripcion; ?></option>
                            <?php endforeach; ?>
                        </optgroup>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <label class="control-label">Tipo Comprobante</label>
                    <div class="form-group">
                        <select name="tipo_doc" id="tipo_doc" class="selectpicker form-control" data-live-search="true" autocomplete="off">
                            <option value="%" active>Mostrar Todo</option>
                            <optgroup>
                                <option value="1">BOLETA</option>
                                <option value="2">FACTURA</option>
                                <option value="3">TICKET</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
            </div>
            </form>
			<div class="punteo">
                <div class="row">
                    <div class="col-lg-3">
                        <h5 class="no-margins"><strong>Descuento</strong></h5>
                        <h1 class="no-margins"><strong id="des_v"></strong></h1>
                    </div>
                    <div class="col-lg-3">
                        <h5 class="no-margins"><strong>Subtotal</strong></h5>
                        <h1 class="no-margins"><strong id="subt_v"></strong></h1>
                    </div>
                    <div class="col-lg-3">
                        <h5 class="no-margins"><strong>IGV</strong></h5>
                        <h1 class="no-margins"><strong id="igv_v"></strong></h1>
                    </div>
                    <div class="col-lg-3">
                        <h5 class="no-margins"><strong>Total</strong></h5>
                        <h1 class="no-margins"><strong id="total_v"></strong></h1>
                    </div>
                </div>
            </div>
			<div class="table-responsive">
                <table id="table" class="table table-hover table-condensed table-striped" width="100%">
                    <thead>
                    <tr>
                        <th width="10%">Fecha</th>
                    	<th>Caja</th>
                    	<th width="20%">Cliente</th>
                    	<th>Documento</th>
                    	<th class="text-right" width="15%">Pagos</th>
                    	<th class="text-right">Total venta</th>
                    	<th>Tipo de venta</th>
                    	<th class="text-center">Estado</th>
                    	<th class="text-right">Opciones</th>
                    </tr>
                    </thead>
                </table>
            </div>
		</div>
	</div>
</div>

<div class="modal inmodal fade" id="detalle" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                <h5 class="modal-title title-d" style="font-size: 18px">Detalle</h5>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover table-condensed table-striped">
                        <thead>
                            <tr>
                                <th>Cantidad</th>
                                <th>Producto</th>
                                <th>P.U.</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody id="lista_p"></tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
        </form>
        </div>
    </div>
</div>

<script src="assets/scripts/informes/ventas/func-ventas.js"></script>
