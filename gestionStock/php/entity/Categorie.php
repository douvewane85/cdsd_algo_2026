<?php 
require_once dirname(__DIR__)."/entity/Produit.php";
class Categorie {
    private int $code;
    private string $nom;

    private array $produits = [];
    private int $nbreProduits ;

    public function __construct() {
        $this->nbreProduits = 0;
    }

    public function getCode(): int {
        return $this->code;
    }
    public function getProduits(array &$cloneProduits): void {
         for($i=1; $i<=$this->nbreProduits; $i++) {
            $cloneProduits[] = $this->produits[$i];
        }
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
    public function getNom(): string {
        return $this->nom;
    }
    public function setCode(int $code): void {
        if($code <= 0) {
            throw new Exception("Le code de la catégorie doit être un entier positif.");
        }
           $this->code = $code;
        
    }
    public function setNom(string $nom): void {
            if($nom=="") {
                throw new Exception("Le nom de la catégorie ne peut pas être vide.");
            }
           $this->nom = $nom;
    }

    public function toChaine(): string {
        return "Code=$this->code, nom='$this->nom'";
    }
    
}