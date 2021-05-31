<?php
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'addList':
            addList($_POST['listname']);
            break;
    }
}

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

function getLists(){
    $dbconnection = createDatabaseConnection();
    $stmt = $dbconnection->prepare("SELECT * FROM lists");
    $stmt->execute();
    $result = $stmt->fetchAll();
    $dbconnection = NULL;
    return $result;
}

function getItems($id){
    $dbconnection = createDatabaseConnection();
    $stmt = $dbconnection->prepare("SELECT * FROM items where id = " .$id);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $dbconnection = NULL;
    return $result;
}

function getListById($id){
        $dbconnection = createDatabaseConnection();
        $stmt = $dbconnection->prepare("SELECT * FROM lists where id = " .$id);
        $stmt->execute();
        $result = $stmt->fetch();
        $dbconnection = NULL;
        return $result;
}

function addList($name){
    $dbconnection = createDatabaseConnection();
    $stmt = $dbconnection->prepare("INSERT INTO `lists`(`name`) VALUES ('".$name."')");
    $stmt->execute();
    $id = $dbconnection->lastInsertId();
    $result = getListById($id);
    $dbconnection = NULL;
    return $result;
}
