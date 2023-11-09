const formularioEnviar = document.getElementById('formularioAtualizar');

formularioEnviar.addEventListener("submit", (evento) => {
    const nomeProduto = document.getElementById('nomeProduto').value;
    const quantidade = parseInt(document.getElementById('quantidade').value);
    const id = parseInt(document.getElementById('idProduto').value);

    if (nomeProduto && quantidade) {
        if (typeof nomeProduto === 'string' && !isNaN(quantidade) && !isNaN(id)) {
            return;
        } else {
            alert("Respeito os tipos dos campos!");
            evento.preventDefault();
        }
    } else {
        alert("Preencha os campos!");
        evento.preventDefault();
    }
});
