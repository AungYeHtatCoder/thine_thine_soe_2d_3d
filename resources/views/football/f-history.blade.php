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
<div class="modal fade col-sm-4" id="historyPnl" tabindex="-1" role="dialog" aria-labelledby="bet" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title  text-dark" id="exampleModalLongTitle">လောင်းထားသောပွဲများ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                     </div>
                     <div class="modal-body" id="divPreview">

                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">ပိတ်မည်</button>
                     </div>
                  </div>
               </div>
            </div>


            
@include('frontend.layouts.footer')
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<!-- Bootstrap JavaScript and dependencies -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
            function mxDetail(v_id) {
               $.ajax({
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },

                  url: "{{  route('mp.detail') }}",
                  type: 'GET',
                  data: v_id,
                  cache: false,
                  dataType: 'json',

                  success: function(data) {
                     if(data.resCode == 200){
                      alert(data.resDesc);
                      mmOddBet = {};
                      $('#divPreview').empty();
                      $('#historyPnl').modal('show');
                      location.reload();
                     }else{
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
            }

            function mmDetail(v_id) {
               $.ajax({
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },

                  url: "{{  route('mm.detail') }}",
                  type: 'GET',
                  data: v_id,
                  cache: false,
                  dataType: 'json',

                  success: function(data) {
                     if(data.resCode == 200){
                      alert(data.resDesc);
                      mmOddBet = {};
                      $('#divPreview').empty();
                      $('#historyPnl').modal('show');
                      location.reload();
                     }else{
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
            }
            </script>
@endsection