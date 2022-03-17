<?php

//Variabelen vullen
$attractie = $_POST['attractie'];
$id = $_POST['id']; 
if(empty($attractie))
{
   $errors[] = "Vul de attractie-naam in.\n";
}

$type = $_POST['type'];
if(empty($type))
{
   $errors[] = "Selecteer een type.\n";
}

$capaciteit = $_POST['capaciteit'];
if(!is_numeric($capaciteit))
{
   $errors[] = "Vul voor capaciteit een geldig getal in.\n";
}

$melder = $_POST['melder'];
if(empty($melder))
{
   $errors[] = "Geef een naam op.\n";
}

$overige_info = $_POST['overige_info'];



if(isset ($errors))
{
    var_dump($errors);
    die();
}

echo $attractie . " / " . $type . " / " . $capaciteit . " / " . $melder . " / " . $overige_info ;

//1. Verbinding
require_once 'conn.php';

//2. Query
$query = "UPDATE meldingen SET attractie = :attractie, type = :type, capaciteit = :capaciteit, melder = :melder, overige_info = :overige_info WHERE id = :id";

//3. Prepare
$statement = $conn->prepare($query);

//4. Execute
$statement->execute([
    ":attractie" => $attractie,
    ":type" => $type,
    ":capaciteit" => $capaciteit,
    ":melder" => $melder,
    ":overige_info" => $overige_info,
    ":id" => $id
]);

header("Location:../meldingen/index.php?msg=Melding opgeslagen");