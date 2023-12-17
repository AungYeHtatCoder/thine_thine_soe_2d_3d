@extends('frontend.layouts.app')

@section('style')

<style>
 .fa-star {
  color: green;
 }

 .box-1 {
  background: #c50408;
  border: 1px solid gold;
  color: #fff;
  width: 50%;
 }

 .box-2 {
  background: #c50408;
  border: 1px solid gold;
  color: #fff;
  width: 40%;
  text-align: center;
 }

 .box-3 {
  background: #c50408;
  border-top: 1px solid gold;
  border-bottom: 1px solid gold;
  color: #fff;
  width: 20%;
  align-items: center;
  text-align: center;
 }
</style>

@endsection

@section('content')
<!-- content section -->
<div class="row" >
 <div class="col-lg-4 col-md-4 text-white offset-lg-4 offset-md-4 mt-4 pt-4 headers" style="height: 160vh; ">
  <h5 class="text-center mt-4">ဘော်ဒီ/ဂိုးပေါင်း</h5>



  <?php
                  if ($oddData->count() > 0) {
                     foreach ($oddData as $odd) {
                        // if($odd->spreads_h == 0 && $odd->spreads_a== 0 && $odd->money_line_h == 0 && $odd->money_line_a == 0){
                        //    continue;
                        // }

                        $mm_odd = "0";
                        $mm_Todd = "0";

                        // if ($odd->spreads_p > 0) {
                        //    $tmpSpreads_p = $odd->spreads_p * -1;
                        // } else {
                        //    $tmpSpreads_p = $odd->spreads_p;
                        // }
                        $tmpDiffer = 0;
                        $tmpSpread = 0.00;
                        $tmpDifferTotal = 0.00;
                        if ($odd->spreads_p >= 0) {
                           $tmpDiffer = round(100 * ($odd->spreads_a - $odd->spreads_h), -1);
                           $tmpSpread = $odd->spreads_p * (-1);
                        } else {
                           $tmpDiffer = round(100 * ($odd->spreads_h - $odd->spreads_a), -1);
                           $tmpSpread = $odd->spreads_p;
                        }
                        $tmpDifferTotal = round(100 * ($odd->over - $odd->under), -1);

                        switch (($odd->totals_point)) {
                           case  1.5:
                              if ($tmpDifferTotal < 0) {
                                 $mm_Todd = "2 +" . sprintf("%02d", 100 + $tmpDifferTotal);
                              } else {
                                 $mm_Todd = "1 -" . sprintf("%02d", 100 - $tmpDifferTotal);
                              }
                              break;
                           case  1.75:
                              $mm_Todd = "2 +" . sprintf("%02d", 50 + $tmpDifferTotal);
                              break;
                           case  2:
                              $mm_Todd = "2 " . sprintf("%+02d", $tmpDifferTotal);
                              break;
                           case  2.25:
                              $mm_Todd = "2 -" . sprintf("%02d", 50 - $tmpDifferTotal);
                              break;
                           case  2.5:
                              if ($tmpDifferTotal < 0) {
                                 $mm_Todd = "3 +" . sprintf("%02d", 100 + $tmpDifferTotal);
                              } else {
                                 $mm_Todd = "2 -" . sprintf("%02d", 100 - $tmpDifferTotal);
                              }
                              break;
                           case  2.75:
                              $mm_Todd = "3 +" . sprintf("%02d", 50 + $tmpDifferTotal);
                              break;
                           case  3:
                              $mm_Todd = "3 " . sprintf("%+02d", $tmpDifferTotal);
                              break;
                           case  3.25:
                              $mm_Todd = "3 -" . sprintf("%02d", 50 - $tmpDifferTotal);
                              break;
                           case  3.5:
                              if ($tmpDifferTotal < 0) {
                                 $mm_Todd = "4 +" . sprintf("%02d", 100 + $tmpDifferTotal);
                              } else {
                                 $mm_Todd = "3 -" . sprintf("%02d", 100 - $tmpDifferTotal);
                              }
                              break;
                           case  3.75:
                              $mm_Todd = "4 +" . sprintf("%02d", 50 + $tmpDifferTotal);
                              break;
                           case  4:
                              $mm_Todd = "4 " . sprintf("%+02d", $tmpDifferTotal);
                              break;
                           case  4.25:
                              $mm_Todd = "4 -" . sprintf("%02d", 50 - $tmpDifferTotal);
                              break;
                           case  4.5:
                              if ($tmpDifferTotal < 0) {
                                 $mm_Todd = "5 +" . sprintf("%02d", 100 + $tmpDifferTotal);
                              } else {
                                 $mm_Todd = "4 -" . sprintf("%02d", 100 - $tmpDifferTotal);
                              }
                              break;
                           case  4.75:
                              $mm_Todd = "5 +" . sprintf("%02d", 50 + $tmpDifferTotal);
                              break;
                           case  5:
                              $mm_Todd = "5 " . sprintf("%+02d", $tmpDifferTotal);
                              break;
                           case  5.25:
                              $mm_Todd = "5 -" . sprintf("%02d", 50 - $tmpDifferTotal);
                              break;
                           case  5.5:
                              if ($tmpDifferTotal < 0) {
                                 $mm_Todd = "6 +" . sprintf("%02d", 100 + $tmpDifferTotal);
                              } else {
                                 $mm_Todd = "5 -" . sprintf("%02d", 100 - $tmpDifferTotal);
                              }
                              break;
                           case  5.75:
                              $mm_Todd = "6 +" . sprintf("%02d", 50 + $tmpDifferTotal);
                              break;
                           case  6:
                              $mm_Todd = "6 " . sprintf("%+02d", $tmpDifferTotal);
                              break;
                        }

                        switch (($tmpSpread)) {
                           case  0:
                              $mm_odd = "" . sprintf("%+02d", $tmpDiffer);
                              break;
                           case  -0.25:
                              $mm_odd = "-" . sprintf("%02d", 50 - $tmpDiffer);
                              break;
                           case -0.5:
                              if ($tmpDiffer < 0) {
                                 $mm_odd = "1 +" . strval(sprintf("%02d", 100 + $tmpDiffer));
                              } else {
                                 $mm_odd = "-" . strval(sprintf("%02d", 100 - $tmpDiffer));
                              }
                              break;
                           case  -0.75:
                              $mm_odd = "1 +" . sprintf("%02d", 50 + $tmpDiffer);
                              break;
                           case  -1:
                              $mm_odd = "1 " . sprintf("%+02d", $tmpDiffer);
                              break;
                           case  -1.25:
                              $mm_odd = "1 -" . sprintf("%02d", 50 - $tmpDiffer);
                              break;
                           case  -1.5:
                              if ($tmpDiffer < 0) {
                                 $mm_odd = "2 +" . sprintf("%02d", 100 + $tmpDiffer);
                              } else {
                                 $mm_odd = "1 -" . sprintf("%02d", 100 - $tmpDiffer);
                              }
                              break;
                           case  -1.75:
                              $mm_odd = "2 +" . sprintf("%02d", 50 + $tmpDiffer);
                              break;
                           case  -2:
                              $mm_odd = "2 " . sprintf("%+02d", $tmpDiffer);
                              break;
                           case  -2.25:
                              $mm_odd = "2 -" . sprintf("%02d", 50 - $tmpDiffer);
                              break;
                           case  -2.5:
                              if ($tmpDiffer < 0) {
                                 $mm_odd = "3 +" . sprintf("%02d", 100 + $tmpDiffer);
                              } else {
                                 $mm_odd = "2 -" . sprintf("%02d", 100 - $tmpDiffer);
                              }
                              break;
                           case  -2.75:
                              $mm_odd = "3 +" . sprintf("%02d", 50 + $tmpDiffer);
                              break;
                           case  -3:
                              $mm_odd = "3 " . sprintf("%+02d", $tmpDiffer);
                              break;
                           case  -3.25:
                              $mm_odd = "3 -" . sprintf("%02d", 50 - $tmpDiffer);
                              break;
                           case  -3.5:
                              if ($tmpDiffer < 0) {
                                 $mm_odd = "4 +" . sprintf("%02d", 100 + $tmpDiffer);
                              } else {
                                 $mm_odd = "3 -" . sprintf("%02d", 100 - $tmpDiffer);
                              }
                              break;
                           case  -3.75:
                              $mm_odd = "4 +" . sprintf("%02d", 50 + $tmpDiffer);
                              break;
                           case  -4:
                              $mm_odd = "4 " . sprintf("%+02d", $tmpDiffer);
                              break;
                           case  -4.25:
                              $mm_odd = "4 -" . sprintf("%02d", 50 - $tmpDiffer);
                              break;
                           case  -4.5:
                              if ($tmpDiffer < 0) {
                                 $mm_odd = "5 +" . sprintf("%02d", 100 + $tmpDiffer);
                              } else {
                                 $mm_odd = "4 -" . sprintf("%02d", 100 - $tmpDiffer);
                              }
                              break;
                           case  -4.75:
                              $mm_odd = "5 +" . sprintf("%02d", 50 + $tmpDiffer);
                              break;
                           case  -5:
                              $mm_odd = "5 " . sprintf("%+02d", $tmpDiffer);
                              break;
                           case  -5.25:
                              $mm_odd = "5 -" . sprintf("%02d", 50 - $tmpDiffer);
                              break;
                           case  -5.5:
                              if ($tmpDiffer < 0) {
                                 $mm_odd = "6 +" . sprintf("%02d", 100 + $tmpDiffer);
                              } else {
                                 $mm_odd = "5 -" . sprintf("%02d", 100 - $tmpDiffer);
                              }
                              break;
                           case  -5.75:
                              $mm_odd = "6 +" . sprintf("%02d", 50 + $tmpDiffer);
                              break;
                           case  -6:
                              $mm_odd = "6 " . sprintf("%+02d", $tmpDiffer);
                              break;
                        }

                       
                
                        echo '
                        <div class="pt-1"><p><i class="fa fa-star pe-2"></i>' . $odd->league_name . '</p>
                        </div>
                        <div class="card shadow text-center bg-transparent px-2 pt-2 pb-3">
                         <p class="text-white">ပွဲချိန် : '.$odd->starts .'</p>';
                        if ($odd->money_line_h < $odd->money_line_a) {
                           echo '
                           <div class="d-flex"><div class="box-1 d-flex justify-content-around" onclick="betOdd(this,`' . $odd->id . '`,`' . $odd->league_name . '`,`' . $odd->home . '`,`' . $odd->away . '`,`h`,`' . $mm_odd . '`,`h`)"><p class="d-flex align-items-center">'.$odd->home .'</p><h5><span class="badge bg-primary">'.$mm_odd.'</span></h5></div><div class="box-1" onclick="betOdd(this,`' . $odd->id . '`,`' . $odd->league_name . '`,`' . $odd->home . '`,`' . $odd->away . '`,`a`,`' . $mm_odd . '`,`h`)"><p>'.$odd->away.'</p></div></div>';
                        }

                        if ($odd->money_line_h > $odd->money_line_a) {
                           echo '
                           <div class="d-flex"><div class="box-1 " onclick="betOdd(this,`' . $odd->id . '`,`' . $odd->league_name . '`,`' . $odd->home . '`,`' . $odd->away . '`,`h`,`' . $mm_odd . '`,`a`)"><p class="d-flex align-items-center">'.$odd->home .'</p></div><div class="box-1 d-flex justify-content-around" onclick="betOdd(this,"' . $odd->id . '","' . $odd->league_name . '","' . $odd->home . '","' . $odd->away . '","a","' . $mm_odd . '","a")"><h5><span class="badge bg-primary">'.$mm_odd.'</span></h5><p>'.$odd->away.'</p></div></div>                           
                          ';
                        }


                        echo '
                        <div class="d-flex mt-1">
                        <div class="box-2" onclick="betOdd(this,`' . $odd->id . '`,`' . $odd->league_name . '`,`' . $odd->home . '`,`' . $odd->away . '`,`o`,`' . $mm_Todd . '`,``)">
                         <p>ဂိုးပေါ်</p>
                        </div>
                        <div class="box-3">
                         <p>'.$mm_Todd.'</p>
                        </div>
                        <div class="box-2" onclick="betOdd(this,`' . $odd->id . '`,`' . $odd->league_name . '`,`' . $odd->home . '`,`' . $odd->away . '`,`u`,`' . $mm_Todd . '`,``)">
                         <p>ဂိုးအောက်</p>
                        </div>
                       </div></div>';
                     }
                  }
                  ?>

 </div>
