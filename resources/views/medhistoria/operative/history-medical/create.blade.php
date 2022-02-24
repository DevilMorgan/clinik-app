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
                    <input class="form-check-input m-0" type="checkbox" role="switch" id="flexSwitchCheckChecked1" checked>
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
            <button class="hc_card_items switch_doble_linea" data-bs-target="#vertical-center-scroll-modal_triage" data-bs-toggle="modal"> 
                <div class="form-switch p-0">
                    <input class="form-check-input m-0" type="checkbox" role="switch" id="flexSwitchCheckChecked1" checked>
                </div>
                <i data-feather="thermometer" class="hc_card_icon"></i>
                <h3 class="txt_blue_500 f-10">{{ __('trans.triage') }}</h3>
            </button> 

            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_antec" data-bs-toggle="modal"> 
                <i data-feather="link" class="hc_card_icon"></i>
                <h3 class="txt_blue_500 f-10">{{ __('trans.background') }}</h3>
            </button> 

            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_expFis" data-bs-toggle="modal"> 
                <i data-feather="user-check" class="hc_card_icon"></i>
                <h3 class="txt_blue_500 f-10">{{ __('trans.physical_exploration') }}</h3>
            </button>

            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_revAparSis" data-bs-toggle="modal"> 
                <div class="form-switch p-0">
                    <input class="form-check-input m-0" type="checkbox" role="switch" id="flexSwitchCheckChecked1" checked>
                </div>
                <i data-feather="clipboard" class="hc_card_icon"></i>
                <h3 class="txt_blue_500 f-10">{{ __('trans.review_devices_systems') }}</h3>
            </button> 
        </div>

        <div class="hc_card">
            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_resulExam" data-bs-toggle="modal"> 
                <i data-feather="trending-up" class="hc_card_icon"></i>
                <h3 class="txt_blue_500 f-10">{{ __('trans.medical_exam_results') }}</h3>
            </button>

            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_diag" data-bs-toggle="modal"> 
                <i data-feather="search" class="hc_card_icon"></i>
                <h3 class="txt_blue_500 f-10">{{ __('trans.diagnostic') }}</h3>
            </button>

            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_prescrip" data-bs-toggle="modal"> 
                <i data-feather="file" class="hc_card_icon"></i>
                <h3 class="txt_blue_500 f-10">{{ __('trans.prescription') }}</h3>
            </button> 
            
            <button class="hc_card_items switch_doble_linea" data-bs-target="#vertical-center-scroll-modal_aut" data-bs-toggle="modal"> 
                <div class="form-switch p-0">
                    <input class="form-check-input m-0" type="checkbox" role="switch" id="flexSwitchCheckChecked1" checked>
                </div>
                <i data-feather="check-circle" class="hc_card_icon"></i>
                <h3 class="txt_blue_500 f-10">{{ __('trans.authorization') }}</h3>
            </button>
        </div>

        <div class="hc_card">
            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_incap" data-bs-toggle="modal"> 
                <div class="form-switch p-0">
                    <input class="form-check-input m-0" type="checkbox" role="switch" id="flexSwitchCheckChecked1" checked>
                </div>
                <i data-feather="activity" class="hc_card_icon"></i>
                <h3 class="txt_blue_500 f-10">{{ __('trans.disabilities') }}</h3>
            </button> 

            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_tecSalud" data-bs-toggle="modal"> 
                <i data-feather="tv" class="hc_card_icon"></i>
                <h3 class="txt_blue_500 f-10">{{ __('trans.health_technology') }}</h3>
            </button> 

            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_resumen" data-bs-toggle="modal"> 
                <i data-feather="folder-plus" class="hc_card_icon"></i>
                <h3 class="txt_blue_500 f-10">{{ __('trans.clinical_summary_epicrisis') }}</h3>
            </button>  

            <button class="hc_card_items" data-bs-target="#vertical-center-scroll-modal_vacun" data-bs-toggle="modal"> 
                <i data-feather="shield" class="hc_card_icon"></i>
                <h3 class="txt_blue_500 f-10">{{ __('trans.Vaccination') }}</h3>
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
                                        <option value="union_couples" {{ (old('marital-status') == 'union_couples') ? 'selected' : '' }}>{{ __('trans.union_couples') }}</option>
                                        <option value="widower_couples" {{ (old('marital-status') == 'widower_couples') ? 'selected' : '' }}>{{ __('trans.widower_couples') }}</option>
                                        <option value="legal separation" {{ (old('marital-status') == 'legal separation') ? 'selected' : '' }}>{{ __('trans.legal-separation') }}</option>
                                        <option value="Concubinage" {{ (old('marital-status') == 'Concubinage') ? 'selected' : '' }}>{{ __('trans.Concubinage') }}</option>
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
                                <!-- Fecha de atención -->
                                <div class="col-md-4 mb-3">
                                    <label for="date_attention" class="txt_dark_bold fs-4">{{ __('validation.attributes.date_attention') }}</label>
                                    <input type="date" class="form-control form_style_input @error('date_attention') is-invalid @enderror"
                                            id="date_attention" name="date_attention" value="{{ old('date_attention') }}">
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
                                        <option value="father" {{ (old('relationship') == 'father') ? 'selected' : '' }} >{{ __('trans.father') }}</option>
                                        <option value="mother" {{ (old('relationship') == 'mother') ? 'selected' : '' }} >{{ __('trans.mother') }}</option>
                                        <option value="son" {{ (old('relationship') == 'son') ? 'selected' : '' }} >{{ __('trans.son') }}</option>
                                        <option value="daugther" {{ (old('relationship') == 'daugther') ? 'selected' : '' }} >{{ __('trans.daugther') }}</option>
                                        <option value="siblings" {{ (old('relationship') == 'siblings') ? 'selected' : '' }} >{{ __('trans.siblings') }}</option>
                                        <option value="grandparent" {{ (old('relationship') == 'grandparent') ? 'selected' : '' }} >{{ __('trans.grandparent') }}</option>
                                        <option value="great_grandparent" {{ (old('relationship') == 'great_grandparent') ? 'selected' : '' }} >{{ __('trans.great_grandparent') }}</option>
                                        <option value="grandchildren" {{ (old('relationship') == 'grandchildren') ? 'selected' : '' }} >{{ __('trans.grandchildren') }}</option>
                                        <option value="great_grandchildren" {{ (old('relationship') == 'great_grandchildren') ? 'selected' : '' }} >{{ __('trans.great_grandchildren') }}</option>
                                        <option value="uncle" {{ (old('relationship') == 'uncle') ? 'selected' : '' }} >{{ __('trans.uncle') }}</option>
                                        <option value="aunt" {{ (old('relationship') == 'aunt') ? 'selected' : '' }} >{{ __('trans.aunt') }}</option>
                                        <option value="cousin" {{ (old('relationship') == 'cousin') ? 'selected' : '' }} >{{ __('trans.cousin') }}</option>
                                        <option value="nephew" {{ (old('relationship') == 'nephew') ? 'selected' : '' }} >{{ __('trans.nephew') }}</option>
                                        <option value="step_brothers" {{ (old('relationship') == 'step_brothers') ? 'selected' : '' }} >{{ __('trans.step_brothers') }}</option>
                                        <option value="spouse" {{ (old('relationship') == 'spouse') ? 'selected' : '' }} >{{ __('trans.spouse') }}</option>
                                        <option value="son_in_law" {{ (old('relationship') == 'son_in_law') ? 'selected' : '' }} >{{ __('trans.son_in_law') }}</option>
                                        <option value="daugther_in_law" {{ (old('relationship') == 'daugther_in_law') ? 'selected' : '' }} >{{ __('trans.daugther_in_law') }}</option>
                                        <option value="inlaw" {{ (old('relationship') == 'inlaw') ? 'selected' : '' }} >{{ __('trans.inlaw') }}</option>
                                        <option value="colleague" {{ (old('relationship') == 'colleague') ? 'selected' : '' }} >{{ __('trans.colleague') }}</option>
                                        <option value="friend" {{ (old('relationship') == 'friend') ? 'selected' : '' }} >{{ __('trans.friend') }}</option>
                                        <option value="neither" {{ (old('relationship') == 'neither') ? 'selected' : '' }} >{{ __('trans.neither') }}</option>
                                        <option value="no_apply" {{ (old('relationship') == 'no_apply') ? 'selected' : '' }} >{{ __('trans.no_apply') }}</option>
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
                                    <input type="text" class="form-control form_style_input @error('phone') is-invalid @enderror"
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
                                        <option value="father" {{ (old('relationship') == 'father') ? 'selected' : '' }} >{{ __('trans.father') }}</option>
                                        <option value="mother" {{ (old('relationship') == 'mother') ? 'selected' : '' }} >{{ __('trans.mother') }}</option>
                                        <option value="son" {{ (old('relationship') == 'son') ? 'selected' : '' }} >{{ __('trans.son') }}</option>
                                        <option value="daugther" {{ (old('relationship') == 'daugther') ? 'selected' : '' }} >{{ __('trans.daugther') }}</option>
                                        <option value="siblings" {{ (old('relationship') == 'siblings') ? 'selected' : '' }} >{{ __('trans.siblings') }}</option>
                                        <option value="grandparent" {{ (old('relationship') == 'grandparent') ? 'selected' : '' }} >{{ __('trans.grandparent') }}</option>
                                        <option value="great_grandparent" {{ (old('relationship') == 'great_grandparent') ? 'selected' : '' }} >{{ __('trans.great_grandparent') }}</option>
                                        <option value="grandchildren" {{ (old('relationship') == 'grandchildren') ? 'selected' : '' }} >{{ __('trans.grandchildren') }}</option>
                                        <option value="great_grandchildren" {{ (old('relationship') == 'great_grandchildren') ? 'selected' : '' }} >{{ __('trans.great_grandchildren') }}</option>
                                        <option value="uncle" {{ (old('relationship') == 'uncle') ? 'selected' : '' }} >{{ __('trans.uncle') }}</option>
                                        <option value="aunt" {{ (old('relationship') == 'aunt') ? 'selected' : '' }} >{{ __('trans.aunt') }}</option>
                                        <option value="cousin" {{ (old('relationship') == 'cousin') ? 'selected' : '' }} >{{ __('trans.cousin') }}</option>
                                        <option value="nephew" {{ (old('relationship') == 'nephew') ? 'selected' : '' }} >{{ __('trans.nephew') }}</option>
                                        <option value="step_brothers" {{ (old('relationship') == 'step_brothers') ? 'selected' : '' }} >{{ __('trans.step_brothers') }}</option>
                                        <option value="spouse" {{ (old('relationship') == 'spouse') ? 'selected' : '' }} >{{ __('trans.spouse') }}</option>
                                        <option value="son_in_law" {{ (old('relationship') == 'son_in_law') ? 'selected' : '' }} >{{ __('trans.son_in_law') }}</option>
                                        <option value="daugther_in_law" {{ (old('relationship') == 'daugther_in_law') ? 'selected' : '' }} >{{ __('trans.daugther_in_law') }}</option>
                                        <option value="inlaw" {{ (old('relationship') == 'inlaw') ? 'selected' : '' }} >{{ __('trans.inlaw') }}</option>
                                        <option value="colleague" {{ (old('relationship') == 'colleague') ? 'selected' : '' }} >{{ __('trans.colleague') }}</option>
                                        <option value="friend" {{ (old('relationship') == 'friend') ? 'selected' : '' }} >{{ __('trans.friend') }}</option>
                                        <option value="neither" {{ (old('relationship') == 'neither') ? 'selected' : '' }} >{{ __('trans.neither') }}</option>
                                        <option value="no_apply" {{ (old('relationship') == 'no_apply') ? 'selected' : '' }} >{{ __('trans.no_apply') }}</option>
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
                                    <input type="text" class="form-control form_style_input @error('phone') is-invalid @enderror"
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
                <div class="modal-footer hc_save_notice">
                    <div class="save_notice">
                        <i data-feather="check-circle" class="check_circle"></i><label>{{ __('trans.saved') }}</label>
                    </div>
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
                            <div class="col-md-6 mb-3">
                                <label for="agreement" class="txt_dark_bold fs-4">{{ __('validation.attributes.agreement') }}</label>
                                <input type="text" class="form-control form_style_input @error('agreement') is-invalid @enderror"
                                        id="agreement" name="agreement" required value="{{ old('agreement') }}">
                            </div>
                            <!-- Consentimiento -->
                            <div class="col-md-6 mb-3">
                                <label for="consent" class="txt_dark_bold fs-4">{{ __('validation.attributes.consent') }}</label>
                                <input type="text" class="form-control form_style_input @error('consent') is-invalid @enderror"
                                        id="consent" name="consent" required value="{{ old('consent') }}">
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
                                    <option value="intramural" {{ (old('modality') == 'intramural') ? 'selected' : '' }} >{{ __('trans.intramural') }}</option>
                                    <option value="extramural_mobile_unit" {{ (old('modality') == 'extramural_mobile_unit') ? 'selected' : '' }} >{{ __('trans.extramural_mobile_unit') }}</option>
                                    <option value="home_extramural" {{ (old('modality') == 'home_extramural') ? 'selected' : '' }} >{{ __('trans.home_extramural') }}</option>
                                    <option value="extramural_health_day" {{ (old('modality') == 'extramural_health_day') ? 'selected' : '' }} >{{ __('trans.extramural_health_day') }}</option>
                                    <option value="extramural_prehospital_care" {{ (old('modality') == 'extramural_prehospital_care') ? 'selected' : '' }} >{{ __('trans.extramural_prehospital_care') }}</option>
                                    <option value="interactive_telemedicine" {{ (old('modality') == 'interactive_telemedicine') ? 'selected' : '' }} >{{ __('trans.interactive_telemedicine') }}</option>
                                    <option value="non_interactive_telemedicine" {{ (old('modality') == 'non_interactive_telemedicine') ? 'selected' : '' }} >{{ __('trans.non_interactive_telemedicine') }}</option>
                                    <option value="teleexperience_telemedicine" {{ (old('modality') == 'teleexperience_telemedicine') ? 'selected' : '' }} >{{ __('trans.teleexperience_telemedicine') }}</option>
                                    <option value="telemonitoring_telemedicine" {{ (old('modality') == 'telemonitoring_telemedicine') ? 'selected' : '' }} >{{ __('trans.telemonitoring_telemedicine') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Grupo de Servicio -->
                            <div class="col-md-4 mb-3">
                                <label for="service_group" class="txt_dark_bold fs-4">{{ __('validation.attributes.service_group') }}</label>
                                <select name="service_group" id="service_group" class="form-select form_style_input @error('service_group') is-invalid @enderror">
                                    <option ></option>
                                    <option value="external_consultation" {{ (old('service_group') == 'external_consultation') ? 'selected' : '' }} >{{ __('trans.external_consultation') }}</option>
                                    <option value="diagnostic_support" {{ (old('service_group') == 'diagnostic_support') ? 'selected' : '' }} >{{ __('trans.diagnostic_support') }}</option>
                                    <option value="internment" {{ (old('service_group') == 'internment') ? 'selected' : '' }} >{{ __('trans.internment') }}</option>
                                    <option value="surgical" {{ (old('service_group') == 'surgical') ? 'selected' : '' }} >{{ __('trans.surgical') }}</option>
                                    <option value="inmediate_attention" {{ (old('service_group') == 'inmediate_attention') ? 'selected' : '' }} >{{ __('trans.inmediate_attention') }}</option>
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
                                    <option value="chemical" {{ (old('factor_type') == 'chemical') ? 'selected' : '' }} >{{ __('trans.chemical') }}</option>
                                    <option value="physical" {{ (old('factor_type') == 'physical') ? 'selected' : '' }} >{{ __('trans.physical') }}</option>
                                    <option value="biomechanical" {{ (old('factor_type') == 'biomechanical') ? 'selected' : '' }} >{{ __('trans.biomechanical') }}</option>
                                    <option value="psychosocial" {{ (old('factor_type') == 'psychosocial') ? 'selected' : '' }} >{{ __('trans.psychosocial') }}</option>
                                    <option value="biological" {{ (old('factor_type') == 'biological') ? 'selected' : '' }} >{{ __('trans.biological') }}</option>
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
                <div class="modal-footer hc_save_notice">
                    <div class="save_notice">
                        <div class="spinner"></div>
                        <label>{{ __('trans.saving') }}</label> 
                    </div>
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
                        <h2 class="txt_blue_bold fs-10 mt-3">{{ __('trans.triage') }}</h2>
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
                            <!-- Botones tipo de antecedentes -->
                            <div class="offset-md-1 col-md-3 mb-3">
                                <ul class="nav nav-pills antecedente_nav" role="tablist">
                                    <li class="nav-item mb-3">
                                        <a class="nav-link d-flex active" data-bs-toggle="tab" href="#navpill-1" role="tab">
                                            <span class="fs-4">{{ __('trans.hereditary_relatives') }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item mb-3">
                                        <a class="nav-link d-flex" data-bs-toggle="tab" href="#navpill-2" role="tab">
                                            <span class="fs-4">{{ __('trans.pathological_personal') }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item mb-3">
                                        <a class="nav-link d-flex" data-bs-toggle="tab" href="#navpill-3" role="tab">
                                            <span class="fs-4">{{ __('trans.no_phatological_personal') }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item mb-3">
                                        <a class="nav-link d-flex" data-bs-toggle="tab" href="#navpill-4" role="tab">
                                            <span class="fs-4">{{ __('trans.obstetric_gynecologist') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Tab panes -->
                            <div class="col-md-8 mb-3">
                                <div class="tab-content bg-white">
                                    <!-- Familiares hereditarios -->
                                    <div class="tab-pane active p-3" id="navpill-1" role="tabpanel">
                                        <div class="row">
                                            <!-- Campo de Número -->
                                            <div class="col-md-6 mb-3">
                                                <label for="number_field" class="txt_dark_bold fs-4">{{ __('validation.attributes.number_field') }}</label>
                                                <input type="number" class="form-control form_style_input @error('number_field') is-invalid @enderror"
                                                id="number_field" name="number_field" required value="{{ old('number_field') }}">
                                            </div>
                                            <!-- Área de Texto -->
                                            <div class="col-md-6 mb-3"> 
                                                <label for="text_area" class="txt_dark_bold fs-4">{{ __('validation.attributes.text_area') }}</label>
                                                <textarea class="form-control form_style_input form_textarea" placeholder="" id="text_area" style="height: 100px"></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Campo de Texto -->
                                            <div class="col-md-6 mb-3">
                                                <label for="text_field" class="txt_dark_bold fs-4">{{ __('validation.attributes.text_field') }}</label>
                                                <input type="text" class="form-control form_style_input @error('text_field') is-invalid @enderror"
                                                id="text_field" name="text_field" required value="{{ old('text_field') }}">
                                            </div>
                                            <!-- Rango -->
                                            <div class="col-md-6 mb-3">
                                                <label for="range_field" class="txt_dark_bold fs-4">{{ __('validation.attributes.range_field') }}</label>
                                                <div class="expFis_range">
                                                    <input type="range" class="form-range" min="0" max="5" id="range_field">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Booleano -->
                                            <div class="col-md-6 mb-3">
                                                <label for="Booleano_field" class="txt_dark_bold fs-4 mb-3">{{ __('validation.attributes.Booleano_field') }}</label>
                                                <div class="col-md-6 d-flex">
                                                    <div class="col-md-4 form-check d-flex justify-content-strat mb-0">
                                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                                id="Booleano_field-1" name="Booleano_field-status" data-activation=".Booleano_field-input"
                                                                {{ old('Booleano_field-status', 0) == 1 ? 'checked':'' }}/>
                                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="Booleano_field-1">
                                                            {{ __('trans.yes') }} 
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4 form-check d-flex justify-content-start mb-0">
                                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                                id="Booleano_field-0" name="Booleano_field-status" data-activation=".Booleano_field-input"
                                                                {{ old('Booleano_field-status', 0) == 0 ? 'checked':'' }}/>
                                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="Booleano_field-0">
                                                            {{ __('trans.no') }} 
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Checklist textos -->
                                            <div class="col-md-6 mb-3">
                                                <div class="row">
                                                    <label for="Checklist_field" class="txt_dark_bold fs-4 mb-2">{{ __('validation.attributes.Checklist_field') }}</label>
                                                    <div class="col-md-6 d-flex align-items-center py-2">
                                                        <input type="checkbox" class="form-check-input form_checkBox" id="text-1" name="text" value="{{ old('text-1') }}">
                                                        <label class="form-check-label txt_dark_400 fs-5 ps-2" for="text-1">{{ __('trans.text') }} 1</label>
                                                    </div>
                                                    <div class="col-md-6 d-flex align-items-center py-2">
                                                        <input type="checkbox" class="form-check-input form_checkBox" id="text-2" name="text-2" value="{{ old('text-2') }}">
                                                        <label class="form-check-label txt_dark_400 fs-5 ps-2" for="text-2">{{ __('trans.text') }} 2</label>
                                                    </div>
                                                    <div class="col-md-6 d-flex align-items-center py-2">
                                                        <input type="checkbox" class="form-check-input form_checkBox" id="text-1" name="text" value="{{ old('text-1') }}">
                                                        <label class="form-check-label txt_dark_400 fs-5 ps-2" for="text-1">{{ __('trans.text') }} 1</label>
                                                    </div>
                                                    <div class="col-md-6 d-flex align-items-center py-2">
                                                        <input type="checkbox" class="form-check-input form_checkBox" id="text-2" name="text-2" value="{{ old('text-2') }}">
                                                        <label class="form-check-label txt_dark_400 fs-5 ps-2" for="text-2">{{ __('trans.text') }} 2</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Personales patológicos -->
                                    <div class="tab-pane p-3" id="navpill-2" role="tabpanel"> 
                                        <div class="row">
                                            <!-- Campo de Número -->
                                            <div class="col-md-6 mb-3">
                                                <label for="number_field" class="txt_dark_bold fs-4">{{ __('validation.attributes.number_field') }}</label>
                                                <input type="number" class="form-control form_style_input @error('number_field') is-invalid @enderror"
                                                id="number_field" name="number_field" required value="{{ old('number_field') }}">
                                            </div>
                                            <!-- Área de Texto -->
                                            <div class="col-md-6 mb-3"> 
                                                <label for="text_area" class="txt_dark_bold fs-4">{{ __('validation.attributes.text_area') }}</label>
                                                <textarea class="form-control form_style_input form_textarea" placeholder="" id="text_area" style="height: 100px"></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Campo de Texto -->
                                            <div class="col-md-6 mb-3">
                                                <label for="text_field" class="txt_dark_bold fs-4">{{ __('validation.attributes.text_field') }}</label>
                                                <input type="text" class="form-control form_style_input @error('text_field') is-invalid @enderror"
                                                id="text_field" name="text_field" required value="{{ old('text_field') }}">
                                            </div>
                                            <!-- Rango -->
                                            <div class="col-md-6 mb-3">
                                                <label for="range_field" class="txt_dark_bold fs-4">{{ __('validation.attributes.range_field') }}</label>
                                                <div class="expFis_range">
                                                    <input type="range" class="form-range" min="0" max="5" id="range_field">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Booleano -->
                                            <div class="col-md-6 mb-3">
                                                <label for="Booleano_field" class="txt_dark_bold fs-4 mb-3">{{ __('validation.attributes.Booleano_field') }}</label>
                                                <div class="col-md-6 d-flex">
                                                    <div class="col-md-4 form-check d-flex justify-content-strat mb-0">
                                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                                id="Booleano_field-1" name="Booleano_field-status" data-activation=".Booleano_field-input"
                                                                {{ old('Booleano_field-status', 0) == 1 ? 'checked':'' }}/>
                                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="Booleano_field-1">
                                                            {{ __('trans.yes') }} 
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4 form-check d-flex justify-content-start mb-0">
                                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                                id="Booleano_field-0" name="Booleano_field-status" data-activation=".Booleano_field-input"
                                                                {{ old('Booleano_field-status', 0) == 0 ? 'checked':'' }}/>
                                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="Booleano_field-0">
                                                            {{ __('trans.no') }} 
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Checklist textos -->
                                            <div class="col-md-6 mb-3">
                                                <div class="row">
                                                    <label for="Checklist_field" class="txt_dark_bold fs-4 mb-2">{{ __('validation.attributes.Checklist_field') }}</label>
                                                    <div class="col-md-6 d-flex align-items-center py-2">
                                                        <input type="checkbox" class="form-check-input form_checkBox" id="text-1" name="text" value="{{ old('text-1') }}">
                                                        <label class="form-check-label txt_dark_400 fs-5 ps-2" for="text-1">{{ __('trans.text') }} 1</label>
                                                    </div>
                                                    <div class="col-md-6 d-flex align-items-center py-2">
                                                        <input type="checkbox" class="form-check-input form_checkBox" id="text-2" name="text-2" value="{{ old('text-2') }}">
                                                        <label class="form-check-label txt_dark_400 fs-5 ps-2" for="text-2">{{ __('trans.text') }} 2</label>
                                                    </div>
                                                    <div class="col-md-6 d-flex align-items-center py-2">
                                                        <input type="checkbox" class="form-check-input form_checkBox" id="text-1" name="text" value="{{ old('text-1') }}">
                                                        <label class="form-check-label txt_dark_400 fs-5 ps-2" for="text-1">{{ __('trans.text') }} 1</label>
                                                    </div>
                                                    <div class="col-md-6 d-flex align-items-center py-2">
                                                        <input type="checkbox" class="form-check-input form_checkBox" id="text-2" name="text-2" value="{{ old('text-2') }}">
                                                        <label class="form-check-label txt_dark_400 fs-5 ps-2" for="text-2">{{ __('trans.text') }} 2</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Personales no patológicos -->
                                    <div class="tab-pane p-3" id="navpill-3" role="tabpanel"> 
                                        <div class="row">
                                            <!-- Campo de Número -->
                                            <div class="col-md-6 mb-3">
                                                <label for="number_field" class="txt_dark_bold fs-4">{{ __('validation.attributes.number_field') }}</label>
                                                <input type="number" class="form-control form_style_input @error('number_field') is-invalid @enderror"
                                                id="number_field" name="number_field" required value="{{ old('number_field') }}">
                                            </div>
                                            <!-- Área de Texto -->
                                            <div class="col-md-6 mb-3"> 
                                                <label for="text_area" class="txt_dark_bold fs-4">{{ __('validation.attributes.text_area') }}</label>
                                                <textarea class="form-control form_style_input form_textarea" placeholder="" id="text_area" style="height: 100px"></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Campo de Texto -->
                                            <div class="col-md-6 mb-3">
                                                <label for="text_field" class="txt_dark_bold fs-4">{{ __('validation.attributes.text_field') }}</label>
                                                <input type="text" class="form-control form_style_input @error('text_field') is-invalid @enderror"
                                                id="text_field" name="text_field" required value="{{ old('text_field') }}">
                                            </div>
                                            <!-- Rango -->
                                            <div class="col-md-6 mb-3">
                                                <label for="range_field" class="txt_dark_bold fs-4">{{ __('validation.attributes.range_field') }}</label>
                                                <div class="expFis_range">
                                                    <input type="range" class="form-range" min="0" max="5" id="range_field">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Booleano -->
                                            <div class="col-md-6 mb-3">
                                                <label for="Booleano_field" class="txt_dark_bold fs-4 mb-3">{{ __('validation.attributes.Booleano_field') }}</label>
                                                <div class="col-md-6 d-flex">
                                                    <div class="col-md-4 form-check d-flex justify-content-strat mb-0">
                                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                                id="Booleano_field-1" name="Booleano_field-status" data-activation=".Booleano_field-input"
                                                                {{ old('Booleano_field-status', 0) == 1 ? 'checked':'' }}/>
                                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="Booleano_field-1">
                                                            {{ __('trans.yes') }} 
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4 form-check d-flex justify-content-start mb-0">
                                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                                id="Booleano_field-0" name="Booleano_field-status" data-activation=".Booleano_field-input"
                                                                {{ old('Booleano_field-status', 0) == 0 ? 'checked':'' }}/>
                                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="Booleano_field-0">
                                                            {{ __('trans.no') }} 
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Checklist textos -->
                                            <div class="col-md-6 mb-3">
                                                <div class="row">
                                                    <label for="Checklist_field" class="txt_dark_bold fs-4 mb-2">{{ __('validation.attributes.Checklist_field') }}</label>
                                                    <div class="col-md-6 d-flex align-items-center py-2">
                                                        <input type="checkbox" class="form-check-input form_checkBox" id="text-1" name="text" value="{{ old('text-1') }}">
                                                        <label class="form-check-label txt_dark_400 fs-5 ps-2" for="text-1">{{ __('trans.text') }} 1</label>
                                                    </div>
                                                    <div class="col-md-6 d-flex align-items-center py-2">
                                                        <input type="checkbox" class="form-check-input form_checkBox" id="text-2" name="text-2" value="{{ old('text-2') }}">
                                                        <label class="form-check-label txt_dark_400 fs-5 ps-2" for="text-2">{{ __('trans.text') }} 2</label>
                                                    </div>
                                                    <div class="col-md-6 d-flex align-items-center py-2">
                                                        <input type="checkbox" class="form-check-input form_checkBox" id="text-1" name="text" value="{{ old('text-1') }}">
                                                        <label class="form-check-label txt_dark_400 fs-5 ps-2" for="text-1">{{ __('trans.text') }} 1</label>
                                                    </div>
                                                    <div class="col-md-6 d-flex align-items-center py-2">
                                                        <input type="checkbox" class="form-check-input form_checkBox" id="text-2" name="text-2" value="{{ old('text-2') }}">
                                                        <label class="form-check-label txt_dark_400 fs-5 ps-2" for="text-2">{{ __('trans.text') }} 2</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Gineco - obstétricos -->
                                    <div class="tab-pane p-3" id="navpill-4" role="tabpanel"> 
                                        <div class="row">
                                            <!-- Campo de Número -->
                                            <div class="col-md-6 mb-3">
                                                <label for="number_field" class="txt_dark_bold fs-4">{{ __('validation.attributes.number_field') }}</label>
                                                <input type="number" class="form-control form_style_input @error('number_field') is-invalid @enderror"
                                                id="number_field" name="number_field" required value="{{ old('number_field') }}">
                                            </div>
                                            <!-- Área de Texto -->
                                            <div class="col-md-6 mb-3"> 
                                                <label for="text_area" class="txt_dark_bold fs-4">{{ __('validation.attributes.text_area') }}</label>
                                                <textarea class="form-control form_style_input form_textarea" placeholder="" id="text_area" style="height: 100px"></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Campo de Texto -->
                                            <div class="col-md-6 mb-3">
                                                <label for="text_field" class="txt_dark_bold fs-4">{{ __('validation.attributes.text_field') }}</label>
                                                <input type="text" class="form-control form_style_input @error('text_field') is-invalid @enderror"
                                                id="text_field" name="text_field" required value="{{ old('text_field') }}">
                                            </div>
                                            <!-- Rango -->
                                            <div class="col-md-6 mb-3">
                                                <label for="range_field" class="txt_dark_bold fs-4">{{ __('validation.attributes.range_field') }}</label>
                                                <div class="expFis_range">
                                                    <input type="range" class="form-range" min="0" max="5" id="range_field">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Booleano -->
                                            <div class="col-md-6 mb-3">
                                                <label for="Booleano_field" class="txt_dark_bold fs-4 mb-3">{{ __('validation.attributes.Booleano_field') }}</label>
                                                <div class="col-md-6 d-flex">
                                                    <div class="col-md-4 form-check d-flex justify-content-strat mb-0">
                                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                                id="Booleano_field-1" name="Booleano_field-status" data-activation=".Booleano_field-input"
                                                                {{ old('Booleano_field-status', 0) == 1 ? 'checked':'' }}/>
                                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="Booleano_field-1">
                                                            {{ __('trans.yes') }} 
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4 form-check d-flex justify-content-start mb-0">
                                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                                id="Booleano_field-0" name="Booleano_field-status" data-activation=".Booleano_field-input"
                                                                {{ old('Booleano_field-status', 0) == 0 ? 'checked':'' }}/>
                                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="Booleano_field-0">
                                                            {{ __('trans.no') }} 
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Checklist textos -->
                                            <div class="col-md-6 mb-3">
                                                <div class="row">
                                                    <label for="Checklist_field" class="txt_dark_bold fs-4 mb-2">{{ __('validation.attributes.Checklist_field') }}</label>
                                                    <div class="col-md-6 d-flex align-items-center py-2">
                                                        <input type="checkbox" class="form-check-input form_checkBox" id="text-1" name="text" value="{{ old('text-1') }}">
                                                        <label class="form-check-label txt_dark_400 fs-5 ps-2" for="text-1">{{ __('trans.text') }} 1</label>
                                                    </div>
                                                    <div class="col-md-6 d-flex align-items-center py-2">
                                                        <input type="checkbox" class="form-check-input form_checkBox" id="text-2" name="text-2" value="{{ old('text-2') }}">
                                                        <label class="form-check-label txt_dark_400 fs-5 ps-2" for="text-2">{{ __('trans.text') }} 2</label>
                                                    </div>
                                                    <div class="col-md-6 d-flex align-items-center py-2">
                                                        <input type="checkbox" class="form-check-input form_checkBox" id="text-1" name="text" value="{{ old('text-1') }}">
                                                        <label class="form-check-label txt_dark_400 fs-5 ps-2" for="text-1">{{ __('trans.text') }} 1</label>
                                                    </div>
                                                    <div class="col-md-6 d-flex align-items-center py-2">
                                                        <input type="checkbox" class="form-check-input form_checkBox" id="text-2" name="text-2" value="{{ old('text-2') }}">
                                                        <label class="form-check-label txt_dark_400 fs-5 ps-2" for="text-2">{{ __('trans.text') }} 2</label>
                                                    </div>
                                                </div>
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
                        <h2 class="txt_blue_bold fs-10 mt-3">{{ __('trans.physical_exploration') }}</h2>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="form" enctype="">
                        @csrf
                        <div class="row">
                            <!-- Campo de Número -->
                            <div class="col-md-6 mb-3">
                                <label for="number_field" class="txt_dark_bold fs-4">{{ __('validation.attributes.number_field') }}</label>
                                <input type="number" class="form-control form_style_input @error('number_field') is-invalid @enderror"
                                id="number_field" name="number_field" required value="{{ old('number_field') }}">
                            </div>
                            <!-- Área de Texto -->
                            <div class="col-md-6 mb-3"> 
                                <label for="text_area" class="txt_dark_bold fs-4">{{ __('validation.attributes.text_area') }}</label>
                                <textarea class="form-control form_style_input form_textarea" placeholder="" id="text_area" style="height: 100px"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Campo de Texto -->
                            <div class="col-md-6 mb-3">
                                <label for="text_field" class="txt_dark_bold fs-4">{{ __('validation.attributes.text_field') }}</label>
                                <input type="text" class="form-control form_style_input @error('text_field') is-invalid @enderror"
                                id="text_field" name="text_field" required value="{{ old('text_field') }}">
                            </div>
                            <!-- Rango -->
                            <div class="col-md-6 mb-3">
                                <label for="range_field" class="txt_dark_bold fs-4">{{ __('validation.attributes.range_field') }}</label>
                                <div class="expFis_range">
                                    <input type="range" class="form-range" min="0" max="5" id="range_field">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Booleano -->
                            <div class="col-md-6 mb-3">
                                <label for="Booleano_field" class="txt_dark_bold fs-4 mb-3">{{ __('validation.attributes.Booleano_field') }}</label>
                                <div class="col-md-6 d-flex">
                                    <div class="col-md-3 form-check d-flex justify-content-strat mb-0">
                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                id="Booleano_field-1" name="Booleano_field-status" data-activation=".Booleano_field-input"
                                                {{ old('Booleano_field-status', 0) == 1 ? 'checked':'' }}/>
                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="Booleano_field-1">
                                            {{ __('trans.yes') }} 
                                        </label>
                                    </div>
                                    <div class="col-md-3 form-check d-flex justify-content-start mb-0">
                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                id="Booleano_field-0" name="Booleano_field-status" data-activation=".Booleano_field-input"
                                                {{ old('Booleano_field-status', 0) == 0 ? 'checked':'' }}/>
                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="Booleano_field-0">
                                            {{ __('trans.no') }} 
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- Checklist textos -->
                            <div class="col-md-6 mb-3">
                                <div class="row">
                                    <label for="Checklist_field" class="txt_dark_bold fs-4 mb-2">{{ __('validation.attributes.Checklist_field') }}</label>
                                    <div class="col-md-6 d-flex align-items-center py-2">
                                        <input type="checkbox" class="form-check-input form_checkBox" id="text-1" name="text" value="{{ old('text-1') }}">
                                        <label class="form-check-label txt_dark_400 fs-5 ps-2" for="text-1">{{ __('trans.text') }} 1</label>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-center py-2">
                                        <input type="checkbox" class="form-check-input form_checkBox" id="text-2" name="text-2" value="{{ old('text-2') }}">
                                        <label class="form-check-label txt_dark_400 fs-5 ps-2" for="text-2">{{ __('trans.text') }} 2</label>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-center py-2">
                                        <input type="checkbox" class="form-check-input form_checkBox" id="text-1" name="text" value="{{ old('text-1') }}">
                                        <label class="form-check-label txt_dark_400 fs-5 ps-2" for="text-1">{{ __('trans.text') }} 1</label>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-center py-2">
                                        <input type="checkbox" class="form-check-input form_checkBox" id="text-2" name="text-2" value="{{ old('text-2') }}">
                                        <label class="form-check-label txt_dark_400 fs-5 ps-2" for="text-2">{{ __('trans.text') }} 2</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown-divider my-4"></div> <!-- Linea de división del formulario -->

                        <div class="row">
                            <!-- Campo de Número -->
                            <div class="col-md-6 mb-3">
                                <label for="number_field" class="txt_dark_bold fs-4">{{ __('validation.attributes.number_field') }}</label>
                                <input type="number" class="form-control form_style_input @error('number_field') is-invalid @enderror"
                                id="number_field" name="number_field" required value="{{ old('number_field') }}">
                            </div>
                            <!-- Área de Texto -->
                            <div class="col-md-6 mb-3"> 
                                <label for="text_area" class="txt_dark_bold fs-4">{{ __('validation.attributes.text_area') }}</label>
                                <textarea class="form-control form_style_input form_textarea" placeholder="" id="text_area" style="height: 100px"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Campo de Texto -->
                            <div class="col-md-6 mb-3">
                                <label for="text_field" class="txt_dark_bold fs-4">{{ __('validation.attributes.text_field') }}</label>
                                <input type="text" class="form-control form_style_input @error('text_field') is-invalid @enderror"
                                id="text_field" name="text_field" required value="{{ old('text_field') }}">
                            </div>
                            <!-- Rango -->
                            <div class="col-md-6 mb-3">
                                <label for="range_field" class="txt_dark_bold fs-4">{{ __('validation.attributes.range_field') }}</label>
                                <div class="expFis_range">
                                    <input type="range" class="form-range" min="0" max="5" id="range_field">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Booleano -->
                            <div class="col-md-6 mb-3">
                                <label for="Booleano_field" class="txt_dark_bold fs-4 mb-3">{{ __('validation.attributes.Booleano_field') }}</label>
                                <div class="col-md-6 d-flex">
                                    <div class="col-md-3 form-check d-flex justify-content-strat mb-0">
                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                id="Booleano_field-1" name="Booleano_field-status" data-activation=".Booleano_field-input"
                                                {{ old('Booleano_field-status', 0) == 1 ? 'checked':'' }}/>
                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="Booleano_field-1">
                                            {{ __('trans.yes') }} 
                                        </label>
                                    </div>
                                    <div class="col-md-3 form-check d-flex justify-content-start mb-0">
                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                id="Booleano_field-0" name="Booleano_field-status" data-activation=".Booleano_field-input"
                                                {{ old('Booleano_field-status', 0) == 0 ? 'checked':'' }}/>
                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="Booleano_field-0">
                                            {{ __('trans.no') }} 
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- Checklist textos -->
                            <div class="col-md-6 mb-3">
                                <div class="row">
                                    <label for="Checklist_field" class="txt_dark_bold fs-4 mb-2">{{ __('validation.attributes.Checklist_field') }}</label>
                                    <div class="col-md-6 d-flex align-items-center py-2">
                                        <input type="checkbox" class="form-check-input form_checkBox" id="text-1" name="text" value="{{ old('text-1') }}">
                                        <label class="form-check-label txt_dark_400 fs-5 ps-2" for="text-1">{{ __('trans.text') }} 1</label>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-center py-2">
                                        <input type="checkbox" class="form-check-input form_checkBox" id="text-2" name="text-2" value="{{ old('text-2') }}">
                                        <label class="form-check-label txt_dark_400 fs-5 ps-2" for="text-2">{{ __('trans.text') }} 2</label>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-center py-2">
                                        <input type="checkbox" class="form-check-input form_checkBox" id="text-1" name="text" value="{{ old('text-1') }}">
                                        <label class="form-check-label txt_dark_400 fs-5 ps-2" for="text-1">{{ __('trans.text') }} 1</label>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-center py-2">
                                        <input type="checkbox" class="form-check-input form_checkBox" id="text-2" name="text-2" value="{{ old('text-2') }}">
                                        <label class="form-check-label txt_dark_400 fs-5 ps-2" for="text-2">{{ __('trans.text') }} 2</label>
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
                        <h2 class="txt_blue_bold fs-10 mt-3">{{ __('trans.review_devices_systems') }}</h2>
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
                        <h2 class="txt_blue_bold fs-10 mt-3">{{ __('trans.medical_exam_results') }}</h2>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="form" enctype="">
                        @csrf
                        <div class="row">
                            <!-- Procedimiento -->
                            <div class="col-md-12 mb-3">
                                <label for="catalogue_CUPS" class="txt_dark_bold fs-4">{{ __('validation.attributes.catalogue_CUPS') }}</label>
                                <div class="d-flex">
                                    <input type="search" class="form-control form_style_input noBorder_radius_right @error('catalogue_CUPS') is-invalid @enderror"
                                    id="catalogue_CUPS" name="catalogue_CUPS" value="{{ old('catalogue_CUPS') }}" aria-label="Search">
                                    <button class="btn form_style_input noBorder_radius_left_two" type="submit"><i data-feather="search" style="color: #1DBFD6;"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="row align-items-center px-3 my-3">
                            <!-- Adjuntar archivos -->
                            <div class="col-md-8 dropzone pqr_dropzone p-2" id="kt_dropzonejs_example_1"> 
                                <div class="dz-message needsclick m-0 p-5">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <i data-feather="file" class="txt_blue_light me-3" style="width: 40px; height: 40px"></i>
                                        <h3 class="fs-4 txt_dark_bold pt-2">{{ __('trans.attach_files') }} </h3>
                                    </div>
                                </div>
                            </div>

                            <!-- Documentos adjuntos -->
                            <div class="offset-md-1 col-md-3">
                                <div class="row">
                                    <h6 class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">{{ __('trans.attached_document_number') }}  1</h6>
                                    <h6 class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">{{ __('trans.attached_document_number') }}  2</h6>
                                    <h6 class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">{{ __('trans.attached_document_number') }}  3</h6>
                                    <h6 class="form-check-label txt_dark_400 fs-5 ps-2" for="hospitalization">{{ __('trans.attached_document_number') }}  4</h6>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Recomendación -->
                            <div class="col-md-12 mb-3">
                                <label for="recommendation" class="txt_dark_bold fs-4">{{ __('validation.attributes.recommendation') }}</label>
                                <textarea class="form-control form_style_input form_textarea" placeholder="" id="recommendation" style="height: 100px"></textarea>
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
                        <h2 class="txt_blue_bold fs-10 mt-3">{{ __('trans.diagnostic') }}</h2>
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
                                        {{ __('trans.past_records') }}
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
                                                        {{ __('trans.date') }}: 20/03/2019 14:58
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
                                                                                <th>{{ __('trans.main_diagnostic') }}</th>
                                                                                <th>{{ __('trans.diagnostic_type') }}</th>
                                                                                <th>{{ __('trans.orphan_diseases') }}</th>
                                                                                <th>{{ __('trans.observation') }}</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
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
                                                        {{ __('trans.date') }}: 05/08/2019 09:20
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
                                                                                <th>{{ __('trans.main_diagnostic') }}</th>
                                                                                <th>{{ __('trans.diagnostic_type') }}</th>
                                                                                <th>{{ __('trans.orphan_diseases') }}</th>
                                                                                <th>{{ __('trans.observation') }}</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
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
                            <!-- Código diagnóstico principal de ingreso CIE-10 -->
                            <div class="col-md-12 mb-3">
                                <label for="main_diagnostic" class="txt_dark_bold fs-4">{{ __('validation.attributes.main_diagnostic') }}</label>
                                <div class="d-flex">
                                    <input type="search" class="form-control form_style_input noBorder_radius_right @error('main_diagnostic') is-invalid @enderror"
                                            id="main_diagnostic" name="main_diagnostic" value="{{ old('main_diagnostic') }}" aria-label="Search">
                                    <button class="btn form_style_input noBorder_radius_left_two" type="submit"><i data-feather="search" style="color: #1DBFD6;"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Tipo del diagnóstico principal del ingreso -->
                            <div class="col-md-6 mb-3 pe-5">
                                <label for="diagnostic_type" class="txt_dark_bold fs-4">{{ __('validation.attributes.diagnostic_type') }}</label>
                                <select class="form-select form_style_input @error('diagnostic_type') is-invalid @enderror" id="diagnostic_type" name="diagnostic_type">
                                    <option ></option>
                                    <option value="diagnostic_impression" {{ (old('diagnostic_type') == 'diagnostic_impression') ? 'selected' : '' }}>{{ __('trans.diagnostic_impression') }}</option>
                                    <option value="confirmed_new" {{ (old('diagnostic_type') == 'confirmed_new') ? 'selected' : '' }}>{{ __('trans.confirmed_new') }}</option>
                                    <option value="confirmed_repeated" {{ (old('diagnostic_type') == 'confirmed_repeated') ? 'selected' : '' }}>{{ __('trans.confirmed_repeated') }}</option>
                                </select>
                            </div>
                            <!-- Código de enfermedades huérfanas -->
                            <div class="col-md-6 mb-3 ps-5">
                                <label for="orphan_diseases" class="txt_dark_bold fs-4">{{ __('validation.attributes.orphan_diseases') }}</label>
                                <div class="d-flex">
                                    <input type="search" class="form-control form_style_input noBorder_radius_right @error('orphan_diseases') is-invalid @enderror"
                                            id="orphan_diseases" name="orphan_diseases" value="{{ old('orphan_diseases') }}" aria-label="Search">
                                    <button class="btn form_style_input noBorder_radius_left_two" type="submit"><i data-feather="search" style="color: #1DBFD6;"></i></button>
                                </div>
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
                        <h2 class="txt_blue_bold fs-10 mt-3">{{ __('trans.prescription') }}</h2>
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
                                        {{ __('trans.past_records') }}
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
                                                        {{ __('trans.date') }}: 20/03/2019 14:58
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
                                                                                <th>{{ __('trans.id') }}</th>
                                                                                <th>{{ __('trans.name') }}</th>
                                                                                <th>{{ __('trans.pharmaceutical_quantity') }}</th>
                                                                                <th>{{ __('trans.dose') }}</th>
                                                                                <th>{{ __('trans.days') }}</th>
                                                                                <th>{{ __('trans.route_administration') }}</th>
                                                                                <th>{{ __('trans.frequency') }} (Horas)</th>
                                                                                <th>{{ __('trans.quantity') }}</th>
                                                                                <th>{{ __('trans.indications') }}</th>
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
                                                        {{ __('trans.date') }}: 05/08/2019 09:20
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
                                                                                <th>{{ __('trans.id') }}</th>
                                                                                <th>{{ __('trans.name') }}</th>
                                                                                <th>{{ __('trans.pharmaceutical_quantity') }}</th>
                                                                                <th>{{ __('trans.dose') }}</th>
                                                                                <th>{{ __('trans.days') }}</th>
                                                                                <th>{{ __('trans.route_administration') }}</th>
                                                                                <th>{{ __('trans.frequency') }} (Horas)</th>
                                                                                <th>{{ __('trans.quantity') }}</th>
                                                                                <th>{{ __('trans.indications') }}</th>
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
                            <h2 class="txt_blue_bold fs-7 m-0">{{ __('trans.medicine') }} 1</h2>
                            <button type="button" class="btn_delete_round">
                                <i data-feather="trash-2" class="trash_2"></i>
                            </button>
                        </div>

                        <!-- Nav tabs -->
                        <ul class="nav nav-pills prescription_nav" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link d-flex active" data-bs-toggle="tab" href="#navpill-presc_1" role="tab">
                                    <span class="fs-4">{{ __('trans.Commercial_brand') }} </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex" data-bs-toggle="tab" href="#navpill-presc_2" role="tab">
                                    <span class="fs-4">{{ __('trans.generic') }} </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex" data-bs-toggle="tab" href="#navpill-presc_3" role="tab">
                                    <span class="fs-4">{{ __('trans.masterly') }} </span>
                                </a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content bg-white">
                            <!-- Marca Comercial -->
                            <div class="tab-pane active p-3" id="navpill-presc_1" role="tabpanel"> 
                                <div class="row">
                                    <!-- Nombre Comercial -->
                                    <div class="col-8 mb-3">
                                        <label for="Commercial_name" class="txt_dark_bold fs-4">{{ __('validation.attributes.Commercial_name') }}</label>
                                        <div class="d-flex">
                                            <input type="search" class="form-control form_style_input noBorder_radius_right @error('Commercial_name') is-invalid @enderror"
                                            id="Commercial_name" name="Commercial_name" value="{{ old('Commercial_name') }}" aria-label="Search">
                                            <button class="btn form_style_input noBorder_radius_left_two" type="submit"><i data-feather="search" style="color: #1DBFD6;"></i></button>
                                        </div>
                                    </div>
                                    <!-- Vía de Administración -->
                                    <div class="col-md-4 mb-3">
                                        <label for="route_administration" class="txt_dark_bold fs-4">{{ __('validation.attributes.route_administration') }}</label>
                                        <select name="route_administration" id="route_administration" class="form-select form_style_input @error('route_administration') is-invalid @enderror">
                                            <option ></option>
                                            <option value="oral" {{ (old('route_administration') == 'oral') ? 'selected' : '' }}>
                                                {{ __('trans.oral') }} 
                                            </option>
                                            <option value="sublingual" {{ (old('route_administration') == 'sublingual') ? 'selected' : '' }} >
                                                {{ __('trans.sublingual') }} 
                                            </option>
                                            <option value="topical" {{ (old('route_administration') == 'topical') ? 'selected' : '' }} >
                                                {{ __('trans.topical') }} 
                                            </option>
                                            <option value="transdermal" {{ (old('route_administration') == 'transdermal') ? 'selected' : '' }} >
                                                {{ __('trans.transdermal') }} 
                                            </option>
                                            <option value="ophthalmic" {{ (old('route_administration') == 'ophthalmic') ? 'selected' : '' }} >
                                                {{ __('trans.ophthalmic') }} 
                                            </option>
                                            <option value="optics" {{ (old('route_administration') == 'optics') ? 'selected' : '' }} >
                                                {{ __('trans.optics') }} 
                                            </option>
                                            <option value="intranasally" {{ (old('route_administration') == 'intranasally') ? 'selected' : '' }} >
                                                {{ __('trans.intranasally') }} 
                                            </option>
                                            <option value="inhalation" {{ (old('route_administration') == 'inhalation') ? 'selected' : '' }} >
                                                {{ __('trans.inhalation') }} 
                                            </option>
                                            <option value="rectal" {{ (old('route_administration') == 'rectal') ? 'selected' : '' }} >
                                                {{ __('trans.rectal') }} 
                                            </option>
                                            <option value="vaginal" {{ (old('route_administration') == 'vaginal') ? 'selected' : '' }} >
                                                {{ __('trans.vaginal') }} 
                                            </option>
                                            <option value="intravenous_parenteral" {{ (old('route_administration') == 'intravenous_parenteral') ? 'selected' : '' }} >
                                                {{ __('trans.intravenous_parenteral') }} 
                                            </option>
                                            <option value="intramuscular_parenteral" {{ (old('route_administration') == 'intramuscular_parenteral') ? 'selected' : '' }} >
                                                {{ __('trans.intramuscular_parenteral') }} 
                                            </option>
                                            <option value="subcutaneous_parenteral" {{ (old('route_administration') == 'subcutaneous_parenteral') ? 'selected' : '' }} >
                                                {{ __('trans.subcutaneous_parenteral') }} 
                                            </option>
                                            <option value="intrathecal_parenteral" {{ (old('route_administration') == 'intrathecal_parenteral') ? 'selected' : '' }} >
                                                {{ __('trans.intrathecal_parenteral') }} 
                                            </option>
                                            <option value="intra_articular_parenteral" {{ (old('route_administration') == 'intra_articular_parenteral') ? 'selected' : '' }} >
                                                {{ __('trans.intra_articular_parenteral') }} 
                                            </option>
                                            <option value="intracardiac_parenteral" {{ (old('route_administration') == 'intracardiac_parenteral') ? 'selected' : '' }} >
                                                {{ __('trans.intracardiac_parenteral') }} 
                                            </option>
                                            <option value="epidural_parenteral" {{ (old('route_administration') == 'epidural_parenteral') ? 'selected' : '' }} >
                                                {{ __('trans.epidural_parenteral') }} 
                                            </option>
                                            <option value="other_parenteral" {{ (old('route_administration') == 'other_parenteral') ? 'selected' : '' }} >
                                                {{ __('trans.other_parenteral') }} 
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Dosis -->
                                    <div class="col-md-2 mb-3">
                                        <label for="dose" class="txt_dark_bold fs-4">{{ __('validation.attributes.dose') }}</label>
                                        <input type="text" class="form-control form_style_input @error('dose') is-invalid @enderror sgsss" data-code="#code_dose"
                                        id="dose" name="dose"  value="{{ old('dose') }}">
                                    </div>
                                    <!-- Presentación -->
                                    <div class="col-md-2 mb-3">
                                        <label for="code_dose" class="txt_dark_bold fs-4"></label>
                                        <input type="text" class="form-control form_style_input @error('code_dose') is-invalid @enderror"
                                        id="code_dose" name="code_dose"  value="{{ old('code_dose') }}">
                                    </div>
                                    <!-- Frecuencia -->
                                    <div class="col-md-2 mb-3">
                                        <label for="frequency" class="txt_dark_bold fs-4">{{ __('validation.attributes.frequency') }}</label>
                                        <input type="text" class="form-control form_style_input @error('frequency') is-invalid @enderror"
                                        id="frequency" name="frequency"  value="{{ old('frequency') }}">
                                    </div>
                                    <!-- Unidad de tiempo -->
                                    <div class="col-md-2 mb-3">
                                    <label for="time_unit" class="txt_dark_bold fs-4"></label>
                                        <select id="time_unit" name="time_unit" class="form-select form_style_input @error('time_unit') is-invalid @enderror">
                                            <option ></option>
                                            <option value="minute" {{ (old('time_unit') == 'minute') ? 'selected' : '' }}>{{ __('trans.minute') }}</option>
                                            <option value="hour" {{ (old('time_unit') == 'hour') ? 'selected' : '' }}>{{ __('trans.hour') }}</option>
                                            <option value="day" {{ (old('time_unit') == 'day') ? 'selected' : '' }}>{{ __('trans.day') }}</option>
                                            <option value="month" {{ (old('time_unit') == 'month') ? 'selected' : '' }}>{{ __('trans.month') }}</option>
                                            <option value="year" {{ (old('time_unit') == 'year') ? 'selected' : '' }}>{{ __('trans.year') }}</option>
                                        </select>
                                    </div>
                                    <!-- Duración -->
                                    <div class="col-md-2 mb-3">
                                        <label for="duration" class="txt_dark_bold fs-4">{{ __('validation.attributes.duration') }}</label>
                                        <input type="text" class="form-control form_style_input @error('duration') is-invalid @enderror"
                                        id="duration" name="duration"  value="{{ old('duration') }}">
                                    </div>
                                    <!-- Unidad de tiempo -->
                                    <div class="col-md-2 mb-3">
                                        <label for="time_unit" class="txt_dark_bold fs-4"></label>
                                        <select id="time_unit" name="time_unit" class="form-select form_style_input @error('time_unit') is-invalid @enderror">
                                            <option ></option>
                                            <option value="minute" {{ (old('time_unit') == 'minute') ? 'selected' : '' }}>{{ __('trans.minute') }}</option>
                                            <option value="hour" {{ (old('time_unit') == 'hour') ? 'selected' : '' }}>{{ __('trans.hour') }}</option>
                                            <option value="day" {{ (old('time_unit') == 'day') ? 'selected' : '' }}>{{ __('trans.day') }}</option>
                                            <option value="month" {{ (old('time_unit') == 'month') ? 'selected' : '' }}>{{ __('trans.month') }}</option>
                                            <option value="year" {{ (old('time_unit') == 'year') ? 'selected' : '' }}>{{ __('trans.year') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Recomendaciones -->
                                    <div class="col-md-12 mb-3">
                                        <label for="recommendation" class="txt_dark_bold fs-4">{{ __('validation.attributes.recommendation') }}</label>
                                        <textarea class="form-control form_style_input form_textarea" placeholder="" id="recommendation" style="height: 100px"></textarea>
                                    </div>
                                </div>

                                <!-- Botón Agregar -->
                                <a href="javascript:void(0)" id="btn-add-contact" class="txt_blue_light_500 fs-5 fw_bold py-2 d-flex" style="width: 125px">
                                    <i data-feather="plus" class="pe-2"></i> {{ __('trans.add') }}
                                </a>
                            </div>

                            <!-- Génerico -->
                            <div class="tab-pane p-3" id="navpill-presc_2" role="tabpanel"> 
                                <div class="row">
                                    <!-- Principio activo -->
                                    <div class="col-4 mb-3">
                                        <label for="active_principle" class="txt_dark_bold fs-4">{{ __('validation.attributes.active_principle') }}</label>
                                        <div class="d-flex">
                                            <input type="search" class="form-control form_style_input noBorder_radius_right @error('active_principle') is-invalid @enderror"
                                            id="active_principle" name="active_principle" value="{{ old('active_principle') }}" aria-label="Search">
                                            <button class="btn form_style_input noBorder_radius_left_two" type="submit"><i data-feather="search" style="color: #1DBFD6;"></i></button>
                                        </div>
                                    </div>
                                    <!-- Consentración -->
                                    <div class="col-4 mb-3">
                                        <label for="consentration" class="txt_dark_bold fs-4">{{ __('validation.attributes.consentration') }}</label>
                                        <select class="form-select form_style_input @error('consentration') is-invalid @enderror" id="consentration" name="consentration">
                                            <option ></option>
                                            <option value="option 1" {{ (old('consentration') == 'option 1') ? 'selected' : '' }}>{{ __('trans.option') }} 1</option>
                                            <option value="option 2" {{ (old('consentration') == 'option 2') ? 'selected' : '' }}>{{ __('trans.option') }} 2</option>
                                            <option value="option 3" {{ (old('consentration') == 'option 3') ? 'selected' : '' }}>{{ __('trans.option') }} 3</option>
                                        </select>
                                    </div>
                                    <!-- Vía de Administración -->
                                    <div class="col-md-4 mb-3">
                                        <label for="route_administration" class="txt_dark_bold fs-4">{{ __('validation.attributes.route_administration') }}</label>
                                        <select name="route_administration" id="route_administration" class="form-select form_style_input @error('route_administration') is-invalid @enderror">
                                            <option ></option>
                                            <option value="oral" {{ (old('route_administration') == 'oral') ? 'selected' : '' }}>
                                                {{ __('trans.oral') }} 
                                            </option>
                                            <option value="sublingual" {{ (old('route_administration') == 'sublingual') ? 'selected' : '' }} >
                                                {{ __('trans.sublingual') }} 
                                            </option>
                                            <option value="topical" {{ (old('route_administration') == 'topical') ? 'selected' : '' }} >
                                                {{ __('trans.topical') }} 
                                            </option>
                                            <option value="transdermal" {{ (old('route_administration') == 'transdermal') ? 'selected' : '' }} >
                                                {{ __('trans.transdermal') }} 
                                            </option>
                                            <option value="ophthalmic" {{ (old('route_administration') == 'ophthalmic') ? 'selected' : '' }} >
                                                {{ __('trans.ophthalmic') }} 
                                            </option>
                                            <option value="optics" {{ (old('route_administration') == 'optics') ? 'selected' : '' }} >
                                                {{ __('trans.optics') }} 
                                            </option>
                                            <option value="intranasally" {{ (old('route_administration') == 'intranasally') ? 'selected' : '' }} >
                                                {{ __('trans.intranasally') }} 
                                            </option>
                                            <option value="inhalation" {{ (old('route_administration') == 'inhalation') ? 'selected' : '' }} >
                                                {{ __('trans.inhalation') }} 
                                            </option>
                                            <option value="rectal" {{ (old('route_administration') == 'rectal') ? 'selected' : '' }} >
                                                {{ __('trans.rectal') }} 
                                            </option>
                                            <option value="vaginal" {{ (old('route_administration') == 'vaginal') ? 'selected' : '' }} >
                                                {{ __('trans.vaginal') }} 
                                            </option>
                                            <option value="intravenous_parenteral" {{ (old('route_administration') == 'intravenous_parenteral') ? 'selected' : '' }} >
                                                {{ __('trans.intravenous_parenteral') }} 
                                            </option>
                                            <option value="intramuscular_parenteral" {{ (old('route_administration') == 'intramuscular_parenteral') ? 'selected' : '' }} >
                                                {{ __('trans.intramuscular_parenteral') }} 
                                            </option>
                                            <option value="subcutaneous_parenteral" {{ (old('route_administration') == 'subcutaneous_parenteral') ? 'selected' : '' }} >
                                                {{ __('trans.subcutaneous_parenteral') }} 
                                            </option>
                                            <option value="intrathecal_parenteral" {{ (old('route_administration') == 'intrathecal_parenteral') ? 'selected' : '' }} >
                                                {{ __('trans.intrathecal_parenteral') }} 
                                            </option>
                                            <option value="intra_articular_parenteral" {{ (old('route_administration') == 'intra_articular_parenteral') ? 'selected' : '' }} >
                                                {{ __('trans.intra_articular_parenteral') }} 
                                            </option>
                                            <option value="intracardiac_parenteral" {{ (old('route_administration') == 'intracardiac_parenteral') ? 'selected' : '' }} >
                                                {{ __('trans.intracardiac_parenteral') }} 
                                            </option>
                                            <option value="epidural_parenteral" {{ (old('route_administration') == 'epidural_parenteral') ? 'selected' : '' }} >
                                                {{ __('trans.epidural_parenteral') }} 
                                            </option>
                                            <option value="other_parenteral" {{ (old('route_administration') == 'other_parenteral') ? 'selected' : '' }} >
                                                {{ __('trans.other_parenteral') }} 
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Dosis -->
                                    <div class="col-md-2 mb-3">
                                        <label for="dose" class="txt_dark_bold fs-4">{{ __('validation.attributes.dose') }}</label>
                                        <input type="text" class="form-control form_style_input @error('dose') is-invalid @enderror sgsss" data-code="#code_dose"
                                        id="dose" name="dose"  value="{{ old('dose') }}">
                                    </div>
                                    <!-- Presentación -->
                                    <div class="col-md-2 mb-3">
                                        <label for="code_dose" class="txt_dark_bold fs-4"></label>
                                        <input type="text" class="form-control form_style_input @error('code_dose') is-invalid @enderror"
                                        id="code_dose" name="code_dose"  value="{{ old('code_dose') }}">
                                    </div>
                                    <!-- Frecuencia -->
                                    <div class="col-md-2 mb-3">
                                        <label for="frequency" class="txt_dark_bold fs-4">{{ __('validation.attributes.frequency') }}</label>
                                        <input type="text" class="form-control form_style_input @error('frequency') is-invalid @enderror"
                                        id="frequency" name="frequency"  value="{{ old('frequency') }}">
                                    </div>
                                    <!-- Unidad de tiempo -->
                                    <div class="col-md-2 mb-3">
                                        <label for="time_unit" class="txt_dark_bold fs-4"></label>
                                        <select id="time_unit" name="time_unit" class="form-select form_style_input @error('time_unit') is-invalid @enderror">
                                            <option ></option>
                                            <option value="minute" {{ (old('time_unit') == 'minute') ? 'selected' : '' }}>{{ __('trans.minute') }}</option>
                                            <option value="hour" {{ (old('time_unit') == 'hour') ? 'selected' : '' }}>{{ __('trans.hour') }}</option>
                                            <option value="day" {{ (old('time_unit') == 'day') ? 'selected' : '' }}>{{ __('trans.day') }}</option>
                                            <option value="month" {{ (old('time_unit') == 'month') ? 'selected' : '' }}>{{ __('trans.month') }}</option>
                                            <option value="year" {{ (old('time_unit') == 'year') ? 'selected' : '' }}>{{ __('trans.year') }}</option>
                                        </select>
                                    </div>
                                    <!-- Duración -->
                                    <div class="col-md-2 mb-3">
                                        <label for="duration" class="txt_dark_bold fs-4">{{ __('validation.attributes.duration') }}</label>
                                        <input type="text" class="form-control form_style_input @error('duration') is-invalid @enderror"
                                        id="duration" name="duration"  value="{{ old('duration') }}">
                                    </div>
                                    <!-- Unidad de tiempo -->
                                    <div class="col-md-2 mb-3">
                                        <label for="time_unit" class="txt_dark_bold fs-4"></label>
                                        <select id="time_unit" name="time_unit" class="form-select form_style_input @error('time_unit') is-invalid @enderror">
                                            <option ></option>
                                            <option value="minute" {{ (old('time_unit') == 'minute') ? 'selected' : '' }}>{{ __('trans.minute') }}</option>
                                            <option value="hour" {{ (old('time_unit') == 'hour') ? 'selected' : '' }}>{{ __('trans.hour') }}</option>
                                            <option value="day" {{ (old('time_unit') == 'day') ? 'selected' : '' }}>{{ __('trans.day') }}</option>
                                            <option value="month" {{ (old('time_unit') == 'month') ? 'selected' : '' }}>{{ __('trans.month') }}</option>
                                            <option value="year" {{ (old('time_unit') == 'year') ? 'selected' : '' }}>{{ __('trans.year') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Recomendaciones -->
                                    <div class="col-md-12 mb-3">
                                        <label for="recommendation" class="txt_dark_bold fs-4">{{ __('validation.attributes.recommendation') }}</label>
                                        <textarea class="form-control form_style_input form_textarea" placeholder="" id="recommendation" style="height: 100px"></textarea>
                                    </div>
                                </div>
                                <!-- Botón Agregar -->
                                <a href="javascript:void(0)" id="btn-add-contact" class="txt_blue_light_500 fs-5 fw_bold py-2 d-flex" style="width: 125px">
                                    <i data-feather="plus" class="pe-2"></i> {{ __('trans.add') }}
                                </a>
                            </div>

                            <!-- Magistral -->
                            <div class="tab-pane p-3" id="navpill-presc_3" role="tabpanel"> 
                                <div class="row">
                                    <!-- Fórmula Magistral -->
                                    <div class="col-8 mb-3">
                                        <label for="master_formula" class="txt_dark_bold fs-4">{{ __('validation.attributes.master_formula') }}</label>
                                        <div class="d-flex">
                                            <input type="search" class="form-control form_style_input noBorder_radius_right @error('master_formula') is-invalid @enderror"
                                            id="master_formula" name="master_formula" value="{{ old('master_formula') }}" aria-label="Search">
                                            <button class="btn form_style_input noBorder_radius_left_two" type="submit"><i data-feather="search" style="color: #1DBFD6;"></i></button>
                                        </div>
                                    </div>
                                    <!-- Vía de Administración -->
                                    <div class="col-md-4 mb-3">
                                        <label for="route_administration" class="txt_dark_bold fs-4">{{ __('validation.attributes.route_administration') }}</label>
                                        <select name="route_administration" id="route_administration" class="form-select form_style_input @error('route_administration') is-invalid @enderror">
                                            <option ></option>
                                            <option value="oral" {{ (old('route_administration') == 'oral') ? 'selected' : '' }}>
                                                {{ __('trans.oral') }} 
                                            </option>
                                            <option value="sublingual" {{ (old('route_administration') == 'sublingual') ? 'selected' : '' }} >
                                                {{ __('trans.sublingual') }} 
                                            </option>
                                            <option value="topical" {{ (old('route_administration') == 'topical') ? 'selected' : '' }} >
                                                {{ __('trans.topical') }} 
                                            </option>
                                            <option value="transdermal" {{ (old('route_administration') == 'transdermal') ? 'selected' : '' }} >
                                                {{ __('trans.transdermal') }} 
                                            </option>
                                            <option value="ophthalmic" {{ (old('route_administration') == 'ophthalmic') ? 'selected' : '' }} >
                                                {{ __('trans.ophthalmic') }} 
                                            </option>
                                            <option value="optics" {{ (old('route_administration') == 'optics') ? 'selected' : '' }} >
                                                {{ __('trans.optics') }} 
                                            </option>
                                            <option value="intranasally" {{ (old('route_administration') == 'intranasally') ? 'selected' : '' }} >
                                                {{ __('trans.intranasally') }} 
                                            </option>
                                            <option value="inhalation" {{ (old('route_administration') == 'inhalation') ? 'selected' : '' }} >
                                                {{ __('trans.inhalation') }} 
                                            </option>
                                            <option value="rectal" {{ (old('route_administration') == 'rectal') ? 'selected' : '' }} >
                                                {{ __('trans.rectal') }} 
                                            </option>
                                            <option value="vaginal" {{ (old('route_administration') == 'vaginal') ? 'selected' : '' }} >
                                                {{ __('trans.vaginal') }} 
                                            </option>
                                            <option value="intravenous_parenteral" {{ (old('route_administration') == 'intravenous_parenteral') ? 'selected' : '' }} >
                                                {{ __('trans.intravenous_parenteral') }} 
                                            </option>
                                            <option value="intramuscular_parenteral" {{ (old('route_administration') == 'intramuscular_parenteral') ? 'selected' : '' }} >
                                                {{ __('trans.intramuscular_parenteral') }} 
                                            </option>
                                            <option value="subcutaneous_parenteral" {{ (old('route_administration') == 'subcutaneous_parenteral') ? 'selected' : '' }} >
                                                {{ __('trans.subcutaneous_parenteral') }} 
                                            </option>
                                            <option value="intrathecal_parenteral" {{ (old('route_administration') == 'intrathecal_parenteral') ? 'selected' : '' }} >
                                                {{ __('trans.intrathecal_parenteral') }} 
                                            </option>
                                            <option value="intra_articular_parenteral" {{ (old('route_administration') == 'intra_articular_parenteral') ? 'selected' : '' }} >
                                                {{ __('trans.intra_articular_parenteral') }} 
                                            </option>
                                            <option value="intracardiac_parenteral" {{ (old('route_administration') == 'intracardiac_parenteral') ? 'selected' : '' }} >
                                                {{ __('trans.intracardiac_parenteral') }} 
                                            </option>
                                            <option value="epidural_parenteral" {{ (old('route_administration') == 'epidural_parenteral') ? 'selected' : '' }} >
                                                {{ __('trans.epidural_parenteral') }} 
                                            </option>
                                            <option value="other_parenteral" {{ (old('route_administration') == 'other_parenteral') ? 'selected' : '' }} >
                                                {{ __('trans.other_parenteral') }} 
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Dosis -->
                                    <div class="col-md-2 mb-3">
                                        <label for="dose" class="txt_dark_bold fs-4">{{ __('validation.attributes.dose') }}</label>
                                        <input type="text" class="form-control form_style_input @error('dose') is-invalid @enderror sgsss" data-code="#code_dose"
                                        id="dose" name="dose"  value="{{ old('dose') }}">
                                    </div>
                                    <!-- Presentación -->
                                    <div class="col-md-2 mb-3">
                                        <label for="code_dose" class="txt_dark_bold fs-4"></label>
                                        <input type="text" class="form-control form_style_input @error('code_dose') is-invalid @enderror"
                                        id="code_dose" name="code_dose"  value="{{ old('code_dose') }}">
                                    </div>
                                    <!-- Frecuencia -->
                                    <div class="col-md-2 mb-3">
                                        <label for="frequency" class="txt_dark_bold fs-4">{{ __('validation.attributes.frequency') }}</label>
                                        <input type="text" class="form-control form_style_input @error('frequency') is-invalid @enderror"
                                        id="frequency" name="frequency"  value="{{ old('frequency') }}">
                                    </div>
                                    <!-- Unidad de tiempo -->
                                    <div class="col-md-2 mb-3">
                                        <label for="time_unit" class="txt_dark_bold fs-4"></label>
                                        <select id="time_unit" name="time_unit" class="form-select form_style_input @error('time_unit') is-invalid @enderror">
                                            <option ></option>
                                            <option value="minute" {{ (old('time_unit') == 'minute') ? 'selected' : '' }}>{{ __('trans.minute') }}</option>
                                            <option value="hour" {{ (old('time_unit') == 'hour') ? 'selected' : '' }}>{{ __('trans.hour') }}</option>
                                            <option value="day" {{ (old('time_unit') == 'day') ? 'selected' : '' }}>{{ __('trans.day') }}</option>
                                            <option value="month" {{ (old('time_unit') == 'month') ? 'selected' : '' }}>{{ __('trans.month') }}</option>
                                            <option value="year" {{ (old('time_unit') == 'year') ? 'selected' : '' }}>{{ __('trans.year') }}</option>
                                        </select>
                                    </div>
                                    <!-- Duración -->
                                    <div class="col-md-2 mb-3">
                                        <label for="duration" class="txt_dark_bold fs-4">{{ __('validation.attributes.duration') }}</label>
                                        <input type="text" class="form-control form_style_input @error('duration') is-invalid @enderror"
                                        id="duration" name="duration"  value="{{ old('duration') }}">
                                    </div>
                                    <!-- Unidad de tiempo -->
                                    <div class="col-md-2 mb-3">
                                        <label for="time_unit" class="txt_dark_bold fs-4"></label>
                                        <select id="time_unit" name="time_unit" class="form-select form_style_input @error('time_unit') is-invalid @enderror">
                                            <option ></option>
                                            <option value="minute" {{ (old('time_unit') == 'minute') ? 'selected' : '' }}>{{ __('trans.minute') }}</option>
                                            <option value="hour" {{ (old('time_unit') == 'hour') ? 'selected' : '' }}>{{ __('trans.hour') }}</option>
                                            <option value="day" {{ (old('time_unit') == 'day') ? 'selected' : '' }}>{{ __('trans.day') }}</option>
                                            <option value="month" {{ (old('time_unit') == 'month') ? 'selected' : '' }}>{{ __('trans.month') }}</option>
                                            <option value="year" {{ (old('time_unit') == 'year') ? 'selected' : '' }}>{{ __('trans.year') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Recomendaciones -->
                                    <div class="col-md-12 mb-3">
                                        <label for="recommendation" class="txt_dark_bold fs-4">{{ __('validation.attributes.recommendation') }}</label>
                                        <textarea class="form-control form_style_input form_textarea" placeholder="" id="recommendation" style="height: 100px"></textarea>
                                    </div>
                                </div>
                                <!-- Botón Agregar -->
                                <a href="javascript:void(0)" id="btn-add-contact" class="txt_blue_light_500 fs-5 fw_bold py-2 d-flex" style="width: 125px">
                                    <i data-feather="plus" class="pe-2"></i> {{ __('trans.add') }}
                                </a>
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
                    <div class="d-flex align-self-start">
                        <h2 class="txt_blue_bold fs-10 mt-3">{{ __('trans.authorization') }}</h2>
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
                                        {{ __('trans.past_records') }}
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
                                                        {{ __('trans.date') }}: 20/03/2019 14:58
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
                                                                                <th>{{ __('trans.process') }}</th>
                                                                                <th>{{ __('trans.recommendation') }}</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Cirugía plástica</td>
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
                                                        {{ __('trans.date') }}: 05/08/2019 09:20
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
                                                                                <th>{{ __('trans.process') }}</th>
                                                                                <th>{{ __('trans.recommendation') }}</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Cirugía plástica</td>
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
                            <!-- Procedimiento -->
                            <div class="col-md-12 mb-3">
                                <label for="process" class="txt_dark_bold fs-4">{{ __('validation.attributes.process') }}</label>
                                <div class="d-flex">
                                    <input type="search" class="form-control form_style_input noBorder_radius_right @error('process') is-invalid @enderror"
                                    id="process" name="process" value="{{ old('process') }}" aria-label="Search">
                                    <button class="btn form_style_input noBorder_radius_left_two" type="submit"><i data-feather="search" style="color: #1DBFD6;"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Recomendación -->
                            <div class="col-md-12 mb-3">
                                <label for="recommendation" class="txt_dark_bold fs-4">{{ __('validation.attributes.recommendation') }}</label>
                                <textarea class="form-control form_style_input form_textarea" placeholder="" id="recommendation" style="height: 100px"></textarea>
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
                        <h2 class="txt_blue_bold fs-10 mt-3">{{ __('trans.health_technology') }}</h2>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="form" enctype="">
                        @csrf
                        <div class="row">
                            <!-- Tipo de Tecnología en Salud -->
                            <div class="col-md-6 mb-3 pe-5">
                                <label for="type_technology" class="txt_dark_bold fs-4">{{ __('validation.attributes.type_technology') }}</label>
                                <select name="type_technology" id="type_technology" class="form-select form_style_input @error('type_technology') is-invalid @enderror" data-code="#code_technology">
                                    <option ></option>
                                    <option value="health_procedure" {{ (old('type_technology') == 'health_procedure') ? 'selected' : '' }} >
                                        {{ __('trans.health_procedure') }}</option>
                                    <option value="drug_with_health_registration" {{ (old('type_technology') == 'drug_with_health_registration') ? 'selected' : '' }} >
                                        {{ __('trans.drug_with_health_registration') }}</option>
                                    <option value="vital_medicine_not_available" {{ (old('type_technology') == 'vital_medicine_not_available') ? 'selected' : '' }} >
                                        {{ __('trans.vital_medicine_not_available') }}</option>
                                    <option value="master_preparation" {{ (old('type_technology') == 'master_preparation') ? 'selected' : '' }} >
                                        {{ __('trans.master_preparation') }}</option>
                                    <option value="drug_not_included_health_registry" {{ (old('type_technology') == 'drug_not_included_health_registry') ? 'selected' : '' }} >
                                        {{ __('trans.drug_not_included_health_registry') }}</option>
                                    <option value="medical_device" {{ (old('type_technology') == 'medical_device') ? 'selected' : '' }} >
                                        {{ __('trans.medical_device') }}</option>
                                    <option value="blood_components" {{ (old('type_technology') == 'blood_components') ? 'selected' : '' }} >
                                        {{ __('trans.blood_components') }}</option>
                                    <option value="organic_fluid" {{ (old('type_technology') == 'organic_fluid') ? 'selected' : '' }} >
                                        {{ __('trans.organic_fluid') }}</option>
                                    <option value="organs" {{ (old('type_technology') == 'organs') ? 'selected' : '' }} >
                                        {{ __('trans.organs') }}</option>
                                    <option value="fabrics" {{ (old('type_technology') == 'fabrics') ? 'selected' : '' }} >
                                        {{ __('trans.fabrics') }}</option>
                                    <option value="cells" {{ (old('type_technology') == 'cells') ? 'selected' : '' }} >
                                        {{ __('trans.cells') }}</option>
                                    <option value="nutritional_support_product" {{ (old('type_technology') == 'nutritional_support_product') ? 'selected' : '' }} >
                                        {{ __('trans.nutritional_support_product') }}</option>
                                    <option value="complementary_service" {{ (old('type_technology') == 'complementary_service') ? 'selected' : '' }} >
                                        {{ __('trans.complementary_service') }}</option>
                                </select>
                            </div>
                            <!-- Código de Tecnología en Salud -->
                            <div class="col-md-6 mb-3 ps-5">
                                <label for="code_technology" class="txt_dark_bold fs-4">{{ __('validation.attributes.code_technology') }}</label>
                                <input type="text" class="form-control form_style_input @error('code_technology') is-invalid @enderror"
                                id="code_technology" name="code_technology"  value="{{ old('code_technology') }}">
                            </div>
                        </div>

                        <div class="row">
                            <!-- Nombre de la Tecnología en Salud -->
                            <div class="col-md-6 mb-3 pe-5">
                                <label for="name_technology" class="txt_dark_bold fs-4">{{ __('validation.attributes.name_technology') }}</label>
                                <input type="text" class="form-control form_style_input @error('name_technology') is-invalid @enderror sgsss"
                                id="name_technology" name="name_technology"  value="{{ old('name_technology') }}">
                            </div>
                            <!-- Finalidad de la Tecnología en salud -->
                            <div class="col-md-6 mb-3 ps-5">
                                <label for="purpose_technology" class="txt_dark_bold fs-4">{{ __('validation.attributes.purpose_technology') }}</label>
                                <select name="purpose_technology" id="purpose_technology" class="form-select form_style_input @error('purpose_technology') is-invalid @enderror">
                                    <option ></option>
                                    <option value="comprehensive_assessment_promotion_maintenance" {{ (old('purpose_technology') == 'comprehensive_assessment_promotion_maintenance') ? 'selected' : '' }} >
                                        {{ __('trans.comprehensive_assessment_promotion_maintenance') }}
                                    </option>
                                    <option value="early_detection_general_disease" {{ (old('purpose_technology') == 'early_detection_general_disease') ? 'selected' : '' }} >
                                        {{ __('trans.early_detection_general_disease') }}</option>
                                    <option value="early_detection_occupational_disease" {{ (old('purpose_technology') == 'early_detection_occupational_disease') ? 'selected' : '' }} >
                                        {{ __('trans.early_detection_occupational_disease') }}
                                    </option>
                                    <option value="specific_protection" {{ (old('purpose_technology') == 'specific_protection') ? 'selected' : '' }} >
                                        {{ __('trans.specific_protection') }}
                                    </option>
                                    <option value="diagnosis" {{ (old('purpose_technology') == 'diagnosis') ? 'selected' : '' }} >
                                        {{ __('trans.diagnosis') }}
                                    </option>
                                    <option value="treatment" {{ (old('purpose_technology') == 'treatment') ? 'selected' : '' }} >
                                        {{ __('trans.treatment') }}
                                    </option>
                                    <option value="rehabilitation" {{ (old('purpose_technology') == 'rehabilitation') ? 'selected' : '' }} >
                                        {{ __('trans.rehabilitation') }}
                                    </option>
                                    <option value="palliation" {{ (old('purpose_technology') == 'palliation') ? 'selected' : '' }} >
                                        {{ __('trans.palliation') }}
                                    </option>
                                    <option value="family_planning_contraception" {{ (old('purpose_technology') == 'family_planning_contraception') ? 'selected' : '' }} >
                                        {{ __('trans.family_planning_contraception') }}
                                    </option>
                                    <option value="breastfeeding_promotion_support" {{ (old('purpose_technology') == 'breastfeeding_promotion_support') ? 'selected' : '' }} >
                                        {{ __('trans.breastfeeding_promotion_support') }}
                                    </option>
                                    <option value="family_oriented_basic_care" {{ (old('purpose_technology') == 'family_oriented_basic_care') ? 'selected' : '' }} >
                                        {{ __('trans.family_oriented_basic_care') }}
                                    </option>
                                    <option value="care_preconception_care" {{ (old('purpose_technology') == 'care_preconception_care') ? 'selected' : '' }} >
                                        {{ __('trans.care_preconception_care') }}
                                    </option>
                                    <option value="care_prenatal_care" {{ (old('purpose_technology') == 'care_prenatal_care') ? 'selected' : '' }} >
                                        {{ __('trans.care_prenatal_care') }}
                                    </option>
                                    <option value="Voluntary_termination_pregnancy" {{ (old('purpose_technology') == 'Voluntary_termination_pregnancy') ? 'selected' : '' }} >
                                        {{ __('trans.Voluntary_termination_pregnancy') }}
                                    </option>
                                    <option value="delivery_puerperium_care" {{ (old('purpose_technology') == 'delivery_puerperium_care') ? 'selected' : '' }} >
                                        {{ __('trans.delivery_puerperium_care') }}
                                    </option>
                                    <option value="newborn_care_care" {{ (old('purpose_technology') == 'newborn_care_care') ? 'selected' : '' }} >
                                        {{ __('trans.newborn_care_care') }}
                                    </option>
                                    <option value="newborn_follow_up_care" {{ (old('purpose_technology') == 'newborn_follow_up_care') ? 'selected' : '' }} >
                                        {{ __('trans.newborn_follow_up_care') }}
                                    </option>
                                    <option value="preparation_motherhood_fatherhood" {{ (old('purpose_technology') == 'preparation_motherhood_fatherhood') ? 'selected' : '' }} >
                                        {{ __('trans.preparation_motherhood_fatherhood') }}
                                    </option>
                                    <option value="promotion_physical_activity" {{ (old('purpose_technology') == 'promotion_physical_activity') ? 'selected' : '' }} >
                                        {{ __('trans.promotion_physical_activity') }}
                                    </option>
                                    <option value="smoking_cessation_promotion" {{ (old('purpose_technology') == 'smoking_cessation_promotion') ? 'selected' : '' }} >
                                        {{ __('trans.smoking_cessation_promotion') }}
                                    </option>
                                    <option value="prevention_consumption_psychoactive_substances" {{ (old('purpose_technology') == 'prevention_consumption_psychoactive_substances') ? 'selected' : '' }} >
                                        {{ __('trans.prevention_consumption_psychoactive_substances') }}
                                    </option>
                                    <option value="promotion_healthy_eating" {{ (old('purpose_technology') == 'promotion_healthy_eating') ? 'selected' : '' }} >
                                        {{ __('trans.promotion_healthy_eating') }}
                                    </option>
                                    <option value="promotion_exercise_sexual_rights_reproductive_rights" {{ (old('purpose_technology') == 'promotion_exercise_sexual_rights_reproductive_rights') ? 'selected' : '' }} >
                                        {{ __('trans.promotion_exercise_sexual_rights_reproductive_rights') }}
                                    </option>
                                    <option value="promotion_development_skills_life" {{ (old('purpose_technology') == 'promotion_development_skills_life') ? 'selected' : '' }} >
                                        {{ __('trans.promotion_development_skills_life') }}
                                    </option>
                                    <option value="promotion_construction_coping_strategies_face_vital_events" {{ (old('purpose_technology') == 'promotion_construction_coping_strategies_face_vital_events') ? 'selected' : '' }} >
                                        {{ __('trans.promotion_construction_coping_strategies_face_vital_events') }}
                                    </option>
                                    <option value="promotion_healthy_coexistence_social_fabric" {{ (old('purpose_technology') == 'promotion_healthy_coexistence_social_fabric') ? 'selected' : '' }} >
                                        {{ __('trans.promotion_healthy_coexistence_social_fabric') }}
                                    </option>
                                    <option value="promotion_safe_environment_care_protection_environment" {{ (old('purpose_technology') == 'promotion_safe_environment_care_protection_environment') ? 'selected' : '' }} >
                                        {{ __('trans.promotion_safe_environment_care_protection_environment') }}
                                    </option>
                                    <option value="promotion_empowerment_exercise_right_health" {{ (old('purpose_technology') == 'promotion_empowerment_exercise_right_health') ? 'selected' : '' }} >
                                        {{ __('trans.promotion_empowerment_exercise_right_health') }}
                                    </option>
                                    <option value="promotion_empowerment_adoption_parenting_health_care_practices" {{ (old('purpose_technology') == 'promotion_empowerment_adoption_parenting_health_care_practices') ? 'selected' : '' }} >
                                        {{ __('trans.promotion_empowerment_adoption_parenting_health_care_practices') }}
                                    </option>
                                    <option value="promotion_agency_capacity_health_care" {{ (old('purpose_technology') == 'promotion_agency_capacity_health_care') ? 'selected' : '' }} >
                                        {{ __('trans.promotion_agency_capacity_health_care') }}
                                    </option>
                                    <option value="development_cognitive_skills" {{ (old('purpose_technology') == 'development_cognitive_skills') ? 'selected' : '' }} >
                                        {{ __('trans.development_cognitive_skills') }}
                                    </option>
                                    <option value="collective_intervention" {{ (old('purpose_technology') == 'collective_intervention') ? 'selected' : '' }} >
                                        {{ __('trans.collective_intervention') }}
                                    </option>
                                    <option value="modification_body_aesthetics_aesthetic_purposes" {{ (old('purpose_technology') == 'modification_body_aesthetics_aesthetic_purposes') ? 'selected' : '' }} >
                                        {{ __('trans.modification_body_aesthetics_aesthetic_purposes') }}
                                    </option>
                                    <option value="other" {{ (old('purpose_technology') == 'other') ? 'selected' : '' }} >
                                        {{ __('trans.other') }}
                                    </option>
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
                        <h2 class="txt_blue_bold fs-10 mt-3">{{ __('trans.disabilities') }}</h2>
                    </div>
                    <form action="" method="post" class="form" enctype="">
                        @csrf
                        <div class="row">
                            <!-- Registros anteriores desplegable -->
                            <div class="accordion accordion-flush mb-5" id="incapacidad_main_accordion"> 
                                <div class="accordion-item" style="background: #F1F1F1">
                                    <!-- Botón desplegable REGISTROS ANTERIORES -->
                                    <button class="accordion-button collapsed justify-content-between txt_dark_bold fs-4 px-5" type="button" data-bs-toggle="collapse" 
                                        data-bs-target="#incapacidad_registers" aria-expanded="false" aria-controls="incapacidad_btn_register">
                                        {{ __('trans.past_records') }}
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
                                                        {{ __('trans.date') }}: 20/03/2019 14:58
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
                                                                                <th>{{ __('trans.disability_type') }}</th>
                                                                                <th>{{ __('trans.days') }}</th>
                                                                                <th>{{ __('trans.description') }}</th>
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
                                                        {{ __('trans.date') }}: 05/08/2019 09:20
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
                                                                                <th>{{ __('trans.disability_type') }}</th>
                                                                                <th>{{ __('trans.days') }}</th>
                                                                                <th>{{ __('trans.description') }}</th>
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
                            <!-- Tipo de Incapacidad -->
                            <div class="col-md-6 mb-3">
                                <label for="disability_type" class="txt_dark_bold fs-4">{{ __('trans.disability_type') }}</label>
                                <select class="form-select form_style_input @error('disability_type') is-invalid @enderror" id="disability_type" name="disability_type">
                                    <option ></option>
                                    <option value="new" {{ (old('disability_type') == 'new') ? 'selected' : '' }}>{{ __('trans.new') }}</option>
                                    <option value="dragged_on" {{ (old('disability_type') == 'dragged_on') ? 'selected' : '' }}>{{ __('trans.dragged_on') }}</option>
                                    <option value="discharged" {{ (old('disability_type') == 'discharged') ? 'selected' : '' }}>{{ __('trans.discharged') }}</option>
                                </select>
                            </div>
                            <!-- Días -->
                            <div class="col-md-6 mb-3">
                                <label for="days" class="txt_dark_bold fs-4">{{ __('trans.days') }}</label>
                                <input type="text" class="form-control form_style_input @error('days') is-invalid @enderror"
                                id="days" name="days" required value="{{ old('days') }}">
                            </div>
                        </div>
                      
                        <div class="row">
                            <!-- Descripción -->
                            <div class="col-md-12 mb-3">
                                <label for="description" class="txt_dark_bold fs-4">{{ __('trans.description') }}</label>
                                <textarea class="form-control form_style_input form_textarea" placeholder="" id="description" style="height: 100px">
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
                        <h2 class="txt_blue_bold fs-10 mt-3">{{ __('trans.clinical_summary_epicrisis') }}</h2>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="form" enctype="">
                        @csrf
                        <div class="row">
                            <!-- Diagnóstico principal del egreso CIE-10 -->
                            <div class="col-md-12 mb-3">
                                <label for="main_discharge_diagnosis" class="txt_dark_bold fs-4">{{ __('validation.attributes.main_discharge_diagnosis') }}</label>
                                <div class="d-flex">
                                    <input type="search" class="form-control form_style_input noBorder_radius_right @error('main_discharge_diagnosis') is-invalid @enderror"
                                            id="main_discharge_diagnosis" name="main_discharge_diagnosis" value="{{ old('main_discharge_diagnosis') }}" aria-label="Search">
                                    <button class="btn form_style_input noBorder_radius_left_two" type="submit"><i data-feather="search" style="color: #1DBFD6;"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Nombre correspondiente al diagnostico principal -->
                            <div class="col-md-6 mb-3">
                                <label for="name_main_diagnosis" class="txt_dark_bold fs-4">{{ __('validation.attributes.name_main_diagnosis') }}</label>
                                <input type="text" class="form-control form_style_input @error('name_main_diagnosis') is-invalid @enderror"
                                id="name_main_diagnosis" name="name_main_diagnosis" required value="{{ old('name_main_diagnosis') }}">
                            </div>
                            <!-- Tipo de diagnostico principal del egreso -->
                            <div class="col-md-6 mb-3">
                                <label for="type_main_discharge_diagnosis" class="txt_dark_bold fs-4">{{ __('validation.attributes.type_main_discharge_diagnosis') }}</label>
                                <select class="form-select form_style_input @error('type_main_discharge_diagnosis') is-invalid @enderror" 
                                        id="type_main_discharge_diagnosis" name="type_main_discharge_diagnosis">
                                    <option ></option>
                                    <option value="diagnostic_impression" {{ (old('type_main_discharge_diagnosis') == 'diagnostic_impression') ? 'selected' : '' }}>
                                        {{ __('trans.diagnostic_impression') }}
                                    </option>
                                    <option value="confirmed_new" {{ (old('type_main_discharge_diagnosis') == 'confirmed_new') ? 'selected' : '' }}>
                                        {{ __('trans.confirmed_new') }}
                                    </option>
                                    <option value="confirmed_repeated" {{ (old('type_main_discharge_diagnosis') == 'confirmed_repeated') ? 'selected' : '' }}>
                                        {{ __('trans.confirmed_repeated') }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <!-- Diagnóstico relacionado -->
                        <div class="form_content_info_basic">
                            <h2 class="txt_blue_bold fs-7 m-0">{{ __('trans.related_diagnosis') }}</h2>
                        </div>

                        <div class="row">
                            <!-- Codigo de diagnostico confirmado -->
                            <div class="col-md-4 mb-3">
                                <label for="confirmed_diagnosis_code" class="txt_dark_bold fs-4">{{ __('validation.attributes.confirmed_diagnosis_code') }}</label>
                                <input type="text" class="form-control form_style_input @error('confirmed_diagnosis_code') is-invalid @enderror"
                                        id="confirmed_diagnosis_code" name="confirmed_diagnosis_code" value="{{ old('confirmed_diagnosis_code') }}">
                            </div>
                            <!-- Código del catalogo de enfermedades huerfanas -->
                            <div class="col-md-4 mb-3">
                                <label for="orphan_disease_catalog_code" class="txt_dark_bold fs-4">{{ __('validation.attributes.orphan_disease_catalog_code') }}</label>
                                <input type="text" class="form-control form_style_input @error('orphan_disease_catalog_code') is-invalid @enderror"
                                        id="orphan_disease_catalog_code" name="orphan_disease_catalog_code"  value="{{ old('orphan_disease_catalog_code') }}">
                            </div>
                            <!-- Nombre del diagnostico -->
                            <div class="col-md-4 mb-3">
                                <label for="diagnosis_name" class="txt_dark_bold fs-4">{{ __('validation.attributes.diagnosis_name') }}</label>
                                <input type="text" class="form-control form_style_input @error('diagnosis_name') is-invalid @enderror"
                                        id="diagnosis_name" name="diagnosis_name"  value="{{ old('diagnosis_name') }}">
                            </div>
                        </div>

                        <!-- Antecedentes -->
                        <div class="form_content_info_basic">
                            <h2 class="txt_blue_bold fs-7 m-0">{{ __('trans.background') }}</h2>
                        </div>

                        <label for="" class="txt_dark_bold fs-4 mb-4">
                            {{ __('trans.History_allergies_factor_generates_allergy_multiple_options') }}
                        </label>

                        <div class="row">
                            <!-- Checks medicamento -->
                            <div class="col-md-3 mb-3">
                                <label for="medicine" class="txt_dark_bold fs-4 mb-3">{{ __('validation.attributes.medicine') }}</label>
                                <div class="col-md-6 d-flex">
                                    <div class="col-md-6 form-check d-flex justify-content-strat mb-0">
                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                id="medicine-1" name="medicine-status" data-activation=".medicine-input"
                                                {{ old('medicine-status', 0) == 1 ? 'checked':'' }}/>
                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="medicine-1">
                                            {{ __('trans.yes') }} 
                                        </label>
                                    </div>
                                    <div class="col-md-6 form-check d-flex justify-content-start mb-0">
                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                id="medicine-0" name="medicine-status" data-activation=".medicine-input"
                                                {{ old('medicine-status', 0) == 0 ? 'checked':'' }}/>
                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="medicine-0">
                                            {{ __('trans.no') }} 
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Checks alimento -->
                            <div class="col-md-3 mb-3">
                                <label for="food" class="txt_dark_bold fs-4 mb-3">{{ __('validation.attributes.food') }}</label>
                                <div class="col-md-6 d-flex">
                                    <div class="col-md-6 form-check d-flex justify-content-strat mb-0">
                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                id="food-1" name="food-status" data-activation=".food-input"
                                                {{ old('food-status', 0) == 1 ? 'checked':'' }}/>
                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="food-1">
                                            {{ __('trans.yes') }} 
                                        </label>
                                    </div>
                                    <div class="col-md-6 form-check d-flex justify-content-start mb-0">
                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                id="food-0" name="food-status" data-activation=".food-input"
                                                {{ old('food-status', 0) == 0 ? 'checked':'' }}/>
                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="food-0">
                                            {{ __('trans.no') }} 
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Checks sustancia del ambiente -->
                            <div class="col-md-3 mb-3">
                                <label for="environment_substance" class="txt_dark_bold fs-4 mb-3">{{ __('validation.attributes.environment_substance') }}</label>
                                <div class="col-md-6 d-flex">
                                    <div class="col-md-6 form-check d-flex justify-content-strat mb-0">
                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                id="environment_substance-1" name="environment_substance-status" data-activation=".environment_substance-input"
                                                {{ old('environment_substance-status', 0) == 1 ? 'checked':'' }}/>
                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="environment_substance-1">
                                            {{ __('trans.yes') }} 
                                        </label>
                                    </div>
                                    <div class="col-md-6 form-check d-flex justify-content-start mb-0">
                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                id="environment_substance-0" name="environment_substance-status" data-activation=".environment_substance-input"
                                                {{ old('environment_substance-status', 0) == 0 ? 'checked':'' }}/>
                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="environment_substance-0">
                                            {{ __('trans.no') }} 
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Checks sustancia que entra en contacto con la piel -->
                            <div class="col-md-3 mb-3 p-0">
                                <label for="substance_comes_into_contact_skin" class="txt_dark_bold fs-4 mb-3">
                                    {{ __('validation.attributes.substance_comes_into_contact_skin') }}
                                </label>
                                <div class="col-md-6 d-flex">
                                    <div class="col-md-6 form-check d-flex justify-content-strat mb-0">
                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                id="substance_comes_into_contact_skin-1" name="substance_comes_into_contact_skin-status" 
                                                data-activation=".substance_comes_into_contact_skin-input"
                                                {{ old('substance_comes_into_contact_skin-status', 0) == 1 ? 'checked':'' }}/>
                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="substance_comes_into_contact_skin-1">
                                            {{ __('trans.yes') }} 
                                        </label>
                                    </div>
                                    <div class="col-md-6 form-check d-flex justify-content-start mb-0">
                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                id="substance_comes_into_contact_skin-0" name="substance_comes_into_contact_skin-status" 
                                                data-activation=".substance_comes_into_contact_skin-input"
                                                {{ old('substance_comes_into_contact_skin-status', 0) == 0 ? 'checked':'' }}/>
                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="substance_comes_into_contact_skin-0">
                                            {{ __('trans.no') }} 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Picadura de insectos -->
                            <div class="col-md-3 mb-3">
                                <label for="insect_bite" class="txt_dark_bold fs-4 mb-3">{{ __('validation.attributes.insect_bite') }}</label>
                                <div class="col-md-6 d-flex">
                                    <div class="col-md-6 form-check d-flex justify-content-strat mb-0">
                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                id="insect_bite-1" name="insect_bite-status" data-activation=".insect_bite-input"
                                                {{ old('insect_bite-status', 0) == 1 ? 'checked':'' }}/>
                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="insect_bite-1">
                                            {{ __('trans.yes') }} 
                                        </label>
                                    </div>
                                    <div class="col-md-6 form-check d-flex justify-content-start mb-0">
                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                id="insect_bite-0" name="insect_bite-status" data-activation=".insect_bite-input"
                                                {{ old('insect_bite-status', 0) == 0 ? 'checked':'' }}/>
                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="insect_bite-0">
                                            {{ __('trans.no') }} 
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Otro ¿Cúal? -->
                            <div class="col-md-4 mb-3">
                                <label for="other_which_one" class="txt_dark_bold fs-4 mb-3">{{ __('validation.attributes.other_which_one') }}</label>
                                <div class="col-md-10 d-flex">
                                    <div class="col-md-3 form-check d-flex justify-content-strat mb-0">
                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                id="other_which_one-1" name="other_which_one-status" data-activation=".other_which_one-input"
                                                {{ old('other_which_one-status', 0) == 1 ? 'checked':'' }}/>
                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="other_which_one-1">
                                            {{ __('trans.yes') }} 
                                        </label>
                                    </div>
                                    <div class="col-md-2 form-check d-flex justify-content-start mb-0" style="padding-left: 17px">
                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                id="other_which_one-0" name="other_which_one-status" data-activation=".other_which_one-input"
                                                {{ old('other_which_one-status', 0) == 0 ? 'checked':'' }}/>
                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="other_which_one-0">
                                            {{ __('trans.no') }} 
                                        </label>
                                    </div>
                                    <div class="col-md-12 form-check d-flex justify-content-start mb-0 p-0">
                                        <input type="text" class="form-control form_style_input mt-0 @error('diagnosis_name') is-invalid @enderror"
                                        id="diagnosis_name" name="diagnosis_name"  value="{{ old('diagnosis_name') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Nombre del diagnostico -->
                        <div class="col-md-4 mb-3">
                            <label for="allergen_name" class="txt_dark_bold fs-4">{{ __('validation.attributes.allergen_name') }}</label>
                            <input type="text" class="form-control form_style_input @error('allergen_name') is-invalid @enderror"
                                    id="allergen_name" name="allergen_name"  value="{{ old('allergen_name') }}">
                        </div>

                        <!-- Antecedentes de salud familiar IE-10 -->
                        <div class="form_content_info_basic">
                            <h2 class="txt_blue_bold fs-7 mt-2">{{ __('trans.family_health_history') }}</h2>
                        </div>

                        <label for="" class="txt_dark_bold fs-4 mb-4">{{ __('trans.relationship') }}</label>

                        <div class="row mb-3">
                            <!-- Checks padres -->
                            <div class="col-md-3 mb-3">
                                <label for="parents" class="txt_dark_bold fs-4 mb-3">{{ __('validation.attributes.parents') }}</label>
                                <div class="col-md-6 d-flex">
                                    <div class="col-md-6 form-check d-flex justify-content-strat mb-0">
                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                id="parents-1" name="parents-status" data-activation=".parents-input"
                                                {{ old('parents-status', 0) == 1 ? 'checked':'' }}/>
                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="parents-1">
                                            {{ __('trans.yes') }} 
                                        </label>
                                    </div>
                                    <div class="col-md-6 form-check d-flex justify-content-start mb-0">
                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                id="parents-0" name="parents-status" data-activation=".parents-input"
                                                {{ old('parents-status', 0) == 0 ? 'checked':'' }}/>
                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="parents-0">
                                            {{ __('trans.no') }} 
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Checks hermanos -->
                            <div class="col-md-3 mb-3">
                                <label for="siblings" class="txt_dark_bold fs-4 mb-3">{{ __('validation.attributes.siblings') }}</label>
                                <div class="col-md-6 d-flex">
                                    <div class="col-md-6 form-check d-flex justify-content-strat mb-0">
                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                id="siblings-1" name="siblings-status" data-activation=".siblings-input"
                                                {{ old('siblings-status', 0) == 1 ? 'checked':'' }}/>
                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="siblings-1">
                                            {{ __('trans.yes') }} 
                                        </label>
                                    </div>
                                    <div class="col-md-6 form-check d-flex justify-content-start mb-0">
                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                id="siblings-0" name="siblings-status" data-activation=".siblings-input"
                                                {{ old('siblings-status', 0) == 0 ? 'checked':'' }}/>
                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="siblings-0">
                                            {{ __('trans.no') }} 
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Checks tíos -->
                            <div class="col-md-3 mb-3">
                                <label for="uncles" class="txt_dark_bold fs-4 mb-3">{{ __('validation.attributes.uncles') }}</label>
                                <div class="col-md-6 d-flex">
                                    <div class="col-md-6 form-check d-flex justify-content-strat mb-0">
                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                id="uncles-1" name="uncles-status" data-activation=".uncles-input"
                                                {{ old('uncles-status', 0) == 1 ? 'checked':'' }}/>
                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="uncles-1">
                                            {{ __('trans.yes') }} 
                                        </label>
                                    </div>
                                    <div class="col-md-6 form-check d-flex justify-content-start mb-0">
                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                id="uncles-0" name="uncles-status" data-activation=".uncles-input"
                                                {{ old('uncles-status', 0) == 0 ? 'checked':'' }}/>
                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="uncles-0">
                                            {{ __('trans.no') }} 
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Checks abuelos -->
                            <div class="col-md-3 mb-3 p-0">
                                <label for="grandparents" class="txt_dark_bold fs-4 mb-3">
                                    {{ __('validation.attributes.grandparents') }}
                                </label>
                                <div class="col-md-6 d-flex">
                                    <div class="col-md-6 form-check d-flex justify-content-strat mb-0">
                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                id="grandparents-1" name="grandparents-status" 
                                                data-activation=".grandparents-input"
                                                {{ old('grandparents-status', 0) == 1 ? 'checked':'' }}/>
                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="grandparents-1">
                                            {{ __('trans.yes') }} 
                                        </label>
                                    </div>
                                    <div class="col-md-6 form-check d-flex justify-content-start mb-0">
                                        <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                id="grandparents-0" name="grandparents-status" 
                                                data-activation=".grandparents-input"
                                                {{ old('grandparents-status', 0) == 0 ? 'checked':'' }}/>
                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="grandparents-0">
                                            {{ __('trans.no') }} 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Comorbilidades -->
                            <div class="col-md-6 mb-3">
                                <label for="comorbidities" class="txt_dark_bold fs-4">{{ __('validation.attributes.comorbidities') }}</label>
                                <textarea class="form-control form_style_input form_textarea" placeholder="" id="comorbidities" style="height: 100px"></textarea>
                            </div>

                            <!-- Procedimiento principal del egreso -->
                            <div class="col-md-6 mb-3">
                                <label for="main_egress_procedure" class="txt_dark_bold fs-4">{{ __('validation.attributes.main_egress_procedure') }}</label>
                                <textarea class="form-control form_style_input form_textarea" placeholder="" id="main_egress_procedure" style="height: 100px"></textarea>
                            </div>
                        </div>

                        <!-- Antecedentes de salud familiar IE-10 -->
                        <div class="form_content_info_basic">
                            <h2 class="txt_blue_bold fs-7 mt-0">{{ __('trans.diagnosis_complication') }}</h2>
                        </div>

                        <div class="row">
                            <!-- Código de la complicación -->
                            <div class="col-md-6 mb-3">
                                <label for="complication_code" class="txt_dark_bold fs-4">{{ __('validation.attributes.complication_code') }}</label>
                                <input type="text" class="form-control form_style_input @error('complication_code') is-invalid @enderror"
                                        id="complication_code" name="complication_code" value="{{ old('complication_code') }}">
                            </div>

                            <!-- Código de la complicación (enfermedades huérfanas) -->
                            <div class="col-md-6 mb-3">
                                <label for="complication_code_orphan_diseases" class="txt_dark_bold fs-4">
                                    {{ __('validation.attributes.complication_code_orphan_diseases') }}
                                </label>
                                <input type="text" class="form-control form_style_input @error('complication_code_orphan_diseases') is-invalid @enderror"
                                        id="complication_code_orphan_diseases" name="complication_code_orphan_diseases" 
                                        value="{{ old('complication_code_orphan_diseases') }}">
                            </div>

                            <!-- Nombre del diagnóstico de la complicación -->
                            <div class="col-md-12 mb-3">
                                <label for="complication_diagnosis_name" class="txt_dark_bold fs-4">{{ __('validation.attributes.complication_diagnosis_name') }}</label>
                                <input type="text" class="form-control form_style_input @error('complication_diagnosis_name') is-invalid @enderror"
                                        id="complication_diagnosis_name" name="complication_diagnosis_name"  value="{{ old('complication_diagnosis_name') }}">
                            </div>

                            <!-- Procedimientos realizados -->
                            <div class="col-md-12 mb-3">
                                <label for="procedures_performed" class="txt_dark_bold fs-4">{{ __('validation.attributes.procedures_performed') }}</label>
                                <input type="text" class="form-control form_style_input @error('procedures_performed') is-invalid @enderror"
                                        id="procedures_performed" name="procedures_performed"  value="{{ old('procedures_performed') }}">
                            </div>
                        </div>

                        <!-- Resultado de evaluación de valoración clínica o del resultado de salud -->
                        <div class="form_content_info_basic">
                            <h2 class="txt_blue_bold fs-7 mt-0">{{ __('trans.Evaluation_result_clinical_assessment_health_outcome') }}</h2>
                        </div>

                        <div class="row">
                            <!-- Fecha del resultado de la valoración clínica -->
                            <div class="col-md-4 mb-3">
                                <label for="date_result_clinical_assessment" class="txt_dark_bold fs-4">
                                    {{ __('validation.attributes.date_result_clinical_assessment') }}
                                </label>
                                <input type="date" class="form-control form_style_input @error('date_result_clinical_assessment') is-invalid @enderror"
                                        id="date_result_clinical_assessment" name="date_result_clinical_assessment" 
                                        value="{{ old('date_result_clinical_assessment') }}">
                            </div>

                            <!-- Identificación del instrumento para medir el resultado observado -->
                            <div class="col-md-8 mb-3">
                                <label for="identification_instrument_measure" class="txt_dark_bold fs-4">
                                    {{ __('validation.attributes.identification_instrument_measure') }}
                                </label>
                                <input type="text" class="form-control form_style_input @error('identification_instrument_measure') is-invalid @enderror"
                                        id="identification_instrument_measure" name="identification_instrument_measure" 
                                        value="{{ old('identification_instrument_measure') }}">
                            </div>

                            <!-- Código del parámetro del resultado observado  -->
                            <div class="col-md-6 mb-3">
                                <label for="observed_result_parameter_code" class="txt_dark_bold fs-4">
                                    {{ __('validation.attributes.observed_result_parameter_code') }}
                                </label>
                                <input type="text" class="form-control form_style_input @error('observed_result_parameter_code') is-invalid @enderror"
                                        id="observed_result_parameter_code" name="observed_result_parameter_code"  
                                        value="{{ old('observed_result_parameter_code') }}">
                            </div>

                            <!-- Valor del resultado observado de acuerdo con el catalogo de resultados -->
                            <div class="col-md-6 mb-3">
                                <label for="value_result_observed_catalog" class="txt_dark_bold fs-4">
                                    {{ __('validation.attributes.value_result_observed_catalog') }}
                                </label>
                                <input type="text" class="form-control form_style_input @error('value_result_observed_catalog') is-invalid @enderror"
                                        id="value_result_observed_catalog" name="value_result_observed_catalog"  
                                        value="{{ old('value_result_observed_catalog') }}">
                            </div>
                        </div>

                        <!-- Pautas de alta: listado de medicamentos conciliados, dieta turno de control ambulatorio, 
                            signos de alarma, tratamiento y actividades que puede realizar -->
                        <div class="form_content_info_basic">
                            <h2 class="txt_blue_bold fs-7 mt-0">{{ __('trans.discharge_guidelines') }}</h2>
                        </div>

                        <div class="row">
                            <!-- Condición y destino del usuario al egreso -->
                            <div class="col-md-12 mb-3">
                                <label for="condition_destination_user_discharge" class="txt_dark_bold fs-4">
                                    {{ __('validation.attributes.condition_destination_user_discharge') }}
                                </label>
                                <input type="text" class="form-control form_style_input @error('condition_destination_user_discharge') is-invalid @enderror"
                                        id="condition_destination_user_discharge" name="condition_destination_user_discharge"  
                                        value="{{ old('condition_destination_user_discharge') }}">
                            </div>
                        </div>

                        <label for="" class="txt_dark_bold fs-4 mb-4">{{ __('trans.identifier_determine_condition_patient') }}</label>

                        <div class="row mb-3">
                            <!-- Checks Paciente con destino a su domicilio -->
                            <div class="col-md-3 mb-3 pe-0">
                                <div class="form-check d-flex justify-content-strat mb-0">
                                    <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                            id="patient_going_home" name="patient_going_home" data-activation=".patient_going_home"
                                            {{ old('patient_going_home', 0) == 1 ? 'checked':'' }}/>
                                    <label class="form-check-label txt_dark_bold fs-5 ps-2" for="patient_going_home">
                                         {{ __('validation.attributes.patient_going_home') }} 
                                    </label>
                                </div>
                            </div>

                             <!-- Checks Paciente muerto -->
                            <div class="col-md-2 mb-3 pe-0">
                                <div class="form-check d-flex justify-content-strat mb-0">
                                    <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                            id="dead_patient" name="dead_patient" data-activation=".dead_patient"
                                            {{ old('dead_patient', 0) == 1 ? 'checked':'' }}/>
                                    <label class="form-check-label txt_dark_bold fs-5 ps-2" for="dead_patient">
                                         {{ __('validation.attributes.dead_patient') }} 
                                    </label>
                                </div>
                            </div>

                             <!-- Checks Paciente hospitalizado derivado de urgencias -->
                            <div class="col-md-4 mb-3 pe-0">
                                <div class="form-check d-flex justify-content-strat mb-0">
                                    <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                            id="hospitalized_patient" name="hospitalized_patient" data-activation=".hospitalized_patient"
                                            {{ old('hospitalized_patient', 0) == 1 ? 'checked':'' }}/>
                                    <label class="form-check-label txt_dark_bold fs-5 ps-2" for="hospitalized_patient">
                                         {{ __('validation.attributes.hospitalized_patient') }} 
                                    </label>
                                </div>
                            </div>

                             <!-- Checks Referido a otra institución -->
                            <div class="col-md-3 mb-3 pe-0">
                                <div class="form-check d-flex justify-content-strat mb-0">
                                    <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                            id="referred_another_institution" name="referred_another_institution" data-activation=".referred_another_institution"
                                            {{ old('referred_another_institution', 0) == 1 ? 'checked':'' }}/>
                                    <label class="form-check-label txt_dark_bold fs-5 ps-2" for="referred_another_institution">
                                         {{ __('validation.attributes.referred_another_institution') }} 
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <!-- Checks Contra referido a otra institución -->
                            <div class="col-md-4 mb-3 pe-0">
                                <div class="form-check d-flex justify-content-center mb-0">
                                    <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                            id="against_referred_another_institution" name="against_referred_another_institution" 
                                            data-activation=".against_referred_another_institution"
                                            {{ old('against_referred_another_institution', 0) == 1 ? 'checked':'' }}/>
                                    <label class="form-check-label txt_dark_bold fs-5 ps-2" for="against_referred_another_institution">
                                         {{ __('validation.attributes.against_referred_another_institution') }} 
                                    </label>
                                </div>
                            </div>

                            <!-- Checks Derivado o referido a hospitalización domiciliaria -->
                            <div class="col-md-5 mb-3 pe-0">
                                <div class="form-check d-flex justify-content-center mb-0">
                                    <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                            id="referred_referred_home_hospitalization" name="referred_referred_home_hospitalization" 
                                            data-activation=".referred_referred_home_hospitalization"
                                            {{ old('referred_referred_home_hospitalization', 0) == 1 ? 'checked':'' }}/>
                                    <label class="form-check-label txt_dark_bold fs-5 ps-2" for="referred_referred_home_hospitalization">
                                         {{ __('validation.attributes.referred_referred_home_hospitalization') }} 
                                    </label>
                                </div>
                            </div>

                            <!-- Checks Canalizado a servicio social -->
                            <div class="col-md-3 mb-3 pe-0">
                                <div class="form-check d-flex justify-content-center mb-0">
                                    <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                            id="channeled_social_service" name="channeled_social_service" data-activation=".channeled_social_service"
                                            {{ old('channeled_social_service', 0) == 1 ? 'checked':'' }}/>
                                    <label class="form-check-label txt_dark_bold fs-5 ps-2" for="channeled_social_service">
                                         {{ __('validation.attributes.channeled_social_service') }} 
                                    </label>
                                </div>
                            </div>
                        </div>

                            <!-- Diagnóstico de la causa de muerte -->
                            <div class="form_content_info_basic">
                            <h2 class="txt_blue_bold fs-7 mt-0">{{ __('trans.diagnosis_cause_death') }}</h2>
                        </div>

                        <div class="row">
                            <!-- Codigo de la causa básica de muerte  -->
                            <div class="col-md-6 mb-3">
                                <label for="basic_cause_death_code" class="txt_dark_bold fs-4">
                                    {{ __('validation.attributes.basic_cause_death_code') }}
                                </label>
                                <input type="text" class="form-control form_style_input @error('basic_cause_death_code') is-invalid @enderror"
                                        id="basic_cause_death_code" name="basic_cause_death_code"  
                                        value="{{ old('basic_cause_death_code') }}">
                            </div>

                            <!-- Código del diagnóstico confirmado -->
                            <div class="col-md-6 mb-3">
                                <label for="confirmed_diagnosis_code" class="txt_dark_bold fs-4">
                                    {{ __('validation.attributes.confirmed_diagnosis_code') }}
                                </label>
                                <input type="text" class="form-control form_style_input @error('confirmed_diagnosis_code') is-invalid @enderror"
                                        id="confirmed_diagnosis_code" name="confirmed_diagnosis_code"  
                                        value="{{ old('confirmed_diagnosis_code') }}">
                            </div>

                            <!-- Código del catálogo de enfermedades huérfanas  -->
                            <div class="col-md-6 mb-3">
                                <label for="orphan_disease_catalog_code" class="txt_dark_bold fs-4">
                                    {{ __('validation.attributes.orphan_disease_catalog_code') }}
                                </label>
                                <input type="text" class="form-control form_style_input @error('orphan_disease_catalog_code') is-invalid @enderror"
                                        id="orphan_disease_catalog_code" name="orphan_disease_catalog_code"  
                                        value="{{ old('orphan_disease_catalog_code') }}">
                            </div>

                            <!-- Nombre correspondiente al diagnostico de la causa básica de muerte -->
                            <div class="col-md-6 mb-3">
                                <label for="name_diagnosis_underlying_cause_death" class="txt_dark_bold fs-4">
                                    {{ __('validation.attributes.name_diagnosis_underlying_cause_death') }}
                                </label>
                                <input type="text" class="form-control form_style_input @error('name_diagnosis_underlying_cause_death') is-invalid @enderror"
                                        id="name_diagnosis_underlying_cause_death" name="name_diagnosis_underlying_cause_death"  
                                        value="{{ old('name_diagnosis_underlying_cause_death') }}">
                            </div>
                        </div>

                        <div class="row">
                            <!-- Fecha y hora de la finalización de la atención -->
                            <div class="col-md-4 mb-3">
                                <label for="end_date_time_care" class="txt_dark_bold fs-4">
                                    {{ __('validation.attributes.end_date_time_care') }}
                                </label>
                                <input type="date" class="form-control form_style_input @error('end_date_time_care') is-invalid @enderror"
                                        id="end_date_time_care" name="end_date_time_care" 
                                        value="{{ old('end_date_time_care') }}">
                            </div>

                            <!-- Código del prestador de servicio de salud donde se refiere caso de muerte SGSSS -->
                            <div class="col-md-8 mb-3">
                                <label for="code_health_service_provider_case_death" class="txt_dark_bold fs-4">
                                    {{ __('validation.attributes.code_health_service_provider_case_death') }}
                                </label>
                                <input type="text" class="form-control form_style_input @error('code_health_service_provider_case_death') is-invalid @enderror"
                                        id="code_health_service_provider_case_death" name="code_health_service_provider_case_death" 
                                        value="{{ old('code_health_service_provider_case_death') }}">
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

    <!-- Modal   Vacunación -->
    <div class="modal fade" id="vertical-center-scroll-modal_vacun" tabindex="-1" aria-labelledby="vertical-center-modal" style="display: none;" aria-hidden="true">   
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable hc_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="d-flex align-self-start">
                        <h2 class="txt_blue_bold fs-10 mt-3">{{ __('trans.Vaccination') }}</h2>
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