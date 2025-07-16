@extends('include.app')
@section('header')
    <script src="{{ asset('asset/script/settings.js') }}"></script>
@endsection

<style>
    .payment-gateway-card {
        background-color: rgb(245, 245, 245);
        border-radius: 10px;
    }
</style>

@section('content')
    <div>
        <ul class="nav nav-pills border-b mb-3  ml-0">

            <li role="presentation" class="nav-item"><a class="nav-link pointer active" href="#Section1" aria-controls="home"
                    role="tab" data-toggle="tab">{{ __('Settings') }}<span class="badge badge-transparent "></span></a>
            </li>

            <li role="presentation" class="nav-item"><a class="nav-link pointer" href="#Section2" role="tab"
                    data-toggle="tab">{{ __('Taxes') }}
                    <span class="badge badge-transparent "></span></a>
            </li>

            <li role="presentation" class="nav-item"><a class="nav-link pointer" href="#Section3" role="tab"
                    data-toggle="tab">{{ __('Payment Gateways') }}
                    <span class="badge badge-transparent "></span></a>
            </li>

            <li role="presentation" class="nav-item"><a class="nav-link pointer" href="#Section4" role="tab"
                    data-toggle="tab">{{ __('Admin Password') }}
                    <span class="badge badge-transparent "></span></a>
            </li>
        </ul>
    </div>

    <div class="tab-content tabs" id="home">
        {{-- Section 1 --}}
        <div role="tabpanel" class="card tab-pane active" id="Section1">
            <div class="card-header">
                <h4>{{ __('Settings') }}</h4>
            </div>
            <div class="card-body">

                <form Autocomplete="off" class="form-group form-border" id="globalSettingsForm" action=""
                    method="post">

                    @csrf

                    <div class="form-row ">
                        <div class="form-group col-md-3">
                            <label for="">{{ __('Currency') }}</label>
                            <input value="{{ $data->currency }}" type="text" class="form-control" name="currency"
                                required>
                        </div>



                        <div class="form-group col-md-3">
                            <label for="">{{ __('Platform Commission (%)') }}</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-percent"></i>
                                    </div>
                                </div>
                                <input value="{{ $data->comission }}" type="number" class="form-control" name="comission">
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">{{ __('Min. amount required to payout (Salon)') }}</label>
                            <input value="{{ $data->min_amount_payout_salon }}" type="text" class="form-control"
                                name="min_amount_payout_salon" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">{{ __('Number of bookings users can have at a time') }}</label>
                            <input value="{{ $data->max_order_at_once }}" type="text" class="form-control"
                                name="max_order_at_once" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="">{{ __('Max. Negative balance limit to use Post-Pay option (Salon)') }}</label>
                            <input value="{{ $data->max_minus_balance_for_postpay_option }}" max="0" type="number" class="form-control"
                                name="max_minus_balance_for_postpay_option" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">{{ __('Support Email') }}</label>
                            <input value="{{ $data->support_email }}" type="text" class="form-control"
                                name="support_email" required>
                        </div>
                    </div>

                    <div class="form-group-submit">
                        <button class="btn btn-primary " type="submit">{{ __('Save') }}</button>
                    </div>

                </form>
            </div>
        </div>
        {{-- Section 2 --}}
        <div role="tabpanel" class="card tab-pane" id="Section2">
            <div class="card-header">
                <h4>{{ __('Taxes') }}</h4>

                <a data-toggle="modal" data-target="#addTaxModal" href=""
                    class="ml-auto btn btn-primary text-white">{{ __('Add Tax') }}</a>
            </div>
            <div class="card-body">
                <div class="table-responsive col-12">
                    <table class="table table-striped w-100 word-wrap" id="taxesTable">
                        <thead>
                            <tr>
                                <th>{{ __('Tax Title') }}</th>
                                <th>{{ __('Type') }}</th>
                                <th>{{ __('Value') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        {{-- Section 3 --}}
        <div role="tabpanel" class="card tab-pane" id="Section3">
            <div class="card-header">
                <h5 class="text-dark">{{ __('Payment Gateways') }}</h5>
            </div>
            <div class="card-body">
                <form Autocomplete="off" class="form-group form-border" id="paymentGatewayForm" action=""
                    method="post">

                    @csrf
                    <div class="">
                        <span>- The platform uses Stripe as the payment gateway for wallet recharges.</span><br>
                        <span>- Ensure the <strong>Currency Code</strong> is supported by Stripe. See supported currencies: <a href="https://stripe.com/docs/currencies" target="_blank">https://stripe.com/docs/currencies</a></span><br>
                        <span>- Ensure the <strong>Currency Symbol</strong> matches the selected <strong>Currency Code</strong> to avoid user confusion.</span><br>
                    </div>
                    <div class="form-row mt-3">
                        <div class="form-group col-md-4">
                            <label for="">{{ __('Payment Gateway') }}</label>
                            <input type="hidden" name="payment_gateway" value="1">
                            <input type="text" class="form-control" value="{{ __('Stripe') }}" readonly>
                        </div>
                    </div>

                    {{-- Stripe --}}
                    <h5 class="text-dark d-block">{{ __('Stripe') }}</h5>
                    <p class="text-muted">{{ __('Supported Currencies :') }} <a href="https://stripe.com/docs/currencies"
                            target="_blank">https://stripe.com/docs/currencies</a> </p>

                    <div class="form-row payment-gateway-card p-2">
                        <div class="form-group col-md-4">
                            <label for="">{{ __('Public Key') }}</label>
                            <input value="{{ $data->stripe_publishable_key }}" type="text" class="form-control"
                                name="stripe_publishable_key">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">{{ __('Secret Key') }}</label>
                            <input value="{{ $data->stripe_secret }}" type="text" class="form-control"
                                name="stripe_secret">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">{{ __('Currency Code (***)') }}</label>
                            <input value="{{ $data->stripe_currency_code }}" type="text" class="form-control"
                                name="stripe_currency_code">
                        </div>
                    </div>

                    <div class="form-group-submit mt-3">
                        <button class="btn btn-primary " type="submit">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- Section 4 --}}
        <div role="tabpanel" class="card tab-pane" id="Section4">
            <div class="card-header">
                <h6 class="text-dark">{{ __('Admin Password') }}</h6>
            </div>
            <div class="card-body">

                <form Autocomplete="off" class="form-group form-border" id="passwordForm" action=""
                    method="post">

                    @csrf
                    <div class="">
                        <span>To change the password: Enter the password below and click on save.</span>
                    </div>
                    <div class="form-row mt-3">
                        <div class="form-group col-md-4">
                            <label for="">{{ __('Old Password') }}</label>
                            <input type="text" class="form-control" name="old_password" value="" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">{{ __('New Password') }}</label>
                            <input type="text" class="form-control" name="new_password" value="" required>
                        </div>

                    </div>
                    <div class="form-group-submit">
                        <button class="btn btn-primary " type="submit">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>

    </div>





    {{-- Add tax Modal --}}
    <div class="modal fade" id="addTaxModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>{{ __('Add Tax') }}</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="" method="post" enctype="multipart/form-data" id="addTaxForm"
                        autocomplete="off">
                        @csrf

                        <div class="form-group">
                            <label> {{ __('Tax Title') }}</label>
                            <input type="text" name="tax_title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label> {{ __('Type') }}</label>
                            <select name="type" class="form-control">
                                <option value="0">{{ __('Percent') }}</option>
                                <option value="1">{{ __('Fixed') }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label> {{ __('Value') }}</label>
                            <input type="number" name="value" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary mr-1" type="submit" value=" {{ __('Submit') }}">
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    {{-- Edit tax Modal --}}
    <div class="modal fade" id="editTaxModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>{{ __('Edit Tax') }}</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="" method="post" enctype="multipart/form-data" id="editTaxForm"
                        autocomplete="off">
                        @csrf

                        <input type="hidden" name="id" id="editTaxId">

                        <div class="form-group">
                            <label> {{ __('Tax Title') }}</label>
                            <input id="edit_tax_title" type="text" name="tax_title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label> {{ __('Type') }}</label>
                            <select id="edit_tax_type" name="type" class="form-control">

                            </select>
                        </div>
                        <div class="form-group">
                            <label> {{ __('Value') }}</label>
                            <input id="edit_tax_value" type="number" name="value" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary mr-1" type="submit" value=" {{ __('Submit') }}">
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
