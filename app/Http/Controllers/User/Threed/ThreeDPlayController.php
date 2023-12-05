<?php

namespace App\Http\Controllers\User\Threed;

use Illuminate\Http\Request;
use App\Models\Admin\LotteryMatch;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ThreeDigit\ThreeDigit;

class ThreeDPlayController extends Controller
{
    public function index()
    {
        return view('three_d.index');
    }
    // threed play
    public function choiceplay()
    {
        $threeDigits = ThreeDigit::all();

    // Calculate remaining amounts for each two-digit
    $remainingAmounts = [];
    foreach ($threeDigits as $digit) {
        $totalBetAmountForTwoDigit = DB::table('lotto_three_digit_pivot')
            ->where('three_digit_id', $digit->id)
            ->sum('sub_amount');

        $remainingAmounts[$digit->id] = 50000 - $totalBetAmountForTwoDigit; // Assuming 5000 is the session limit
    }
    $lottery_matches = LotteryMatch::where('id', 2)->whereNotNull('is_active')->first();

    return view('three_d.three_d_choice_play', compact('threeDigits', 'remainingAmounts', 'lottery_matches'));
        //return view('three_d.three_d_choice_play');
    }
    public function confirm_play()
    {
        $threeDigits = ThreeDigit::all();

    // Calculate remaining amounts for each two-digit
    $remainingAmounts = [];
    foreach ($threeDigits as $digit) {
        $totalBetAmountForTwoDigit = DB::table('lotto_three_digit_pivot')
            ->where('three_digit_id', $digit->id)
            ->sum('sub_amount');

        $remainingAmounts[$digit->id] = 50000 - $totalBetAmountForTwoDigit; // Assuming 5000 is the session limit
    }
    $lottery_matches = LotteryMatch::where('id', 2)->whereNotNull('is_active')->first();

    return view('three_d.play_confirm', compact('threeDigits', 'remainingAmounts', 'lottery_matches'));
        //return view('three_d.three_d_choice_play');
    }

    
}