</div>
<!-- content section -->

<!-- footer section -->
<footer class="row">
 <div class="col-lg-4 col-md-6 fixed-bottom mx-auto" style="
            background: #000;
            border: 2px solid #ebc03c;
          ">
  <div class="d-flex justify-content-between align-items-center text-center py-2">
   <p class="text-white">လောင်းငွေ</p>
   <input type="number" class="form-control  w-50"  min="1" id="bet_amount" name="bet_amount" value="0" >
   <button class="btn btn-success" onclick="bet_Confirm();">လောင်းမည်</button>
  </div>
 </div>
</footer>
<div class="modal fade col-sm-12" id="betPnl" tabindex="-1" role="dialog" aria-labelledby="bet" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title  text-dark" id="exampleModalLongTitle">ရွေးချယ်ထားသောပွဲများ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                     </div>
                     <div class="modal-body" id="divBetPlace" style="background-colorLre;">

                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">ပြန်ရွေးမည်</button>
                        <button id="btnBet" type="button" class="btn btn-primary">လောင်းမည်</button>
                     </div>
                  </div>
               </div>
            </div>

<!-- footer section -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script><script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  

<script>

  
            var mmOddBet;
            $.ajaxSetup({
      headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });  

   

            function bet_Confirm(){
               $('#divBetPlace').empty();
  if(parseInt($('#bet_amount').val())< 1){
      alert("လောင်းမည့်ငွေပမာဏထည့်ပါ");
      return;

    }
               if(mmOddBet.bd == 'h'){
               htmlExpand = '<div class=" p-5  d-flex justify-content-between text-dark" style="font-size:small;"><div class="row g-1 p-1 text-center" style="font-weight:bold;"><div class="bg-info">' + mmOddBet.league_name + '</div><div class="p-1 border" style="font-weight:bold;"><div>' + mmOddBet.home + '( '+ mmOddBet.rate+')</div><div>vs</div><div>' + mmOddBet.away + '</div></div>';
              }else if(mmOddBet.bd =='a'){
               htmlExpand = '<div class=" p-5  d-flex justify-content-between text-dark" style="font-size:small;"><div class="row g-1 p-1 text-center" style="font-weight:bold;"><div class="bg-info">' + mmOddBet.league_name + '</div><div class="p-1 border" style="font-weight:bold;"><div>' + mmOddBet.home + '</div><div>vs</div><div>' + mmOddBet.away +'( '+ mmOddBet.rate+')</div></div>';
              }else{
               htmlExpand = '<div class=" p-5  d-flex justify-content-between text-dark" style="font-size:small;"><div class="row g-1 p-1 text-center" style="font-weight:bold;"><div class="bg-info">' + mmOddBet.league_name + '</div><div class="p-1 border" style="font-weight:bold;"><div>' + mmOddBet.home + '</div><div>vs</div><div>' + mmOddBet.away + '</div><div class="p-1 border bg-success" style="font-weight:bold;">Total : '+mmOddBet.rate+'</div></div>';
              }
             
               
               if (mmOddBet.bet == 'h') {
                  htmlExpand += '<div class="bg-warning" style="font-size:medium;font-weight:bold;">' + mmOddBet.home +'</div>';
               }
               if (mmOddBet.bet == 'a') {
                  htmlExpand += '<div  class="bg-warning" style="font-size:medium;font-weight:bold;">' + mmOddBet.away +'</div>';
               }
               if (mmOddBet.bet == 'o') {
                  htmlExpand += '<div  class="bg-warning" style="font-size:medium;font-weight:bold;">Over </div>';
               }
               if (mmOddBet.bet == 'u') {
                  htmlExpand += '<div class="bg-warning"  style="font-size:medium;font-weight:bold;">Under</div>';
               }
              
               
               $('#divBetPlace').append(htmlExpand);
              //  $('#betPnl').modal('show');
              var myModal = new bootstrap.Modal(document.getElementById('betPnl'), {
                            keyboard: false
                          });
                          myModal.show();
            }

            function betOdd(RefObj,id, l_name, home, away, bet, rate,bd) {
               const boxes = Array.from(document.getElementsByClassName('bg-warning'));

                  boxes.forEach(box => {
                  box.classList.remove('bg-warning');
                  });
                  $(RefObj).addClass('bg-warning');

               var htmlExpand = '';
               mmOddBet = {};
               mmOddBet.odd_id = id;
               mmOddBet.league_name = l_name;
               mmOddBet.home = home;
               mmOddBet.away = away;
               mmOddBet.bet = bet;
               mmOddBet.rate = rate;
               mmOddBet.amount = 0.00;
            
            }

            function getEstimate(betAmt) {
               $('#est_amt').text('Estimate Win - ' + Math.trunc(betAmt));
               mmOddBet.amount = betAmt;

            }
            $("#btnBet").click(function(event) {
               event.preventDefault();
               mmOddBet.status = 1;
               mmOddBet.amount = parseInt($('#bet_amount').val());
               $.ajax({
                  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

                  //url: 'http://localhost/laravel60/pet/petupdate',
                  url: "{{  route('mmodds.bet') }}",
                  type: 'POST',
                  data: mmOddBet,
                  cache: false,
                  dataType: 'json',           

                  success: function(data) {
                    if(data.resCode == 200){
                     alert(data.resDesc);
                     mmOddBet = {};
                     $('#divBetPlace').empty();
                     $('#betPnl').modal('hide');
                     var myModal = new bootstrap.Modal(document.getElementById('betPnl'), {
                            keyboard: false
                          });
                          myModal.hide();
                     location.reload();
                    }else if(data.resCode == 401){
                      window.location.href = "/login";
                    }
                    else{
                     alert(data.resDesc);
                    }
                  },
                  error: function(data, ajaxOptions, thrownError) {
                     var status = data.status;
                     console.log(data);
                     alert(status);
                     if (data.status === 422) {
                        $.each(data.responseJSON.errors, function(key, value) {
                          console.log(value);
                        });
                     }
                  }
               });
            });
         </script>
@endsection