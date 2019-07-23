<?php
class UnholyFactory
{
    public $tab = array();
    /*BOUCLER les 1-5 */
    public function absorb($inst)
    {
        /*Le type doit etre recupere depuis le requested_fighters "$rf" et qu'on passe a fabricate */
        if ($inst instanceof Fighter) {
            
            if (in_array($inst, $this->tab)) {
                echo "(Factory already absorbed a fighter of type " . $inst->getType() . ")\n";
            } 
            /*1ere fois le TAB est vide du coup on afficher la 1ere sortie */
            else {
                /*On recupere la classe dans tab qu'on utilisera ds fabricate*/
                $this->tab[get_class($inst)] = $inst;
                echo "(Factory absorbed a fighter of type " . $inst->getType() . ")\n";
            }
        } 
        /*Llama n'est pas fille de Figther - 5eme ligne sur sortie */
        else {
            echo "(Factory can't absorb this, it's not a fighter)\n";
        }

    }
    /*BOUCLER de 6-13*/
    /*Fabricate va recevoir les requested_fighters puis stocker dans $f */
    public function fabricate($rf)
    {
        foreach ($this->tab as $key => $value) {
            if ($value->getType() == $rf) {
                /*Garder copie de l'objet */
                $fighter = clone $this->tab[$key];
                echo "(Factory fabricates a fighter of type " . $rf . ")\n";
                return $fighter;
            }
        }
        echo "(Factory hasn't absorbed any fighter of type " . $rf . ")\n";
    }
}
?>