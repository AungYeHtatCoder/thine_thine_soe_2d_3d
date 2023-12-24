@extends('layouts.admin_app')
@section('styles')

@endsection
@section('content')
          {{-- 2d income row --}}
          <div class="row mb-4">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card  mb-2">
                <div class="card-header p-3 pt-2 bg-transparent">
                  <div class="icon icon-lg icon-shape bg-gradient-success shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                    <i class="fas fa-wallet"></i>
                  </div>
                  <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">2D Daily Income</p>
                    <h4 class="mb-0">{{ $dailyTotal }} MMK</h4>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mt-sm-0 mt-4">
              <div class="card  mb-2">
                <div class="card-header p-3 pt-2 bg-transparent">
                  <div class="icon icon-lg icon-shape bg-info shadow-primary shadow text-center border-radius-xl mt-n4 position-absolute">
                    <i class="fas fa-wallet"></i>
                  </div>
                  <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">2D Weekly Income</p>
                    <h4 class="mb-0">{{ $weeklyTotal }} MMK</h4>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mt-lg-0 mt-4">
              <div class="card  mb-2">
                <div class="card-header p-3 pt-2 bg-transparent">
                  <div class="icon icon-lg icon-shape bg-gradient-warning shadow-success text-center border-radius-xl mt-n4 position-absolute">
                    <i class="fas fa-wallet"></i>
                  </div>
                  <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize ">2D Monthly Income</p>
                    <h4 class="mb-0 ">{{ $monthlyTotal }} MMK</h4>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mt-lg-0 mt-4">
              <div class="card ">
                <div class="card-header p-3 pt-2 bg-transparent">
                  <div class="icon icon-lg icon-shape bg-gradient-danger shadow-info text-center border-radius-xl mt-n4 position-absolute">
                    <i class="fas fa-wallet"></i>
                  </div>
                  <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize ">2D Yearly Income </p>
                    <h4 class="mb-0 ">{{ $yearlyTotal }} MMK</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {{-- 2d income end  --}}
          {{-- 3d income start --}}
          <div class="row mb-5">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card  mb-2">
                <div class="card-header p-3 pt-2 bg-transparent">
                  <div class="icon icon-lg icon-shape bg-gradient-success shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                    <i class="fas fa-wallet"></i>
                  </div>
                  <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">3D Daily Income</p>
                    <h4 class="mb-0">{{ $three_d_dailyTotal }}MMK</h4>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mt-sm-0 mt-4">
              <div class="card  mb-2">
                <div class="card-header p-3 pt-2 bg-transparent">
                  <div class="icon icon-lg icon-shape bg-info shadow-primary shadow text-center border-radius-xl mt-n4 position-absolute">
                    <i class="fas fa-wallet"></i>
                  </div>
                  <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">3D Weekly Income</p>
                    <h4 class="mb-0">{{ $three_d_weeklyTotal }}MMK</h4>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mt-lg-0 mt-4">
              <div class="card  mb-2">
                <div class="card-header p-3 pt-2 bg-transparent">
                  <div class="icon icon-lg icon-shape bg-gradient-warning shadow-success text-center border-radius-xl mt-n4 position-absolute">
                    <i class="fas fa-wallet"></i>
                  </div>
                  <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize ">3D Monthly Income</p>
                    <h4 class="mb-0 ">{{ $three_d_monthlyTotal }}MMK</h4>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mt-lg-0 mt-4">
              <div class="card ">
                <div class="card-header p-3 pt-2 bg-transparent">
                  <div class="icon icon-lg icon-shape bg-gradient-danger shadow-info text-center border-radius-xl mt-n4 position-absolute">
                    <i class="fas fa-wallet"></i>
                  </div>
                  <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize ">3D Yearly Income </p>
                    <h4 class="mb-0 "> {{ $three_d_yearlyTotal }} MMK</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>

          {{-- 3d income end --}}
          {{-- second row start --}}
          <div class="row mt-5">
            {{-- session two reset start 1 --}}
            <div class="col-lg-6 col-md-6 col-sm-6 mb-5">
              <div class="card">
                <div class="d-flex">
                            <div class="avatar avatar-xl bg-gradient-warning border-radius-xl mt-n4 ms-3">
                                <i class="fas fa-rotate" style="font-size:25px;"></i>
                            </div>
                            <div class="ms-3 my-auto p-2">
                                <h6 class="mb-0"> 2D Session Reset</h6>
                                <div class="avatar-group">
                                    
                                    <form action="{{ route('admin.SessionReset') }}" method="POST">
                                      @csrf
                                      <button class="btn btn-primary mt-2" type="submit">Reset</button>
                                  </form>
                                </div>
                            </div>

                        </div>

                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                  <p class="mb-0"><span class="text-success text-sm font-weight-bolder">ပွဲချိန်ပြီး တခုပြီးတိုင်း  </span>၁၅ မိနစ်အတွင်း လုပ်ပေးရပါမည်။</p>
                </div>
              </div>
            </div>
            {{-- session reset 1 end --}}
            {{-- session reset 2 start --}}
            <div class="col-lg-6 col-md-6 col-sm-6 mb-5">
              <div class="card">
                <div class="d-flex">
                            <div class="avatar avatar-xl bg-gradient-danger border-radius-xl mt-n4 ms-3">
                                <i class="fas fa-rotate" style="font-size: 25px;"></i>
                            </div>
                            <div class="ms-3 my-auto p-2">
                                <h6 class="mb-0"> 2D Over Amount Limit Reset</h6>
                                <div class="avatar-group">
                                  <form action="{{ route('admin.OverAmountLimitSessionReset') }}" method="POST">
                                      @csrf
                                      <button class="btn btn-primary mt-2" type="submit">OverAmountLimitReset</button>
                                  </form>
                                </div>
                            </div>

                        </div>

                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                  <p class="mb-0"><span class="text-success text-sm font-weight-bolder">ပွဲချိန်ပြီး တခုပြီးတိုင်း  </span>၁၅ မိနစ်အတွင်း လုပ်ပေးရပါမည်။</p>
                </div>
              </div>
            </div>
            {{-- session reset 2 --}}
            <div class="col-lg-6 col-md-6 col-sm-6 mb-5">
              <div class="card">
                <div class="d-flex">
                            <div class="avatar avatar-xl bg-gradient-{{ $lottery_matches->is_active ? 'success' : 'danger' }} border-radius-xl ms-3 mt-n4">
                                <i class="fas fa-door-{{ $lottery_matches->is_active ? 'open' : 'closed' }}" style="font-size: 25px;"></i>
                            </div>
                            <div class="ms-3 my-auto p-2">
                                <h6 class="mb-0">All Sessions</h6>
                                <div class="avatar-group">
                                        <form action="{{ route('admin.OpenCloseTwoD' , $lottery_matches->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="is_active" value="{{ $lottery_matches->id }}">
                                            <div class="form-check form-switch ps-0">
                                                <input class="form-check-input ms-auto" type="checkbox"
                                                    id="flexSwitchCheckDefault" name="flexSwitchCheckDefault"
                                                    {{ $lottery_matches->is_active ? 'checked' : '' }}>
                                                <label class="form-check-label text-body mt-1 text-truncate w-80 mb-0"
                                                    for="flexSwitchCheckDefault">Close For 2D Session</label>
                                            </div>
                                            <button class="btn btn-primary" type="submit">Open / Close</button>
                                        </form>
                                    
                                </div>
                            </div>

                        </div>
                <hr class="horizontal my-0 dark">
                <div class="card-footer p-3">
                  <p class="mb-0 "><span class="text-success text-sm font-weight-bolder">2D Session </span>အဖွင့်အပိတ်ကို ဤနေရာမှ လုပ်ပေးရပါမည်။</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 mb-5">
              <div class="card ">
                {{-- 3d reset --}}
                <div class="d-flex">
                            <div class="avatar avatar-xl bg-gradient-warning border-radius-xl ms-3 mt-n4">
                                <i class="fas fa-rotate" style="font-size: 25px;"></i>
                            </div>
                            <div class="ms-3 my-auto p-2">
                                <h6 class="mb-0"> 3D Reset</h6>
                                <div class="avatar-group">
                                    
                                 <form action="{{ route('admin.ThreeDReset') }}" method="POST">
                                      @csrf
                                      <button class="btn btn-primary mt-5" type="submit">3D Reset</button>
                                  </form>
                                </div>
                            </div>

                        </div>
                <hr class="horizontal my-0 dark">
                <div class="card-footer p-3">
                  <p class="mb-0"><span class="text-success text-sm font-weight-bolder">3D ထွက်ပြီး </span>၁၀ နာရီအတွင်း လုပ်ဆောင်ပေးရပါမည်။</p>
                </div>
              </div>
            </div>
          </div>
          {{-- second row end --}}
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="{{ asset('admin_app/assets/js/plugins/chartjs.min.js')}}"></script>
{{-- pie chart --}}
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js">
</script>
<script src="{{ asset('admin_app/assets/js/dashboard.js')}}"></script>
<script src="{{ asset('admin_app/assets/js/v_1_dashboard.js')}}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    @if(session('SuccessRequest'))
    Swal.fire({
      icon: 'success',
      title: 'Success!',
      text: '{{ session("SuccessRequest") }}',
      timer: 3000,
      showConfirmButton: false
    });
    @endif

    // If you want to show an error or other types of alerts, you can add more conditions here
    @if(session('error'))
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: '{{ session("error") }}'
    });
    @endif
});

// For the reset confirmation, you can replace the native confirm with SweetAlert
$('form').on('submit', function(e) {
    e.preventDefault(); // prevent the form from submitting immediately
    var form = this;
    Swal.fire({
        title: 'Are you sure you want to reset?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, reset it!'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit(); // submit the form if confirmed
        }
    });
});


</script>

{{-- first chart end --}}
@endsection