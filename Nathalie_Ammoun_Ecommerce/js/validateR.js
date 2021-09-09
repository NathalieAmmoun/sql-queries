window.onload = function(){
let butn= document.getElementById("submitButtom");
let emailElement =  document.getElementById("email");
let phoneElement =  document.getElementById("phone");
let passwordElement =  document.getElementById("password");
let confirmPasswordElement =  document.getElementById("confirmPassword");
let formElement =  document.getElementById("signupForm");

butn.addEventListener("click", validate);

function validate(){ 
        if(!validateEmail()){
            alert("Enter Valid Email!");
    
        }
        if(!confirmPassword()){
          alert("Passwords Do Not Match");
      }
      if(!validatePhone()){
        alert("enter phone number beginning with +961");
    }
      }
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
}