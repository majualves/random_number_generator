<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jogo</title>
    <style>
        table, table th, table td{
            border: 1px solid black;

        }

        table {
            margin-bottom: 1em;
            border-collapse: separate;
            border-spacing: 5px 5px;
        }

        table td {
            border-radius: 50%;
            width: 35px;
            height: 35px;
            text-align: center;
        }

        .point-color {
            background: #16c60c;
            border-color: #16c60c;
            color: white;
            font-weight: bold;
        }

        .no-border {
            border: none;
        }
    </style>
</head>
<body>
<?php

require_once "src/JogoControle.php";

try {
    $controle = new JogoControle(6, 5);

    $controle->iniciarJogos();
    $controle->sorteio();

    echo $controle->viewer();

} catch (Exception $e) {
    echo $e->getMessage();
}

?>
</body>
</html>