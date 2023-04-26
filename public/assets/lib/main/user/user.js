// script pour la vérification de l'enregisttrement des utilisateurs

$('#register-user').click(function(){
    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var password_confirm = $('#password-confirm').val();
    var passwordLength= password.length;
    var country_code = ('#country-code').val;
    var phone_number = $('#phone-number').val();
    var num_passport = $('#num-passport').val();
    var quartier = $('#quartier').val();
    var agreeTerms = $('#agreeTerms');

    if(firstname != " " && /^[a-zA-Z ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/.test(firstname)){
        $('#firstname').removeClass('is-invalid');
        $('#firstname').addClass('is-valid');
        $('#error-register-firstname').text(" ");

        if(lastname != " " && /^[a-zA-Z ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/.test(lastname)){
            $('#lastname').removeClass('is-invalid');
            $('#lastname').addClass('is-valid');
            $('#error-register-lastname').text(" ");

            if(email != " " &&  /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/.test(email)){
                $('#email').removeClass('is-invalid');
                $('#email').addClass('is-valid');
                $('#error-register-email').text(" ");

                if(passwordLength >= 8){
                    $('#password').removeClass('is-invalid');
                    $('#password').addClass('is-valid');
                    $('#error-register-password').text(" ");

                    if(password == password_confirm){
                        $('#password-confirm').removeClass('is-invalid');
                        $('#password-confirm').addClass('is-valid');
                        $('error-register-password-confirm').text(" ");

                        if(phone_number != " " && /^.{8,}$/.test(phone_number)){
                            $('#phone-number').removeClass('is-invalid');
                            $('#phone-number').addClass('is-valid');
                            $('#error-register-phone-number').text(" ");

                            if(quartier != " " && /^[a-zA-Z0-9\s\-\#\,\.\/]+$/.test(quartier)){
                                $('#quartier').removeClass('is-invalid');
                                $('#quartier').addClass('is-valid');
                                $('#error-register-quartier').text("  ");

                                if(num_passport != " " && /^[A-Z0-9]{6,20}$/.test(num_passport)){

                                    $('#num-passport').removeClass('is-invalid');
                                    $('#num-passport').addClass('is-valid');
                                    $('#num-passport').text(" ");

                                    if(agreeTerms.is(':checked')){
                                        $('#agreeTerms').removeClass('is-invalid');
                                        $('#error-register-agreeTerms').text(" ");

                                        if(country_code != " " && /^.{3,}$/.test(country_code)){
                                            $('#country-code').removeClass('is-invalid');
                                            $('#country-code').addClass('is-valid');
                                            $('#error-register-country-code').text("  ");



                                                //envoie du formulaire

                                                //  alert('data ok');

                                                var res = emailExistjs(email);

                                                (res != "exist" ) ?  $('#form-register').submit()

                                                     :    ($('#email').addClass('is-invalid'),
                                                          $('#email').removeClass('is-valid'),
                                                          $('#error-register-email').text("This email address is already used! "));

                                            //  if(res != "exist"){
                                            //       $('#form-register').submit()
                                            //  }else{
                                            //     $('#email').addClass('is-invalid');
                                            //     $('#email').removeClass('is-valid');
                                            //     $('#error-register-email').text("This email address is already used! ");
                                            //  }





                                        }else{
                                            $('#country-code').addClass('is-invalid');
                                            $('#country-code').removeClass('is-valid');
                                            $('#error-register-country-code').text("Put an indicatif of Togo! ")

                                        }

                                    }else{
                                        $('#agreeTerms').addClass('is-invalid');
                                        $('#error-register-agreeTerms').text(" You should agree to our terms and condition! ");
                                    }

                                }else{
                                    $('#num-passport').addClass('is-invalid');
                                    $('#num-passport').removeClass('is-valid');
                                    $('#error-register-num-passport').text(" format invalid! ");
                                }

                            }else{
                                $('#quartier').addClass('is-invalid');
                                $('#quartier').removeClass('is-valid');
                                $('#error-register-quartier').text(" format invalid! ");
                            }

                        }else{
                            $('phone-number').addClass('is-invalid');
                            $('phone-number').removeClass('is-valid');
                            $('#error-register-phone-number').text("Invalid phone number format! ");

                        }

                    }else{
                        $('#password-confirm').addClass('is-invalid');
                        $('#password-confirm').removeClass('is-valid');
                        $('#error-register-password-confirm').text("Your passwords must be identical! ");
                    }

                }else{
                    $('#password').addClass('is-invalid');
                    $('#password').removeClass('is-valid');
                    $('#error-register-password').text("Your password must be at last 8 characteres! ");
                }

            }else{

                $('#email').addClass('is-invalid');
                $('#email').removeClass('is-valid');
                $('#error-register-email').text("Your Email adress is not valid! ");
            }

        }else{
            $('#lastname').addClass('is-invalid');
            $('#lastname').removeClass('is-valid');
            $('#error-register-lastname').text("Last Name is not valid ! ");
        }
    }else{

        $('#firstname').addClass('is-invalid');
        $('#firstname').removeClass('is-valid');
        $('#error-register-firstname').text("First Name is not valid !");

    }



});


//Evénement pour l'input termes et conditions
$('#agreeTerms').change(function(){
    var agreeTerms = $('#agreeTerms');

    if(agreeTerms.is(':checked')){
        $('#agreeTerms').removeClass('is-invalid');
        $('#error-register-agreeTerms').text(" ");

    }else{
        $('#agreeTerms').addClass('is-invalid');
        $('#error-register-agreeTerms').text(" You should agree to our terms and condition! ");

    }
});

function emailExistjs(email)
{

    var url = $('#email').attr('url-emailExist');
    var token = $('#email').attr('token');
    var res =" ";

    $.ajax({
        type: 'POST',
        url: url,
        data:{
           '_token:': token,
           email: email
        },
        succes:function(result){
            res = result.response;
        },
        async: false


    });

    return res;
}


