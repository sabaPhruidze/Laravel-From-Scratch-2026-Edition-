<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// Model არის PHP class, რომელიც Laravel-ში database table-ს უკავშირდება.
class Idea extends Model
{
    protected $guarded = []; //Mass Assignment Protection
    // არცერთი ველი არ არის დაცული და ყველა
    //column-ის შევსება შეიძლება create() ან update() მეთოდით.
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
