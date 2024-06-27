$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

const startCookiePage = new Date().getTime();

const listeners = () => {

    window.addEventListener('beforeunload', (event)=> {

       let cookiePagina = cookieActions.obterCookieTempo();
       
       if(cookiePagina){

        cookieActions.enviaCookieTempo(cookiePagina);

       }

    })

    const buttonNovaConsulta = document.querySelector('#btn-nova-consulta');
    buttonNovaConsulta.addEventListener('click', (e) => {

        clickNewConsulta.clicked(e.target);

    })

    const voltaButtonSecondStep = document.querySelector('.container-consulta-content-form-content-title-volta');

    voltaButtonSecondStep.addEventListener('click', (e) => {

        containerActions.voltaContainer();

    })

    const logout = document.querySelector('#logout');

    logout.addEventListener('click', (e) => {

        userActions.logout();

    })
    
    const buttonNextSintomas = document.querySelector(".btn-new-query");

    buttonNextSintomas.addEventListener("click", (e) => {

        clickNextSintomas.clicked(e.target);
    });

    const inputSearchSintoma = document.querySelector("#input-search-sintoma");

    const allSintomas = document.querySelectorAll(".select-dropdown-body-item");

    allSintomas.forEach((sintoma) => {
        sintoma.addEventListener("click", (e) => {
            searchSintoma.clickSintoma(e.target);
        });
    });

    searchSintoma.allSintomas = allSintomas;

    inputSearchSintoma.addEventListener("keyup", (e) => {
        searchSintoma.inputSearch(e.target);
    });
};

const containerActions = {

    voltaContainer(){

        let firstContainer = document.querySelector('.first-step');

        let secondContainer = document.querySelector('.second-step');


        if(!secondContainer.classList.contains('hide-content')){

            secondContainer.classList.add('hide-content');

        }

        if(firstContainer.classList.contains('hide-content')){

            firstContainer.classList.remove('hide-content')

        }


       


    }
}

