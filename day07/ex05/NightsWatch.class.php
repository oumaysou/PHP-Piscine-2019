<?php
class NightsWatch implements IFighter
{
    private $_team = array();
    public function recruit($character)
    {
        //Stocker les instanc 
        $this->_team[] = $character;
    }
    public function fight()
    {
        //Affichage SI fight exist
        foreach ($this->_team as $char) {
            if (method_exists($char, 'fight')) {
                $char->fight();
            }
        }
    }
}
?>