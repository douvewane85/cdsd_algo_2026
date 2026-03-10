<?php 
require_once __DIR__."/views/CategorieView.php";
require_once __DIR__."/services/CategorieService.php";
require_once __DIR__."/views/ProduitView.php";
require_once __DIR__."/services/ProduitService.php";
require_once __DIR__."/entity/Categorie.php";
require_once __DIR__."/entity/Produit.php";
class App {

    public function __construct() {
    
    }

    public function main(): void {
        $catView = new CategorieView();
        $catService = new CategorieService();
        $prodView= new ProduitView();
        $prodService = new ProduitService();    
        do {    
             echo"1-Creer categorie\n";
             echo"2-Lister les categories\n";
             echo"3-Creer Produis\n";
             echo"4-Lister les produits\n";
             echo"5-Quitter\n";
                $a = readline("Votre choix: ");
             switch ($a) {
                case 1:
                    echo "Creer categorie\n";
                        $categorie = $catView->saisieCategorie();
                        $resultat = $catService->addCategorie($categorie);
                        if($resultat) {
                            echo "Categorie ajoutee\n";
                        }else {
                            echo "Echec de l'ajout de la categorie\n";
                        }

                    break;
                case 2:
                    echo "Lister les categories\n";
                    $cloneCategories = [];
                    $catService->getCategories($cloneCategories);
                    $catView->listerCategories($cloneCategories,$catService->getNombreCategories());
                    break;
                case 3:
                    echo "Creer Produis\n";
                    $cloneCategories = [];
                    $catService->getCategories($cloneCategories);
                    $produit = $prodView->saisieProduit($cloneCategories,$catService->getNombreCategories());
                    $resultat = $prodService->addProduit($produit);
                    if($resultat) {
                        echo "Produit ajoute\n";
                    }else {
                        echo "Echec de l'ajout du produit\n";
                    }
                    break;
                case 4:
                    echo "Lister les produits\n";
                    $cloneProduits = [];
                    $prodService->getProduits($cloneProduits);
                    $prodView->listerProduits($cloneProduits,$prodService->getNombreProduits());
                    break;
                case 5:
                    echo "Quitter\n";
                    exit(0);
                default:
                    echo "Choix invalide\n";
             }
        } while ($a <= 10);
    
}
}

$app = new App();
$app->main();