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

new DataTable('#listagem-agendamento', {
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
                <a href="cadastrar-agendamento.php" class="btn-cadastrar-dt">
                    Cadastrar
                </a>
                `
            );

        }
    }
});


new DataTable('#listagem-funcionario', {
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
                <a href="funcionarios.php" class="btn-cadastrar-dt">
                    Cadastrar
                </a>
                `
            );

        }
    }
});

new DataTable('#listagem-servico', {
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
                <a href="servicos.php" class="btn-cadastrar-dt">
                    Cadastrar
                </a>
                `
            );

        }
    }
});

new DataTable('#listagem-produto', {
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
                <a href="produtos.php" class="btn-cadastrar-dt">
                    Cadastrar
                </a>
                `
            );

        }
    }
});


