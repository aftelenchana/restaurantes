<input type="hidden" id="m" value="<?php echo $_GET['m']; ?>"/>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2><i class="fa fa-cogs"></i> <a class="a-c" href="lista_tm_otros.php">Ajustes</a></h2>
        <ol class="breadcrumb">
            <li class="active">
                <strong>Restaurante</strong>
            </li>
            <li>Insumos</li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-3 animated fadeIn">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="file-manager">
                        <h2 class="ich"><i class="fa fa-tasks"></i> Categorías</h2>
                        <a onclick="listarInsumos('%')" class="file-control active">Todos</a>
                        <div class="hr-line-dashed"></div>
                        <div id="boton-catg" style="display: block">
                            <button class="btn btn-primary btn-block btn-catg"><i class="fa fa-plus-circle"></i> A&ntilde;adir nueva categor&iacute;a</button>
                        </div>
                        <form id="frm-categoria" method="post" enctype="multipart/form-data" action="?c=Config&a=CrudCatg">
                        <input type="hidden" name="id_catg" id="id_catg">
                        <div id="nueva-catg" style="display: none">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group display-flex letMay">
                                        <label class="control-label">Nombre</label>
                                        <input class="form-control" type="text" autocomplete="off" placeholder="Nueva categor&iacute;a" name="nombre_catg" id="nombre_catg" required="required"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <a class="btn btn-default btn-c-catg">Cancelar</a>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
                                </div>
                            </div>
                        </div>
                        </form>
                        <div class="hr-line-dashed"></div>
                        <ul class="folder-list" style="padding: 0">
                            <div class="scroll_cat" id="ul-categorias"></div>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="ibox">
                <div class="ibox-content display-flexx"> 
                    <div class="btn-flex btn-group m-r-sm">
                        <a class="btn dim display-flexx display-flexx-v btn-default" href="lista_tm_productos.php">
                        <img class="filtered" src="assets/img/otros/icon-01.png" width="80" height="40">
                        <span>Platos/bebidas</span>
                        </a>
                        <!--<a class="btn dim btn-default m-n btn-prodnuevo"><i class="fa fa-lg fa-plus"></i></a>-->
                    </div>
                    <div class="btn-flex btn-group m-r-sm">
                        <a class="btn dim display-flexx display-flexx-v btn-primary">
                        <img class="filtered" src="assets/img/otros/icon-02.png" width="80" height="40">
                        <span>Insumos</span>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="padding-bottom: 0px;">
                    <div class="row">
                        <div class="col-md-12 bg-writhe">
                            <a class="btn btn-primary btn-block btn-ins"><i class="fa fa-plus-circle"></i> Nuevo insumo </a>
                            <br>
                            <div class="row">
                                <div class="col-sm-12" style="text-align:right;" id="filter_global">
                                    <div class="input-group m-b">
                                        <div class="input-group-addon"><i class="fa fa-search"></i></div>
                                        <input class="form-control global_filter" id="global_filter" type="text" placeholder="Buscar insumo">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-condensed table-hover" id="table-insumos" width="100%">
                                        <thead>
                                            <th>C&oacute;digo</th>
                                            <th>Nombre</th>
                                            <th>Categor&iacute;a</th>
                                            <th>Unidad</th>
                                            <th>¿Activo?</th>
                                            <th style="text-align: right">Acciones</th>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal fade" id="mdl-insumo" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="true">
    <div class="modal-dialog" style="max-width:400px;">
        <div class="modal-content animated bounceInRight">
        <form id="frm-insumo" method="post" enctype="multipart/form-data" action="?c=Config&a=CrudIns">
        <input type="hidden" name="cod_ins" id="cod_ins">
            <div class="modal-header">
                <h4 class="modal-title">Detalle del insumo</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group display-flex letNumMayMin">
                            <input class="form-control input-lg" type="text" autocomplete="off" placeholder="Nombre del insumo" name="nombre_ins" id="nombre_ins" required="required" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group letNumMay">
                            <label class="control-label">C&oacute;digo</label>
                            <input class="form-control" type="text" autocomplete="off" name="codigo_ins" id="codigo_ins" required="required" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Unidad de medida</label>
                            <select name="cod_med" id="cod_med" class="selectpicker form-control" data-live-search="true" autocomplete="off" required="required" title="Seleccionar" data-size="5">
                                <?php foreach($this->model->ListarUniMed() as $r): ?>
                                    <option value="<?php echo $r->id_med; ?>"><?php echo $r->descripcion; ?></option>
                                <?php endforeach; ?>                              
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Categor&iacute;a</label>
                            <select name="cod_catg" id="cod_catg" class="selectpicker form-control" data-live-search="true" autocomplete="off" title="Seleccionar" data-size="5" required="required">
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group dec">
                            <label class="control-label">Costo Unitario</label>
                            <input class="form-control" type="text" autocomplete="off" name="cos_uni" id="cos_uni" required="required" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ent">
                            <label class="control-label">Stock m&iacute;nimo</label>
                            <input class="form-control" type="text" autocomplete="off" name="stock_min" id="stock_min"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Estado</label>
                            <select name="estado" id="estado" class="selectpicker form-control" data-live-search="true" autocomplete="off">
                                <option value="a" active>ACTIVO</option>
                                <option value="i">INACTIVO</option>                                
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary btn-guardar"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </form>
        </div>
    </div>
</div>

<script src="assets/scripts/config/func_insumos.js"></script>
<script type="text/javascript">
$(function() {
    $('#config').addClass("active");
    function filterGlobal () {
    $('#table-insumos').DataTable().search( 
        $('#global_filter').val()
    ).draw();
    }
    $('input.global_filter').on( 'keyup click', function () {
        filterGlobal();
    });
});
</script>
