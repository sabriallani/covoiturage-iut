<?php
class VilleManager {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function add($ville) {
        $requete = $this->db->prepare("INSERT INTO ville VALUES (vil_nom) VALUES (:nom);");
        $requete->bindValue(':nom', $ville->getVilNom());

        $retour = $requete->execute();

        return $retour;
    }

    public function getAllVille() {
        $listeVilles = array();
        $sql = "SELECT vil_num, vil_nom FROM ville ORDER BY vil_nom";
        $requete = $this->db->prepare($sql);
        $requete->execute;

        while ($produit = $requete->fetch(PDO::FETCH_ASSOC)) {
            $listVilles[] = new Ville($ville);
        }

        $requete->closeCursor();

        return $listeVilles;
    }
}