<?php
   session_start();
   
   if(!isset($_SESSION['email'])) {
       header("Location: login.php");
   } else {
	   echo "<h1>Sucesso</h1>";
   }
?>
<body>
    <label for="">
        <a href="login.php" style="margin-left: 1000px;">Deslogar</a>
    </label>
    
</body>


