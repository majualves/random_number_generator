<?php

require_once "src/Viewers/Adapter/HtmlTableViewer.php";
require_once "src/Viewers/Viewer.php";

class JogoControle
{
    private int $qtdDezenas;
    private array $resultado;
    private int $totalJogos;
    private array $jogos;

    /**
     * @throws Exception
     */
    public function __construct(int $qtdDezenas, int $totalJogos)
    {
        if (!in_array($qtdDezenas, [6, 7, 8, 9, 10])) {
            throw new Exception('Quantidade de dezenas não é permitido');
        }

        $this->qtdDezenas = $qtdDezenas;
        $this->totalJogos = $totalJogos;
    }

    private function dezenas(): array
    {
        $dezenas = [];
        while (count($dezenas) !== $this->qtdDezenas) {
            $value = mt_rand(1, 60);
            if (in_array($value, $dezenas)) {
                continue;
            }

            $dezenas[] = $value;
        }

        sort($dezenas);

        return $dezenas;
    }

    public function iniciarJogos(): void
    {
        foreach (range(0, $this->totalJogos - 1) as $jogo) {
            $this->setJogo($jogo, $this->dezenas());
        }
    }

    public function sorteio(): void
    {
        $resultado = [];
        while (count($resultado) < 6) {
            $dezena = mt_rand(1, 60);
            if (!in_array($dezena, $resultado)) {
                $resultado[] = $dezena;
            }
        }

        sort($resultado);

        $this->setResultado($resultado);
    }

    public function viewer():string
    {
        return Viewer::generate($this->getJogos(), $this->getResultado(), new HtmlTableViewer);
    }

    /**
     * @return array
     */
    private function getJogos(): array
    {
        return $this->jogos;
    }

    private function setJogo($jogo, $dezenas)
    {
        $this->jogos[$jogo] = $dezenas;
    }

    /**
     * @return array
     */
    private function getResultado(): array
    {
        return $this->resultado;
    }

    /**
     * @param array $resultado
     */
    private function setResultado(array $resultado): void
    {
        $this->resultado = $resultado;
    }
}