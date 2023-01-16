<?php
#questa api serve ad aggiungere le nuove todo

header("Access-Control-Allow-Origin: http://localhost:5173"); #l'indirizzo deve essere quello del front end, ciò serve ad autorizzare il nostro server ad accettare richieste anche dal nostro progetto vue
header("Access-Control-Allow-Headers: X-Requested-With"); #permette di ricevere informazioni

header("Content-Type: application/json"); #specifica che le informazioni sono di tipo json per permettere poi a javascript di leggere correttamente i dati

$newTodo = $_GET["newTodo"];


$jsonTodoList = file_get_contents("todo.json", true);  /* da questa riga in poi aggiungiamo il nuovo todo */
$todoList = json_decode($jsonTodoList);

$todoList[] = [
    "text" => $newTodo,
    "completed" => false,
];

$jsonTodoList = json_encode($todoList);
file_put_contents("todo.json", $jsonTodoList);