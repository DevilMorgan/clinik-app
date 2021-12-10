@extends('tenant.layouts.app')

@section('content')

<div class="container-fluid p-0">
    <!-- Fila principal -->
    <div class="row">
        <!-- Tarjetas de las opciones del usuario -->
        <div class="col-12 col-md-8 col-lg-9 p-0">
            <div class="row card_option">
                <div class="col-6 col-md-5 col-lg-4 col-xl-3 mt-3">
                    <div class="card">
                        <a  href=''>
                            <div class="card-body">
                                <div class="card_icon_home">
                                    <i class="fas fa-users" aria-hidden="true"></i>
                                </div>
                                <div class="card_name_home">
                                    <span class="">Users</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-6 col-md-5 col-lg-4 col-xl-3 mt-3">
                    <div class="card">
                        <a  href=''>
                            <div class="card-body">
                                <div class="card_icon_home">
                                    <i class="fas fa-file-signature" aria-hidden="true"></i>
                                </div>
                                <div class="card_name_home">
                                    <span class="">Medical history</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-6 col-md-5 col-lg-4 col-xl-3 mt-3">
                    <div class="card">
                        <a  href=''>
                            <div class="card-body">
                                <div class="card_icon_home">
                                    <i class="fas fa-calendar-alt" aria-hidden="true"></i>
                                </div>
                                <div class="card_name_home">
                                    <span class="">Calendar</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-6 col-md-5 col-lg-4 col-xl-3 mt-3">
                    <div class="card">
                        <a  href=''>
                            <div class="card-body">
                                <div class="card_icon_home">
                                    <i class="fas fa-receipt" aria-hidden="true"></i>
                                </div>
                                <div class="card_name_home">
                                    <span class="">Type appoitment</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-6 col-md-5 col-lg-4 col-xl-3 mt-3">
                    <div class="card">
                        <a  href=''>
                            <div class="card-body">
                                <div class="card_icon_home">
                                    <i class="fas fa-handshake" aria-hidden="true"></i>
                                </div>
                                <div class="card_name_home">
                                    <span class="">Agreements</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-6 col-md-5 col-lg-4 col-xl-3 mt-3">
                    <div class="card">
                        <a  href=''>
                            <div class="card-body">
                                <div class="card_icon_home">
                                    <i class="fas fa-user-injured" aria-hidden="true"></i>
                                </div>
                                <div class="card_name_home">
                                    <span class="">Patients</span>
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
                        <a href="https://mipres.sispro.gov.co/MIPRESNOPBS/Login.aspx" target="_blank">
                            <div class="card-body">
                                <img src="{{ asset('img/logo/mipres-zaabra.png') }}" alt="">
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-6 col-md-12 col-lg-11 col-xl-10 mt-3">
                    <div class="card">
                        <a  href="https://www.medicamentosplm.com/colombia/Home" target="_blank">
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
