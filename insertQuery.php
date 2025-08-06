<?php

$host = "localhost";
$dbname = "doctordatabase";
$username = "root";
$password = "";
// Connect to your database
$conn = new mysqli($host, $username, $password, $dbname);

// Prepare the statement
$stmt = $conn->prepare("INSERT INTO doctordetails ( name, specialization, available) VALUES (?, ?, ?)");

$name = array('John Doe', 'Jane Smith', 'Olivia Ramirez', 'Ethan Patel',       
'Sophia Garcia',     
'William Chen',      
'Ava Johnson',       
'Noah Miller',       
'Mia Jones',         
'Liam Hernandez',    
'Emily Moore',       
'Michael Lee',       
'Charlotte Robinson',
'Aiden Young',       
'Evelyn Allen',      
'Benjamin Hall',     
'Isabella Baker'     
); // Your list of names
$specialization = array('Cardiology', 'Dermatology','General Medicine',
'Orthopedics',
'Ophthalmology',
'Neurology',
'Dermatology',
'Cardiology',
'Pediatrics',
'Pulmonology',
'Gastroenterology',
'Oncology',
'Psychiatry',
'Nephrology',
'Endocrinology',
'Rheumatology',
'Allergy&Immunology'
 ); // Your list of specializations
$available = array('Mon: 10:00-12:00, Wed: 14:00-16:00','Tue: 14:00-17:00, Thu: 09:00-12:00',
'Mon, Wed, Fri: 10:00-13:00','Tue, Thu: 16:00-18:00, Sat: 09:00-12:00','Mon, Wed: 14:00-16:00, Fri: 08:00-11:00',
'Tue, Thu: 08:00-10:00, Fri: 13:00-16:00',' Wed: 16:00-18:00, Fri: 09:00-12:00, Sat: 10:00-13:00','Mon, Wed, Fri: 14:00-17:00',
'Tue, Thu: 10:00-13:00, Sat: 08:00-11:00',' Mon: 09:00-12:00, Wed, Fri: 16:00-18:00','Tue, Thu: 13:00-16:00',
' Mon, Wed, Fri: 11:00-14:00',' Wed, Fri: 08:00-11:00','Tue, Thu: 14:00-17:00','Mon: 16:00-18:00, Wed, Fri: 10:00-13:00',
'Tue: 09:00-12:00, Thu: 13:00-16:00','Mon: 10:00-12:00, Wed: 14:00-16:00'); // Your list of available times

// Loop through data and insert
for ($i = 0; $i < 18; $i++) {
  $stmt->bind_param("sss", $name[$i], $specialization[$i], $available[$i]);
  $stmt->execute();
}

$stmt->close();
$conn->close();
?>