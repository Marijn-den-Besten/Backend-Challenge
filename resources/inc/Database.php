<?php
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'addList':
            $result = addList($_POST['listname']);
            echo json_encode($result);
            break;
        case 'editList':
            $result = editList($_POST['listname'], $_POST['listid']);
            echo json_encode($result);
            break;
        case 'deleteList':
            $result = deleteList($_POST['listid']);
            echo json_encode($result);
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
    $stmt = $dbconnection->prepare("INSERT INTO `lists`(`listname`) VALUES ('".$name."')");
    $stmt->execute();
    $id = $dbconnection->lastInsertId();
    $result = getListById($id);
    $dbconnection = NULL;
    return $result;
}

function editList($name, $id){
    $dbconnection = createDatabaseConnection();
    $stmt = $dbconnection->prepare("UPDATE lists SET listname= '" .$name. "' WHERE id =".$id);
    $stmt->execute();
    $id = $dbconnection->lastInsertId();
    $result = getListById($id);
    $dbconnection = NULL;
    return $result;
}

function deleteList($id){
    $dbconnection = createDatabaseConnection();
    $stmt = $dbconnection->prepare("DELETE FROM lists WHERE id =" . $id);
    $stmt->execute();
    $dbconnection = NULL;
    return $result;
}
