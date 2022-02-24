@extends('medhistoria.layouts.app')
@section('title', __('trans.patients'))

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/DataTables/css/jquery.dataTables.min.css') }}"/>
@endsection

@section('content')
    <!-- Bread crumb and right sidebar toggle -->
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h2 class="text-themecolor mb-0" style="font-weight: bold">Pacientes</h2>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left" title="ver información del paciente">Home</a>
                </li>
                <li class="breadcrumb-item ">Pacientes</li>
            </ol>
        </div>
        <div class="col-md-7 col-12 align-self-center d-none d-md-block">

        </div>
    </div>
    <!-- End Bread crumb and right sidebar toggle -->

    <!-- Container fluid  -->
    <div class="container-fluid">
        <div class="card card-body" style="padding-top: 14px; padding-bottom: 14px">
            <div class="row">
                <div class="col-md-1 p-0 pt-2 content_img_top_user">
                    <img src="{{ asset('img/medhistoria') }}/icon/icono-paciente-11.svg" alt="user" class="rounded-circle" width="85"/>
                </div>
                <div class="col-md-7 p-0">
                    <h2 class="txt_blue_bold f-10">{{ __('trans.patient') }}: Homero Thompson</h2>
                    <h4 class="txt_dark_400 fs-5 mb-1">CC: 000 000 000 | {{ __('trans.birthday') }}: 28/11/1985</h4>
                    <h4 class="txt_dark_400 fs-5 mb-1">{{ __('trans.health_service') }}: Sura E.P.S.</h4>
                </div>
                <div class="col-md-4 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0 pad_btn_new_consult">
                    <div class="action-btn show-btn" style="display: none">
                        <a href="javascript:void(0)"
                           class="delete-multiple btn-light-danger btn me-2 text-danger d-flex align-items-center font-weight-medium"></a>
                    </div>
                    
                    <button id="btn-add-contact" class="btn btn-info align-self-center fs-7 fw_bold py-2 d-flex" 
                            data-bs-target="#vertical-center-scroll-modal_enfAct" data-bs-toggle="modal"> 
                        <i data-feather="plus"></i> &nbsp; {{ __('trans.new_query') }}
                    </button> 
                </div>
                <div class="offset-1 col-3 p-0">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item border-0">
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse content_acordion" aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body px-0">
                                    <h4 class="txt_blue_bold">{{ __('trans.contact-information') }}:
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar información del paciente">
                                            <i data-feather="edit-3" class="icon_info fs-9"></i>
                                        </a>
                                    </h4>
                                    <p class="txt_dark_400 fs-5 m-0">{{ __('trans.phone') }}: 000 00 00</p>
                                    <p class="txt_dark_400 fs-5 m-0">{{ __('trans.mobile') }}: 000 000 00 00</p>
                                    <p class="txt_dark_400 fs-5 m-0">{{ __('trans.email') }}: name@mail.com</p>
                                    <p class="txt_dark_400 fs-5 m-0">{{ __('trans.address') }}: Carrera 0 # 0 - 00</p>
                                    <p class="txt_dark_400 fs-5 m-0">{{ __('trans.city') }}: Bogotá D.C.</p>
                                </div>
                            </div>

                            <button class="accordion-button collapsed btn_acordion p-0" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" 
                                aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                <h4 class="accordion-header txt_blue_light" id="panelsStayOpen-headingOne">
                                    Más información
                                </h4>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       <!-- Nav tabs -->
        <ul class="nav nav-pills" role="tablist">
            <li class="nav-item" style="padding-right: 12px">
                <a class="nav-link d-flex active" data-bs-toggle="tab" href="#navpill-1" role="tab">
                   <i data-feather="folder" class="pe-2"></i> <span class="fs-4">Historia Clínica</span>
                </a>
            </li>
            <li class="nav-item" style="padding-right: 12px">
                <a class="nav-link d-flex" data-bs-toggle="tab" href="#navpill-2" role="tab">
                    <i data-feather="folder" class="pe-2"></i> <span class="fs-4">Prescripcines</span>
                </a>
            </li>
            <li class="nav-item" style="padding-right: 12px">
                <a class="nav-link d-flex" data-bs-toggle="tab" href="#navpill-3" role="tab">
                    <i data-feather="folder" class="pe-2"></i> <span class="fs-4">Autorizaciones</span>
                </a>
            </li>
            <li class="nav-item" style="padding-right: 12px">
                <a class="nav-link d-flex" data-bs-toggle="tab" href="#navpill-4" role="tab">
                    <i data-feather="folder" class="pe-2"></i> <span class="fs-4">Incapacidades</span>
                </a>
            </li>
            <li class="nav-item" style="padding-right: 12px">
                <a class="nav-link d-flex" data-bs-toggle="tab" href="#navpill-5" role="tab">
                    <i data-feather="folder" class="pe-2"></i> <span class="fs-4">Vacunación</span>
                </a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content border bg-white">
            <div class="tab-pane active hc_pad_tab_pane" id="navpill-1" role="tabpanel"> <!-- Historia Clínica -->
                <div class="row">
                    <div class="col-12">
                        <table class="data_table" width="100%">
                            <thead>
                                <tr>
                                    <th class="txt_blue_light fs-6 hc_pad_th_table">Fecha</th>
                                    <th class="txt_blue_light fs-6 hc_pad_th_table">Tipo de Consuta</th>
                                    <th class="txt_blue_light fs-6">Motivo de Consulta</th>
                                    <th class="txt_blue_light fs-6 ps-0">Estado</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">14/12/2021 10:05 a.m.</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">Cardiología</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 ps-2">ARRÍTMIA CARDIACA</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 ps-0 d-flex align-items-center"><i data-feather="unlock" class="txt_blue_300 pe-1"></i>Abierto</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="top" title="ver información">
                                            <i data-feather="eye" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="top" title="Descargar información">
                                            <i data-feather="download" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="top" title="Compartir información">
                                            <i data-feather="share-2" class="icon_info fs-9"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">17/06/2020 08:43 a.m.</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">Gastroenterología</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6">INTOXICACIÓN GASTROINTESTINAL</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 d-flex align-items-center"><i data-feather="user" class="txt_blue_300 pe-1"></i>En consulta</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                            <i data-feather="eye" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Descargar información">
                                            <i data-feather="download" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Compartir información">
                                            <i data-feather="share-2" class="icon_info fs-9"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">04/05/2019 11:15 a.m</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">Medicina General</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6">CUADRO GRIPAL</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 d-flex align-items-center"><i data-feather="lock" class="txt_blue_300 pe-1"></i>Cerrado</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                            <i data-feather="eye" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Descargar información">
                                            <i data-feather="download" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Compartir información">
                                            <i data-feather="share-2" class="icon_info fs-9"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">15/03/2018 01:28 p.m.</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">Fisioterapia</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6">DOLOR LUMBAR</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 d-flex align-items-center"><i data-feather="lock" class="txt_blue_300 pe-1"></i>Cerrado</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                            <i data-feather="eye" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Descargar información">
                                            <i data-feather="download" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Compartir información">
                                            <i data-feather="share-2" class="icon_info fs-9"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-12 d-flex justify-content-center hc_padTop_btn">
                        <button type="button" class="btn waves-effect waves-light fs-6 py-2 px-3" style="background: #DE714B; color: white">Ver Historia Clínica Completa</button>
                    </div>
                </div>
            </div>

            <div class="tab-pane p-3" id="navpill-2" role="tabpanel"> <!-- Prescripciones -->
                <div class="row">
                    <div class="col-12">
                        <table class="data_table" width="100%">
                            <thead>
                                <tr>
                                    <th class="txt_blue_light fs-6 hc_pad_th_table">Fecha</th>
                                    <th class="txt_blue_light fs-6 hc_pad_th_table">Tipo de Consuta</th>
                                    <th class="txt_blue_light fs-6">Motivo de Consulta</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">14/12/2021 10:05 a.m.</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">Cardiología</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 ps-2">ARRÍTMIA CARDIACA</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                            <i data-feather="eye" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Descargar información">
                                            <i data-feather="download" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Compartir información">
                                            <i data-feather="share-2" class="icon_info fs-9"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">17/06/2020 08:43 a.m.</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">Gastroenterología</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6">INTOXICACIÓN GASTROINTESTINAL</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                            <i data-feather="eye" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Descargar información">
                                            <i data-feather="download" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Compartir información">
                                            <i data-feather="share-2" class="icon_info fs-9"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">04/05/2019 11:15 a.m</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">Medicina General</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6">CUADRO GRIPAL</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                            <i data-feather="eye" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Descargar información">
                                            <i data-feather="download" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Compartir información">
                                            <i data-feather="share-2" class="icon_info fs-9"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">15/03/2018 01:28 p.m.</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">Fisioterapia</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6">DOLOR LUMBAR</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                            <i data-feather="eye" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Descargar información">
                                            <i data-feather="download" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Compartir información">
                                            <i data-feather="share-2" class="icon_info fs-9"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="tab-pane p-3" id="navpill-3" role="tabpanel"> <!-- Autorizacines -->
                <div class="row">
                    <div class="col-12">
                        <table class="data_table" width="100%">
                            <thead>
                                <tr>
                                    <th class="txt_blue_light fs-6 hc_pad_th_table">Fecha</th>
                                    <th class="txt_blue_light fs-6 hc_pad_th_table">Servicio</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">14/12/2021 10:05 a.m.</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">Electrocardiograma</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                            <i data-feather="eye" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Descargar información">
                                            <i data-feather="download" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Compartir información">
                                            <i data-feather="share-2" class="icon_info fs-9"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">17/06/2020 08:43 a.m.</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">Ecocardiograma</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                            <i data-feather="eye" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Descargar información">
                                            <i data-feather="download" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Compartir información">
                                            <i data-feather="share-2" class="icon_info fs-9"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">04/05/2019 11:15 a.m</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">Examen de laboratorio</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                            <i data-feather="eye" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Descargar información">
                                            <i data-feather="download" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Compartir información">
                                            <i data-feather="share-2" class="icon_info fs-9"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">15/03/2018 01:28 p.m.</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">Fisioterapia de Rehabilitación</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                            <i data-feather="eye" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Descargar información">
                                            <i data-feather="download" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Compartir información">
                                            <i data-feather="share-2" class="icon_info fs-9"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="tab-pane p-3" id="navpill-4" role="tabpanel"> <!-- Incapacidades -->
                <div class="row">
                    <div class="col-12">
                        <table class="data_table" width="100%">
                            <thead>
                                <tr>
                                    <th class="txt_blue_light fs-6 hc_pad_th_table">Fecha</th>
                                    <th class="txt_blue_light fs-6 hc_pad_th_table">Tipo de Consuta</th>
                                    <th class="txt_blue_light fs-6">Motivo de Consulta</th>
                                    <th class="txt_blue_light fs-6 ps-0">Días</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">14/12/2021 10:05 a.m.</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">Cardiología</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 ps-2">ARRÍTMIA CARDIACA</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6">5</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                            <i data-feather="eye" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Descargar información">
                                            <i data-feather="download" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Compartir información">
                                            <i data-feather="share-2" class="icon_info fs-9"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">17/06/2020 08:43 a.m.</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">Gastroenterología</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6">INTOXICACIÓN GASTROINTESTINAL</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6">2</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                            <i data-feather="eye" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Descargar información">
                                            <i data-feather="download" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Compartir información">
                                            <i data-feather="share-2" class="icon_info fs-9"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">04/05/2019 11:15 a.m</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">Medicina General</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6">CUADRO GRIPAL</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6">7</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                            <i data-feather="eye" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Descargar información">
                                            <i data-feather="download" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Compartir información">
                                            <i data-feather="share-2" class="icon_info fs-9"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">15/03/2018 01:28 p.m.</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">Fisioterapia</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6">DOLOR LUMBAR</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6">4</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                            <i data-feather="eye" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Descargar información">
                                            <i data-feather="download" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Compartir información">
                                            <i data-feather="share-2" class="icon_info fs-9"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="tab-pane p-3" id="navpill-5" role="tabpanel"> <!-- Vacunación -->
                <div class="row">
                    <div class="col-12">
                        <table class="data_table" width="100%">
                            <thead>
                                <tr>
                                    <th class="txt_blue_light fs-6 hc_pad_th_table">Fecha</th>
                                    <th class="txt_blue_light fs-6 hc_pad_th_table">Esquema</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">14/12/2021 10:05 a.m.</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">SEGUNDA DÓSIS - PFAIZER COVID-19</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                            <i data-feather="eye" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Descargar información">
                                            <i data-feather="download" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Compartir información">
                                            <i data-feather="share-2" class="icon_info fs-9"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">17/06/2020 08:43 a.m.</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">PRIMERA DÓSIS - PFAIZER COVID-19</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                            <i data-feather="eye" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Descargar información">
                                            <i data-feather="download" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Compartir información">
                                            <i data-feather="share-2" class="icon_info fs-9"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">04/05/2019 11:15 a.m</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">INFLUENZA - GRIPA</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                            <i data-feather="eye" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Descargar información">
                                            <i data-feather="download" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Compartir información">
                                            <i data-feather="share-2" class="icon_info fs-9"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">15/03/2018 01:28 p.m.</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <span class="txt_blue_300 fs-6 hc_pad_td_table">FIEBRE AMARILLA</span>
                                    </td>
                                    <td class="hc_pad_y_td_table">
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                            <i data-feather="eye" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Descargar información">
                                            <i data-feather="download" class="icon_info fs-9"></i>
                                        </a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Compartir información">
                                            <i data-feather="share-2" class="icon_info fs-9"></i>
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
    <!-- End Container fluid  -->

    <!-- Modal   Nueva Consulta -->
    <div class="modal fade" id="vertical-center-scroll-modal_enfAct" tabindex="-1" aria-labelledby="vertical-center-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable hc_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="d-flex align-self-start">
                        <h2 class="txt_blue_bold fs-10 mt-3">{{ __('trans.new_query') }}</h2>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- Datos del paciente -->
                        <div class="col-md-12 mb-5">
                            <h2 class="txt_blue_bold f-10">{{ __('trans.patient') }}: Homero Thompson</h2>
                            <h4 class="txt_dark_400 fs-5 mb-1">CC: 000 000 000 | {{ __('trans.birthday') }}: 28/11/1985</h4>
                            <h4 class="txt_dark_400 fs-5 mb-1">{{ __('trans.health_service') }}: Sura E.P.S.</h4>
                        </div>
                    </div>

                    <form action="" method="post" class="form" enctype="">
                        @csrf
                        <div class="row">
                            <!-- Motivo de consulta -->
                            <div class="col-md-8 mb-3">
                                <label for="reason_consultation" class="txt_dark_bold fs-4">{{ __('validation.attributes.reason_consultation') }}</label>
                                <input type="text" class="form-control form_style_input @error('reason_consultation') is-invalid @enderror"
                                id="reason_consultation" name="reason_consultation" required value="{{ old('reason_consultation') }}">
                            </div>
                            <!-- Fecha de consulta -->
                            <div class="col-md-4 mb-3">
                                <label for="consultation_date" class="txt_dark_bold fs-4">{{ __('validation.attributes.consultation_date') }}</label>
                                <input type="date" class="form-control form_style_input @error('consultation_date') is-invalid @enderror"
                                id="consultation_date" name="consultation_date" required value="{{ old('consultation_date') }}">
                            </div>
                        </div>

                        <div class="row">
                            <!-- Modelo -->
                            <div class="col-md-8 mb-3">
                                <label for="template" class="txt_dark_bold fs-4">{{ __('validation.attributes.template') }}</label>
                                <select class="form-select form_style_input @error('template') is-invalid @enderror" id="template" name="template">
                                        <option ></option>
                                        <option value="template 1" {{ (old('template') == 'template 1') ? 'selected' : '' }}>{{ __('trans.template') }} 1</option>
                                        <option value="template 2" {{ (old('template') == 'template 2') ? 'selected' : '' }}>{{ __('trans.template') }} 2</option>
                                        <option value="template 3" {{ (old('template') == 'template 3') ? 'selected' : '' }}>{{ __('trans.template') }} 3</option>
                                    </select>
                            </div>
                            <!-- Tipo de cita -->
                            <div class="col-md-4 mb-3">
                                <label for="date-type" class="txt_dark_bold fs-4">{{ __('validation.attributes.date-type') }}</label>
                                <select class="form-select form_style_input @error('date-type') is-invalid @enderror" id="date-type" name="date-type">
                                        <option ></option>
                                        <option value="date-types 1" {{ (old('date-type') == 'date-types 1') ? 'selected' : '' }}>{{ __('trans.date-types') }} 1</option>
                                        <option value="date-types 2" {{ (old('date-type') == 'date-types 2') ? 'selected' : '' }}>{{ __('trans.date-types') }} 2</option>
                                        <option value="date-types 3" {{ (old('date-type') == 'date-types 3') ? 'selected' : '' }}>{{ __('trans.date-types') }} 3</option>
                                    </select>
                            </div>
                        </div>

                        <!-- Save Button -->
                        <div class="text-center mt-5" >
                            <button type="submit" class="btn btn-info align-self-center fs-7 px-4 me-3" 
                                    style="font-weight: 100; background: #DE714B; color: white; border: 1px solid #DE714B">
                                {{ __('trans.cancel') }} 
                            </button>
                            <button type="submit" class="btn btn-info align-self-center fs-7 px-4" style="font-weight: 100">
                                {{ __('trans.confirm') }} 
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('plugin/DataTables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugin/DataTables/Responsive-2.2.9/dataTables.responsive.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('a[data-bs-toggle="tab"]').on( 'shown.bs.tab', function (e) {
                $(".data_table").DataTable()
                    .columns.adjust()
                    .responsive.recalc();
            });

            $('.data_table').DataTable( {
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json",
                },
                targets: [3],
                responsive: true,
                paging:   false,
                ordering: false,
                info:     false,
                searching: false,
                stripeClasses: [],
            });
        } );

        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
@endsection