const searchSintoma = {
    allSintomas: [],

    inputSearch(input) {
        let searchValue = input.value.toLowerCase();

        if (searchValue.length <= 0) {
            let allSintomasSelected = document.querySelectorAll(
                ".container-consulta-content-form-sintomas-body-item"
            );

            let body = document.querySelector(".select-dropdown-body");
            body.innerHTML = "";

            this.allSintomas.forEach((sintoma) => {
                let divContainer = document.createElement("div");
                divContainer.classList.add("select-dropdown-body-item");
                divContainer.dataset.sintomaId = sintoma.dataset.sintomaId;
                divContainer.innerHTML = sintoma.innerHTML;

                if (allSintomasSelected != null) {
                    allSintomasSelected.forEach((sintomaSelecionado) => {
                        if (
                            sintomaSelecionado.dataset.sintomaSelectedId ==
                            divContainer.dataset.sintomaId
                        ) {
                            divContainer.classList.add("active");
                        }
                    });
                }

                divContainer.addEventListener("click", (e) => {
                    this.clickSintoma(e.target);
                });

                body.appendChild(divContainer);
            });
        } else {
            let allSintomasSelected = document.querySelectorAll(
                ".container-consulta-content-form-sintomas-body-item"
            );

            let allSintomas = this.allSintomas;

            let body = document.querySelector(".select-dropdown-body");

            body.innerHTML = "";

            allSintomas.forEach((sintomaDiv) => {
                let textSintomaDiv = sintomaDiv.innerHTML.toLowerCase();

                if (textSintomaDiv.includes(searchValue)) {
                    let divContainer = document.createElement("div");
                    divContainer.classList.add("select-dropdown-body-item");
                    divContainer.dataset.sintomaId =
                        sintomaDiv.dataset.sintomaId;
                    divContainer.innerHTML = sintomaDiv.innerHTML;

                    if (allSintomasSelected != null) {
                        allSintomasSelected.forEach((sintomaSelecionado) => {
                            if (
                                sintomaSelecionado.dataset.sintomaSelectedId ==
                                divContainer.dataset.sintomaId
                            ) {
                                divContainer.classList.add("active");
                            }
                        });
                    }

                    divContainer.addEventListener("click", (e) => {
                        this.clickSintoma(e.target);
                    });

                    body.appendChild(divContainer);
                }
            });
        }
    },

    clickSintoma(sintomaClicado) {

        this.removeSintoma(sintomaClicado);

        sintomaClicado.classList.toggle("active");

        if (sintomaClicado.classList.contains("active")) {
            this.adicionaSintoma(sintomaClicado);
        } else {
            this.removeSintoma(sintomaClicado);
        }
    },

    removeSintoma(sintomaClicado) {

        let emptyContainer = document.querySelector('.container-consulta-content-form-sintomas-body-empty');
        let allSintomasClicados = document.querySelectorAll('.container-consulta-content-form-sintomas-body-item');

        if(allSintomasClicados.length <= 0){

           if(emptyContainer.classList.contains('hide-content')){

                emptyContainer.classList.remove('hide-content');

           }

        }

        let sintomasSelecionadosContainer = document.querySelector(
            ".container-consulta-content-form-sintomas-body"
        );

        let verificaSelecionado =
            sintomasSelecionadosContainer.querySelectorAll(
                `.container-consulta-content-form-sintomas-body-item[data-sintoma-selected-id="${sintomaClicado.dataset.sintomaId}"]`
            );

        if (verificaSelecionado != null) {
            verificaSelecionado.forEach((selecionado) => {
                selecionado.remove();
            });
        }
    },

    adicionaSintoma(sintomaClicado) {

        let emptyContainer = document.querySelector('.container-consulta-content-form-sintomas-body-empty');

        if(!emptyContainer.classList.contains('hide-content')){


            emptyContainer.classList.add('hide-content');

        }
        
        let sintomasSelecionadosContainer = document.querySelector(
            ".container-consulta-content-form-sintomas-body"
        );

        let divContainer = document.createElement("div");
        divContainer.classList.add(
            "container-consulta-content-form-sintomas-body-item",
            "hide-body"
        );
        divContainer.dataset.sintomaSelectedId =
            sintomaClicado.dataset.sintomaId;

        let divContainerTitle = document.createElement("div");
        divContainerTitle.classList.add(
            "container-consulta-content-form-sintomas-body-item-title"
        );
        divContainerTitle.innerHTML = sintomaClicado.innerHTML;

        

        divContainerTitle.addEventListener("click", (e) => {
            let allItem = e.target.parentNode;

            allItem.classList.toggle("hide-body");
        });

        let divContainerTitleClose = document.createElement('div');
        divContainerTitleClose.classList.add('close-item');
        divContainerTitleClose.innerHTML = '<i class="fa-solid fa-circle-xmark"></i>';
        divContainerTitleClose.addEventListener('click', (e) => {

            let allItem = e.target.parentNode.parentNode.parentNode;

            if(allItem.classList.contains('container-consulta-content-form-sintomas-body-item-title')){

               allItem = allItem.parentNode;

            }

            let getItemSelected = document.querySelector('.select-dropdown-body-item[data-sintoma-id="' + allItem.dataset.sintomaSelectedId + '"]');

            getItemSelected.classList.remove('active');

            allItem.remove();

            let allSelectedSintomas = document.querySelectorAll('.container-consulta-content-form-sintomas-body-item');


            if(allSelectedSintomas.length <= 0){

                let emptyContainer = document.querySelector('.container-consulta-content-form-sintomas-body-empty');
    
                if(emptyContainer.classList.contains('hide-content')){
    
                    emptyContainer.classList.remove('hide-content')
    
                }
    
            }

        })

        divContainerTitle.appendChild(divContainerTitleClose);
        

        let divContainerContent = document.createElement("div");
        divContainerContent.classList.add(
            "container-consulta-content-form-sintomas-body-item-content"
        );

        let divContainerContentGrau = document.createElement("div");
        divContainerContentGrau.classList.add(
            "container-consulta-content-form-sintomas-body-item-grau"
        );

        let divContainerContentGrauLabel = document.createElement("label");
        divContainerContentGrauLabel.for = "grau-sintoma";
        divContainerContentGrauLabel.innerHTML = "Qual a intensidade?";

        let divContainerContentGrauRangeDiv = document.createElement("div");
        divContainerContentGrauRangeDiv.classList.add("range");

        let divContainerContentGrauRangeDivInput =
            document.createElement("input");
        divContainerContentGrauRangeDivInput.type = "range";
        divContainerContentGrauRangeDivInput.id = "range1";
        divContainerContentGrauRangeDivInput.step = 1;
        divContainerContentGrauRangeDivInput.max = 2;
        divContainerContentGrauRangeDivInput.value = 0;

        divContainerContentGrauRangeDivInput.addEventListener("change", (e) => {
            let allItem = e.target.parentNode.parentNode.parentNode.parentNode;

            let spanChange = allItem.querySelector(".span-info-intensidade");

            if (e.target.value == 0) {
                spanChange.innerHTML = "Leve";
            } else if (e.target.value == 1) {
                spanChange.innerHTML = "Moderado";
            } else if (e.target.value == 2) {
                spanChange.innerHTML = "Intenso";
            } else {
                spanChange.innerHTML = "Selecione um valor valido";
            }

        });

        divContainerContentGrauRangeDiv.appendChild(
            divContainerContentGrauRangeDivInput
        );

        let divContainerContentGrauSpan = document.createElement("span");
        divContainerContentGrauSpan.classList.add("span-info-intensidade");
        divContainerContentGrauSpan.innerHTML = "Leve";

        divContainerContentGrau.appendChild(divContainerContentGrauLabel);
        divContainerContentGrau.appendChild(divContainerContentGrauRangeDiv);
        divContainerContentGrau.appendChild(divContainerContentGrauSpan);

        let divContainerContentTempo = document.createElement("div");
        divContainerContentTempo.classList.add(
            "container-consulta-content-form-sintomas-body-item-tempo"
        );

        let divContainerContentTempoLabel = document.createElement("label");
        divContainerContentTempoLabel.htmlFor = "tempo-sintoma";
        divContainerContentTempoLabel.innerHTML =
            "A quanto tempo está sentindo?";

        let divContainerContentTempoInput = document.createElement("input");
        divContainerContentTempoInput.id = "tempo-input";
        divContainerContentTempoInput.type = "text";
        divContainerContentTempoInput.name = "tempo-sintoma";
        divContainerContentTempoInput.value = "1 dia";
        divContainerContentTempoInput.addEventListener("change", (e) => {
            inputDataSintoma.verificaInput(e.target);
        });

        let divContainerContentTempoSpanErro = document.createElement("span");
        divContainerContentTempoSpanErro.innerHTML =
            "<i class='fa-solid fa-circle-exclamation'></i> Insira uma data válida. Exemplo: 1 dia, 1 mês, 1 ano, etc.";

        divContainerContentTempo.appendChild(divContainerContentTempoLabel);
        divContainerContentTempo.appendChild(divContainerContentTempoInput);
        divContainerContentTempo.appendChild(divContainerContentTempoSpanErro);

        divContainerContent.appendChild(divContainerContentGrau);
        divContainerContent.appendChild(divContainerContentTempo);

        divContainer.appendChild(divContainerTitle);
        divContainer.appendChild(divContainerContent);

        sintomasSelecionadosContainer.appendChild(divContainer);
    },

    
};

