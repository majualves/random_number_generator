<?php

interface Visualization
{
    public function generate($jogos, $resultados): string;
}