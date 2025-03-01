<?php
include "../model";
include "../html";
class Controller {
    protected $view;
    protected $model;

    public function __construct($view = null, $model = null) {
        $this->view = $view;
        $this->model = $model;
    }

    public function cargaModelo() {}
}