<div class="wrapper wrapper-content animated fadeIn ng-scope">
    <div class="ibox-content m-b-sm border-bottom">
        <div class="p-xs">
            <div class="pull-left m-r-md">
                <i class="fa fa-cogs mid-icon"></i>
            </div>
            <h2 class="m-t-none">Central de ajustes</h2> <span>Controla todos los ajustes del sistema desde este panel.</span>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="ibox">
                <div class="ibox-title">
                    <h5><i class="fa fa-building"></i> Empresa</h5>
                </div>
                <div class="ibox-content no-padding">
                    <div class="list-group">
                        <a class="list-group-item" href="?c=Config&a=IndexDE">
                            <h4 class="list-group-item-heading">Datos de la empresa</h4>
                            <p class="list-group-item-text">Modificar los datos de la empresa.</p>
                        </a>
                        <!--
                        <a class="list-group-item" href="lista_tm_tiendas.php">
                            <h4 class="list-group-item-heading">Tiendas</h4>
                            <p class="list-group-item-text">Creaci&oacute;n, modificaci&oacute;n.</p>
                        </a>
                        -->
                        <a class="list-group-item" href="?c=Config&a=IndexTD">
                            <h4 class="list-group-item-heading">Tipo de Documentos</h4>
                            <p class="list-group-item-text">Modificar los tipos de documentos.</p>
                        </a>
                        <a class="list-group-item" href="lista_tm_usuarios.php">
                            <h4 class="list-group-item-heading">Usuarios / Roles</h4>
                            <p class="list-group-item-text">Creaci&oacute;n, modificaci&oacute;n.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="ibox">
                <div class="ibox-title">
                    <h5><i class="fa fa-bitbucket"></i> Restaurante</h5>
                </div>
                <div class="ibox-content no-padding">
                    <div class="list-group">
                        <a class="list-group-item" href="lista_tm_cajas.php">
                            <h4 class="list-group-item-heading">Cajas</h4>
                            <p class="list-group-item-text">Creaci&oacute;n, modificaci&oacute;n.</p>
                        </a>
                        <a class="list-group-item" href="lista_tm_areasprod.php">
                            <h4 class="list-group-item-heading">&Aacute;reas de Producci&oacute;n</h4>
                            <p class="list-group-item-text">Creaci&oacute;n, modificaci&oacute;n.</p>
                        </a>
                        <a class="list-group-item" href="lista_tm_mesas.php">
                            <h4 class="list-group-item-heading">Salones y mesas</h4>
                            <p class="list-group-item-text">Creaci&oacute;n, modificaci&oacute;n.</p>
                        </a>
                        <a class="list-group-item" href="lista_tm_productos.php">
                            <h4 class="list-group-item-heading">Productos</h4>
                            <p class="list-group-item-text">Creaci&oacute;n, modificaci&oacute;n.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="ibox">
                <div class="ibox-title">
                    <h5><i class="fa fa-cogs"></i> Otros ajustes</h5>
                </div>
                <div class="ibox-content no-padding">
                    <div class="list-group">
                        <a class="list-group-item" href="lista_tm_impresoras.php">
                            <h4 class="list-group-item-heading">Impresoras</h4>
                            <p class="list-group-item-text">Creaci&oacute;n, modificaci&oacute;n.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#navbar-c').addClass("white-bg");
    $('#config').addClass("active");
</script>