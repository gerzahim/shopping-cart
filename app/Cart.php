<?php

namespace ShopCart;
use Session;

class Cart 
{
    public $items = null;
    public $totalQty =0;
    public $totalPrice =0;
    public $shippingCost =0;
    public $taxCost =0;    
    public $totalCost =0;

    public function __construct($oldCart)
    {
    	if($oldCart){
    		$this->items = $oldCart->items;
    		$this->totalQty = $oldCart->totalQty;
    		$this->totalPrice = $oldCart->totalPrice;
            $this->shippingCost = $oldCart->shippingCost;
            $this->taxCost = $oldCart->taxCost;
            $this->totalCost = $oldCart->totalCost;
    	}
    }

    public function add($item, $id){
    	$storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item, 
        'avail' => $item['quantity'] ];
    	
        
        if ($this->items) {
    		if (array_key_exists($id, $this->items)) {
    			$storedItem = $this->items[$id];
    		}
    	}

        $storedItem['avail']--;
        if ($storedItem['avail'] == -1) {
           //DD('Cant get more than this');
           Session::flash('alert-danger', 'Add to Cart Failed! , no more this item available for sale');
           $storedItem['avail']++;
        }else{
            $storedItem['qty']++;
            $storedItem['price'] = $item->price * $storedItem['qty'];
            $this->items[$id] = $storedItem;
            $this->totalQty++;
            $this->totalPrice += $item->price;                    
        }

    }




    public function addTaxCost($totalPrice, $taxCost){

        $this->taxCost = $taxCost;
        $this->totalCost = $totalPrice + $taxCost;

    }      

    public function addShippingCost($totalPrice, $shippingCost){

        $this->shippingCost = $shippingCost;
        $this->totalCost = $totalPrice + $shippingCost;
    }    

    public function reduceByOne($id){

        $this->items[$id]['avail']++;
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];

        if ($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]);
        }
    }

    public function removeItem($id){
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);        

    }

    public function setQtyItem($item, $id, $qty){
        

        //dd($this->totalQty);
        //dd($this->totalPrice);

        //Delete from qty 

        //dd($this->items[$id]['qty']);
        //$this->totalQty = $this->totalQty - $this->items[$id]['qty'];
        $this->totalQty = $this->totalQty - $this->items[$id]['qty'];
        $this->totalQty = $this->totalQty + $qty;
        
        //$this->totalPrice = $this->totalPrice - ($this->items[$id]['price']*$this->items[$id]['qty'] );

        $this->totalPrice = $this->totalPrice - $this->items[$id]['price'];
        $this->totalPrice = $this->totalPrice + ($item->price*$qty);

        unset($this->items[$id]);

        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item, 
        'avail' => $item['quantity'] ];
        
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }

        //dd($storedItem);

        //$storedItem['avail']--;
        $storedItem['avail'] = $storedItem['avail'] - $qty;


        if ($storedItem['avail'] < 0) {
           //DD('Cant get more than this');
           //Session::flash('alert-danger', 'Add to Cart Failed! , no more this item available for sale');
           $storedItem['avail'] = $storedItem['avail'] + $qty;
        }else{


            $storedItem['qty'] = $qty;

            $storedItem['price'] = $item->price * $storedItem['qty'];

            $this->items[$id] = $storedItem;

            //$this->totalQty++;
            //$this->totalQty = $this->totalQty + $qty;
            //$this->totalPrice += $item->price; 
                               
            //$this->totalPrice = $this->totalPrice + $storedItem['price'];   
            //dd($this->totalPrice); 
            //dd($this->totalPrice);                 
        }

    }       


}
