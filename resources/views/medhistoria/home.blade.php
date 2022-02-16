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

    <!-- Container fluid  -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 align-items-stretch">
                <div class="row">
                    <div class="col-md-6">
                        <a href="https://mipres.sispro.gov.co/MIPRESNOPBS/Login.aspx?ReturnUrl=%2fMIPRESNOPBS" target="_blank">
                            <div class="card p-4">
                                <img src="{{ asset('img/medhistoria') }}/logos/mipres-zaabra.png" alt="" class="m-auto" width="200">
                            </div>
                        </a>
                    </div>

                    <div class="col-md-6">
                        <a  href="https://www.prescripciontotal.com.co/consultorio-generico/login" target="_blank">
                            <div class="card p-4">
                                <img src="{{ asset('img/medhistoria') }}/logos/plm.png" alt="" class="m-auto" width="235">
                            </div>
                        </a>
                    </div>

                    <div class="col-md-6 d-flex align-items-stretch"> <!-- Mis Pacientes -->
                        <div class="card w-100">
                            <div class="card-header bg-success perfil_pad_card_sed_contac">
                                <h3 class="text-white fw_bold fs-10 m-0">Mis Pacientes</h3>
                                <a href="javascript:void(0)" class="btn btn-info fs-4 perfil_positionBtn_card_row2">Ver Pacientes</a>
                            </div>

                            <div class="row">
                                <div class="col-12 mt-4 pb-3">
                                    <table class="data_table" cellpadding="12" width="100%">
                                        <tbody>
                                            <tr>
                                                <td class="py-0">
                                                    <div class="d-flex flex-row align-items-center comment-row py-0 p-3">
                                                        <div class="profile-img p-2">
                                                            <img src="{{ asset('img/medhistoria') }}/users/1.jpg" alt="user" class="rounded-circle" width="50"/>
                                                        </div>
                                                        <div style="line-height: 1">
                                                            <h6 class="card-title txt_blue_300 fs-4 m-0 d-block">Barney Gómez</h6>
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
                                                <td class="py-0">
                                                    <div class="d-flex flex-row align-items-center comment-row py-0 p-3">
                                                        <div class="profile-img p-2">
                                                            <img src="{{ asset('img/medhistoria') }}/users/1.jpg" alt="user" class="rounded-circle" width="50"/>
                                                        </div>
                                                        <div style="line-height: 1">
                                                            <h6 class="card-title txt_blue_300 fs-4 m-0 d-block">Edna Krabappel</h6>
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
                                                <td class="py-0">
                                                    <div class="d-flex flex-row align-items-center comment-row py-0 p-3">
                                                        <div class="profile-img p-2">
                                                            <img src="{{ asset('img/medhistoria') }}/users/1.jpg" alt="user" class="rounded-circle" width="50"/>
                                                        </div>
                                                        <div style="line-height: 1">
                                                            <h6 class="card-title txt_blue_300 m-0 d-block">Moe Sislack </h6>
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
                    </div>

                    <div class="col-md-6 d-flex align-items-stretch"> <!-- Proximas Citas -->
                        <div class="card w-100">
                            <div class="card-body perfil_pad_card_citas">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title txt_blue_bold fs-10 m-0">Próximas citas</h3>
                                    <a href="javascript:void(0)" class="btn btn-info fs-4">Ver Mis Citas</a>
                                </div>
                                
                                <div class="row">
                                    <div class="col-12 mt-4">
                                        <table class="data_table" cellpadding="12" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td width="60%">
                                                        <span class="txt_dark_400 font_openSans fs-5">Cita de Control</span>
                                                    </td>
                                                    <td width="25%">
                                                        <span class="badge fs-2" style="background: #DE714B; padding: 3px 21px">Hoy</span>
                                                    </td>
                                                    <td width="15%">
                                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                                            <i data-feather="edit-3" class="icon_info fs-9"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
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
                                                    <td>
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

                    <div class="col-md-12 d-flex align-items-stretch"> <!-- Mis Historias Clínicas -->
                        <div class="card w-100">
                            <div class="card-body perfil_pad_card_citas">
                                <div class="d-flex justify-content-between ps-4 pe-5">
                                    <h3 class="card-title txt_blue_bold fs-11 m-0">Mis Historias Clínicas</h3>
                                    <a href="javascript:void(0)" class="btn btn-info fs-9">Ver Pacientes</a>
                                </div>
                                <div class="card-body">
                                    <table id="patients" width="100%">
                                        <tbody>
                                            <tr>
                                                <td>
                                                <div class="content_data_user">
                                                    <img src="{{ asset('img/medhistoria') }}/icon/icono-paciente-11.svg" alt="user" class="rounded-circle" width="60"/>
                                                    <div class="content_txt_cell_user">
                                                        <h5 class="txt_blue_bold fs-9 m-0" >Homero Thompson</h5>
                                                        <span class="txt_blue_300 fs-9">Sura EPS</span>
                                                    </div>
                                                </div>
                                                </td>
                                                <td>
                                                    <span class="txt_blue_300 fs-9">1070322576</span>
                                                </td>
                                                <td>
                                                    <span class="txt_blue_300 fs-9">14/12/2021 10:05 a.m.</span>
                                                </td>
                                                <td class="pad_icon_table">
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
                                                <td>
                                                <div class="content_data_user">
                                                    <img src="{{ asset('img/medhistoria') }}/icon/icono-paciente-11.svg" alt="user" class="rounded-circle" width="60"/>
                                                    <div class="content_txt_cell_user">
                                                        <h5 class="txt_blue_bold fs-9 m-0" >Margaret Thompson</h5>
                                                        <span class="txt_blue_300 fs-9">Famisanar</span>
                                                    </div>
                                                </div>
                                                </td>
                                                <td>
                                                    <span class="txt_blue_300 fs-9">353759999</span>
                                                </td>
                                                <td>
                                                    <span class="txt_blue_300 fs-9">17/11/2021 09:10 a.m.</span>
                                                </td>
                                                <td class="pad_icon_table">
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
                                                <td>
                                                <div class="content_data_user">
                                                    <img src="{{ asset('img/medhistoria') }}/icon/icono-paciente-11.svg" alt="user" class="rounded-circle" width="60"/>
                                                    <div class="content_txt_cell_user">
                                                        <h5 class="txt_blue_bold fs-9 m-0" >Bartolomeo Thompson</h5>
                                                        <span class="txt_blue_300 fs-9">Nueva EPS</span>
                                                    </div>
                                                </div>
                                                </td>
                                                <td>
                                                    <span class="txt_blue_300 fs-9">1070322576</span>
                                                </td>
                                                <td>
                                                    <span class="txt_blue_300 fs-9">06/01/2022 02:15 p.m.</span>
                                                </td>
                                                <td class="pad_icon_table">
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
                                                <td>
                                                <div class="content_data_user">
                                                    <img src="{{ asset('img/medhistoria') }}/icon/icono-paciente-11.svg" alt="user" class="rounded-circle" width="60"/>
                                                    <div class="content_txt_cell_user">
                                                        <h5 class="txt_blue_bold fs-9 m-0" >Margarita Thompson</h5>
                                                        <span class="txt_blue_300 fs-9">Particular</span>
                                                    </div>
                                                </div>
                                                </td>
                                                <td>
                                                    <span class="txt_blue_300 fs-9">353759999</span>
                                                </td>
                                                <td>
                                                    <span class="txt_blue_300 fs-9">02/12/2021 08:35 a.m.</span>
                                                </td>
                                                <td class="pad_icon_table">
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

                    <div class="col-md-6 d-flex align-items-stretch"> <!-- Prescripciones -->
                        <div class="card w-100">
                            <div class="card-header bg__blue perfil_pad_card_sed_contac">
                                <h3 class="d-flex align-items-center text-white fw_bold fs-10 m-0">
                                    <i data-feather="file" class="pe-2 home_icon"></i>Prescripciones
                                </h3>
                            </div>

                            <div class="card-body bg__blue border_rad_bottom">
                                <div class="row">
                                    <div class="col-6 mt-4">
                                        <h1 class="text-center text-white">10256</h1>
                                        <p class="text-center fs-5 text-white">Total</p>
                                    </div>

                                    <div class="col-6 mt-4">
                                        <h1 class="text-center text-white">345</h1>
                                        <p class="text-center fs-5 text-white">Últimos 30 Días</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex align-items-stretch"> <!-- Autorizaciones -->
                        <div class="card w-100">
                            <div class="card-header bg-white perfil_pad_card_sed_contac">
                                <h3 class="d-flex align-items-center txt_blue_bold fs-10 m-0">
                                    <i data-feather="check-circle" class="pe-2 home_icon"></i>Autorizaciones
                                </h3>
                            </div>

                            <div class="card-body bg-white border_rad_bottom">
                                <div class="row">
                                    <div class="col-6 mt-4">
                                        <h1 class="text-center txt_blue_light">2115</h1>
                                        <p class="text-center txt_blue_300 fs-5">Total</p>
                                    </div>

                                    <div class="col-6 mt-4">
                                        <h1 class="text-center txt_blue_light">190</h1>
                                        <p class="text-center txt_blue_300 fs-5">Últimos 30 Días</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex align-items-stretch"> <!-- Segundo usuario -->
                        <div class="card bg__blue_light w-100">
                            <div class="card-body perfil_pad_card_citas">
                                <div class="d-flex justify-content-between">
                                    <h3 class="txt_white_bold fs-10 m-0">Segundo Usuario</h3>
                                    <a href="javascript:void(0)" class="btn btn-info fs-4">Ver Usuarios</a>
                                </div>

                                <div class="row">
                                    <div class="col-12 mt-4 pb-3">
                                        <table class="data_table" cellpadding="12" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td class="p-0">
                                                        <div class="d-flex flex-row align-items-center comment-row p-0">
                                                            <div class="profile-img p-2">
                                                                <img src="{{ asset('img/medhistoria') }}/users/1.jpg" alt="user" class="rounded-circle" width="50"/>
                                                            </div>
                                                            <div style="line-height: 1">
                                                                <h6 class="txt_white_400 fs-3 m-0 d-block">Waylon Smithers</h6>
                                                                <span class="txt_white_400 fs-2">
                                                                    info@wrappixel.com
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center p-0">
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
                    </div>

                    <div class="col-md-6 d-flex align-items-stretch"> <!-- Contactos -->
                        <div class="card w-100">
                            <div class="card-header bg__terracota perfil_pad_card_sed_contac">
                                <h3 class="d-flex align-items-center text-white fw_bold fs-10 m-0">
                                    <i data-feather="book-open" class="pe-2 home_icon"></i>Contactos
                                </h3>
                            </div>

                            <div class="card-body bg__terracota border_rad_bottom">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                                        
            <div class="col-md-4 align-items-stretch">
                <div class="row">
                    <div class="col-md-12 align-items-stretch"> <!-- Card Weather -->
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

                    <div class="col-md-12 d-flex align-items-stretch"> <!-- Incapacidades -->
                        <div class="card w-100">
                            <div class="card-header bg__blue_light perfil_pad_card_sed_contac">
                                <h3 class="d-flex align-items-center txt_white_bold fs-10 m-0">
                                    <i data-feather="activity" class="pe-2 home_icon"></i>Incapacidades
                                </h3>
                            </div>

                            <div class="card-body bg__blue_light border_rad_bottom">
                                <div class="row">
                                    <div class="col-6 mt-4">
                                        <h1 class="text-center txt_white_bold">546</h1>
                                        <p class="text-center txt_white_400 fs-5">Total</p>
                                    </div>

                                    <div class="col-6 mt-4">
                                        <h1 class="text-center txt_white_bold">23</h1>
                                        <p class="text-center txt_white_400 fs-5">Últimos 30 Días</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 d-flex align-items-stretch"> <!-- RIPS -->
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
                    </div>

                    <div class="col-md-12 d-flex align-items-stretch"> <!-- Convenios -->
                        <div class="card w-100">
                            <div class="card-header bg__blue_light perfil_pad_card_sed_contac">
                                <h3 class="d-flex align-items-center txt_white_bold fs-10 m-0">
                                    <i data-feather="paperclip" class="pe-2 home_icon"></i>Convenios
                                </h3>
                            </div>

                            <div class="card-body bg__blue_light border_rad_bottom">
                                <div class="row">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="row">
            <div class="col-md-4 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-header bg-success perfil_pad_card_sed_contac">
                        <h3 class="card-title text-white fw_bold fs-11">Sedes</h3>
                        <a href="javascript:void(0)" class="btn btn-info fs-9 perfil_positionBtn_card_row2">Ver Sedes</a>
                    </div>
                    <div class="card-body perfil_pad_card_sed_contac">
                        <div class="mb-4">
                            <h6 class="card-title txt_blue_300 fs-3 m-0">Sede X</h6>
                            <p class="card-text font_openSans txt_dark_400 fs-2 m-0">
                                With supporting text below as a natural lead-in to
                                additional content.
                                Lorem Ipsum is simply dummy text of the printing and type
                            </p>
                            <div class="d-flex justify-content-end">
                                <a href="#" class="card-link txt_blue_light fs-2">Ver más</a>    
                            </div>
                        </div>

                        <div>
                            <h6 class="card-title txt_blue_300 fs-3 m-0">Sede X</h6>
                            <p class="card-text font_openSans txt_dark_400 fs-2 m-0">
                                With supporting text below as a natural lead-in to
                                additional content.
                                Lorem Ipsum is simply dummy text of the printing and type
                            </p>
                            <div class="d-flex justify-content-end">
                                <a href="#" class="card-link txt_blue_light fs-2">Ver más</a>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                                        
            <div class="col-md-4 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-header bg-white perfil_pad_card_sed_contac">
                        <h3 class="card-title txt_blue_bold fs-11 m-0">Convenios</h3>
                        <span class="txt_dark_400 fs-2">Cita de Control - Julio Horjuela</span>
                        <a href="javascript:void(0)" class="btn btn-info fs-9 perfil_positionBtn_card_row2">Ver Convenios</a>
                    </div>
                    <div class="card-body perfil_pad_card_sed_contac pt-0">
                        <div class="mb-3">
                            <div class="d-flex">
                                <i data-feather="circle" class="perfil_circle"></i>
                                <div class="ps-3">
                                    <h6 class="card-title txt_blue_300 fs-3 m-0 d-block">Convenio 1</h6>
                                    <p class="card-text font_openSans txt_dark_400 fs-2">
                                    With supporting text below as a natural lead-in to
                                    additional content.
                                    Lorem Ipsum is simply dummy text of the printing and type
                                    </p>
                                </div>

                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex">
                                <i data-feather="circle" class="perfil_circle"></i>
                                <div class="ps-3">
                                    <h6 class="card-title txt_blue_300 fs-3 m-0 d-block">Convenio 2</h6>
                                    <p class="card-text font_openSans txt_dark_400 fs-2">
                                    With supporting text below as a natural lead-in to
                                    additional content.
                                    Lorem Ipsum is simply dummy text of the printing and type
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-header bg-success perfil_pad_card_sed_contac">
                        <h3 class="card-title text-white fw_bold fs-11">Contactos</h3>
                        <a href="javascript:void(0)" class="btn btn-info fs-9 perfil_positionBtn_card_row2">Ver Mis Contactos</a>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-row align-items-center comment-row py-0 p-3">
                            <div class="profile-img p-2">
                                <img src="{{ asset('img/medhistoria') }}/users/1.jpg" alt="user" class="rounded-circle" width="50"/>
                            </div>
                            <div style="line-height: 1">
                                <h6 class="card-title txt_blue_300 fs-4 m-0 d-block">Barney Gómez</h6>
                                <span class="card-text font_openSans txt_dark_400 fs-2">
                                    Barney Gómez amoduff@wrappixel.com
                                </span>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center comment-row py-0 p-3">
                            <div class="profile-img p-2">
                                <img src="{{ asset('img/medhistoria') }}/users/1.jpg" alt="user" class="rounded-circle" width="50"/>
                            </div>
                            <div style="line-height: 1">
                                <h6 class="card-title txt_blue_300 fs-4 m-0 d-block">Edna Krabappel</h6>
                                <span class="card-text font_openSans txt_dark_400 fs-2">
                                    edna1987@gmail.com
                                </span>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center comment-row py-0 p-3">
                            <div class="profile-img p-2">
                                <img src="{{ asset('img/medhistoria') }}/users/1.jpg" alt="user" class="rounded-circle" width="50"/>
                            </div>
                            <div style="line-height: 1">
                                <h6 class="card-title txt_blue_300 m-0 d-block">Moe Sislack </h6>
                                <span class="card-text font_openSans txt_dark_400 fs-2">
                                    dondemoe@gmail.com
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <!-- End Container fluid  -->
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('plugin/DataTables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugin/DataTables/Responsive-2.2.9/dataTables.responsive.min.js') }}"></script>
    
    <script>
        $(document).ready(function() {
            $('#patients').DataTable( {
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
