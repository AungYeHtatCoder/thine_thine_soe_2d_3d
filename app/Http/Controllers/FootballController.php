<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use App\Repository\IPlayerRepository;
use App\Repository\IFootballRepository;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use App\Models\Odds;
use App\Models\MMBet;
use App\Models\AsiaBet;
use App\Models\MixBet;
use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Log;
use PDOException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FootballController extends Controller
{
    public $player;
    public $football;

    public static function checkPlayer()
    {
        if (Session::get('player') == null) {
            return false;
        } else {
            return true;
        }
    }
    public function checkAvailableOdds($odd_id)
    {
        if (DB::table('odds')->find($odd_id)->status == 1) {
            return true;
        } else {
            return false;
        }
    }
    public function PreMatch()
    {
        $oddData = $this->football->getPreMatch();
        $leagueData = $this->football->getLeague();
        return view('/pre-match')->with(['oddData' => $oddData, 'leagueData' => $leagueData]);
    }



    public function mmOddBet(Request $requestData)
    {
        $user = Auth::user();
        if ($user != null) {

            if ($this->checkAvailableOdds($requestData->odd_id) == false) {
                return response()->json(array('resCode' => (int)'999', 'resDesc' => 'ပွဲချိန် ကျော်လွန်သွားပါသည်။'));
            }
            $user->balance -= $requestData->amount;

            if ($user->balance < 0) {
                return response()->json(array('resCode' => (int)'999', 'resDesc' => 'ယူနစ်မလောက်ပါသဖြင့် ဖြည့်သွင်းပေးပါ။'));
            }

            $mmbet = new MMBet();
            $mmbet->voucher_id = Carbon::now()->format('Y') . Carbon::now()->format('m') . Carbon::now()->format('d') . '_f_' . str_pad(random_int(99, 999), 3, "0", STR_PAD_LEFT);

            $mmbet->odd_id = $requestData->odd_id;
            $mmbet->league_name = $requestData->league_name;
            $mmbet->home = $requestData->home;
            $mmbet->away = $requestData->away;
            $mmbet->bet = $requestData->bet;
            $mmbet->rate = $requestData->rate;
            $mmbet->amount = $requestData->amount;
            $mmbet->p_id = $user->id;
            $mmbet->playerId = $user->id;
            $mmbet->created_at = Carbon::now();
            $mmbet->updated_at = Carbon::now();
            $mmbet->status = 1;
            try {
                DB::beginTransaction();
                $mmbet->save();

                DB::statement("UPDATE users SET balance = balance -" . $mmbet->amount . " where id = " . $user->id);
                DB::commit();

                return response()->json(array('resCode' => (int)'200', 'resDesc' => $mmbet->home . ' vs ' . $mmbet->away . '(' . $mmbet->rate . ') ပွဲတွင် ' . config('app.BetType')[$mmbet->bet] . ' လောင်းခဲ့ပါသည်။'));
            } catch (ConnectionException $ex) {
                Log::error($ex);
                return response()->json(array('resCode' => (int)'400', 'resDesc' => 'Bad Request'));
            } catch (Exception $ex) {
                Log::error($ex);
                return response()->json(array('resCode' => (int)'500', 'resDesc' => 'Internal Server Error'));
            } catch (PDOException $e) {
                return response()->json(array('resCode' => (int)'502', 'resDesc' => 'Database Server Error'));
            }
        } else {
            return response()->json(array('resCode' => (int)'401', 'resDesc' => 'Please Login.'));
        }
    }
    public function mixparlayBet(Request $requestData)
    {
        $user = Auth::user();
        if ($user != null) {


            $user->balance -= $requestData->amount;

            if ($user->balance < 0) {
                return response()->json(array('resCode' => (int)'999', 'resDesc' => 'ယူနစ်မလောက်ပါသဖြင့် ဖြည့်သွင်းပေးပါ။'));
            }
            $mixparlay = array();
            $voucher_id = Carbon::now()->format('Y') . Carbon::now()->format('m') . Carbon::now()->format('d') . '_f_' . str_pad(random_int(99, 999), 3, "0", STR_PAD_LEFT);
            $user->balance -= $requestData->amount;

            if ($user->balance < 0) {
                return response()->json(array('resCode' => (int)'999', 'resDesc' => 'ယူနစ်မလောက်ပါသဖြင့် ဖြည့်သွင်းပေးပါ။'));
            }
            foreach ($requestData['values'] as $mixbet) {

                $mix = new MixBet();
                $mix->odd_id = $mixbet['odd_id'];
                $mix->voucher_id = $voucher_id;
                $mix->league_name = $mixbet['league_name'];
                $mix->home = $mixbet['home'];
                $mix->away = $mixbet['away'];
                $mix->bet = $mixbet['bet'];
                $mix->rate = $mixbet['rate'];
                $mix->amount = intval($requestData['amount']);
                // $mix->result_h = $requestData->result_h;
                // $mix->result_a = $requestData->result_a;
                $mix->p_id = $user->id;
                $mix->playerId = $user->id;
                $mix->created_at = Carbon::now();
                $mix->updated_at = Carbon::now();
                $mix->status = 1;

                array_push($mixparlay, $mix);
            }

            try {
                DB::beginTransaction();

                foreach ($mixparlay as $mb) {
                    $mb->save();
                }
                DB::statement("UPDATE users SET balance = balance -" . intval($requestData['amount']) . " where id = " . $user->id);
                DB::commit();

                return response()->json(array('resCode' => (int)'200', 'resDesc' => 'ဘောက်ချာအမှတ် - ' . $voucher_id . 'ဖြင့် မောင်း (' . count($mixparlay) . ') ပွဲကို  လောင်းခဲ့ပါသည်။'));
            } catch (ConnectionException $ex) {
                Log::error($ex);
                return response()->json(array('resCode' => (int)'400', 'resDesc' => 'Bad Request'));
            } catch (Exception $ex) {
                Log::error($ex);
                return response()->json(array('resCode' => (int)'500', 'resDesc' => 'Internal Server Error'));
            } catch (PDOException $e) {
                return response()->json(array('resCode' => (int)'502', 'resDesc' => 'Database Server Error'));
            }
        } else {
            return response()->json(array('resCode' => (int)'401', 'resDesc' => 'Please Login.'));
        }
    }
    public function MMOdds()
    {
        $oddData = $this->football->getPreMatch();
        $leagueData = $this->football->getLeague();
        return view('/mm-odds')->with(['oddData' => $oddData, 'leagueData' => $leagueData]);
    }
    public function MixParlay()
    {
        $oddData = $this->football->getPreMatch();
        $leagueData = $this->football->getLeague();
        return view('/mix-parlay')->with(['oddData' => $oddData, 'leagueData' => $leagueData]);
    }
    public function FHistory()
    {
        $user = Auth::user();
        if ($user != null) {

            $mixHistory = DB::select('select voucher_id, count(*) as TotalBet,created_at,amount
        from mixbet 
        where status = 1 and p_id = "' . $user->id . '"
        group by voucher_id,created_at,amount');
            $mmHistory = DB::select('SELECT A.voucher_id,A.league_name,A.home,A.away, A.rate, B.money_line_h,B.money_line_a,A.bet,A.amount,A.created_at FROM mmbet A
        join odds B on A.odd_id = B.id
        where A.status = 1 and  A.p_id= "' . $user->id . '"');
            return view('football.f-history')->with(['mixHistory' => $mixHistory, 'mmHistory' => $mmHistory]);
        } else {
            return View('frontend.login');
        }
    }
    public function AllFHistory(){
        $user = Auth::user();
        if ($user != null) {
            $mixVoucher = DB::select('select voucher_id, count(*) as TotalBet,created_at,amount
            from mixbet 
            where status = 1 and p_id = "' . $user->id . '"
            group by voucher_id,created_at,amount order by voucher_id desc');
            $mixHistory = DB::select('SELECT A.voucher_id,A.league_name,A.home,A.away, A.rate, B.money_line_h,B.money_line_a,A.bet,A.amount,A.result_h,A.result_a,A.created_at,A.status FROM mixbet A
            join odds B on A.odd_id = B.id
            where A.p_id= ' . $user->id .' order by A.voucher_id desc');
            $mmHistory = DB::select('SELECT B.league_name,A.voucher_id,A.league_name,A.home,A.away, A.rate, B.money_line_h,B.money_line_a,A.bet,A.amount,A.created_at FROM mmbet A
        join odds B on A.odd_id = B.id
        where A.status = 1 and  A.p_id= "' . $user->id . '" order by A.created_at desc');
            return view('football.history')->with(['mixHistory' => $mixHistory, 'mmHistory' => $mmHistory, 'mixVoucher'=>$mixVoucher]);
        } else {
            return View('frontend.login');
        }
    }
 
    public function FMixDetailedById(Request $requestData)
    {
        $user = Auth::user();
        if ($user != null) {
            $mixHistory = DB::select('SELECT A.voucher_id,A.league_name,A.home,A.away, A.rate, B.money_line_h,B.money_line_a,A.bet,A.amount,A.created_at FROM mixbet A
            join odds B on A.odd_id = B.id
            where A.p_id= ' . $user->id . ' and A.voucher_id = "' . $requestData->voucher_id.'"');
            return  response()->json($mixHistory);
        } else {
            return response()->json(array('resCode' => (int)'401', 'resDesc' => 'Please Login.'));
        }
    }
    public function FMMDetailedById(Request $requestData)
    {

        $user = Auth::user();
        if ($user != null) {
            $mmHistory = DB::select(
                'SELECT A.voucher_id,A.league_name,A.home,A.away, A.rate, B.money_line_h,B.money_line_a,A.bet,A.amount,A.created_at FROM mmbet A
        join odds B on A.odd_id = B.id
        where A.p_id= ' . $user->id . ' and A.voucher_id = "' . $requestData->voucher_id.'"'
            );
            return  response()->json($mmHistory);
        } else {
            return response()->json(array('resCode' => (int)'401', 'resDesc' => 'Please Login.'));
        }
    }
  
    public function livescore()
    {
        return view('/livescore-football');
    }
   
}
