<?php
function createDatabaseConnection (){
    $servername = "localhost";
    $username = "root";
    $password = "mysql";
    $dbname = "todolist";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

function getData(){
    $dbconnection = createDatabaseConnection();
    $stmt = $dbconnection->prepare("SELECT * FROM items");
    $stmt->execute();
    $result = $stmt->fetchAll();
    $dbconnection = NULL;
    return $result;
}
?>