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
    margin: 0px 2px 2px 2px;
    border-radius: 5px;
    width: 50%;
  }

  .box-2 {
    background: #c50408;
    border: 1px solid gold;
    color: #fff;
    border-radius: 5px;
    width: 40%;
    align-items: center;
    text-align: center;
  }

  .box-3 {
    background: green;
    color: #fff;
    width: 20%;
    align-items: center;
    text-align: center;
  }
</style>

@endsection

@section('content')
<!-- content section -->
<div class="row">
  <div class="col-lg-4 col-md-4 text-white offset-lg-4 offset-md-4 mt-4 pt-4 headers" style="min-height: 100vh; ">
    <h5 class="text-center mt-4">မောင်း</h5>
   
    <?php
    $count = 0;
    if ($oddData->count() > 0) {
      foreach ($oddData as $odd) {
        $count++;
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

        echo '<div class="pt-1 mt-2">
                        <p><i class="fa fa-star pe-2"></i> ' . $odd->league_name . ' </p>
                      </div>
                      <div class="card shadow bg-transparent px-2 pt-2 pb-3">
                        <p class="text-white">ပွဲချိန် : ' . $odd->starts . '</p>';
        if ($odd->money_line_h < $odd->money_line_a) {
          echo '
                           <div class="d-flex">
                           <div class="box-1 d-flex justify-content-around" onclick="betOdd(`' . $odd->id . '`,`' . $odd->league_name . '`,`' . $odd->home . '`,`' . $odd->away . '`,`h`,`' . $mm_odd . '`,`h_' . $odd->id . $count . '`,`h`)" id="h_' . $odd->id . $count . '">
                             <p class="d-flex align-items-center">' . $odd->home . '</p>
                             <h5>
                               <span class="badge bg-primary"> ' . $mm_odd . ' </span>
                             </h5>
                           </div>
                           <div class="box-1" onclick="betOdd(`' . $odd->id . '`,`' . $odd->league_name . '`,`' . $odd->home . '`,`' . $odd->away . '`,`a`,`' . $mm_odd . '`,`a_' . $odd->id . $count . '`,`h`)" id="a_' . $odd->id . $count . '">
                             <p>' . $odd->away . '</p>
                           </div>
                         </div>
                         ';
        }

        if ($odd->money_line_h > $odd->money_line_a) {
          echo '
                           <div class="d-flex">
                           <div class="box-1"  onclick="betOdd(`' . $odd->id . '`,`' . $odd->league_name . '`,`' . $odd->home . '`,`' . $odd->away . '`,`h`,`' . $mm_odd . '`,`h_' . $odd->id . $count . '`,`a`)" id="h_' . $odd->id . $count . '">
                             <p class="d-flex align-items-center">' . $odd->home . '</p>
                           
                           </div>
                           <div class="box-1" d-flex justify-content-around" onclick="betOdd(`' . $odd->id . '`,`' . $odd->league_name . '`,`' . $odd->home . '`,`' . $odd->away . '`,`a`,`' . $mm_odd . '`,`a_' . $odd->id . $count . '`,`a`)" id="a_' . $odd->id . $count . '">
                           <h5>
                           <span class="badge bg-primary"> ' . $mm_odd . ' </span>
                         </h5>
                             <p>' . $odd->away . '</p>
                           </div>
                         </div>
                         ';
        }


        echo '
                        <div class="d-flex mt-1">
                        <div class="box-2" onclick="betOdd(`' . $odd->id . '`,`' . $odd->league_name . '`,`' . $odd->home . '`,`' . $odd->away . '`,`o`,`' . $mm_Todd . '`,`o_' . $odd->id . $count . '`,``)" id="o_' . $odd->id . $count . '">
                         <p>ဂိုးပေါ်</p>
                        </div>
                        <div class="box-3">
                         <p>' . $mm_Todd . '</p>
                        </div>
                        <div class="box-2" onclick="betOdd(`' . $odd->id . '`,`' . $odd->league_name . '`,`' . $odd->home . '`,`' . $odd->away . '`,`u`,`' . $mm_Todd . '`,`u_' . $odd->id . $count . '`,``)" id="u_' . $odd->id . $count . '">
                         <p>ဂိုးအောက်</p>
                        </div>
                       </div></div>

                        ';
      }
    }
    ?>



  </div>
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
      <p class="text-white">မောင်း 1</p>
      <p>|</p>
      <p class="text-white">လောင်းငွေ</p>

      <input type="number" class="form-control  w-50"  min="1" id="bet_amount" name="bet_amount" value="0" onchange ="getEstimate(this.value);">
      <button class="btn btn-success" onclick="bet_Confirm();">လောင်းမည်</button>
    </div>
  </div>
