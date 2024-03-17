const form = document.getElementById('delete');
const id = form.name;
const destino = 'http://localhost:8000/product/delete/'+id;
form.addEventListener('submit', (e) => {
    e.preventDefault();

    fetch(destino, {
        method: 'POST'
    })
    .then(response => {
        if(response.ok) {
            window.location.replace('http://localhost:8000/');
        }
    });
});