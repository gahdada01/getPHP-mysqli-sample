<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "test_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    // the code below will select the database table and gather all the information on it
    $sql = "SELECT * FROM test_db";
    $result = $conn->query($sql);

    // Check to insure if the table have values
    if ($result->num_rows > 0) {
        // output data of each row
        $all=[];
        while($row = $result->fetch_assoc()) {
        	$return = array(
                        "id" => $row['id'],
                        "name" => $row['name'],
                        "address" => $row['address'],
                        "age" => $row['age'],
                        "comment" => $row['comment']
        				);
           $all[]=$return;   
        }
        //to show the values that was pass to $test
        echo json_encode($all);

    } else {
        echo "No result found";
    }

    $conn->close();
?>