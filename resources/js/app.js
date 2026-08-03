import './bootstrap';
import 'bootstrap';
import 'admin-lte';
import './modal';
import './mascara-cpf';
import './ajax-menu';


import DataTable from 'datatables.net-bs5';
import 'datatables.net-bs5/css/dataTables.bootstrap5.css';

new DataTable('#tabela', {
    pageLength: 10
});
