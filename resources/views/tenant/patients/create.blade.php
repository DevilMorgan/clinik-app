@extends('tenant.layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugin/jquery-ui-1.13/jquery-ui.min.css') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <nav aria-label="breadcrumb" class="agenda_path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.patients.index') }}">{{ __('trans.patients') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.patients.create') }}">{{ __('trans.add-patients') }}</a>
                </li>
            </ol>
        </nav>
    </nav>

    <form action="{{ route('tenant.patients.create') }}" method="post" class="form" enctype="multipart/form-data">
        @csrf
        <div class="main_target_form">
            <div class="form_row">
                <!-- Basic data patient -->
                <h2 class="col-12 title_section_form">{{ __('trans.personal-information') }}</h2>

                <div class="col-8 col-md-3 col-xl-2 imgUser_container_form">
                    <img src="" alt="" class="img_user_form" id="img-photo">
                    <input type="file" class="input_imgUser_form" id="photo" name="photo" onchange="get_imagen('photo', 'img-photo')">
                    <label for="" class="label_imgUser_form">{{ __('trans.user-photo') }}</label>
                </div>

                <div class="col-12 col-md-9 col-xl-10 data_row_form">
                    <div class="col-md-3 data_group_form">
                        <label for="name_first">{{ __('validation.attributes.name_first') }}</label>
                        <input type="text" class="input_dataGroup_form @error('name_first') is-invalid @enderror"
                               id="name_first" name="name_first" required value="{{ old('name_first') }}">
                    </div>

                    <div class="col-md-3 data_group_form">
                        <label for="name_second">{{ __('validation.attributes.name_second') }}</label>
                        <input type="text" class="input_dataGroup_form @error('name_second') is-invalid @enderror"
                               id="name_second" name="name_second"  value="{{ old('name_second') }}">
                    </div>

                    <div class="col-md-3 data_group_form">
                        <label for="lastname_first">{{ __('validation.attributes.lastname_first') }}</label>
                        <input type="text" class="input_dataGroup_form @error('lastname_first') is-invalid @enderror"
                               id="lastname_first" name="lastname_first" required value="{{ old('lastname_first') }}">
                    </div>

                    <div class="col-md-3 data_group_form">
                        <label for="lastname_second">{{ __('validation.attributes.lastname_second') }}</label>
                        <input type="text" class="input_dataGroup_form @error('lastname_second') is-invalid @enderror"
                               id="lastname_second" name="lastname_second" required value="{{ old('lastname_second') }}">
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="type_card">{{ __('validation.attributes.type_card') }}</label>

                        <select class="input_dataGroup_form" id="type_card" name="type_card" required>
                            <option></option>
                            @foreach($card_types as $item)
                                <option value="{{ $item->id }}" {{ old('type_card') == $item->id ? 'selected' : '' }}>{{ $item->name_short }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="id_card">{{ __('validation.attributes.id_card') }}</label>
                        <input type="text" class="input_dataGroup_form @error('id_card') is-invalid @enderror"
                               id="id_card" name="id_card" required value="{{ old('id_card') }}">
                    </div>
                </div>

                <div class="col-12 data_row_form">
                    <div class="col-md-6 col-xl-4 data_group_form">
                        <label for="date-birth">{{ __('validation.attributes.date-birth') }}</label>
                        <input type="date" class="input_dataGroup_form @error('date-birth') is-invalid @enderror"
                               id="date-birth" name="date-birth" value="{{ old('date-birth') }}">
                    </div>

{{--                    <div class="col-md-6 col-xl-4 data_group_form">--}}
{{--                        <label for="place-birth">{{ __('validation.attributes.place-birth') }}</label>--}}
{{--                        <input type="text" class="input_dataGroup_form @error('place-birth') is-invalid @enderror city"--}}
{{--                               id="place-birth" name="place-birth" value="{{ old('place-birth') }}">--}}
{{--                    </div>--}}

                    <div class="col-md-6 col-xl-4 data_group_form">
                        <label for="country_birth">{{ __('validation.attributes.country_birth') }}</label>
                        <input type="text" class="input_dataGroup_form @error('country_birth') is-invalid @enderror country"
                               id="country_birth" name="country_birth" value="{{ old('country_birth') }}"
                               data-code="#code_country_birth">
                    </div>

                    <div class="col-md-6 col-xl-4 data_group_form">
                        <label for="code_country_birth">{{ __('validation.attributes.code_country_birth') }}</label>
                        <input type="text" class="input_dataGroup_form @error('code_country_birth') is-invalid @enderror"
                               id="code_country_birth" name="code_country_birth" value="{{ old('code_country_birth') }}" >
                    </div>

                    <div class="col-md-6 col-xl-4 data_group_form">
                        <label for="department_birth">{{ __('validation.attributes.department_birth') }}</label>
                        <input type="text" class="input_dataGroup_form @error('department_birth') is-invalid @enderror department"
                               id="department_birth" name="department_birth" value="{{ old('department_birth') }}"
                               data-code="#code_department_birth" data-search="#country_birth">
                    </div>

                    <div class="col-md-6 col-xl-4 data_group_form">
                        <label for="code_department_birth">{{ __('validation.attributes.code_department_birth') }}</label>
                        <input type="text" class="input_dataGroup_form @error('code_department_birth') is-invalid @enderror"
                               id="code_department_birth" name="code_department_birth" value="{{ old('code_department_birth') }}" >
                    </div>

                    <div class="col-md-6 col-xl-4 data_group_form">
                        <label for="city_birth">{{ __('validation.attributes.city_birth') }}</label>
                        <input type="text" class="input_dataGroup_form @error('city_birth') is-invalid @enderror city"
                               id="cityt_birth" name="city_birth" value="{{ old('city_birth') }}"
                               data-code="#code_city_birth" data-search="#department_birth">
                    </div>

                    <div class="col-md-6 col-xl-4 data_group_form">
                        <label for="code_city_birth">{{ __('validation.attributes.code_city_birth') }}</label>
                        <input type="text" class="input_dataGroup_form @error('code_city_birth') is-invalid @enderror"
                               id="code_city_birth" name="code_city_birth" value="{{ old('code_city_birth') }}" >
                    </div>

                    <div class="col-md-6 col-xl-4 data_group_form">
                        <label for="blood_group">{{ __('validation.attributes.blood_group') }}</label>
                        <select id="blood_group" name="blood_group" class="input_dataGroup_form @error('blood_group') is-invalid @enderror">
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

                    <div class="col-md-6 col-xl-4 data_group_form">
                        <label for="gender">{{ __('validation.attributes.gender') }}</label>
                        <select name="gender" id="gender" class="input_dataGroup_form @error('gender') is-invalid @enderror">
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : ''}}>{{ __('trans.male') }}</option>
                            <option value="feminine" {{ old('gender') == 'feminine' ? 'selected' : ''}}>{{ __('trans.feminine') }}</option>
                            <option value="intersex" {{ old('gender') == 'intersex' ? 'selected' : ''}}>{{ __('trans.intersex') }}</option>
                        </select>
                    </div>

                    <div class="col-md-6 col-xl-4 data_group_form">
                        <label for="gender_identity">{{ __('validation.attributes.gender_identity') }}</label>
                        <select name="gender_identity" id="gender_identity" class="input_dataGroup_form @error('gender_identity') is-invalid @enderror">
                            <option value="male" {{ old('gender_identity') == 'male' ? 'selected' : ''}}>{{ __('trans.male') }}</option>
                            <option value="feminine" {{ old('gender_identity') == 'feminine' ? 'selected' : ''}}>{{ __('trans.feminine') }}</option>
                            <option value="transgender" {{ old('gender_identity') == 'transgender' ? 'selected' : ''}}>{{ __('trans.transgender') }}</option>
                            <option value="neutral" {{ old('gender_identity') == 'neutral' ? 'selected' : ''}}>{{ __('trans.neutral') }}</option>
                            <option value="not declare" {{ old('gender_identity') == 'not declare' ? 'selected' : ''}}>{{ __('trans.not declare') }}</option>
                        </select>
                    </div>

                    <div class="col-md-6 col-xl-4 data_group_form">
                        <label for="occupation">{{ __('validation.attributes.occupation') }}</label>
                        <input type="text" class="input_dataGroup_form @error('occupation') is-invalid @enderror occupation"
                               id="occupation" name="occupation" value="{{ old('occupation') }}" data-code="#code_occupation">
                    </div>

                    <div class="col-md-6 col-xl-4 data_group_form">
                        <label for="code_occupation">{{ __('validation.attributes.code_occupation') }}</label>
                        <input type="text" class="input_dataGroup_form @error('code_occupation') is-invalid @enderror"
                               id="code_occupation" name="code_occupation" value="{{ old('code_occupation') }}">
                    </div>

                    <div class="col-md-6 col-xl-4 data_group_form">
                        <label for="marital-status">{{ __('validation.attributes.marital-status') }}</label>

                        <select class="input_dataGroup_form @error('marital-status') is-invalid @enderror" id="marital-status" name="marital-status">
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
                </div>

                <!-- Contacts and address Patient -->
                <h2 class="col-12 title_section_form">{{ __('trans.contacts-address') }}</h2>

                <div class="col-12 data_row_form">
                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="cellphone">{{ __('validation.attributes.cellphone') }}</label>
                        <input type="number" class="input_dataGroup_form @error('cellphone') is-invalid @enderror"
                               id="cellphone" name="cellphone" required value="{{ old('cellphone') }}">
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="phone">{{ __('validation.attributes.phone') }}</label>
                        <input type="number" class="input_dataGroup_form @error('phone') is-invalid @enderror"
                               id="phone" name="phone" required value="{{ old('phone') }}">
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="email">{{ __('validation.attributes.email') }}</label>
                        <input type="email" class="input_dataGroup_form @error('email') is-invalid @enderror"
                               id="email" name="email" required value="{{ old('email') }}">
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="country">{{ __('validation.attributes.country') }}</label>
                        <input type="text" class="input_dataGroup_form @error('country') is-invalid @enderror country"
                               id="country" name="country" required value="{{ old('country') }}" data-code="#code_country">
                    </div>

                    <div class="col-md-6 col-xl-4 data_group_form">
                        <label for="code_country">{{ __('validation.attributes.code_country') }}</label>
                        <input type="text" class="input_dataGroup_form @error('code_country') is-invalid @enderror"
                               id="code_country" name="code_country" value="{{ old('code_country') }}" >
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="department">{{ __('validation.attributes.department') }}</label>
                        <input type="text" class="input_dataGroup_form @error('department') is-invalid @enderror department"
                               id="department" name="department" required value="{{ old('department') }}"
                               data-search="#country" data-code="#code_department">
                    </div>

                    <div class="col-md-6 col-xl-4 data_group_form">
                        <label for="code_department">{{ __('validation.attributes.code_department') }}</label>
                        <input type="text" class="input_dataGroup_form @error('code_department') is-invalid @enderror"
                               id="code_department" name="code_department" value="{{ old('code_department') }}" >
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="city">{{ __('validation.attributes.city') }}</label>
                        <input type="text" class="input_dataGroup_form @error('city') is-invalid @enderror city"
                               id="city" name="city" required value="{{ old('city') }}"
                               data-search="#department" data-code="#code_city">
                    </div>

                    <div class="col-md-6 col-xl-4 data_group_form">
                        <label for="code_city">{{ __('validation.attributes.code_city') }}</label>
                        <input type="text" class="input_dataGroup_form @error('code_city') is-invalid @enderror"
                               id="code_city" name="code_city" value="{{ old('code_city') }}">
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="postcode">{{ __('validation.attributes.postcode') }}</label>
                        <input type="text" class="input_dataGroup_form @error('postcode') is-invalid @enderror"
                               id="postcode" name="postcode" value="{{ old('postcode') }}">
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="locality">{{ __('validation.attributes.locality') }}</label>
                        <input type="text" class="input_dataGroup_form @error('locality') is-invalid @enderror"
                               id="locality" name="locality" value="{{ old('locality') }}">
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="neighborhood">{{ __('validation.attributes.neighborhood') }}</label>
                        <input type="text" class="input_dataGroup_form @error('neighborhood') is-invalid @enderror"
                               id="neighborhood" name="neighborhood" value="{{ old('neighborhood') }}">
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="address">{{ __('validation.attributes.address') }}</label>
                        <input type="text" class="input_dataGroup_form @error('address') is-invalid @enderror"
                               id="address" name="address" value="{{ old('address') }}">
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="stratum">{{ __('validation.attributes.stratum') }}</label>
                        <input type="text" class="input_dataGroup_form @error('stratum') is-invalid @enderror"
                               id="stratum" name="stratum" value="{{ old('stratum') }}">
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="ethnicity">{{ __('validation.attributes.ethnicity') }}</label>
                        <input type="text" class="input_dataGroup_form @error('ethnicity') is-invalid @enderror ethnicity"
                               id="ethnicity" name="ethnicity" value="{{ old('ethnicity') }}">
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="ethnic_community">{{ __('validation.attributes.ethnic_community') }}</label>
                        <input type="text" class="input_dataGroup_form @error('ethnic_community') is-invalid @enderror ethnic-"
                               id="ethnic_community" name="ethnic_community" value="{{ old('ethnic_community') }}">
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="uptown">{{ __('validation.attributes.uptown') }}</label>
                        <select name="uptown" id="uptown" class="input_dataGroup_form @error('uptown') is-invalid @enderror">
                            <option value="urban" {{ (old('uptown') == 'urban') ? 'selected' : '' }} >{{ __('trans.urban') }}</option>
                            <option value="rural" {{ (old('uptown') == 'rural') ? 'selected' : '' }} >{{ __('trans.rural') }}</option>
                        </select>
                    </div>

                    {{--                    <div class="col-md-6 col-lg-4 data_group_form">--}}
                    {{--                        <label for="city">{{ __('validation.attributes.city') }}</label>--}}
                    {{--                        <input type="text" class="input_dataGroup_form @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city') }}">--}}
                    {{--                    </div>--}}
                </div>

                <!-- Medical security Patient -->
                <h2 class="col-12 title_section_form">{{ __('trans.medical-security') }}</h2>

                <div class="col-12 data_row_form">
                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="medical-entity">{{ __('validation.attributes.medical-entity') }}</label>
                        <input type="text" class="input_dataGroup_form @error('medical-entity') is-invalid @enderror sgsss" data-code="#code_entity"
                               id="medical-entity" name="medical-entity" required value="{{ old('medical-entity') }}">
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="code_entity">{{ __('validation.attributes.code_entity') }}</label>
                        <input type="text" class="input_dataGroup_form @error('code_entity') is-invalid @enderror"
                               id="code_entity" name="code_entity" required value="{{ old('code_entity') }}">
                    </div>

                <!-- <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="contributory-regime">{{ __('validation.attributes.contributory-regime') }}</label>
                        <input type="text" class="input_dataGroup_form  @error('contributory-regime') is-invalid @enderror"
                               id="contributory-regime" name="contributory-regime" value="{{ old('contributory-regime') }}">
                    </div> -->

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="contributory-regime">{{ __('validation.attributes.contributory-regime') }}</label>

                        <select name="contributory-regime" id="contributory-regime" class="input_dataGroup_form @error('contributory-regime') is-invalid @enderror">
                            <option value="Cotizante" {{ (old('contributory-regime') == 'Cotizante') ? 'selected' : '' }} >Cotizante</option>
                            <option value="Beneficiario" {{ (old('contributory-regime') == 'Beneficiario') ? 'selected' : '' }} >Beneficiario</option>
                            <option value="Subsidiado" {{ (old('contributory-regime') == 'Subsidiado') ? 'selected' : '' }} >Subsidiado</option>
                            <option value="Otro" {{ (old('contributory-regime') == 'Otro') ? 'selected' : '' }} >Otro</option>
                        </select>
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form"> <!-- Input type radius -->
                        <div class="pr-0 pl-0">
                            <label class="label_input_radio">{{ __('validation.attributes.status-medical') }}</label>

                            <div class="row row_input_radio">
                                <div class="col-5 col-xl-3 content_input_radio @error('status-medical') is-invalid @enderror">
                                    <input class="mr-2" type="radio" id="status-medical-0" value="1" name="status-medical" {{ (old('status-medical') == 0) ? 'checked':'' }}>
                                    <label class="form-check-label" for="status-medical-0">{{ __('trans.active') }}</label>
                                </div>

                                <div class="col-5 col-xl-3 content_input_radio @error('status-medical') is-invalid @enderror">
                                    <input class="mr-2" type="radio" id="status-medical-1" value="0" name="status-medical" {{ (old('status-medical') == 1) ? 'checked':'' }}>
                                    <label class="form-check-label" for="status-medical-1">{{ __('trans.inactive') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="opposition_organ_donation">{{ __('validation.attributes.opposition_organ_donation') }}</label>
                        <input type="date" class="input_dataGroup_form @error('opposition_organ_donation') is-invalid @enderror"
                               id="opposition_organ_donation" name="opposition_organ_donation" required
                               value="{{ old('opposition_organ_donation') }}">
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="advance_directive">{{ __('validation.attributes.advance_directive') }}</label>
                        <input type="date" class="input_dataGroup_form @error('advance_directive') is-invalid @enderror"
                               id="advance_directive" name="advance_directive" required
                               value="{{ old('advance_directive') }}">
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="code_advance_directive">{{ __('validation.attributes.code_advance_directive') }}</label>
                        <input type="text" class="input_dataGroup_form @error('code_advance_directive') is-invalid @enderror"
                               id="code_advance_directive" name="code_advance_directive" required
                               value="{{ old('code_advance_directive') }}">
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="impairment">{{ __('validation.attributes.impairment') }}</label>
                        <select name="impairment" id="impairment" class="input_dataGroup_form @error('impairment') is-invalid @enderror">
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

                <!-- Medical security Patient -->
                <h2 class="col-12 title_section_form">{{ __('trans.additional-Information') }}</h2>

                <div class="col-12 data_row_form">
                    <div class="col-md-8 data_group_form">
                        <label for="observation">{{ __('validation.attributes.observation') }}</label>

                        <textarea cols="30" rows="10" class="textArea_form @error('observation') is-invalid @enderror" name="observation" id="observation">{{ old('observation') }}</textarea>
                    </div>

                    <div class="col-md-4 data_group_form mt-0 mt-md-4"> <!-- Input type radius -->
                        <div class="pr-0 pl-0 mt-0 mt-md-2">
                            <label class="label_input_radio">{{ __('validation.attributes.status') }}</label>

                            <div class="row row_input_radio">
                                <div class="col-5 col-xl-3 content_input_radio @error('status') is-invalid @enderror">
                                    <input class="mr-2" type="radio" id="status-0" value="1" name="status" {{ (old('status') == 0) ? 'checked':'' }}>
                                    <label class="form-check-label" for="status-0">{{ __('trans.active') }}</label>
                                </div>

                                <div class="col-5 col-xl-3 content_input_radio @error('status') is-invalid @enderror">
                                    <input class="mr-2" type="radio" id="status-1" value="0" name="status" {{ (old('status') == 1) ? 'checked':'' }}>
                                    <label class="form-check-label" for="status-1">{{ __('trans.inactive') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container_button"> <!-- Buttons -->
                <a href="{{ route('tenant.patients.index') }}" type="submit" class="button_third">{{ __('trans.cancel') }}
                    <i class="fas fa-times-circle pl-2"></i>
                </a>

                <button type="submit" class="button_primary">{{ __('trans.save') }}
                    <i class="fas fa-save pl-2"></i>
                </button>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('plugin/jquery-ui-1.13/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/location.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/search.js') }}"></script>
@endsection
