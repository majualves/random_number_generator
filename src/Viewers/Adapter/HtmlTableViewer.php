<?php

require_once "src/Viewers/Interfaces/Visualization.php";

class HtmlTableViewer implements Visualization
{

    public function generate($jogos, $resultados): string
    {
        $html = "<table class='game-set'>";

        $totalDezenas = count($jogos[0]);
        $html .= "<tr>";
        $html .= "<th colspan='$totalDezenas' class='center'>Jogo(s)</th>";
        $html .= "<th class='center'>✔️</th>";
        $html .= "</tr>";

        foreach ($jogos as $dezenas) {
            $html .= "<tr>";

            $acertos = 0;
            foreach ($dezenas as $dezena) {
                $flagClass = '';
                if (in_array($dezena, $resultados)) {
                    $acertos++;
                    $flagClass = 'point-color';
                }
                $html .= "<td class='$flagClass'>$dezena</td>";
            }

            $html .= "<td class='no-border'>$acertos</td>";

            $html .= "</tr>";
        }
        $html .= "</table>";

        $html .= "<table class='game-result'>";
        $html .= "<tr>";
        $html .= "<th colspan='$totalDezenas' class='center'>Resultado</th>";
        $html .= "</tr>";

        foreach ($resultados as $dezena) {
            $html .= "<td class=>$dezena</td>";
        }

        $html .= "</table>";

        return $html;
    }
}