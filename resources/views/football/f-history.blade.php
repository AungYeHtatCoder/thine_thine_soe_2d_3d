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
      echo '<tr onclick=mxDetail("' . $mp->voucher_id . '")><td>' . $mp->voucher_id . '</td><td>' . $mp->TotalBet . '</td><td>' . $mp->amount . '</td><td>' . $mp->created_at . '</td></tr>';
   }
   echo '</table></div>';
} 
if ($mmHistory != null) {
   echo ' <h5 class="text-center mt-4">ဘော်ဒီ/ဂိုးပေါင်း</h5><div class="pt-1 mt-2"><table class="table table-hover"><tr><th>ဘောက်ချာအမှတ်</th><th>ပွဲ</th><th>ရွေးချယ်မူ</th><th>ငွေ</th><th>အချိန်</th></tr>';
   if (count($mmHistory) == 0) {
      echo '<tr colspan="5">လောင်းထားသောပွဲများမရှိပါ</tr>';
   }
   foreach ($mmHistory as $mp) {
      if($mp->money_line_h > $mp->money_line_a){
         $tmpFixture = $mp->home . ' vs ('. $mp->rate.')' . $mp->away;
      }else{
         $tmpFixture = $mp->home . '('. $mp->rate.') vs '  . $mp->away;
      }
      if ($mp->bet == 'h') {
         echo '<tr onclick=mmDetail("' . $mp->voucher_id . '")><td>' . $mp->voucher_id . '</td><td>' . $tmpFixture . '</td><td style="font-weight:bold;">' .
            $mp->home .'</td><td>' . $mp->amount . '</td><td>' . $mp->created_at . '</td></tr>';
      }
      if ($mp->bet == 'a') {
         echo '<tr onclick=mmDetail("' . $mp->voucher_id . '")><td>' . $mp->voucher_id . '</td><td>' . $tmpFixture  . '</td><td style="font-weight:bold;">' .
            $mp->away .'</td><td>' . $mp->amount . '</td><td>' . $mp->created_at . '</td></tr>';
      }
      if ($mp->bet == 'o') {
         echo '<tr onclick=mmDetail("' . $mp->voucher_id . '")><td>' . $mp->voucher_id . '</td><td>' . $mp->home . ' vs ' . $mp->away . ' total ' . $mp->rate . '</td><td style="font-weight:bold;">Over</td><td>' . $mp->amount . '</td><td>' . $mp->created_at . '</td></tr>';
      }
      if ($mp->bet == 'u') {
         echo '<tr onclick=mmDetail("' . $mp->voucher_id . '")><td>' . $mp->voucher_id . '</td><td>' . $mp->home . ' vs ' . $mp->away . ' total  ' . $mp->rate . '</td><td style="font-weight:bold;">Under</td><td>' . $mp->amount . '</td><td>' . $mp->created_at . '</td></tr>';
      }
   }
   echo '</table></div>';
} 

