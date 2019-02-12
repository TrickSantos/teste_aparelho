$(document).ready(function() {
  $("#confirmar").click(function() {

    var senha1 = $("#pass1").val();
    var senha2 = $("#pass2").val();

    if (senha1 != senha2) {
      alert("Senhas Diferentes!");
    } else {

      var form = $("#cadastro").serialize();

      $.ajax({
          url: 'cadastro.php',
          type: 'post',
          dataType: 'json',
          data: form
        })
        .done(function() {
          alert('Cadastro Realizado com Sucesso');
          $('#limpa').click();
        })
        .fail(function(response) {
          console.log(response);
        })
    }

  });

});
