function mascararCPF(cpf) {
    cpf = String(cpf).replace(/\D/g, "");

    cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
    cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
    cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2");

    return cpf;
}


// Máscara enquanto digita no input para criar usuário, novo guarda e editar guarda
document.querySelectorAll("input.cpf").forEach(input => {
    input.addEventListener("input", (e) => {
        e.target.value = mascararCPF(e.target.value);
    });
});

// Máscara na exibição da tabela de guardas registrados
document.querySelectorAll("td.cpf").forEach(td => {
    td.textContent = mascararCPF(td.textContent);
});

// Máscara na exibição da tela de edição de dados dos guardas
document.querySelectorAll(".cpf").forEach(elemento => {
    elemento.value = mascararCPF(elemento.value);
});

// Máscara na visualização de dados dos guardas
document.querySelectorAll(".cpf").forEach(elemento => {
    elemento.textContent = mascararCPF(elemento.textContent);
});