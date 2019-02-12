<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="ref/bootstrap.min.css">
  <link rel="stylesheet" href="ref/login.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="ref/login.js"></script>
  <script>
    $(function() {
      $("#tab_log").tabs();
    });
  </script>
</head>

<body class="light-gray-bg">
  <div id="tab_log" class="templatemo-content-widget templatemo-login-widget white-bg">
    <ul>
      <li><a href="#tab-1">Login</a></li>
      <li><a href="#tab-2">Cadastro</a></li>
    </ul>
    <div id="tab-1">
      <header class="text-center">
        <h1>Login Sys</h1>
      </header>
      <form action="login.php" Method="post" class="templatemo-login-form">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-user fa-fw"></i></div>
            <input type="text" name="login" class="form-control" placeholder="Usuario">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-key fa-fw"></i></div>
            <input type="password" name="senha" class="form-control" placeholder="Senha">
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="templatemo-blue-button width-100">Login</button>
        </div>
      </form>
    </div>

    <div id="tab-2">
      <form id="cadastro" method="post" name="cadastro" class="login-form">
        <div class="form-group"><input type="text" class="form-control" name="nome" placeholder="Nome"></div>
        <div class="form-group"><input type="text" class="form-control" name="usuario" placeholder="Usuario"></div>
        <div class="form-group"><input type="text" id="pass1" class="form-control" name="senha" placeholder="Senha"></div>
        <div class="form-group"><input type="text" id="pass2" class="form-control" name="conf_senha" placeholder="Confirmar Senha"></div>
        <div class="form-group"><input type="text" class="form-control" name="email" placeholder="Email"></div>
        <button type="button" id="confirmar" class="btn btn-success btn-block">Cadastrar</button>
        <input style="display:none" type="reset" id="limpa" />
      </form>
    </div>
  </div>
</body>

</html>
