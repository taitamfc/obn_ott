<?php
    class Shape{
        public string $name;
        public function __construct($ts_name){
            $this->name = $ts_name;
        }
        public function showName(){
            return $this->name;
        }
    }