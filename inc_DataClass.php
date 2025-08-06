<!DOCTYPE html>
<?php
/********************************
 * DATA CLASS FILE
 */
class DatabaseClass{
    static $connection; 
    /************* Connect Function ********/
    public function connect(){ //this is a method in the DatabaseClass
        // Try and connect to the database
        if(!isset(self::$connection)){//if not connnection set already
            include("inc_DatabaseConfig.php");
            self :: $connection = new mysqli($host, $username , $password , $dbname);
        }
     //If connection was not successful, handle the error
     if(self :: $connection === false){
        //Hanle error - notify administrator, log to a file, show an error screen,etc.
        return false;
     }
     return self :: $connection;
    } //end function connect
    /*********Query Function ***********/
    public function Select($query){
        // Connect to the database
        $connection = $this->connect();
        // Query the database
        $result = $connection->query($query);
        // close the connnection
        $this->CloseConnection();
        if(!$result){
            return $connection->error;
        } else{
            return $result; //returns the result.
        }
    } //end function Select()
    public function error(){
        // gets the last error from the database
        $connection = $this->connect();
        return $connection->error;
    }//end function error
    public function CloseConnection(){
        self::$connection->close();
    }
   } //end class
?>
