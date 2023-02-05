<?php

#used bind for most selection table
function getConnection()
{
    try {
        $db = new PDO('mysql:dbname=job;host=mysql', 'student', 'student');

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit();
    }
    return $db;
}


function updateTable($table, $data, $columns, $value, $field, $value2)
{
    $db = getConnection();

    $query = "UPDATE $table SET ";

    foreach ($data as $key => $val) {
        $query .= "$key = :$key, ";
    }

    $query = rtrim($query, ', ') . " WHERE $field = $value2";

    $stmt = $db->prepare($query);
    foreach ($data as $key => $val) {
        $stmt->bindValue(":$key", $val);
    }
    $stmt->execute();
}




#for select table
function selectTable($table, $columns, $field, $value)
{
    $db = getConnection();
    if ($value === '') {
        $query = "SELECT $columns FROM $table";
    } else {
        $query = "SELECT $columns FROM $table WHERE $field = '$value' ";

    }


    $stmt = $db->prepare($query);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;

}


#for delete table

function delete($table, $field, $value)
{
    $db = getConnection();
    global $db;

    if (!$db) {
        die("Could not connect to database");
    }

    $stmt = $db->prepare("DELETE FROM `$table` WHERE `$field` = :value");
    $stmt->bindParam(':value', $value);
    $stmt->execute();
}



function register($table, $username, $password)
{
    global $db;
    $db = getConnection();


    if (!$db) {
        die("Could not connect to database");
    }

    // hash the password for security 
    // code gotten from https://www.youtube.com/watch?v=G8x1cM6dvlM
    //$password = password_hash($password, PASSWORD_DEFAULT);

    // insert the new user into the database
    $stmt = $db->prepare("INSERT INTO `$table` (username, password) VALUES (:username, :password)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
}










function login($table, $username, $password)
{
    global $db;
    $db = getConnection();


    if (!$db) {
        die("Could not connect to database");
    }

    $stmt = $db->prepare("SELECT * FROM `$table` WHERE `username` = :username AND `password` = :password");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    return $stmt->rowCount() > 0;


}


    function get_jobs()
    {
    try {
        $db = getConnection();

          $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Query to retrieve job data from the database
        $query = "SELECT * FROM job ORDER BY closingDate ASC LIMIT 10";
        $stmt = $db->prepare($query);
        $stmt->execute();

        $jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;

        return $jobs;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return [];
    }
}


?>



