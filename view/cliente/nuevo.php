<h1 class="page-header">
    <?php echo  'Nuevo Registro'; ?>

</h1>

<ol class="breadcrumb">
  <li><a href="?c=cliente">Clientes</a></li>
  <li class="active"><?php echo 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-cliente" action="?c=Cliente&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $cli->id; ?>">
    
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Nombre" value="" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido"/>
    </div>
    
    <div class="form-group">
        <label>Apellido</label>
        <input type="text" name="Apellido" value="" class="form-control" placeholder="Ingrese su apellido" data-validacion-tipo="requerido" />
    </div>
    
    <div class="form-group">
        <label>Telefono</label>
        <input type="text" name="Telefono" value="" class="form-control" placeholder="Ingrese su Telefono"  />
    </div>

    <div class="form-group">
        <label>Correo</label>
        <input type="text" name="Correo" value="" class="form-control" placeholder="@dominio.com"  />
    </div>
    
     <div class="form-group">  
        <label for="id_categoria">Tipo de Categoria</label>
        <select name="id_categoria" class="browser-default">
 <?php foreach($this->model2->Listar() as $cat): ?>
        <option  class="form-control" value="<?php echo $cat->id_categoria; ?>"> <?php  echo  $cat->nombre; ?> </option>
<?php endforeach; ?>
        </select>

    </div>

    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-cliente").submit(function(){
            return $(this).validate();
        });
    })
</script>