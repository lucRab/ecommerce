// Seleciona o formulário
let form = document.getElementById('form1');
let destino = '/product';
// Manipula o evento de envio do formulário
form.addEventListener('submit', (event) => {
  event.preventDefault(); // Evita o envio padrão do formulário
  
  const alert = document.querySelector('#alert');7
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
        throw new Error('Unauthorized');
      });
    }
    return response.json();
  })
  .then(data => {
    // Manipula os dados recebidos
    localStorage.setItem('token', data);
    window.location.replace('http://localhost:8000');
  })
  .catch(error => {
    console.log(error.message);
    // Trate o erro de acordo com a sua lógica
  });
});




