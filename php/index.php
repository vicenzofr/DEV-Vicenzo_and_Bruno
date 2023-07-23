<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <title>Area de login</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../css/area_login.css">
      <link rel="icon" href="../imagens/icons8-login-50.png">
   </head>
   <body>
      <div class="form">
         <p id="heading">Login</p>
         <form method="POST" action="processo_cliente.php" enctype="multipart/form-data">
            <input type="hidden" name="type" value="login" required>    <!--parte php q vc fez -->
            <div class="field">
               <input autocomplete="off" placeholder="Username" id="login" name="login" class="input-field" type="text" id="">
            </div>
            <div class="field">
               <input placeholder="Password"  id="senha" name="senha" class="input-field" type="password">
            </div>
            <div class="btn">
               <button type="submit" class="button1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Login&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
               <button type="button" class="button2" href="/html/criar_conta.html">Inscreva-se</button>
               <button type="button"  class="button3" href="/html/esqueceu_senha.php">Esqueceu a Senha</button>
            <button type="button"  class="button4" href="html/catalogo.html">Entrar como visitante</button>
            </div>
            
         </form>
      </div>
      <script src="script.js"></script>
   </body>
</html>