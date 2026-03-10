<?php 
require_once dirname(__DIR__)."/entity/Categorie.php";
class Produit {
    private int $code;
    private string $libelle;
    private float $prix;
    private int $qteStock;
    //Many to one
    private Categorie $categorie;

    public function __construct() {
        
    }

    public function getCode(): int {
        return $this->code;
    }
    public function getLibelle(): string {
        return $this->libelle;
    }
    public function getPrix(): float {
        return $this->prix;
    }
    public function getQteStock(): int {
        return $this->qteStock;
    }
    public function getCategorie(): Categorie {
        return $this->categorie;
    }
    public function setCode(int $code): void {
        $this->code = $code;
    }
    public function setLibelle(string $libelle): void {
        $this->libelle = $libelle;
    }
    public function setPrix(float $prix): void {
        $this->prix = $prix;
    }
    public function setQteStock(int $qteStock): void {
        $this->qteStock = $qteStock;
    }
    public function setCategorie(Categorie $categorie): void {
        $this->categorie = $categorie;
    }

    public function toChaine(): string {
        return "Code=$this->code, libelle='$this->libelle', prix=$this->prix, Categorie={$this->categorie->getNom()}";
    }
    
}