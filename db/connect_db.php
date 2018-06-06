<?php

class connect_db {

    private $con;

    function __construct() {
        $this->con = mysqli_connect("localhost", "root", "1234", "landingpage");
        mysqli_set_charset($this->con, "utf8");


        if (!$this->con) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

      public function AddInfo($email, $firstName,$lastName,$Country,$phone) {
        $result = $this->con->query("INSERT INTO users (`email`,`firstName`,`lastName`,`country`,`phone`) VALUES ('$email','$firstName','$lastName','$Country','$phone')");
    }

   

}
