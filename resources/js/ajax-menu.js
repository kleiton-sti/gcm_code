import { iniciarDataTable } from './datatables.js';
import { mascararCPFeRG } from './mascaras.js';
import { buscarECriarOptionsNoCampoUF, buscarECriarOptionsNoCampoCidade } from './seletores-cidade-uf.js';

document.querySelectorAll('.menu-ajax').forEach(link => {
    link.addEventListener('click', (e) => {

        e.preventDefault();

        let url = link.getAttribute('href');

        axios.get(url).then(response => {

            const parser = new DOMParser();

            const htmlDoc = parser.parseFromString(response.data, 'text/html');

            const conteudoParaAdicionar = htmlDoc.querySelector('.conteudoDaPagina');

            document.getElementById('conteudo').innerHTML = conteudoParaAdicionar.innerHTML;

            iniciarDataTable();

            mascararCPFeRG();

            buscarECriarOptionsNoCampoUF();
        })
            .catch(error => {
                console.log(error);
            })
    })
})