const inputDataSintoma = {

    verificaInput(input) {
        function verificarModeloDataHora(texto) {
            const regexModelo =
                /\b(\d+)\s*(mês(es)?|dia(s)?|ano(s)?|hora(s)?|minuto(s)?|meses?|segundo(s)?)\b/g;

            const correspondencias = texto.match(regexModelo);
            return correspondencias || [];
        }

        if (input.value.length >= 1) {
            let validandoInput = verificarModeloDataHora(input.value);

            if (validandoInput.length <= 0) {
                let divFather = input.parentNode;

                let spanError = divFather.querySelector("span");

                if (!spanError.classList.contains("error")) {
                    spanError.classList.add("error");
                }
            } else {

                let divFather = input.parentNode;

                let spanError = divFather.querySelector("span");

                if (spanError.classList.contains("error")) {
                    spanError.classList.remove("error");
                }

            }
        } else {
            let divFather = input.parentNode;
            let spanError = divFather.querySelector("span");

            if (spanError.classList.contains("error")) {
                spanError.classList.remove("error");
            }
        }

    },
};

const clickNextSintomas = {

    sintomasSelecionados: [],

    getAllSintomasSelected(){

        let allSintomasSelected = document.querySelectorAll('.container-consulta-content-form-sintomas-body-item');

        let sintomasSelecionados = [];

        allSintomasSelected.forEach(sintoma => {


            let idSintoma = sintoma.dataset.sintomaSelectedId;
            let intensidade = sintoma.querySelector('#range1').value;
            let tempo = sintoma.querySelector('input#tempo-input').value;
            
            let sintomaObject = {

                id: idSintoma,
                'intensidade': intensidade,
                'tempo': tempo

            }

            sintomasSelecionados.push(sintomaObject);

        })

        return sintomasSelecionados;

        

    },
  

    clicked(button) {

        this.sintomasSelecionados = this.getAllSintomasSelected();
        

        if(this.sintomasSelecionados.length <= 0){

            Swal.fire({
                title: "É necessario selecionar ao menos 1 sintoma",
                icon: "error",
                timer: 2000,
                showConfirmButton: false
              });

              return;

        }

        let nextStepContainer = document.querySelector('.second-step');
        let actualStepContainer = document.querySelector('.first-step');

        actualStepContainer.classList.add('hide-content');

        if(nextStepContainer.classList.contains('hide-content')){

            nextStepContainer.classList.remove('hide-content');

        }


        

    },

    validaData() {
        const input = document.getElementById("timeInput").value;
        const calculatedDate = this.criaData(input);
        const resultElement = document.getElementById("result");

        if (calculatedDate) {
            resultElement.innerText = `Data calculada: ${calculatedDate.toLocaleDateString()}`;
        } else {
            resultElement.innerText =
                "Entrada inválida. Por favor, tente novamente.";
        }
    },

    criaData(input) {
        const now = new Date();
        const [value, unit] = input.split(" ");
        const amount = parseInt(value, 10);

        if (isNaN(amount) || !unit) {
            return null; // Invalid input
        }

        switch (unit.toLowerCase()) {
            case "dia":
            case "dias":
                now.setDate(now.getDate() + amount);
                break;
            case "semana":
            case "semanas":
                now.setDate(now.getDate() + amount * 7);
                break;
            case "mês":
            case "meses":
                now.setMonth(now.getMonth() + amount);
                break;
            default:
                return null; // Invalid unit
        }

        return now;
    },
};

