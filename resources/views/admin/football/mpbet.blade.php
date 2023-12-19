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
                            <th class="text-uppercase text-secondary align-middle text-center text-xxs font-weight-bolder opacity-7">ပွဲပေါင်း</th>
                            <th class="text-right text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">လောင်းငွေ</th>
                            <th class="text-right text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">နိုင်/ရှုံး</th>
                            <th class="text-secondary opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($mixVoucher) )

                        @foreach($mixVoucher as $voucher)

                        <tr>
                            <td class="align-middle text-left text-sm">
                            <h6 class="mb-0 text-xs">{{$voucher->voucher_id}}</h6>            
                            <p class="text-xs text-secondary mb-0">{{$voucher->created_at}}</p>
                            </td>

                            <td class="align-middle text-center text-sm">
                            {{$voucher->TotalBet}}  - ပွဲ
                            </td>
                            <td class="align-middle text-right text-sm p-3" align="right">
                                {{$voucher->amount == null ? 0: $voucher->amount}}
                            </td>
                            
                            <td class="align-middle text-center text-sm p-3">
                               @if($voucher->status == 1)
                               <span class="badge bg-gradient-warning">စောင့်ဆဲ</span>
                               @elseif($voucher->status == 2)
                               <span class="badge bg-gradient-success">နိုင်</span>
                               @elseif($voucher->status == 4)
                               <span class="badge bg-gradient-warning">ရှုံး</span>
                               @elseif($voucher->status == 99)
                               <span class="badge bg-gradient-dark" style="color:white;">ပယ်ဖျက်</span>
                               @endif

                            </td>
                            <td class="align-middle text-left text-sm">
                            @if($voucher->status == 99)
                            <a 
                            href="{{ route('admin.mpbet.status', ['id' => $voucher->id,'status'=>'99']) }}" class="btn btn-danger col-sm-12 float-right"  >ပယ်ဖျက်</a>
                            @endif
                            <a 
                            href="#" class="btn btn-danger col-sm-12 float-right">  အသေးစိတ်ကြည့်ရန်</a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5">လောင်းထားသောပွဲများမရှိပါ</td>
                        </tr>
                        @endif


                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>
@endsection


