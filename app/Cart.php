<?php

namespace App;

class Cart
{
     public $items=null;
     public $totalQty=0;
     public $totalPrice=0;
     public $mealQty=0;

     public function __construct($oldCart)
     {
         if ($oldCart) {
             $this->items = $oldCart->items;
             $this->totalPrice = $oldCart->totalPrice;
             $this->totalQty = $oldCart->totalQty;
         }
     }
     public function add($item,$id,$mealQty)
     {
       $storedItem=['qty'=>0, 'price'=>$item->price, 'item'=>$item];
      if($this->items)
      {
          if(array_key_exists($id,$this->items))
          {
           $storedItem=$this->items[$id];
          }
      }
      $storedItem['qty']+=$mealQty;
      $storedItem['price']=$item->price * $storedItem['qty'];
      $this->items[$id]=$storedItem;
      $this->totalQty+=$mealQty;
      $this->totalPrice+=$storedItem['price'];
     }
}