const clickNewConsulta = {

    clicked(button){

            let textoAcrescento = document.querySelector('textarea[name="sentindo"]');
            let sintomas = clickNextSintomas.sintomasSelecionados;
            $.ajax({
                type: 'POST',
                data: {
                    sintomas: sintomas,
                    descricaoPaciente: textoAcrescento.value
                },
                url: '/evento/nova-consulta',
                success: (response) => {

                    if(response.success){

                        Swal.fire({
                            title: "CONSULTA SOLICITADA",
                            icon: "success",
                            timer: 2000,
                            showConfirmButton: false
                        });
            
                        setTimeout(() => {
            
                            window.location.href = '/consultas-agendadas';
            
                        }, 2000)

                    }else{


                        Swal.fire({
                            title: response.error,
                            icon: "error",
                            timer: 2000,
                            showConfirmButton: false
                        });

                    }

                }
            })

            
            

              return;



    }

}

const cookieActions = {

    obterCookieTempo(){

        var cookies = document.cookie.split(';');
        for (var i = 0; i < cookies.length; i++) {
            var cookie = cookies[i].trim();
            if (cookie.indexOf('tempo_na_pagina=') === 0) {
                return cookie.substring('tempo_na_pagina='.length, cookie.length);
            }
        }
        return null;

    },

    enviaCookieTempo(tempoPagina){

        $.ajax({
            type:"POST",
            data:{
                'tempoPagina': tempoPagina
            },
            url:"/cookie/tempo-pagina",
            success: (response)=> {

                console.log(response);
                
            }
        })



    },


}

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
