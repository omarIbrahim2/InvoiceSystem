<?php

namespace App\Src\Repositories;

use App\Models\Product;
use App\Src\Entities\ProductEntity;
use App\Src\Interfaces\ProductRepoInterface;


class ProductRepo implements ProductRepoInterface{

    public function create(ProductEntity $product ){

        return Product::create($product->getAttributes());
    }

    public function getProducts( $pages , ...$attrs){
      if ($pages == 0) {
        return Product::select(...$attrs)->get();
      }
      return  Product::select(...$attrs)->paginate($pages);
    }
}