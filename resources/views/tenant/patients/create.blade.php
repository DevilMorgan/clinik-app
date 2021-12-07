@extends('tenant.layouts.app')

@section('styles')

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
                    <div class="col-md-6 data_group_form">
                        <label for="name">{{ __('validation.attributes.name') }}</label>
                        <input type="text" class="input_dataGroup_form @error('name') is-invalid @enderror" id="name" name="name"  value="{{ old('name') }}">
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="last_name">{{ __('validation.attributes.last_name') }}</label>
                        <input type="text" class="input_dataGroup_form @error('last_name') is-invalid @enderror" id="last_name" name="last_name" required value="{{ old('last_name') }}">
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
                        <input type="text" class="input_dataGroup_form @error('id_card') is-invalid @enderror" id="id_card" name="id_card" required value="{{ old('id_card') }}">
                    </div>
                </div>

                <div class="col-12 data_row_form">
                    <div class="col-md-6 col-xl-4 data_group_form">
                        <label for="date-birth">{{ __('validation.attributes.date-birth') }}</label>
                        <input type="date" class="input_dataGroup_form @error('date-birth') is-invalid @enderror" id="date-birth" name="date-birth" value="{{ old('date-birth') }}">
                    </div>

                    <div class="col-md-6 col-xl-4 data_group_form">
                        <label for="place-birth">{{ __('validation.attributes.place-birth') }}</label>
                        <input type="text" class="input_dataGroup_form @error('place-birth') is-invalid @enderror" id="place-birth" name="place-birth" value="{{ old('place-birth') }}">
                    </div>

                    <div class="col-md-6 col-xl-4 data_group_form">
                        <label for="blood_group">{{ __('validation.attributes.blood_group') }}</label>
                        <input type="text" class="input_dataGroup_form @error('blood_group') is-invalid @enderror" id="blood_group" name="blood_group" value="{{ old('blood_group') }}">
                    </div>

                    <div class="col-md-6 col-xl-4 data_group_form">
                        <label for="gender">Gender</label>

                        <select name="gender" id="gender" class="input_dataGroup_form @error('gender') is-invalid @enderror">
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : ''}}>{{ __('trans.male') }}</option>
                            <option value="feminine" {{ old('gender') == 'feminine' ? 'selected' : ''}}>{{ __('trans.feminine') }}</option>
                        </select>
                    </div>

                    <div class="col-md-6 col-xl-4 data_group_form">
                        <label for="occupation">{{ __('validation.attributes.occupation') }}</label>
                        <input type="text" class="input_dataGroup_form @error('occupation') is-invalid @enderror" id="occupation" name="occupation" value="{{ old('occupation') }}">
                    </div>

                    <div class="col-md-6 col-xl-4 data_group_form">
                        <label for="marital-status">{{ __('validation.attributes.marital-status') }}</label>

                        <select class="input_dataGroup_form @error('marital-status') is-invalid @enderror" id="marital-status" name="marital-status">
                            <option></option>
                            <option value="significant other" {{ (old('marital-status') == 'significant other') ? 'selected' : '' }}>{{ __('trans.significant-other') }}</option>
                            <option value="married" {{ (old('marital-status') == 'married') ? 'selected' : '' }}>{{ __('trans.married') }}</option>
                            <option value="single" {{ (old('marital-status') == 'single') ? 'selected' : '' }}>{{ __('trans.single') }}</option>
                            <option value="divorced" {{ (old('marital-status') == 'divorced') ? 'selected' : '' }}>{{ __('trans.divorced') }}</option>
                        </select>
                    </div>
                </div>

                <!-- Contacts and address Patient -->
                <h2 class="col-12 title_section_form">Contacts and address</h2>

                <div class="col-12 data_row_form">
                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="cellphone">{{ __('validation.attributes.cellphone') }}</label>
                        <input type="number" class="input_dataGroup_form @error('cellphone') is-invalid @enderror" id="cellphone" name="cellphone" required value="{{ old('cellphone') }}">
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="phone">{{ __('validation.attributes.phone') }}</label>
                        <input type="number" class="input_dataGroup_form @error('phone') is-invalid @enderror" id="phone" name="phone" required value="{{ old('phone') }}">
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="email">{{ __('validation.attributes.email') }}</label>
                        <input type="email" class="input_dataGroup_form @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email') }}">
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="address">{{ __('validation.attributes.address') }}</label>
                        <input type="text" class="input_dataGroup_form @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}">
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="neighborhood">{{ __('validation.attributes.neighborhood') }}</label>
                        <input type="text" class="input_dataGroup_form @error('neighborhood') is-invalid @enderror" id="neighborhood" name="neighborhood" value="{{ old('neighborhood') }}">
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="city">{{ __('validation.attributes.city') }}</label>
                        <input type="text" class="input_dataGroup_form @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city') }}">
                    </div>
                </div>

                <!-- Medical security Patient -->
                <h2 class="col-12 title_section_form">Medical security</h2>

                <div class="col-12 data_row_form">
                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="medical-entity">{{ __('validation.attributes.medical-entity') }}</label>
                        <input type="text" class="input_dataGroup_form @error('medical-entity') is-invalid @enderror" id="medical-entity" name="medical-entity" required value="{{ old('medical-entity') }}">
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
                </div>

                <!-- Medical security Patient -->
                <h2 class="col-12 title_section_form">Additional Information</h2>

                <div class="col-12 data_row_form">
                    <div class="col-md-8 data_group_form">
                        <label for="observation">{{ __('validation.attributes.observation') }}</label>

                        <textarea cols="30" rows="10" class="form-control @error('observation') is-invalid @enderror" name="observation" id="observation">
                            {{ old('observation') }}
                        </textarea>
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

@endsection
