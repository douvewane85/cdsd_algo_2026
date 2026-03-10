<?php 
class CategorieService {
    private array $categories = [];
    private int $nbreCategories;

    public function __construct() {
        $this->nbreCategories = 0;
    }

    public function addCategorie(Categorie $categorie): bool {
        if($this->nbreCategories <100) {
                          $this->nbreCategories++;
                         $this->categories[$this->nbreCategories] = $categorie;

           return true;
        }else {
            return false;
        }
       
    }
    public function getCategories(array &$cloneCategories): void {
         for($i=1; $i<=$this->nbreCategories; $i++) {
            $cloneCategories[] = $this->categories[$i];
        }
    }
    public function getNombreCategories(): int {
        return $this->nbreCategories;
    }
}