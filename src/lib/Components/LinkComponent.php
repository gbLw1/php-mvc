<?php

/*

Implementação do Leaf (Composite Pattern)

Leaf -> elemento básico de uma árvore que não tem sub-elementos.

A clase abaixo será utilizada como um componente
que através do método display() irá exibir um link
criando tag html <a> com o redirecionamento e texto
atribuidos nos métodos addText(str) e addRedirectLink(str).

*/

class LinkComponent implements Component
{
    public function __construct(
        private string $text = "",
        private string $linkRedirect = "")
    { }

    public function display()
    {
        echo "<a href=" . $this->linkRedirect . ">" . $this->text . "</a>";
    }

    public function setText(string $text)
    {
        $this->text = $text;
    }

    public function setRedirectLink(string $link)
    {
        $this->linkRedirect = $link;
    }
}