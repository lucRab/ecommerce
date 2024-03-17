// Seleciona o formulário

let destino = '/store/edit';
let form = document.getElementById('form1');

// Manipula o evento de envio do formulário
form.addEventListener('submit', (event) => {
  event.preventDefault(); // Evita o envio padrão do formulário
  
  const alert = document.querySelector('#alert');
  // Obtém os dados do formulário
  const formData = new FormData(form);
  // Faz a requisição POST usando fetch()
  fetch(destino, {
    method: 'POST',
    body: formData
  })
  .then(response => {
    if (response.ok) {
    }
    if (response.status === 401)  {
      return response.json().then(data => {
        alert.innerText = data.message;
      });
    }
  });
});

