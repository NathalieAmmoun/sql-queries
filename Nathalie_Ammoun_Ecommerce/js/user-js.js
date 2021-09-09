// DOM Elements
$(document).ready(function(){
  $('#email-a').hide();
  $('#pass-a').hide();
  $('#phone-a').hide();
  $('#dob-a').hide();
var emailElement = $("#email");
var phoneElement = $("#phone");
var passwordElement = $("#password");
var confirmPasswordElement = $("#confirmPassword");
var submitElement = $("#submitButton");
var dateElement = $("#birthday");
var formElement = $("#signupForm");

// Listeners

submitElement.on("click", function () {
  if (validateEmail() && confirmPassword() && validatePhone() && validateAge()) {
    formElement.submit();
  }else{
    
    if(!validateEmail()){
      $('#email-a').show();
        $('#email-a').innerText('Enter a valid email!');
    }
    if(!confirmPassword()){
      $('#pass-a').show();
      $('#pass-a').innerText('Passwords do not match!');
  }
  if(!validatePhone()){
    $('#phone-a').show();
    $('#phone-a').innerText('Enter valid phone number starting with +961!');
}
if(!validateAge()){
  $('#dob-a').show();
  $('#dob-a').innerText('Age must be >18!');
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

function validateAge() {
  var date = new Date(dateElement.value);
  var diff_ms = Date.now() - date.getTime();
  var age_dt = new Date(diff_ms);
  if (Math.abs(age_dt.getUTCFullYear() - 1970) >= 18) {
    return true;
  }
  return false;
}
});