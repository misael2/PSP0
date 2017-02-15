<h1 class="page-header">
    <?php echo  'Nueva Categoria'; ?>

</h1>

<ol class="breadcrumb">
  <li><a href="?c=Categoria">Categoria</a></li>
  <li class="active"><?php echo 'Nuevo Categoria'; ?></li>
</ol>

<form id="frm-categoria" action="?c=Categoria&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $ca->id; ?>">
    
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Nombre" value="" class="form-control" placeholder="Ingrese su nombre"  data-validacion-tipo="requerido" />
    </div>
    
    <hr>
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-categoria").submit(function(){
            return $(this).validate();
        });
    })
</script>