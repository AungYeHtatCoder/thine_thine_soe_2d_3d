@extends('layouts.admin_app')


@section('content')
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <!-- Card header -->
            <div class="card-header pb-0">
                <div class="d-lg-flex">
                    <div>
                        <h5 class="mb-0">ထိုးသားပွဲစဥ်များ</h5>

                    </div>
                    <div class="ms-auto my-auto mt-lg-0 mt-4">
                        <div class="ms-auto my-auto">

                            <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv" type="button" name="button">Export</button>
                        </div>
                    </div>
                </div>
            </div>
            @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                        @endif
            <div class="table-responsive">
                <table class="table table-flush" id="tbl_fixture">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ဘောက်ချာ/အချိန်</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ပွဲစဥ်</th>
                            <th class="text-right text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">လောင်းပွဲ</th>
                            <th class="text-right text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">လောင်းငွေ</th>
                            <th class="text-right text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ရလာဒ်</th>
                            <th class="text-right text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">နိုင်/ရှုံး</th>
                            <th class="text-secondary opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($mmbet) && $mmbet->count())

                        @foreach($mmbet as $mbet)

                        <tr>
                            <td class="align-middle text-left text-sm">
                            <h6 class="mb-0 text-xs">{{$mbet->voucher_id}}</h6>            
                            <p class="text-xs text-secondary mb-0">{{$mbet->created_at}}</p>
                            </td>

                            <td class="align-middle text-left text-sm">
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        @if($mbet->bet == 'h' || $mbet->bet == 'a')
                                            @if($mbet->money_line_h > $mbet->money_line_a)
                                            <h6 class="mb-0 text-xs"> {{$mbet->home}} - ($mbet->rate) {{$mbet->away}}</h6>
                                            @else
                                            <h6 class="mb-0 text-xs"> {{$mbet->home}} ($mbet->rate)  -  {{$mbet->away}}</h6>
                                            @endif
                                        @else
                                            <h6 class="mb-0 text-xs"> {{$mbet->home}} - {{$mbet->away}}  <span>Total ({{$mbet->rate}})</span></h6>
                                        @endif
                                        <p class="text-xs text-secondary mb-0">{{$mbet->league_name}}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="align-middle text-left text-sm">
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                       @if($mbet->bet == 'h')
                                        <h6 class="mb-0 text-xs"> {{$mbet->home}}</h6>
                                        </div>
                                        @elseif($mbet->bet == 'a')
                                        <h6 class="mb-0 text-xs"> {{$mbet->away}}</h6>
                                        </div>
                                        @elseif($mbet->bet == 'o')
                                        <h6 class="mb-0 text-xs"> Over </h6>
                                        </div>
                                        @else
                                        <h6 class="mb-0 text-xs"> Under </h6>
                                        </div>
                                        @endif
                                </div>
                            </td>
                            <td class="align-middle text-right text-sm p-3" align="right">
                                {{$mbet->amount == null ? 0: $mbet->amount}}
                            </td>
                            <td class="align-middle text-center text-sm p-3">
                                {{$mbet->result_h == null && $mbet->result_a == null ? '-' : $mbet->result_h-$mbet->result_a}}
                            </td>
                            <td class="align-middle text-center text-sm p-3">
                               @if($mbet->status == 1)
                               <span class="badge bg-gradient-warning">စောင့်ဆဲ</span>
                               @elseif($mbet->status == 2)
                               <span class="badge bg-gradient-success">နိုင်</span>
                               @elseif($mbet->status == 4)
                               <span class="badge bg-gradient-warning">ရှုံး</span>
                               @elseif($mbet->status == 99)
                               <span class="badge bg-gradient-dark" style="color:white;">ပယ်ဖျက်</span>
                               @endif

                            </td>
                            <td class="align-middle text-left text-sm">
                            @if($mbet->status != 99)
                            <a 
                            href="{{ route('admin.mmbet.status', ['id' => $mbet->id,'playerId'=>$mbet->playerId,'amount'=>$mbet->amount,'status'=>'99']) }}" class="btn btn-danger col-sm-12 float-right"  >ပယ်ဖျက်</a>
                            @endif
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="7">လောင်းထားသောပွဲများမရှိပါ</td>
                        </tr>
                        @endif


                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>
@endsection


