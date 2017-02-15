<?php
class Cliente
{
	private $pdo;
    
    public $id;
    public $Nombre;
    public $Apellido;
    public $Telefono;
    public $Correo;
    public $id_categoria;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

	$stm = $this->pdo->prepare("SELECT  *, clientes.nombre as nomb_clie,categorias.nombre as categoria FROM clientes , categorias where clientes.id_categoria= categorias.id_categoria");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
     


     public function Obt($id)
	{
		try 
		{
			$sql = "SELECT * FROM categorias where id_categoria=".$id;
			          
            $stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function Obtener($id)
	{
		try 
		{
			$sql = "SELECT * FROM clientes WHERE id=".$id;
			          
            $stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo->prepare("DELETE FROM clientes WHERE id = ?");			          

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
			$sql = "UPDATE clientes SET 
						nombre          = ?, 
						apellido        = ?,
					telefono            = ?, 
                        correo        = ?,
						
						id_categoria = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->Nombre,
                        $data->Apellido, 
                        $data->Telefono,
                        $data->Correo,
                        $data->id_categoria,
                        $data->id  
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Cliente $data)
	{
		try 
		{
		$sql = "INSERT INTO clientes (nombre,apellido,telefono,correo,id_categoria) 
		        VALUES (?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->Nombre,
                    $data->Apellido, 
                    $data->Telefono,
                     $data->Correo,
                      $data->id_categoria  
                   
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}