?>
</div>
</div>
<div class="modal fade col-sm-12" id="historyPnl" tabindex="-1" role="dialog" aria-labelledby="bet" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title  text-dark" id="exampleModalLongTitle">လောင်းထားသောပွဲများ</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>

                     </div>
                     <div class="modal-body" id="divPreview">

                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">ပိတ်မည်</button>
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
               var postData = {
                  voucher_id: v_id
                           };
               $.ajax({
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },

                  url: "{{  route('mp.detail') }}",
                  type: 'POST',
                  data: postData,
                  cache: false,
                  dataType: 'json',

                  success: function(data) {
                     if(data != null){
                      var tempFixture="";
                      var dynaHtml = "";
                      $('#divPreview').empty();
                      dynaHtml = '<div class=" p-5 justify-content-between text-dark" style="font-size:small;">';
                      for(let i = 0; i < data.length; i++){
                        
                      if(data[i].money_line_h > data[i].money_line_a){
                        tempFixture = data[i].home + ' vs (' +data[i].rate+ ') ' + data[i].away;
                      }else{
                        tempFixture = data[i].home + ' ('+data[i].rate+') vs' + data[i].away;

                      }
                      if(data[i].bet == 'h'){
                        dynaHtml += '<div class="row g-1 p-1 text-center border" style="font-weight:bold;"><div class="bg-info">' + data[i].league_name + '</div><div class="p-1 " style="font-weight:bold;">' + tempFixture +'</div><div class="bg-warning" style="font-size:medium;font-weight:bold;">' + data[i].home + '</div></div>';
                      }
                      if(data[i].bet == 'a'){
                        dynaHtml += '<div class="row g-1 p-1 text-center border" style="font-weight:bold;"><div class="bg-info">' + data[i].league_name + '</div><div class="p-1 " style="font-weight:bold;">' + tempFixture +'</div><div class="bg-warning" style="font-size:medium;font-weight:bold;">' + data[i].away + '</div></div>';
                     }
                     if(data[i].bet == 'o'){
                        dynaHtml += '<div class="row g-1 p-1 text-center border" style="font-weight:bold;"><div class="bg-info">' + data[i].league_name + '</div><div class="p-1 " style="font-weight:bold;">' + data[i].home +' vs '+ data[i].away +'</div><div>Total : '+data[i].rate+'</div><div class="bg-warning" style="font-size:medium;font-weight:bold;">Over</div></div>';
                     }
                     if(data[i].bet == 'u'){
                        dynaHtml += '<div class="row g-1 p-1 text-center border" style="font-weight:bold;"><div class="bg-info">' + data[i].league_name + '</div><div class="p-1 " style="font-weight:bold;">' + data[i].home +' vs '+ data[i].away +'</div><div>Total : '+data[i].rate+'</div><div class="bg-warning" style="font-size:medium;font-weight:bold;">Over</div></div>';
                     }
                  }
                  dynaHtml += '<div class="row g-1 p-1 justify-content-between  text-center border" style="font-weight:bold;"><h5><span   > ' + data[0].amount + ' </span></h5></div><div class="row g-1 p-1 justify-content-between  text-center border" style="font-weight:bold;"><h5><span   > ' + data[0].created_at + ' </span></h5></div><div></div>';
                     $('#divPreview').append(dynaHtml);

                      $('#historyPnl').modal('show');
                     }else{
                      alert("error occured!");
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
               var postData = {
                  voucher_id: v_id
                           };
               $.ajax({
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },

                  url: "{{  route('mm.detail') }}",
                  type: 'POST',
                  data: postData,
                  cache: false,
                  dataType: 'json',

                  success: function(data) {
                     if(data != null){
                      var tempFixture="";
                      var dynaHtml = "";
                      $('#divPreview').empty();
                      if(data[0].money_line_h > data[0].money_line_a){
                        tempFixture = data[0].home + ' vs (' +data[0].rate+ ') ' + data[0].away;
                      }else{
                        tempFixture = data[0].home + ' ('+data[0].rate+') vs' + data[0].away;

                      }
                      dynaHtml = '<div class=" p-5 justify-content-between text-dark" style="font-size:small;">';

                      if(data[0].bet == 'h'){
                        dynaHtml += '<div class="row g-1 p-1 text-center border" style="font-weight:bold;"><div class="bg-info">' + data[0].league_name + '</div><div class="p-1 " style="font-weight:bold;">' + tempFixture +'</div><div class="bg-warning" style="font-size:medium;font-weight:bold;">' + data[0].home + '</div></div></div>';
                      }
                      if(data[0].bet == 'a'){
                        dynaHtml += '<div class="row g-1 p-1 text-center border" style="font-weight:bold;"><div class="bg-info">' + data[0].league_name + '</div><div class="p-1 " style="font-weight:bold;">' + tempFixture +'</div><div class="bg-warning" style="font-size:medium;font-weight:bold;">' + data[0].away + '</div></div></div>';
                     }
                     if(data[0].bet == 'o'){
                        dynaHtml += '<div class="row g-1 p-1 text-center border" style="font-weight:bold;"><div class="bg-info">' + data[0].league_name + '</div><div class="p-1 " style="font-weight:bold;">' + data[0].home +' vs '+ data[0].away +'</div><div>Total : '+data[0].rate+'</div><div class="bg-warning" style="font-size:medium;font-weight:bold;">Over</div></div></div>';
                     }
                     if(data[0].bet == 'u'){
                        dynaHtml += '<div class="row g-1 p-1 text-center border" style="font-weight:bold;"><div class="bg-info">' + data[0].league_name + '</div><div class="p-1 " style="font-weight:bold;">' + data[0].home +' vs '+ data[0].away +'</div><div>Total : '+data[0].rate+'</div><div class="bg-warning" style="font-size:medium;font-weight:bold;">Over</div></div></div>';
                     }
                     dynaHtml += '<div class="row g-1 p-1 justify-content-between  text-center border" style="font-weight:bold;"><h5><span   > ' + data[0].amount + ' </span></h5></div><div class="row g-1 p-1 justify-content-between  text-center border" style="font-weight:bold;"><h5><span   > ' + data[0].created_at + ' </span></h5></div><div></div>';
                     console.log(dynaHtml);
                     $('#divPreview').append(dynaHtml);

                      $('#historyPnl').modal('show');
                     }else{
                      alert("error occured!");
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