<?php
    include_once 'test.php';
    
    Class Tyrion extends Lannister
    {
        public function __construct()
        {
            parent::__construct();
            echo "My name is Tyrion\n";
        }
        public function getSize()
        {
            return "Short";
        }
    }

?>