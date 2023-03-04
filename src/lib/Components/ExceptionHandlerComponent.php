<?php

/*

Implementação do Composite (Composite Pattern)

Composite -> é o elemento que tem sub-elementos: leafs ou outros composites. 

A clase abaixo irá usar o método display() para exibir o
conteúdo html personalizado de exception criado na tela.

basta informar a exception através do método handleException()

e criar a estruta html (header) como desejar.

obs: a exception será exibida abaixo das tags criadas

*/

class ExceptionHandlerComponent implements Component
{
    // o array tags armazenará toda a estrutura do componente
    // criando assim um html customizado para exibição da exception
    public function __construct(
        private $tags = array())
    { }

    private string $exceptionMessage = "";

    public function display()
    {
        foreach ($this->tags as $tag) {
            echo $tag;
        }

        echo "<p>" . $this->exceptionMessage . "</p>";
    }

    public function handleException(Exception $ex)
    {
        $this->exceptionMessage = $ex->getMessage();
    }

    public function addTag($tag)
    {
        $this->tags[] = $tag;
    }
}