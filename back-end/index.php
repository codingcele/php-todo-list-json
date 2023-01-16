<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strong password generator</title>
    <style>
        *{
            font-family: Verdana;
        }
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
    <?php
        session_start();
        
        require_once __DIR__ . "/helper.php";

        $length = $_GET['length'] ?? false;

        if($length) {
            $pass = pass_generator($length);

            $_SESSION['password'] = $pass;

            header("Location: thankyou.php");
        }
        
    ?> 
</head>

<body>
    <form action="">
        <label for="psw_length">Lunghezza password:</label>
        <input type="number" min="1" name="length"
            <?php
                if ($length) {
                    echo "value='" . $length . "'";
                }
            ?>
        >
        <input type="submit" value="GENERATE">
    </form>

</body>
</html>