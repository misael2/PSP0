<?php

class Categoria
{
	private $pdo;
    
    public $id_categoria;
    public $Nombre;
  

	public function __CONSTRUCT()
	{
		try
		{//inicializamos la conexion
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			$e->getMessage();
			
		}
	}

	public function Listar()
	{
		try
		{//es para traer todo en un array  
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM categorias");//simple select para la tablas  de categoruas
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
    
	public function Obtener($id)//buscamos un id para obtener sus datos
	{
		try 
		{
			$sql = "SELECT * FROM categorias WHERE id_categoria=".$id;
			          
            $stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


	public function igualar($id)
	{
		try
		{
		

	$stm = $this->pdo->prepare("SELECT clientes.id_categoria categoria FROM clientes , categorias where clientes.id_categoria=".$id." limit 1");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo->prepare("DELETE FROM categorias WHERE id_categoria = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE categorias SET 	nombre   = ? WHERE id_categoria = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->Nombre,
                        $data->id_categoria
                   
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Categoria $data)
	{
		try 
		{
		$sql = "INSERT INTO categorias (nombre) 
		        VALUES (?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->Nombre                   
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}