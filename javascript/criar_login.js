function getPassword() {
  // Lista de caracteres que podem ser usados para formar a senha
  var chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJLMNOPQRSTUVWXYZ";
  
  // Comprimento da senha gerada
  var passwordLength = 6;
  
  // Variável para armazenar a senha gerada
  var password = "";

  // Loop para gerar cada caractere da senha
  for (var i = 0; i < passwordLength; i++) {
      // Gera um número aleatório entre 0 e o comprimento da lista de caracteres
      var randomNumber = Math.floor(Math.random() * chars.length);
      
      // Adiciona o caractere correspondente ao número aleatório gerado na variável password
      password += chars.substring(randomNumber, randomNumber + 1);
  }

  // Define o valor da senha gerada no elemento HTML com o ID "senha"
  document.getElementById('senha').value = password;
}

  const passwordInput = document.getElementById("senha");
  const eyeSvg = document.getElementById("eyeSvg");
  
  function eyeClick() {
      if (passwordInput.type === "password") {
          showPassword();
          
         eyeSvg.classList.add('hide');
      } else {
          hidePassword();
          eyeSvg.classList.remove('hide');
      }
  }
  
  function showPassword() {
      passwordInput.setAttribute("type", "text");
  }
  
  function hidePassword() {
      passwordInput.setAttribute("type", "password");
  }
  
  