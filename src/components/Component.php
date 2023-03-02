<?

abstract class Component {
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    abstract public function add(Component $component);
    abstract public function remove(Component $component);
    abstract public function display();
}