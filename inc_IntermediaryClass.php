<?php 
/**************************************
 * PHP Intermediary Class File
 *************************/
// include the database class file:
include("inc_DataClass.php");
// intermediary class
class IntermediaryClass{
    // Method for conncting to the database.
    function getData($select){
        $dbClass = new DatabaseClass;
        // Build Query
        $selectSql = "SELECT " . $select . " FROM  doctordetails";
        // call the select query method of the dbcalss:
        try{
            $result = $dbClass->Select($selectSql);
            //
            if($result){
                return $result;
            }//end if
        }catch(Exception $e){
            echo "<script>window.alert(".$e->getMessage().")</script>";
            // That script tag here is a tiny bit of javascript for you: Precursor for the upcoming weeks.
        } //end try/catch
    } //end function getCars().

    function getDoctorDetails($select){
        $dbClass = new DatabaseClass;
        // Build Query
        $selectSql2 = "SELECT * FROM `doctordetails` WHERE specialization = '$select'";
        // call the select query method of the dbcalss:
        try{
            $result = $dbClass->Select($selectSql2);
            //
            if($result){
                return $result;
            }//end if
        }catch(Exception $e){
            echo "<script>window.alert(".$e->getMessage().")</script>";
            // That script tag here is a tiny bit of javascript for you: Precursor for the upcoming weeks.
        } //end try/catch
    }




function setData(){
    $dbClass = new DatabaseClass;
  // Process form data
if(isset($_POST["submitButton"])) {
    $name = $_POST["name"];
    $dateofbirth = $_POST["dob"];
    $gender = $_POST['gender'];
    $contactnumber = $_POST['contact'];
    $email = $_POST['email'];
    $appointmentdate = $_POST['date'];
    $time = $_POST['time'];
    $specialization = $_POST['specialization'];
    $doctor = $_POST['doctor'];
   
    $_SESSION['formData'] = array('name' => $name, 'dateofbirth'=> $dateofbirth , 'gender'=> $gender,
    'contactnumber'=> $contactnumber, 'email' => $email, 'appointmentdate' => $appointmentdate, 'time'=>$time,
    'specialization' => $specialization , 'doctor' =>$doctor);
// Prepare SQL statement
$sql = "INSERT INTO appointments (name, dateofbirth, gender, contactnumber, email, appointmentdate, time, specialization, doctor) 
VALUES ('$name', '$dateofbirth', '$gender', '$contactnumber', '$email','$appointmentdate','$time','$specialization','$doctor')";
// Execute SQL statement
try{
    $result = $dbClass->Select($sql);
    //
    if($result){
        echo "<p>Your appointment details are:</p>";
        echo "<ul>";
        echo "<li><strong>Name</strong>: $name</li>";
        echo "<li><strong>Email</strong>: $email</li>";
        echo "<li><strong>Phone</strong>: $contactnumber</li>";
        echo "<li><strong>Date and time </strong>: $appointmentdate, $time</li>";
        // echo "<li><strong>Time</strong>: $time</li>";
        echo "<li><strong>Doctor</strong>: $doctor</li>";
        echo "</ul>";
    }//end if
}catch(Exception $e){
    echo "<script>window.alert(".$e->getMessage().")</script>";
    // That script tag here is a tiny bit of javascript for you: Precursor for the upcoming weeks.
} //end try/catch
}
}
}
?>