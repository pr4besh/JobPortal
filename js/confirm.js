function confirmation(){
    var message = confirm("Are you sure about confirmation.");
    
    if(message == true){
        return true;
    }
   
    else{
        return false;
    }
}