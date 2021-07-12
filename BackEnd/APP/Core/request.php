<?php
namespace App\Core;

class request{
    private $data = [];
    public function __construct($data = []){
        $this->data = $data;
    }

    public function get($key, $default = null){
        return $this->has($key) ? $this->data[$key] : $default;
    }

    public function has($key){
        return isset($this->data[$key]);
    }
    
    public function __get($key){
        return $this->has($key) ? $this->data[$key] : null;
    }

    public function __set($key, $value){
        $this->data[$key] = $value;
    }

}