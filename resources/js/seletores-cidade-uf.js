export function buscarECriarOptionsNoCampoUF () {

    const CampoUFDaPaginaDeRegistro = document.getElementById('uf');
    if(!CampoUFDaPaginaDeRegistro) return;
    const url = CampoUFDaPaginaDeRegistro.getAttribute('data-url');
    
    fetch(url)
        .then(response => response.json())
        .then(listaUf => {
            listaUf.forEach(listaUf => {
                const option = document.createElement('option');
                option.value = listaUf.uf;
                option.innerText = listaUf.uf;
                CampoUFDaPaginaDeRegistro.appendChild(option);
            });
        });

}