<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MenuItem extends Model
{
    public function getMenuItems()
    {
        return MenuItem::whereNull('parent_id')->with('children')->get()->toArray();
    }

    /*public function menuItems() {
        return $this->hasMany(MenuItem::class, 'parent_id');
    }*/

    public function children() {
        return $this->hasMany(MenuItem::class, 'parent_id')->with('children');
    }
}
