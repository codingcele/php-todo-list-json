<?php

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

$jsonTodoList = file_get_contents("todo.json", true);
$todoList = json_decode($jsonTodoList);

$todoList[] = [
    "text" => "todo 5",
    "completed" => false,
];

$jsonTodoList = json_encode($todoList);
file_put_contents("todo.json", $jsonTodoList);

$jsonTodoList = file_get_contents("todo.json", true);
$todoList = json_decode($jsonTodoList);
var_dump($todoList);