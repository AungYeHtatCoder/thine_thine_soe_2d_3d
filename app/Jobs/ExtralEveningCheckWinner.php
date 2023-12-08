<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\Admin\Lottery;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ExtralEveningCheckWinner implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
     protected $twodWiner;

    public function __construct($twodWiner)
    {
        $this->twodWiner = $twodWiner;
    }

    public function handle()
    {
       $today = Carbon::today();
    $playDays = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday'];
    if (!in_array(strtolower(date('l')), $playDays)) {
        return; // exit if it's not a playing day
    }
       
        $winningEntries = DB::table('lottery_two_digit_copy')
        ->join('lotteries', 'lottery_two_digit_copy.lottery_id', '=', 'lotteries.id')
        ->join('two_digits', 'lottery_two_digit_copy.two_digit_id', '=', 'two_digits.id')
        ->whereRaw('two_digits.two_digit = ?', [$this->twodWiner->prize_no])
        ->whereRaw('lottery_two_digit_copy.prize_sent = 0')
        ->whereRaw('DATE(lottery_two_digit_copy.created_at) = ?', [$today])
        ->select('lottery_two_digit_copy.*') // Select all columns from pivot table
        ->get();

        foreach ($winningEntries as $entry) {
        DB::transaction(function () use ($entry) {
            // Retrieve the lottery for this entry
            $lottery = Lottery::findOrFail($entry->lottery_id);
            $user = $lottery->user;
                $user->balance += $entry->sub_amount * 85; // Assuming the prize multiplier is 85
                $user->save();
            $methodToUpdatePivot = 'twoDigits';
            // Update prize_sent in pivot
            $lottery->$methodToUpdatePivot()->updateExistingPivot($entry->two_digit_id, ['prize_sent' => 1]);
        });
    }
    }

}