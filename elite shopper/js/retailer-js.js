// DOM Elements
$(document).ready(function(){
  $('#email-a').hide();
  $('#pass-a').hide();
  $('#phone-a').hide();
var emailElement = $("email");
var phoneElement = $("phone");
var passwordElement = $("password");
var confirmPasswordElement = $("confirmPassword");
var submitElement = $("submitButton");
var formElement = $("signupForm");


submitElement.on("click", function () {
  if (validateEmail() && confirmPassword() && validatePhone() && validateAge()) {
    formElement.submit();
  }else{
    
    if(!validateEmail()){
      $('#email-a').show();
        $('#email-a').innerText('Enter a valid email!');
    }
    if(!confirmPassword()){
      $('#pass-a').innerText('Passwords do not match!');
  }
  if(!validatePhone()){
    $('#phone-a').innerText('Enter valid phone number starting with +961!');
}
  }

});

function validateEmail() {
  var emailValue = emailElement.value;
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
  
  if (passwordElement.value == confirmPasswordElement.value) {
    return true;
  }
  return false;
}

function validatePhone() {
  var phoneValue = phoneElement.value.split(" ").join("");
  if (
    (phoneValue.length == 12 || phoneValue.length == 11) &&
    phoneValue.indexOf("+961") == 0
  ) {
    return true;
  }
  return false;
}
});
