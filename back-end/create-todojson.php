<?php
/* questo file serve a creare il todo.json con la lista delle todo */

$todoList = [
    [
        "text" => "todo 1",
        "completed" => true,
    ],
    [
        "text" => "todo 2",
        "completed" => true,
    ],
    [
        "text" => "todo 3",
        "completed" => false,
    ],
    [
        "text" => "todo 4",
        "completed" => false,
    ],
];

$jsonTodoList = json_encode($todoList);
file_put_contents("todo.json", $jsonTodoList);