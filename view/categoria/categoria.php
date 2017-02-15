<div class="conta">
<h1 class="page-header">Categorias</h1>

<div class="well well-sm text-right">
      <a class="btn btn-primary glyphicon glyphicon-user" href="?c=Cliente"> Clientes</a>
     <a class="btn btn-primary glyphicon glyphicon-plus" href="?c=Categoria&a=Nuevo"> Agregar</a>
</div>
<div class="table-responsive">
<table class="table table-striped" border="1">
    <thead>
        <tr >
            <th >Nombre</th>
            <th><?php echo "Acciones" ?></th>
            
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->nombre; ?></td>

           <td>
            
                <a class="btn btn-primary glyphicon glyphicon-pencil"  href="?c=Categoria&a=Editar&id=<?php echo $r->id_categoria; ?>"> Editar</a>


 <a  class="btn btn-primary   glyphicon glyphicon-trash" style="background:#FE2E2E;" onclick="javascript:return 
  confirm('¿Seguro de eliminar este registro? ');" href="?c=Categoria&a=Eliminar&id=<?php echo $r->id_categoria; ?>"> Eliminar</a>
            </td>
           
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
</div>