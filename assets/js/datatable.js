// new DataTable('#listagem-cliente', {
//     language: {
//         url: 'https://cdn.datatables.net/plug-ins/2.3.8/i18n/pt-BR.json',
//         entries: {
//             _: 'pessoas',
//             1: 'pessoa'
//         }
//     }
// });

new DataTable('#listagem-cliente', {
    language: {
        url: 'https://cdn.datatables.net/plug-ins/2.3.8/i18n/pt-BR.json',
        entries: {
            _: 'pessoas',
            1: 'pessoa'
        }
    },

    initComplete: function () {

        const filtro = document.querySelector('.dt-search');

        if (filtro) {

            filtro.insertAdjacentHTML(
                'afterbegin',
                `
                <a href="clientes.php" class="btn-cadastrar-dt">
                    Cadastrar
                </a>
                `
            );

        }
    }
});