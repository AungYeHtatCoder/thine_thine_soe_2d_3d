@extends('layouts.admin_app')


@section('content')
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <!-- Card header -->
            <div class="card-header pb-0">
                <div class="d-lg-flex">
                    <div>
                        <h5 class="mb-0">ဘောလုံးပွဲစဥ်များ</h5>

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
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ပွဲစမည့်ချိန်</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ပွဲစဥ်</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ပေါက်ကြေး</th>
                            <th class="text-right text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">လက်ရှိထိုးငွေ</th>
                            <th class="text-secondary opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($odds) && $odds->count())

                        @foreach($odds as $odd)
                        <?php
                        $mm_odd = "0";
                        $mm_Todd = "0";

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


                        ?>
                        <tr>

                            <td class="align-middle text-left text-sm">
                                @if(\Carbon\Carbon::parse($odd->starts)->diffInMinutes(\Carbon\Carbon::now())<= 10) <span class="badge bg-gradient-danger">{{$odd->starts}}</span>
                                    @elseif(\Carbon\Carbon::parse($odd->starts)->diffInMinutes(\Carbon\Carbon::now()) <= 30) <span class="badge bg-gradient-warning">{{$odd->starts}}</span>
                                        @else
                                        <span class="badge bg-gradient-success">{{$odd->starts}}</span>
                                        @endif
                            </td>
                            <td class="align-middle text-left text-sm">
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-xs"> {{$odd->home}} - {{$odd->away}}</h6>
                                        <p class="text-xs text-secondary mb-0">{{$odd->league_name}}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="align-middle text-left text-sm">
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        @if($odd->money_line_h < $odd->money_line_a)
                                            <h6 class="mb-0 text-xs"> {{$odd->home}} ({{$mm_odd}})</h6>
                                            @else
                                            <h6 class="mb-0 text-xs"> {{$odd->away}} ({{$mm_odd}})</h6>
                                            @endif
                                            <h6 class="mb-0 text-xs mt-2">ဂိုးပေါင်း ({{$mm_Todd}})</h6>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle text-right text-sm p-3" align="right">
                                {{$odd->total_amount == null ? 0: $odd->total_amount}}
                            </td>
                            <td class="align-middle text-left text-sm">
                            <a href="{{ route('admin.odd.status', ['id' => $odd->id,'status'=>'99']) }}" class="btn btn-info col-sm-12 float-right"  >ပိတ်မည်</a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="10">There are no odds.</td>
                        </tr>
                        @endif


                    </tbody>
                </table>

            </div>
            @if ($odds->total() != 0)
            <div class="row dflex p-3">
                <div class="col-sm-4 float-right p-3 mb-1">
                    {{ $odds->lastItem() }} of total {{ $odds->total() }}
                </div>
                <div class="col-sm-12 float-left p-1">
                    {{ $odds->links() }}
                </div>
            </div>
            @endif
        </div>

    </div>
</div>
@endsection


