<?php
  $result = "";
	if(!empty($_POST["email"]) && !empty($_POST["senha"])) {	
		$email = $_POST["email"];
		$senha = $_POST["senha"];
    	$ponteiro = fopen('bancoX.txt','r');
		$n = trim(fgets($ponteiro));
		$s = trim(fgets($ponteiro));
		fclose($ponteiro);
		
    if(($n != $email)) {
      $result = "<script>document.getElementById('emailHelp').style.display='block';</script>".'Digite um usuário valido!'; 
      header('refresh:3;url= login.php');
    }
    elseif(($n == $email) && ($s != $senha)){
      $result = "<script>document.getElementById('emailHelp2').style.display='block';</script>".'Digite uma senha valida!';
      header('refresh:3;url= login.php');
    }
    else {
      session_start();
      $_SESSION['email'] = $email;
      header('Location: login-sucesso.php');
    }
	}
?>
<html>
<head>
	<meta charset="utf8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>
<body>
    <div style="width: 50%; margin-left: 260px; margin-top: 90px;">
        <form action="login.php" method="post">  
            <div class="mb-3">
              <label class="form-label">Email/Usuário de Acesso</label>
              <input type="text" name="email" class="form-control" required>
              <div style="display:none" id="emailHelp" class="alert alert-danger" role="alert"><?php echo $result?></div>
            </div>
            <div class="mb-3">
              <label class="form-label">Senha</label>
              <input type="password" name="senha" class="form-control" required>
              <div style="display:none" id="emailHelp2" class="alert alert-danger" role="alert"><?php echo $result?></div>
            </div>
            <button type="submit"  class="btn btn-primary">Entrar</button>
          </form>
    </div>

</body>
</html>