<?php
       $servername = "localhost";
       $username = "root";
       $password = "kemenag2016";
       $dbname = "kemenag";
 
       // Create connection
 
       $conn = new mysqli($servername, $username, $password, $dbname);
 
       // Check connection
 
       if ($conn->connect_error) {
 
           die("Connection failed: " . $conn->connect_error);
 
       } 
 
       $sql = "SELECT * from t_kepala where penerima like '%Kasubbag TU%' and baca = 'T'";
       $result = $conn->query($sql);
       $row = $result->fetch_assoc();
       $count1 = $result->num_rows;
       $conn->close();
?>