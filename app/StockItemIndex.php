<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockItemIndex extends Model
{
    protected $guarded=[];

    // relation with inventory item
    public function inventoryitem()
    {
        return $this->hasOne('App\InventoryItem','id','items_id');
    }
    // relation with category

    public function category()
    {
        return $this->hasOne('App\InventoryCategory','id','category_id');
    }

    // relation with supplier

    public function supplier()
    {
        return $this->hasOne('App\ItemSupplier','id','supplier_id');
    }

    // relation with store

    public function store()
    {
        return $this->hasOne('App\Item','id','store_id');
    }

    // date field
    
    protected $dates = [
        'data',
    ];

    
}
