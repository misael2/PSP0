<h1 class="page-header">
    <?php echo $ca->id_categoria !=null ? $ca->nombre : 'Nuevo Registro'; ?>

</h1>

<ol class="breadcrumb">
  <li><a href="?c=categoria">Categorias</a></li>
  <li class="active"><?php echo $ca->id_categoria != null ? $ca->nombre:'Nuevo Registro'; ?></li>
</ol>


<form id="frm-categoria" action="?c=Categoria&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $ca->id_categoria; ?>">
    
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Nombre" value="<?php echo $ca->nombre; ?>" class="form-control" placeholder="Ingrese su nombre" />
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