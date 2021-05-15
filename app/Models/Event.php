<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    /**
     * Get events with workshops
     *
     * @return array
     *
     * @author Kshitij Verma <kshitijverma1012@gmail.com>
     */
    public function getEventsWorkShops()
    {
        return Event::with('Workshops')->get()->toArray();
    }

    /**
     * Get all workshops of particular event
     *
     * @return HasMany
     *
     * @author Kshitij Verma <kshitijverma1012@gmail.com>
     */
    public function Workshops(): HasMany
    {
        return $this->hasMany(Workshop::class);
    }

    /**
     * Get all future events with workshops
     *
     * @return array
     *
     * @author Kshitij Verma <kshitij.verma@shiprocket.com>
     */
    public function getFutureEventsWithWorkshops(): array
    {
        return Event::with('Workshops')->whereHas('Workshops', function ($query){
            $query->where('start', '>', Carbon::today()->toDateString());
        })->get()->toArray();
    }
}
