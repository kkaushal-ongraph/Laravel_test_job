<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectedItem extends Model {

    use HasFactory;

    protected $table = 'selected_item';
    protected $fillable = ['item_id'];

    public function getItem() {
        return $this->hasOne('App\Models\Item', 'id', 'item_id');
    }

}
