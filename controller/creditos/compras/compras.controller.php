<?php
require_once 'model/creditos/compras/compras.entidad.php';
require_once 'model/creditos/compras/compras.model.php';

class CreditoController{
    
    private $model;

    public function __CONSTRUCT(){
        $this->model = new CreditoModel();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/creditos/compras/index.php';
        require_once 'view/footer.php';
    }

    public function listar()
    {
        $this->model->listar($_POST);
    }

    public function detalle()
    {
        print_r(json_encode($this->model->detalle($_POST)));
    }

    public function listarCuota()
    {
        $this->model->listarCuota($_POST);
    }


    public function pagarCuota(){
        $alm = new Cuota();
        $alm->__SET('cod_cuota', $_REQUEST['cod_cuota']);
        $alm->__SET('pago_cuo', $_REQUEST['pago_cuo']);
        $alm->__SET('egre_caja', $_REQUEST['egre_caja']);
        $alm->__SET('monto_ec', $_REQUEST['monto_ec']);
        $alm->__SET('total_cuota', $_REQUEST['total_cuota']);
        $alm->__SET('amort_cuota', $_REQUEST['amort_cuota']);
        $this->model->pagarCuota($alm);
    }
}
?> 