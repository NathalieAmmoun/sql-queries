// DOM Elements
window.onload = function(){
    var emailElement = document.getElementById('email');
    var passwordElement = document.getElementById("password");
    var confirmPasswordElement = document.getElementById("confirmPassword");
    var submitElement = document.getElementById("submitButton");
    var formElement = document.getElementById("signupForm");
    
    // Listeners
    
    submitElement.addEventListener("click", function (event) {
      
      if (validateEmail() && confirmPassword()) {
 
        formElement.submit();
      }else{
        
        if(!validateEmail()){
          alert('Enter a valid email!');
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
 }