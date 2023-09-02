<?php

namespace App\Src\Interfaces;

use App\Src\Entities\CustomerEntity;

interface CustomerRepoInterface{

    public function create(CustomerEntity $Customer);

    public function getCustomers( $pages  ,...$attrs);
}