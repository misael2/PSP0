<?php

//incluioms el modelo de categorias para la consultas
require_once 'model/categoria.php';

class CategoriaController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Categoria();
    }
    
    public function Index(){//esta el la vista principal
        require_once 'view/header.php';
        require_once 'view/categoria/categoria.php';
        require_once 'view/footer.php';

           
    }

    public function Nuevo(){//para agregar una nueva categoria
        $ca = new Categoria();
        
        if(isset($_REQUEST['id_categoria'])){
            $ca = $this->model->Obtener($_REQUEST['id_categoria']);
        }
        
        require_once 'view/header.php';
        require_once 'view/categoria/nuevo.php';
        require_once 'view/footer.php';
    }
public function Editar(){//para editar una categoria
        $ca = new Categoria();
        
        if(isset($_REQUEST['id'])){
            $ca = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/categoria/editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){//para guardar una categorias
    $ca = new Categoria();
        if ($_REQUEST['Nombre']!=null) {
            $ca->id_categoria = $_REQUEST['id'];
        $ca->Nombre = $_REQUEST['Nombre'];
     

        $ca->id_categoria > 0 
            ? $this->model->Actualizar($ca)//si tiene un id se actualiza si no se guarda como nuevo
            : $this->model->Registrar($ca);

        header('Location:?c=Categoria');
        }
        else{
            echo "<h1>Error :( Inyeccion Detenida</h1>";
                        echo "<p>Rellene los datos requeridos sin modificaciones</p>";
        }
       
    }
     public function Eliminar(){//Es para eliminar la categorias
        
       
         if (!$this->model->igualar($_REQUEST['id'])) {//si una categoria no esta asignada la puede eliminar
            
          $this->model->Eliminar($_REQUEST['id']);
            header('Location: ?c=Categoria'); 
         }
         else{
             
               header('Location: ?c=Categoria&error'); //de lo contrario no se podra eliminar asta que se elimine el cliente que la tiene
         }



        
        
    




                  
               
        
    }

}