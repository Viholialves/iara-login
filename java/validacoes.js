function cadastrarUsuario(event) {
    event.preventDefault();

    const senha = document.getElementById('senha').value;
    const repetirSenha = document.getElementById('repetir-senha').value;

    if (senha !== repetirSenha) {
        alert('As senhas não coincidem. Por favor, verifique e tente novamente.');
        return;
    }

    alert('Registro realizado com sucesso!');
    window.location.href = 'index.html';
}
