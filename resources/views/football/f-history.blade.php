@extends('frontend.layouts.app')
@section('content')
<div class="row" style="font-size:x-small;">
<div class="col-lg-4 col-md-4 text-white offset-lg-4 offset-md-4 mt-4 pt-4 headers" style="height: 160vh; ">
 <?php

if ($mixHistory != null) {
   echo '    <h5 class="text-center mt-4">မောင်း</h5>
   <div class="pt-1 mt-2"><table class="table table-hover "><tr><th>ဘောက်ချာအမှတ်</th><th>ပွဲပေါင်း</th><th>ငွေ</th><th>အချိန်</th></tr>';
   if (count($mixHistory) == 0) {
      echo '<tr colspan="4">လောင်းထားသောပွဲများမရှိပါ</tr>';
   }
   foreach ($mixHistory as $mp) {
      echo '<tr onclick="mxDetail(' . $mp->voucher_id . ')"><td>' . $mp->voucher_id . '</td><td>' . $mp->TotalBet . '</td><td>' . $mp->amount . '</td><td>' . $mp->created_at . '</td></tr>';
   }
   echo '</table></div>';
} 
if ($mmHistory != null) {
   echo ' <h5 class="text-center mt-4">ဘော်ဒီ/ဂိုးပေါင်း</h5><div class="pt-1 mt-2"><table class="table table-hover"><tr><th>ဘောက်ချာအမှတ်</th><th>ပွဲ</th><th>ရွေးချယ်မူ</th><th>ငွေ</th><th>အချိန်</th></tr>';
   if (count($mmHistory) == 0) {
      echo '<tr colspan="5">လောင်းထားသောပွဲများမရှိပါ</tr>';
   }
   foreach ($mmHistory as $mp) {

      if ($mp->bet == 'h') {
         echo '<tr onclick="mxDetail(' . $mp->voucher_id . ')"><td>' . $mp->voucher_id . '</td><td>' . $mp->home . ' vs ' . $mp->away . '</td><td>' .
            $mp->home . '(' . $mp->rate . ')</td><td>' . $mp->amount . '</td><td>' . $mp->created_at . '</td></tr>';
      }
      if ($mp->bet == 'a') {
         echo '<tr onclick="mxDetail(' . $mp->voucher_id . ')"><td>' . $mp->voucher_id . '</td><td>' . $mp->home . ' vs ' . $mp->away . '</td><td>' .
            $mp->away . '(' . $mp->rate . ')</td><td>' . $mp->amount . '</td><td>' . $mp->created_at . '</td></tr>';
      }
      if ($mp->bet == 'o') {
         echo '<tr onclick="mxDetail(' . $mp->voucher_id . ')"><td>' . $mp->voucher_id . '</td><td>' . $mp->home . ' vs ' . $mp->away . ' total - ' . $mp->rate . '</td><td>Over</td><td>' . $mp->amount . '</td><td>' . $mp->created_at . '</td></tr>';
      }
      if ($mp->bet == 'u') {
         echo '<tr onclick="mxDetail(' . $mp->voucher_id . ')"><td>' . $mp->voucher_id . '</td><td>' . $mp->home . ' vs ' . $mp->away . ' total - ' . $mp->rate . '</td><td>Under</td><td>' . $mp->amount . '</td><td>' . $mp->created_at . '</td></tr>';
      }
   }
   echo '</table></div>';
} 

?>
</div>
</div>

@include('frontend.layouts.footer')
@endsection