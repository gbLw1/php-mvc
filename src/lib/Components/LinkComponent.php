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
    private string $linkText = "Link";
    private string $linkRedirect = "#";

    public function display()
    {
        echo "<a href=" . $this->linkRedirect . ">" . $this->linkText . "</a>";
    }

    public function addText(string $text)
    {
        $this->linkText = $text;
    }

    public function addRedirectLink(string $link)
    {
        $this->linkRedirect = $link;
    }
}