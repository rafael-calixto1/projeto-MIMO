function confirmarRemocao() {
    return confirm("Você realmente deseja remover este item?");
}

const formularioEnviar = document.getElementById('formularioEnviar');

formularioEnviar.addEventListener("submit", (evento) => {
    const nomeProduto = document.getElementById('nomeProduto').value;
    const quantidade = parseInt(document.getElementById('quantidade').value);

    if (typeof nomeProduto === 'string' && !isNaN(quantidade)) {
        if (nomeProduto && quantidade) {
            return;
        } else {
            alert("Preencha os campos!");
            evento.preventDefault();
        }
    } else {
        alert("Respeito os tipos estabelecidos!");
        evento.preventDefault();
    }
});
