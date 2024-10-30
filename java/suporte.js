// Dados simulados de tickets
const tickets = [
    { title: "Problema no Login", description: "Não consigo acessar minha conta.", status: "Em Aberto", date: "21/09/2024" },
    { title: "Erro na Página", description: "A página de pagamento não carrega.", status: "Em Atendimento", date: "20/09/2024" },
    { title: "Dúvida sobre Funcionalidades", description: "Como utilizar a nova função?", status: "Resolvido", date: "19/09/2024" }
];

// Função para renderizar os tickets
function renderTickets(ticketsToRender) {
    const ticketsList = document.getElementById('ticketsList');
    ticketsList.innerHTML = '';
    ticketsToRender.forEach(ticket => {
        const li = document.createElement('li');
        li.classList.add('ticket-item');
        li.innerHTML = `
            <h3>${ticket.title}</h3>
            <span>${ticket.date} | Status: <span class="status">${ticket.status}</span></span>
            <p>${ticket.description}</p>
        `;
        ticketsList.appendChild(li);
    });
}

// Inicializa com todos os tickets
renderTickets(tickets);

// Função para buscar tickets
function searchTickets() {
    const query = document.getElementById('searchTicket').value.toLowerCase();
    const filteredTickets = tickets.filter(ticket => ticket.title.toLowerCase().includes(query));
    renderTickets(filteredTickets);
}

// Função para abrir um novo chamado
function openNewTicket() {
    const title = document.getElementById('newTicketTitle').value;
    const description = document.getElementById('newTicketDescription').value;
    if (title && description) {
        const newTicket = { title, description, status: "Em Aberto", date: new Date().toLocaleDateString() };
        tickets.push(newTicket);
        renderTickets(tickets);
        alert('Chamado aberto com sucesso!');

        // Limpar os campos após abrir o chamado
        document.getElementById('newTicketTitle').value = '';
        document.getElementById('newTicketDescription').value = '';
    } else {
        alert('Por favor, preencha todos os campos.');
    }
}
// Função para voltar para a página anterior
function goBack() {
    window.history.back();
}
