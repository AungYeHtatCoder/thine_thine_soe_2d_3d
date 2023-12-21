@extends('frontend.layouts.app')

@section('style')
<style>
 /* Style the tab */
 .tab {
  overflow: hidden;


  display: flex;
  justify-content: center;
  align-items: center;
  /* border: 1px solid #ccc;
  background-color: #f1f1f1; */
 }

 /* Style the buttons inside the tab */
 .tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;

 }

 /* Create an active/current tablink class */
 .tab button.active {
  /* background-color: #ccc; */
  border-bottom: 3px dashed goldenrod;
 }

 /* Style the tab content */
 .tabcontent {
  display: none;
  padding: 6px 12px;
  /* border: 1px solid #ccc; */
  border-top: none;
 }
</style>
@endsection

@section('content')
<div class="row">
 <div class="col-lg-4 col-md-4 text-white offset-lg-4 offset-md-4 mt-4 pt-4 headers" style="min-height: 100vh; ">
  <p class="text-center mt-4 fw-bold">ဂိုးရလဒ်များ</p>
  <div class="tab">
    <button class="tablinks active me-3 w-50 bet_styles" onclick="openTab(event, 'first_tab')">Yesterday</button>
    <button class="tablinks ms-3 w-50 bet_styles  " onclick="openTab(event, 'second_tab')">Today</button>
   </div>
  

   <?php

$json = Illuminate\Support\Facades\File::get(resource_path('views/football/yesterday.result.mock.json')); 
  
$json_data = json_decode($json,true); 
echo '<div id="first_tab" class="tabcontent mt-4" style="display: block;">';

foreach($json_data['Stages'] as $result){

   echo '
   <div>
    <p class="py-2 px-3 fw-bold" style=" background: #c50408;
       border: 1px solid gold;">'.$result['Cnm'].'-'.$result['Snm'].'</p>

    ';
   foreach ($result['Events'] as $eve) {
      $tmp_Esd = $eve['Esd'];
      $tmp_tr1 =  isset($eve['Tr1'])?$eve['Tr1']:"";
      $tmp_tr2 =  isset($eve['Tr2'])?$eve['Tr2']:"";

     $dt_tmp = date(substr($tmp_Esd,0,4).'/'.substr($tmp_Esd,4,2).'/'.substr($tmp_Esd,6,2).' '.substr($tmp_Esd,8,2).':'.substr($tmp_Esd,10,2).':'.substr($tmp_Esd,12,2));
     echo' <div class="d-flex justify-content-start align-items-center"> <p style="font-size: 12px;"> '.date('Y-m-d H:i:s', strtotime('+25 minutes', strtotime($dt_tmp))).'</p>
     <p class="fw-bold" style="margin-left: 20%;">'.$eve['Eps'].'</p>
    </div>
    <div class="d-flex justify-content-around">
     <p>'.$eve['T1'][0]['Nm'].'</p>
     <p>'.$tmp_tr1.'-'. $tmp_tr2.'</p>
     <p>'.$eve['T2'][0]['Nm'].'</p>
    </div>';
    break;
   }
    echo '</div>';
}
echo '</div>';
?>



<?php

$json = Illuminate\Support\Facades\File::get(resource_path('views/football/today.result.mock.json')); 
  
$json_data = json_decode($json,true); 
echo '<div id="second_tab" class="tabcontent mt-4">';

foreach($json_data['Stages'] as $result){

   echo '
   <div>
    <p class="py-2 px-3 fw-bold" style=" background: #c50408;
       border: 1px solid gold;">'.$result['Cnm'].'-'.$result['Snm'].'</p>

    ';
   foreach ($result['Events'] as $eve) {
      $tmp_Esd = $eve['Esd'];
      $tmp_tr1 =  isset($eve['Tr1'])?$eve['Tr1']:"";
      $tmp_tr2 =  isset($eve['Tr2'])?$eve['Tr2']:"";

     $dt_tmp = date(substr($tmp_Esd,0,4).'/'.substr($tmp_Esd,4,2).'/'.substr($tmp_Esd,6,2).' '.substr($tmp_Esd,8,2).':'.substr($tmp_Esd,10,2).':'.substr($tmp_Esd,12,2));
     echo' <div class="d-flex justify-content-start align-items-center"> <p style="font-size: 12px;"> '.date('Y-m-d H:i:s', strtotime('+25 minutes', strtotime($dt_tmp))).'</p>
     <p class="fw-bold" style="margin-left: 20%;">'.$eve['Eps'].'</p>
    </div>
    <div class="d-flex justify-content-around">
     <p>'.$eve['T1'][0]['Nm'].'</p>
     <p>'.$tmp_tr1.'-'. $tmp_tr2.'</p>
     <p>'.$eve['T2'][0]['Nm'].'</p>
    </div>';
    break;
   }
    echo '</div>';
}
echo '</div>';
?>

 </div>
 
</div>


@endsection

@section('script')
<script>
 function openTab(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
   tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
   tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
 }
</script>
@endsection