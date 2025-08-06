<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Doctor Appointment</title>
    <link  rel="stylesheet" type="text/css"   href="Styling.css">
    <script type = "text/javascript" src ="AppointmentSearch.js" ></script>

</head>
<body>
    <div class="banner">
        <h3 class="heading">Doctor Appointment</h3>
   
    <nav> 
        <a href="Home.html">Home Page</a> 
        <a href="AppointmentBooking.php" >Appointment Booking</a>
        <a href="AppointmentReschedule.php">Appointment Reschedule</a>
        <a href="AppointmentCancellation.php">Appointment Cancellation</a>
        <a href="DoctorAvailability.php">Doctor Availability</a>
        <a href="DoctorProfile.php">Doctor profile</a>
        <a href="AppointmentSearch.php">Appointment Search</a>
        <a href="Feedback.html">FeedBack</a>
        <a href="AboutUs.html">About Us</a>
    </nav>
</div>

<br><br>
<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "doctordatabase";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Connect to the database

?>
<div class="appointmentSearch">
</div>
<h1 class="formheading">Appointment Search</h1>
<form class="booking" action="AppointmentSearch.php" method='POST'>
   
    <label>Patient Name : </label>
    <input type="text" name="name" id ="name">     
    <br><br>
    <p>
    <input type="submit" value="Search" name="submitButton">
    <input type="reset" value="Cancel " name="resetButton">
    </p>
    
    
</form>
<?php
// Process form data
if(isset($_POST["submitButton"])) {
    $name = $_POST['name'];
   
    
// // Prepare SQL statement
$sql = "SELECT name, appointmentdate, time, doctor FROM `appointments` WHERE name ='$name'";
$result =  mysqli_query($conn, $sql);

$results = '';
if($row = mysqli_fetch_assoc($result)){
    
    $results.= '<p>Name: '. $row['name']. '</p>';
    $results.= '<p>Appointment Date: '. $row['appointmentdate']. '</p>';
    $results.= '<p>Time: '. $row['time']. '</p>';
    $results.= '<p>Doctor: '. $row['doctor']. '</p>';
    $results.= '<hr>';
    echo $results;
    }else{
      echo "Patient not found, Please try again with registered name";
  }

}

// Close connection
$conn->close();

?>
</body>
<div class="footerDetails">
    <p>&copy; 2024 Appointment Booking Website. All rights reserved.</p>
</div>
</html>