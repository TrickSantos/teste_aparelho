$(document).ready(function() {

  $("#cad").click(function(){

	  var aparelho = $("#cad_aparelho").serialize();

	  $.ajax({
	  url: 'aparelhos.php',
	  type: 'post',
	  dataType: 'json',
	  data: aparelho

	  }).done(function(){
		  alert("Aparelho Cadastrado com sucesso");
		  $("#limpa").click();
	  }).fail(function(){
		  console.log("erro");
	  });
  });
  $(".next").click(function() {
    var id = $(this).attr("id");
    $("#tabs-3").load("relatorio.php?usuario="+id);
  });
});
