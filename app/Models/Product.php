<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cart;
class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    
    /**
     * numberDecimalCases - Define o numero de casas decimais
     *
     * @var int
     */
    private $numberDecimalCases = 2;
    
    /**
     * defaultMonetaryUnit - Define o simbolo padrao para o valor monetario
     *
     * @var string
     */
    private $defaultMonetaryUnit = 'R$';

    /**
     * Retorna o valor monetario formatado
     *
     * @return string
     */
    public function getFormattedPrice() : String {
        return $this->defaultMonetaryUnit.' '. number_format($this->getPrice(), $this->numberDecimalCases, ',', '.');
    }

    /**
     * Retorna o valor monetario sem formatacao
     * 
     * @return float
     */
    public function getPrice() : float {
        $price = $this->regular_price;
        if($this->sale_price != null) {
            $price = $this->sale_price;
        }
        return $price;
    }

    /**
     * getImage - Retorna o valor monetario sem formatacao
     */
    public function getImage(){
        //TODO: obter imagem do banco de dados

        return $this->image;
    }

}
