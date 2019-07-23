<?php
abstract class Fighter
{
    abstract public function fight($target);

    public function __construct($soldier)
    {
        $this->soldier_type = $soldier;
    }
    //Getteur pour envoyer le type aux classes filles
    public function getType()
    {
        return ($this->soldier_type);
    }
}
?>