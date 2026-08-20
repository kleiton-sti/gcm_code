document.addEventListener('DOMContentLoaded', () => {
    buscarECriarOptionsNoCampoUF();
})

export function buscarECriarOptionsNoCampoUF() {
    const CampoUFDaPaginaDeRegistro = document.getElementById('uf');

    if (!CampoUFDaPaginaDeRegistro) return;

    const rotaTodosEnderecos = CampoUFDaPaginaDeRegistro.getAttribute('data-url');
    const ufAtual = CampoUFDaPaginaDeRegistro.getAttribute('data-valor-atual');

    fetch(rotaTodosEnderecos)
        .then(response => response.json())
        .then(listaUf => {
            listaUf.forEach(listaUf => {
                const option = document.createElement('option');
                option.value = listaUf.uf;
                option.innerText = listaUf.uf;
                CampoUFDaPaginaDeRegistro.appendChild(option);
            });

            if (ufAtual) {
                CampoUFDaPaginaDeRegistro.value = ufAtual;
                buscarECriarOptionsNoCampoCidade(ufAtual);
            }
        });

}

export function buscarECriarOptionsNoCampoCidade(uf) {
    const campoCidadeDaPaginaDeRegistro = document.getElementById('cidade');

    if (!campoCidadeDaPaginaDeRegistro) return;

    const cidadeAtual = campoCidadeDaPaginaDeRegistro.getAttribute('data-valor-atual');
    campoCidadeDaPaginaDeRegistro.innerHTML = '';

    const rotaEnderecosPorUf = campoCidadeDaPaginaDeRegistro.getAttribute('data-url');

    fetch(rotaEnderecosPorUf.replace(':uf', uf))
        .then(response => response.json())
        .then(listaEnderecos => {
            listaEnderecos.forEach(listaEnderecos => {
                const option = document.createElement('option');
                option.value = listaEnderecos.cidade;
                option.innerText = listaEnderecos.cidade;
                campoCidadeDaPaginaDeRegistro.appendChild(option);
            });

            if (cidadeAtual) {
                campoCidadeDaPaginaDeRegistro.value = cidadeAtual;
            }
        });

}


