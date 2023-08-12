<input type="hidden" id="cod_ape" value="<?php echo $_SESSION["apertura"]; ?>"/>
<input type="hidden" id="moneda" value="<?php echo $_SESSION["moneda"]; ?>"/>
<input type="hidden" id="m" value="<?php echo $_GET['m']; ?>"/>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2><i class="fa fa-money"></i> <a class="a-c" href="?c=ICaja">Caja</a></h2>
        <ol class="breadcrumb">
            <li class="active">
                <strong>Caja</strong>
            </li>
            <li>Ingresos</li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeIn">
    <div class="ibox">
        <div class="ibox-title">
            <div class="ibox-title-buttons pull-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdl-nuevo"><i class="fa fa-plus-circle"></i> Nuevo Ingreso</button>
            </div>
            <h5><strong><i class="fa fa-list-ul"></i> Lista de Ingresos</strong></h5>
        </div>
        <div class="ibox-content">
            <div class="row" >
                <div class="col-sm-4 col-sm-offset-8" style="text-align:right;" id="filter_global">
                    <div class="input-group">
                        <input class="form-control global_filter" id="global_filter" type="text">
                        <span class="input-group-btn">
                            <button class="btn btn btn-primary"> <i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-condensed table-striped" id="table" width="100%">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Motivo</th>
                            <th>Importe</th>
                            <th class="text-center">Estado</th>
                            <th class="text-right">Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal fade" id="mdl-nuevo" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content animated bounceInRight">
        <form id="frm-nuevo" method="post" enctype="multipart/form-data" action="?c=Caja&a=crud">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                <h4 class="modal-title">Ingreso Administrativo</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Importe</label>
                            <div class="input-group dec">
                                <span class="input-group-addon"><?php echo $_SESSION["moneda"]; ?></span>
                                <input type="text" name="importe" id="importe" class="form-control" placeholder="Ingrese Importe" autocomplete="off"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group letNumMayMin">
                            <label class="control-label">Concepto</label>
                            <textarea name="motivo" id="motivo" class="form-control" rows="5" placeholder="Ingrese motivo"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal inmodal fade" id="mdl-anular" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content animated bounceInRight">
        <form id="frm-anular" method="post" enctype="multipart/form-data" action="?c=Caja&a=estado">
        <input type="hidden" name="cod_ing" id="cod_ing">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                <h4 class="modal-title">¿Desea anular este ingreso?</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Importe: </label><br>
                            <?php echo $_SESSION["moneda"]; ?> <span class="c-importe"></span>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Concepto: </label><br>
                            <span class="c-concepto"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Aceptar</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal inmodal fade" id="mdl-validar-apertura" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-transparent text-center p-md"> <i class="fa fa-warning fa-3x text-warning"></i> <h2 class="m-t-none m-b-sm">Advertencia</h2> <p>Para poder realizar esta operaci&oacute;n es necesario Aperturar Caja.</p></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-xs-3">
                        <div class="text-left">
                            <a href="lista_tm_tablero.php" class="btn btn-default">Volver</a>
                        </div>
                    </div>
                    <div class="col-xs-9">
                        <div class="text-right">
                            <a href="lista_caja_aper.php" class="btn btn-primary">Aperturar Caja</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/scripts/caja/func_ing.js"></script>
