<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function getEventsWorkShops()
    {
        return Event::with('Workshops')->get()->toArray();
    }

    public function Workshops(){
        return $this->hasMany(Workshop::class);
    }
}
