<?php

    Class Color
    {
        
        public static $verbose = FALSE;
        public $red;
        public $green;
        public $blue;

        function __construct($tab)
        {
            if (isset($tab['rgb']))
            {
                $this->red = intval($tab['rgb']) >> 16 & 0xff;
                $this->green = intval($tab['rgb']) >> 8 & 0xff;
                $this->blue = intval($tab['rgb']) & 0xff;
            }
            else
            {
                $this->red = intval($tab['red']);
                $this->green = intval($tab['green']);
                $this->blue = intval($tab['blue']);
            }
           /*Self permet d'acceder au proprietes statiques de la meme classe*/
            if (self::$verbose) 
            {
                echo $this->__toString() . " constructed.\n";
            }
        }

        function __destruct () 
        {
            if (self::$verbose) 
            {
                echo $this->__toString() . " destructed.\n";
            }
        }

        function __toString() 
        {
            /*Formatage pour afficher les couleurs */
            return (vsprintf("Color( red: %3d, green: %3d, blue: %3d )", array($this->red, $this->green, $this->blue)));
        }

        static function doc()
        {
            echo file_get_contents("Color.doc.txt");
        }
        public function add ($color) 
        {
            return (new Color(array('red' => $this->red + $color->red, 'green' => $this->green + $color->green, 'blue' => $this->blue + $color->blue)));
        }

        public function sub ($color) 
        {
            return (new Color(array('red' => $this->red - $color->red, 'green' => $this->green - $color->green, 'blue' => $this->blue - $color->blue)));
        }

        public function mult ($mult) 
        {
            return (new Color(array('red' => $this->red * $mult, 'green' => $this->green * $mult, 'blue' => $this->blue * $mult)));
        }
    }
?>