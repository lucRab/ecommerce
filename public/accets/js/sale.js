const iten = document.getElementById('obj');
const valor_total = document.getElementById('valortotal');
const form = document.getElementById('form');
var i = iten.getElementsByClassName('input').length;

iten.addEventListener('input', function (event) {
    var target = event.target;
    const item = document.getElementById('obj');
    let valor = target.value * target.id
    let total = valor.toFixed(2)
    let n = target.name
    var vl = 0;

    let div = iten.getElementsByClassName('total').item(n);
    div.innerText = total;
    for (let index = 0; index < i; index++) {
        let a = item.getElementsByClassName('input').item(index).value * item.getElementsByClassName('input').item(index).id;
        vl = vl + a;
    }
    let vt = vl.toFixed(2);
    valor_total.innerText = vt
    ;
});

iten.addEventListener('submit', function (e) {
    e.preventDefault();
    const item = document.getElementById('obj');
    var target = e.target;
    let destino = "http://localhost:8000/sale/user/"+target.className+"/product/"+target.id;
    let input = target.getElementsByClassName('input').item(0);
    let value = input.value * input.id
    var vl = 0;
    
    fetch(destino, {
        method: 'POST'
    })
    .then(response =>  {
        if(response.ok) {
            window.location.reload();
        }
    });
});

