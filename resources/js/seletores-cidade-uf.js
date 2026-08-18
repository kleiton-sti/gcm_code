document.addEventListener('DOMContentLoaded', () => {
    const seletor = document.querySelector('.seletor-cidade-uf');
    if (!seletor) return;

    const input = seletor.querySelector('input');

    input.addEventListener('input', (e) => {
        const cidade = e.target.value;
        const url = input.dataset.url + `/${cidade}`;
    });

    
})


document.querySelector('.seletor-cidade-uf').addEventListener('change', (e) => {
    const estado = e.target.value;

    const url = `https://servicodados.ibge.gov.br/api/v1/localidades/estados/${estado}/municipios`;
})