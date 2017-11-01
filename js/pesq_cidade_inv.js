$(function(){
	$("#estado_inv").change(function()
	{
		var id= $(this).val();
		$.ajax({
			type:"POST",
			url: "exibe_cidade.php?id="+id,
			dataType: "text",
			success: function(res)
			{
				$("#cidade_inv").children(".cidades").remove();
				$("#cidade_inv").append(res);
			} 
		});
	});
});