<?php
header("Access-Control-Allow-Origin: http://localhost:5173"); #l'indirizzo deve essere quello del front end, ciò serve ad autorizzare il nostro server ad accettare richieste anche dal nostro progetto vue
header("Access-Control-Allow-Headers: X-Requested-With"); #permette di ricevere informazioni

header("Content-Type: application/json"); #specifica che le informazioni sono di tipo json per permettere poi a javascript di leggere correttamente i dati

$jsonTodoList = file_get_contents("todo.json", true);

echo $jsonTodoList; #traduce qualsiasi tipo di dato in formato json. Noi la useremo principalmente per trasformare gli array php in oggetti json!