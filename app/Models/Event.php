<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Attendee;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];    //these attributes are not mass-assignable

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attendees()
    {
        return $this->belongsToMany(Attendee::class);
    }
}
