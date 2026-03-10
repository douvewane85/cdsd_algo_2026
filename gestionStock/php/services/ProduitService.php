<?php 
require_once dirname(__DIR__)."/entity/Produit.php";
class ProduitService {
    private array $produits = [];
    private int $nbreProduits;

    public function __construct() {
        $this->nbreProduits = 0;
    }

    public function addProduit(Produit $produit): bool {
        if($this->nbreProduits <100) {
             $this->nbreProduits++;
           $this->produits[$this->nbreProduits] = $produit;
           return true;
        }else {
            return false;
        }
       
    }
    public function getProduits(array &$cloneProduits): void {
         for($i=1; $i<=$this->nbreProduits; $i++) {
            $cloneProduits[] = $this->produits[$i];
        }
    }
    public function getNombreProduits(): int {
        return $this->nbreProduits;
    }
}