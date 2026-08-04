import DataTable from 'datatables.net-bs5';
import 'datatables.net-bs5/css/dataTables.bootstrap5.css';

let dataTable = null;

export function iniciarDataTable() {

    const tabela = document.querySelector('#tabela');

    if (!tabela) return;

    if (dataTable) {
        dataTable.destroy();
    }

    dataTable = new DataTable(tabela, {
        pageLength: 10,
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json'
        }
    });
}

iniciarDataTable();