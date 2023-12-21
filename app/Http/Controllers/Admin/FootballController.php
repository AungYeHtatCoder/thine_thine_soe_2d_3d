<?php

namespace App\Http\Controllers\Admin;

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
use App\Http\Controllers\Controller;
use App\GetOdds;

class FootballController extends Controller
{
  
    public function ManageOdd(){

        $odds =
        DB::table('get_odds')->where('status',1)->where('money_line_h','>',0)->where('money_line_a','>',0)->where('spreads_h','>',0)->where('spreads_a','>',0)->where('totals_point','>',0)->orderBy('starts')->orderByDesc('league_name')->paginate(30,['*'],'odds');
        
        return view('admin.football.fixture',compact('odds'));
    }
    public function ChangeOddStatus($id,$status){
        Odds::find($id)->update([
            'status' => $status,
            'updated_at' => Carbon::now()
        ]);
        return redirect()->back()->with('message', 'လုပ်ဆောင်မူအောင်မြင်ပါသည်။');

    }
    public function ChangeBetStatus($id,$playerId,$amount,$status){
        DB::beginTransaction();

        MMBet::find($id)->update([
            'status' => $status,
            'updated_at' => Carbon::now()
        ]);
        DB::statement("UPDATE users SET balance = balance -" . doubleval($amount) . " where id = " . $playerId);
        DB::commit();

        return redirect()->back()->with('message', 'လုပ်ဆောင်မူအောင်မြင်ပါသည်။');

    }
    public function ChangeMPBetStatus($id,$amount,$status){
        DB::beginTransaction();
        $playerId = DB::table('mixbet')->where("voucher_id",$id)->select("playerId")->limit(1)->get();
        DB::statement("UPDATE mixbet SET status = ".$status . " where voucher_id = '" . $id."'");
        DB::statement("UPDATE users SET balance = balance +" . doubleval($amount) . " where id = " . $playerId[0]->playerId);
        DB::commit();

        return redirect()->back()->with('message', 'လုပ်ဆောင်မူအောင်မြင်ပါသည်။');

    }
    public function ManageMMBet(){

        $mmbet = DB::table('mmbet')
        ->join('odds', 'odds.id', '=', 'mmbet.odd_id')
        ->select('mmbet.id','mmbet.voucher_id','mmbet.league_name','mmbet.home','mmbet.away', 'mmbet.rate', 'odds.money_line_h','odds.money_line_a','mmbet.bet','mmbet.amount','mmbet.created_at','mmbet.result_h','mmbet.result_a','mmbet.status','mmbet.playerId')
        ->orderByDesc('mmbet.voucher_id')
        ->get();
        return view('admin.football.mmbet',compact('mmbet'));
    }
    public function ManageMMPL(){

        return view('admin.mmPL');
    }
  
    public function ManageMPBet(){
        $mixVoucher = DB::select('select voucher_id, count(*) as TotalBet,created_at,amount,status
        from mixbet 
        group by voucher_id,created_at,amount,status order by voucher_id desc');
        $mixHistory = DB::select('SELECT A.voucher_id,A.league_name,A.home,A.away, A.rate, B.money_line_h,B.money_line_a,A.bet,A.amount,A.result_h,A.result_a,A.created_at,A.status FROM mixbet A
        join odds B on A.odd_id = B.id
        order by A.voucher_id desc');
      
        return view('admin.football.mpbet',compact('mixVoucher','mixHistory'));
    }
    public function ManageMPPL(){

        return view('admin.mpPL');
    }
    public function FConfigue(){
        return view('admin.fconfigue');
    }
}
