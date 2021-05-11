<?php
require(ROOT . "model/EmployeeModel.php");



function player($id){
    $players = array(
        "bikers" => 1, "growing" => 2, "static" => 3, "weather" => 4, "upper" => 5, "status" => 6,
        );
    if(
        !isset($players[$id])
    ){
        exit("leuk geprobeerd");
    }
    
    $player = $players[$id];
    $cards = playercards($players[$id]);
    
    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $bet = $_POST["bet"];
        raising($bet, $player);
    }

    $bet = betAmount($players[$id]);
    $playercards = array("player" => $player,"cards" => $cards, "bet" => $bet);

    render('employee/player', $playercards);

    // $games = getAllGames();
    // //2. Geef een view weer en geef de variable met medewerkers hieraan mee
    // render('employee/index', $games);
}
function inzetten(){
    $cards = cardstable();


    render('employee/inzetten', $cards);

    // $games = getAllGames();
    // //2. Geef een view weer en geef de variable met medewerkers hieraan mee
    // render('employee/index', $games);
}

function flop(){
    $cards = cardstable();


    render('employee/flop', $cards);

    // $games = getAllGames();
    // //2. Geef een view weer en geef de variable met medewerkers hieraan mee
    // render('employee/index', $games);
}

function river(){
    $cards = cardstable();


    render('employee/river', $cards);

    // $games = getAllGames();
    // //2. Geef een view weer en geef de variable met medewerkers hieraan mee
    // render('employee/index', $games);
}

function turn(){
    $cards = cardstable();


    render('employee/turn', $cards);

    // $games = getAllGames();
    // //2. Geef een view weer en geef de variable met medewerkers hieraan mee
    // render('employee/index', $games);
}
function index(){
    // $shuffledcards = shufflecards();
    render('employee/index');
}


function shufflingCards(){
    $shuffledcards = shufflecards();


    $dbConnection = openDatabaseConnection();
    $stmt = $dbConnection->prepare("INSERT INTO cardsplayers (player, card1, card2) VALUES (:player, :card1, :card2)");
    $stmt->bindParam(":player", $player);
    $stmt->bindParam(":card1", $card1);
    $stmt->bindParam(":card2", $card2);

    for ($i = 0; $i < 6; $i++) {
        $player = $i + 1;
        $card1 = $shuffledcards[0 + $i * 2];
        $card2 = $shuffledcards[1 + $i * 2];

        $stmt->execute();
    }

    $stmt = $dbConnection->prepare("INSERT INTO cardstable (card1, card2, card3, card4, card5) VALUES (:card1, :card2, :card3, :card4, :card5)");
    $stmt->bindParam(":card1", $shuffledcards[12]);
    $stmt->bindParam(":card2", $shuffledcards[13]);
    $stmt->bindParam(":card3", $shuffledcards[14]);
    $stmt->bindParam(":card4", $shuffledcards[15]);
    $stmt->bindParam(":card5", $shuffledcards[16]);
    $stmt->execute();
    render('employee/inzetten');
}

function raising($bet, $player){
    $dbConnection = openDatabaseConnection();
    $stmt = $dbConnection->prepare("UPDATE cardsplayers SET bet = :bet WHERE player = :player");
    $stmt->bindParam(":player", $player);
    $stmt->bindParam(":bet", $bet);

    $stmt->execute();
    
}








?>
