$('#emailMessage').hide();
$('#passwordMessage').hide();

function validateLogin(){
    var email = $('#email').val();
    var password = $('#password').val();

    if(email.match(regexEmail) && password.match(regexPassword)){
        return true;
    }

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