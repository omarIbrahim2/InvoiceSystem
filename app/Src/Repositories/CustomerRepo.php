<?php

namespace App\Src\Repositories;

use App\Models\Customer;
use App\Src\Entities\CustomerEntity;
use App\Src\Interfaces\CustomerRepoInterface;


class CustomerRepo implements CustomerRepoInterface{

    public function create(CustomerEntity $Customer ){
       
        return Customer::create($Customer->getAttributes());
    }

    public function getCustomers(...$attrs){
      return  Customer::select(...$attrs)->paginate(5);
    }
}