import './bootstrap';
import 'bootstrap';
import 'admin-lte';
import './datatables';
import './ajax-menu';
import './modal';
import './mascara-cpf';


document.addEventListener('DOMContentLoaded', () => {
    const btnFullscreen = document.getElementById('btnFullscreen');

    btnFullscreen.addEventListener('click', () => {
        if (!document.fullscreenElement) {
            document.documentElement.requestFullscreen();
        } else {
            document.exitFullscreen();
        }
    });
});





