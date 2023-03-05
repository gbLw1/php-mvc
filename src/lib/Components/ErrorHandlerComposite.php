<?php

/*

Implementação do Composite (Composite Pattern)

Composite -> é o elemento que tem sub-elementos: leafs ou outros composites. 

A clase abaixo irá usar o método display() para exibir o
conteúdo html personalizado criado na tela.

Nessa mesma classe é posssível tratar exceptions. Basta informar
a exception através do método handleException()

obs: a exception será exibida abaixo das tags criadas

*/

class ErrorHandlerComposite implements Component
{
    // o array tags armazenará toda a estrutura do componente
    // criando assim um html customizado para exibição da exception
    public function __construct(
        private string $exceptionMessage = "",
        private array $tags = array())
    { }

    /**
     * O método add adicionará componentes ao container
     * @param Component $tag O componente deve implementar a interface Component para ser adicionado
     */
    public function add(Component $tag)
    {
        $this->tags[] = $tag;
    }

    /**
     * O método display exibirá todos os componentes adicionados através do método add()
     * Caso tenha passado alguma exception através do método handleException(), será exibida a mensagem abaixo de todos os outros componentes adicionados
     */
    public function display()
    {
        foreach ($this->tags as $tag) {
            echo $tag->display();
        }

        if (!empty($this->exceptionMessage))
        {
            echo "<br><br><hr><br>";
            echo "<p>" . $this->exceptionMessage . "</p>";
        }
    }

    /**
     * Este método pode ser utilizado para fazer o tratamento da exception no componente
     * obs: A mensagem de erro da exception será exibida abaixo de todos os outros componentes independente da ordem que for adicionada
     * @param Exception $ex Informe a Exception que será tratada
     */
    public function handleException(Exception $ex)
    {
        $this->exceptionMessage = $ex->getMessage();
    }
}