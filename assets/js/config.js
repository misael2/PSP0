$(document).ready(function()
{
	$(".btn-Eliminar").click(function(e)
	{
		var padre=$(this).closest("tr");
		var clave=$(this).data("clave");
		var modelo=$(this).data("modelo");
		e.preventDefault;
		$("#msgDelete").modal({backdrop:'static', keyboard:'false'}).one('click',"#eliminar",function(e)
			{
				
				$.ajax({
					url:modelo+"Eliminar&id="+clave,
					success:function(){
						$(padre.fadeIn().remove());

					}
				})
			});
		return false;
	 });
});