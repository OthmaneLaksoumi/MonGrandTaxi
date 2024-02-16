<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'description',
        'taxi_id',
        'payment_method',
    ];

    public function user() {
        return $this->hasOne(User::class,"id");
    }
}
