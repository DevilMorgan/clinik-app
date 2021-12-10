@extends('tenant.layouts.app')

@section('content')

<div class="container-fluid p-0">
    <!-- Fila principal -->
    <div class="row m-0">
        <!-- Tarjetas de las opciones del usuario -->
        <div class="col-12 col-md-8 col-lg-9 p-0">
            <div class="row card_option">
                <div class="col-6 col-md-5 col-lg-4 col-xl-3 mt-3">
                    <div class="card">
                        <a  href="{{ route('tenant.manager.users.index') }}">
                            <div class="card-body">
                                <div class="card_icon_home">
                                    <i class="fas fa-users" aria-hidden="true"></i>
                                </div>
                                <div class="card_name_home">
                                    <span class="">{{ __('trans.users') }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-6 col-md-5 col-lg-4 col-xl-3 mt-3">
                    <div class="card">
                        <a  href="{{ route('tenant.manager.history-medical-categories.index') }}">
                            <div class="card-body">
                                <div class="card_icon_home">
                                    <i class="fas fa-file-signature" aria-hidden="true"></i>
                                </div>
                                <div class="card_name_home">
                                    <span class="">{{ __('trans.history-medical-categories') }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-6 col-md-5 col-lg-4 col-xl-3 mt-3">
                    <div class="card">
                        <a  href="{{ route('tenant.operative.calendar.index') }}">
                            <div class="card-body">
                                <div class="card_icon_home">
                                    <i class="fas fa-calendar-alt" aria-hidden="true"></i>
                                </div>
                                <div class="card_name_home">
                                    <span class="">{{ __('trans.calendar-operative') }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-6 col-md-5 col-lg-4 col-xl-3 mt-3">
                    <div class="card">
                        <a  href="{{ route('tenant.operative.date-type.index') }}">
                            <div class="card-body">
                                <div class="card_icon_home">
                                    <i class="fas fa-receipt" aria-hidden="true"></i>
                                </div>
                                <div class="card_name_home">
                                    <span class="">{{ __('trans.date-types') }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-6 col-md-5 col-lg-4 col-xl-3 mt-3">
                    <div class="card">
                        <a  href="{{ route('tenant.operative.agreement.index') }}">
                            <div class="card-body">
                                <div class="card_icon_home">
                                    <i class="fas fa-handshake" aria-hidden="true"></i>
                                </div>
                                <div class="card_name_home">
                                    <span class="">{{ __('trans.agreements') }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-6 col-md-5 col-lg-4 col-xl-3 mt-3">
                    <div class="card">
                        <a  href="{{ route('tenant.patients.index') }}">
                            <div class="card-body">
                                <div class="card_icon_home">
                                    <i class="fas fa-user-injured" aria-hidden="true"></i>
                                </div>
                                <div class="card_name_home">
                                    <span class="">{{ __('trans.patients-administrative') }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Tarjetas de logos Mipres y PLM -->
        <div class="col-12 col-md-3 p-0 mb-3 mb-md-0">
            <div class="row row_card_logos">
                <div class="col-6 col-md-12 col-lg-11 col-xl-10 mt-3">
                    <div class="card">
                        <a href="https://mipres.sispro.gov.co/MIPRESNOPBS/Login.aspx?ReturnUrl=%2fMIPRESNOPBS" target="_blank">
                            <div class="card-body">
                                <img src="{{ asset('img/logo/mipres-zaabra.png') }}" alt="">
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-6 col-md-12 col-lg-11 col-xl-10 mt-3">
                    <div class="card">
                        <a  href="https://www.prescripciontotal.com.co/consultorio-generico/login" target="_blank">
                            <div class="card-body">
                                <img src="{{ asset('img/logo/plm.png') }}" alt="">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection
