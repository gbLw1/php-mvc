<?php

require './CompositeModel.php';

class AlunoModel extends CompositeModel {
  public function __construct() {
    parent::__construct();
  }

  public function save() {
    // implementar persistência
  }
}