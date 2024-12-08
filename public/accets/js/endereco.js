const form = document.getElementById('form');
const f = document.querySelector('form');
f.addEventListener('form-cadastro', (e) => {
    e.preventDefault();
    const alert = document.querySelector('#alert');
    const formData = new FormData(form);
    console.log(formData.get('id'));
    const destino = 'http://localhost:8000/endereco/' + formData.get('slug') + "/cadastro"
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