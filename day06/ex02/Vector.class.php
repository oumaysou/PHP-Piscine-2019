<?php

require_once 'Color.class.php';
require_once 'Vertex.class.php';

class Vector extends Vertex
{
    private $_x;
    private $_y;
    private $_z;
    private $_w = 0.00;
    static $verbose = False;

    function __construct($tab) 
    {
        /*Verifier que $tab['dest'] est un objet de la class Vertex */
        if (isset($tab['dest']) && !empty($tab['dest']) && $tab['dest'] instanceof Vertex) 
        {
            if (isset($tab['orig']) && !empty($tab['orig']) && $tab['orig'] instanceof Vertex) 
            {
                /*Utiliser le getteur pour recuperer les proprietes ORIG*/
                $x0 = $tab['orig']->get_x();
                $y0 = $tab['orig']->get_y();
                $z0 = $tab['orig']->get_z();
            } 
            else 
            {
                $x0 = 0.00;
                $y0 = 0.00;
                $z0 = 0.00;
                $w0 = 1.00;
            }
            $this->_x = $tab['dest']->get_x() - $x0;
            $this->_y = $tab['dest']->get_y() - $y0;
            $this->_z = $tab['dest']->get_z() - $z0;
        }
        if (self::$verbose) 
        {
            /*failli oublier XD XD */
            if (parent::$verbose)
            {
                $new = new Vertex(array('x'=>0.00, 'y'=> 0.00, 'z' => 0.00));
                $new->__toString();
            }
            echo $this->__toString() . " constructed\n";
        }
    }
    function __toString() {
        // if (self::$verbose) 
             return (vsprintf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f )", array($this->_x, $this->_y, $this->_z, $this->_w)));
            // return (parent::__toString());
    }
    function get_x() {
        return $this->_x;
    }
    function get_y() {
        return $this->_y;
    }
    function get_z() {
        return $this->_z;
    }
    function get_w() {
        return $this->_w;
    }
    /*Magnitude permet d'avoir une idee sur la taille de l'objet mathematique */
    /*https://www.mathsisfun.com/algebra/vectors.html*/
    public function magnitude() 
    {
        return sqrt(pow($this->_x, 2) + pow($this->_y, 2) + pow($this->_z, 2));
    }
    /*Normaliser un vecteur */
    /*https://fr.wikihow.com/normaliser-un-vecteur => 3*/
    public function normalize() 
    {
        if ($this->magnitude() == 1.00) 
        {
            return (new Vector(array('orig' => $tab['orig'], 'dest' => $tab['dest'])));
        } 
        else 
        {   /*On divise par la magnitude pour normaliser*/
            $v0 = new Vertex(array('x' => 0.00, 'y' => 0.00, 'z' => 0.00));
            $v1 = new Vertex(array('x' => $this->_x / $this->magnitude(), 'y' => $this->_y / $this->magnitude(), 'z' => $this->_z / $this->magnitude()));
            return (new Vector(array('orig' => $v0, 'dest' => $v1)));
        }
    }
    public function add(Vector $rhs) 
    {
        $v0 = new Vertex(array('x' => 0.00, 'y' => 0.00, 'z' => 0.00));
        $v1 = new Vertex(array('x' => $this->_x + $rhs->get_x(), 'y' => $this->_y + $rhs->get_y(), 'z' => $this->_z + $rhs->get_z()));
        return (new Vector(array('orig' => $v0, 'dest' => $v1)));
    }
    public function sub(Vector $rhs) 
    {
        $v0 = new Vertex(array('x' => 0.00, 'y' => 0.00, 'z' => 0.00));
        $v1 = new Vertex(array('x' => $this->_x - $rhs->get_x(), 'y' => $this->_y - $rhs->get_y(), 'z' => $this->_z - $rhs->get_z()));
        return (new Vector(array('orig' => $v0, 'dest' => $v1)));
    }
    public function opposite() 
    {
        $v0 = new Vertex(array('x' => 0.00, 'y' => 0.00, 'z' => 0.00));
        $v1 = new Vertex(array('x' => -$this->_x, 'y' => -$this->_y, 'z' => -$this->_z));
        return (new Vector(array('orig' => $v0, 'dest' => $v1)));
    }
    public function scalarProduct($k) 
    {
        $v0 = new Vertex(array('x' => 0.00, 'y' => 0.00, 'z' => 0.00));
        $v1 = new Vertex(array('x' => $this->_x * $k, 'y' => $this->_y * $k, 'z' => $this->_z * $k));
        return (new Vector(array('orig' => $v0, 'dest' => $v1)));
    }
    /*https://www.mathsisfun.com/algebra/vectors-dot-product.html*/
    //le produit est un scalar
    public function dotProduct(Vector $rhs) 
    {
        return ($this->_x * $rhs->get_x() + $this->_y * $rhs->get_y() + $this->_z * $rhs->get_z());
    }
    /* cos = dotproduct / magnitude */
    public function cos(Vector $rhs) 
    {
        return ($this->dotProduct($rhs) / ($this->magnitude() * sqrt(pow($rhs->get_x(), 2) + pow($rhs->get_y(), 2) + pow($rhs->get_z(), 2))));
    }
    //lE produit est un vecteur
    public function crossProduct(Vector $rhs) 
    {
        $v0 = new Vertex(array('x' => 0.00, 'y' => 0.00, 'z' => 0.00));
        $v1 = new Vertex(array('x' => $this->_y * $rhs->get_z() - $this->_z * $rhs->get_y(), 'y' => $this->_z * $rhs->get_x() - $this->_x * $rhs->get_z(), 'z' => $this->_x * $rhs->get_y() - $this->_y * $rhs->get_x()));
        return (new Vector(array('orig' => $v0, 'dest' => $v1)));
    }
    static function doc() 
    {
        echo file_get_contents("Vector.doc.txt");
    }
    function __destruct () 
    {
        if (self::$verbose) {
            echo $this->__toString() . " destructed\n";
        }
    }
}
?>