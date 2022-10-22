<?php

class Voiture
{

    private string $marque;
    private string $couleur;
    private string $immatriculation;
    private int $nbSieges; // Nombre de places assises

    // un getter
    public function getMarque(): string
    {
        return $this->marque;
    }

    // un setter
    public function setMarque($marque)
    {
        $this->marque = $marque;
    }

    // un constructeur
    public function __construct(
        $marque,
        $couleur,
        $immatriculation,
        $nbSieges
    )
    {
        $this->marque = $marque;
        $this->couleur = $couleur;
        $this->immatriculation = $immatriculation;
        $this->nbSieges = $nbSieges;
    }

    public function getCouleur()
    {
        return $this->couleur;
    }

    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;
    }

    public function afficher()
    {
        echo "
        $this->marque 
        $this->couleur 
        $this->immatriculation 
        $this->nbSieges";
    }

    public static function construire(array $voitureFormatTableau) : Voiture {
        $voiture = new Voiture($voitureFormatTableau['marque'],$voitureFormatTableau['couleur'], $voitureFormatTableau['immatriculation'],$voitureFormatTableau['nbSieges']);
        return $voiture;
    }

    public static function getVoitures(): array{
        $pdoStatement = Model::getPdo()->query('SELECT * FROM voiture');

        $voitureFormatTableau = $pdoStatement->fetch();
        //var_dump($voitureFormatTableau);
        $tableau[] = Voiture::construire($voitureFormatTableau);
        foreach($pdoStatement as $voitureFormatTableau){
            $tableau[] = Voiture::construire($voitureFormatTableau);;
        }
        return $tableau;
    }

}
$marque = 'vroum';
$couleur = 'oui-oui';
$immatriculation = '69';
$nbSieges = 2;
$test = new Voiture($marque,$couleur,$immatriculation,$nbSieges);
//echo $test->afficher();
?>
