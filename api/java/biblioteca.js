// Função para ordenar os jogos por data de compra (mais recente primeiro)
function sortByDate() {
    const gameList = document.querySelector('.game-list');
    const games = Array.from(gameList.children);

    games.sort((a, b) => {
        const dateA = new Date(a.getAttribute('data-date'));
        const dateB = new Date(b.getAttribute('data-date'));
        return dateB - dateA; // Ordena do mais recente para o mais antigo
    });

    gameList.innerHTML = '';
    games.forEach(game => gameList.appendChild(game));
}

// Função para ordenar os jogos por ordem alfabética
function sortAlphabetically() {
    const gameList = document.querySelector('.game-list');
    const games = Array.from(gameList.children);

    games.sort((a, b) => {
        const nameA = a.getAttribute('data-name').toLowerCase();
        const nameB = b.getAttribute('data-name').toLowerCase();
        return nameA.localeCompare(nameB); // Ordena alfabeticamente com base na primeira letra
    });

    gameList.innerHTML = '';
    games.forEach(game => gameList.appendChild(game));
}

// Função para ordenar os jogos por nota (do maior para o menor)
function sortByRating() {
    const gameList = document.querySelector('.game-list');
    const games = Array.from(gameList.children);

    games.sort((a, b) => {
        const ratingA = parseFloat(a.getAttribute('data-rating'));
        const ratingB = parseFloat(b.getAttribute('data-rating'));
        return ratingB - ratingA; // Ordena do maior para o menor
    });

    gameList.innerHTML = '';
    games.forEach(game => gameList.appendChild(game));
}

// Função para o botão Voltar
function goBack() {
    window.history.back();
}
