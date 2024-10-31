// Salva a aceitação quando "Eu Aceito" é clicado
document.getElementById('acceptButton').addEventListener('click', function (event) {
    event.preventDefault();
    alert('Sua aceitação foi registrada!');
    goBack(); // Chama a função para voltar à página anterior
});

// Função para voltar para a página anterior
function goBack() {
    window.history.back();
}
