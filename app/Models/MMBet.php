<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class MMBet extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'mmbet';

    protected $fillable = [
        'id',
        'voucher_id',
        'odd_id',
        'league_name',
        'home',
        'away',
        'bet',
        'rate',
        'amount',
        'result_h',
        'result_a',
        'p_id',
        'playerId',
        'created_at',
        'updated_at',
        'status',

    ];

}
