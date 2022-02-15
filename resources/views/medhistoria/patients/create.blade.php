@extends('medhistoria.layouts.app')
@section('title', __('trans.patients'))

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/DataTables/css/jquery.dataTables.min.css') }}"/>
@endsection

@section('content')
    <!-- Bread crumb and right sidebar toggle -->
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h2 class="text-themecolor mb-0" style="font-weight: bold">{{ __('trans.patients') }}</h2>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.patients.index') }}">{{ __('trans.patients') }}</a>
                </li>
                <li class="breadcrumb-item ">{{ __('trans.add-patients') }}</li>
            </ol>
        </div>
        <div class="col-md-7 col-12 align-self-center d-none d-md-block">

        </div>
    </div>
    <!-- End Bread crumb and right sidebar toggle -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card  form_pat_pad_card">
                    <div class="mb-4">
                        <h2 class="txt_blue_bold">Datos del Paciente</h2>
                    </div>

                    <div class="card-body p-0">
                        <form action="{{ route('tenant.patients.create') }}" method="post" class="form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <!-- User Image -->
                                <div class="row">
                                    <div class="col-md-4 img_user_form"> <!-- User image -->
                                        <img id="" src="">
                                        <input type="file" name="logo"  id="seleccionArchivos" accept="image/png, image/jpeg" value="">
                                    </div>
                                </div>
                                <!-- <section class="d-flex justify-content-center">
                                    <img src="{{ asset('img/medhistoria') }}/users/1.jpg" class="rounded-circle form_user_img" width="200">
                                </section> -->
                                <!-- User Basic Information -->
                                <div class="form_content_info_basic">
                                    <i data-feather="plus-circle" class="txt_blue_bold"></i>
                                    <h2 class="txt_blue_bold m-0 ps-2">{{ __('trans.basic-information') }}</h2>
                                </div>
                                <!-- Basic Information -->
                                <div class="row">
                                    <div class="col-md-3 mb-3"><!-- ok -->
                                        <label for="name_first" class="txt_dark_bold fs-4">{{ __('validation.attributes.name_first') }}</label>
                                        <input type="text" class="form-control form_style_input @error('name_first') is-invalid @enderror" 
                                        id="name_first" name="name_first" required value="{{ old('name_first') }}">
                                    </div>
                                    <div class="col-md-3 mb-3"><!-- ok -->
                                        <label for="name_second" class="txt_dark_bold fs-4">{{ __('validation.attributes.name_second') }}</label>
                                        <input type="text" class="form-control form_style_input @error('name_second') is-invalid @enderror"
                                        id="name_second" name="name_second"  value="{{ old('name_second') }}">
                                    </div>
                                    <div class="col-md-3 mb-3"><!-- ok -->
                                        <label for="lastname_first" class="txt_dark_bold fs-4">{{ __('validation.attributes.lastname_first') }}</label>
                                        <input type="text" class="form-control form_style_input @error('lastname_first') is-invalid @enderror"
                                        id="lastname_first" name="lastname_first" required value="{{ old('lastname_first') }}">
                                    </div>
                                    <div class="col-md-3 mb-3"><!-- ok -->
                                        <label for="lastname_second" class="txt_dark_bold fs-4">{{ __('validation.attributes.lastname_second') }}</label>
                                        <input type="text" class="form-control form_style_input @error('lastname_second') is-invalid @enderror"
                                        id="lastname_second" name="lastname_second" required value="{{ old('lastname_second') }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3"><!-- ok -->
                                        <label for="type_card" class="txt_dark_bold fs-4">{{ __('validation.attributes.document-type') }}</label>
                                        <select class="form-select form_style_input" id="type_card" name="type_card" required>
                                            <option ></option>
                                            @foreach($card_types as $item)
                                                <option value="{{ $item->id }}" {{ old('type_card') == $item->id ? 'selected' : '' }}>{{ $item->name_short }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- ok -->
                                        <label for="id_card" class="txt_dark_bold fs-4">{{ __('validation.attributes.document-number') }}</label>
                                        <input type="text" class="form-control form_style_input @error('id_card') is-invalid @enderror"
                                        id="id_card" name="id_card" required value="{{ old('id_card') }}">
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- ok -->
                                        <label for="date-birth" class="txt_dark_bold fs-4">{{ __('validation.attributes.date-birth') }}</label>
                                        <input type="date" class="form-control form_style_input @error('date-birth') is-invalid @enderror"
                                        id="date-birth" name="date-birth" value="{{ old('date-birth') }}">
                                    </div>
                                </div>

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
                                        <label for="gender" class="txt_dark_bold fs-4">{{ __('validation.attributes.biological-sex') }}</label>
                                        <select name="gender" id="gender" class="form-select form_style_input @error('gender') is-invalid @enderror">
                                            <option></option>
                                            <option value="male" {{ old('gender') == 'male' ? 'selected' : ''}}>{{ __('trans.male') }}</option>
                                            <option value="feminine" {{ old('gender') == 'feminine' ? 'selected' : ''}}>{{ __('trans.feminine') }}</option>
                                            <option value="intersex" {{ old('gender') == 'intersex' ? 'selected' : ''}}>{{ __('trans.intersex') }}</option>
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
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3"><!-- ok -->
                                        <div class="row">
                                            <div class="col-md-9">
                                                <label for="country_birth" class="txt_dark_bold fs-4">{{ __('validation.attributes.country_birth') }}</label>
                                                <input type="text" class="form-control form_style_input @error('country_birth') is-invalid @enderror country"
                                                id="country_birth" name="country_birth" value="{{ old('country_birth') }}" data-code="#code_country_birth">
                                            </div>

                                            <div class="col-md-3">
                                                <label for="code_country_birth" class="txt_dark_bold fs-4">{{ __('validation.attributes.code') }}</label>
                                                <input type="text" class="form-control form_style_input @error('code_country_birth') is-invalid @enderror"
                                                id="code_country_birth" name="code_country_birth" value="{{ old('code_country_birth') }}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- ok -->
                                        <div class="row">
                                            <div class="col-md-9">
                                                <label for="department_birth" class="txt_dark_bold fs-4">{{ __('validation.attributes.department_birth') }}</label>
                                                <input type="text" class="form-control form_style_input @error('department_birth') is-invalid @enderror department"
                                                id="department_birth" name="department_birth" value="{{ old('department_birth') }}" data-code="#code_department_birth" data-search="#country_birth">
                                            </div>

                                            <div class="col-md-3">
                                                <label for="code_department_birth" class="txt_dark_bold fs-4">{{ __('validation.attributes.code') }}</label>
                                                <input type="text" class="form-control form_style_input @error('code_department_birth') is-invalid @enderror"
                                                id="code_department_birth" name="code_department_birth" value="{{ old('code_department_birth') }}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- ok -->
                                        <div class="row">
                                            <div class="col-md-9">
                                                <label for="city_birth" class="txt_dark_bold fs-4">{{ __('validation.attributes.city​-municipality-birth') }}</label>
                                                <input type="text" class="form-control form_style_input @error('city_birth') is-invalid @enderror city"
                                                id="cityt_birth" name="city_birth" value="{{ old('city_birth') }}" data-code="#code_city_birth" data-search="#department_birth">
                                            </div>

                                            <div class="col-md-3">
                                                <label for="code_city_birth" class="txt_dark_bold fs-4">{{ __('validation.attributes.code') }}</label>
                                                <input type="text" class="form-control form_style_input @error('code_city_birth') is-invalid @enderror"
                                                id="code_city_birth" name="code_city_birth" value="{{ old('code_city_birth') }}" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="dropdown-divider my-4"></div> <!-- Linea de división del formulario -->

                                <div class="row">
                                    <div class="col-md-4 mb-3"><!-- ok -->
                                        <label for="blood_group" class="txt_dark_bold fs-4">{{ __('validation.attributes.blood-type') }}</label>
                                        <select id="blood_group" name="blood_group" class="form-select form_style_input @error('blood_group') is-invalid @enderror">
                                            <option></option>
                                            <option value="O+" {{ old('blood_group') == 'O+' ? 'selected' : ''}}>O+</option>
                                            <option value="O-" {{ old('blood_group') == 'O-' ? 'selected' : ''}}>O-</option>
                                            <option value="A+" {{ old('blood_group') == 'A+' ? 'selected' : ''}}>A+</option>
                                            <option value="A-" {{ old('blood_group') == 'A-' ? 'selected' : ''}}>A-</option>
                                            <option value="B+" {{ old('blood_group') == 'B+' ? 'selected' : ''}}>B+</option>
                                            <option value="B-" {{ old('blood_group') == 'B-' ? 'selected' : ''}}>B-</option>
                                            <option value="AB+" {{ old('blood_group') == 'AB+' ? 'selected' : ''}}>AB+</option>
                                            <option value="AB-" {{ old('blood_group') == 'AB-' ? 'selected' : ''}}>AB-</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- ok -->
                                        <div class="row">
                                            <div class="col-md-9">
                                                <label for="medical-entity" class="txt_dark_bold fs-4">{{ __('validation.attributes.medical-entity') }}</label>
                                                <input type="text" class="form-control form_style_input @error('medical-entity') is-invalid @enderror sgsss" data-code="#code_entity"
                                                id="medical-entity" name="medical-entity" required value="{{ old('medical-entity') }}">
                                            </div>

                                            <div class="col-md-3">
                                                <label for="code_entity" class="txt_dark_bold fs-4">{{ __('validation.attributes.code') }}</label>
                                                <input type="text" class="form-control form_style_input @error('code_entity') is-invalid @enderror"
                                                id="code_entity" name="code_entity" required value="{{ old('code_entity') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- ok -->
                                        <label for="contributory-regime" class="txt_dark_bold fs-4">{{ __('validation.attributes.contributory-regime') }}</label>
                                        <select name="contributory-regime" id="contributory-regime" class="form-select form_style_input @error('contributory-regime') is-invalid @enderror">
                                            <option></option>
                                            <option value="Cotizante" {{ (old('contributory-regime') == 'Cotizante') ? 'selected' : '' }} >Cotizante</option>
                                            <option value="Beneficiario" {{ (old('contributory-regime') == 'Beneficiario') ? 'selected' : '' }} >Beneficiario</option>
                                            <option value="Subsidiado" {{ (old('contributory-regime') == 'Subsidiado') ? 'selected' : '' }} >Subsidiado</option>
                                            <option value="Otro" {{ (old('contributory-regime') == 'Otro') ? 'selected' : '' }} >Otro</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3"><!-- ok -->
                                        <div class="row">
                                            <label for="opposition_organ_donation" class="txt_dark_bold fs-4">{{ __('validation.attributes.opposition-to-the-legal-presumption-of-donation') }}</label>
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
                                                <input type="text" class="form-control form_style_input @error('opposition_organ_donation') is-invalid @enderror"
                                                id="opposition_organ_donation" name="opposition_organ_donation" required value="{{ old('opposition_organ_donation') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- ok -->
                                        <div class="row">
                                            <label for="advance_directive" class="txt_dark_bold fs-4">{{ __('validation.attributes.advance-directive-document') }}</label>
                                            <div class="col-md-4 d-flex align-items-end px-0">
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
                                            <input type="text" class="form-control form_style_input @error('advance_directive') is-invalid @enderror"
                                            id="advance_directive" name="advance_directive" required value="{{ old('advance_directive') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- ok -->
                                        <label for="code_advance_directive" class="txt_dark_bold fs-4">{{ __('validation.attributes.provider-code-where-the-document-is-located') }}</label>
                                        <input type="text" class="form-control form_style_input @error('code_advance_directive') is-invalid @enderror"
                                        id="code_advance_directive" name="code_advance_directive" required value="{{ old('code_advance_directive') }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3"><!-- ok -->
                                        <label for="impairment" class="txt_dark_bold fs-4">{{ __('validation.attributes.disability-category') }}</label>
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

                                <!-- Contac Information -->
                                <div class="form_content_info_basic">
                                    <i data-feather="phone-forwarded" class="txt_blue_bold"></i>
                                    <h2 class="txt_blue_bold m-0 ps-2">{{ __('trans.contac-information') }}</h2>
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
                                    <div class="col-md-3 mb-3"><!-- Ok -->
                                        <label for="locality" class="txt_dark_bold fs-4">{{ __('validation.attributes.locality-of-residence') }}</label>
                                        <input type="text" class="form-control form_style_input @error('locality') is-invalid @enderror"
                                        id="locality" name="locality" value="{{ old('locality') }}">
                                    </div>
                                    <div class="col-md-3 mb-3"><!-- Ok -->
                                        <label for="neighborhood" class="txt_dark_bold fs-4">{{ __('validation.attributes.neighborhood-of-residence') }}</label>
                                        <input type="text" class="form-control form_style_input @error('neighborhood') is-invalid @enderror"
                                        id="neighborhood" name="neighborhood" value="{{ old('neighborhood') }}">
                                    </div>
                                    <div class="col-md-3 mb-3"><!-- Ok -->
                                        <label for="postcode" class="txt_dark_bold fs-4">{{ __('validation.attributes.residence-zip-code') }}</label>
                                        <input type="text" class="form-control form_style_input @error('postcode') is-invalid @enderror"
                                        id="postcode" name="postcode" value="{{ old('postcode') }}">
                                    </div>
                                    <div class="col-md-3 mb-3"><!-- Ok -->
                                        <label for="stratum" class="txt_dark_bold fs-4">{{ __('validation.attributes.stratum') }}</label>
                                        <input type="text" class="form-control form_style_input @error('stratum') is-invalid @enderror"
                                        id="stratum" name="stratum" value="{{ old('stratum') }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3"><!-- Ok -->
                                        <label for="address" class="txt_dark_bold fs-4">{{ __('validation.attributes.address') }}</label>
                                        <input type="text" class="form-control form_style_input @error('address') is-invalid @enderror"
                                        id="address" name="address" value="{{ old('address') }}">
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- Ok -->
                                        <label for="uptown" class="txt_dark_bold fs-4">{{ __('validation.attributes.territorial-zone') }}</label>
                                        <select name="uptown" id="uptown" class="form-select form_style_input @error('uptown') is-invalid @enderror">
                                            <option ></option>
                                            <option value="urban" {{ (old('uptown') == 'urban') ? 'selected' : '' }} >{{ __('trans.urban') }}</option>
                                            <option value="rural" {{ (old('uptown') == 'rural') ? 'selected' : '' }} >{{ __('trans.rural') }}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- Ok -->
                                        <label for="phone" class="txt_dark_bold fs-4">{{ __('validation.attributes.phone') }}</label>
                                        <input type="number" class="form-control form_style_input @error('phone') is-invalid @enderror"
                                        id="phone" name="phone" required value="{{ old('phone') }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3 pe-5"><!-- Ok -->
                                        <label for="cellphone" class="txt_dark_bold fs-4">{{ __('validation.attributes.mobile') }}</label>
                                        <input type="number" class="form-control form_style_input @error('cellphone') is-invalid @enderror"
                                        id="cellphone" name="cellphone" required value="{{ old('cellphone') }}">
                                    </div>
                                    <div class="col-md-6 mb-3 ps-5"><!-- Ok -->
                                        <label for="email" class="txt_dark_bold fs-4">{{ __('validation.attributes.email') }}</label>
                                        <input type="email" class="form-control form_style_input @error('email') is-invalid @enderror"
                                        id="email" name="email" required value="{{ old('email') }}">
                                    </div>
                                </div>

                                <!-- Demographic Information -->
                                <div class="form_content_info_basic">
                                    <i data-feather="globe" class="txt_blue_bold"></i>
                                    <h2 class="txt_blue_bold m-0 ps-2">{{ __('trans.demographic-information') }}</h2>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3"><!-- Ok -->
                                        <label for="ethnicity" class="txt_dark_bold fs-4">{{ __('validation.attributes.ethnicity') }}</label>
                                        <input type="text" class="form-control form_style_input @error('ethnicity') is-invalid @enderror ethnicity"
                                        id="ethnicity" name="ethnicity" value="{{ old('ethnicity') }}">
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- Ok -->
                                        <label for="ethnic_community" class="txt_dark_bold fs-4">{{ __('validation.attributes.ethnic_community') }}</label>
                                        <input type="text" class="form-control form_style_input @error('ethnic_community') is-invalid @enderror ethnic-"
                                        id="ethnic_community" name="ethnic_community" value="{{ old('ethnic_community') }}">
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- Ok -->
                                        <label for="occupation" class="txt_dark_bold fs-4">{{ __('validation.attributes.occupation') }}</label>
                                        <input type="text" class="form-control form_style_input @error('occupation') is-invalid @enderror occupation"
                                        id="occupation" name="occupation" value="{{ old('occupation') }}" data-code="#code_occupation">
                                    </div>
                                </div>

                                <!-- Demographip Information -->
                                <div class="form_content_info_basic">
                                    <i data-feather="file-text" class="txt_blue_bold"></i>
                                    <h2 class="txt_blue_bold m-0 ps-2">{{ __('trans.I-accept-terms-and-conditions') }}</h2>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <textarea class="form-control form_style_input form_textarea" placeholder="" id="" style="height: 100px">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>
                                    </div>
                                    <!-- Check box de aceptación -->
                                    <div class="col-md-4 form-check d-flex align-items-center ms-3 mb-0">
                                        <input type="checkbox" class="form-check-input form_checkBox" id="checkbox1">
                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="checkbox1">Acepta Términos y Condiciones</label>
                                    </div>
                                    <div class="col-md-4 form-check d-flex align-items-center ms-3 mb-0">
                                        <input type="checkbox" class="form-check-input form_checkBox" id="checkbox1">
                                        <label class="form-check-label txt_dark_bold fs-5 ps-2" for="checkbox1">Acepta envío de comunicaciones</label>
                                    </div>
                                </div>

                                <!-- Save Button -->
                                <div class="text-center mt-5 mb-4 pt-5 pb-3" >
                                    <button type="reset" class="btn font-weight-medium fs-7 px-4 me-4" style="background: #DE714B; color: white; font-weight: 100">
                                        {{ __('trans.cancel') }} 
                                    </button>
                                    <button type="submit" class="btn btn-info align-self-center fs-7 px-4" style="font-weight: 100">
                                        {{ __('trans.save-and-exit') }} 
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('plugin/DataTables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugin/DataTables/Responsive-2.2.9/dataTables.responsive.min.js') }}"></script>
@endsection
