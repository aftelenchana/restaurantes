<?php
include_once("model/rest.model.php");

class CajaModel
{
	
	private $conexionn;

	public function __CONSTRUCT()
	{
		try
		{
			$this->conexionn = Database::Conectar();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function listar()
    {
        try
        {   
            date_default_timezone_set($_SESSION["zona_horaria"]);
            setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
            $fecha = date("Y-m-d");
            $id_usu = $_SESSION["id_usu"];
            $stm = $this->conexionn->prepare("SELECT * FROM tm_ingresos_adm WHERE DATE(fecha_reg) = ? and id_usu = ?");
            $stm->execute(array($fecha,$id_usu));            
            $c = $stm->fetchAll(PDO::FETCH_OBJ);
            $data = array("data" => $c);
            $json = json_encode($data);
            echo $json; 
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function registrar(Ingreso $data)
    {
        try
        {
            date_default_timezone_set($_SESSION["zona_horaria"]);
            setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
            $fecha = date("Y-m-d H:i:s");
            $id_usu = $_SESSION["id_usu"];
            $id_apc = $_SESSION["id_apc"];
            $sql = "INSERT INTO tm_ingresos_adm (id_usu,id_apc,importe,motivo,fecha_reg) VALUES (?,?,?,?,?)";
            $this->conexionn->prepare($sql)->execute(array(
                $id_usu,
                $id_apc,
                $data->__GET('importe'),         
                $data->__GET('motivo'),
                $fecha,
                ));
            $this->conexionn=null; 
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    //ESTADO DE REGISTRO
    public function estado(Ingreso $data)
    {
        try 
        {
            $sql = "UPDATE tm_ingresos_adm SET estado = 'i' WHERE id_ing = ?";
            $this->conexionn->prepare($sql)
                 ->execute(array($data->__GET('cod_ing')));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}