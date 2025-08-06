// Created by Kusuma
var selectedValue;
function start() {
    //  event listener for the button
    document.getElementById("details").innerHTML = "Please select one of the radio to know about their work..!!!!!";
    document.getElementById("None").addEventListener("click", getData, false);
    document.getElementById("Kavya").addEventListener("click", getData, false);
    document.getElementById("Divya").addEventListener("click", getData, false);
    document.getElementById("Akhil").addEventListener("click", getData, false);
}//start()

function getData() {
    let value = getValue();
    switch (value) {
        case "Kavya":
            let workByK = "As a Part of the project, I have worked on HomePage, Appointment Booking, Appointment Confirmation,Payment and AboutUs Pages"
            document.getElementById("details").innerHTML = workByK;
            break;
            case "Divya":
                let workByD = "As a Part of the project,  Divya worked on  Appointment Dcotor Profile, Appointment Search,and Feedback Pages"
                document.getElementById("details").innerHTML = workByD;
                break;
                case "Akhil":
                    let workByA = "As a Part of the project, Akhil worked on  Appointment Reschedule, Appointment Cancellation, and Doctor Availability Pages"
                    document.getElementById("details").innerHTML = workByA;
                    break;
                    case "None":
                        let none= "Please select one of the radio to know about their work..!!!!!"
                                document.getElementById("details").innerHTML = none;
                        break;
        default:
            let defaultValue = "Please select one of the radio to know about their work..!!!!!";
                    document.getElementById("details").innerHTML = defaultValue;
            break;
    }
}
 function getValue(){
    if (document.getElementById("Kavya").checked) {
        selectedValue = "Kavya";
      }
  
      else if (document.getElementById("Divya").checked) {
        selectedValue = "Divya";
      }
   
      else if (document.getElementById("Akhil").checked) {
        selectedValue = "Akhil";
      } 
      else {
        document.getElementById("None").checked
        selectedValue = "None";
 }
 return selectedValue;
}

// pageLoad event listener
window.addEventListener("load", start, false);
