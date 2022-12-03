<?php

namespace App\Models;

use App\Events\IdeaCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    protected $fillable = [
        'message'
    ];

    protected $dispatchesEvents = [
        'created' => IdeaCreated::class,
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
