<?php

require_once "src/Viewers/Interfaces/Visualization.php";

class Viewer
{
    public static function generate(array $jogo, array $resultado, Visualization $visualization): string
    {
        return $visualization->generate($jogo, $resultado);
    }
}