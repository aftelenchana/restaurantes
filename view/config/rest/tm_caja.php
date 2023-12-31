<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2><i class="fa fa-cogs"></i> <a class="a-c" href="lista_tm_otros.php">Ajustes</a></h2>
        <ol class="breadcrumb">
            <li class="active">
                <strong>Restaurante</strong>
            </li>
            <li>Cajas</li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-6 animated fadeIn">
            <div class="ibox">
                <div class="ibox-title">
                    <div class="ibox-title-buttons pull-right">
                        <button type="button" class="btn btn-primary btn-caja"><i class="fa fa-plus-circle"></i> Nueva Caja</button>
                    </div>
                    <h5><i class="fa fa-newspaper-o"></i> Cajas</h5>
                </div>
                <div class="ibox-content">
                    <table class="table table-condensed table-striped table-hover" id="table-caja">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th class="text-right">Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6 animated fadeInRight">
            <div class="panel panel-transparent panel-dashed text-center" style="padding-top: 6rem;padding-bottom: 6rem;">
                <div class="row">
                    <div class="col-sm-8 col-sm-push-2">
                        <h2 class="ich m-t-none">Selecciona una caja</h2>
                        <i class="fa fa-long-arrow-left fa-3x"></i>
                        <p class="ng-binding">Navega por la lista de cajas y realize cambios..</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal fade" id="mdl-caja" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="true">
    <div class="modal-dialog" style="max-width: 400px;">
        <div class="modal-content animated bounceInRight">
        <form id="frm-caja" method="post" enctype="multipart/form-data">
        <input type="hidden" name="cod_caja" id="cod_caja">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group letNumMay">
                            <label class="control-label">Nombre</label>
                            <input type="text" name="nomb_caja" id="nomb_caja" class="form-control" placeholder="Ingrese nombre" autocomplete="off" required="required"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Estado</label>
                            <select name="estado_caja" id="estado_caja" class="selectpicker form-control" data-live-search="true" autocomplete="off" required="required">
                                <option value="a" active>ACTIVO</option>
                                <option value="i">INACTIVO</option>                                
                            </select>
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

<script src="assets/scripts/config/func_cajas.js"></script>
<script type="text/javascript">
$(function() {
    $('#config').addClass("active");
});
</script>