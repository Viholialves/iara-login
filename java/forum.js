// Função para ordenar os posts por data
function sortByDate() {
    const postList = document.querySelector('.post-list');
    const posts = Array.from(postList.children);

    posts.sort((a, b) => new Date(b.getAttribute('data-date')) - new Date(a.getAttribute('data-date')));

    postList.innerHTML = '';
    posts.forEach(post => postList.appendChild(post));
}

// Função para ordenar os posts por número de comentários
function sortByComments() {
    const postList = document.querySelector('.post-list');
    const posts = Array.from(postList.children);

    posts.sort((a, b) => b.getAttribute('data-comments') - a.getAttribute('data-comments'));

    postList.innerHTML = '';
    posts.forEach(post => postList.appendChild(post));
}

// Função para ordenar os posts por ordem de postagem
function sortByPostOrder() {
    const postList = document.querySelector('.post-list');
    const posts = Array.from(postList.children);

    posts.sort((a, b) => a.getAttribute('data-order') - b.getAttribute('data-order'));

    postList.innerHTML = '';
    posts.forEach(post => postList.appendChild(post));
}

// Função para adicionar um comentário do usuário
function addComment() {
    const commentInput = document.getElementById('commentInput');
    const commentText = commentInput.value.trim();
    const postList = document.querySelector('.post-list');

    if (commentText === '') {
        alert('Por favor, escreva um comentário antes de enviar.');
        return;
    }

    const newComment = document.createElement('li');
    const date = new Date().toLocaleDateString();
    newComment.className = 'post-item';
    newComment.setAttribute('data-date', new Date().toISOString());
    newComment.setAttribute('data-comments', '0');
    newComment.setAttribute('data-order', postList.children.length + 1);
    newComment.innerHTML = `<strong>Comentário do Usuário</strong> - Data: ${date} - Comentários: 0 <p>${commentText}</p>`;

    postList.appendChild(newComment);
    commentInput.value = '';
}

// Função para retornar à página anterior
function goBack() {
    window.history.back();
}
