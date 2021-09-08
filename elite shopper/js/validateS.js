// DOM Elements
window.onload = function(){
  var emailElement = document.getElementById('email');
  var phoneElement = document.getElementById("phone");
  var passwordElement = document.getElementById("password");
  var confirmPasswordElement = document.getElementById("confirmPassword");
  var submitElement = document.getElementById("submitButton");
  var dateElement = document.getElementById("birthday");
  var formElement = document.getElementById("signupForm");
  
  // Listeners
  
  submitElement.addEventListener("click", function (event) {
    
    if (validateEmail() && confirmPassword() && validatePhone() && validateAge()) {
      formElement.submit();
    }else{
      
      if(!validateEmail()){
        alert('Enter a valid email!');
      }
      if(!confirmPassword()){
        alert('Passwords do not match!');
    }
    if(!validatePhone()){
      alert('Enter valid phone number starting with +961!');
  }
  if(!validateAge()){
    alert('Age must be >18!');
  }
    } event.preventDefault();
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
  } }