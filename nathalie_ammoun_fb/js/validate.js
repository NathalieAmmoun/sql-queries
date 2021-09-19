// DOM Elements
window.onload = function(){
    var dateElement = document.getElementById('dob');
    var emailElement = document.getElementById('email');
    var passwordElement = document.getElementById("password");
    var confirmPasswordElement = document.getElementById("confirmPassword");
    var submitElement = document.getElementById("submitButton");
    var formElement = document.getElementById("signup-form");
    
    // Listeners
    
    submitElement.addEventListener("click", function (event) {
      
      if (validateEmail() && confirmPassword() && validateAge()) {
 
        formElement.submit();
      }else{
        
        if(!validateEmail()){
          alert('Enter a valid email!');
        }
        if(!validateAge()){
          alert('Age must be >18');
        }
        if(!confirmPassword()){
          alert('Passwords do not match!');
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
    function validateAge() {
      var date = new Date(dateElement.value);
      var diff_ms = Date.now() - date.getTime();
      var age_dt = new Date(diff_ms);
      if (Math.abs(age_dt.getUTCFullYear() - 1970) >= 18) {
        return true;
      }
      return false
    }
 }