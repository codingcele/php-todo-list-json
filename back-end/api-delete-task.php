<?php
#questa api serve a eliminare le tasks

header("Access-Control-Allow-Origin: http://localhost:5173"); #l'indirizzo deve essere quello del front end, ciò serve ad autorizzare il nostro server ad accettare richieste anche dal nostro progetto vue
header("Access-Control-Allow-Headers: X-Requested-With"); #permette di ricevere informazioni

header("Content-Type: application/json"); #specifica che le informazioni sono di tipo json per permettere poi a javascript di leggere correttamente i dati

$index = $_GET["index"];

$jsonTodoList = file_get_contents("todo.json");
$todoList = json_decode($jsonTodoList);

#per eliminare l'elemento non usare unset perchè ti lascia un buco negli index dell'array!!!

array_splice($todoList, $index, 1);

$jsonTodoList = json_encode($todoList);
file_put_contents("todo.json", $jsonTodoList);

echo true;

?>