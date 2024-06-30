$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});



const listeners = () => {


    window.addEventListener('DOMContentLoaded', (e) => {
        cookieActions.atualizaCookieTempo();
    });

    window.addEventListener('beforeunload', (e) => {
        cookieActions.enviarTempoDecorrido();
    });


    const logoutButton = document.querySelector('#logout');

    logoutButton.addEventListener('click', (e) => {

        userActions.logout();

    })




}

const cookieActions = {
    atualizaCookieTempo() {
        let tempoAtual = new Date().getTime();

        let pathAtual = window.location.pathname;

        let expiracao = new Date(tempoAtual + (30 * 24 * 60 * 60 * 1000));

        let expiraCookie = "expires=" + expiracao.toUTCString();

        document.cookie = "tempo_na_pagina=" + tempoAtual + "; path=" + pathAtual + ";" + expiraCookie + ";path=/";
    },

    obterTempoDecorrido() {
        let cookieValor = this.obterCookieTempo();

        if (cookieValor) {
            let tempoAtual = new Date().getTime();
            let tempoDecorrido = (tempoAtual - cookieValor) / 1000; 
            return tempoDecorrido;
        }

        return null;
    },

    obterCookieTempo() {
        let cookies = document.cookie.split(';');
        for (let i = 0; i < cookies.length; i++) {
            let cookie = cookies[i].trim();
            if (cookie.indexOf('tempo_na_pagina=') === 0) {
                return parseInt(cookie.substring('tempo_na_pagina='.length, cookie.length));
            }
        }
        return null;
    },

    enviarTempoDecorrido() {
        let tempoDecorrido = this.obterTempoDecorrido();
        let pathAtual = window.location.pathname; 

        if (tempoDecorrido !== null) {
            
            $.ajax({
                type: "POST",
                data: {
                    'tempoDecorrido': tempoDecorrido,
                    'pathAtual': pathAtual 
                },
                url: "/cookie/tempo-pagina",
                success: function(response) {

                },
                error: function(xhr, status, error) {
                    
                }
            });
        }
    }
};



const userActions = {

    logout(){

        $.ajax({

            type: 'POST',
            url: '/evento/logout',
            success: (response) => {

                window.location.reload();   

            }

        })

    }

}

listeners();