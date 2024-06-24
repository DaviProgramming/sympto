const listeners = () => {
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
        console.log(sintomaClicado);

        this.removeSintoma(sintomaClicado);

        sintomaClicado.classList.toggle("active");

        if (sintomaClicado.classList.contains("active")) {
            this.adicionaSintoma(sintomaClicado);
        } else {
            this.removeSintoma(sintomaClicado);
        }
    },

    removeSintoma(sintomaClicado) {
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

            console.log(allItem);
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
            "<i class='fa-solid fa-circle-exclamation'></i>insira uma data valida. Exemplo: 1 dia, 1 mes, 1 ano e etc.";

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

                console.log(validandoInput =verificarModeloDataHora(input.value))
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
    disableButton(button) {},

    clicked(button) {},

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

listeners();
