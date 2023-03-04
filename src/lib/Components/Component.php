<?php

/*

Design Pattern Composite

Baseado no propósito do composite, permite que componha objetos
em estruta de árvores e trabalhe com estes objetos individualmente

A interface abaixo 'Component', irá implementar o método display()
que irá exibir os outros objetos adicionados a classe filha que implementou

*/

interface Component
{
    public function display();
}