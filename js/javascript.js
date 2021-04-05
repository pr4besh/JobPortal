//CREATED BY SANJIT ADHIKARI

// JAVASCRIPT TO MAKE FORM VALIDATION
function validation() {
    var name= document.getElementById('name').value;
    var email= document.getElementById('email').value;
    var contact= document.getElementById('contact').value;
    // EXECUTE WHEN EMPTY VALUE IS PASS IN NAME
    if (name=="") {
        alert("Please fill Full Name field");
        return false;
    }
    // EXECUTE WHEN LENGTH IS LESS 2 AND GREATER THAN 30
    if((name.length<=2) || (name.length>=30)){
        alert("Full Name must be more than 4 and less than 30 characters");
        return false;
    }
    // EXECUTE WHEN NUMBER IS ADDED IN NAME FIELD
    if (!isNaN(name)) {
        alert("Full Name must be only in alphabetic characters");
        return false;
    }
    // EXECUTE WHEN INVALID EMAIL IS INPUT
    if((email.charAt(email.length-4) !='.') && (email.charAt(email.length-3)!='.')){
        alert("Invalid Email");
        return false;
    }
    // EXECUTE WHEN CONTACT TEXT FIELD IS ASSIGNED EMPTY
    if (contact=="") {
        alert("Please fill the Phone number.");
        return false;
    }
    // EXECUTE WHEN CONTACT TEXT FIELD IS NOT EQUAL TO 10
    if (contact.length!=10) {
        alert("Phone number should be  10 digits only");
        return false;
    }
    // ELSE POP UP MENU WILL SHOWN
    else{
        alert("Thankyou "+name+ " for your enquiry. Your message has successfully added.")
    }
}
    
//JAVASCRIPT FOR THE SUBSCRIBER BAR IN FOOTER
function submitFunction(){
    var email = document.getElementById("email_inf").value;
    //EXECUTE WHEN EMAIL IS ASSIGNED AS EMPTY      
    if(email==""){
        alert("Please fill email field.");
    }
    //EXECUTER WHEN INVALID EMAIL IS ASSIGNED
    else if((email.charAt(email.length-4) !='.') && (email.charAt(email.length-3)!='.')){
        alert("Invalid email address.");
    }
    //OTHERWISE POP-UP BAR WILL ARISE
    else{
        alert("Successfully Added");
    }
}
