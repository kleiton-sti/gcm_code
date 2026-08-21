import './bootstrap';
import 'bootstrap';
import 'admin-lte';
import './datatables';
import './ajax-menu';
import './modal';
import { buscarECriarOptionsNoCampoCidade } from './seletores-cidade-uf';


document.addEventListener('DOMContentLoaded', () => {
    const btnFullscreen = document.getElementById('btnFullscreen');

    btnFullscreen.addEventListener('click', () => {
        if (!document.fullscreenElement) {
            document.documentElement.requestFullscreen();
        } else {
            document.exitFullscreen();
        }
    });


    document.addEventListener('change', (event) => {

        if (event.target.id != 'uf') return;
        const uf = event.target.value;
        buscarECriarOptionsNoCampoCidade(uf);
    })

});







