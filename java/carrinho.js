// Função para calcular o total do carrinho ao carregar a página
window.onload = () => {
    calculateTotal();
};

// Função para calcular o total do carrinho
function calculateTotal() {
    const cartItems = document.querySelectorAll('.cart-item');
    let total = 0;

    cartItems.forEach(item => {
        total += parseFloat(item.getAttribute('data-price'));
    });

    document.getElementById('totalPrice').textContent = total.toFixed(2);
}

// Função para remover um item do carrinho
function removeItem(button) {
    const item = button.parentElement;
    item.remove();
    calculateTotal();
}

// Função para finalizar a compra
function checkout() {
    const cartItems = document.querySelectorAll('.cart-item');
    if (cartItems.length === 0) {
        alert('Seu carrinho está vazio!');
        return;
    }

    alert('Compra finalizada com sucesso!');
    // Limpa o carrinho após a compra
    cartItems.forEach(item => item.remove());
    calculateTotal();
}

// Função para voltar para a página anterior
function goBack() {
    window.history.back();
}
