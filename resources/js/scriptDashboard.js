$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

const listeners = () => {


    const logoutButton = document.querySelector('#logout');

    logoutButton.addEventListener('click', (e) => {

        userActions.logout();

    })




}


const userActions = {

    logout(){

        $.ajax({

            type: 'POST',
            url: '/evento/logout',
            success: (response) => {

                console.log(response);
                window.location.reload();   

            }

        })

    }

}

listeners();