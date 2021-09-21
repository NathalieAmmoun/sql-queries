$(document).ready(validate);

function validate() {
    $("#submitButton").click((e) => {
        e.preventDefault();

        if (validateEmail() && confirmPassword() && validateAge()) {
            $("#emErr").hide();
            $("#cpassErr").hide();
            $("#dobErr").hide();
            $("#signup-form").submit();
        } else {
            if (!validateEmail()) {
                $("#emErr").html("Enter Valid Email");
            }
            if (!confirmPassword()) {
                $("#cpassErr").html("Passwords Do Not Match");
            }
            if (!validateAge()) {
                $("#dobErr").html("Enter Age>18");
            }

        }
    })
}


function validateEmail() {
    var emailValue = $("#email").val();
    if (
        emailValue.length > 5 &&
        emailValue.lastIndexOf(".") > emailValue.lastIndexOf("@") &&
        emailValue.lastIndexOf("@") != -1
    ) {
        return true;
    }
    return false;
}

function confirmPassword() {
    var pass = $("#password").val();
    var conPass = $("#confirmPassword").val();
    if (pass == conPass) {
        return true;
    }
    return false;
}

function validateAge() {
    var date = new Date($("#dob").val());
    var diff_ms = Date.now() - date.getTime();
    var age_dt = new Date(diff_ms);
    if (Math.abs(age_dt.getUTCFullYear() - 1970) >= 18) {
        return true;
    }
    return false
}