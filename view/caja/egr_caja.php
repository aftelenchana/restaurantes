<input type="hidden" id="cod_ape" value="<?php echo $_SESSION["apertura"]; ?>"/>
<input type="hidden" id="moneda" value="<?php echo $_SESSION["moneda"]; ?>"/>
<input type="hidden" id="m" value="<?php echo $_GET['m']; ?>"/>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2><i class="fa fa-money"></i> <a class="a-c" href="?c=ECaja">Caja</a></h2>
        <ol class="breadcrumb">
            <li class="active">
                <strong>Caja</strong>
            </li>
            <li>Egresos</li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeIn">
    <div class="ibox">
        <div class="ibox-title">
            <div class="ibox-title-buttons pull-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdl-nuevo-gasto"><i class="fa fa-plus-circle"></i> Nuevo Egreso</button>
            </div>
            <h5><strong><i class="fa fa-list-ul"></i> Lista de Egresos</strong></h5>
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
                            <th>Tipo</th>
                            <th>Concepto</th>
                            <th>Importe</th>
                            <th class="text-center">Estado</th>
                            <th class="text-right">Acciones</th>
                        </tr>
                    </thead>
                    <!--
                    <tbody>
                    <?php foreach($this->model->Listar() as $r): ?>
                      <tr>
                        <td><i class="fa fa-calendar"></i><?php echo ' '.date('d-m-Y',strtotime($r->fecha_re)); ?>
                        </td>
                        <td><i class="fa fa-clock-o"></i><?php echo ' '.date('h:i A',strtotime($r->fecha_re)); ?>
                        </td>
                        <td><?php echo $r->des_tg; ?></td>
                        <td><?php echo $r->desc_per.' - '.$r->motivo; ?></td>
                        <td><?php echo $_SESSION["moneda"].' '.number_format($r->importe,2); ?></td>
                        <td style="text-align: center">
                            <?php
                                if($r->estado == 'a'){
                                    echo '<span class="label label-primary">APROBADO</span>';  
                                }else if($r->estado == 'i'){
                                    echo '<span class="label label-danger">ANULADO</span>'; 
                                } 
                            ?>
                        </td>
                        <td style="text-align: center">
                            <button type="button" class="btn btn-danger btn-xs" onclick="anularGasto(<?php echo $r->id_ga.',\''.$r->des_tg.'\',\''.$r->importe.'\',\''.$r->desc_per.' - '.$r->motivo.'\'' ?>);"><i class="fa fa-ban"></i> Anular</button>
                        </td>
                      </tr>     
                    <?php endforeach; ?>
                    </tbody>
                    -->
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal fade" id="mdl-nuevo-gasto" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
        <form id="frm-nuevo-gasto" method="post" enctype="multipart/form-data" action="?c=ECaja&a=Guardar">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                <h4 class="modal-title">Egreso Administrativo</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div style="text-align: left;">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label><input name="rating" type="radio" value="1" id="rating_0" class="flat-red" checked="true"> Compras</label>
                                </div>
                                <div class="col-sm-4">
                                    <label><input name="rating" type="radio" value="2" id="rating_1" class="flat-red"> Servicios</label>
                                </div>
                                <div class="col-sm-4">
                                    <label><input name="rating" type="radio" value="3" id="rating_2" class="flat-red"> Remuneraci&oacute;n</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Tipo de documento</label>
                            <select name="id_tipo_doc" id="id_tipo_doc" class="selectpicker form-control" data-live-search-style="begins" data-live-search="true" title="Tipo de Documento" autocomplete="off" required="required" >
                            <?php foreach($this->model->TipoDocumento() as $r): ?>
                                <option value="<?php echo $r->id_tipo_doc; ?>"><?php echo $r->descripcion; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Importe</label>
                            <div class="input-group dec">
                                <span class="input-group-addon"><?php echo $_SESSION["moneda"]; ?></span>
                                <input type="text" name="importe" id="importe" class="form-control" placeholder="Ingrese Importe" autocomplete="off"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="opc" style="display: block;">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group ent">
                            <label class="control-label">Serie/Nro.</label>
                            <div class="input-group display-flex">
                                <input type="text" name="serie_doc" id="serie_doc" class="form-control text-right" placeholder="Serie" autocomplete="off" />
                                <span class="input-group-addon">-</span>
                                <input type="text" name="num_doc" id="num_doc" class="form-control" placeholder="N&uacute;mero" autocomplete="off" />
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Fecha del Comprobante</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                <input type="text" name="fecha_comp" id="fecha_comp" class="form-control DatePicker" placeholder="Fecha Comprobante" autocomplete="off" readonly="true"/>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

                <div id="opc-per" style="display: none;">
                <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label">Personal administrativo</label>
                        <div class="form-group">
                            <select name="id_per" id="id_per" class="selectpicker form-control" data-live-search-style="begins" data-live-search="true" title="Seleccionar Personal" autocomplete="off">
                            <optgroup label="Seleccionar Personal">
                                <?php foreach($this->model->Personal() as $r): ?>
                                    <option value="<?php echo $r->id_usu; ?>"><?php echo $r->ape_paterno.' '.$r->ape_materno.' '.$r->nombres; ?></option>
                                <?php endforeach; ?>
                            </optgroup>
                            </select>
                        </div>
                    </div>
                </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group letNumMayMin">
                            <label class="control-label">Motivo</label>
                            <textarea name="motivo" id="motivo" class="form-control" placeholder="Ingrese motivo"></textarea>
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

<div class="modal inmodal fade" id="mdl-anular-gasto" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content animated bounceInRight">
        <form id="frm-anular-gasto" method="post" enctype="multipart/form-data" action="?c=ECaja&a=Estado">
        <input type="hidden" name="cod_ga" id="cod_ga">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                <h4 class="modal-title">¿Desea anular este Egreso?</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Tipo: </label><br>
                            <span class="tipo"></span>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Importe: </label><br>
                            <?php echo $_SESSION["moneda"]; ?> <span class="importe"></span>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Concepto: </label><br>
                            <span class="concepto"></span>
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

<script src="assets/scripts/caja/func_egr.js"></script>
