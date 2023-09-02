<?php

namespace App\Src\Entities;


abstract class Entity{

    protected $attributes;
     public function __construct($attributes){
        $this->attributes = $attributes;
     }


     public function getAttributes(){
        return $this->attributes;
       }
    
       public  function getId(){
        return $this->attributes['id'];
       }


     

}