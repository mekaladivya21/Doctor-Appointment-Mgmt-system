<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Doctor Appointment</title>
    <link  rel="stylesheet" type="text/css"   href="Styling.css">
    <script type="text/javascript" src="AppointmentValidation.js"></script>

</head>
<body>
    <div class="banner">
        <h3 class="heading">Doctor Appointment</h3>
   
    <nav> 
        <a href="Home.html">Home Page</a> 
        <a href="AppointmentBooking.php" >Appointment Booking</a>
        <!-- <a href="AppointmentConfirmation.php">Appointment Confirmation</a> -->
        <a href="AppointmentReschedule.php">Appointment Reschedule</a>
        <a href="AppointmentCancellation.php">Appointment Cancellation</a>
        <a href="DoctorAvailability.php">Doctor Availability</a>
        <a href="DoctorProfile.php">Doctor profile</a>
        <a href="AppointmentSearch.php">Appointment Search</a>
        <a href="Feedback.html">FeedBack</a>
        <a href="AboutUs.html">About Us</a>
    </nav>
   
</div>

<?php 
include ("inc_IntermediaryClass.php");
    $select ="name , specialization" ; // creates variable $select for query
    $result; //stores the result of the query.
    $intermediaryClass = new IntermediaryClass();
    $result = $intermediaryClass->getData($select);
    if ($result->num_rows > 0) {
          // We have data
           $names = array();
           $specializations = array();
          while($row = $result->fetch_assoc()) {
            $names[] = $row["name"];
            $specializations[] = $row['specialization'];
          }
        } else {
          echo "No names found in the database.";
        }

        function  getNames(){
            global $names; // this will give acess to the global variable.
             foreach ($names as $name ) {
           echo ("<option value='" . $name . "'>" . $name . "</option>");
             } // end foreach
           }
           function  getSpecializations(){
            global $specializations; // this will give acess to the global variable.
             foreach ($specializations as $specialization ) {
           echo ("<option value='" . $specialization . "'>" . $specialization . "</option>");
             } // end foreach
           }
 ?>

<div class="aptmntpage">
<img src="Images/book01.jpg" alt="Image2" height="200px" width="1370px">
</div>
<h1 class="formheading">Appointment Booking</h1>
<form class="booking" action="AppointmentConfirmation.php" method='POST' id="myForm" >
   
    
    <label>Name:</label>
    <input type="text" name="name" id="name"> 
    <br><br>
    <label>Date of Birth:</label>
    <input type="date" name="dob" id="dob"> 
    <br><br>
    <label>Gender:</label>
    <label>Female</label>
    <input type="radio" name="gender" value="Female" id="Female" >
    <label>Male</label>
    <input type="radio" name="gender" value="Male" id="Male">
    <br><br>
        <label>Contact Number : </label>
        <input type="text" name="contact" id="contact" >
    <br><br>
        <label>Email :</label>
        <input type="email" name="email" id="email">
    <br><br>
        <label>Date:</label>
        <input type="date" name="date"  id="date">
    <br><br>
        <label>Time:</label>
        <input type="time" name="time" id="time">
    <br><br>
    <label>Select specialization:</label>
        <select name="specialization" id="sepcialization">
        <option value="none" selected>None</option>
      <?php  getSpecializations()?>
        </select>
<br><br>
        <label>Select Doctor:</label>
        <select name="doctor" id="doctor">
        <option value="none" selected>None</option>
        <?php getNames() ?>

        </select>
    <br><br>
    <input type="submit" value="Book now" id="submitBtn" name="submitButton">
    <!-- <button type="button" onclick="validateForm()">Submit</button> -->
    <input type="reset" value="Reset " name="resetButton">
  
    
    
</form>

<script>
        // Add an event listener to the submit button
        document.getElementById("submitBtn").addEventListener("click", function(event) {
            // Prevent the default form submission behavior
            event.preventDefault();
            
            // Call the validateForm() function from the external JavaScript file
            var isValid = validateForm();
            
            // If the form is valid, submit it
            if (isValid) {
                document.getElementById("myForm").submit();
            }
        });
    </script>
</body>
<div class="footer">
    <p>&copy; 2024 Appointment Booking Website. All rights reserved.</p>
</div>
</html>