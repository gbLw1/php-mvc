<?php
// Classe abstrata Component
abstract class Component {
    abstract public function render();
}

// Classe Leaf
class Leaf extends Component {
    private $type;
    public function __construct($type) {
        $this->type = $type;
    }
    public function render() {
        echo "<div class='$this->type'></div>";
    }
}

// Classe Composite
class Composite extends Component {
    private $children = array();
    public function add(Component $component) {
        /*
            array_push(array, elemento1, elemento2, ... etc)
            serve para adicionar elementos no array, é equivalente
            a $array[] = $elemento
        */
        array_push($this->children, $component);
    }
    public function remove(Component $component) {
        /*
            array_search(dado_a_ser_procurado, array/lista, booleano)
            3° parametro serve para decidir se a pesquisa será estrita ou não,
            caso for verdadeiro irá validar o dado e o tipo,
            caso for falso irá validar somente  o dado.

            array_search - caso encontrar o dado no array, retorna o index
            do dado dentro do array, caso não encontrar retorna false
        */
        $key = array_search($component, $this->children, true);
        if (is_int($key)) {
            unset($this->children[$key]);
        }
    }
    public function render() {
        echo "<div class='panel'>";
        foreach ($this->children as $child) {
            $child->render();
        }
        echo "</div>";
    }
}

// Classe Button
class Button extends Leaf {
    public function __construct() {
        parent::__construct('button');
    }
}

// Classe TextBox
class TextBox extends Leaf {
    public function __construct() {
        parent::__construct('textbox');
    }
}

// Criação dos elementos de interface do usuário
$panel1 = new Composite();
$panel1->add(new Button());
$panel1->add(new TextBox());

$panel2 = new Composite();
$panel2->add(new Button());
$panel2->add($panel1);

// Exibição dos elementos de interface do usuário
$panel2->render();
?>