@extends('medhistoria.layouts.app')
@section('title', __('trans.patients'))

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/DataTables/css/jquery.dataTables.min.css') }}"/>  
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css"/>
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
                <!-- Imagen del Usuario -->
                <div class="col-md-1 p-0 pt-2 content_img_top_user">
                    <img src="{{ asset('img/medhistoria') }}/icon/icono-paciente-11.svg" alt="user" class="rounded-circle" width="85"/>
                </div>
                <!-- Información del Usuario -->
                <div class="col-md-5 p-0">
                    <h2 class="txt_blue_bold f-10">{{ __('trans.patient') }}: Homero Thompson</h2>
                    <h4 class="txt_dark_400 fs-5 mb-1">CC: 000 000 000 | {{ __('trans.birthday') }}: 28/11/1985</h4>
                    <h4 class="txt_dark_400 fs-5 mb-1">{{ __('trans.health_service') }}: Sura E.P.S.</h4>
                </div>
                <!-- Botones cancelar, guardar y guardar y finalizar consulta -->
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
                <!-- Información del Usuario del Desplegable -->
                <div class="offset-1 col-3 p-0">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item border-0 header_accordion">
                            <!-- Contenido oculto informcaión del Usuario  -->
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
                            <!-- Botón desplegable del contenido oculto -->
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
        <!-- Sección de fecha, número de hc, tipo de consulta -->
        <div class="card card-body" style="padding-top: 14px; padding-bottom: 14px">
            <div class="row d-flex justify-content-around">
                <div class="col-md-3 text-center p-0">
                    <h3 class="txt_blue_light_500 f-10">{{ __('trans.Date_time_issue') }}</h3>
                    <h4 class="txt_blue_500 fs-10 mb-1">08/02/2022 11:28 a.m.</h4>
                </div>
                <div class="col-md-3 text-center p-0">
                    <h3 class="txt_blue_light_500 f-10">{{ __('trans.Medical_history_number') }}</h3>
                    <h4 class="txt_blue_500 fs-10 mb-1">0000 000 000</h4>
                </div>
                <div class="col-md-3 text-center p-0">
                    <h3 class="txt_blue_light_500 f-10">{{ __('trans.query_type') }}</h3>
                    <h4 class="txt_blue_500 fs-10 mb-1">De Control</h4>
                </div>
            </div>
        </div>  

        <!-- Tarjetas de items historia clínica -->
        <div class="hc_card">
            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_idgp" data-bs-toggle="modal"> 
                <i data-feather="user" class="hc_card_icon"></i>
                <h3 class="txt_blue_500 f-10">{{ __('trans.identification_general_data_patient') }}</h3>
            </button> 

            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_iaa" data-bs-toggle="modal"> 
                <div class="form-switch p-0">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked1" checked>
                </div>
                <i data-feather="users" class="hc_card_icon"></i>
                <h3 class="txt_blue_500 f-10">{{ __('trans.information_companion_guardian') }}</h3>
            </button> 

            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_ds" data-bs-toggle="modal"> 
                <i data-feather="list" class="hc_card_icon"></i>
                <h3 class="txt_blue_500 f-10">{{ __('trans.service_data') }}</h3>
            </button> 

            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_enfAct" data-bs-toggle="modal"> 
                <i data-feather="user-plus" class="hc_card_icon"></i>
                <h3 class="txt_blue_500 f-10">{{ __('trans.current_illness') }}</h3>
            </button> 
        </div>

        <div class="hc_card">
            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_triage" data-bs-toggle="modal"> 
                <div class="form-switch p-0">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked1" checked>
                </div>
                <i data-feather="thermometer" class="hc_card_icon"></i>
                <h3 class="txt_blue_500 f-10">{{ __('trans.vital_signs_triage') }}</h3>
            </button> 

            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_antec" data-bs-toggle="modal"> 
                <i data-feather="link" class="hc_card_icon"></i>
                <h3 class="txt_blue_500 f-10">{{ __('trans.background') }}</h3>
            </button> 

            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_expFis" data-bs-toggle="modal"> 
                <i data-feather="user-check" class="hc_card_icon"></i>
                <h3 class="txt_blue_500 f-10">Exploración Física</h3>
            </button>

            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_revAparSis" data-bs-toggle="modal"> 
                <div class="form-switch p-0">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked1" checked>
                </div>
                <i data-feather="clipboard" class="hc_card_icon"></i>
                <h3 class="txt_blue_500 f-10">Revisión por Aparatos y Sistemas</h3>
            </button> 
        </div>

        <div class="hc_card">
            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_resulExam" data-bs-toggle="modal"> 
                <i data-feather="trending-up" class="hc_card_icon"></i>
                <h3 class="txt_blue_500 f-10">Resultados de Exámenes</h3>
            </button>

            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_diag" data-bs-toggle="modal"> 
                <i data-feather="search" class="hc_card_icon"></i>
                <h3 class="txt_blue_500 f-10">Diagnósticos</h3>
            </button>

            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_prescrip" data-bs-toggle="modal"> 
                <i data-feather="file" class="hc_card_icon"></i>
                <h3 class="txt_blue_500 f-10">Prescripciones</h3>
            </button> 
            
            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_aut" data-bs-toggle="modal"> 
                <div class="form-switch p-0">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked1" checked>
                </div>
                <i data-feather="check-circle" class="hc_card_icon"></i>
                <h3 class="txt_blue_500 f-10">Autorizaciones</h3>
            </button>
        </div>

        <div class="hc_card">
            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_incap" data-bs-toggle="modal"> 
                <div class="form-switch p-0">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked1" checked>
                </div>
                <i data-feather="activity" class="hc_card_icon"></i>
                <h3 class="txt_blue_500 f-10">Incapacidades</h3>
            </button> 

            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_tecSalud" data-bs-toggle="modal"> 
                <i data-feather="tv" class="hc_card_icon"></i>
                <h3 class="txt_blue_500 f-10">Tecnología en Salud</h3>
            </button> 

            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_resumen" data-bs-toggle="modal"> 
                <i data-feather="folder-plus" class="hc_card_icon"></i>
                <h3 class="txt_blue_500 f-10">Resumen Clínico - Epicrisis</h3>
            </button>  

            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_vacun" data-bs-toggle="modal"> 
                <i data-feather="shield" class="hc_card_icon"></i>
                <h3 class="txt_blue_500 f-10">Vacunación</h3>
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
                    <div class="d-flex align-self-start">
                        <h2 class="txt_blue_bold fs-10 mt-3">{{ __('trans.identification_general_data_patient') }}</h2>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="form" enctype="">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <!-- Estado Civil -->
                                <div class="col-md-4 mb-3">
                                    <label for="marital-status" class="txt_dark_bold fs-4">{{ __('validation.attributes.marital-status') }}</label>
                                    <select id="marital-status" name="marital-status" class="form-select form_style_input @error('marital-status') is-invalid @enderror">
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
                                <!-- Entidad de Genero -->
                                <div class="col-md-4 mb-3">
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
                                <!-- Ocupación y código -->
                                <div class="col-md-4 mb-3">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <label for="occupation" class="txt_dark_bold fs-4">{{ __('validation.attributes.occupation') }}</label>
                                            <input type="text" class="form-control form_style_input @error('occupation') is-invalid @enderror occupation"
                                               id="occupation" name="occupation" value="{{ old('occupation') }}" data-code="#code_occupation">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="code_occupation" class="txt_dark_bold fs-4">{{ __('validation.attributes.code_occupation') }}</label>
                                            <input type="text" class="form-control form_style_input @error('code_occupation') is-invalid @enderror"
                                            id="code_occupation" name="code_occupation" value="{{ old('code_occupation') }}" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <!-- Voluntad Anticipada y opciones de SI y NO -->
                                <div class="col-md-4 mb-3">
                                    <div class="row">
                                        <label for="advance_directive" class="txt_dark_bold fs-4">{{ __('validation.attributes.advance_directive') }}</label>
                                        <div class="col-md-4 d-flex align-items-end px-0">
                                            <div class="col-md-6 form-check d-flex align-items-center justify-content-end me-2 mb-0">
                                                <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                        id="advance_directive-1" name="advance_directive-status" data-activation=".advance_directive-input"
                                                        {{ old('advance_directive-status', 0) == 1 ? 'checked':'' }}/>
                                                <label class="form-check-label txt_dark_bold fs-5 ps-2" for="advance_directive-1">
                                                    Si
                                                </label>
                                            </div>
                                            <div class="col-md-6 form-check d-flex align-items-center justify-content-end me-2 mb-0">
                                                <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                        id="advance_directive-0" name="advance_directive-status" data-activation=".advance_directive-input"
                                                        {{ old('advance_directive-status', 0) == 0 ? 'checked':'' }}/>
                                                <label class="form-check-label txt_dark_bold fs-5 ps-2" for="advance_directive-0">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="date" class="form-control form_style_input @error('advance_directive') is-invalid @enderror advance_directive-input"
                                                    id="advance_directive" name="advance_directive"
                                                    value="{{ old('advance_directive') }}">
                                        </div>
                                    </div>
                                </div>
                                <!-- Código Voluntad Anticipada -->
                                <div class="col-md-4 mb-3">
                                    <label for="code_advance_directive" class="txt_dark_bold fs-4">{{ __('validation.attributes.code_advance_directive') }}</label>
                                    <input type="text" class="form-control form_style_input @error('code_advance_directive') is-invalid @enderror advance_directive-input"
                                            id="code_advance_directive" name="code_advance_directive"
                                            value="{{ old('code_advance_directive') }}">
                                </div>
                                <!-- Categoría de Discapacidad -->
                                <div class="col-md-4 mb-3">
                                    <label for="impairment" class="txt_dark_bold fs-4">{{ __('validation.attributes.impairment') }}</label>
                                    <select name="impairment" id="impairment" class="form-select form_style_input @error('impairment') is-invalid @enderror">
                                        <option></option>
                                        <option value="physical disability" {{ (old('impairment') == 'physical disability') ? 'selected' : '' }} >{{ __('trans.physical-disability') }}</option>
                                        <option value="visual impairment" {{ (old('impairment') == 'visual impairment') ? 'selected' : '' }} >{{ __('trans.visual-impairment') }}</option>
                                        <option value="hearing impairment" {{ (old('impairment') == 'hearing impairment') ? 'selected' : '' }} >{{ __('trans.hearing-impairment') }}</option>
                                        <option value="intellectual disability" {{ (old('impairment') == 'intellectual disability') ? 'selected' : '' }} >{{ __('trans.intellectual-disability') }}</option>
                                        <option value="psychosocial disability" {{ (old('impairment') == 'psychosocial disability') ? 'selected' : '' }} >{{ __('trans.psychosocial-disability') }}</option>
                                        <option value="deaf blind" {{ (old('impairment') == 'deaf blind') ? 'selected' : '' }} >{{ __('trans.deaf-blind') }}</option>
                                        <option value="multiple disability" {{ (old('impairment') == 'multiple disability') ? 'selected' : '' }} >{{ __('trans.multiple-disability') }}</option>
                                        <option value="no disability" {{ (old('impairment') == 'no disability') ? 'selected' : '' }} >{{ __('trans.no-disability') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <!-- País y Código del país -->
                                <div class="col-md-4 mb-3">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <label for="country" class="txt_dark_bold fs-4">{{ __('validation.attributes.country') }}</label>
                                            <input type="text" class="form-control form_style_input @error('country') is-invalid @enderror country"
                                                    id="country" name="country"  value="{{ old('country') }}" data-code="#code_country">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="code_country" class="txt_dark_bold fs-4">
                                                {{ __('validation.attributes.code_country') }}
                                            </label>
                                            <input type="text" class="form-control form_style_input @error('code_country') is-invalid @enderror"
                                                    id="code_country" name="code_country" value="{{ old('code_country') }}" >
                                        </div>
                                    </div>
                                </div>
                                <!-- Departamento y Código del departamento -->
                                <div class="col-md-4 mb-3">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <label for="department" class="txt_dark_bold fs-4">{{ __('validation.attributes.department') }}</label>
                                            <input type="text" class="form-control form_style_input @error('department') is-invalid @enderror department"
                                                    id="department" name="department"  value="{{ old('department') }}"
                                                    data-search="#country" data-code="#code_department">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="code_department" class="txt_dark_bold fs-4">{{ __('validation.attributes.code_department') }}</label>
                                            <input type="text" class="form-control form_style_input @error('code_department') is-invalid @enderror"
                                                    id="code_department" name="code_department" value="{{ old('code_department') }}" >
                                        </div>
                                    </div>
                                </div>
                                <!-- Ciudad y Código de la ciudad -->
                                <div class="col-md-4 mb-3">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <label for="city" class="txt_dark_bold fs-4">{{ __('validation.attributes.city') }}</label>
                                            <input type="text" class="form-control form_style_input @error('city') is-invalid @enderror city"
                                                    id="city" name="city"  value="{{ old('city') }}" data-search="#department" data-code="#code_city">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="code_city" class="txt_dark_bold fs-4">{{ __('validation.attributes.code_city') }}</label>
                                            <input type="text" class="form-control form_style_input @error('code_city') is-invalid @enderror"
                                                    id="code_city" name="code_city" value="{{ old('code_city') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Localidad-->
                                <div class="col-md-4 mb-3">
                                    <label for="locality" class="txt_dark_bold fs-4">{{ __('validation.attributes.locality') }}</label>
                                    <input type="text" class="form-control form_style_input @error('locality') is-invalid @enderror"
                                            id="locality" name="locality" value="{{ old('locality') }}">
                                </div>
                                <!-- Barrio -->
                                <div class="col-md-4 mb-3">
                                    <label for="neighborhood" class="txt_dark_bold fs-4">{{ __('validation.attributes.neighborhood') }}</label>
                                    <input type="text" class="form-control form_style_input @error('neighborhood') is-invalid @enderror"
                                            id="neighborhood" name="neighborhood" value="{{ old('neighborhood') }}">
                                </div>
                                <!-- Zona -->
                                <div class="col-md-4 mb-3">
                                    <label for="uptown" class="txt_dark_bold fs-4">{{ __('validation.attributes.uptown') }}</label>
                                    <select name="uptown" id="uptown" class="form-select form_style_input @error('uptown') is-invalid @enderror">
                                        <option ></option>
                                        <option value="urban" {{ (old('uptown') == 'urban') ? 'selected' : '' }} >{{ __('trans.urban') }}</option>
                                        <option value="rural" {{ (old('uptown') == 'rural') ? 'selected' : '' }} >{{ __('trans.rural') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Estrato -->
                                <div class="col-md-4 mb-3">
                                    <label for="stratum" class="txt_dark_bold fs-4">{{ __('validation.attributes.stratum') }}</label>
                                    <select id="stratum" name="stratum" class="form-select form_style_input @error('stratum') is-invalid @enderror">
                                    <option ></option>
                                        <option value="one" {{ (old('stratum') == 'one') ? 'selected' : '' }}>{{ __('trans.one') }}</option>
                                        <option value="two" {{ (old('stratum') == 'two') ? 'selected' : '' }}>{{ __('trans.two') }}</option>
                                        <option value="three" {{ (old('stratum') == 'three') ? 'selected' : '' }}>{{ __('trans.three') }}</option>
                                        <option value="four" {{ (old('stratum') == 'four') ? 'selected' : '' }}>{{ __('trans.four') }}</option>
                                        <option value="five" {{ (old('stratum') == 'five') ? 'selected' : '' }}>{{ __('trans.five') }}</option>
                                        <option value="six" {{ (old('stratum') == 'six') ? 'selected' : '' }}>{{ __('trans.six') }}</option>
                                        <option value="commercial" {{ (old('stratum') == 'commercial') ? 'selected' : '' }}>{{ __('trans.commercial') }}</option>
                                    </select>
                                </div>
                                <!-- Nivel de Escolaridad -->
                                <div class="col-md-4 mb-3">
                                    <label for="schooling-level" class="txt_dark_bold fs-4">{{ __('validation.attributes.schooling-level') }}</label>
                                    <select id="schooling-level" name="schooling-level" class="form-select form_style_input @error('schooling-level') is-invalid @enderror">
                                        <option ></option>
                                        <option value="preschool" {{ (old('schooling-level') == 'preschool') ? 'selected' : '' }}>{{ __('trans.preschool') }}</option>
                                        <option value="primary" {{ (old('schooling-level') == 'primary') ? 'selected' : '' }}>{{ __('trans.primary') }}</option>
                                        <option value="secondary" {{ (old('schooling-level') == 'secondary') ? 'selected' : '' }}>{{ __('trans.secondary') }}</option>
                                        <option value="higher" {{ (old('schooling-level') == 'higher') ? 'selected' : '' }}>{{ __('trans.higher') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="dropdown-divider my-4"></div> <!-- Linea de división del formulario -->

                            <div class="row">
                                <!-- Entidad Médica -->
                                <div class="col-md-6 mb-3 pe-5">
                                    <label for="entity" class="txt_dark_bold fs-4">{{ __('validation.attributes.entity') }}</label>
                                    <input type="text" class="form-control form_style_input @error('entity') is-invalid @enderror sgsss" data-code="#code_entity"
                                    id="entity" name="entity"  value="{{ old('entity') }}">
                                </div>
                                <!-- Código Entidad Médica -->
                                <div class="col-md-6 mb-3 ps-5">
                                    <label for="code_entity" class="txt_dark_bold fs-4">{{ __('validation.attributes.code_entity') }}</label>
                                    <input type="text" class="form-control form_style_input @error('code_entity') is-invalid @enderror"
                                    id="code_entity" name="code_entity"  value="{{ old('code_entity') }}">
                                </div>
                            </div>

                            <div class="row">
                                <!-- Régimen Contributivo -->
                                <div class="col-md-4 mb-3">
                                    <label for="contributory_regime" class="txt_dark_bold fs-4">{{ __('validation.attributes.contributory_regime') }}</label>
                                    <select name="contributory_regime" id="contributory_regime" class="form-select form_style_input @error('contributory_regime') is-invalid @enderror">
                                        <option></option>
                                        <option value="Cotizante" {{ (old('contributory_regime') == 'Cotizante') ? 'selected' : '' }} >Cotizante</option>
                                        <option value="Beneficiario" {{ (old('contributory_regime') == 'Beneficiario') ? 'selected' : '' }} >Beneficiario</option>
                                        <option value="Subsidiado" {{ (old('contributory_regime') == 'Subsidiado') ? 'selected' : '' }} >Subsidiado</option>
                                        <option value="Otro" {{ (old('contributory_regime') == 'Otro') ? 'selected' : '' }} >Otro</option>
                                    </select>
                                </div>
                                <!-- Afiliación -->
                                <div class="col-md-4 mb-3">
                                    <label for="status_medical" class="txt_dark_bold fs-4">{{ __('validation.attributes.status_medical') }}</label>
                                    <select name="status_medical" id="status_medical" class="form-select form_style_input @error('status_medical') is-invalid @enderror">
                                        <option ></option>
                                        <option value="active" {{ (old('status_medical') == 'active') ? 'selected' : '' }} >{{ __('trans.active') }}</option>
                                        <option value="inactive" {{ (old('status_medical') == 'inactive') ? 'selected' : '' }} >{{ __('trans.inactive') }}</option>
                                    </select>
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
                    <div class="d-flex align-self-start">
                        <h2 class="txt_blue_bold fs-10 mt-3">{{ __('trans.information_companion_guardian') }}</h2>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="form" enctype="">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <!-- Nombre Completo -->
                                <div class="col-md-6 mb-3">
                                    <label for="full_name" class="txt_dark_bold fs-4">{{ __('validation.attributes.full_name') }}</label>
                                    <input type="text" class="form-control form_style_input @error('full_name') is-invalid @enderror"
                                    id="full_name" name="full_name" value="{{ old('full_name') }}">
                                </div>
                                <!-- Parentesco -->
                                <div class="col-md-6 mb-3">
                                    <label for="relationship" class="txt_dark_bold fs-4">{{ __('validation.attributes.relationship') }}</label>
                                    <select name="relationship" id="relationship" class="form-select form_style_input @error('relationship') is-invalid @enderror">
                                        <option ></option>
                                        <option value="user" {{ (old('relationship') == 'user') ? 'selected' : '' }} >{{ __('trans.user') }}</option>
                                        <option value="user" {{ (old('relationship') == 'user') ? 'selected' : '' }} >{{ __('trans.user') }}</option>
                                        <option value="user" {{ (old('relationship') == 'user') ? 'selected' : '' }} >{{ __('trans.user') }}</option>
                                        <option value="user" {{ (old('relationship') == 'user') ? 'selected' : '' }} >{{ __('trans.user') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Dirección -->
                                <div class="col-md-4 mb-3">
                                    <label for="address" class="txt_dark_bold fs-4">{{ __('validation.attributes.address') }}</label>
                                    <input type="text" class="form-control form_style_input @error('address') is-invalid @enderror"
                                            id="address" name="address" value="{{ old('address') }}">
                                </div>
                                <!-- Teléfono -->
                                <div class="col-md-4 mb-3">
                                    <label for="phone" class="txt_dark_bold fs-4">{{ __('validation.attributes.phone') }}</label>
                                    <input type="number" class="form-control form_style_input @error('phone') is-invalid @enderror"
                                            id="phone" name="phone"  value="{{ old('phone') }}">
                                </div>
                                <!-- Correo Electrónico -->
                                <div class="col-md-4 mb-3">
                                    <label for="email" class="txt_dark_bold fs-4">{{ __('validation.attributes.email') }}</label>
                                    <input type="email" class="form-control form_style_input @error('email') is-invalid @enderror"
                                            id="email" name="email"  value="{{ old('email') }}">
                                </div>
                            </div>

                            <div class="row">
                                <!-- Médico o Institución que remite -->
                                <div class="col-md-6 mb-3">
                                    <label for="sender" class="txt_dark_bold fs-4">{{ __('validation.attributes.sender') }}</label>
                                    <input type="text" class="form-control form_style_input @error('sender') is-invalid @enderror"
                                    id="sender" name="sender" value="{{ old('sender') }}">
                                </div>
                            </div>

                            <!-- Información del responsable del paciente -->
                            <div class="form_content_info_basic">
                                <h2 class="txt_blue_bold fs-7 m-0">{{ __('trans.information_person_charge_patient') }}</h2>
                            </div>

                            <div class="row">
                                <!-- Nombre Completo -->
                                <div class="col-md-6 mb-3">
                                    <label for="full_name" class="txt_dark_bold fs-4">{{ __('validation.attributes.full_name') }}</label>
                                    <input type="text" class="form-control form_style_input @error('full_name') is-invalid @enderror"
                                    id="full_name" name="full_name" value="{{ old('full_name') }}">
                                </div>
                                <!-- Parentesco -->
                                <div class="col-md-6 mb-3">
                                    <label for="relationship" class="txt_dark_bold fs-4">{{ __('validation.attributes.relationship') }}</label>
                                    <select name="relationship" id="relationship" class="form-select form_style_input @error('relationship') is-invalid @enderror">
                                        <option ></option>
                                        <option value="user" {{ (old('relationship') == 'user') ? 'selected' : '' }} >{{ __('trans.user') }}</option>
                                        <option value="user" {{ (old('relationship') == 'user') ? 'selected' : '' }} >{{ __('trans.user') }}</option>
                                        <option value="user" {{ (old('relationship') == 'user') ? 'selected' : '' }} >{{ __('trans.user') }}</option>
                                        <option value="user" {{ (old('relationship') == 'user') ? 'selected' : '' }} >{{ __('trans.user') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Dirección -->
                                <div class="col-md-4 mb-3">
                                    <label for="address" class="txt_dark_bold fs-4">{{ __('validation.attributes.address') }}</label>
                                    <input type="text" class="form-control form_style_input @error('address') is-invalid @enderror"
                                            id="address" name="address" value="{{ old('address') }}">
                                </div>
                                <!-- Teléfono -->
                                <div class="col-md-4 mb-3">
                                    <label for="phone" class="txt_dark_bold fs-4">{{ __('validation.attributes.phone') }}</label>
                                    <input type="number" class="form-control form_style_input @error('phone') is-invalid @enderror"
                                            id="phone" name="phone"  value="{{ old('phone') }}">
                                </div>
                                <!-- Correo Electrónico -->
                                <div class="col-md-4 mb-3">
                                    <label for="email" class="txt_dark_bold fs-4">{{ __('validation.attributes.email') }}</label>
                                    <input type="email" class="form-control form_style_input @error('email') is-invalid @enderror"
                                            id="email" name="email"  value="{{ old('email') }}">
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

    <!-- Modal   Datos del Servicio -->
    <div class="modal fade" id="vertical-center-scroll-modal_ds" tabindex="-1" aria-labelledby="vertical-center-modal" style="display: none;" aria-hidden="true">   
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable hc_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="d-flex align-self-start">
                        <h2 class="txt_blue_bold fs-10 mt-3">{{ __('trans.service_data') }}</h2>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="form" enctype="">
                        @csrf
                        <div class="row">
                            <!-- Convenios -->
                            <div class="col-md-4 mb-3">
                                <label for="agreement" class="txt_dark_bold fs-4">{{ __('validation.attributes.agreement') }}</label>
                                <input type="text" class="form-control form_style_input @error('agreement') is-invalid @enderror"
                                        id="agreement" name="agreement" required value="{{ old('agreement') }}">
                            </div>
                            <!-- Consentimiento -->
                            <div class="col-md-4 mb-3">
                                <label for="consent" class="txt_dark_bold fs-4">{{ __('validation.attributes.consent') }}</label>
                                <input type="text" class="form-control form_style_input @error('consent') is-invalid @enderror"
                                        id="consent" name="consent" required value="{{ old('consent') }}">
                            </div>
                            <!-- Tipo de Servicio -->
                            <div class="col-md-4 mb-3">
                                <label for="type_service" class="txt_dark_bold fs-4">{{ __('validation.attributes.type_service') }}</label>
                                <input type="text" class="form-control form_style_input @error('type_service') is-invalid @enderror"
                                        id="type_service" name="type_service" required value="{{ old('type_service') }}">
                            </div>
                        </div>

                        <div class="row">
                            <!-- Hospitalización -->
                            <div class="col-md-4 d-flex align-items-center py-4"> 
                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                <label class="form-check-label txt_dark_bold fs-5 ps-2" for="hospitalization">{{ __('validation.attributes.hospitalization') }}</label>
                            </div>
                        </div>
                      
                        <div class="row">
                            <!-- Consultorio -->
                            <div class="col-md-4 mb-3">
                                <label for="consulting_room" class="txt_dark_bold fs-4">{{ __('validation.attributes.consulting_room') }}</label>
                                <input type="text" class="form-control form_style_input @error('consulting_room') is-invalid @enderror"
                                id="consulting_room" name="consulting_room" required value="{{ old('consulting_room') }}">
                            </div>
                            <!-- Piso -->
                            <div class="col-md-4 mb-3">
                                <label for="floor" class="txt_dark_bold fs-4">{{ __('validation.attributes.floor') }}</label>
                                <input type="text" class="form-control form_style_input @error('floor') is-invalid @enderror"
                                id="floor" name="floor" required value="{{ old('floor') }}">
                            </div>
                            <!-- Cama -->
                            <div class="col-md-4 mb-3">
                                <label for="bed" class="txt_dark_bold fs-4">{{ __('validation.attributes.bed') }}</label>
                                <input type="text" class="form-control form_style_input @error('bed') is-invalid @enderror"
                                id="bed" name="bed" required value="{{ old('bed') }}">
                            </div>
                        </div>

                        <div class="row">
                            <!-- Entorno donde se realzia la atención -->
                            <div class="col-md-4 mb-3">
                                <label for="caring_environment" class="txt_dark_bold fs-4">{{ __('validation.attributes.caring_environment') }}</label>
                                <input type="text" class="form-control form_style_input @error('caring_environment') is-invalid @enderror"
                                id="caring_environment" name="caring_environment" required value="{{ old('caring_environment') }}">
                            </div>
                            <!-- Vía de ingreso del Usuario -->
                            <div class="col-md-4 mb-3">
                                <label for="input_path" class="txt_dark_bold fs-4">{{ __('validation.attributes.input_path') }}</label>
                                <input type="text" class="form-control form_style_input @error('input_path') is-invalid @enderror"
                                id="input_path" name="input_path" required value="{{ old('input_path') }}">
                            </div>
                            <!-- Modalidad -->
                            <div class="col-md-4 mb-3">
                                <label for="modality" class="txt_dark_bold fs-4">{{ __('validation.attributes.modality') }}</label>
                                <select name="modality" id="modality" class="form-select form_style_input @error('modality') is-invalid @enderror">
                                    <option ></option>
                                    <option value="modality" {{ (old('modality') == 'modality') ? 'selected' : '' }} >{{ __('trans.modality') }}</option>
                                    <option value="modality" {{ (old('modality') == 'modality') ? 'selected' : '' }} >{{ __('trans.modality') }}</option>
                                    <option value="modality" {{ (old('modality') == 'modality') ? 'selected' : '' }} >{{ __('trans.modality') }}</option>
                                    <option value="modality" {{ (old('modality') == 'modality') ? 'selected' : '' }} >{{ __('trans.modality') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Grupo de Servicio -->
                            <div class="col-md-4 mb-3">
                                <label for="service_group" class="txt_dark_bold fs-4">{{ __('validation.attributes.service_group') }}</label>
                                <select name="service_group" id="service_group" class="form-select form_style_input @error('service_group') is-invalid @enderror">
                                    <option ></option>
                                    <option value="service_group" {{ (old('service_group') == 'service_group') ? 'selected' : '' }} >{{ __('trans.service_group') }}</option>
                                    <option value="service_group" {{ (old('service_group') == 'service_group') ? 'selected' : '' }} >{{ __('trans.service_group') }}</option>
                                    <option value="service_group" {{ (old('service_group') == 'service_group') ? 'selected' : '' }} >{{ __('trans.service_group') }}</option>
                                    <option value="service_group" {{ (old('service_group') == 'service_group') ? 'selected' : '' }} >{{ __('trans.service_group') }}</option>
                                </select>
                            </div>
                        </div>

                        <!-- Exposición a factores de riesgo -->
                        <div class="form_content_info_basic">
                            <h2 class="txt_blue_bold fs-7 m-0">{{ __('trans.exposure_factors') }}</h2>
                        </div>

                        <div class="row">
                            <!-- Tipo de factor de riesgo -->
                            <div class="col-md-6 mb-3">
                                <label for="factor_type" class="txt_dark_bold fs-4">{{ __('validation.attributes.factor_type') }}</label>
                                <select name="factor_type" id="factor_type" class="form-select form_style_input @error('factor_type') is-invalid @enderror">
                                    <option ></option>
                                    <option value="factor_type" {{ (old('factor_type') == 'factor_type') ? 'selected' : '' }} >{{ __('trans.factor_type') }}</option>
                                    <option value="factor_type" {{ (old('factor_type') == 'factor_type') ? 'selected' : '' }} >{{ __('trans.factor_type') }}</option>
                                    <option value="factor_type" {{ (old('factor_type') == 'factor_type') ? 'selected' : '' }} >{{ __('trans.factor_type') }}</option>
                                    <option value="factor_type" {{ (old('factor_type') == 'factor_type') ? 'selected' : '' }} >{{ __('trans.factor_type') }}</option>
                                </select>
                            </div>
                            <!-- Nombre de factor de riesgo -->
                            <div class="col-md-6 mb-3">
                                <label for="factor_name" class="txt_dark_bold fs-4">{{ __('validation.attributes.factor_name') }}</label>
                                <input type="text" class="form-control form_style_input @error('factor_name') is-invalid @enderror"
                                id="factor_name" name="factor_name" required value="{{ old('factor_name') }}">
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

    <!-- Modal   Enfermedad Actual -->
    <div class="modal fade" id="vertical-center-scroll-modal_enfAct" tabindex="-1" aria-labelledby="vertical-center-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable hc_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="d-flex align-self-start">
                        <h2 class="txt_blue_bold fs-10 mt-3">{{ __('trans.current_illness') }}</h2>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="form" enctype="">
                        @csrf
                        <div class="row">
                            <!-- Síntoma 1 -->
                            <div class="col-md-6 mb-3">
                                <label for="symptom" class="txt_dark_bold fs-4">{{ __('validation.attributes.symptom') }} 1</label>
                                <input type="text" class="form-control form_style_input @error('symptom') is-invalid @enderror"
                                id="symptom" name="symptom" required value="{{ old('symptom') }}">
                            </div>
                            <!-- Fecha de inicio del síntoma 1 -->
                            <div class="col-md-6 mb-3">
                                <label for="symptom_date" class="txt_dark_bold fs-4">{{ __('validation.attributes.symptom_date') }}</label>
                                <input type="date" class="form-control form_style_input @error('symptom_date') is-invalid @enderror"
                                id="symptom_date" name="symptom_date" required value="{{ old('symptom_date') }}">
                            </div>
                        </div>

                        <div class="row">
                            <!-- Síntoma 2 -->
                            <div class="col-md-6 mb-3">
                                <label for="symptom" class="txt_dark_bold fs-4">{{ __('validation.attributes.symptom') }} 2</label>
                                <input type="text" class="form-control form_style_input @error('symptom') is-invalid @enderror"
                                id="symptom" name="symptom" required value="{{ old('symptom') }}">
                            </div>
                            <!-- Fecha de inicio del síntoma 2 -->
                            <div class="col-md-6 mb-3">
                                <label for="symptom_date" class="txt_dark_bold fs-4">{{ __('validation.attributes.symptom_date') }}</label>
                                <input type="date" class="form-control form_style_input @error('symptom_date') is-invalid @enderror"
                                id="symptom_date" name="symptom_date" required value="{{ old('symptom_date') }}">
                            </div>
                        </div>

                        <div class="row">
                            <!-- Síntoma 3 -->
                            <div class="col-md-6 mb-3">
                                <label for="symptom" class="txt_dark_bold fs-4">{{ __('validation.attributes.symptom') }} 3</label>
                                <input type="text" class="form-control form_style_input @error('symptom') is-invalid @enderror"
                                id="symptom" name="symptom" required value="{{ old('symptom') }}">
                            </div>
                            <!-- Fecha de inicio del síntoma 3 -->
                            <div class="col-md-6 mb-3">
                                <label for="symptom_date" class="txt_dark_bold fs-4">{{ __('validation.attributes.symptom_date') }}</label>
                                <input type="date" class="form-control form_style_input @error('symptom_date') is-invalid @enderror"
                                id="symptom_date" name="symptom_date" required value="{{ old('symptom_date') }}">
                            </div>
                        </div>

                        <!-- Botón Agregar -->
                        <a href="javascript:void(0)" id="btn-add-contact" class="txt_blue_light_500 fs-5 fw_bold py-2 d-flex" style="width: 125px">
                            <i data-feather="plus" class="pe-2"></i> {{ __('trans.add') }}
                        </a>
                      
                        <div class="row">
                            <!-- Observaciones -->
                            <div class="col-md-12 mb-3"> 
                                <label for="observation" class="txt_dark_bold fs-4">{{ __('validation.attributes.observation') }}</label>
                                <textarea id="observation" class="form-control form_style_input form_textarea" placeholder="" style="height: 100px"></textarea>
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

    <!-- Modal   Triage -->
    <div class="modal fade" id="vertical-center-scroll-modal_triage" tabindex="-1" aria-labelledby="vertical-center-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable hc_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="d-flex align-self-start">
                        <h2 class="txt_blue_bold fs-10 mt-3">{{ __('trans.vital_signs_triage') }}</h2>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="form" enctype="">
                        @csrf
                        <div class="row">
                            <div class="accordion accordion-flush mb-5" id="triage_main_accordion"> <!-- Registros anteriores desplegable -->
                                <div class="accordion-item" style="background: #F1F1F1">
                                    <!-- Botón desplegable REGISTROS ANTERIORES -->
                                    <button class="accordion-button collapsed justify-content-between txt_dark_bold fs-4 px-5" type="button" data-bs-toggle="collapse" 
                                        data-bs-target="#triage_registers" aria-expanded="false" aria-controls="triage_btn_register">
                                        {{ __('trans.past_records') }}
                                    </button>
                                   <!-- Contenido desplegable REGISTROS ANTERIORES -->
                                    <div id="triage_registers" class="accordion-collapse collapse hc_collapse_registers" aria-labelledby="triage_content_register" data-bs-parent="#triage_main_accordion">
                                        <div class="accordion-body px-0">
                                            <!-- Desplegable registro triage UNO -->
                                            <div class="row">
                                                <div class="col-12 hc_accordion_collapse">
                                                    <!-- Botón desplegable registro UNO -->
                                                    <button class="accordion-button collapsed txt_dark_bold fs-4 px-5 hc_incap_btn_accordion" type="button" data-bs-toggle="collapse" 
                                                        data-bs-target="#triage_info_one" aria-expanded="false" aria-controls="triage_btn_info_one">
                                                        {{ __('trans.date') }}: 20/03/2019 14:58
                                                    </button>
                                                    <!-- Contenido desplegable registro UNO -->
                                                    <div id="triage_info_one" class="accordion-collapse collapse" aria-labelledby="triage_content_info_one" data-bs-parent="#triage_main_info_one">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-12 hc_data_table">
                                                                    <table class="data_table" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>{{ __('trans.body_weight') }} (Kg)</th>
                                                                                <th>{{ __('trans.height') }} (cm)</th>
                                                                                <th>{{ __('trans.systolic_blood_pressure') }} (mmHg)</th>
                                                                                <th>{{ __('trans.diastolic_blood_pressure') }} (mmHg)</th>
                                                                                <th>{{ __('trans.heart_rate') }}</th>
                                                                                <th>{{ __('trans.respiration_rate') }}</th>
                                                                                <th>{{ __('trans.body_temperature') }} (°C)</th>
                                                                                <th>{{ __('trans.imc') }}</th>
                                                                                <th>{{ __('trans.triage') }}</th>
                                                                                <th>{{ __('trans.comments') }}</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>75</td>
                                                                                <td>170</td>
                                                                                <td>120/80</td>
                                                                                <td>120/80</td>
                                                                                <td>120/60</td>
                                                                                <td>12/60</td>
                                                                                <td>35</td>
                                                                                <td>000</td>
                                                                                <td>III</td>
                                                                                <td width="30%">
                                                                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore at eius laborum itaque numquam consectetur!
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
                                            <!-- Desplegable registro triage DOS -->
                                            <div class="row">
                                                <div class="col-12 hc_accordion_collapse">
                                                    <!-- Botón desplegable registro DOS -->
                                                    <button class="accordion-button collapsed txt_dark_bold fs-4 px-5 hc_incap_btn_accordion" type="button" data-bs-toggle="collapse" 
                                                        data-bs-target="#triage_info_two" aria-expanded="false" aria-controls="triage_btn_info_two">
                                                        {{ __('trans.date') }}: 05/08/2019 09:20
                                                    </button>
                                                    <!-- Contenido desplegable registro DOS -->
                                                    <div id="triage_info_two" class="accordion-collapse collapse" aria-labelledby="triage_content_info_two" data-bs-parent="#triage_main_info_two">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-12 hc_data_table">
                                                                    <table class="data_table" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>{{ __('trans.body_weight') }} (Kg)</th>
                                                                                <th>{{ __('trans.height') }} (cm)</th>
                                                                                <th>{{ __('trans.systolic_blood_pressure') }} (mmHg)</th>
                                                                                <th>{{ __('trans.diastolic_blood_pressure') }} (mmHg)</th>
                                                                                <th>{{ __('trans.heart_rate') }}</th>
                                                                                <th>{{ __('trans.respiration_rate') }}</th>
                                                                                <th>{{ __('trans.body_temperature') }} (°C)</th>
                                                                                <th>{{ __('trans.imc') }}</th>
                                                                                <th>{{ __('trans.triage') }}</th>
                                                                                <th>{{ __('trans.comments') }}</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>75</td>
                                                                                <td>170</td>
                                                                                <td>120/80</td>
                                                                                <td>120/80</td>
                                                                                <td>120/60</td>
                                                                                <td>12/60</td>
                                                                                <td>35</td>
                                                                                <td>000</td>
                                                                                <td>III</td>
                                                                                <td width="30%">
                                                                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore at eius laborum itaque numquam consectetur!
                                                                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore at eius laborum itaque numquam consectetur!
                                                                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore at eius laborum itaque numquam consectetur!
                                                                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore at eius laborum itaque numquam consectetur!
                                                                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore at eius laborum itaque numquam consectetur!
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

                        <!-- Exposición a factores de riesgo -->
                        <div class="form_content_info_basic">
                            <h2 class="txt_blue_bold fs-7 m-0">{{ __('trans.vital_signs') }}</h2>
                        </div>

                        <div class="row">
                            <!-- Peso corporal -->
                            <div class="col-md-3 mb-3">
                                <label for="body_weight" class="txt_dark_bold fs-4">{{ __('validation.attributes.body_weight') }} (Kg)</label>
                                <input type="number" class="form-control form_style_input @error('body_weight') is-invalid @enderror"
                                    id="body_weight" name="body_weight" value="{{ old('body_weight') }}">
                            </div>
                            <!-- Altura -->
                            <div class="col-md-3 mb-3">
                                <label for="height" class="txt_dark_bold fs-4">{{ __('validation.attributes.height') }} (cm)</label>
                                <input type="number" class="form-control form_style_input @error('height') is-invalid @enderror"
                                    id="height" name="height" required value="{{ old('height') }}">
                            </div>
                            <!-- Presión arterial sistólica -->
                            <div class="col-md-3 mb-3">
                                <label for="systolic_blood_pressure" class="txt_dark_bold fs-4">{{ __('validation.attributes.systolic_blood_pressure') }} (mmHg)</label>
                                <input type="number" class="form-control form_style_input @error('systolic_blood_pressure') is-invalid @enderror"
                                    id="systolic_blood_pressure" name="systolic_blood_pressure" value="{{ old('systolic_blood_pressure') }}">
                            </div>
                            <!-- Presión arteria diastólica -->
                            <div class="col-md-3 mb-3">
                                <label for="diastolic_blood_pressure" class="txt_dark_bold fs-4">{{ __('validation.attributes.diastolic_blood_pressure') }} (mmHg)</label>
                                <input type="number" class="form-control form_style_input @error('diastolic_blood_pressure') is-invalid @enderror"
                                    id="diastolic_blood_pressure" name="diastolic_blood_pressure" required value="{{ old('diastolic_blood_pressure') }}">
                            </div>
                        </div>

                        <div class="row">
                            <!-- Frecuencia cardiaca -->
                            <div class="col-md-3 mb-3">
                                <label for="heart_rate" class="txt_dark_bold fs-4">{{ __('validation.attributes.heart_rate') }}</label>
                                <input type="number" class="form-control form_style_input @error('heart_rate') is-invalid @enderror"
                                    id="heart_rate" name="heart_rate" value="{{ old('heart_rate') }}">
                            </div>
                            <!-- Frecuencia respiratoria -->
                            <div class="col-md-3 mb-3">
                                <label for="respiration_rate" class="txt_dark_bold fs-4">{{ __('validation.attributes.respiration_rate') }}</label>
                                <input type="number" class="form-control form_style_input @error('respiration_rate') is-invalid @enderror"
                                    id="respiration_rate" name="respiration_rate" required value="{{ old('respiration_rate') }}">
                            </div>
                            <!-- Temperatura corporal -->
                            <div class="col-md-3 mb-3">
                                <label for="body_temperature" class="txt_dark_bold fs-4">{{ __('validation.attributes.body_temperature') }}</label>
                                <input type="number" class="form-control form_style_input @error('body_temperature') is-invalid @enderror"
                                    id="body_temperature" name="body_temperature" value="{{ old('body_temperature') }}">
                            </div>
                            <!-- IMC -->
                            <div class="col-md-3 mb-3">
                                <label for="imc" class="txt_dark_bold fs-4">{{ __('validation.attributes.imc') }}</label>
                                <input type="number" class="form-control form_style_input @error('imc') is-invalid @enderror"
                                    id="imc" name="imc" required value="{{ old('imc') }}">
                            </div>
                        </div>

                        <!-- Exposición a factores de riesgo -->
                        <div class="form_content_info_basic">
                            <h2 class="txt_blue_bold fs-7 m-0">{{ __('trans.triage') }}</h2>
                        </div>

                        <div class="row">
                            <!-- Fecha y hora del triage -->
                            <div class="col-md-6 mb-3">
                                <label for="date_time_triage" class="txt_dark_bold fs-4">{{ __('validation.attributes.date_time_triage') }}</label>
                                <input type="datetime" class="form-control form_style_input @error('date_time_triage') is-invalid @enderror"
                                id="date_time_triage" name="date_time_triage" value="{{ old('date_time_triage') }}">
                            </div>
                            <!-- Triage -->
                            <div class="col-md-6 mb-3">
                                <label for="triage" class="txt_dark_bold fs-4">{{ __('validation.attributes.triage') }}</label>
                                <input type="number" class="form-control form_style_input @error('triage') is-invalid @enderror"
                                id="triage" name="triage" required value="{{ old('triage') }}">
                            </div>
                        </div>
                      
                        <div class="row">
                            <!-- Comentarios -->
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

    <!-- Modal   Antecedentes -->
    <div class="modal fade" id="vertical-center-scroll-modal_antec" tabindex="-1" aria-labelledby="vertical-center-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable hc_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="d-flex align-self-start">
                        <h2 class="txt_blue_bold fs-10 mt-3">{{ __('trans.background') }}</h2>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="form" enctype="">
                        @csrf
                        <!-- Nav tabs -->
                        <div class="row">
                            <div class="offset-md-1 col-md-3 mb-3"><!-- Botones tipo de antecedentes -->
                                <ul class="nav nav-pills" role="tablist">
                                    <li class="nav-item" style="padding-right: 12px">
                                        <a class="nav-link d-flex active" data-bs-toggle="tab" href="#navpill-1" role="tab">
                                            <span class="fs-4">Marca Comercial</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" style="padding-right: 12px">
                                        <a class="nav-link d-flex" data-bs-toggle="tab" href="#navpill-2" role="tab">
                                            <span class="fs-4">Génerico</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" style="padding-right: 12px">
                                        <a class="nav-link d-flex" data-bs-toggle="tab" href="#navpill-3" role="tab">
                                            <span class="fs-4">Comercial</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" style="padding-right: 12px">
                                        <a class="nav-link d-flex" data-bs-toggle="tab" href="#navpill-4" role="tab">
                                            <span class="fs-4">familiares</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Tab panes -->
                            <div class="col-md-8 mb-3"><!-- Items check box -->
                                <div class="tab-content bg-white">
                                    <div class="tab-pane active hc_pad_tab_pane" id="navpill-1" role="tabpanel"> <!-- Marca Comercial -->
                                        <div class="row">
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Diarrea</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Diarrea</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Rectorragia</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Rectorragia</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Melenas</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Melenas</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Pujo y tenesmo</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Pujo y tenesmo</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Ictericia</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Ictericia</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Coluria</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Coluria</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Acolia</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Acolia</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Prurito anal</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Prurito anal</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Cutáneo</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Cutáneo</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Hemorragias</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Hemorragias</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane p-3" id="navpill-2" role="tabpanel"> <!-- Génerico -->
                                        <div class="row">
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Diarrea</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Diarrea</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Rectorragia</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Rectorragia</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Melenas</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Melenas</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane p-3" id="navpill-3" role="tabpanel"> <!-- Comercial -->
                                        <div class="row">
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Pujo y tenesmo</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Pujo y tenesmo</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Ictericia</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Ictericia</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Coluria</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Coluria</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane p-3" id="navpill-4" role="tabpanel"> <!-- info -->
                                        <div class="row">
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Acolia</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Acolia</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Prurito anal</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Prurito anal</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Cutáneo</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Cutáneo</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Hemorragias</label>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center py-2">
                                                <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                                <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Hemorragias</label>
                                            </div>
                                        </div>
                                    </div>
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

    <!-- Modal   Exploración Física -->
    <div class="modal fade" id="vertical-center-scroll-modal_expFis" tabindex="-1" aria-labelledby="vertical-center-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable hc_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="d-flex align-self-start">
                        <h2 class="txt_blue_bold fs-10 mt-3">Exploración Física</h2>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="form" enctype="">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3"><!-- Campo de Número -->
                                <label for="symptom" class="txt_dark_bold fs-4">Campo de Número</label>
                                <input type="text" class="form-control form_style_input @error('symptom') is-invalid @enderror"
                                id="symptom" name="symptom" required value="{{ old('symptom') }}">
                            </div>
                            <div class="col-md-6 mb-3"> <!-- Área de Texto -->
                                <label for="observations" class="txt_dark_bold fs-4">Área de Texto</label>
                                <textarea class="form-control form_style_input form_textarea" placeholder="" id="observations" style="height: 100px"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3"><!-- Campo de Texto -->
                                <label for="symptom" class="txt_dark_bold fs-4">Campo de Texto</label>
                                <input type="text" class="form-control form_style_input @error('symptom') is-invalid @enderror"
                                id="symptom" name="symptom" required value="{{ old('symptom') }}">
                            </div>
                            <div class="col-md-6 mb-3"><!-- Fecha de inicio del síntoma -->
                                <label for="symptom_date" class="txt_dark_bold fs-4">{{ __('validation.attributes.symptom_date') }}</label>
                                <div class="expFis_range">
                                    <input type="range" class="form-range" min="0" max="5" id="customRange2">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3"><!-- Booleano -->
                                <label for="advance_directive" class="txt_dark_bold fs-4 mb-3">Booleano</label>
                                <div class="col-md-6 d-flex">
                                    <div class="col-md-6 form-check d-flex justify-content-strat mb-0">
                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                id="advance_directive-1" name="advance_directive-status" data-activation=".advance_directive-input"
                                                {{ old('advance_directive-status', 0) == 1 ? 'checked':'' }}/>
                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="advance_directive-1">
                                            Si
                                        </label>
                                    </div>
                                    <div class="col-md-6 form-check d-flex justify-content-start mb-0">
                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                id="advance_directive-0" name="advance_directive-status" data-activation=".advance_directive-input"
                                                {{ old('advance_directive-status', 0) == 0 ? 'checked':'' }}/>
                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="advance_directive-0">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3"><!-- Checklist -->
                                <div class="row">
                                    <label for="" class="txt_dark_bold fs-4 mb-2">Checklist</label>
                                    <div class="col-md-6 d-flex align-items-center py-2">
                                        <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                        <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Texto 1</label>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-center py-2">
                                        <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                        <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Texto 2</label>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-center py-2">
                                        <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                        <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Texto 1</label>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-center py-2">
                                        <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                        <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Texto 2</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown-divider my-4"></div> <!-- Linea de división del formulario -->

                        <div class="row">
                            <div class="col-md-6 mb-3"><!-- Campo de Número -->
                                <label for="symptom" class="txt_dark_bold fs-4">Campo de Número</label>
                                <input type="text" class="form-control form_style_input @error('symptom') is-invalid @enderror"
                                id="symptom" name="symptom" required value="{{ old('symptom') }}">
                            </div>
                            <div class="col-md-6 mb-3"> <!-- Área de Texto -->
                                <label for="observations" class="txt_dark_bold fs-4">Área de Texto</label>
                                <textarea class="form-control form_style_input form_textarea" placeholder="" id="observations" style="height: 100px"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3"><!-- Campo de Texto -->
                                <label for="symptom" class="txt_dark_bold fs-4">Campo de Texto</label>
                                <input type="text" class="form-control form_style_input @error('symptom') is-invalid @enderror"
                                id="symptom" name="symptom" required value="{{ old('symptom') }}">
                            </div>
                            <div class="col-md-6 mb-3"><!-- Fecha de inicio del síntoma -->
                                <label for="symptom_date" class="txt_dark_bold fs-4">{{ __('validation.attributes.symptom_date') }}</label>
                                <div class="expFis_range">
                                    <input type="range" class="form-range" min="0" max="5" id="customRange2">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3"><!-- Booleano -->
                                <label for="advance_directive" class="txt_dark_bold fs-4 mb-3">Booleano</label>
                                <div class="col-md-6 d-flex">
                                    <div class="col-md-6 form-check d-flex justify-content-strat mb-0">
                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                id="advance_directive-1" name="advance_directive-status" data-activation=".advance_directive-input"
                                                {{ old('advance_directive-status', 0) == 1 ? 'checked':'' }}/>
                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="advance_directive-1">
                                            Si
                                        </label>
                                    </div>
                                    <div class="col-md-6 form-check d-flex justify-content-start mb-0">
                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                id="advance_directive-0" name="advance_directive-status" data-activation=".advance_directive-input"
                                                {{ old('advance_directive-status', 0) == 0 ? 'checked':'' }}/>
                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="advance_directive-0">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3"><!-- Checklist -->
                                <div class="row">
                                    <label for="" class="txt_dark_bold fs-4 mb-2">Checklist</label>
                                    <div class="col-md-6 d-flex align-items-center py-2">
                                        <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                        <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Texto 1</label>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-center py-2">
                                        <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                        <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Texto 2</label>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-center py-2">
                                        <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                        <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Texto 1</label>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-center py-2">
                                        <input type="checkbox" class="form-check-input form_checkBox" id="hospitalization" name="hospitalization" value="{{ old('hospitalization') }}">
                                        <label class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Texto 2</label>
                                    </div>
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

    <!-- Modal   Revisión por Aparatos y Sistemas -->
    <div class="modal fade" id="vertical-center-scroll-modal_revAparSis" tabindex="-1" aria-labelledby="vertical-center-modal" style="display: none;" aria-hidden="true">   
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable hc_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="d-flex align-self-start">
                        <h2 class="txt_blue_bold fs-10 mt-3">Revisión por Aparatos y Sistemas</h2>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="form" enctype="">
                        @csrf
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

    <!-- Modal   Resultados de Exámenes -->
    <div class="modal fade" id="vertical-center-scroll-modal_resulExam" tabindex="-1" aria-labelledby="vertical-center-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable hc_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="d-flex align-self-start">
                        <h2 class="txt_blue_bold fs-10 mt-3">Resultados de Exámenes</h2>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="form" enctype="">
                        @csrf
                        <div class="row align-items-center">
                            <div class="col-md-8 dropzone pqr_dropzone p-2" id="kt_dropzonejs_example_1"> <!-- Adjuntar archivos -->
                                <div class="dz-message needsclick m-0 p-5">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <i data-feather="file" class="txt_blue_light me-3" style="width: 40px; height: 40px"></i>
                                        <h3 class="fs-4 txt_dark_bold pt-2">Adjuntar archivos</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="offset-md-1 col-md-3"><!-- Archivos -->
                                <div class="row">
                                    <h6 class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Archivo 1</h6>
                                    <h6 class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Archivo 2</h6>
                                    <h6 class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Archivo 3</h6>
                                    <h6 class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">Archivo 4</h6>
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

    <!-- Modal   Diagnóstico -->
    <div class="modal fade" id="vertical-center-scroll-modal_diag" tabindex="-1" aria-labelledby="vertical-center-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable hc_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="d-flex align-self-start">
                        <h2 class="txt_blue_bold fs-10 mt-3">Diagnósticos</h2>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="form" enctype="">
                        @csrf
                        <div class="row">
                            <div class="accordion accordion-flush mb-5" id="diagnostico_main_accordion"> <!-- Registros anteriores desplegable -->
                                <div class="accordion-item" style="background: #F1F1F1">
                                    <!-- Botón desplegable REGISTROS ANTERIORES -->
                                    <button class="accordion-button collapsed justify-content-between txt_dark_bold fs-4 px-5" type="button" data-bs-toggle="collapse" 
                                        data-bs-target="#diagnostico_registers" aria-expanded="false" aria-controls="diagnostico_btn_register">
                                        Regitros Anteriores
                                    </button>
                                   <!-- Contenido desplegable REGISTROS ANTERIORES -->
                                    <div id="diagnostico_registers" class="accordion-collapse collapse hc_collapse_registers" aria-labelledby="diagnostico_content_register" 
                                        data-bs-parent="#diagnostico_main_accordion">
                                        <div class="accordion-body px-0">
                                            <!-- Desplegable registro triage UNO -->
                                            <div class="row">
                                                <div class="col-12 hc_accordion_collapse">
                                                    <!-- Botón desplegable registro UNO -->
                                                    <button class="accordion-button collapsed txt_dark_bold fs-4 px-5 hc_incap_btn_accordion" type="button" data-bs-toggle="collapse" 
                                                        data-bs-target="#diagnostico_info_one" aria-expanded="false" aria-controls="diagnostico_btn_info_one">
                                                        Fecha: 20/03/2019 14:58
                                                    </button>
                                                    <!-- Contenido desplegable registro UNO -->
                                                    <div id="diagnostico_info_one" class="accordion-collapse collapse" aria-labelledby="diagnostico_content_info_one" 
                                                        data-bs-parent="#diagnostico_main_info_one">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-12 hc_data_table">
                                                                    <table class="data_table" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Código diagnóstico</th>
                                                                                <th>Código enfermedad huérfana</th>
                                                                                <th>Nombre diagnóstico</th>
                                                                                <th>Tipo diagnóstico</th>
                                                                                <th>Observaciones</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>994.1 (E928.9)</td>
                                                                                <td>000 000</td>
                                                                                <td>Reacción alérgica contacto inicial</td>
                                                                                <td>Diagnóstico clínico</td>
                                                                                <td width="30%">
                                                                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore at eius laborum itaque numquam consectetur!
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
                                            <!-- Desplegable registro triage DOS -->
                                            <div class="row">
                                                <div class="col-12 hc_accordion_collapse">
                                                    <!-- Botón desplegable registro DOS -->
                                                    <button class="accordion-button collapsed txt_dark_bold fs-4 px-5 hc_incap_btn_accordion" type="button" data-bs-toggle="collapse" 
                                                        data-bs-target="#diagnostico_info_two" aria-expanded="false" aria-controls="diagnostico_btn_info_two">
                                                        Fecha: 05/08/2019 09:20
                                                    </button>
                                                    <!-- Contenido desplegable registro DOS -->
                                                    <div id="diagnostico_info_two" class="accordion-collapse collapse" aria-labelledby="diagnostico_content_info_two" 
                                                        data-bs-parent="#diagnostico_main_info_two">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-12 hc_data_table">
                                                                    <table class="data_table" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Código diagnóstico</th>
                                                                                <th>Código enfermedad huérfana</th>
                                                                                <th>Nombre diagnóstico</th>
                                                                                <th>Tipo diagnóstico</th>
                                                                                <th>Observaciones</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>994.1 (E928.9)</td>
                                                                                <td>000 000</td>
                                                                                <td>Reacción alérgica contacto inicial</td>
                                                                                <td>Diagnóstico clínico</td>
                                                                                <td width="30%">
                                                                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore at eius laborum itaque numquam consectetur!
                                                                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore at eius laborum itaque numquam consectetur!
                                                                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore at eius laborum itaque numquam consectetur!
                                                                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore at eius laborum itaque numquam consectetur!
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
                            <div class="col-md-6 mb-3 pe-5"><!-- Código diagnóstico principal de ingreso CIE-10 -->
                                <label for="medical-entity" class="txt_dark_bold fs-4">Código diagnóstico principal de ingreso CIE-10</label>
                                <input type="text" class="form-control form_style_input @error('entity') is-invalid @enderror sgsss" data-code="#code_entity"
                                id="entity" name="entity"  value="{{ old('entity') }}">
                            </div>
                            <div class="col-md-6 mb-3 ps-5"><!-- Código de enfermedades huérfanas -->
                                <label for="code_entity" class="txt_dark_bold fs-4">Código de enfermedades huérfanas</label>
                                <input type="text" class="form-control form_style_input @error('code_entity') is-invalid @enderror"
                                id="code_entity" name="code_entity"  value="{{ old('code_entity') }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3 pe-5"><!-- Nombre del diagnóstico principal de ingreso CIE-10 -->
                                <label for="medical-entity" class="txt_dark_bold fs-4">Nombre del diagnóstico principal de ingreso CIE-10</label>
                                <input type="text" class="form-control form_style_input @error('entity') is-invalid @enderror sgsss" data-code="#code_entity"
                                id="entity" name="entity"  value="{{ old('entity') }}">
                            </div>
                            <div class="col-md-6 mb-3 ps-5"><!-- Tipo del diagnóstico principal del ingreso -->
                                <label for="code_entity" class="txt_dark_bold fs-4">Tipo de diagnostico principal del ingreso</label>
                                <input type="text" class="form-control form_style_input @error('code_entity') is-invalid @enderror"
                                id="code_entity" name="code_entity"  value="{{ old('code_entity') }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3"><!-- Observaciones -->
                                <label for="observation" class="txt_dark_bold fs-4">{{ __('validation.attributes.observation') }}</label>
                                <textarea class="form-control form_style_input form_textarea" placeholder="" id="observation" style="height: 100px"></textarea>
                            </div>
                        </div>

                        <!-- Botón Agregar -->
                        <a href="javascript:void(0)" id="btn-add-contact" class="txt_blue_light_500 fs-5 fw_bold py-2 d-flex" style="width: 125px">
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

    <!-- Modal   Prescripciones -->
    <div class="modal fade" id="vertical-center-scroll-modal_prescrip" tabindex="-1" aria-labelledby="vertical-center-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable hc_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="d-flex align-self-start">
                        <h2 class="txt_blue_bold fs-10 mt-3">Prescipciones</h2>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="form" enctype="">
                        @csrf
                        <div class="row">
                            <div class="accordion accordion-flush mb-3" id="prescripcion_main_accordion"> <!-- Registros anteriores desplegable -->
                                <div class="accordion-item" style="background: #F1F1F1">
                                    <!-- Botón desplegable REGISTROS ANTERIORES -->
                                    <button class="accordion-button collapsed justify-content-between txt_dark_bold fs-4 px-5" type="button" data-bs-toggle="collapse" 
                                        data-bs-target="#prescripcion_registers" aria-expanded="false" aria-controls="prescripcion_btn_register">
                                        Regitros Anteriores
                                    </button>
                                   <!-- Contenido desplegable REGISTROS ANTERIORES -->
                                    <div id="prescripcion_registers" class="accordion-collapse collapse hc_collapse_registers" aria-labelledby="prescripcion_content_register" 
                                        data-bs-parent="#prescripcion_main_accordion">
                                        <div class="accordion-body px-0">
                                            <!-- Desplegable registro triage UNO -->
                                            <div class="row">
                                                <div class="col-12 hc_accordion_collapse">
                                                    <!-- Botón desplegable registro UNO -->
                                                    <button class="accordion-button collapsed txt_dark_bold fs-4 px-5 hc_incap_btn_accordion" type="button" data-bs-toggle="collapse" 
                                                        data-bs-target="#prescripcion_info_one" aria-expanded="false" aria-controls="prescripcion_btn_info_one">
                                                        Fecha: 20/03/2019 14:58
                                                    </button>
                                                    <!-- Contenido desplegable registro UNO -->
                                                    <div id="prescripcion_info_one" class="accordion-collapse collapse" aria-labelledby="prescripcion_content_info_one" 
                                                        data-bs-parent="#prescripcion_main_info_one">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-12 hc_data_table">
                                                                    <table class="data_table" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>ID</th>
                                                                                <th>Nombre</th>
                                                                                <th>Cantidad Farmacéutica</th>
                                                                                <th>Dosis</th>
                                                                                <th>Días</th>
                                                                                <th>Vía de Administración</th>
                                                                                <th>Frecuencia (Horas)</th>
                                                                                <th>Cantidad</th>
                                                                                <th>Indicaciones</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>3</td>
                                                                                <td>BELAVIA® 25 MG TABLETA RECUBIERTA</td>
                                                                                <td>10 / U / TABLETA RECUBIERTA</td>
                                                                                <td>1</td>
                                                                                <td>2</td>
                                                                                <td>Oral</td>
                                                                                <td>6</td>
                                                                                <td>1</td>
                                                                                <td>1</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Desplegable registro triage DOS -->
                                            <div class="row">
                                                <div class="col-12 hc_accordion_collapse">
                                                    <!-- Botón desplegable registro DOS -->
                                                    <button class="accordion-button collapsed txt_dark_bold fs-4 px-5 hc_incap_btn_accordion" type="button" data-bs-toggle="collapse" 
                                                        data-bs-target="#prescripcion_info_two" aria-expanded="false" aria-controls="prescripcion_btn_info_two">
                                                        Fecha: 05/08/2019 09:20
                                                    </button>
                                                    <!-- Contenido desplegable registro DOS -->
                                                    <div id="prescripcion_info_two" class="accordion-collapse collapse" aria-labelledby="prescripcion_content_info_two" 
                                                        data-bs-parent="#prescripcion_main_info_two">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-12 hc_data_table">
                                                                    <table class="data_table" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>ID</th>
                                                                                <th>Nombre</th>
                                                                                <th>Cantidad Farmacéutica</th>
                                                                                <th>Dosis</th>
                                                                                <th>Días</th>
                                                                                <th>Vía de Administración</th>
                                                                                <th>Frecuencia (Horas)</th>
                                                                                <th>Cantidad</th>
                                                                                <th>Indicaciones</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>3</td>
                                                                                <td>BELAVIA® 25 MG TABLETA RECUBIERTA</td>
                                                                                <td>10 / U / TABLETA RECUBIERTA</td>
                                                                                <td>1</td>
                                                                                <td>2</td>
                                                                                <td>Oral</td>
                                                                                <td>6</td>
                                                                                <td>1</td>
                                                                                <td>1</td>
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

                        <!-- Información del responsable del paciente -->
                        <div class="form_content_info_basic justify-content-between mb-5">
                            <h2 class="txt_blue_bold fs-7 m-0">Médicamento 1</h2>
                            <button type="button" class="btn_delete_round">
                                <i data-feather="trash-2" class="trash_2"></i>
                            </button>
                        </div>

                        <!-- Nav tabs -->
                        <ul class="nav nav-pills" role="tablist">
                            <li class="nav-item" style="padding-right: 12px">
                                <a class="nav-link d-flex active" data-bs-toggle="tab" href="#navpill-1" role="tab">
                                <i data-feather="folder" class="pe-2"></i> <span class="fs-4">Marca Comercial</span>
                                </a>
                            </li>
                            <li class="nav-item" style="padding-right: 12px">
                                <a class="nav-link d-flex" data-bs-toggle="tab" href="#navpill-2" role="tab">
                                    <i data-feather="folder" class="pe-2"></i> <span class="fs-4">Génerico</span>
                                </a>
                            </li>
                            <li class="nav-item" style="padding-right: 12px">
                                <a class="nav-link d-flex" data-bs-toggle="tab" href="#navpill-3" role="tab">
                                    <i data-feather="folder" class="pe-2"></i> <span class="fs-4">Comercial</span>
                                </a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content border bg-white">
                            <div class="tab-pane active hc_pad_tab_pane" id="navpill-1" role="tabpanel"> <!-- Marca Comercial -->
                                <div class="row">
                                    <div class="col-8 mb-3"><!-- Nombre Comercial -->
                                        <label for="" class="txt_dark_bold fs-4">Nombre Comercial</label>
                                        <div class="d-flex">
                                            <input type="search" class="form-control form_style_input noBorder_radius_right @error('date-and-time-triage') is-invalid @enderror"
                                            id="" name="" value="{{ old('') }}" aria-label="Search">
                                            <button class="btn form_style_input noBorder_radius_left_two" type="submit"><i data-feather="search" style="color: #1DBFD6;"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- Vía de Administración -->
                                        <label for="agreement" class="txt_dark_bold fs-4">Vía de administración</label>
                                        <select name="agreement" id="agreement" class="form-select form_style_input @error('agreement') is-invalid @enderror">
                                            <option ></option>
                                            <option value="oral" {{ (old('agreement') == 'agreement') ? 'selected' : '' }} >Oral</option>
                                            <option value="Intravenosa" {{ (old('agreement') == 'agreement') ? 'selected' : '' }} >Intravenosa</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3"><!-- Laboratorio -->
                                        <label for="medical-entity" class="txt_dark_bold fs-4">Laboratorio</label>
                                        <input type="text" class="form-control form_style_input @error('entity') is-invalid @enderror sgsss" data-code="#code_entity"
                                        id="entity" name="entity"  value="{{ old('entity') }}">
                                    </div>
                                    <div class="col-md-2 mb-3"><!-- Dosis -->
                                        <label for="code_entity" class="txt_dark_bold fs-4">Dosis</label>
                                        <input type="text" class="form-control form_style_input @error('code_entity') is-invalid @enderror"
                                        id="code_entity" name="code_entity"  value="{{ old('code_entity') }}">
                                    </div>
                                    <div class="col-md-2 mb-3"><!-- Presentación -->
                                        <label for="code_entity" class="txt_dark_bold fs-4">Presentación</label>
                                        <input type="text" class="form-control form_style_input @error('code_entity') is-invalid @enderror"
                                        id="code_entity" name="code_entity"  value="{{ old('code_entity') }}">
                                    </div>
                                    <div class="col-md-2 mb-3"><!-- Días -->
                                        <label for="code_entity" class="txt_dark_bold fs-4">Días</label>
                                        <input type="text" class="form-control form_style_input @error('code_entity') is-invalid @enderror"
                                        id="code_entity" name="code_entity"  value="{{ old('code_entity') }}">
                                    </div>
                                    <div class="col-md-2 mb-3"><!-- Frecuencia -->
                                        <label for="code_entity" class="txt_dark_bold fs-4">Frecuencia (Horas)</label>
                                        <input type="text" class="form-control form_style_input @error('code_entity') is-invalid @enderror"
                                        id="code_entity" name="code_entity"  value="{{ old('code_entity') }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3"><!-- Días -->
                                        <label for="medical-entity" class="txt_dark_bold fs-4">Días</label>
                                        <input type="text" class="form-control form_style_input @error('entity') is-invalid @enderror sgsss" data-code="#code_entity"
                                        id="entity" name="entity"  value="{{ old('entity') }}">
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- Frecuencia -->
                                        <label for="code_entity" class="txt_dark_bold fs-4">Frecuencia (Horas)</label>
                                        <input type="text" class="form-control form_style_input @error('code_entity') is-invalid @enderror"
                                        id="code_entity" name="code_entity"  value="{{ old('code_entity') }}">
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- Cantidad -->
                                        <label for="code_entity" class="txt_dark_bold fs-4">Cantidad</label>
                                        <input type="text" class="form-control form_style_input @error('code_entity') is-invalid @enderror"
                                        id="code_entity" name="code_entity"  value="{{ old('code_entity') }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-3"><!-- Recomendaciones -->
                                        <label for="observation" class="txt_dark_bold fs-4">Recomendaciones</label>
                                        <textarea class="form-control form_style_input form_textarea" placeholder="" id="observation" style="height: 100px"></textarea>
                                    </div>
                                </div>

                                <!-- Save Button -->
                                <div class="text-center mt-5" >
                                    <button type="submit" class="btn btn-info align-self-center fs-7 px-4" style="font-weight: 100">
                                        {{ __('trans.save') }} 
                                    </button>
                                </div>
                            </div>

                            <div class="tab-pane p-3" id="navpill-2" role="tabpanel"> <!-- Génerico -->
                                <div class="row">
                                    <div class="col-8 mb-3"><!-- Nombre Comercial -->
                                        <label for="" class="txt_dark_bold fs-4">Nombre Comercial</label>
                                        <div class="d-flex">
                                            <input type="search" class="form-control form_style_input noBorder_radius_right @error('date-and-time-triage') is-invalid @enderror"
                                            id="" name="" value="{{ old('') }}" aria-label="Search">
                                            <button class="btn form_style_input noBorder_radius_left_two" type="submit"><i data-feather="search" style="color: #1DBFD6;"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- Vía de Administración -->
                                        <label for="agreement" class="txt_dark_bold fs-4">Vía de administración</label>
                                        <select name="agreement" id="agreement" class="form-select form_style_input @error('agreement') is-invalid @enderror">
                                            <option ></option>
                                            <option value="oral" {{ (old('agreement') == 'agreement') ? 'selected' : '' }} >Oral</option>
                                            <option value="Intravenosa" {{ (old('agreement') == 'agreement') ? 'selected' : '' }} >Intravenosa</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3"><!-- Laboratorio -->
                                        <label for="medical-entity" class="txt_dark_bold fs-4">Laboratorio</label>
                                        <input type="text" class="form-control form_style_input @error('entity') is-invalid @enderror sgsss" data-code="#code_entity"
                                        id="entity" name="entity"  value="{{ old('entity') }}">
                                    </div>
                                    <div class="col-md-2 mb-3"><!-- Dosis -->
                                        <label for="code_entity" class="txt_dark_bold fs-4">Dosis</label>
                                        <input type="text" class="form-control form_style_input @error('code_entity') is-invalid @enderror"
                                        id="code_entity" name="code_entity"  value="{{ old('code_entity') }}">
                                    </div>
                                    <div class="col-md-2 mb-3"><!-- Presentación -->
                                        <label for="code_entity" class="txt_dark_bold fs-4">Presentación</label>
                                        <input type="text" class="form-control form_style_input @error('code_entity') is-invalid @enderror"
                                        id="code_entity" name="code_entity"  value="{{ old('code_entity') }}">
                                    </div>
                                    <div class="col-md-2 mb-3"><!-- Días -->
                                        <label for="code_entity" class="txt_dark_bold fs-4">Días</label>
                                        <input type="text" class="form-control form_style_input @error('code_entity') is-invalid @enderror"
                                        id="code_entity" name="code_entity"  value="{{ old('code_entity') }}">
                                    </div>
                                    <div class="col-md-2 mb-3"><!-- Frecuencia -->
                                        <label for="code_entity" class="txt_dark_bold fs-4">Frecuencia (Horas)</label>
                                        <input type="text" class="form-control form_style_input @error('code_entity') is-invalid @enderror"
                                        id="code_entity" name="code_entity"  value="{{ old('code_entity') }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3"><!-- Días -->
                                        <label for="medical-entity" class="txt_dark_bold fs-4">Días</label>
                                        <input type="text" class="form-control form_style_input @error('entity') is-invalid @enderror sgsss" data-code="#code_entity"
                                        id="entity" name="entity"  value="{{ old('entity') }}">
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- Frecuencia -->
                                        <label for="code_entity" class="txt_dark_bold fs-4">Frecuencia (Horas)</label>
                                        <input type="text" class="form-control form_style_input @error('code_entity') is-invalid @enderror"
                                        id="code_entity" name="code_entity"  value="{{ old('code_entity') }}">
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- Cantidad -->
                                        <label for="code_entity" class="txt_dark_bold fs-4">Cantidad</label>
                                        <input type="text" class="form-control form_style_input @error('code_entity') is-invalid @enderror"
                                        id="code_entity" name="code_entity"  value="{{ old('code_entity') }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-3"><!-- Recomendaciones -->
                                        <label for="observation" class="txt_dark_bold fs-4">Recomendaciones</label>
                                        <textarea class="form-control form_style_input form_textarea" placeholder="" id="observation" style="height: 100px"></textarea>
                                    </div>
                                </div>

                                <!-- Save Button -->
                                <div class="text-center mt-5" >
                                    <button type="submit" class="btn btn-info align-self-center fs-7 px-4" style="font-weight: 100">
                                        {{ __('trans.save') }} 
                                    </button>
                                </div>
                            </div>

                            <div class="tab-pane p-3" id="navpill-3" role="tabpanel"> <!-- Comercial -->
                                <div class="row">
                                    <div class="col-8 mb-3"><!-- Nombre Comercial -->
                                        <label for="" class="txt_dark_bold fs-4">Nombre Comercial</label>
                                        <div class="d-flex">
                                            <input type="search" class="form-control form_style_input noBorder_radius_right @error('date-and-time-triage') is-invalid @enderror"
                                            id="" name="" value="{{ old('') }}" aria-label="Search">
                                            <button class="btn form_style_input noBorder_radius_left_two" type="submit"><i data-feather="search" style="color: #1DBFD6;"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- Vía de Administración -->
                                        <label for="agreement" class="txt_dark_bold fs-4">Vía de administración</label>
                                        <select name="agreement" id="agreement" class="form-select form_style_input @error('agreement') is-invalid @enderror">
                                            <option ></option>
                                            <option value="oral" {{ (old('agreement') == 'agreement') ? 'selected' : '' }} >Oral</option>
                                            <option value="Intravenosa" {{ (old('agreement') == 'agreement') ? 'selected' : '' }} >Intravenosa</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3"><!-- Laboratorio -->
                                        <label for="medical-entity" class="txt_dark_bold fs-4">Laboratorio</label>
                                        <input type="text" class="form-control form_style_input @error('entity') is-invalid @enderror sgsss" data-code="#code_entity"
                                        id="entity" name="entity"  value="{{ old('entity') }}">
                                    </div>
                                    <div class="col-md-2 mb-3"><!-- Dosis -->
                                        <label for="code_entity" class="txt_dark_bold fs-4">Dosis</label>
                                        <input type="text" class="form-control form_style_input @error('code_entity') is-invalid @enderror"
                                        id="code_entity" name="code_entity"  value="{{ old('code_entity') }}">
                                    </div>
                                    <div class="col-md-2 mb-3"><!-- Presentación -->
                                        <label for="code_entity" class="txt_dark_bold fs-4">Presentación</label>
                                        <input type="text" class="form-control form_style_input @error('code_entity') is-invalid @enderror"
                                        id="code_entity" name="code_entity"  value="{{ old('code_entity') }}">
                                    </div>
                                    <div class="col-md-2 mb-3"><!-- Días -->
                                        <label for="code_entity" class="txt_dark_bold fs-4">Días</label>
                                        <input type="text" class="form-control form_style_input @error('code_entity') is-invalid @enderror"
                                        id="code_entity" name="code_entity"  value="{{ old('code_entity') }}">
                                    </div>
                                    <div class="col-md-2 mb-3"><!-- Frecuencia -->
                                        <label for="code_entity" class="txt_dark_bold fs-4">Frecuencia (Horas)</label>
                                        <input type="text" class="form-control form_style_input @error('code_entity') is-invalid @enderror"
                                        id="code_entity" name="code_entity"  value="{{ old('code_entity') }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3"><!-- Días -->
                                        <label for="medical-entity" class="txt_dark_bold fs-4">Días</label>
                                        <input type="text" class="form-control form_style_input @error('entity') is-invalid @enderror sgsss" data-code="#code_entity"
                                        id="entity" name="entity"  value="{{ old('entity') }}">
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- Frecuencia -->
                                        <label for="code_entity" class="txt_dark_bold fs-4">Frecuencia (Horas)</label>
                                        <input type="text" class="form-control form_style_input @error('code_entity') is-invalid @enderror"
                                        id="code_entity" name="code_entity"  value="{{ old('code_entity') }}">
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- Cantidad -->
                                        <label for="code_entity" class="txt_dark_bold fs-4">Cantidad</label>
                                        <input type="text" class="form-control form_style_input @error('code_entity') is-invalid @enderror"
                                        id="code_entity" name="code_entity"  value="{{ old('code_entity') }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-3"><!-- Recomendaciones -->
                                        <label for="observation" class="txt_dark_bold fs-4">Recomendaciones</label>
                                        <textarea class="form-control form_style_input form_textarea" placeholder="" id="observation" style="height: 100px"></textarea>
                                    </div>
                                </div>

                                <!-- Save Button -->
                                <div class="text-center mt-5" >
                                    <button type="submit" class="btn btn-info align-self-center fs-7 px-4" style="font-weight: 100">
                                        {{ __('trans.save') }} 
                                    </button>
                                </div>
                            </div>
                        </div>





















                        <!-- <div class="row">
                            <div class="col-12 mb-3">
                                <div class="antecedent_container flex-nowrap flex-row">
                                    <a href="#" class="me-3">
                                        <span class="fs-4">Marca comercial</span>
                                    </a>

                                    <a href="#" class="me-3">
                                        <span class="fs-4">Génerico</span>
                                    </a>

                                     <a href="#" class="me-3">
                                        <span class="fs-4">Magistral</span>
                                    </a>
                                </div>
                            </div>
                        </div> -->

                        <!-- <div class="row">
                            <div class="col-8 mb-3">
                                <label for="" class="txt_dark_bold fs-4">Nombre Comercial</label>
                                <div class="d-flex">
                                    <input type="search" class="form-control form_style_input noBorder_radius_right @error('date-and-time-triage') is-invalid @enderror"
                                    id="" name="" value="{{ old('') }}" aria-label="Search">
                                    <button class="btn form_style_input noBorder_radius_left_two" type="submit"><i data-feather="search" style="color: #1DBFD6;"></i></button>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="agreement" class="txt_dark_bold fs-4">Vía de administración</label>
                                <select name="agreement" id="agreement" class="form-select form_style_input @error('agreement') is-invalid @enderror">
                                    <option ></option>
                                    <option value="oral" {{ (old('agreement') == 'agreement') ? 'selected' : '' }} >Oral</option>
                                    <option value="Intravenosa" {{ (old('agreement') == 'agreement') ? 'selected' : '' }} >Intravenosa</option>
                                </select>
                            </div>
                        </div> -->

                        <!-- <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="medical-entity" class="txt_dark_bold fs-4">Laboratorio</label>
                                <input type="text" class="form-control form_style_input @error('entity') is-invalid @enderror sgsss" data-code="#code_entity"
                                id="entity" name="entity"  value="{{ old('entity') }}">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="code_entity" class="txt_dark_bold fs-4">Dosis</label>
                                <input type="text" class="form-control form_style_input @error('code_entity') is-invalid @enderror"
                                id="code_entity" name="code_entity"  value="{{ old('code_entity') }}">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="code_entity" class="txt_dark_bold fs-4">Presentación</label>
                                <input type="text" class="form-control form_style_input @error('code_entity') is-invalid @enderror"
                                id="code_entity" name="code_entity"  value="{{ old('code_entity') }}">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="code_entity" class="txt_dark_bold fs-4">Días</label>
                                <input type="text" class="form-control form_style_input @error('code_entity') is-invalid @enderror"
                                id="code_entity" name="code_entity"  value="{{ old('code_entity') }}">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="code_entity" class="txt_dark_bold fs-4">Frecuencia (Horas)</label>
                                <input type="text" class="form-control form_style_input @error('code_entity') is-invalid @enderror"
                                id="code_entity" name="code_entity"  value="{{ old('code_entity') }}">
                            </div>
                        </div> -->

                        <!-- <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="medical-entity" class="txt_dark_bold fs-4">Días</label>
                                <input type="text" class="form-control form_style_input @error('entity') is-invalid @enderror sgsss" data-code="#code_entity"
                                id="entity" name="entity"  value="{{ old('entity') }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="code_entity" class="txt_dark_bold fs-4">Frecuencia (Horas)</label>
                                <input type="text" class="form-control form_style_input @error('code_entity') is-invalid @enderror"
                                id="code_entity" name="code_entity"  value="{{ old('code_entity') }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="code_entity" class="txt_dark_bold fs-4">Cantidad</label>
                                <input type="text" class="form-control form_style_input @error('code_entity') is-invalid @enderror"
                                id="code_entity" name="code_entity"  value="{{ old('code_entity') }}">
                            </div>
                        </div> -->

                        <!-- <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="observation" class="txt_dark_bold fs-4">Recomendaciones</label>
                                <textarea class="form-control form_style_input form_textarea" placeholder="" id="observation" style="height: 100px"></textarea>
                            </div>
                        </div> -->

                        <!-- Save Button -->
                        <!-- <div class="text-center mt-5" >
                            <button type="submit" class="btn btn-info align-self-center fs-7 px-4" style="font-weight: 100">
                                {{ __('trans.save') }} 
                            </button>
                        </div> -->
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
                    <div class="d-flex align-self-start">
                        <h2 class="txt_blue_bold fs-10 mt-3">Autorizaciones</h2>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="form" enctype="">
                        @csrf
                        <div class="row">
                            <div class="accordion accordion-flush mb-5" id="autorizacion_main_accordion"> <!-- Registros anteriores desplegable -->
                                <div class="accordion-item" style="background: #F1F1F1">
                                    <!-- Botón desplegable REGISTROS ANTERIORES -->
                                    <button class="accordion-button collapsed justify-content-between txt_dark_bold fs-4 px-5" type="button" data-bs-toggle="collapse" 
                                        data-bs-target="#autorizacion_registers" aria-expanded="false" aria-controls="autorizacion_btn_register">
                                        Regitros Anteriores
                                    </button>
                                   <!-- Contenido desplegable REGISTROS ANTERIORES -->
                                    <div id="autorizacion_registers" class="accordion-collapse collapse hc_collapse_registers" aria-labelledby="autorizacion_content_register" 
                                        data-bs-parent="#autorizacion_main_accordion">
                                        <div class="accordion-body px-0">
                                            <!-- Desplegable registro triage UNO -->
                                            <div class="row">
                                                <div class="col-12 hc_accordion_collapse">
                                                    <!-- Botón desplegable registro UNO -->
                                                    <button class="accordion-button collapsed txt_dark_bold fs-4 px-5 hc_incap_btn_accordion" type="button" data-bs-toggle="collapse" 
                                                        data-bs-target="#autorizacion_info_one" aria-expanded="false" aria-controls="autorizacion_btn_info_one">
                                                        Fecha: 20/03/2019 14:58
                                                    </button>
                                                    <!-- Contenido desplegable registro UNO -->
                                                    <div id="autorizacion_info_one" class="accordion-collapse collapse" aria-labelledby="autorizacion_content_info_one" 
                                                        data-bs-parent="#autorizacion_main_info_one">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-12 hc_data_table">
                                                                    <table class="data_table" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Nombre del Procedimiento</th>
                                                                                <th>Código del Procedimiento (CUPS)</th>
                                                                                <th>Recomendación</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Cirugía plástica</td>
                                                                                <td>000 000</td>
                                                                                <td>
                                                                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore at eius laborum itaque numquam consectetur!
                                                                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore at eius laborum itaque numquam consectetur!
                                                                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore at eius laborum itaque numquam consectetur!
                                                                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore at eius laborum itaque numquam consectetur!
                                                                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore at eius laborum itaque numquam consectetur!
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
                                            <!-- Desplegable registro triage DOS -->
                                            <div class="row">
                                                <div class="col-12 hc_accordion_collapse">
                                                    <!-- Botón desplegable registro DOS -->
                                                    <button class="accordion-button collapsed txt_dark_bold fs-4 px-5 hc_incap_btn_accordion" type="button" data-bs-toggle="collapse" 
                                                        data-bs-target="#autorizacion_info_two" aria-expanded="false" aria-controls="autorizacion_btn_info_two">
                                                        Fecha: 05/08/2019 09:20
                                                    </button>
                                                    <!-- Contenido desplegable registro DOS -->
                                                    <div id="autorizacion_info_two" class="accordion-collapse collapse" aria-labelledby="autorizacion_content_info_two" 
                                                        data-bs-parent="#autorizacion_main_info_two">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-12 hc_data_table">
                                                                    <table class="data_table" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Nombre del Procedimiento</th>
                                                                                <th>Código del Procedimiento (CUPS)</th>
                                                                                <th>Recomendación</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Cirugía plástica</td>
                                                                                <td>000 000</td>
                                                                                <td>
                                                                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore at eius laborum itaque numquam consectetur!
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
                            <div class="col-md-6 mb-3 pe-5"><!-- Nombre del Procedimiento -->
                                <label for="medical-entity" class="txt_dark_bold fs-4">Nombre del Procedimiento</label>
                                <input type="text" class="form-control form_style_input @error('entity') is-invalid @enderror sgsss" data-code="#code_entity"
                                id="entity" name="entity"  value="{{ old('entity') }}">
                            </div>
                            <div class="col-md-6 mb-3 ps-5"><!-- Código del Procedimiento (CUPS) -->
                                <label for="code_entity" class="txt_dark_bold fs-4">Código del Procedimiento (CUPS)</label>
                                <input type="text" class="form-control form_style_input @error('code_entity') is-invalid @enderror"
                                id="code_entity" name="code_entity"  value="{{ old('code_entity') }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3"><!-- Recomendación -->
                                <label for="observation" class="txt_dark_bold fs-4">Recomendación</label>
                                <textarea class="form-control form_style_input form_textarea" placeholder="" id="observation" style="height: 100px"></textarea>
                            </div>
                        </div>

                        <!-- Botón Agregar -->
                        <a href="javascript:void(0)" id="btn-add-contact" class="txt_blue_light_500 fs-5 fw_bold py-2 d-flex" style="width: 125px">
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

    <!-- Modal   Tecnología en Salud -->
    <div class="modal fade" id="vertical-center-scroll-modal_tecSalud" tabindex="-1" aria-labelledby="vertical-center-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable hc_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="d-flex align-self-start">
                        <h2 class="txt_blue_bold fs-10 mt-3">Tecnología en Salud</h2>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="form" enctype="">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3 pe-5"><!-- Tipo de Tecnología en Salud -->
                                <label for="medical-entity" class="txt_dark_bold fs-4">Tipo de Tecnología en Salud</label>
                                <select name="agreement" id="agreement" class="form-select form_style_input @error('agreement') is-invalid @enderror">
                                    <option ></option>
                                    <option value="Tipo de Tecnología en Salud" {{ (old('agreement') == 'agreement') ? 'selected' : '' }} >Tipo de Tecnología en Salud</option>
                                    <option value="Tipo de Tecnología en Salud" {{ (old('agreement') == 'agreement') ? 'selected' : '' }} >Tipo de Tecnología en Salud</option>
                                    <option value="Tipo de Tecnología en Salud" {{ (old('agreement') == 'agreement') ? 'selected' : '' }} >Tipo de Tecnología en Salud</option>
                                    <option value="Tipo de Tecnología en Salud" {{ (old('agreement') == 'agreement') ? 'selected' : '' }} >Tipo de Tecnología en Salud</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3 ps-5"><!-- Código de Tecnología en Salud -->
                                <label for="code_entity" class="txt_dark_bold fs-4">Código de Tecnología en Salud</label>
                                <input type="text" class="form-control form_style_input @error('code_entity') is-invalid @enderror"
                                id="code_entity" name="code_entity"  value="{{ old('code_entity') }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3 pe-5"><!-- Nombre de la Tecnología en Salud -->
                                <label for="medical-entity" class="txt_dark_bold fs-4">Nombre de la Tecnología en Salud</label>
                                <input type="text" class="form-control form_style_input @error('entity') is-invalid @enderror sgsss" data-code="#code_entity"
                                id="entity" name="entity"  value="{{ old('entity') }}">
                            </div>
                            <div class="col-md-6 mb-3 ps-5"><!-- Finalidad de la Tecnología en salud -->
                                <label for="code_entity" class="txt_dark_bold fs-4">Finalidad de la Tecnología en salud</label>
                                <select name="agreement" id="agreement" class="form-select form_style_input @error('agreement') is-invalid @enderror">
                                    <option ></option>
                                    <option value="Finalidad de la Tecnología en Salud" {{ (old('agreement') == 'agreement') ? 'selected' : '' }} >Finalidad de la Tecnología en Salud</option>
                                    <option value="Finalidad de la Tecnología en Salud" {{ (old('agreement') == 'agreement') ? 'selected' : '' }} >Finalidad de la Tecnología en Salud</option>
                                    <option value="Finalidad de la Tecnología en Salud" {{ (old('agreement') == 'agreement') ? 'selected' : '' }} >Finalidad de la Tecnología en Salud</option>
                                    <option value="Finalidad de la Tecnología en Salud" {{ (old('agreement') == 'agreement') ? 'selected' : '' }} >Finalidad de la Tecnología en Salud</option>
                                </select>
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
                            <div class="accordion accordion-flush mb-5" id="incapacidad_main_accordion"> <!-- Registros anteriores desplegable -->
                                <div class="accordion-item" style="background: #F1F1F1">
                                    <!-- Botón desplegable REGISTROS ANTERIORES -->
                                    <button class="accordion-button collapsed justify-content-between txt_dark_bold fs-4 px-5" type="button" data-bs-toggle="collapse" 
                                        data-bs-target="#incapacidad_registers" aria-expanded="false" aria-controls="incapacidad_btn_register">
                                        Regitros Anteriores
                                    </button>
                                   <!-- Contenido desplegable REGISTROS ANTERIORES -->
                                    <div id="incapacidad_registers" class="accordion-collapse collapse hc_collapse_registers" aria-labelledby="incapacidad_content_register" 
                                        data-bs-parent="#incapacidad_main_accordion">
                                        <div class="accordion-body px-0">
                                            <!-- Desplegable registro triage UNO -->
                                            <div class="row">
                                                <div class="col-12 hc_accordion_collapse">
                                                    <!-- Botón desplegable registro UNO -->
                                                    <button class="accordion-button collapsed txt_dark_bold fs-4 px-5 hc_incap_btn_accordion" type="button" data-bs-toggle="collapse" 
                                                        data-bs-target="#incapacidad_info_one" aria-expanded="false" aria-controls="incapacidad_btn_info_one">
                                                        Fecha: 20/03/2019 14:58
                                                    </button>
                                                    <!-- Contenido desplegable registro UNO -->
                                                    <div id="incapacidad_info_one" class="accordion-collapse collapse" aria-labelledby="incapacidad_content_info_one" 
                                                        data-bs-parent="#incapacidad_main_info_one">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-12 hc_data_table">
                                                                    <table class="data_table" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Tipo de Incapacidad</th>
                                                                                <th>Días</th>
                                                                                <th>Descripción</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Prolongado</td>
                                                                                <td>3</td>
                                                                                <td>
                                                                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore at eius laborum itaque numquam consectetur!
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
                                            <!-- Desplegable registro triage DOS -->
                                            <div class="row">
                                                <div class="col-12 hc_accordion_collapse">
                                                    <!-- Botón desplegable registro DOS -->
                                                    <button class="accordion-button collapsed txt_dark_bold fs-4 px-5 hc_incap_btn_accordion" type="button" data-bs-toggle="collapse" 
                                                        data-bs-target="#incapacidad_info_two" aria-expanded="false" aria-controls="incapacidad_btn_info_two">
                                                        Fecha: 05/08/2019 09:20
                                                    </button>
                                                    <!-- Contenido desplegable registro DOS -->
                                                    <div id="incapacidad_info_two" class="accordion-collapse collapse" aria-labelledby="incapacidad_content_info_two" 
                                                        data-bs-parent="#incapacidad_main_info_two">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-12 hc_data_table">
                                                                    <table class="data_table" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Tipo de Incapacidad</th>
                                                                                <th>Días</th>
                                                                                <th>Descripción</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Prolongado</td>
                                                                                <td>3</td>
                                                                                <td>
                                                                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore at eius laborum itaque numquam consectetur!
                                                                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore at eius laborum itaque numquam consectetur!
                                                                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore at eius laborum itaque numquam consectetur!
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
                            <div class="col-md-6 mb-3"><!-- Tipo de Incapacidad -->
                                <label for="gender_identity" class="txt_dark_bold fs-4">Tipo de Incapacidad</label>
                                <select name="gender_identity" id="gender_identity" class="form-select form_style_input @error('gender_identity') is-invalid @enderror">
                                    <option></option>
                                    <option value="Nuevo">Nuevo</option>
                                    <option value="Prolongado">Prolongado</option>
                                    <option value="Lisenciado">Lisenciado</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3"><!-- Días -->
                                <label for="triage" class="txt_dark_bold fs-4">Días</label>
                                <input type="number" class="form-control form_style_input @error('triage') is-invalid @enderror"
                                id="triage" name="triage" required value="{{ old('triage') }}">
                            </div>
                        </div>
                      
                        <div class="row">
                            <div class="col-md-12 mb-3"><!-- Descripción -->
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

    <!-- Modal   Resumen Clínico - Epicrisis -->
    <div class="modal fade" id="vertical-center-scroll-modal_resumen" tabindex="-1" aria-labelledby="vertical-center-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable hc_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="d-flex align-self-start">
                        <h2 class="txt_blue_bold fs-10 mt-3">Resumen Clínico - Epicrisis</h2>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="form" enctype="">
                        @csrf

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

    <!-- Modal   Vacunación -->
    <div class="modal fade" id="vertical-center-scroll-modal_vacun" tabindex="-1" aria-labelledby="vertical-center-modal" style="display: none;" aria-hidden="true">   
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable hc_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="d-flex align-self-start">
                        <h2 class="txt_blue_bold fs-10 mt-3">Vacunación</h2>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="form" enctype="">
                        @csrf
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
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    
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

        // Función para el campo DESCARGA DE ARCHIVOS del módulo RESULTADOS DE EXÁMENES
        var myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
            url: "https://keenthemes.com/scripts/void.php", // Set the url for your upload script location
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 10,
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            accept: function(file, done) {
                if (file.name == "wow.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            }
        });

        // Función para las opciones tab en módulo PRESCRIPCIONES
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
    </script>
@endsection
