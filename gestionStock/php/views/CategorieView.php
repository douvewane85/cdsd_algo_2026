<?php 
require_once dirname(__DIR__)."/entity/Categorie.php";
class CategorieView {
    public function __construct() {
        
    }

    public function saisieCategorie(): Categorie {
        
        $code = readline("Code: ");
        $nom = readline("Nom: ");
        $categorie = new Categorie();
        $categorie->setCode($code);
        $categorie->setNom($nom);
        return $categorie;
    }

    public function listerCategories(array $categories,int $nbreCategories): void {
       
      for($i=0; $i<$nbreCategories; $i++) {

            echo $categories[$i]->toChaine()."\n";
        }
    }
}