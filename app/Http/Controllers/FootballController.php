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
        if(Session::get('player')== null){
            return false;
        }
        else{
            return true;
        }
    }
    public function checkAvailableOdds($odd_id){
        if(DB::table('odds')->find($odd_id)->status == 1){
            return true;
        }else{
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
            if($user != null){

            if($this->checkAvailableOdds($requestData->odd_id) == false){
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
            $mmbet->playerId =$user->id;
            $mmbet->created_at = Carbon::now();
            $mmbet->updated_at = Carbon::now();
            $mmbet->status = 1;            
            try {
                DB::beginTransaction();
                $mmbet->save();

                DB::statement("UPDATE users SET balance = balance -".$mmbet->amount." where id = ".$user->id);
                DB::commit();
               
                return response()->json(array('resCode' => (int)'200', 'resDesc' =>$mmbet->home.' vs '. $mmbet->away. '('.$mmbet->rate.') ပွဲတွင် '.config('app.BetType')[$mmbet->bet]. ' လောင်းခဲ့ပါသည်။'));
            } catch (ConnectionException $ex) {
                Log::error($ex);
                return response()->json(array('resCode' => (int)'400', 'resDesc' => 'Bad Request'));
            } catch (Exception $ex) {
                Log::error($ex);
                return response()->json(array('resCode' => (int)'500', 'resDesc' => 'Internal Server Error'));
            } catch (PDOException $e) {
                return response()->json(array('resCode' => (int)'502', 'resDesc' => 'Database Server Error'));
            }
        }else{
            return response()->json(array('resCode' => (int)'401', 'resDesc' => 'Please Login.'));

        }
    }
    public function mixparlayBet(Request $requestData)
    {
        $user = Auth::user();
            if($user != null){

           
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
        foreach($requestData['values'] as $mixbet){
           
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
            $mix->p_id =$user->id;
            $mix->playerId =$user->id;
            $mix->created_at = Carbon::now();
            $mix->updated_at = Carbon::now();
            $mix->status = 1;  

            array_push($mixparlay, $mix);
         }
         
         try {
            DB::beginTransaction();

            foreach($mixparlay as $mb){
                $mb->save();
              
            }
            DB::statement("UPDATE users SET balance = balance -".intval($requestData['amount'])." where id = ".$user->id);
            DB::commit();

            return response()->json(array('resCode' => (int)'200', 'resDesc' =>'ဘောက်ချာအမှတ် - '.$voucher_id. 'ဖြင့် မောင်း ('.count($mixparlay).') ပွဲကို  လောင်းခဲ့ပါသည်။'));
        } catch (ConnectionException $ex) {
            Log::error($ex);
            return response()->json(array('resCode' => (int)'400', 'resDesc' => 'Bad Request'));
        } catch (Exception $ex) {
            Log::error($ex);
            return response()->json(array('resCode' => (int)'500', 'resDesc' => 'Internal Server Error'));
        } catch (PDOException $e) {
            return response()->json(array('resCode' => (int)'502', 'resDesc' => 'Database Server Error'));
        }
    }else{
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
        $mixHistory = $this->football->getMixHistory(Session()->get('player')->id);
        $mmHistory = $this->football->getMMHistory(Session()->get('player')->id);
        $asiaHistory = $this->football->getAsiaHistory(Session()->get('player')->id);

        return view('/f-history')->with(['mixHistory' => $mixHistory, 'mmHistory' => $mmHistory,'asiaHistory'=>$asiaHistory]);
    }
    public function FMixDetailed()
    {

        $mixHistory = $this->football->getMixHistory(Session()->get('player')->id);
        return  response()->json($mixHistory->where());

    }
    public function FMixDetailedById($voucher_id)
    {

        $mixHistory = $this->football->getMixHistoryById(Session()->get('player')->id,$voucher_id);
        return  response()->json($mixHistory->where());

    }
    public function FMMDetailedById($voucher_id)
    {

        $mixHistory = $this->football->getMMHistoryById(Session()->get('player')->id,$voucher_id);
        return  response()->json($mixHistory->where());

    }
    public function FAsiaDetailedById($voucher_id)
    {

        $mixHistory = $this->football->getAsiaHistoryById(Session()->get('player')->id,$voucher_id);
        return  response()->json($mixHistory->where());

    }
    public function livescore()
    {
        return view('/livescore-football');
    }
    public function GetOdds()
    {

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://pinnacle-odds.p.rapidapi.com/kit/v1/markets?sport_id=1&event_type=prematch&is_have_odds=true",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: pinnacle-odds.p.rapidapi.com",
                "X-RapidAPI-Key: GL5KUgwVzJmshN5ZEUzWzeZtwsMvp1l8NqVjsn5KgIkE6Xr7X6"
            ],
        ]);

        $res = json_decode(curl_exec($curl));
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {

            foreach ($res->events as $eventOdd) {
                $inputOdds = new Odds();

                $inputOdds->sport_id = $res->sport_id;
                $inputOdds->sport_name = $res->sport_name;
                $inputOdds->last_call = Carbon::parse($res->last_call);
                $inputOdds->event_id = $eventOdd->event_id;
                $inputOdds->league_id = $eventOdd->league_id;
                $inputOdds->league_name = $eventOdd->league_name;
                $inputOdds->starts = Carbon::parse($eventOdd->starts)->addHour(6)->addMinutes(40);
                $inputOdds->home = $eventOdd->home;
                $inputOdds->away = $eventOdd->away;
                $inputOdds->event_type = $eventOdd->event_type;
                $inputOdds->is_have_odds = $eventOdd->is_have_odds;
                if (isset($eventOdd->periods->num_0)) {
                    if ($eventOdd->periods->num_0->money_line == null) {
                        $inputOdds->money_line_h = 0;
                        $inputOdds->money_line_a = 0;
                        $inputOdds->money_line_d = 0;
                    } else {
                        $inputOdds->money_line_h = $eventOdd->periods->num_0->money_line->home;
                        $inputOdds->money_line_a = $eventOdd->periods->num_0->money_line->away;
                        $inputOdds->money_line_d = $eventOdd->periods->num_0->money_line->draw;
                    }

                    if ($eventOdd->periods->num_0->spreads == null) {
                        $inputOdds->spreads_p = 0;
                        $inputOdds->spreads_h = 0;
                        $inputOdds->spreads_a = 0;
                    } else {
                        foreach ($eventOdd->periods->num_0->spreads as $spreadOdd) {
                            if ($spreadOdd->alt_line_id == null) {
                                $inputOdds->spreads_p = $spreadOdd->hdp;
                                $inputOdds->spreads_h = $spreadOdd->home;
                                $inputOdds->spreads_a = $spreadOdd->away;
                                continue;
                            }
                        }
                    }
                    if ($eventOdd->periods->num_0->spreads == null) {
                        $inputOdds->totals_point = 0;
                        $inputOdds->over = 0;
                        $inputOdds->under = 0;
                    } else {
                        foreach ($eventOdd->periods->num_0->totals as $totalOdd) {
                            if ($totalOdd->alt_line_id == null) {
                                $inputOdds->totals_point = $totalOdd->points;
                                $inputOdds->over = $totalOdd->over;
                                $inputOdds->under = $totalOdd->under;
                                continue;
                            }
                        }
                    }


                    $inputOdds->created_at = Carbon::now();
                    $inputOdds->updated_at = Carbon::now();
                    if ($inputOdds->starts->addMinutes(-10)->gt(Carbon::now())) {
                        $inputOdds->status = 1;
                    } else {
                        $inputOdds->status = 4;
                    }
                } else {
                    if ($eventOdd->periods->num_1->money_line == null) {
                        $inputOdds->money_line_h = 0;
                        $inputOdds->money_line_a = 0;
                        $inputOdds->money_line_d = 0;
                    } else {
                        $inputOdds->money_line_h = $eventOdd->periods->num_1->money_line->home;
                        $inputOdds->money_line_a = $eventOdd->periods->num_1->money_line->away;
                        $inputOdds->money_line_d = $eventOdd->periods->num_1->money_line->draw;
                    }

                    if ($eventOdd->periods->num_1->spreads == null) {
                        $inputOdds->spreads_p = 0;
                        $inputOdds->spreads_h = 0;
                        $inputOdds->spreads_a = 0;
                    } else {
                        foreach ($eventOdd->periods->num_1->spreads as $spreadOdd) {
                            if ($spreadOdd->alt_line_id == null) {
                                $inputOdds->spreads_p = $spreadOdd->hdp;
                                $inputOdds->spreads_h = $spreadOdd->home;
                                $inputOdds->spreads_a = $spreadOdd->away;
                                continue;
                            }
                        }
                    }
                    if ($eventOdd->periods->num_1->spreads == null) {
                        $inputOdds->totals_point = 0;
                        $inputOdds->over = 0;
                        $inputOdds->under = 0;
                    } else {
                        foreach ($eventOdd->periods->num_1->totals as $totalOdd) {
                            if ($totalOdd->alt_line_id == null) {
                                $inputOdds->totals_point = $totalOdd->points;
                                $inputOdds->over = $totalOdd->over;
                                $inputOdds->under = $totalOdd->under;
                                continue;
                            }
                        }
                    }


                    $inputOdds->created_at = Carbon::now();
                    $inputOdds->updated_at = Carbon::now();
                    if ($inputOdds->starts->addMinutes(-10)->gt(Carbon::now())) {
                        $inputOdds->status = 1;
                    } else {
                        $inputOdds->status = 4;
                    }
                }

                $inputOdds->save();
            }
        }
    }
}
