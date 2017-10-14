$(function(){
	$("#estado").change(function()
	{
		var id= $(this).val();
		$.ajax({
			type:"POST",
			url: "exibe_cidade.php?id="+id,
			dataType: "text",
			success: function(res)
			{
				$("#cidade").children(".cidades").remove();
				$("#cidade").append(res);
			} 
		});
	});
});