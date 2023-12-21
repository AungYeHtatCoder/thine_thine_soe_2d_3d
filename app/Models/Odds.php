<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Odds extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sport_id',
        'sport_name',
        'last_call',
        'event_id',
        'league_id',
        'league_name',
        'starts',
        'home',
        'away',
        'event_type',
        'is_have_odds',
        'money_line_h',
        'money_line_a',
        'money_line_d',
        'spreads_p',
        'spreads_h',
        'spreads_a',
        'totals_point',
        'over',
        'under',
        'created_at',
        'updated_at',
        'status',

    ];

}
