$('#emailMessage').hide();
$('#passwordMessage').hide();

function validateLogin(){
    var email = $('#email').val();
    var password = $('#password').val();

    // If credentials are valid, then the next step is on backend
    if(email.match(regexEmail) && password.match(regexPassword)){
        return true;
    }

    // If credentials are not valid, then change the class and return false
    if(!email.match(regexEmail)){
        $('#email').addClass('is-invalid');
        $('#emailMessage').show('hidden');
    } else {
        $('#email').removeClass('is-invalid').addClass('is-valid');
        $('#emailMessage').hide();
    }

    if(!password.match(regexPassword)){
        $('#password').addClass('is-invalid');
        $('#passwordMessage').show('hidden');
    } else {
        $('#password').removeClass('is-invalid').addClass('is-valid');
        $('#passwordMessage').hide();
    }

    return false;
}