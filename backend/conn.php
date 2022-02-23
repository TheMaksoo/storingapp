<?php

//Haal de configuratie op
require_once 'config.php';

//Met behulp van PDO zetten we de connectie op, waarna we met setAttribute de manier van errormeldingen weergeven bepalen.
$quere = "INSERT INTO meldingen (attractie, type) 
          VALUES(:attractie, :type)";
          
$statement  = $conn->prepare($query);

$statement->execute([
    ":attractie" => $attractie,
    ":type" => $type,
    ]);

$items = $statement-> fetchAll(PDO: : FETCH_ASSOC);
