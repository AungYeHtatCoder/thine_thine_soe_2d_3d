<?php

namespace App\Http\Controllers\Admin\ThreeD;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\ThreeDigit\Lotto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\ThreeDigit\ThreeWinner;

class ThreeDRecordHistoryController extends Controller
{
    public function index()
    {
        
        
        $today = Carbon::now();
        // Determine whether to look for the 1st or the 16th of the current month
        $targetDay = $today->day <= 15 ? 1 : 16;

        // Retrieve match time for the target day of the current month
        $matchTime = DB::table('threed_match_times')
        ->whereMonth('match_time', '=', $today->month) // Filter for current month
        ->whereYear('match_time', '=', $today->year) // Filter for current year
        ->whereDay('match_time', '=', $targetDay) // Filter for 1st or 16th day
        ->first(); // Use first() to get a single record
        // $query = DB::table('threed_match_times')
        //     ->whereMonth('match_time', '=', $today->month)
        //     ->whereYear('match_time', '=', $today->year)
        //     ->whereDay('match_time', '=', $targetDay)
        //     ->toSql();

        // Log::info($query);

        $lotteries = Lotto::with(['threedDigits', 'lotteryMatch.threedMatchTime'])->orderBy('id', 'desc')->get();
        $prize_no = ThreeWinner::whereDate('created_at', Carbon::today())->orderBy('id', 'desc')->first();
        return view('admin.three_d.v_1_three_d_history', compact('lotteries', 'prize_no', 'matchTime'));
    }
//     public function index()
// {
//     $lotteries = Lotto::with('threedDigits')->orderBy('id', 'desc')->get();
//     $prize_no = ThreeWinner::whereDate('created_at', Carbon::today())->orderBy('id', 'desc')->first();
//     return view('admin.three_d.three_d_history', compact('lotteries', 'prize_no'));
// }

public function show(string $id)
    {
        $lottery = Lotto::with('threedDigits')->findOrFail($id);
        $prize_no = ThreeWinner::whereDate('created_at', Carbon::today())->orderBy('id', 'desc')->first();
        return view('admin.three_d.three_d_history_show', compact('lottery', 'prize_no'));
    }

}