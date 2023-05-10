$(function(){
    $(document).on('click', '#login', function(){
      event.preventDefault();
      var acc_username = document.getElementById("username");
      var acc_password = document.getElementById("password");
      
          login(acc_username.value,acc_password.value);
    });


    function login(acc_username,acc_password){

    var values = {
        "username": acc_username,
        "password":acc_password
    };

    $.ajax({
        type: "POST",
        url: "../controller/auth.php",
        data: values,
        cache: false,
        success: function(data){
            if(data=="success"){
                const Toast = Swal.mixin({
                    customClass: {
                        title:'textColor1',
                    },
                    toast: true,
                    position: 'center',
                    showConfirmButton: true,
                    
                });

                let timerInterval
                Toast.fire({
                title: 'Success',
                html: 'redirecting to dashboard',
                timer: 1000,
                timerProgressBar: true,
                showConfirmButton: false,
                allowEscapeKey: false,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        window.location = "index.php";
                    }
                });
            }

        }
    });
}
});