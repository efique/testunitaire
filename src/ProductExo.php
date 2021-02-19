<?php

namespace App;

use LogicException;

class ProductExo
{
    /** @var int */
    private $qteCommande;
    /** @var float */
    private $prixUnitaire;
    /** @var float */
    private $totalProduit;
    
    public function __construct(int $qteCommande, float $prixUnitaire)
    {
        $this->qteCommande = $qteCommande;
        $this->prixUnitaire = $prixUnitaire;
        $this->totalProduit = $prixUnitaire * $qteCommande;
    }

    public function calculRemise()
    {
        $port = 0;
        $remise = 0;
        
        if($this->totalProduit < 0) {
            throw new LogicException('le prix ne peut pas être négatif');
        }
        if ($this->totalProduit <= 500) {
            $port = 0.02 * $this->totalProduit;
            if($port < 6) {
                $port = 6;
            }
        }
        if ($this->totalProduit >= 100 &&  $this->totalProduit <= 200){
            $remise = 0.05 * $this->totalProduit;
        } else if ($this->totalProduit > 200) {
            $remise = 0.1 * $this->totalProduit;
        }

        return [(float)($this->totalProduit - $remise + $port), $remise, $port];
    }
}