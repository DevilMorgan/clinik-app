@extends('medhistoria.layouts.app')
@section('title', __('trans.home'))

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/DataTables/css/jquery.dataTables.min.css') }}"/>  
@endsection

@section('content')
    <!-- Bread crumb and right sidebar toggle -->
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h2 class="text-themecolor mb-0" style="font-weight: bold"> Inicio</h2>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)">{{ __('trans.home') }}</a>
                </li>
                <li class="breadcrumb-item ">{{ __('trans.home') }}</li>
            </ol>
        </div>
        <div class="col-md-7 col-12 align-self-center d-none d-md-block">

        </div>
    </div>
    <!-- End Bread crumb and right sidebar toggle -->

    <!-- CONTENEDOR PRINCIPAL  -->
    <div class="container-fluid">
        <div class="row">
            <!-- PRIMERA COLUMNA DEL CONTENEDOR PRINCIPAL -->
            <div class="col-md-8 align-items-stretch pe-0">
                <div class="row">
                    <div class="row">
                        <!-- Mipres -->
                        <div class="col-md-4">
                            <a href="https://mipres.sispro.gov.co/MIPRESNOPBS/Login.aspx?ReturnUrl=%2fMIPRESNOPBS" target="_blank">
                                <div class="card p-3">
                                    <img src="{{ asset('img/medhistoria') }}/logos/mipres-zaabra.png" alt="" class="m-auto" width="150">
                                </div>
                            </a>
                        </div>
                        <!-- PLM -->
                        <div class="col-md-4">
                            <a  href="https://www.prescripciontotal.com.co/consultorio-generico/login" target="_blank">
                                <div class="card p-3">
                                    <img src="{{ asset('img/medhistoria') }}/logos/plm.png" alt="" class="m-auto" width="176">
                                </div>
                            </a>
                        </div>
                        <!-- Zaabra Salud -->
                        <div class="col-md-4">
                            <a  href="https://zaabrasalud.co/" target="_blank">
                                <div class="card p-3">
                                    <img src="{{ asset('img/medhistoria') }}/logos/Zaabra-Salud-logo.jpg" alt="" class="m-auto" width="93">
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <div class="row">
                        <!-- Mis Pacientes -->
                        <div class="col-md-6 d-flex align-items-stretch"> 
                            <div class="card w-100">
                                <div class="card-header bg-success px-5 py-4">
                                    <h3 class="text-white fw_bold fs-14 m-0">{{ __('trans.my_patient') }}</h3>
                                    <a href="javascript:void(0)" class="btn btn-info fs-4 home_top_btn px-4">{{ __('trans.see_patient') }}</a>
                                </div>

                                <div class="my-3" style="height: 175px">
                                    <table class="data_table">
                                        <tbody>
                                            <tr>
                                                <td class="py-0 pe-0">
                                                    <div class="d-flex flex-row align-items-center comment-row py-0 p-3">
                                                        <div class="profile-img p-2">
                                                            <img src="{{ asset('img/medhistoria') }}/users/1.jpg" alt="user" class="rounded-circle" width="45"/>
                                                        </div>
                                                        <div class="lh-1 ps-2">
                                                            <h6 class="card-title txt_blue_300 fs-3 m-0 d-block">Barney Gómez</h6>
                                                            <span class="card-text font_openSans txt_dark_400 fs-2">
                                                                Barney Gómez amoduff@wrappixel.com
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center py-0">
                                                    <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información del paciente">
                                                        <i data-feather="eye" class="icon_info"></i>
                                                    </a>
                                                    <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar información del paciente">
                                                        <i data-feather="edit-3" class="icon_info"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="py-0 pe-0">
                                                    <div class="d-flex flex-row align-items-center comment-row py-0 p-3">
                                                        <div class="profile-img p-2">
                                                            <img src="{{ asset('img/medhistoria') }}/users/1.jpg" alt="user" class="rounded-circle" width="45"/>
                                                        </div>
                                                        <div class="lh-1 ps-2">
                                                            <h6 class="card-title txt_blue_300 fs-3 m-0 d-block">Edna Krabappel</h6>
                                                            <span class="card-text font_openSans txt_dark_400 fs-2">
                                                                edna1987@gmail.com
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center py-0">
                                                    <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información del paciente">
                                                        <i data-feather="eye" class="icon_info"></i>
                                                    </a>
                                                    <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar información del paciente">
                                                        <i data-feather="edit-3" class="icon_info"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="py-0 pe-0">
                                                    <div class="d-flex flex-row align-items-center comment-row py-0 p-3">
                                                        <div class="profile-img p-2">
                                                            <img src="{{ asset('img/medhistoria') }}/users/1.jpg" alt="user" class="rounded-circle" width="45"/>
                                                        </div>
                                                        <div class="lh-1 ps-2">
                                                            <h6 class="card-title txt_blue_300 fs-3 m-0 d-block">Moe Sislack </h6>
                                                            <span class="card-text font_openSans txt_dark_400 fs-2">
                                                                dondemoe@gmail.com
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center py-0">
                                                    <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información del paciente">
                                                        <i data-feather="eye" class="icon_info"></i>
                                                    </a>
                                                    <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar información del paciente">
                                                        <i data-feather="edit-3" class="icon_info"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Proximas Citas -->
                        <div class="col-md-6 d-flex align-items-stretch">
                            <div class="card w-100">
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between pt-3">
                                        <h3 class="card-title txt_blue_bold fs-14 m-0">{{ __('trans.upcoming_appointment') }}</h3>
                                        <a href="javascript:void(0)" class="btn btn-info fs-4 px-4">{{ __('trans.see_appointment') }}</a>
                                    </div>
                                    
                                    <div class="mt-4" style="height: 175px">
                                        <table class="data_table w-100" cellpadding="13">
                                            <tbody>
                                                <tr>
                                                    <td class="pe-0">
                                                        <span class="txt_dark_400 font_openSans fs-5">Cita de Control</span>
                                                    </td>
                                                    <td>
                                                        <span class="badge fs-2" style="background: #DE714B; padding: 3px 21px">Hoy</span>
                                                    </td>
                                                    <td>
                                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                                            <i data-feather="edit-3" class="icon_info fs-9"></i>
                                                        </a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="pe-0">
                                                        <span class="txt_dark_400 font_openSans fs-5">Cita de Primera Vez</span>
                                                    </td>
                                                    <td>
                                                        <span class="badge btn-success fs-2">Mañana</span>
                                                    </td>
                                                    <td>
                                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                                            <i data-feather="edit-3" class="icon_info fs-9"></i>
                                                        </a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="pe-0">
                                                        <span class="txt_dark_400 font_openSans fs-5">Cita de Primera Vez</span>
                                                    </td>
                                                    <td>
                                                        <span class="badge btn-success fs-2">Mañana</span>
                                                    </td>
                                                    <td>
                                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                                            <i data-feather="edit-3" class="icon_info fs-9"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Mis Historias Clínicas -->
                    <div class="row">
                        <div class="col-md-12 d-flex align-items-stretch"> 
                            <div class="card w-100">
                                <div class="card-body py-4 px-5">
                                    <div class="d-flex justify-content-between pt-3 px-2">
                                        <h3 class="card-title txt_blue_bold fs-15 m-0">{{ __('trans.my_clinic_history') }}</h3>
                                        <a href="javascript:void(0)" class="btn btn-info fs-4 px-4">{{ __('trans.see_clinic_history') }}</a>
                                    </div>

                                    <div class="mt-4" style="height: 230px">
                                        <table class="data_table w-100" cellpadding="10">
                                            <tbody>
                                                <tr>
                                                    <td class="pe-0">
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{ asset('img/medhistoria') }}/icon/icono-paciente-11.svg" alt="user" class="rounded-circle" width="60"/>
                                                            <div class="ps-3">
                                                                <h5 class="txt_blue_bold fs-9 m-0" >Homero Thompson</h5>
                                                                <span class="txt_blue_300 fs-9">Sura EPS</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="txt_blue_300 fs-9">1070322576</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="txt_blue_300 fs-9">14/12/2021 10:05 a.m.</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información del paciente">
                                                            <i data-feather="eye" class="icon_info"></i>
                                                        </a>
                                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Agregar nueva consulta">
                                                            <i data-feather="file-plus" class="icon_info"></i>
                                                        </a>
                                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar información del paciente">
                                                            <i data-feather="edit-3" class="icon_info"></i>
                                                        </a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="pe-0">
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{ asset('img/medhistoria') }}/icon/icono-paciente-11.svg" alt="user" class="rounded-circle" width="60"/>
                                                            <div class="ps-3">
                                                                <h5 class="txt_blue_bold fs-9 m-0" >Margaret Thompson</h5>
                                                                <span class="txt_blue_300 fs-9">Famisanar</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="txt_blue_300 fs-9">353759999</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="txt_blue_300 fs-9">17/11/2021 09:10 a.m.</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información del paciente">
                                                            <i data-feather="eye" class="icon_info"></i>
                                                        </a>
                                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Agregar nueva consulta">
                                                            <i data-feather="file-plus" class="icon_info"></i>
                                                        </a>
                                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar información del paciente">
                                                            <i data-feather="edit-3" class="icon_info"></i>
                                                        </a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="pe-0">
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{ asset('img/medhistoria') }}/icon/icono-paciente-11.svg" alt="user" class="rounded-circle" width="60"/>
                                                            <div class="ps-3">
                                                                <h5 class="txt_blue_bold fs-9 m-0" >Bartolomeo Thompson</h5>
                                                                <span class="txt_blue_300 fs-9">Nueva EPS</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="txt_blue_300 fs-9">1070322576</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="txt_blue_300 fs-9">06/01/2022 02:15 p.m.</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información del paciente">
                                                            <i data-feather="eye" class="icon_info"></i>
                                                        </a>
                                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Agregar nueva consulta">
                                                            <i data-feather="file-plus" class="icon_info"></i>
                                                        </a>
                                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar información del paciente">
                                                            <i data-feather="edit-3" class="icon_info"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                                
            <!-- SEGUNDA COLUMNA DEL CONTENEDOR PRINCIPAL -->
            <div class="col-md-4 align-items-stretch ps-0">
                <div class="row">
                    <!-- Card Weather -->
                    <div class="col-md-12 align-items-stretch"> 
                        <div class="card w-100 home_img_weather">
                            <div class="card-header d-flex align-items-center" style="background: transparent">
                                <img src="{{ asset('img/medhistoria') }}/logos/Clima-04.svg" alt="user" width="80"/>
                                <div class="ms-auto">
                                    <span class="text-white fs-9 fw-bold">Martes 15 de Febrero</span>
                                </div>
                            </div>
                            <div class="card-body">
                            </div>
                            <div class="card-foot p-3 weather-small">
                                <div class="d-flex justify-content-end">
                                    <div class="me-5">
                                        <h1 class="text-white fw-bold fs-13 mb-0 text-center">
                                            12<sup>o</sup>
                                        </h1>
                                        <small class="text-white fs-9 fw-bold text-center">Lluvias Aisladas</small>
                                    </div>
                                    
                                    <div class="">
                                        <h1 class="text-white fw-bold fs-13 mb-0 text-center">
                                            7<sup>o</sup>
                                        </h1>
                                        <small class="text-white fs-9 fw-bold text-center">En la noche</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Convenios -->
                    <div class="col-12 d-flex align-items-stretch">
                        <div class="card w-100 bg__blue_light">
                            <div class="card-body p-4 ps-5">
                                <div class="d-flex justify-content-between pt-2 pe-3">
                                    <h3 class="card-title text-white fw_bold fs-14 m-0">
                                        <i data-feather="paperclip" class="pe-2 home_icon"></i>{{ __('trans.agreements') }}
                                    </h3>
                                    <a href="javascript:void(0)" class="btn btn-info fs-4 px-4">{{ __('trans.see_agreements') }}</a>
                                </div>
                                
                                <div class="mt-3" style="height: 40px">
                                    <table class="data_table w-100">
                                        <tbody>
                                            <tr>
                                                <td class="pe-0">
                                                    <span class="txt_white_400 font_openSans fs-5">Soy Salud</span>
                                                </td>
                                                <td class="text-end py-0">
                                                    <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información del paciente">
                                                        <i data-feather="eye" class="icon_info_white"></i>
                                                    </a>
                                                    <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar información del paciente">
                                                        <i data-feather="edit-3" class="icon_info_white"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contactos -->
                    <div class="col-12 d-flex align-items-stretch">
                        <div class="card w-100 bg__terracota">
                            <div class="card-body p-4 ps-5 pb-2">
                                <div class="d-flex justify-content-between pe-3">
                                    <h3 class="card-title text-white fw_bold fs-14 m-0">
                                        <i data-feather="book-open" class="pe-2 home_icon"></i>{{ __('trans.contact') }}
                                    </h3>
                                    <a href="javascript:void(0)" class="btn btn-info fs-4 px-4">{{ __('trans.see_contact') }}</a>
                                </div>
                                
                                <div class="mt-3" style="height: 65px">
                                    <table class="data_table w-100">
                                        <tbody>
                                            <tr>
                                                <td class="pe-0">
                                                    <div class="d-flex flex-row align-items-center comment-row p-0">
                                                        <div class="profile-img p-2 ps-0">
                                                            <img src="{{ asset('img/medhistoria') }}/users/1.jpg" alt="user" class="rounded-circle" width="45"/>
                                                        </div>
                                                        <div class="lh-1 ps-2">
                                                            <h6 class="card-title txt_white_400 fs-3 m-0 d-block">Edna Krabappel</h6>
                                                            <span class="card-text txt_white_400 font_openSans fs-2">
                                                                edna1987@gmail.com
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-end py-0">
                                                    <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información del paciente">
                                                        <i data-feather="eye" class="icon_info_white"></i>
                                                    </a>
                                                    <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar información del paciente">
                                                        <i data-feather="edit-3" class="icon_info_white"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Segundo usuario -->
                    <div class="col-12 d-flex align-items-stretch">
                        <div class="card w-100 bg__blue_light">
                            <div class="card-body p-4 ps-5 pb-2">
                                <div class="d-flex justify-content-between pe-3">
                                    <h3 class="card-title text-white fw_bold fs-14 m-0">{{ __('trans.second_user') }}</h3>
                                    <a href="javascript:void(0)" class="btn btn-info fs-4 px-4">{{ __('trans.see_user') }}</a>
                                </div>
                                
                                <div class="mt-3" style="height: 65px">
                                    <table class="data_table w-100">
                                        <tbody>
                                            <tr>
                                                <td class="pe-0">
                                                    <div class="d-flex flex-row align-items-center comment-row p-0">
                                                        <div class="profile-img p-2 ps-0">
                                                            <img src="{{ asset('img/medhistoria') }}/users/1.jpg" alt="user" class="rounded-circle" width="45"/>
                                                        </div>
                                                        <div class="lh-1 ps-2">
                                                            <h6 class="card-title txt_white_400 fs-3 m-0 d-block">Edna Krabappel</h6>
                                                            <span class="card-text txt_white_400 font_openSans fs-2">
                                                                edna1987@gmail.com
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-end py-0">
                                                    <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información del paciente">
                                                        <i data-feather="eye" class="icon_info_white"></i>
                                                    </a>
                                                    <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar información del paciente">
                                                        <i data-feather="edit-3" class="icon_info_white"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- RIPS -->
                    <!-- <div class="col-md-12 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body perfil_pad_card_citas">
                                <div class="d-flex justify-content-between px-2">
                                    <h3 class="card-title txt_blue_bold fs-11 m-0">
                                        <i data-feather="plus-circle" class="pe-2 home_icon"></i>RIPS
                                    </h3>
                                    <a href="javascript:void(0)" class="btn btn-info fs-9">Ver RIPS</a>
                                </div>
                                <div class="card-body">
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>

            <div class="col-12 align-items-stretch">
                <div class="row">
                    <!-- Prescripciones -->
                    <div class="col-md-4 d-flex align-items-stretch"> 
                        <div class="card w-100">
                            <div class="card-header bg__blue perfil_pad_card_sed_contac">
                                <h3 class="d-flex align-items-center text-white fw_bold fs-14 m-0">
                                    <i data-feather="file" class="pe-2 home_icon"></i>{{ __('trans.prescription') }}
                                </h3>
                            </div>

                            <div class="card-body bg__blue border_rad_bottom">
                                <div class="row">
                                    <div class="col-6 mt-4">
                                        <h1 class="text-center text-white">0</h1>
                                        <p class="text-center fs-5 text-white">{{ __('trans.total') }}</p>
                                    </div>

                                    <div class="col-6 mt-4">
                                        <h1 class="text-center text-white">0</h1>
                                        <p class="text-center fs-5 text-white">{{ __('trans.latest') }} 30 {{ __('trans.days') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Incapacidades -->
                    <div class="col-md-4 d-flex align-items-stretch"> 
                        <div class="card w-100">
                            <div class="card-header bg__blue_light perfil_pad_card_sed_contac">
                                <h3 class="d-flex align-items-center txt_white_bold fs-14 m-0">
                                    <i data-feather="activity" class="pe-2 home_icon"></i>{{ __('trans.disabilities') }}
                                </h3>
                            </div>

                            <div class="card-body bg__blue_light border_rad_bottom">
                                <div class="row">
                                    <div class="col-6 mt-4">
                                        <h1 class="text-center txt_white_bold">0</h1>
                                        <p class="text-center txt_white_400 fs-5">{{ __('trans.total') }}</p>
                                    </div>

                                    <div class="col-6 mt-4">
                                        <h1 class="text-center txt_white_bold">23</h1>
                                        <p class="text-center txt_white_400 fs-5">{{ __('trans.latest') }} 30 {{ __('trans.days') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Autorizaciones -->
                    <div class="col-md-4 d-flex align-items-stretch"> 
                        <div class="card w-100">
                            <div class="card-header bg-white perfil_pad_card_sed_contac">
                                <h3 class="d-flex align-items-center txt_blue_bold fs-14 m-0">
                                    <i data-feather="check-circle" class="pe-2 home_icon"></i>{{ __('trans.authorization') }}
                                </h3>
                            </div>

                            <div class="card-body bg-white border_rad_bottom">
                                <div class="row">
                                    <div class="col-6 mt-4">
                                        <h1 class="text-center txt_blue_light">2115</h1>
                                        <p class="text-center txt_blue_300 fs-5">{{ __('trans.total') }}</p>
                                    </div>

                                    <div class="col-6 mt-4">
                                        <h1 class="text-center txt_blue_light">0</h1>
                                        <p class="text-center txt_blue_300 fs-5">{{ __('trans.latest') }} 30 {{ __('trans.days') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Container fluid  -->
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('plugin/DataTables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugin/DataTables/Responsive-2.2.9/dataTables.responsive.min.js') }}"></script>
    
    <script>
        $(document).ready(function() {
            $('.data_table').DataTable( {
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json",
                },
                
                targets: [3],
                responsive: true,
                paging:   false,
                ordering: true,
                info:     false,
                searching: false,
                stripeClasses: [],

                columnDefs: [
                    { orderable: false, targets: -1 }
                ]
            });
        });

        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
@endsection
