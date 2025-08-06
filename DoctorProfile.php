<!DOCTYPE html>
<html lang="en">
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
<br><br>

<?php
include ("inc_DatabaseConfig.php");
if(empty($_POST["submitButton"])) {
include ("inc_IntermediaryClass.php");

$select ="specialization" ; // creates variable $select for query
$result; //stores the result of the query.
$intermediaryClass = new IntermediaryClass();
$result = $intermediaryClass->getData($select);
if ($result->num_rows > 0) {
      // We have data
     $specializations = array();
     global $specializations;
      while($row = $result->fetch_assoc()) {
        $specializations[] = $row['specialization'];
      }
    } else {
      echo "No specialization found in the database.";
    }
}

    if(isset($_POST["submitButton"])&& !empty($_POST["submitButton"])) {
        include ("inc_IntermediaryClass.php");
        $selectSpecialization = $_POST['specialization'];
       
        //$select ="Dermatology" ; // creates variable $select for query
        $result; //stores the result of the query.
        $intermediaryClass = new IntermediaryClass();
        $result = $intermediaryClass->getDoctorDetails( $selectSpecialization);
    
    
    $results = '';
    while($row = mysqli_fetch_assoc($result)){
        
        $results.= '<p>Name: '. $row['name']. '</p>';
        $results.= '<p>Designation: '. $row['designation']. '</p>';
        $results.= '<p>Specialization: '. $row['specialization']. '</p>';
        $results.= '<p>Experience: '. $row['Experience']. '</p>';
        $results.= '<hr>';
        }
        
        echo $results;
    
    }
?>
<div class="doctorprofile">
<!-- <img src="Images/book01.jpg" alt="Image2" height="200px" width="1370px"> -->
</div>
<h1 class="formheading">Doctor profile</h1>
<form class="booking" action="DoctorProfile.php" method='POST'>
   
    <label>Select specialization : </label>
        <select name="specialization" id="sepcialization">
        <option value="none" selected>None</option>
        <?php foreach ($specializations as $specialization) : ?>
        <option value="<?php echo $specialization; ?>"><?php echo $specialization; ?></option>
        <?php endforeach; ?>
        </select>      
    <br><br>
    <p>
    <input type="submit" value="Search" name="submitButton">
    <input type="reset" value="Cancel " name="resetButton">
    </p>
    
    
</form>
<?php
// Process form data


?>

</body>
<div class="footerDetails">
    <p>&copy; 2024 Appointment Booking Website. All rights reserved.</p>
</div>
</html>