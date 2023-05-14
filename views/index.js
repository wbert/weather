$(function(){
    $(document).on('click', '#submit_contact', function(){
      event.preventDefault();
      var name = document.getElementById("name");
      var contact_number = document.getElementById("contact_number");
      
      
      const Toast = Swal.mixin({
        customClass: {
            title:'textColor1',
        },
        toast: true,
        position: 'center',
        showConfirmButton: true,
        showCancelButton: true,
        })
    Toast.fire({
        title: 'Adding Contact',
        text: "Are you sure you want to add "+name.value+" 's data?",
        icon: 'warning',
        confirmButtonColor: '#696cff',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
          addcontact(name.value,contact_number.value);
        }
    });
    });


    function addcontact(name,contact_number){

    var values = {
        "name": name,
        "contact_number":contact_number
    };

    $.ajax({
        type: "POST",
        url: "../controller/addcontact.php",
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
                html: 'Contact Added',
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
                        location.reload(true);
                    }
                });
            }

        }
    });
}

  $(document).on('click', '#delbtn', function(){

        var contact_id = $(this).data('contact_id');
        var contact_name = $(this).data('contact_name');

        const Toast = Swal.mixin({
            customClass: {
                title:'textColor1',
            },
            toast: true,
            position: 'center',
            
            showConfirmButton: true,
            showCancelButton: true,
            })
        Toast.fire({
            title: 'Deleting customer information!',
            text: "Are you sure you want to delete "+contact_name+" 's data?",
            icon: 'warning',
            confirmButtonColor: '#696cff',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                delcontact(contact_id);
            }
        });

        });

        function delcontact(contact_id){
        var values = {
            "contact_id": contact_id,
        };

        $.ajax({
            type: "POST",
            url: "../controller/delcontact.php",
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
                    title: 'Information deleted!',
                    html: 'Customer information has been deleted.',
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
                            location.reload(true);
                        }
                    });
                }

            }
        });
        }
    
        $(document).on('click', '#editbtn', function(){

        var contact_id = $(this).data('contact_id');
        var contact_name = $(this).data('contact_name');
        var contact_number = $(this).data('contact_number');
        
        $('#e_contact_id').val(contact_id);
        $('#e_contact_name').val(contact_name);
        $('#e_contact_number').val(contact_number);

            


        });

        $(document).on('click', '#e_emp', function(){

        var contact_id = $('#e_contact_id').val();
        var contact_name = $('#e_contact_name').val().trimLeft();
        var contact_number = $('#e_contact_number').val().trimLeft();


        if(contact_name == '' || contact_number == '' ){
            const Toast = Swal.mixin({
                customClass: {
                    title:'textColor1',
                },
                toast: true,
                position: 'center',
                showConfirmButton: true,
                
                confirmButtonColor: '#696cff',
                })
                Toast.fire(
                    'Fill out all fields!',
                    'Please don\'t leave a field empty.',
                    'error'
                );
            return;
        }
        else{
            
            const Toast = Swal.mixin({
                customClass: {
                    title:'textColor1',
                },
                toast: true,
                position: 'center',
                
                showConfirmButton: true,
                showCancelButton: true,
                })
            Toast.fire({
                title: 'Updating contact information!',
                text: "Are you sure you want to update this information?",
                icon: 'warning',
                confirmButtonColor: '#696cff',
                cancelButtonColor: 'btn-ligaya btn-ligaya-outline',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    editcust(contact_id, contact_name, contact_number);
                }
            });
        }

        });

        function editcust(contact_id, contact_name, contact_number){

        var values = {
            "contact_id": contact_id,
            "contact_name": contact_name,
            "contact_number": contact_number,
        };

        console.log(values);

        $.ajax({
            type: "POST",
            url: "../controller/editcontact.php",
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
                    title: 'Information updated!',
                    html: 'Customer information has been updated.',
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
                            location.reload(true);
                        }
                    });
                }else{
                    const Toast = Swal.mixin({
                        customClass: {
                            title:'textColor1',
                        },
                        toast: true,
                        position: 'center',
                        showConfirmButton: true,
                        
                        confirmButtonColor: '#696cff',
                        })
                        Toast.fire(
                            'Already Exists!',
                            'Customer already exists.',
                            'error'
                        );
                    return;

                }
            }
        });
  }



});

document.addEventListener("DOMContentLoaded", getWeather);

async function getWeather() {
  const apiKey = "ea481bfd0ec86e094fb85e7329ab9ace";
  const city = "davao";

  try {
    const response = await fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric`);
    const data = await response.json();
    const description = data.weather[0].description;
    const temperature = data.main.temp;
    const windSpeed = data.wind.speed;
    const humidity = data.main.humidity;
    
    const descriptionElement = document.getElementById("description");
    const temperatureElement = document.getElementById("temperature");
    const humidityElement = document.getElementById("humidity");
    const windSpeedElement = document.getElementById("wind");
    descriptionElement.innerHTML = `${description}`;
    temperatureElement.innerHTML = `${temperature}°C%`;
    humidityElement.innerHTML = `${humidity}%`;
    windSpeedElement.innerHTML = `${windSpeed} m/s`;

    weatherBox.style.display = '';
    weatherDetails.style.display = '';
    weatherBox.classList.add('fadeIn');
    weatherDetails.classList.add('fadeIn');
    container.style.height = '590px';
  } catch (error) {
    console.log("Error:", error);
  }
}


