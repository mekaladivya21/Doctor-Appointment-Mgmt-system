<?php  session_start(); ?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Doctor Appointment</title>
    <link  rel="stylesheet" type="text/css"   href="Styling.css">
</head>
<body>
    <div class="banner">
        <h3 class="heading">Doctor Appointment</h3>
   
    <nav> 
        <a href="Home.html">Home Page</a> 
        <a href="AppointmentBooking.php" >Appointment Booking</a>
        <a href="AppointmentConfirmation.php">Appointment Confirmation</a>
        <!-- <a href="Payment.html">Payment</a> -->
        <a href="AppointmentReschedule.php">Appointment Reschedule</a>
        <a href="AppointmentCancellation.php">Appointment Cancellation</a>
        <a href="DoctorAvailability.php">Doctor Availability</a>
        <a href="DoctorProfile.php">Doctor profile</a>
        <a href="AppointmentSearch.php">Appointment Search</a>
        <a href="Feedback.html">FeedBack</a>
        <a href="AboutUs.html">About Us</a>
    </nav>
</div>
<h2>Confirmation</h2>

<?php
// session_start();
if (isset($_SESSION['formData']) && empty($_POST["submitButton"]) ) {
  $formData = $_SESSION['formData'];
  $name = $formData['name'];
  $email = $formData['email'];
  $contactnumber = $formData['contactnumber'];
  $appointmentdate = $formData['appointmentdate'];
  $time = $formData['time'];
  $doctor = $formData['doctor'];
  echo "<ul>";
  echo "<li><strong>Name</strong>: $name</li>";
  echo "<li><strong>Email</strong>: $email</li>";
  echo "<li><strong>Phone</strong>: $contactnumber</li>";
  echo "<li><strong>Date and time </strong>: $appointmentdate, $time</li>";
  echo "<li><strong>Doctor</strong>: $doctor</li>";
  echo "</ul>";
} else {
  $name = "";
  $email = "";
}
?>


<?php
 if(isset($_POST["submitButton"])) {

include ("inc_IntermediaryClass.php");
    $result; //stores the result of the query.
    $intermediaryClass = new IntermediaryClass();
    $result = $intermediaryClass->setData();
 } 
 ?>
 <a href="Payment.html" class="btn">Payment</a>
 <a href="AppointmentBooking.php" class="btn">Cancel</a>

</body>
<div class="footerDetails">
    <p>&copy; 2024 Appointment Booking Website. All rights reserved.</p>
</div>
</html>