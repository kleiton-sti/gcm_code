const cpf = document.getElementById("cpf");

cpf.addEventListener("input", (e) => {
    let valor = e.target.value.replace(/\D/g, "");

    valor = valor.replace(/(\d{3})(\d)/, "$1.$2");
    valor = valor.replace(/(\d{3})(\d)/, "$1.$2");
    valor = valor.replace(/(\d{3})(\d{1,2})$/, "$1-$2");

    e.target.value = valor;
});
