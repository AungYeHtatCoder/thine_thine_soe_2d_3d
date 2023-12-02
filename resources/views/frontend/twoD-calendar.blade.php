@extends('frontend.layouts.app')
@section('content')
<div class="row">
    <div
      class="col-lg-4 col-md-4 offset-lg-4 offset-md-4 mt-4 pt-5 headers shadow"
      style="height:100vh;"
    >    
      
    <h2 class="text-center" style="color: #f5bd02">2D Calendar</h2>

    <div class="row calendar-container">
      <div class="col-md-3">
        <div class="card">
          <div class="card-header">January</div>
          <div class="card-body">
            <div class="day-cell">1</div>
            <div class="day-cell">2</div>
          </div>
        </div>
      </div>


      <div class="col-md-3">
        <div class="card">
          <div class="card-header">February</div>
          <div class="card-body">
            
            <div class="day-cell">1</div>
            <div class="day-cell">2</div>
            
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-header">March</div>
          <div class="card-body">
            
            <div class="day-cell">1</div>
            <div class="day-cell">2</div>
            
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-header">April</div>
          <div class="card-body">
            
            <div class="day-cell">1</div>
            <div class="day-cell">2</div>
            
          </div>
        </div>
      </div>
    </div>
    </div>
</div>


@include('frontend.layouts.footer')
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    async function fetchData() {
      const url = 'https://shwe-2d-live-api.p.rapidapi.com/live';
      const options = {
        method: 'GET',
        headers: {
          'X-RapidAPI-Key': '4c6bcd02e8msh0665010fc0fab0fp1a2d33jsn173e389166b3',
          'X-RapidAPI-Host': 'shwe-2d-live-api.p.rapidapi.com'
        }
      };

      try {
        const response = await fetch(url, options);
        const result = await response.json(); // Parse the response as JSON


        // document.getElementById("two_d_live").innerText = result.live_result
        $("#updated_time").text(result.update);

        $("#two_d_live").text(result.live_result);
        $("#live_result").text(result.live_result);
        $("#live_set").text(result.live_set);
        $("#live_value").text(result.live_value);

        // $("#a9_result").text(result.a9_internet);
        $("#a9_internet").text(result.a9_internet);
        $("#a9_modern").text(result.a9_modern);

        $("#a12_result").text(result.a12_result);
        $("#a12_set").text(result.a12_set);
        $("#a12_value").text(result.a12_value);

        // $("#a2_result").text(result.a2_internet);
        $("#a2_internet").text(result.a2_internet);
        $("#a2_modern").text(result.a2_modern);

        $("#a43_result").text(result.a43_result);
        $("#a43_set").text(result.a43_set);
        $("#a43_value").text(result.a43_value);
        console.log(result);
      } catch (error) {
        console.error(error);
      }
    }
    fetchData();
</script>
@endsection
