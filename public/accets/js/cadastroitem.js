// Seleciona o formulário
let form = document.getElementById('form1');
let form1 = document.getElementById('form2')
let destino = '/product';
var descricao = [];
const div = document.getElementById('21');
var i = 0;

form1.addEventListener('submit', (e) => {
  e.preventDefault();
  const value = document.getElementById('descricao11').value;
  descricao.push(value);
  const li = document.createElement('li');
  const input = document.createElement('input');
  input.setAttribute('type', 'text');
  input.setAttribute( 'name',i);
  input.value = value;
  li.appendChild(input);
  div.appendChild(li);
  i++
});
// Manipula o evento de envio do formulário
form.addEventListener('submit', (event) => {
  event.preventDefault(); // Evita o envio padrão do formulário
  console.log(descricao);
  const alert = document.querySelector('#alert');
  const name = document.getElementsByName('name').value;

  const formData = new FormData(form);
  // Faz a requisição POST usando fetch()
  fetch(destino, {
    method: 'POST',
    body: formData
  })
   .then(response => {
     if (response.ok) {
      alert.innerText = "PRODUTO ADICIONADO COM SUCESSO";
     }
     if (response.status === 401)  {
       return response.json().then(data => {
         alert.innerText = data.message;
       });
     }
   });
});




