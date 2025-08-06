
const cancel = document.getElementById("cancel");
  function validate(){
  const cardHolder = document.getElementById("cardHolder").value;
  const cardNumber = document.getElementById("cardNumber").value;
  const expirationDate = document.getElementById("expirationDate").value;
  const cardVerification = document.getElementById("cardVerification").value;
  var errors = [];

  if (cardHolder === "") {
    errors.push("card holder not filled");
  }else if(!/^[a-zA-Z\s'-]+$/.test(cardHolder)){
    errors.push("cardholderName should contain only Characters")
  }

  if (cardNumber === "") {
    errors.push("card number not filled");
  } else if(!/^\d{16}$/.test(cardNumber)){
    errors.push("Incorrect CardNumber. check and enter Correct one... ")
  }

  if (expirationDate === "") {
    errors.push("expiration date not filled");
  }

  if (cardVerification === "") {
    errors.push("card verification not filled"); 
  }else if(cardVerification >4 ){
    errors.push("Incorrect CVV. Enter correct one..!!");
  }
  
  if (errors.length > 0) {
    alert(errors.join("\n"));
    return false;   
}
 return  true;
}

cancel.addEventListener("click", function () {
  window.location.href = "AppointmentConfirmation.php";
});
