$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


const listeners = () => {


    const allInputsForm = document.querySelectorAll('.container-form-container');

    if(allInputsForm != null){

        allInputsForm.forEach(input => {

            input.addEventListener('keyup', (e) => {

                

                inputsInteractions.digitando(e.target);

            })

        })
        
    }


    const buttonFormLogin = document.querySelector('.container-form-container-button');

    buttonFormLogin.addEventListener('click', (e) => {

        e.preventDefault();

        if (e.target.classList.contains('container-form-container-button')) {

            formActions.tryLogin(e.target)

        } else {

            formActions.tryLogin(e.target.parentNode);

        }



    })


}

const inputsInteractions = {

    hover(input){



    },

    mouseOut(input){


    },

    clicked(input){

    },

    digitando(input){

        let inputContainer = input.parentNode;

        let spanInsideContainer = inputContainer.querySelector('span');

        if(input.value.length >= 1) {


            if(!inputContainer.classList.contains('active')){

                inputContainer.classList.add('active');


            }

        }else{

            if(inputContainer.classList.contains('active')){

                inputContainer.classList.remove('active');


            }

        }


    }

}

const validations ={

    login(loginText){

        if(loginText == '' || loginText == ' ' || loginText.length <= 2){
            return false;
        }

        return true;


    },

    password(passwordText){
        
            const regexNumero = /\d/;

            if (passwordText.length < 5) {
                return false;
            }

            return true;
       
    }

}

const formActions = {


    ativaError(erroText){

        let componentWithLoadings = document.querySelector('.container-form-loadings');
        let loader = componentWithLoadings.querySelector('.loader');
        let success = componentWithLoadings.querySelector('.success-checkmark');
        let error = componentWithLoadings.querySelector('.error');
        let spanError = componentWithLoadings.querySelector('.error span');

        spanError.innerHTML = erroText;


        if(componentWithLoadings.classList.contains('hide-content')){

            componentWithLoadings.classList.remove('hide-content');

        }
        
        if(!loader.classList.contains('hide-content')){

            loader.classList.add('hide-content');

        }

        if(!success.classList.contains('hide-content')){

            success.classList.add('hide-content');

        }

        if(error.classList.contains('hide-content')){

            error.classList.remove('hide-content')

        }



        setTimeout(() => {

            if(!componentWithLoadings.classList.contains('hide-content')){

                componentWithLoadings.classList.add('hide-content')

            }

            if(!error.classList.contains('hide-content')){

                error.classList.remove('hide-content');

            }

        }, 1500)



    },

    ativaSuccess(){

        let componentWithLoadings = document.querySelector('.container-form-loadings');

        let loader = componentWithLoadings.querySelector('.loader');

        let success = componentWithLoadings.querySelector('.success-checkmark');

        let error = componentWithLoadings.querySelector('.error');



        if(!loader.classList.contains('hide-content')){

            loader.classList.add('hide-content');

        }

        if(!error.classList.contains('hide-content')){
            error.classList.add('hide-content');
        }

        if(success.classList.contains('hide-content')){

            success.classList.remove('hide-content')
        }

        

    },



    ativaLoading(){


        let componentWithLoadings = document.querySelector('.container-form-loadings');

        let loader = componentWithLoadings.querySelector('.loader');

        if(componentWithLoadings.classList.contains('hide-content')){

            componentWithLoadings.classList.remove('hide-content');

        }

        if(loader.classList.contains('hide-content')){

            loader.classList.remove('hide-content');

        }


    },


    tryLogin(button) {


        let inputLogin = document.querySelector('input[name="login"]');
        let spanErroLogin = document.querySelector('.error-info.login');
        let inputContainerLogin = inputLogin.parentNode;

        let inputSenha = document.querySelector('input[name="password"]');
        let spanErroSenha = document.querySelector('.error-info.password');
        let inputContainerSenha = inputSenha.parentNode;


        let errorContados = 0;


        if(!validations.login(inputLogin.value)){

            if(!inputContainerLogin.classList.contains('error')){
                inputContainerLogin.classList.add('error');
            }

            if(spanErroLogin.classList.contains('hide-content')){

                spanErroLogin.classList.remove('hide-content')

            }


            errorContados++;
            
        }else{

            if(inputContainerLogin.classList.contains('error')){
                inputContainerLogin.classList.remove('error');
            }

            if(!spanErroLogin.classList.contains('hide-content')){

                spanErroLogin.classList.add('hide-content')

            }

        }

        if(!validations.password(inputSenha.value)){

            if(!inputContainerSenha.classList.contains('error')){
                inputContainerSenha.classList.add('error');
            }

            if(spanErroSenha.classList.contains('hide-content')){

                spanErroSenha.classList.remove('hide-content')

            }

            errorContados++;


        }else{

            if(inputContainerSenha.classList.contains('error')){
                inputContainerSenha.classList.remove('error');
            }

            if(!spanErroSenha.classList.contains('hide-content')){

                spanErroSenha.classList.add('hide-content')

            }


        }


        if(errorContados == 0){

            this.login(inputLogin.value, inputSenha.value);


        }



    },


    login(login, senha){


        this.ativaLoading();

        $.ajax({
            type: 'POST',
            data: {
                'login':login,
                'senha':senha
            },
            url:'/evento/login',
            success: (response) => {

                if(response.success){

                    this.ativaSuccess();


                    setTimeout(() => {

                        window.location.reload();

                    }, 1000)


                }else{


                    let erroText = response.error;

                    this.ativaError(erroText);

                }

            },

            error: function (xhr, status, error) {

                console.log(error);
             },
        })

    }

}


listeners();