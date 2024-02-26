// Seleciona o formulário

let destino = '/user/edit';
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
    if (response.status === 401) {
      return response.json().then(data => {
        alert.innerText = data;
        throw new Error(response.message);
      });
    }
    return response.json();
  }
  ) // Converte a resposta em JSON
  .then(data => {
  })
  .catch(error => {
    console.log(error.message);
    // Trate o erro de acordo com a sua lógica
  });
});

