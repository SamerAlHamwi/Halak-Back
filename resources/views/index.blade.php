@extends('include.app')
@section('header')
    <script src="{{ asset('asset/script/index.js') }}"></script>
@endsection

@section('content')
    <style>
        .chartjs-render-monitor {
            -webkit-animation: chartjs-render-animation 0.001s;
            animation: chartjs-render-animation 0.001s;
        }

        *,
        ::after,
        ::before {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        .mainbg {
            background-color: #156779 !important;
        }

        .card-icon2 {
            width: 50px;
            height: 50px;
            line-height: 50px;
            font-size: 22px;
            margin: 5px 0px;
            box-shadow: 2px 2px 10px 0 #97979794;
            border-radius: 10px;
            background: #6777ef;
            text-align: center;
        }


        .maincolor {
            color: white !important;
        }

        .text-theme-color {
            color: #28879c !important;
        }

        .text-grey {
            color: #747474 !important;
        }

        .records-tab-div p {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: whitesmoke;
            margin-top: 7px !important;
            margin-bottom: 0 !important;
            padding: 0 10px;
            border-radius: 5px;
        }
    </style>



    <section class="section">
        <div class="ml-4 my-3">

            <h5 class="d-inline">{{ __('Bookings') }}</h5>
            <a href="{{ route('bookings') }}"><span class="badge bg-primary text-white">{{ __('Check') }}</span></a>
        </div>

        <div class="row col-12">
            {{-- Today Bookings --}}
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div>
                                        <h4 class="font-18 mt-1 text-theme-color">{{ __('Today') }}</h4>
                                        <div class="records-tab-div">
                                            <p class="text-grey">
                                                {{ __('Total : ') }}<strong>{{ $todayTotalBookings }}
                                                </strong></p>
                                            <p class="text-grey">
                                                {{ __('Pending : ') }}<strong>{{ $todayTotalPendingBookings }}</strong>
                                            </p>
                                            <p class="text-grey">
                                                {{ __('Accepted : ') }}<strong>{{ $todayTotalAcceptedBookings }}</strong>
                                            </p>
                                            <p class="text-grey">
                                                {{ __('Completed : ') }}<strong>{{ $todayTotalCompletedBookings }}</strong>
                                            </p>
                                            <p class="text-grey">
                                                {{ __('Cancelled : ') }}<strong>{{ $todayTotalCancelledBookings }}</strong>
                                            </p>
                                            <p class="text-grey">
                                                {{ __('Declined : ') }}<strong>{{ $todayTotalDeclinedBookings }}</strong>
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Last 7 Bookings --}}
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div>
                                        <h4 class="font-18 mt-1 text-theme-color">{{ __('Last 7 Days') }}</h4>
                                        <div class="records-tab-div">
                                            <p class="text-grey">
                                                {{ __('Total : ') }}<strong>{{ $last7daysTotalBookings }}</strong></p>
                                            <p class="text-grey">
                                                {{ __('Pending : ') }}<strong>{{ $last7daysTotalPendingBookings }}</strong>
                                            </p>
                                            <p class="text-grey">
                                                {{ __('Accepted : ') }}<strong>{{ $last7daysTotalAcceptedBookings }}</strong>
                                            </p>
                                            <p class="text-grey">
                                                {{ __('Completed : ') }}<strong>{{ $last7daysTotalCompletedBookings }}</strong>
                                            </p>
                                            <p class="text-grey">
                                                {{ __('Cancelled : ') }}<strong>{{ $last7daysTotalCancelledBookings }}</strong>
                                            </p>
                                            <p class="text-grey">
                                                {{ __('Declined : ') }}<strong>{{ $last7daysTotalDeclinedBookings }}</strong>
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Last 30 days Bookings --}}
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div>
                                        <h4 class="font-18 mt-1 text-theme-color">{{ __('Last 30 Days') }}</h4>
                                        <div class="records-tab-div">
                                            <p class="text-grey">
                                                {{ __('Total : ') }}<strong>{{ $last30daysTotalBookings }}</strong></p>
                                            <p class="text-grey">
                                                {{ __('Pending : ') }}<strong>{{ $last30daysTotalPendingBookings }}</strong>
                                            </p>
                                            <p class="text-grey">
                                                {{ __('Accepted : ') }}<strong>{{ $last30daysTotalAcceptedBookings }}</strong>
                                            </p>
                                            <p class="text-grey">
                                                {{ __('Completed : ') }}<strong>{{ $last30daysTotalCompletedBookings }}</strong>
                                            </p>
                                            <p class="text-grey">
                                                {{ __('Cancelled : ') }}<strong>{{ $last30daysTotalCancelledBookings }}</strong>
                                            </p>
                                            <p class="text-grey">
                                                {{ __('Declined : ') }}<strong>{{ $last30daysTotalDeclinedBookings }}</strong>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- All time Bookings --}}
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div>
                                        <h4 class="font-18 mt-1 text-theme-color">{{ __('All Time') }}</h4>
                                        <div class="records-tab-div">
                                            <p class="text-grey">
                                                {{ __('Total : ') }}<strong>{{ $allTimeTotalBookings }}</strong></p>
                                            <p class="text-grey">
                                                {{ __('Pending : ') }}<strong>{{ $allTimeTotalPendingBookings }}</strong>
                                            </p>
                                            <p class="text-grey">
                                                {{ __('Accepted : ') }}<strong>{{ $allTimeTotalAcceptedBookings }}</strong>
                                            </p>
                                            <p class="text-grey">
                                                {{ __('Completed : ') }}<strong>{{ $allTimeTotalCompletedBookings }}</strong>
                                            </p>
                                            <p class="text-grey">
                                                {{ __('Cancelled : ') }}<strong>{{ $allTimeTotalCancelledBookings }}</strong>
                                            </p>
                                            <p class="text-grey">
                                                {{ __('Declined : ') }}<strong>{{ $allTimeTotalDeclinedBookings }}</strong>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="ml-4 my-3">
            <h5 class="d-inline">{{ __('Salons') }}</h5>
            <a href="{{ route('salons') }}"><span class="badge bg-primary text-white">{{ __('Check') }}</span></a>
        </div>
        <div class="row col-12">
            {{-- Active Salons --}}
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 ">
                                    <div>
                                        <h4 class="mb-2 ">{{ $activeSalons }}</h4>
                                        <h5 class="font-15 mt-1 text-grey">{{ __('Active Salons') }}</h5>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Pending Salons --}}
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 ">
                                    <div>
                                        <h4 class="mb-2 ">{{ $salonRequests }}</h4>
                                        <h5 class="font-15 mt-1 text-grey">{{ __('Salon Requests') }}</h5>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Banned Salons --}}
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 ">
                                    <div>
                                        <h4 class="mb-2 ">{{ $bannedSalons }}</h4>
                                        <h5 class="font-15 mt-1 text-grey">{{ __('Banned Salons') }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- singUpOnlySalons Salons --}}
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 ">
                                    <div>
                                        <h4 class="mb-2 ">{{ $singUpOnlySalons }}</h4>
                                        <h5 class="font-15 mt-1 text-grey">{{ __('Salons Signup Only') }}</h5>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Platform Earnings --}}
        <div class="ml-4 my-3">
            <h5 class="d-inline">{{ __('Platform Earnings') }}</h5>
            <a href="{{ route('platformEarnings') }}"><span
                    class="badge bg-primary text-white">{{ __('Check') }}</span></a>
        </div>
        <div class="row col-12">
            {{-- Today Earnings --}}
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 ">
                                    <div>
                                        <h4 class="mb-2 ">{{ $settings->currency }}{{ $todayEarnings }}</h4>
                                        <h5 class="font-15 mt-1 text-grey">{{ __('Today') }}</h5>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Last 7 days Earnings --}}
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 ">
                                    <div>
                                        <h4 class="mb-2 ">{{ $settings->currency }}{{ $last7DaysEarnings }}</h4>
                                        <h5 class="font-15 mt-1 text-grey">{{ __('Last 7 Days') }}</h5>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Last 30 days Earnings --}}
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 ">
                                    <div>
                                        <h4 class="mb-2 ">{{ $settings->currency }}{{ $last30DaysEarnings }}</h4>
                                        <h5 class="font-15 mt-1 text-grey">{{ __('Last 30 Days') }}</h5>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- All time Earnings --}}
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 ">
                                    <div>
                                        <h4 class="mb-2 ">{{ $settings->currency }}{{ $allTimeDaysEarnings }}</h4>
                                        <h5 class="font-15 mt-1 text-grey">{{ __('All Time') }}</h5>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- Withdrwals  --}}
        <div class="ml-4 my-3">
            <h5 class="d-inline">{{ __('Withdrawals') }}</h5>
        </div>
        <div class="row col-12">
            {{-- Pending Payouts Salon --}}
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 ">
                                    <div>
                                        <h4 class="mb-2 ">{{ $settings->currency }}{{ $pendingSalonPayouts }}</h4>
                                        <h5 class="font-15 mt-1 text-grey">{{ __('Pending Payouts (Salon)') }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Completed --}}
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 ">
                                    <div>
                                        <h4 class="mb-2 ">{{ $settings->currency }}{{ $completedSalonPayouts }}</h4>
                                        <h5 class="font-15 mt-1 text-grey">{{ __('Completed Payouts (Salon)') }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- pending User --}}
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 ">
                                    <div>
                                        <h4 class="mb-2 ">{{ $settings->currency }}{{ $pendingUserPayouts }}</h4>
                                        <h5 class="font-15 mt-1 text-grey">{{ __('Pending Payouts (User)') }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Wallet Recharge  --}}
        <div class="ml-4 my-3">
            <h5 class="d-inline">{{ __('User Wallet Recharge') }}</h5>
            <a href="{{ route('userWalletRecharge') }}"><span
                    class="badge bg-primary text-white">{{ __('Check') }}</span></a>
        </div>
        <div class="row col-12">
            {{-- Today Recharges --}}
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 ">
                                    <div>
                                        <h4 class="mb-2 ">{{ $settings->currency }}{{ $todayRecharges }}</h4>
                                        <h5 class="font-15 mt-1 text-grey">{{ __('Today') }}</h5>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Last 7 days Earnings --}}
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 ">
                                    <div>
                                        <h4 class="mb-2 ">{{ $settings->currency }}{{ $last7DaysRecharges }}</h4>
                                        <h5 class="font-15 mt-1 text-grey">{{ __('Last 7 Days') }}</h5>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Last 30 days Reacharges --}}
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 ">
                                    <div>
                                        <h4 class="mb-2 ">{{ $settings->currency }}{{ $last30DaysRecharges }}</h4>
                                        <h5 class="font-15 mt-1 text-grey">{{ __('Last 30 Days') }}</h5>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- All time Recharges --}}
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 ">
                                    <div>
                                        <h4 class="mb-2 ">{{ $settings->currency }}{{ $allTimeRecharges }}</h4>
                                        <h5 class="font-15 mt-1 text-grey">{{ __('All Time') }}</h5>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
