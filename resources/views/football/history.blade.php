@extends('frontend.layouts.app')
@section('content')

<?php $flagHistory = 0; ?>
<div class="row mb-5" style="font-size:x-small;">
<div class="col-lg-4 mb-5 col-md-4 text-white offset-lg-4 offset-md-4 mt-4 pt-4 headers" style="min-height: 100vh; ">
<div class="card child-div mt-5">
      <div id="div-filter" class="row pt-2 text-center">
        <div  class="col active">
          <a
            href="#" onclick="mx_show();" style="color: black; text-decoration: none">
            <img src="{{ asset('user_app/assets/images/football/pitch.png') }}" class="mx-auto" width="40px" height="40px" alt="">
            <p style="font-size: 11px">မောင်းပွဲများ</p>
          </a>
        </div>
        <div   class="col">
          <a
            href="#" onclick="mm_show();" 
            style="color: black; text-decoration: none">
            <img src="{{ asset('user_app/assets/images/football/football.png') }}" class="mx-auto" width="40px" height="40px" alt="">
            <p style="font-size: 11px">ဘော်ဒီ/ဂိုးပေါင်းပွဲများ</p>
          </a>
        </div>
      </div>
    </div>
 <?php

if ($mixHistory != null) {
   echo '<div id="mx_div" class="active">';
   foreach($mixVoucher as $voucher){
      echo '<div  class="card text-center p-0 mt-3" style="background-color: rgb(0 0 0 / 51%)!important; border: 2px solid #ebc03c; color: #ffffff; box-shadow: 2px 10px 8px 0 rgba(0, 0, 0, 0.2), 2px 10px 10px 0 rgba(0, 0, 0, 0.19)"
      ><div class="card-body"><p class="text-center text-white">ဘောက်ချာနံပါတ် '.$voucher->voucher_id .'</p><p> ပွဲပေါင်း - '.$voucher->TotalBet.'</p>';
    foreach($mixHistory as $mp)
    {
    
      if($mp->voucher_id == $voucher->voucher_id){
         $tempFixture = '';
         $selected = '';
         $progress = '';
         $progressCss = '';
         $result = '';

          switch($mp->status){
            case 4 :$progress = "ရှုံး";
            $progressCss = 'bg-danger';break;
            case 3 :$progress = "သရေ";
            $progressCss = 'bg-info';break;
            case 2 :$progress = "နိုင်";
            $progressCss = 'bg-success';break;
            case 1 :$progress = "စောင့်ဆဲ";
            $progressCss = 'bg-warning';break;
          }
          switch($mp->bet){
            case 'h' : $selected = $mp->home;     
                  if($mp->money_line_h > $mp->money_line_a){
                     $tempFixture = $mp->home .' vs (' .$mp->rate.') ' .$mp->away;
                  }else{
                     $tempFixture = $mp->home .' ('.$mp->rate.') vs' .$mp->away;
                  }break;
            case 'a' : $selected = $mp->away;  
            if($mp->money_line_h > $mp->money_line_a){
               $tempFixture = $mp->home .' vs  <span style="font-size:small;font-weight:bold;">(' .$mp->rate.')</span> ' .$mp->away;
            }else{
               $tempFixture = $mp->home .' <span style="font-size:small;font-weight:bold;">('.$mp->rate.') </span> vs' .$mp->away;
            }break;
            case 'o' : $selected = 'Over';
            $tempFixture = $mp->home .' vs ' .$mp->away .' Total : '.$mp->rate;
            break;
            case 'u' : $selected = 'Under';
            $tempFixture = $mp->home .' vs ' .$mp->away .' Total : '.$mp->rate;
            break;
          }
          if($mp->result_h == null){
            $result = 'x';
          }else{
            $result = $result_h .'-'.$result_a;

          }
         echo '<div class="border p-3"><div class="text-center"><div class="d-flex justify-content-between text-center"><p>ပွဲစဥ်</p><p>'.$tempFixture.'</p><p></p></div><div class="d-flex justify-content-between text-center"><p> ရွေးချယ်ထားသော  </p><p>'.$selected.'</p><p>ရလာဒ် </p><p>'.$result.'</p><p class="badge '.$progressCss.'">'.$progress.'</p></div></div></div>';
      }
    
    }
    echo '</div></div>';
   }
   echo '</div>';
} 
if ($mmHistory != null) {
   echo '<div id="mm_div" style="display:none;">';
     
    foreach($mixHistory as $mp)
    {
      echo '<div  class="card text-center p-0 mt-3" style="background-color: rgb(0 0 0 / 51%)!important; border: 2px solid #ebc03c; color: #ffffff; box-shadow: 2px 10px 8px 0 rgba(0, 0, 0, 0.2), 2px 10px 10px 0 rgba(0, 0, 0, 0.19)"
      ><div class="card-body"><p class="text-center text-white">ဘောက်ချာနံပါတ် '.$mp->voucher_id .'</p>';
         $tempFixture = '';
         $selected = '';
         $progress = '';
         $progressCss = '';
         $result = '';

          switch($mp->status){
            case 4 :$progress = "ရှုံး";
            $progressCss = 'bg-danger';break;
            case 3 :$progress = "သရေ";
            $progressCss = 'bg-info';break;
            case 2 :$progress = "နိုင်";
            $progressCss = 'bg-success';break;
            case 1 :$progress = "စောင့်ဆဲ";
            $progressCss = 'bg-warning';break;
          }
          switch($mp->bet){
            case 'h' : $selected = $mp->home;     
                  if($mp->money_line_h > $mp->money_line_a){
                     $tempFixture = $mp->home .' vs (' .$mp->rate.') ' .$mp->away;
                  }else{
                     $tempFixture = $mp->home .' ('.$mp->rate.') vs' .$mp->away;
                  }break;
            case 'a' : $selected = $mp->away;  
            if($mp->money_line_h > $mp->money_line_a){
               $tempFixture = $mp->home .' vs  <span style="font-size:small;font-weight:bold;">(' .$mp->rate.')</span> ' .$mp->away;
            }else{
               $tempFixture = $mp->home .' <span style="font-size:small;font-weight:bold;">('.$mp->rate.') </span> vs' .$mp->away;
            }break;
            case 'o' : $selected = 'Over';
            $tempFixture = $mp->home .' vs ' .$mp->away .' Total : '.$mp->rate;
            break;
            case 'u' : $selected = 'Under';
            $tempFixture = $mp->home .' vs ' .$mp->away .' Total : '.$mp->rate;
            break;
          }
          if($mp->result_h == null){
            $result = 'x';
          }else{
            $result = $result_h .'-'.$result_a;

          }
         echo '<div class="border p-3"><div class="text-center"><div class="d-flex justify-content-between text-center"><p>ပွဲစဥ်</p><p>'.$tempFixture.'</p><p></p></div><div class="d-flex justify-content-between text-center"><p> ရွေးချယ်ထားသော  </p><p>'.$selected.'</p><p>ရလာဒ် </p><p>'.$result.'</p><p class="badge '.$progressCss.'">'.$progress.'</p></div></div></div></div></div>';
      }
    
    echo '</div>';
} 

?>
</div>
</div>
@include('frontend.layouts.footer')

</div>

              
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<!-- Bootstrap JavaScript and dependencies -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>

var btnContainer = document.getElementById("div-filter");
var btns = btnContainer.getElementsByClassName("col");

for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}

   function mx_show(){
      document.getElementById("mm_div").style.display = "none";
      document.getElementById("mx_div").style.display = "block";

   }
   function mm_show(){
      document.getElementById("mm_div").style.display = "block";
      document.getElementById("mx_div").style.display = "none";
   }
           
            </script>
@endsection