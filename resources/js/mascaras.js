export function mascararCPF(cpf) {
    cpf = String(cpf).replace(/\D/g, "");

    cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
    cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
    cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2");

    return cpf;
}


export function mascararRG(rg) {
    rg = String(rg).replace(/\D/g, "");

    rg = rg.replace(/(\d{2})(\d)/, "$1.$2");
    rg = rg.replace(/(\d{3})(\d)/, "$1.$2");
    rg = rg.replace(/(\d{3})(\d{1,2})$/, "$1-$2");

    return rg;
}


export function mascararCPFeRG () {

// Máscara enquanto digita no input para criar usuário, novo guarda e editar guarda
document.querySelectorAll(".mascarado").forEach(input => {
    input.addEventListener("input", (e) => {
        if (e.target.name == "cpf")  e.target.value = mascararCPF(e.target.value);
        if (e.target.name == "rg")  e.target.value = mascararRG(e.target.value);
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

}

mascararCPFeRG();