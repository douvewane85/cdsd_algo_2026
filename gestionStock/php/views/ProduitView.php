<?php 
class ProduitView {
    public function __construct() {
        
    }

    public function saisieProduit(array $categories, int $nbreCategories): Produit {
        $code = readline("Code: ");
        $libelle = readline("Libelle: ");
        $prix = readline("Prix: ");
        $qteStock = readline("Quantité en stock: ");
        //Selectionner la catégorie du produit
        do{
           for($i=0; $i<$nbreCategories; $i++) {
               echo "$i. {$categories[$i]->toChaine()}\n";
           }
           $categorieId = readline("Choisissez la catégorie (entrez le numéro): ");
         }while($categorieId < 1 || $categorieId > $nbreCategories);
         $categorie = $categories[$categorieId];
        $produit = new Produit();
        $produit->setCode($code);
        $produit->setLibelle($libelle);
        $produit->setPrix($prix);
        $produit->setQteStock($qteStock);

        //Association du produit--> categorie
        $produit->setCategorie($categorie);
        //Association de la categorie-->produit
        $categorie->addProduit($produit);
        return $produit;
    }

    public function listerProduits(array $produits,int $nbreProduits): void {
        for($i=0; $i<$nbreProduits; $i++) {
            echo $produits[$i]->toChaine()."\n";
        }
    }
}