</footer>
<!-- footer section -->
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
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<!-- Bootstrap JavaScript and dependencies -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
  var mmOddBet;
  var betObjLst = [];

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });


  function betOdd(id, l_name, home, away, bet, rate, d_id, bd) {
    var htmlExpand = '';
    mmOddBet = {};
    mmOddBet.odd_id = id;
    mmOddBet.league_name = l_name;
    mmOddBet.home = home;
    mmOddBet.away = away;
    mmOddBet.bet = bet;
    mmOddBet.rate = rate;
    mmOddBet.amount = 0.00;
    mmOddBet.d_id = d_id;
    mmOddBet.bd = bd;
    let tmp = betObjLst.filter((item) => item.odd_id == id);
    tmp.forEach((element) =>
      $('#' + element.d_id).removeClass("bg-warning")
    );
    betObjLst = betObjLst.filter((item) => item.odd_id !== id);

    betObjLst.push(mmOddBet);
    $('#' + mmOddBet.d_id).addClass("bg-warning");
    $("#toggleCount").text(betObjLst.length);

    // htmlExpand = '<div class=" p-5  d-flex justify-content-between text-dark" style="font-size:small;"><div class="row g-1 p-1 text-center" style="font-weight:bold;"><div class="bg-info">' + l_name + '</div><div class="p-1 border" style="font-weight:bold;"><div>' + home + '</div><div>vs</div><div>' + away + '</div></div>';
    // if (bet == 'h') {
    //    htmlExpand += '<div class="bg-warning" style="font-size:medium;font-weight:bold;">' + home + ' ( ' + rate + ') </div>';
    // }
    // if (bet == 'a') {
    //    htmlExpand += '<div  class="bg-warning" style="font-size:medium;font-weight:bold;">' + away + ' ( ' + rate + ') </div>';
    // }
    // if (bet == 'o') {
    //    htmlExpand += '<div  class="bg-warning" style="font-size:medium;font-weight:bold;">Over ( ' + rate + ')  </div>';
    // }
    // if (bet == 'u') {
    //    htmlExpand += '<div class="bg-warning"  style="font-size:medium;font-weight:bold;">Under ( ' + rate + ')  </div>';
    // }
    // // htmlExpand += '<input type="number" class="form-control"  min="1" id="bet_amount" name="bet_amount" value="0" onchange ="getEstimate(this.value);"><label id="est_amt" class="form-label bg-success" style="font-size:medium;font-weight:bold;" />'
    // // $('#divBetPlace').append(htmlExpand);
    // // $('#betPnl').modal('show');
  }
  $("#deleteBtn").on("click", function() {
    betObjLst.forEach((element) =>
      $('#' + element.d_id).removeClass("bg-info")
    );
    betObjLst = [];
  });

  function bet_Confirm() {
    if (betObjLst.length < 1) {
      alert("မောင်းလောင်းမည့် အသင်းများရွေးပါ");
      return;
    }
    if(parseInt($('#bet_amount').val())< 1){
      alert("လောင်းမည့်ငွေပမာဏထည်");
      return;

    }
    $('#divBetPlace').empty();

    estimate_val = Math.trunc((parseInt($('#bet_amount').val()) * (betObjLst.length * betObjLst.length)) - (parseInt($('#bet_amount').val())));
    htmlExpand = '';
    htmlExpand = '<div class=" p-3  d-flex justify-content-between text-dark" style="font-size:small;"><div class="row g-1 p-1 text-center" style="font-weight:bold;">';
    for (let i = 0; i < betObjLst.length; i++) {
      console.log(betObjLst[i]);
      htmlExpand += '<div class="border p-2 border-3">';
      if (betObjLst[i].bd == 'h') {
        htmlExpand += '<div class="bg-info">' + betObjLst[i].league_name + '</div><div class="p-1 border" style="font-weight:bold;"><div>' + betObjLst[i].home + '( ' + betObjLst[i].rate + ')</div><div>vs</div><div>' + betObjLst[i].away + '</div></div>';
      } else if (betObjLst[i].bd == 'a') {
        htmlExpand += '<div class="bg-info">' + betObjLst[i].league_name + '</div><div class="p-1 border" style="font-weight:bold;"><div>' + betObjLst[i].home + '</div><div>vs</div><div>' + betObjLst[i].away + '( ' + betObjLst[i].rate + ')</div></div>';
      } else {
        htmlExpand += '<div class="bg-info">' + betObjLst[i].league_name + '</div><div class="p-1 border" style="font-weight:bold;"><div>' + betObjLst[i].home + '</div><div>vs</div><div>' + betObjLst[i].away + '</div><div class="p-1 border bg-success" style="font-weight:bold;">Total : ' + betObjLst[i].rate + '</div></div>';
      }

      if (betObjLst[i].bet == 'h') {
        htmlExpand += '<div class="bg-warning" style="font-size:medium;font-weight:bold;">' + betObjLst[i].home + ' </div>';
      }
      if (betObjLst[i].bet == 'a') {
        htmlExpand += '<div  class="bg-warning" style="font-size:medium;font-weight:bold;">' + betObjLst[i].away + ' </div>';
      }
      if (betObjLst[i].bet == 'o') {
        htmlExpand += '<div  class="bg-warning" style="font-size:medium;font-weight:bold;">Over </div>';
      }
      if (betObjLst[i].bet == 'u') {
        htmlExpand += '<div class="bg-warning"  style="font-size:medium;font-weight:bold;">Under</div>';
      }
      htmlExpand += '</div>';

    }
    htmlExpand += '</div></div>';
    htmlExpand += '<div  class="row g-1 p-1 text-center" style="font-weight:bold;"><label id="est_amt" class="form-label bg-success" style="font-size:medium;font-weight:bold;">'+estimate_val+'</div>';

    $('#divBetPlace').append(htmlExpand);
    $('#betPnl').modal('show');

  }

  function getEstimate(betAmt) {
    $('#est_amt').text('Estimate Win - ' + Math.trunc((betAmt * (betObjLst.length * betObjLst.length)) - betAmt));
    mmOddBet.amount = betAmt;

  }
  $("#btnBet").click(function(event) {
    event.preventDefault();
    var postData = {
      values: betObjLst,
      amount: $('#bet_amount').val()
    };

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },

      //url: 'http://localhost/laravel60/pet/petupdate',
      url: "{{  route('mixparlay.bet') }}",
      type: 'POST',
      data: postData,
      cache: false,
      success: function(data) {
        console.log(data);
        if (data.resCode == 200) {
          alert(data.resDesc);
          mmOddBet = {};
          betObjLst = [];
          $('#divBetPlace').empty();
          $('#betPnl').modal('hide');
          location.reload();
        } else {
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