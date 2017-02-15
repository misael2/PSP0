<h1 class="page-header">Cliente</h1>

<div class="well well-sm text-right" style="background-color: blue;">
    <a class="btn btn-primary glyphicon glyphicon-user" href="?c=Cliente&a=Nuevo"> Agregar</a>
     <a class="btn btn-primary glyphicon glyphicon-hdd" href="?c=Categoria"> Categoria</a>
</div>
<div class="table-responsive">
<table class=" table table-striped " border="1">
    <thead>
        <tr >
            <th >Nombre</th>
            <th>Apellido</th>
            <th>Telefono</th>
            <th >Correo</th>
            <th >Categoria</th>
            <th >Accion</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r):  ?>
        <tr>
            <td><?php echo $r->nomb_clie; ?></td>
            <td><?php echo $r->apellido; ?></td>
            <td><?php echo $r->telefono; ?></td>
            <td><?php echo $r->correo; ?></td>
            <td><?php echo $r->categoria; ?></td>
            <td>
                <a class="btn btn-primary glyphicon glyphicon-pencil" href="?c=Cliente&a=Editar&id=<?php echo $r->id; ?>"> Editar</a>                

               <a  class="btn btn-primary " style="background:#FE2E2E;" onclick="javascript:return 
  confirm('¿Seguro de eliminar este registro? ');" href="?c=Cliente&a=Eliminar&id=<?php echo $r->id; ?>"> Eliminar</a>
            </td>
           
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 

</div>
<div class="modal fade" id="msgDelete" role="dialog">
    <div class="modal-dialog">
        <!--modal content-->
        <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times</button>
        <h4 class="modal-title">¿Desea elminar el Cliente?</h4>
        </div>
        <div class="modal-body">
            <p>El <b>-</b> con clave <em>-</em> será eliminardo permanentemente</p>
        </div>
        <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-primary" id="eliminar">Eliminar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">cancelar</button>
        </div>
        </div>
    </div>
</div>






