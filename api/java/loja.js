// Função para ordenar os jogos por ordem alfabética
function sortAlphabetically() {
    const gameList = document.querySelector('.game-list');
    const games = Array.from(gameList.children);

    games.sort((a, b) => {
        const nameA = a.getAttribute('data-name').toLowerCase();
        const nameB = b.getAttribute('data-name').toLowerCase();
        return nameA.localeCompare(nameB); // Ordena alfabeticamente
    });

    gameList.innerHTML = '';
    games.forEach(game => gameList.appendChild(game));
}

// Função para ordenar os jogos por popularidade (mais comprados)
function sortByPopularity() {
    const gameList = document.querySelector('.game-list');
    const games = Array.from(gameList.children);

    games.sort((a, b) => {
        const popA = parseInt(a.getAttribute('data-popularity'));
        const popB = parseInt(b.getAttribute('data-popularity'));
        return popB - popA; // Ordena do mais comprado para o menos comprado
    });

    gameList.innerHTML = '';
    games.forEach(game => gameList.appendChild(game));
}

// Função para ordenar os jogos por avaliação (do maior para o menor)
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

// Função para ordenar os jogos por categoria
function sortByCategory() {
    const gameList = document.querySelector('.game-list');
    const games = Array.from(gameList.children);

    games.sort((a, b) => {
        const categoryA = a.getAttribute('data-category').toLowerCase();
        const categoryB = b.getAttribute('data-category').toLowerCase();
        return categoryA.localeCompare(categoryB); // Ordena por categoria
    });

    gameList.innerHTML = '';
    games.forEach(game => gameList.appendChild(game));
}

// Função para ordenar os jogos por gênero
function sortByGenre() {
    const gameList = document.querySelector('.game-list');
    const games = Array.from(gameList.children);

    games.sort((a, b) => {
        const genreA = a.getAttribute('data-genre').toLowerCase();
        const genreB = b.getAttribute('data-genre').toLowerCase();
        return genreA.localeCompare(genreB); // Ordena por gênero
    });

    gameList.innerHTML = '';
    games.forEach(game => gameList.appendChild(game));
}
// Função para voltar para a página anterior
function goBack() {
    window.history.back();
}
