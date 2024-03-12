<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Appointment extends Model
{
    protected $fillable = ["user_id", "attendance", "date", "time"];

    public function user(): HasOne
    {
        return $this->hasOne(User::class, "id", "user_id");
    }
}
