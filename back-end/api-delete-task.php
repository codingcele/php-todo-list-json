<?php
#questa api serve a completare le tasks

header("Access-Control-Allow-Origin: http://localhost:5173"); #l'indirizzo deve essere quello del front end, ciò serve ad autorizzare il nostro server ad accettare richieste anche dal nostro progetto vue
header("Access-Control-Allow-Headers: X-Requested-With"); #permette di ricevere informazioni

header("Content-Type: application/json"); #specifica che le informazioni sono di tipo json per permettere poi a javascript di leggere correttamente i dati

$index = intval($_GET["index"]);

$jsonTodoList = file_get_contents("todo.json");  /* da questa riga in poi aggiungiamo il nuovo todo */
$todoList = json_decode($jsonTodoList);

unset($todoList[$index]);

$jsonTodoList = json_encode($todoList);
file_put_contents("todo.json", $jsonTodoList);


?>