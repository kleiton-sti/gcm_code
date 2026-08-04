document.addEventListener('DOMContentLoaded', () => {
    const modalInativar = document.getElementById('modalInativarGCM');
    console.log(modalInativar);

    if (!modalInativar) return;

    modalInativar.addEventListener('show.bs.modal', (event) => {
        const botao = event.relatedTarget; // o botão que disparou o modal

        const id = botao.dataset.id;
        const nome = botao.dataset.nome;

        const form = document.getElementById('formInativarGCM');
        form.action = botao.dataset.url;

        document.getElementById('modalInativarNome').textContent = nome;

        // limpa o textarea toda vez que o modal abre para um guarda diferente
        document.getElementById('motivo_delete').value = '';
    });
});