<?php
require_once 'model/cliente.php';//incluimos la consultas d los modlos
require_once 'model/categoria.php';

class ClienteController{
    
    private $model; 
    
    public function __CONSTRUCT(){
        //creamos nuevos modelos
        $this->model = new Cliente();
        $this->model2 = new Categoria();
    }
    
    public function Index(){//vista para los clientes
        require_once 'view/header.php';
        require_once 'view/cliente/cliente.php';
        require_once 'view/footer.php';
    }
    
    public function Nuevo(){//es para agregar nuevo cliente
        $cli = new Cliente();
        
        if(isset($_REQUEST['id'])){//  si no id  tiene es nuevo 
            $cli = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/cliente/nuevo.php';
        require_once 'view/footer.php';
    }

    public function Editar(){
        $cli = new Cliente();   //ediatr necesitamos buscar el di para editar con sus datos
        
        if(isset($_REQUEST['id'])){
            $cli = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/cliente/editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){//los campos para guardar los datos del cliente
    $cli = new Cliente();


      $direccion=$_REQUEST['Correo'];
  $Sintaxis='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
                if(preg_match($Sintaxis,$direccion)){
                  

                        if ($_REQUEST['Nombre'] && $_REQUEST['Apellido'] !=null) {
                          
                   $cli->id = $_REQUEST['id'];
                   $cli->Nombre = $_REQUEST['Nombre'];
                   $cli->Apellido = $_REQUEST['Apellido'];
                   $cli->Telefono = $_REQUEST['Telefono'];
                   $cli->Correo = $_REQUEST['Correo'];
                   $cli->id_categoria = $_REQUEST['id_categoria'];

                   $cli->id > 0 
                   ? $this->model->Actualizar($cli)//si tiene id actualiza
                   : $this->model->Registrar($cli);//si no tiene seregistra como nuevo
        
                    header('Location: index.php');//me redirige a la pagina principal
                        }   
                    else{
                        echo "<h1>Error :( Inyeccion Detenida</h1>";
                        echo "<p>Rellene los datos requeridos sin modificaciones</p>";
                         }

                }
                 else{
                    if ($_REQUEST['id']!=null) {
                        $id = $_REQUEST['id'];
                        header('Location: ?c=Cliente&a=Editar&id=id&Correo');
                    }
                    else{
                        header('Location: ?c=Cliente&a=Nuevo');
                    }
                   
                 }
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);//buscamos el id con la funcion Eliminar y la elimina y nos redirige a index principal.
        header('Location: index.php');
    }
     public function VerificarrDireccionCorreo($direccion){ 
         $Sintaxis='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
                if(preg_match($Sintaxis,$direccion))
                    return true;
                else
                    return false;
            }
}