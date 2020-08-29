<?php

require_once('vendor/autoload.php');

use League\CLImate\CLImate;

$climate = new CLImate;

$climate->out('[1] Raiz Quadrada');
$climate->out('[2] Fatorial');
$climate->out('[3] Ao Quadrado');

$input = $climate->input('Escolha uma das oplçoes acima:');
$input->accept(['1', '2', '3']);
$menu = $input->prompt();

class Operacao
{
    public $numero1;
    public $numero2;

    protected $climate;

    public function __construct(CLImate $climate)
    {
        $this->climate = $climate;
    }

    public function input() 
    {
        $numero1Input = $this->climate->input('Insira o Primeiro Número: ');
        $this->$numero1 = $numero1Input->prompt();
        $numero2Input = $this->climate->input('Insira o Segundo Número');
        $this->$numero2 = $numero2Input->prompt();
    }
}

$operacao = new Operacao($climate);
$operacao->input();

switch ($menu) {
    case '1':
       echo sprintf("Resultado: %s", (int) $operacao->$numero1 + (int) $operacao->$numero2);
    break;

    default:
        echo ("Não foi Possível executar a operaçã,o digite um valo válido !");
    break;
}