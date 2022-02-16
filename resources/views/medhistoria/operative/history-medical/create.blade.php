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
                <div class="col-md-5 p-0">
                    <h2 class="txt_blue_bold f-10">Paciente: Homero Thompson</h2>
                    <h4 class="txt_dark_400 fs-5 mb-1">CC: 000 000 000 | Fecha de Nacimiento: 28/11/1985</h4>
                    <h4 class="txt_dark_400 fs-5 mb-1">Servicio de salud: Sura E.P.S.</h4>
                </div>
                <div class="col-md-6 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                    <button type="reset" class="btn font-weight-medium align-self-center fs-7 px-4 me-4" style="background: #DE714B; color: white;">
                        {{ __('trans.cancel') }} 
                    </button>
                    <button type="submit" class="btn btn-info font-weight-medium align-self-center fs-7 px-4 me-4" 
                    style="background: #1DBFD6; color: white; border: #1DBFD6">
                        {{ __('trans.save') }} 
                    </button>   
                    <button type="submit" class="btn btn-info font-weight-medium align-self-center fs-7 px-4">
                        {{ __('trans.save-end-query') }} 
                    </button>  
                </div>
                <div class="offset-1 col-3 p-0">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item border-0">
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse content_acordion" aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body px-0">
                                    <h4 class="txt_blue_bold">Información de contacto:
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar información del paciente">
                                            <i data-feather="edit-3" class="icon_info fs-9"></i>
                                        </a>
                                    </h4>
                                    <p class="txt_dark_400 fs-5 m-0">Teléfono: 000 00 00</p>
                                    <p class="txt_dark_400 fs-5 m-0">Móvil: 000 000 00 00</p>
                                    <p class="txt_dark_400 fs-5 m-0">Correo: name@mail.com</p>
                                    <p class="txt_dark_400 fs-5 m-0">Dirección: Carrera 0 # 0 - 00</p>
                                    <p class="txt_dark_400 fs-5 m-0">Ciudad: Bogotá D.C.</p>
                                </div>
                            </div>

                            <button class="accordion-button collapsed btn_acordion p-0" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" 
                                aria-expanded="true" aria-controls="panelsStayOpen-collapseOne" onclick="cambiarTexto()" id="cambiar">
                                <h4 class="accordion-header txt_blue_light" id="texto">
                                    Más información
                                </h4>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
        
        <div class="card card-body" style="padding-top: 14px; padding-bottom: 14px">
            <div class="row d-flex justify-content-around">
                <div class="col-md-3 text-center p-0">
                    <h3 class="txt_blue_light_500 f-10">Fecha y Hora de Expedición</h3>
                    <h4 class="txt_blue_500 fs-10 mb-1">08/02/2022 11:28 a.m.</h4>
                </div>
                <div class="col-md-3 text-center p-0">
                    <h3 class="txt_blue_light_500 f-10">Número de Historia Clínica</h3>
                    <h4 class="txt_blue_500 fs-10 mb-1">0000 000 000</h4>
                </div>
                <div class="col-md-3 text-center p-0">
                    <h3 class="txt_blue_light_500 f-10">Tipo de Consulta</h3>
                    <h4 class="txt_blue_500 fs-10 mb-1">De Control</h4>
                </div>
            </div>
        </div>  

        <!-- Tarjetas de items historia clínica -->
        <div class="hc_card">
            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_idgp" data-bs-toggle="modal"> 
                <i data-feather="user" class="ch_card_icon"></i>
                <h3 class="txt_blue_500 f-10">Identificación y Datos Generales del Paciente</h3>
            </button> 
            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_iaa" data-bs-toggle="modal"> 
                <div class="form-switch d-flex justify-content-end p-0">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked1" checked>
                </div>
                <i data-feather="users" class="ch_card_icon"></i>
                <h3 class="txt_blue_500 f-10">Información del Acompañante o Acudiente</h3>
            </button> 
            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_ds" data-bs-toggle="modal"> 
                <i data-feather="list" class="ch_card_icon"></i>
                <h3 class="txt_blue_500 f-10">Datos del Servicio</h3>
            </button> 
            <div class="hc_card_items"> 
                <i data-feather="flag" class="ch_card_icon"></i>
                <h3 class="txt_blue_500 f-10">Procedimiento Actual</h3>
            </div> 
        </div>

        <div class="hc_card">
            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_triage" data-bs-toggle="modal"> 
                <i data-feather="clock" class="ch_card_icon"></i>
                <h3 class="txt_blue_500 f-10">Triage</h3>
            </button> 
            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_diag" data-bs-toggle="modal"> 
                <i data-feather="search" class="ch_card_icon"></i>
                <h3 class="txt_blue_500 f-10">Diagnóstico</h3>
            </button>
            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_resumen" data-bs-toggle="modal"> 
                <i data-feather="folder-plus" class="ch_card_icon"></i>
                <h3 class="txt_blue_500 f-10">Resumen</h3>
            </button>
            <div class="hc_card_items"> 
                <i data-feather="link" class="ch_card_icon"></i>
                <h3 class="txt_blue_500 f-10">Antecedentes</h3>
            </div> 
        </div>

        <div class="hc_card">
            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_aut" data-bs-toggle="modal"> 
                <i data-feather="check-circle" class="ch_card_icon"></i>
                <h3 class="txt_blue_500 f-10">Autorizaciones</h3>
            </button>
            <div class="hc_card_items"> 
                <i data-feather="file" class="ch_card_icon"></i>
                <h3 class="txt_blue_500 f-10">Prescripciones</h3>
            </div>  
            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_incap" data-bs-toggle="modal"> 
                <i data-feather="activity" class="ch_card_icon"></i>
                <h3 class="txt_blue_500 f-10">Incapacidades</h3>
            </button>  
            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_as" data-bs-toggle="modal"> 
                <i data-feather="navigation" class="ch_card_icon"></i>
                <h3 class="txt_blue_500 f-10">Atención de Salud</h3>
            </button> 
        </div>

        <div class="hc_card">
            <div class="hc_card_items"> 
                <i data-feather="trending-up" class="ch_card_icon"></i>
                <h3 class="txt_blue_500 f-10">Agregar Resultados de Exámenes</h3>
            </div> 
            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_aut" data-bs-toggle="modal"> 
                <i data-feather="check-circle" class="ch_card_icon"></i>
                <h3 class="txt_blue_500 f-10">Autorizaciones</h3>
            </button> 
            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_incap" data-bs-toggle="modal"> 
                <i data-feather="activity" class="ch_card_icon"></i>
                <h3 class="txt_blue_500 f-10">Incapacidades</h3>
            </button>  
            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_as" data-bs-toggle="modal"> 
                <i data-feather="navigation" class="ch_card_icon"></i>
                <h3 class="txt_blue_500 f-10">Atención de Salud</h3>
            </button>
        </div>

        <div class="hc_card">
            <div class="hc_card_items"> 
                <i data-feather="trending-up" class="ch_card_icon"></i>
                <h3 class="txt_blue_500 f-10">Agregar Resultados de Exámenes</h3>
            </div> 
            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_aut" data-bs-toggle="modal"> 
                <i data-feather="check-circle" class="ch_card_icon"></i>
                <h3 class="txt_blue_500 f-10">Autorizaciones</h3>
            </button> 
            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_incap" data-bs-toggle="modal"> 
                <i data-feather="activity" class="ch_card_icon"></i>
                <h3 class="txt_blue_500 f-10">Incapacidades</h3>
            </button>  
            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_as" data-bs-toggle="modal"> 
                <i data-feather="navigation" class="ch_card_icon"></i>
                <h3 class="txt_blue_500 f-10">Atención de Salud</h3>
            </button>
        </div>

        <div class="hc_card"> 
            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_as" data-bs-toggle="modal"> 
                <i data-feather="navigation" class="ch_card_icon"></i>
                <h3 class="txt_blue_500 f-10">Atención de Salud</h3>
            </button>
        </div>
    </div>
    <!-- End Container fluid  -->

    <!-- Modal   identificación y datos generales del paciete -->
    <div class="modal fade" id="vertical-center-scroll-modal_idgp" tabindex="-1" aria-labelledby="vertical-center-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable hc_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="pb-5">
                        <h2 class="txt_blue_bold fs-10 mt-3">{{ __('trans.identification-and-general-data-of-the-patient') }}</h2>
                    </div>
                    <form action="" method="post" class="form" enctype="">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4 mb-3"><!-- Ok -->
                                    <label for="marital-status" class="txt_dark_bold fs-4">{{ __('validation.attributes.marital-status') }}</label>
                                    <select class="form-select form_style_input @error('marital-status') is-invalid @enderror" id="marital-status" name="marital-status">
                                        <option ></option>
                                        <option value="married" {{ (old('marital-status') == 'married') ? 'selected' : '' }}>{{ __('trans.married') }}</option>
                                        <option value="single" {{ (old('marital-status') == 'single') ? 'selected' : '' }}>{{ __('trans.single') }}</option>
                                        <option value="divorced" {{ (old('marital-status') == 'divorced') ? 'selected' : '' }}>{{ __('trans.divorced') }}</option>
                                        <option value="union couples" {{ (old('marital-status') == 'union couples') ? 'selected' : '' }}>{{ __('trans.union-couples') }}</option>
                                        <option value="widower" {{ (old('marital-status') == 'widower') ? 'selected' : '' }}>{{ __('trans.widower') }}</option>
                                        <option value="legal separation" {{ (old('marital-status') == 'legal separation') ? 'selected' : '' }}>{{ __('trans.legal-separation') }}</option>
                                        <option value="Concubinage" {{ (old('marital-status') == 'Concubinage') ? 'selected' : '' }}>{{ __('trans.concubinage') }}</option>
                                        <option value="significant other" {{ (old('marital-status') == 'significant other') ? 'selected' : '' }}>{{ __('trans.significant-other') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3"><!-- Ok -->
                                    <label for="gender_identity" class="txt_dark_bold fs-4">{{ __('validation.attributes.gender_identity') }}</label>
                                    <select name="gender_identity" id="gender_identity" class="form-select form_style_input @error('gender_identity') is-invalid @enderror">
                                        <option></option>
                                        <option value="male" {{ old('gender_identity') == 'male' ? 'selected' : ''}}>{{ __('trans.male') }}</option>
                                        <option value="feminine" {{ old('gender_identity') == 'feminine' ? 'selected' : ''}}>{{ __('trans.feminine') }}</option>
                                        <option value="transgender" {{ old('gender_identity') == 'transgender' ? 'selected' : ''}}>{{ __('trans.transgender') }}</option>
                                        <option value="neutral" {{ old('gender_identity') == 'neutral' ? 'selected' : ''}}>{{ __('trans.neutral') }}</option>
                                        <option value="not declare" {{ old('gender_identity') == 'not declare' ? 'selected' : ''}}>{{ __('trans.not declare') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3"><!-- ok -->
                                    <div class="row">
                                        <div class="col-md-9">
                                            <label for="occupancy_time_inquiry" class="txt_dark_bold fs-4">{{ __('validation.attributes.occupancy-at-time-of-inquiry') }}</label>
                                            <input type="text" class="form-control form_style_input @error('occupancy_time_inquiry') is-invalid @enderror occupancy"
                                            id="occupancy_time_inquiry" name="occupancy_time_inquiry" value="{{ old('occupancy_time_inquiry') }}" data-code="#code_occupancy">
                                        </div>

                                        <div class="col-md-3">
                                            <label for="code_occupancy" class="txt_dark_bold fs-4">{{ __('validation.attributes.code') }}</label>
                                            <input type="text" class="form-control form_style_input @error('code_occupancy') is-invalid @enderror"
                                            id="code_occupancy" name="code_occupancy" value="{{ old('code_occupancy') }}" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3"><!-- ok -->
                                    <div class="row">
                                        <label for="advance_directive_document" class="txt_dark_bold fs-4">{{ __('validation.attributes.advance-directive-document') }}</label>
                                        <!-- Check box SI NO -->
                                        <div class="col-md-4 d-flex align-items-end px-0"> <!-- Check box SI NO -->
                                            <div class="col-md-6 form-check d-flex align-items-center justify-content-end me-2 mb-0">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="checkbox1">
                                                <label class="form-check-label txt_dark_bold fs-5 ps-2" for="checkbox1">Si</label>
                                            </div>
                                            <div class="col-md-6 form-check d-flex align-items-center justify-content-end me-2 mb-0">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="checkbox1">
                                                <label class="form-check-label txt_dark_bold fs-5 ps-2" for="checkbox1">No</label>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control form_style_input @error('advance_directive_document') is-invalid @enderror"
                                            id="advance_directive_document" name="advance_directive_document" required value="{{ old('advance_directive_document') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3"><!-- ok -->
                                    <label for="provider-code-document" class="txt_dark_bold fs-4">{{ __('validation.attributes.provider-code-where-the-document-is-located') }}</label>
                                    <input type="text" class="form-control form_style_input @error('provider-code-document') is-invalid @enderror"
                                    id="provider-code-document" name="provider-code-document" required value="{{ old('provider-code-document') }}">
                                </div>
                                <div class="col-md-4 mb-3"><!-- Ok -->
                                    <label for="disability_category" class="txt_dark_bold fs-4">{{ __('validation.attributes.disability-category') }}</label>
                                    <select class="form-select form_style_input @error('disability_category') is-invalid @enderror" id="disability_category" name="disability_category">
                                        <option ></option>
                                        <option value="physical-disability" {{ (old('disability_category') == 'physical-disability') ? 'selected' : '' }}>{{ __('trans.physical-disability') }}</option>
                                        <option value="visual-impairment" {{ (old('disability_category') == 'visual-impairment') ? 'selected' : '' }}>{{ __('trans.visual-impairment') }}</option>
                                        <option value="hearing-impairment" {{ (old('disability_category') == 'hearing-impairment') ? 'selected' : '' }}>{{ __('trans.hearing-impairment') }}</option>
                                        <option value="intellectual-disability" {{ (old('disability_category') == 'intellectual-disability') ? 'selected' : '' }}>{{ __('trans.intellectual-disability') }}</option>
                                        <option value="psychosocial-disability" {{ (old('disability_category') == 'psychosocial-disability') ? 'selected' : '' }}>{{ __('trans.psychosocial-disability') }}</option>
                                        <option value="deaf-blind" {{ (old('disability_category') == 'deaf-blind') ? 'selected' : '' }}>{{ __('trans.deaf-blind') }}</option>
                                        <option value="multiple-disability" {{ (old('disability_category') == 'multiple-disability') ? 'selected' : '' }}>{{ __('trans.multiple-disability') }}</option>
                                        <option value="no-disability" {{ (old('disability_category') == 'no-disability') ? 'selected' : '' }}>{{ __('trans.no-disability') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3"><!-- ok -->
                                    <div class="row">
                                        <div class="col-md-9">
                                            <label for="country" class="txt_dark_bold fs-4">{{ __('validation.attributes.country-of-residence') }}</label>
                                            <input type="text" class="form-control form_style_input @error('country') is-invalid @enderror country"
                                            id="country" name="country" required value="{{ old('country') }}" data-code="#code_country">
                                        </div>

                                        <div class="col-md-3">
                                            <label for="code_country" class="txt_dark_bold fs-4">{{ __('validation.attributes.code') }}</label>
                                            <input type="text" class="form-control form_style_input @error('code_country') is-invalid @enderror"
                                            id="code_country" name="code_country" value="{{ old('code_country') }}" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3"><!-- ok -->
                                    <div class="row">
                                        <div class="col-md-9">
                                            <label for="department" class="txt_dark_bold fs-4">{{ __('validation.attributes.department-of-residence') }}</label>
                                            <input type="text" class="form-control form_style_input @error('department') is-invalid @enderror department"
                                            id="department" name="department" required value="{{ old('department') }}" data-search="#country" data-code="#code_department">
                                        </div>

                                        <div class="col-md-3">
                                            <label for="code_department" class="txt_dark_bold fs-4">{{ __('validation.attributes.code') }}</label>
                                            <input type="text" class="form-control form_style_input @error('code_department') is-invalid @enderror"
                                            id="code_department" name="code_department" value="{{ old('code_department') }}" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3"><!-- ok -->
                                    <div class="row">
                                        <div class="col-md-9">
                                            <label for="city" class="txt_dark_bold fs-4">{{ __('validation.attributes.city-/-municipality-of-residence') }}</label>
                                            <input type="text" class="form-control form_style_input @error('city') is-invalid @enderror city"
                                            id="city" name="city" required value="{{ old('city') }}" data-search="#department" data-code="#code_city">
                                        </div>

                                        <div class="col-md-3">
                                            <label for="code_city" class="txt_dark_bold fs-4">{{ __('validation.attributes.code') }}</label>
                                            <input type="text" class="form-control form_style_input @error('code_city') is-invalid @enderror"
                                            id="code_city" name="code_city" value="{{ old('code_city') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3"><!-- Ok -->
                                    <label for="locality" class="txt_dark_bold fs-4">{{ __('validation.attributes.locality-of-residence') }}</label>
                                    <input type="text" class="form-control form_style_input @error('locality') is-invalid @enderror"
                                    id="locality" name="locality" value="{{ old('locality') }}">
                                </div>
                                <div class="col-md-4 mb-3"><!-- Ok -->
                                    <label for="neighborhood" class="txt_dark_bold fs-4">{{ __('validation.attributes.neighborhood-of-residence') }}</label>
                                    <input type="text" class="form-control form_style_input @error('neighborhood') is-invalid @enderror"
                                    id="neighborhood" name="neighborhood" value="{{ old('neighborhood') }}">
                                </div>
                                <div class="col-md-4 mb-3"><!-- Ok -->
                                    <label for="uptown" class="txt_dark_bold fs-4">{{ __('validation.attributes.territorial-zone-of-residence') }}</label>
                                    <select name="uptown" id="uptown" class="form-select form_style_input @error('uptown') is-invalid @enderror">
                                        <option ></option>
                                        <option value="urban" {{ (old('uptown') == 'urban') ? 'selected' : '' }} >{{ __('trans.urban') }}</option>
                                        <option value="rural" {{ (old('uptown') == 'rural') ? 'selected' : '' }} >{{ __('trans.rural') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 mb-3"><!-- Ok -->
                                    <label for="stratum" class="txt_dark_bold fs-4">{{ __('validation.attributes.stratum') }}</label>
                                    <input type="text" class="form-control form_style_input @error('stratum') is-invalid @enderror"
                                    id="stratum" name="stratum" value="{{ old('stratum') }}">
                                </div>
                            </div>

                            <div class="dropdown-divider my-4"></div> <!-- Linea de división del formulario -->

                            <div class="row">
                                <div class="col-md-4 mb-3 pe-5"><!-- Ok -->
                                    <label for="level_schooling" class="txt_dark_bold fs-4">{{ __('validation.attributes.level-of-schooling') }}</label>
                                    <input type="text" class="form-control form_style_input @error('level_schooling') is-invalid @enderror"
                                    id="level_schooling" name="level_schooling" required value="{{ old('level_schooling') }}">
                                </div>
                                <div class="col-md-4 mb-3 ps-5"><!-- Ok -->
                                    <label for="EAPB" class="txt_dark_bold fs-4">{{ __('validation.attributes.EAPB') }}</label>
                                    <input type="text" class="form-control form_style_input @error('EAPB') is-invalid @enderror"
                                    id="EAPB" name="EAPB" required value="{{ old('EAPB') }}">
                                </div>
                                <div class="col-md-4 mb-3 ps-5"><!-- Ok -->
                                    <label for="code-EAPB" class="txt_dark_bold fs-4">{{ __('validation.attributes.code-EAPB') }}</label>
                                    <input type="text" class="form-control form_style_input @error('code-EAPB') is-invalid @enderror"
                                    id="code-EAPB" name="code-EAPB" required value="{{ old('code-EAPB') }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3 pe-5"><!-- Ok -->
                                    <label for="affiliate_type" class="txt_dark_bold fs-4">{{ __('validation.attributes.affiliate-type') }}</label>
                                    <input type="text" class="form-control form_style_input @error('affiliate_type') is-invalid @enderror"
                                    id="affiliate_type" name="affiliate_type" required value="{{ old('affiliate_type') }}">
                                </div>
                                <div class="col-md-4 mb-3 ps-5"><!-- Ok -->
                                    <label for="membership" class="txt_dark_bold fs-4">{{ __('validation.attributes.membership') }}</label>
                                    <input type="text" class="form-control form_style_input @error('membership') is-invalid @enderror"
                                    id="membership" name="membership" required value="{{ old('membership') }}">
                                </div>
                                <div class="col-md-4 mb-3 ps-5"><!-- Ok -->
                                    <label for="date_membership" class="txt_dark_bold fs-4">{{ __('validation.attributes.date-membership') }}</label>
                                    <input type="date" class="form-control form_style_input @error('date_membership') is-invalid @enderror"
                                    id="date_membership" name="date_membership" required value="{{ old('date_membership') }}">
                                </div>
                            </div>

                            <!-- Save Button -->
                            <div class="text-center mt-5" >
                                <button type="submit" class="btn btn-info align-self-center fs-7 px-4" style="font-weight: 100">
                                    {{ __('trans.save') }} 
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal   Información del acompañante o acudiente -->
    <div class="modal fade" id="vertical-center-scroll-modal_iaa" tabindex="-1" aria-labelledby="vertical-center-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable hc_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="pb-5">
                        <h2 class="txt_blue_bold fs-10 mt-3">{{ __('trans.Information-of-the-companion-or-guardian') }}</h2>
                    </div>
                    <form action="" method="post" class="form" enctype="">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6 mb-3"><!-- Ok -->
                                    <label for="full-name" class="txt_dark_bold fs-4">{{ __('validation.attributes.full-name') }}</label>
                                    <input type="text" class="form-control form_style_input @error('full-name') is-invalid @enderror"
                                    id="full-name" name="full-name" value="{{ old('full-name') }}">
                                </div>
                                <div class="col-md-6 mb-3"><!-- Ok -->
                                    <label for="relationship" class="txt_dark_bold fs-4">{{ __('validation.attributes.relationship') }}</label>
                                    <select name="relationship" id="relationship" class="form-select form_style_input @error('relationship') is-invalid @enderror">
                                        <option ></option>
                                        <option value="urban" {{ (old('relationship') == 'urban') ? 'selected' : '' }} >{{ __('trans.urban') }}</option>
                                        <option value="rural" {{ (old('relationship') == 'rural') ? 'selected' : '' }} >{{ __('trans.rural') }}</option>
                                        <option value="urban" {{ (old('relationship') == 'urban') ? 'selected' : '' }} >{{ __('trans.urban') }}</option>
                                        <option value="rural" {{ (old('relationship') == 'rural') ? 'selected' : '' }} >{{ __('trans.rural') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3"><!-- Ok -->
                                    <label for="address" class="txt_dark_bold fs-4">{{ __('validation.attributes.address') }}</label>
                                    <input type="text" class="form-control form_style_input @error('address') is-invalid @enderror"
                                    id="address" name="address" value="{{ old('address') }}">
                                </div>
                                <div class="col-md-4 mb-3"><!-- Ok -->
                                    <label for="phone" class="txt_dark_bold fs-4">{{ __('validation.attributes.phone') }}</label>
                                    <input type="number" class="form-control form_style_input @error('phone') is-invalid @enderror"
                                    id="phone" name="phone" required value="{{ old('phone') }}">
                                </div>
                                <div class="col-md-4 mb-3 ps-5"><!-- Ok -->
                                    <label for="email" class="txt_dark_bold fs-4">{{ __('validation.attributes.email') }}</label>
                                    <input type="email" class="form-control form_style_input @error('email') is-invalid @enderror"
                                    id="email" name="email" required value="{{ old('email') }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3"><!-- Ok -->
                                    <label for="stratum" class="txt_dark_bold fs-4">Médico o Institución que remite</label>
                                    <input type="text" class="form-control form_style_input @error('stratum') is-invalid @enderror"
                                    id="stratum" name="stratum" value="{{ old('stratum') }}">
                                </div>
                            </div>

                            <!-- Demographic Information -->
                            <div class="form_content_info_basic">
                                <h2 class="txt_blue_bold fs-10 m-0">{{ __('trans.information-of-the-person-charge-of-the-patient') }}</h2>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3"><!-- Ok -->
                                    <label for="full-name" class="txt_dark_bold fs-4">{{ __('validation.attributes.full-name') }}</label>
                                    <input type="text" class="form-control form_style_input @error('full-name') is-invalid @enderror"
                                    id="full-name" name="full-name" value="{{ old('full-name') }}">
                                </div>
                                <div class="col-md-6 mb-3"><!-- Ok -->
                                    <label for="relationship" class="txt_dark_bold fs-4">{{ __('validation.attributes.relationship') }}</label>
                                    <select name="relationship" id="relationship" class="form-select form_style_input @error('relationship') is-invalid @enderror">
                                        <option ></option>
                                        <option value="urban" {{ (old('relationship') == 'urban') ? 'selected' : '' }} >{{ __('trans.urban') }}</option>
                                        <option value="rural" {{ (old('relationship') == 'rural') ? 'selected' : '' }} >{{ __('trans.rural') }}</option>
                                        <option value="urban" {{ (old('relationship') == 'urban') ? 'selected' : '' }} >{{ __('trans.urban') }}</option>
                                        <option value="rural" {{ (old('relationship') == 'rural') ? 'selected' : '' }} >{{ __('trans.rural') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3"><!-- Ok -->
                                    <label for="address" class="txt_dark_bold fs-4">{{ __('validation.attributes.address') }}</label>
                                    <input type="text" class="form-control form_style_input @error('address') is-invalid @enderror"
                                    id="address" name="address" value="{{ old('address') }}">
                                </div>
                                <div class="col-md-4 mb-3"><!-- Ok -->
                                    <label for="phone" class="txt_dark_bold fs-4">{{ __('validation.attributes.phone') }}</label>
                                    <input type="number" class="form-control form_style_input @error('phone') is-invalid @enderror"
                                    id="phone" name="phone" required value="{{ old('phone') }}">
                                </div>
                                <div class="col-md-4 mb-3 ps-5"><!-- Ok -->
                                    <label for="email" class="txt_dark_bold fs-4">{{ __('validation.attributes.email') }}</label>
                                    <input type="email" class="form-control form_style_input @error('email') is-invalid @enderror"
                                    id="email" name="email" required value="{{ old('email') }}">
                                </div>
                            </div>

                            <!-- Save Button -->
                            <div class="text-center mt-5" >
                                <button type="submit" class="btn btn-info align-self-center fs-7 px-4" style="font-weight: 100">
                                    {{ __('trans.save') }} 
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal   Triage -->
    <div class="modal fade" id="vertical-center-scroll-modal_triage" tabindex="-1" aria-labelledby="vertical-center-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable hc_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="pb-5">
                        <h2 class="txt_blue_bold fs-10 mt-3">Triage</h2>
                    </div>
                    <form action="" method="post" class="form" enctype="">
                        @csrf
                        <div class="row">
                            <div class="accordion accordion-flush mb-5" id="accordionFlushExample">
                                <div class="accordion-item" style="background: #F1F1F1">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                        <button class="accordion-button collapsed justify-content-between txt_dark_bold fs-4" type="button" data-bs-toggle="collapse" 
                                            data-bs-target="#flush-collapseTriage" aria-expanded="false" aria-controls="flush-collapseTwo">
                                            Regitros Anteriores
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTriage" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <table class="" width="100%">
                                                        <tbody>
                                                            <tr>
                                                                <td class="">
                                                                    <span class="txt_dark_bold fs-4 ">Fecha: 14/12/2021 10:05 a.m.</span>
                                                                </td>
                                                                <td class="">
                                                                    <span class="txt_dark_bold fs-4 ">Triage: Dos</span>
                                                                </td>
                                                                <td class="">
                                                                    <span class="txt_dark_bold fs-4 ps-2"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="">
                                                                    <span class="txt_dark_bold fs-4 ">Fecha: 14/12/2021 10:05 a.m.</span>
                                                                </td>
                                                                <td class="">
                                                                    <span class="txt_dark_bold fs-4 ">Triage: Uno</span>
                                                                </td>
                                                                <td class="">
                                                                    <span class="txt_dark_bold fs-4 ps-2">El paciente acude sin acompañante</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="">
                                                                    <span class="txt_dark_bold fs-4 ">Fecha: 14/12/2021 10:05 a.m.</span>
                                                                </td>
                                                                <td class="">
                                                                    <span class="txt_dark_bold fs-4 ">Triage: Tres</span>
                                                                </td>
                                                                <td class="">
                                                                    <span class="txt_dark_bold fs-4 ps-2"></span>
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
                        <div class="row">
                            <div class="col-md-6 mb-3"><!-- Ok -->
                                <label for="date-and-time-triage" class="txt_dark_bold fs-4">{{ __('validation.attributes.date-and-time-triage') }}</label>
                                <input type="datetime" class="form-control form_style_input @error('date-and-time-triage') is-invalid @enderror"
                                id="date-and-time-triage" name="date-and-time-triage" value="{{ old('date-and-time-triage') }}">
                            </div>
                            <div class="col-md-6 mb-3"><!-- Ok -->
                                <label for="triage" class="txt_dark_bold fs-4">{{ __('validation.attributes.triage') }}</label>
                                <input type="number" class="form-control form_style_input @error('triage') is-invalid @enderror"
                                id="triage" name="triage" required value="{{ old('triage') }}">
                            </div>
                        </div>
                      
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="comments" class="txt_dark_bold fs-4">{{ __('validation.attributes.comments') }}</label>
                                <textarea class="form-control form_style_input form_textarea" placeholder="" id="comments" style="height: 100px">
                                </textarea>
                            </div>
                        </div>
                        <!-- Save Button -->
                        <div class="text-center mt-5" >
                            <button type="submit" class="btn btn-info align-self-center fs-7 px-4" style="font-weight: 100">
                                {{ __('trans.save') }} 
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal   Datos del Servicio -->
    <div class="modal fade" id="vertical-center-scroll-modal_ds" tabindex="-1" aria-labelledby="vertical-center-modal" style="display: none;" aria-hidden="true">   
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable hc_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="pb-5">
                        <h2 class="txt_blue_bold fs-10 mt-3">Datos del Servicio</h2>
                    </div>
                    <form action="" method="post" class="form" enctype="">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-3"><!-- Ok -->
                                <label for="relationship" class="txt_dark_bold fs-4">Convenio</label>
                                <select name="relationship" id="relationship" class="form-select form_style_input @error('relationship') is-invalid @enderror">
                                    <option ></option>
                                    <option value="urban" {{ (old('relationship') == 'urban') ? 'selected' : '' }} >{{ __('trans.urban') }}</option>
                                    <option value="rural" {{ (old('relationship') == 'rural') ? 'selected' : '' }} >{{ __('trans.rural') }}</option>
                                    <option value="urban" {{ (old('relationship') == 'urban') ? 'selected' : '' }} >{{ __('trans.urban') }}</option>
                                    <option value="rural" {{ (old('relationship') == 'rural') ? 'selected' : '' }} >{{ __('trans.rural') }}</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3"><!-- Ok -->
                                <label for="triage" class="txt_dark_bold fs-4">Consentimiento</label>
                                <input type="number" class="form-control form_style_input @error('triage') is-invalid @enderror"
                                id="triage" name="triage" required value="{{ old('triage') }}">
                            </div>
                            <div class="col-md-4 mb-3"><!-- Ok -->
                                <label for="triage" class="txt_dark_bold fs-4">Consultorio</label>
                                <input type="number" class="form-control form_style_input @error('triage') is-invalid @enderror"
                                id="triage" name="triage" required value="{{ old('triage') }}">
                            </div>
                        </div>
                      
                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center pt-4"> <!-- Check box SI NO -->
                                <input type="checkbox" class="form-check-input form_checkBox" id="checkbox1">
                                <label class="form-check-label txt_dark_bold fs-5 ps-2" for="checkbox1">Hospitalización</label>
                            </div>
                            <div class="col-md-4 mb-3"><!-- Ok -->
                                <label for="triage" class="txt_dark_bold fs-4">Piso</label>
                                <input type="number" class="form-control form_style_input @error('triage') is-invalid @enderror"
                                id="triage" name="triage" required value="{{ old('triage') }}">
                            </div>
                            <div class="col-md-4 mb-3"><!-- Ok -->
                                <label for="triage" class="txt_dark_bold fs-4">Cama</label>
                                <input type="number" class="form-control form_style_input @error('triage') is-invalid @enderror"
                                id="triage" name="triage" required value="{{ old('triage') }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3"><!-- Ok -->
                                <label for="triage" class="txt_dark_bold fs-4">Entorno donde se realiza la atención</label>
                                <input type="number" class="form-control form_style_input @error('triage') is-invalid @enderror"
                                id="triage" name="triage" required value="{{ old('triage') }}">
                            </div>
                            <div class="col-md-6 mb-3"><!-- Ok -->
                                <label for="triage" class="txt_dark_bold fs-4">Vía  de Ingreso del Usuario</label>
                                <input type="number" class="form-control form_style_input @error('triage') is-invalid @enderror"
                                id="triage" name="triage" required value="{{ old('triage') }}">
                            </div>
                        </div>
                        <!-- Save Button -->
                        <div class="text-center mt-5" >
                            <button type="submit" class="btn btn-info align-self-center fs-7 px-4" style="font-weight: 100">
                                {{ __('trans.save') }} 
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal   Atención de Salud -->
    <div class="modal fade" id="vertical-center-scroll-modal_as" tabindex="-1" aria-labelledby="vertical-center-modal" style="display: none;" aria-hidden="true">   
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable hc_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="pb-5">
                        <h2 class="txt_blue_bold fs-10 mt-3">Atención de Salud</h2>
                        <h2 class="txt_blue_bold fs-7">Modalidad de Realización del Servicio de Salud</h2>
                    </div>
                    <form action="" method="post" class="form" enctype="">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3"><!-- Ok -->
                                <label for="triage" class="txt_dark_bold fs-4">Sintoma 1</label>
                                <input type="number" class="form-control form_style_input @error('triage') is-invalid @enderror"
                                id="triage" name="triage" required value="{{ old('triage') }}">
                            </div>
                            <div class="col-md-6 mb-3"><!-- Ok -->
                                <label for="triage" class="txt_dark_bold fs-4">Fecha de Inicio del Sintoma</label>
                                <input type="date" class="form-control form_style_input @error('triage') is-invalid @enderror"
                                id="triage" name="triage" required value="{{ old('triage') }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3"><!-- Ok -->
                                <label for="triage" class="txt_dark_bold fs-4">Sintoma 2</label>
                                <input type="number" class="form-control form_style_input @error('triage') is-invalid @enderror"
                                id="triage" name="triage" required value="{{ old('triage') }}">
                            </div>
                            <div class="col-md-6 mb-3"><!-- Ok -->
                                <label for="triage" class="txt_dark_bold fs-4">Fecha de Inicio del Sintoma</label>
                                <input type="date" class="form-control form_style_input @error('triage') is-invalid @enderror"
                                id="triage" name="triage" required value="{{ old('triage') }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3"><!-- Ok -->
                                <label for="triage" class="txt_dark_bold fs-4">Sintoma 3</label>
                                <input type="number" class="form-control form_style_input @error('triage') is-invalid @enderror"
                                id="triage" name="triage" required value="{{ old('triage') }}">
                            </div>
                            <div class="col-md-6 mb-3"><!-- Ok -->
                                <label for="triage" class="txt_dark_bold fs-4">Fecha de Inicio del Sintoma</label>
                                <input type="date" class="form-control form_style_input @error('triage') is-invalid @enderror"
                                id="triage" name="triage" required value="{{ old('triage') }}">
                            </div>
                        </div>


                        <a href="javascript:void(0)" id="btn-add-contact" class="txt_blue_light_500 fs-5 fw_bold py-2 d-flex">
                            <i data-feather="plus" class="pe-2"></i> Agregar
                        </a>
                        <!-- Save Button -->
                        <div class="text-center mt-5" >
                            <button type="submit" class="btn btn-info align-self-center fs-7 px-4" style="font-weight: 100">
                                {{ __('trans.save') }} 
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal   Incapacidades -->
    <div class="modal fade" id="vertical-center-scroll-modal_incap" tabindex="-1" aria-labelledby="vertical-center-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable hc_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="pb-5">
                        <h2 class="txt_blue_bold fs-10 mt-3">Incapacidades</h2>
                    </div>
                    <form action="" method="post" class="form" enctype="">
                        @csrf
                        <div class="row">
                            <div class="accordion accordion-flush mb-5" id="accordionFlushExample">
                                <div class="accordion-item" style="background: #F1F1F1">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                        <button class="accordion-button collapsed justify-content-between txt_dark_bold fs-4" type="button" data-bs-toggle="collapse" 
                                            data-bs-target="#flush-collapseIncap" aria-expanded="false" aria-controls="flush-collapseTwo">
                                            Regitros Anteriores
                                        </button>
                                    </h2>
                                    <div id="flush-collapseIncap" class="accordion-collapse collapse hc_collapse_registers" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body px-0">
                                            <div class="row">
                                                <div class="col-12 hc_accordion_collapse">
                                                    <button class="accordion-button collapsed txt_dark_bold fs-4 hc_incap_btn_accordion" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseIncap1" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                        Fecha: 20/03/2019 14:58
                                                    </button>
                                                    <div id="flush-collapseIncap1" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <table class="data_table" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Tipo de Incapacidad</th>
                                                                                <th>Días de Incapacidad</th>
                                                                                <th>Descripción de la Incapacidad</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="">
                                                                                    <span class="txt_dark_bold fs-4 ">Nuevo</span>
                                                                                </td>
                                                                                <td class="">
                                                                                    <span class="txt_dark_bold fs-4 ">2</span>
                                                                                </td>
                                                                                <td class="">
                                                                                    <p class="txt_dark_bold fs-4 ps-2">
                                                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut praesentium laudantium dolore 
                                                                                        libero dicta mollitia animi ad culpa quasi quae.
                                                                                    </p>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="accordion-button collapsed txt_dark_bold fs-4 hc_incap_btn_accordion" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseIncap2" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                        Fecha: 16/05/2018 10:16
                                                    </button>
                                                    <div id="flush-collapseIncap2" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <table class="data_table" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Tipo de Incapacidad</th>
                                                                                <th>Días de Incapacidad</th>
                                                                                <th>Descripción de la Incapacidad</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="">
                                                                                    <span class="txt_dark_bold fs-4 ">Prolongado</span>
                                                                                </td>
                                                                                <td class="">
                                                                                    <span class="txt_dark_bold fs-4 ">8</span>
                                                                                </td>
                                                                                <td class="">
                                                                                    <p class="txt_dark_bold fs-4 ps-2">
                                                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut praesentium laudantium dolore 
                                                                                        libero dicta mollitia animi ad culpa quasi quae. adipisicing elit. Ut praesentium 
                                                                                        laudantium dolore 
                                                                                    </p>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="accordion-button collapsed txt_dark_bold fs-4 hc_incap_btn_accordion" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseIncap3" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                        Fecha: 08/02/2017 09:35
                                                    </button>
                                                    <div id="flush-collapseIncap3" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <table class="data_table" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Tipo de Incapacidad</th>
                                                                                <th>Días de Incapacidad</th>
                                                                                <th>Descripción de la Incapacidad</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="">
                                                                                    <span class="txt_dark_bold fs-4 ">Lisenciado</span>
                                                                                </td>
                                                                                <td class="">
                                                                                    <span class="txt_dark_bold fs-4 ">15</span>
                                                                                </td>
                                                                                <td class="">
                                                                                    <p class="txt_dark_bold fs-4 ps-2">
                                                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut praesentium laudantium dolore 
                                                                                        libero dicta mollitia animi ad culpa quasi quae. adipisicing elit. Ut praesentium laudantium
                                                                                        adipisicing elit. Ut praesentium laudantium dolore 
                                                                                    </p>
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
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3"><!-- Ok -->
                                <label for="gender_identity" class="txt_dark_bold fs-4">Tipo de Incapacidad</label>
                                <select name="gender_identity" id="gender_identity" class="form-select form_style_input @error('gender_identity') is-invalid @enderror">
                                    <option></option>
                                    <option value="Nuevo">Nuevo</option>
                                    <option value="Prolongado">Prolongado</option>
                                    <option value="Lisenciado">Lisenciado</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3"><!-- Ok -->
                                <label for="triage" class="txt_dark_bold fs-4">Días</label>
                                <input type="number" class="form-control form_style_input @error('triage') is-invalid @enderror"
                                id="triage" name="triage" required value="{{ old('triage') }}">
                            </div>
                        </div>
                      
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="comments" class="txt_dark_bold fs-4">Descripción</label>
                                <textarea class="form-control form_style_input form_textarea" placeholder="" id="comments" style="height: 100px">
                                </textarea>
                            </div>
                        </div>
                        <!-- Save Button -->
                        <div class="text-center mt-5" >
                            <button type="submit" class="btn btn-info align-self-center fs-7 px-4" style="font-weight: 100">
                                {{ __('trans.save') }} 
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal   Diagnostico -->
    <div class="modal fade" id="vertical-center-scroll-modal_diag" tabindex="-1" aria-labelledby="vertical-center-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable hc_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="pb-5">
                        <h2 class="txt_blue_bold fs-10 mt-3">Diagnostico</h2>
                    </div>
                    <form action="" method="post" class="form" enctype="">
                        @csrf
                        <div class="row">
                            <div class="accordion accordion-flush mb-5" id="accordionFlushExample">
                                <div class="accordion-item" style="background: #F1F1F1">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                        <button class="accordion-button collapsed justify-content-between txt_dark_bold fs-4" type="button" data-bs-toggle="collapse" 
                                            data-bs-target="#flush-collapseDiagnostico" aria-expanded="false" aria-controls="flush-collapseTwo">
                                            Regitros Anteriores
                                        </button>
                                    </h2>
                                    <div id="flush-collapseDiagnostico" class="accordion-collapse collapse hc_collapse_registers" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body px-0">
                                            <div class="row">
                                                <div class="col-12 hc_accordion_collapse">
                                                    <button class="accordion-button collapsed txt_dark_bold fs-4 hc_incap_btn_accordion" type="button" data-bs-toggle="collapse" 
                                                        data-bs-target="#flush-collapseDiagnostico1" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                        Fecha: 20/03/2019 14:58
                                                    </button>
                                                    <div id="flush-collapseDiagnostico1" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <table class="data_table" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Tipo de Incapacidad</th>
                                                                                <th>Días de Incapacidad</th>
                                                                                <th>Descripción de la Incapacidad</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="">
                                                                                    <span class="txt_dark_bold fs-4 ">Nuevo</span>
                                                                                </td>
                                                                                <td class="">
                                                                                    <span class="txt_dark_bold fs-4 ">2</span>
                                                                                </td>
                                                                                <td class="">
                                                                                    <p class="txt_dark_bold fs-4 ps-2">
                                                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut praesentium laudantium dolore 
                                                                                        libero dicta mollitia animi ad culpa quasi quae.
                                                                                    </p>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="accordion-button collapsed txt_dark_bold fs-4 hc_incap_btn_accordion" type="button" data-bs-toggle="collapse" 
                                                        data-bs-target="#flush-collapseDiagnostico2" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                        Fecha: 16/05/2018 10:16
                                                    </button>
                                                    <div id="flush-collapseDiagnostico2" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <table class="data_table" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Tipo de Incapacidad</th>
                                                                                <th>Días de Incapacidad</th>
                                                                                <th>Descripción de la Incapacidad</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="">
                                                                                    <span class="txt_dark_bold fs-4 ">Prolongado</span>
                                                                                </td>
                                                                                <td class="">
                                                                                    <span class="txt_dark_bold fs-4 ">8</span>
                                                                                </td>
                                                                                <td class="">
                                                                                    <p class="txt_dark_bold fs-4 ps-2">
                                                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut praesentium laudantium dolore 
                                                                                        libero dicta mollitia animi ad culpa quasi quae. adipisicing elit. Ut praesentium 
                                                                                        laudantium dolore 
                                                                                    </p>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="accordion-button collapsed txt_dark_bold fs-4 hc_incap_btn_accordion" type="button" data-bs-toggle="collapse" 
                                                        data-bs-target="#flush-collapseDiagnostico3" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                        Fecha: 08/02/2017 09:35
                                                    </button>
                                                    <div id="flush-collapseDiagnostico3" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <table class="data_table" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Tipo de Incapacidad</th>
                                                                                <th>Días de Incapacidad</th>
                                                                                <th>Descripción de la Incapacidad</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="">
                                                                                    <span class="txt_dark_bold fs-4 ">Lisenciado</span>
                                                                                </td>
                                                                                <td class="">
                                                                                    <span class="txt_dark_bold fs-4 ">15</span>
                                                                                </td>
                                                                                <td class="">
                                                                                    <p class="txt_dark_bold fs-4 ps-2">
                                                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut praesentium laudantium dolore 
                                                                                        libero dicta mollitia animi ad culpa quasi quae. adipisicing elit. Ut praesentium laudantium
                                                                                        adipisicing elit. Ut praesentium laudantium dolore 
                                                                                    </p>
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
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mb-3"><!-- Ok -->
                                <label for="" class="txt_dark_bold fs-4">Diagnostico</label>
                                <div class="d-flex">
                                    <input type="search" class="form-control form_style_input noBorder_radius_right @error('date-and-time-triage') is-invalid @enderror"
                                    id="" name="" value="{{ old('') }}" aria-label="Search">
                                    <button class="btn form_style_input noBorder_radius_left_two" type="submit"><i data-feather="search" style="color: #1DBFD6;"></i></button>
                                </div>
                            </div>
                        </div>
                      
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-switch d-flex justify-content-between p-0">
                                    <label for="" class="txt_dark_bold fs-4">Diagnostico opcional uno</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked1" checked>
                                </div>
                                <div class="d-flex">
                                    <input type="search" class="form-control form_style_input noBorder_radius_right @error('date-and-time-triage') is-invalid @enderror"
                                    id="" name="" value="{{ old('') }}" aria-label="Search">
                                    <button class="btn form_style_input noBorder_radius_left_two" type="submit"><i data-feather="search" style="color: #1DBFD6;"></i></button>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-switch d-flex justify-content-between p-0">
                                    <label for="" class="txt_dark_bold fs-4">Diagnostico opcional dos</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                                </div>
                                <div class="d-flex">
                                    <input type="search" class="form-control form_style_input noBorder_radius_right @error('date-and-time-triage') is-invalid @enderror"
                                    id="" name="" value="{{ old('') }}" aria-label="Search">
                                    <button class="btn form_style_input noBorder_radius_left_two" type="submit"><i data-feather="search" style="color: #1DBFD6;"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- Save Button -->
                        <div class="text-center mt-5" >
                            <button type="submit" class="btn btn-info align-self-center fs-7 px-4" style="font-weight: 100">
                                {{ __('trans.save') }} 
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal   Resumen -->
    <div class="modal fade" id="vertical-center-scroll-modal_resumen" tabindex="-1" aria-labelledby="vertical-center-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable hc_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="pb-5">
                        <h2 class="txt_blue_bold fs-10 mt-3">Resumen</h2>
                    </div>
                    <form action="" method="post" class="form" enctype="">
                        @csrf
                        <div class="row">
                            <div class="accordion accordion-flush mb-5" id="accordionFlushExample">
                                <div class="accordion-item" style="background: #F1F1F1">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                        <button class="accordion-button collapsed justify-content-between txt_dark_bold fs-4" type="button" data-bs-toggle="collapse" 
                                            data-bs-target="#flush-collapseResumen" aria-expanded="false" aria-controls="flush-collapseTwo">
                                            Regitros Anteriores
                                        </button>
                                    </h2>
                                    <div id="flush-collapseResumen" class="accordion-collapse collapse hc_collapse_registers" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body px-0">
                                            <div class="row">
                                                <div class="col-12 hc_accordion_collapse">
                                                    <button class="accordion-button collapsed txt_dark_bold fs-4 hc_incap_btn_accordion" type="button" data-bs-toggle="collapse" 
                                                        data-bs-target="#flush-collapseResumen1" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                        Fecha: 20/03/2019 14:58
                                                    </button>
                                                    <div id="flush-collapseResumen1" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <table class="data_table" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Tipo de Incapacidad</th>
                                                                                <th>Días de Incapacidad</th>
                                                                                <th>Descripción de la Incapacidad</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="">
                                                                                    <span class="txt_dark_bold fs-4 ">Nuevo</span>
                                                                                </td>
                                                                                <td class="">
                                                                                    <span class="txt_dark_bold fs-4 ">2</span>
                                                                                </td>
                                                                                <td class="">
                                                                                    <p class="txt_dark_bold fs-4 ps-2">
                                                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut praesentium laudantium dolore 
                                                                                        libero dicta mollitia animi ad culpa quasi quae.
                                                                                    </p>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="accordion-button collapsed txt_dark_bold fs-4 hc_incap_btn_accordion" type="button" data-bs-toggle="collapse" 
                                                        data-bs-target="#flush-collapseResumen2" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                        Fecha: 16/05/2018 10:16
                                                    </button>
                                                    <div id="flush-collapseResumen2" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <table class="data_table" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Tipo de Incapacidad</th>
                                                                                <th>Días de Incapacidad</th>
                                                                                <th>Descripción de la Incapacidad</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="">
                                                                                    <span class="txt_dark_bold fs-4 ">Prolongado</span>
                                                                                </td>
                                                                                <td class="">
                                                                                    <span class="txt_dark_bold fs-4 ">8</span>
                                                                                </td>
                                                                                <td class="">
                                                                                    <p class="txt_dark_bold fs-4 ps-2">
                                                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut praesentium laudantium dolore 
                                                                                        libero dicta mollitia animi ad culpa quasi quae. adipisicing elit. Ut praesentium 
                                                                                        laudantium dolore 
                                                                                    </p>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="accordion-button collapsed txt_dark_bold fs-4 hc_incap_btn_accordion" type="button" data-bs-toggle="collapse" 
                                                        data-bs-target="#flush-collapseResumen3" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                        Fecha: 08/02/2017 09:35
                                                    </button>
                                                    <div id="flush-collapseResumen3" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <table class="data_table" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Tipo de Incapacidad</th>
                                                                                <th>Días de Incapacidad</th>
                                                                                <th>Descripción de la Incapacidad</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="">
                                                                                    <span class="txt_dark_bold fs-4 ">Lisenciado</span>
                                                                                </td>
                                                                                <td class="">
                                                                                    <span class="txt_dark_bold fs-4 ">15</span>
                                                                                </td>
                                                                                <td class="">
                                                                                    <p class="txt_dark_bold fs-4 ps-2">
                                                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut praesentium laudantium dolore 
                                                                                        libero dicta mollitia animi ad culpa quasi quae. adipisicing elit. Ut praesentium laudantium
                                                                                        adipisicing elit. Ut praesentium laudantium dolore 
                                                                                    </p>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="comments" class="txt_dark_bold fs-4">Resumen</label>
                                <textarea class="form-control form_style_input form_textarea" placeholder="" id="comments" style="height: 100px">
                                </textarea>
                            </div>
                        </div>
                        <!-- Save Button -->
                        <div class="text-center mt-5" >
                            <button type="submit" class="btn btn-info align-self-center fs-7 px-4" style="font-weight: 100">
                                {{ __('trans.save') }} 
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal   Autorizaciones -->
    <div class="modal fade" id="vertical-center-scroll-modal_aut" tabindex="-1" aria-labelledby="vertical-center-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable hc_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="pb-5">
                        <h2 class="txt_blue_bold fs-10 mt-3">Autorizaciones</h2>
                    </div>
                    <form action="" method="post" class="form" enctype="">
                        @csrf
                        <div class="row">
                            <div class="accordion accordion-flush mb-5" id="accordionFlushExample">
                                <div class="accordion-item" style="background: #F1F1F1">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                        <button class="accordion-button collapsed justify-content-between txt_dark_bold fs-4" type="button" data-bs-toggle="collapse" 
                                            data-bs-target="#flush-collapseAuto" aria-expanded="false" aria-controls="flush-collapseTwo">
                                            Regitros Anteriores
                                        </button>
                                    </h2>
                                    <div id="flush-collapseAuto" class="accordion-collapse collapse hc_collapse_registers" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body px-0">
                                            <div class="row">
                                                <div class="col-12 hc_accordion_collapse">
                                                    <button class="accordion-button collapsed txt_dark_bold fs-4 hc_incap_btn_accordion" type="button" data-bs-toggle="collapse" 
                                                        data-bs-target="#flush-collapseAuto1" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                        Fecha: 20/03/2019 14:58
                                                    </button>
                                                    <div id="flush-collapseAuto1" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <table class="data_table" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Tipo de Incapacidad</th>
                                                                                <th>Días de Incapacidad</th>
                                                                                <th>Descripción de la Incapacidad</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="">
                                                                                    <span class="txt_dark_bold fs-4 ">Nuevo</span>
                                                                                </td>
                                                                                <td class="">
                                                                                    <span class="txt_dark_bold fs-4 ">2</span>
                                                                                </td>
                                                                                <td class="">
                                                                                    <p class="txt_dark_bold fs-4 ps-2">
                                                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut praesentium laudantium dolore 
                                                                                        libero dicta mollitia animi ad culpa quasi quae.
                                                                                    </p>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="accordion-button collapsed txt_dark_bold fs-4 hc_incap_btn_accordion" type="button" data-bs-toggle="collapse" 
                                                        data-bs-target="#flush-collapseAuto2" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                        Fecha: 16/05/2018 10:16
                                                    </button>
                                                    <div id="flush-collapseAuto2" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <table class="data_table" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Tipo de Incapacidad</th>
                                                                                <th>Días de Incapacidad</th>
                                                                                <th>Descripción de la Incapacidad</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="">
                                                                                    <span class="txt_dark_bold fs-4 ">Prolongado</span>
                                                                                </td>
                                                                                <td class="">
                                                                                    <span class="txt_dark_bold fs-4 ">8</span>
                                                                                </td>
                                                                                <td class="">
                                                                                    <p class="txt_dark_bold fs-4 ps-2">
                                                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut praesentium laudantium dolore 
                                                                                        libero dicta mollitia animi ad culpa quasi quae. adipisicing elit. Ut praesentium 
                                                                                        laudantium dolore 
                                                                                    </p>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="accordion-button collapsed txt_dark_bold fs-4 hc_incap_btn_accordion" type="button" data-bs-toggle="collapse" 
                                                        data-bs-target="#flush-collapseAuto3" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                        Fecha: 08/02/2017 09:35
                                                    </button>
                                                    <div id="flush-collapseAuto3" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <table class="data_table" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Tipo de Incapacidad</th>
                                                                                <th>Días de Incapacidad</th>
                                                                                <th>Descripción de la Incapacidad</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="">
                                                                                    <span class="txt_dark_bold fs-4 ">Lisenciado</span>
                                                                                </td>
                                                                                <td class="">
                                                                                    <span class="txt_dark_bold fs-4 ">15</span>
                                                                                </td>
                                                                                <td class="">
                                                                                    <p class="txt_dark_bold fs-4 ps-2">
                                                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut praesentium laudantium dolore 
                                                                                        libero dicta mollitia animi ad culpa quasi quae. adipisicing elit. Ut praesentium laudantium
                                                                                        adipisicing elit. Ut praesentium laudantium dolore 
                                                                                    </p>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        <div class="row">
                            <div class="col-12 mb-3"><!-- Ok -->
                                <label for="" class="txt_dark_bold fs-4">Busqueda</label>
                                <div class="d-flex">
                                    <input type="search" class="form-control form_style_input noBorder_radius_right @error('date-and-time-triage') is-invalid @enderror"
                                    id="" name="" value="{{ old('') }}" aria-label="Search">
                                    <button class="btn form_style_input noBorder_radius_left_two" type="submit"><i data-feather="search" style="color: #1DBFD6;"></i></button>
                                </div>
                            </div>
                        </div>

                        <a href="javascript:void(0)" id="btn-add-contact" class="txt_blue_light_500 fs-5 fw_bold py-2 d-flex">
                            <i data-feather="plus" class="pe-2"></i> Agregar
                        </a>
                        <!-- Save Button -->
                        <div class="text-center mt-5" >
                            <button type="submit" class="btn btn-info align-self-center fs-7 px-4" style="font-weight: 100">
                                {{ __('trans.save') }} 
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
            $('.data_base').DataTable( {
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

        // Función para cambiar el texto del botón desplegable "Más información"
        function cambiarTexto() {
			texto.innerHTML=texto.innerHTML=="Ocultar información"?"Más información":"Ocultar información";
		}
    </script>
@endsection
