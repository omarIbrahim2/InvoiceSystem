<?php

namespace App\Src\Interfaces;

use App\Src\Entities\ProductEntity;

interface ProductRepoInterface{

    public function create(ProductEntity $Product);

    public function getProducts(  $pages ,...$attrs);

    
}