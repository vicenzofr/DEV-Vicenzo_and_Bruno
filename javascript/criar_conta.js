function getPassword() {
    var chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJLMNOPQRSTUVWXYZ";
    var passwordLength = 6;
    var password = "";
  
    for (var i = 0; i < passwordLength; i++) {
      var randomNumber = Math.floor(Math.random() * chars.length);
      password += chars.substring(randomNumber, randomNumber + 1);
    }
    document.getElementById('senha').value = password
  }


  const password = document.getElementById('password');
  const icon = document.getElementById('icon');
  
  function showHide() {
    if (password.type === 'password') {
      password.setAttribute('type', 'text');
      icon.classList.add('hide');
    } else {
      password.setAttribute('type', 'password');
      icon.classList.remove('hide');
    }
  }