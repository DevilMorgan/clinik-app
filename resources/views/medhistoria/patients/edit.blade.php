@extends('medhistoria.layouts.app')
@section('title', __('trans.edit-patient'))

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugin/jquery-ui-1.13/jquery-ui.min.css') }}">

@endsection

@section('content')
    <!-- Bread crumb and right sidebar toggle -->
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h2 class="text-themecolor mb-0" style="font-weight: bold">{{ __('trans.patients') }}</h2>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('medhistoria.patients.index') }}">{{ __('trans.patients') }}</a>
                </li>
                <li class="breadcrumb-item ">{{ __('trans.edit-patient') }}</li>
            </ol>
        </div>
        <div class="col-md-7 col-12 align-self-center d-none d-md-block"></div>
    </div>
    <!-- End Bread crumb and right sidebar toggle -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card  form_pat_pad_card">
                    <div class="mb-4">
                        <h2 class="txt_blue_bold">{{ __('trans.data-patients') }}</h2>
                    </div>

                    <div class="card-body p-0">
                        <form action="{{ route('medhistoria.patients.edit', ['patient' => $patient->id]) }}" method="post" class="form" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-body">
                                <!-- User Image -->
                                <div class="row">
                                    <div class="col-md-4 img_user_form"> <!-- User image -->
                                        <img id="" src="">
                                        <input type="file" name="photo"  id="photo" accept="image/png, image/jpeg" />
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
                                    <div class="col-md-3 mb-3">
                                        <label for="name_first" class="txt_dark_bold fs-4">{{ __('validation.attributes.name_first') }}</label>
                                        <input type="text" class="form-control form_style_input @error('name_first') is-invalid @enderror"
                                               id="name_first" name="name_first"  value="{{ old('name_first', $patient->name_first ) }}">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="name_second" class="txt_dark_bold fs-4">{{ __('validation.attributes.name_second') }}</label>
                                        <input type="text" class="form-control form_style_input @error('name_second') is-invalid @enderror"
                                               id="name_second" name="name_second"  value="{{ old('name_second', $patient->name_second ) }}">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="lastname_first" class="txt_dark_bold fs-4">{{ __('validation.attributes.lastname_first') }}</label>
                                        <input type="text" class="form-control form_style_input @error('lastname_first') is-invalid @enderror"
                                               id="lastname_first" name="lastname_first"  value="{{ old('lastname_first', $patient->lastname_first ) }}">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="lastname_second" class="txt_dark_bold fs-4">{{ __('validation.attributes.lastname_second') }}</label>
                                        <input type="text" class="form-control form_style_input @error('lastname_second') is-invalid @enderror"
                                               id="lastname_second" name="lastname_second"  value="{{ old('lastname_second', $patient->lastname_second ) }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="type_card" class="txt_dark_bold fs-4">{{ __('validation.attributes.card_type_id') }}</label>
                                        <select class="form-select form_style_input" id="card_type_id" name="card_type_id" >
                                            <option ></option>
                                            @foreach($card_types as $item)
                                                <option value="{{ $item->id }}" {{ old('card_type_id', $patient->card_type_id) == $item->id ? 'selected' : '' }}>{{ $item->name_short }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="id_card" class="txt_dark_bold fs-4">{{ __('validation.attributes.id_card') }}</label>
                                        <input type="text" class="form-control form_style_input @error('id_card') is-invalid @enderror"
                                               id="id_card" name="id_card"  value="{{ old('id_card', $patient->id_card) }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="birthday" class="txt_dark_bold fs-4">{{ __('validation.attributes.birthday') }}</label>
                                        <input type="datetime-local" class="form-control form_style_input @error('birthday') is-invalid @enderror"
                                               id="birthday" name="birthday" value="{{ old('birthday', $patient->birthday->format('Y-m-d\TH:i')) }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="marital_status" class="txt_dark_bold fs-4">{{ __('validation.attributes.marital_status') }}</label>
                                        <select class="form-select form_style_input @error('marital_status') is-invalid @enderror" id="marital_status" name="marital_status">
                                            <option ></option>
                                            <option value="married" {{ (old('marital_status', $patient->marital_status) == 'married') ? 'selected' : '' }}>{{ __('trans.married') }}</option>
                                            <option value="single" {{ (old('marital_status', $patient->marital_status) == 'single') ? 'selected' : '' }}>{{ __('trans.single') }}</option>
                                            <option value="divorced" {{ (old('marital_status', $patient->marital_status) == 'divorced') ? 'selected' : '' }}>{{ __('trans.divorced') }}</option>
                                            <option value="union couples" {{ (old('marital_status', $patient->marital_status) == 'union couples') ? 'selected' : '' }}>{{ __('trans.union-couples') }}</option>
                                            <option value="widower" {{ (old('marital_status', $patient->marital_status) == 'widower') ? 'selected' : '' }}>{{ __('trans.widower') }}</option>
                                            <option value="legal separation" {{ (old('marital_status', $patient->marital_status) == 'legal separation') ? 'selected' : '' }}>{{ __('trans.legal-separation') }}</option>
                                            <option value="Concubinage" {{ (old('marital_status', $patient->marital_status) == 'Concubinage') ? 'selected' : '' }}>{{ __('trans.concubinage') }}</option>
                                            <option value="significant other" {{ (old('marital_status', $patient->marital_status) == 'significant other') ? 'selected' : '' }}>{{ __('trans.significant-other') }}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="gender" class="txt_dark_bold fs-4">{{ __('validation.attributes.gender') }}</label>
                                        <select name="gender" id="gender" class="form-select form_style_input @error('gender') is-invalid @enderror">
                                            <option></option>
                                            <option value="male" {{ old('gender', $patient->gender) == 'male' ? 'selected' : ''}}>{{ __('trans.male') }}</option>
                                            <option value="feminine" {{ old('gender', $patient->gender) == 'feminine' ? 'selected' : ''}}>{{ __('trans.feminine') }}</option>
                                            <option value="intersex" {{ old('gender', $patient->gender) == 'intersex' ? 'selected' : ''}}>{{ __('trans.intersex') }}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="gender_identity" class="txt_dark_bold fs-4">{{ __('validation.attributes.gender_identity') }}</label>
                                        <select name="gender_identity" id="gender_identity" class="form-select form_style_input @error('gender_identity') is-invalid @enderror">
                                            <option></option>
                                            <option value="male" {{ old('gender_identity', $patient->gender_identity) == 'male' ? 'selected' : ''}}>{{ __('trans.male') }}</option>
                                            <option value="feminine" {{ old('gender_identity', $patient->gender_identity) == 'feminine' ? 'selected' : ''}}>{{ __('trans.feminine') }}</option>
                                            <option value="transgender" {{ old('gender_identity', $patient->gender_identity) == 'transgender' ? 'selected' : ''}}>{{ __('trans.transgender') }}</option>
                                            <option value="neutral" {{ old('gender_identity', $patient->gender_identity) == 'neutral' ? 'selected' : ''}}>{{ __('trans.neutral') }}</option>
                                            <option value="not declare" {{ old('gender_identity', $patient->gender_identity) == 'not declare' ? 'selected' : ''}}>{{ __('trans.not declare') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <label for="country_birth" class="txt_dark_bold fs-4">{{ __('validation.attributes.country_birth') }}</label>
                                                <input type="text" class="form-control form_style_input @error('country_birth') is-invalid @enderror country"
                                                       id="country_birth" name="country_birth" value="{{ old('country_birth', $patient->country_birth) }}" data-code="#code_country_birth">
                                            </div>

                                            <div class="col-md-3">
                                                <label for="code_country_birth" class="txt_dark_bold fs-4">{{ __('validation.attributes.code_country_birth') }}</label>
                                                <input type="text" class="form-control form_style_input @error('code_country_birth') is-invalid @enderror"
                                                       id="code_country_birth" name="code_country_birth"
                                                       value="{{ old('code_country_birth', $patient->code_country_birth) }}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <label for="department_birth" class="txt_dark_bold fs-4">{{ __('validation.attributes.department_birth') }}</label>
                                                <input type="text" class="form-control form_style_input @error('department_birth') is-invalid @enderror department"
                                                       id="department_birth" name="department_birth" value="{{ old('department_birth', $patient->department_birth) }}"
                                                       data-code="#code_department_birth" data-search="#country_birth">
                                            </div>

                                            <div class="col-md-3">
                                                <label for="code_department_birth" class="txt_dark_bold fs-4">{{ __('validation.attributes.code_department_birth') }}</label>
                                                <input type="text" class="form-control form_style_input @error('code_department_birth') is-invalid @enderror"
                                                       id="code_department_birth" name="code_department_birth" value="{{ old('code_department_birth', $patient->code_department_birth) }}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <label for="city_birth" class="txt_dark_bold fs-4">
                                                    {{ __('validation.attributes.city_birth') }}
                                                </label>
                                                <input type="text" class="form-control form_style_input @error('city_birth') is-invalid @enderror city"
                                                       id="city_birth" name="city_birth" value="{{ old('city_birth', $patient->city_birth) }}"
                                                       data-code="#code_city_birth" data-search="#department_birth" />
                                            </div>

                                            <div class="col-md-3">
                                                <label for="code_city_birth" class="txt_dark_bold fs-4">
                                                    {{ __('validation.attributes.code_city_birth') }}
                                                </label>
                                                <input type="text" class="form-control form_style_input @error('code_city_birth') is-invalid @enderror"
                                                       id="code_city_birth" name="code_city_birth" value="{{ old('code_city_birth', $patient->code_city_birth) }}" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="dropdown-divider my-4"></div> <!-- Linea de división del formulario -->

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="blood_group" class="txt_dark_bold fs-4">{{ __('validation.attributes.blood-type') }}</label>
                                        <select id="blood_group" name="blood_group" class="form-select form_style_input @error('blood_group') is-invalid @enderror">
                                            <option></option>
                                            <option value="O+" {{ old('blood_group', $patient->blood_group) == 'O+' ? 'selected' : ''}}>O+</option>
                                            <option value="O-" {{ old('blood_group', $patient->blood_group) == 'O-' ? 'selected' : ''}}>O-</option>
                                            <option value="A+" {{ old('blood_group', $patient->blood_group) == 'A+' ? 'selected' : ''}}>A+</option>
                                            <option value="A-" {{ old('blood_group', $patient->blood_group) == 'A-' ? 'selected' : ''}}>A-</option>
                                            <option value="B+" {{ old('blood_group', $patient->blood_group) == 'B+' ? 'selected' : ''}}>B+</option>
                                            <option value="B-" {{ old('blood_group', $patient->blood_group) == 'B-' ? 'selected' : ''}}>B-</option>
                                            <option value="AB+" {{ old('blood_group', $patient->blood_group) == 'AB+' ? 'selected' : ''}}>AB+</option>
                                            <option value="AB-" {{ old('blood_group', $patient->blood_group) == 'AB-' ? 'selected' : ''}}>AB-</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <label for="medical-entity" class="txt_dark_bold fs-4">{{ __('validation.attributes.entity') }}</label>
                                                <input type="text" class="form-control form_style_input @error('entity') is-invalid @enderror sgsss" data-code="#code_entity"
                                                       id="entity" name="entity"  value="{{ old('entity', $patient->entity) }}">
                                            </div>

                                            <div class="col-md-3">
                                                <label for="code_entity" class="txt_dark_bold fs-4">{{ __('validation.attributes.code_entity') }}</label>
                                                <input type="text" class="form-control form_style_input @error('code_entity') is-invalid @enderror"
                                                       id="code_entity" name="code_entity"  value="{{ old('code_entity', $patient->code_entity) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="contributory_regime" class="txt_dark_bold fs-4">{{ __('validation.attributes.contributory_regime') }}</label>
                                        <select name="contributory_regime" id="contributory_regime" class="form-select form_style_input @error('contributory_regime') is-invalid @enderror">
                                            <option></option>
                                            <option value="Cotizante" {{ (old('contributory_regime', $patient->contributory_regime) == 'Cotizante') ? 'selected' : '' }} >Cotizante</option>
                                            <option value="Beneficiario" {{ (old('contributory_regime', $patient->contributory_regime) == 'Beneficiario') ? 'selected' : '' }} >Beneficiario</option>
                                            <option value="Subsidiado" {{ (old('contributory_regime', $patient->contributory_regime) == 'Subsidiado') ? 'selected' : '' }} >Subsidiado</option>
                                            <option value="Otro" {{ (old('contributory_regime', $patient->contributory_regime) == 'Otro') ? 'selected' : '' }} >Otro</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="row">
                                            <label for="opposition_organ_donation" class="txt_dark_bold fs-4">
                                                {{ __('validation.attributes.opposition_organ_donation') }}
                                            </label>
                                            <!-- Check box SI NO -->
                                            <div class="col-md-4 d-flex align-items-end px-0"> <!-- Check box SI NO -->
                                                <div class="col-md-6 form-check d-flex align-items-center justify-content-end me-2 mb-0">
                                                    <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                           name="opposition_organ_donation-satus" id="opposition_organ_donation-1"
                                                           value="1" {{ old('opposition_organ_donation-status', !empty($patient->opposition_organ_donation)) == 1 ? 'checked':'' }}
                                                           data-activation=".opposition_organ_donation-input"/>
                                                    <label class="form-check-label txt_dark_bold fs-5 ps-2"
                                                           for="opposition_organ_donation-1">Si</label>
                                                </div>
                                                <div class="col-md-6 form-check d-flex align-items-center justify-content-end me-2 mb-0">
                                                    <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                           name="opposition_organ_donation-satus" id="opposition_organ_donation-0"
                                                           value="0" {{ old('opposition_organ_donation-status', !empty($patient->opposition_organ_donation)) == 0 ? 'checked':'' }}
                                                           data-activation=".opposition_organ_donation-input"/>
                                                    <label class="form-check-label txt_dark_bold fs-5 ps-2"
                                                           for="opposition_organ_donation-0">No</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="date" class="form-control form_style_input @error('opposition_organ_donation') is-invalid @enderror opposition_organ_donation-input"
                                                       id="opposition_organ_donation" name="opposition_organ_donation"
                                                        value="{{ old('opposition_organ_donation', $patient->opposition_organ_donation) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="row">
                                            <label for="advance_directive" class="txt_dark_bold fs-4">
                                                {{ __('validation.attributes.advance_directive') }}
                                            </label>

                                            <div class="col-md-4 d-flex align-items-end px-0">
                                                <div class="col-md-6 form-check d-flex align-items-center justify-content-end me-2 mb-0">
                                                    <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                           id="advance_directive-1" name="advance_directive-status" data-activation=".advance_directive-input"
                                                        {{ old('advance_directive-status', !empty($patient->advance_directive)) == 1 ? 'checked':'' }}/>
                                                    <label class="form-check-label txt_dark_bold fs-5 ps-2"
                                                           for="advance_directive-1">Si</label>
                                                </div>
                                                <div class="col-md-6 form-check d-flex align-items-center justify-content-end me-2 mb-0">
                                                    <input type="radio" class="form-check-input form_checkBox activate-inputs"
                                                           id="advance_directive-0" name="advance_directive-status" data-activation=".advance_directive-input"
                                                        {{ old('advance_directive-status', !empty($patient->advance_directive)) == 0 ? 'checked':'' }}/>
                                                    <label class="form-check-label txt_dark_bold fs-5 ps-2"
                                                           for="advance_directive-0">No</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="date" class="form-control form_style_input @error('advance_directive') is-invalid @enderror advance_directive-input"
                                                       id="advance_directive" name="advance_directive"
                                                        value="{{ old('advance_directive', $patient->advance_directive) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="code_advance_directive" class="txt_dark_bold fs-4">
                                            {{ __('validation.attributes.code_advance_directive') }}
                                        </label>
                                        <input type="text" class="form-control form_style_input @error('code_advance_directive') is-invalid @enderror advance_directive-input"
                                               id="code_advance_directive" name="code_advance_directive"
                                                value="{{ old('code_advance_directive', $patient->code_advance_directive) }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="impairment" class="txt_dark_bold fs-4">{{ __('validation.attributes.impairment') }}</label>
                                        <select name="impairment" id="impairment" class="form-select form_style_input @error('impairment') is-invalid @enderror">
                                            <option></option>
                                            <option value="physical disability" {{ (old('impairment', $patient->impairment) == 'physical disability') ? 'selected' : '' }} >{{ __('trans.physical-disability') }}</option>
                                            <option value="visual impairment" {{ (old('impairment', $patient->impairment) == 'visual impairment') ? 'selected' : '' }} >{{ __('trans.visual-impairment') }}</option>
                                            <option value="hearing impairment" {{ (old('impairment', $patient->impairment) == 'hearing impairment') ? 'selected' : '' }} >{{ __('trans.hearing-impairment') }}</option>
                                            <option value="intellectual disability" {{ (old('impairment', $patient->impairment) == 'intellectual disability') ? 'selected' : '' }} >{{ __('trans.intellectual-disability') }}</option>
                                            <option value="psychosocial disability" {{ (old('impairment', $patient->impairment) == 'psychosocial disability') ? 'selected' : '' }} >{{ __('trans.psychosocial-disability') }}</option>
                                            <option value="deaf blind" {{ (old('impairment', $patient->impairment) == 'deaf blind') ? 'selected' : '' }} >{{ __('trans.deaf-blind') }}</option>
                                            <option value="multiple disability" {{ (old('impairment', $patient->impairment) == 'multiple disability') ? 'selected' : '' }} >{{ __('trans.multiple-disability') }}</option>
                                            <option value="no disability" {{ (old('impairment', $patient->impairment) == 'no disability') ? 'selected' : '' }} >{{ __('trans.no-disability') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Contac Information -->
                                <div class="form_content_info_basic">
                                    <i data-feather="phone-forwarded" class="txt_blue_bold"></i>
                                    <h2 class="txt_blue_bold m-0 ps-2">{{ __('trans.contact-information') }}</h2>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <label for="country" class="txt_dark_bold fs-4">{{ __('validation.attributes.country') }}</label>
                                                <input type="text" class="form-control form_style_input @error('country') is-invalid @enderror country"
                                                       id="country" name="country"  value="{{ old('country', $patient->country) }}" data-code="#code_country">
                                            </div>

                                            <div class="col-md-3">
                                                <label for="code_country" class="txt_dark_bold fs-4">
                                                    {{ __('validation.attributes.code_country') }}
                                                </label>
                                                <input type="text" class="form-control form_style_input @error('code_country') is-invalid @enderror"
                                                       id="code_country" name="code_country" value="{{ old('code_country', $patient->code_country) }}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <label for="department" class="txt_dark_bold fs-4">{{ __('validation.attributes.department') }}</label>
                                                <input type="text" class="form-control form_style_input @error('department') is-invalid @enderror department"
                                                       id="department" name="department"  value="{{ old('department', $patient->department) }}"
                                                       data-search="#country" data-code="#code_department">
                                            </div>

                                            <div class="col-md-3">
                                                <label for="code_department" class="txt_dark_bold fs-4">{{ __('validation.attributes.code_department') }}</label>
                                                <input type="text" class="form-control form_style_input @error('code_department') is-invalid @enderror"
                                                       id="code_department" name="code_department" value="{{ old('code_department', $patient->code_department) }}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <label for="city" class="txt_dark_bold fs-4">{{ __('validation.attributes.city') }}</label>
                                                <input type="text" class="form-control form_style_input @error('city') is-invalid @enderror city"
                                                       id="city" name="city"  value="{{ old('city', $patient->city) }}" data-search="#department" data-code="#code_city">
                                            </div>

                                            <div class="col-md-3">
                                                <label for="code_city" class="txt_dark_bold fs-4">{{ __('validation.attributes.code_city') }}</label>
                                                <input type="text" class="form-control form_style_input @error('code_city') is-invalid @enderror"
                                                       id="code_city" name="code_city" value="{{ old('code_city', $patient->code_city) }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="locality" class="txt_dark_bold fs-4">{{ __('validation.attributes.locality') }}</label>
                                        <input type="text" class="form-control form_style_input @error('locality') is-invalid @enderror"
                                               id="locality" name="locality" value="{{ old('locality', $patient->locality) }}">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="neighborhood" class="txt_dark_bold fs-4">{{ __('validation.attributes.neighborhood') }}</label>
                                        <input type="text" class="form-control form_style_input @error('neighborhood') is-invalid @enderror"
                                               id="neighborhood" name="neighborhood" value="{{ old('neighborhood', $patient->neighborhood) }}">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="postcode" class="txt_dark_bold fs-4">{{ __('validation.attributes.postcode') }}</label>
                                        <input type="text" class="form-control form_style_input @error('postcode') is-invalid @enderror"
                                               id="postcode" name="postcode" value="{{ old('postcode', $patient->postcode) }}">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="stratum" class="txt_dark_bold fs-4">{{ __('validation.attributes.stratum') }}</label>
                                        <input type="text" class="form-control form_style_input @error('stratum') is-invalid @enderror"
                                               id="stratum" name="stratum" value="{{ old('stratum', $patient->stratum) }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="address" class="txt_dark_bold fs-4">{{ __('validation.attributes.address') }}</label>
                                        <input type="text" class="form-control form_style_input @error('address') is-invalid @enderror"
                                               id="address" name="address" value="{{ old('address', $patient->address) }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="uptown" class="txt_dark_bold fs-4">{{ __('validation.attributes.uptown') }}</label>
                                        <select name="uptown" id="uptown" class="form-select form_style_input @error('uptown') is-invalid @enderror">
                                            <option ></option>
                                            <option value="urban" {{ (old('uptown', $patient->uptown) == 'urban') ? 'selected' : '' }} >{{ __('trans.urban') }}</option>
                                            <option value="rural" {{ (old('uptown', $patient->uptown) == 'rural') ? 'selected' : '' }} >{{ __('trans.rural') }}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="phone" class="txt_dark_bold fs-4">{{ __('validation.attributes.phone') }}</label>
                                        <input type="number" class="form-control form_style_input @error('phone') is-invalid @enderror"
                                               id="phone" name="phone"  value="{{ old('phone', $patient->phone) }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3 pe-5">
                                        <label for="cellphone" class="txt_dark_bold fs-4">{{ __('validation.attributes.cellphone') }}</label>
                                        <input type="number" class="form-control form_style_input @error('cellphone') is-invalid @enderror"
                                               id="cellphone" name="cellphone"  value="{{ old('cellphone', $patient->cellphone) }}">
                                    </div>
                                    <div class="col-md-6 mb-3 ps-5">
                                        <label for="email" class="txt_dark_bold fs-4">{{ __('validation.attributes.email') }}</label>
                                        <input type="email" class="form-control form_style_input @error('email') is-invalid @enderror"
                                               id="email" name="email"  value="{{ old('email', $patient->email) }}">
                                    </div>
                                </div>

                                <!-- Demographic Information -->
                                <div class="form_content_info_basic">
                                    <i data-feather="globe" class="txt_blue_bold"></i>
                                    <h2 class="txt_blue_bold m-0 ps-2">{{ __('trans.demographic-information') }}</h2>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="ethnicity" class="txt_dark_bold fs-4">{{ __('validation.attributes.ethnicity') }}</label>
                                        <select name="ethnicity" id="ethnicity" class="form-select form_style_input @error('ethnicity') is-invalid @enderror">
                                            <option></option>
                                            <option value="indigenous" {{ (old('ethnicity', $patient->ethnicity) == 'indigenous') ? 'selected' : '' }} >{{ __('trans.indigenous') }}</option>
                                            <option value="gypsy" {{ (old('ethnicity', $patient->ethnicity) == 'gypsy') ? 'selected' : '' }} >{{ __('trans.gypsy') }}</option>
                                            <option value="raiza" {{ (old('ethnicity', $patient->ethnicity) == 'raiza') ? 'selected' : '' }} >{{ __('trans.raiza') }}</option>
                                            <option value="black person" {{ (old('ethnicity', $patient->ethnicity) == 'black person') ? 'selected' : '' }} >{{ __('trans.black-person') }}</option>
                                            <option value="Afrocolombiano" {{ (old('ethnicity', $patient->ethnicity) == 'Afrocolombiano') ? 'selected' : '' }} >{{ __('trans.Afrocolombiano') }}</option>
                                            <option value="none" {{ (old('ethnicity', $patient->ethnicity) == 'none') ? 'selected' : '' }} >{{ __('trans.none') }}</option>
                                        </select>

                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="ethnic_community" class="txt_dark_bold fs-4">{{ __('validation.attributes.ethnic_community') }}</label>
                                        <input type="text" class="form-control form_style_input @error('ethnic_community') is-invalid @enderror ethnic-"
                                               id="ethnic_community" name="ethnic_community" value="{{ old('ethnic_community', $patient->ethnic_community) }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="occupation" class="txt_dark_bold fs-4">{{ __('validation.attributes.occupation') }}</label>
                                        <input type="text" class="form-control form_style_input @error('occupation') is-invalid @enderror occupation"
                                               id="occupation" name="occupation" value="{{ old('occupation', $patient->occupation) }}" data-code="#code_occupation">
                                    </div>
                                </div>

                                <!-- Save Button -->
                                <div class="text-center mt-5 mb-4 pt-5 pb-3" >
                                    <a href="{{ route('medhistoria.patients.index') }}" class="btn font-weight-medium fs-7 px-4 me-4" style="background: #DE714B; color: white; font-weight: 100">
                                        {{ __('trans.cancel') }}
                                    </a>
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
    <script type="text/javascript" src="{{ asset('plugin/jquery-ui-1.13/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/location.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/search.js') }}"></script>

    <script>

    </script>
@endsection
