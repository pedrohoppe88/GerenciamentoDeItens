let form = document.querySelector('#formId');
let email = document.querySelector('#email');
let senha = document.querySelector('#senha');

form.addEventListener('submit', (event) => {
      if(email.value === "" && senha.value === "") {
           event.preventDefault(); 
           document.querySelector('.validaEmail').classList.add("emailIncorreta");
           document.querySelector('.validaSenha').classList.add("senhaIncorreta");

      }
})