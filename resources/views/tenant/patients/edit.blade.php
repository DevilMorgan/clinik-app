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
                    <a href="{{ route('tenant.patients.edit', ['patient' => $patient->id]) }}">
                        {{ __('trans.edit-patients') }}
                    </a>
                </li>
            </ol>
        </nav>
    </nav>
    <form action="{{ route('tenant.patients.edit', ['patient' => $patient->id]) }}" method="post" class="form" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="main_target_form">
            <div class="form_row">
                <!-- Basic data patient -->
                <h2 class="col-12 title_section_form">Personal information</h2>

                <div class="col-8 col-md-3 col-xl-2 imgUser_container_form">
                    <img src="{{ asset($patient->photo) }}" alt="" class="img_user_form">
                    <input type="file" class="input_imgUser_form" id="photo" name="photo">
                    <label for="" class="label_imgUser_form">User photo</label>
                </div>

                <div class="col-12 col-md-9 col-xl-10 data_row_form">
                    <div class="col-md-6 data_group_form">
                        <label for="name">{{ __('validation.attributes.name') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"  value="{{ old('name', $patient->name) }}">
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="last_name">{{ __('validation.attributes.last_name') }}</label>
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" required value="{{ old('last_name', $patient->last_name) }}">
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="type_card">{{ __('validation.attributes.type_card') }}</label>
                        <select class="form-control" id="type_card" name="type_card" required>
                            <option></option>
                            @foreach($card_types as $item)
                                <option value="{{ $item->id }}" {{ old('type_card', $patient->card_type_id) == $item->id ? 'selected' : '' }}>{{ $item->name_short }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="id_card">{{ __('validation.attributes.id_card') }}</label>
                        <input type="text" class="form-control @error('id_card') is-invalid @enderror" id="id_card" name="id_card" required value="{{ old('id_card', $patient->id_card) }}">
                    </div>
                </div>

                <div class="col-12 data_row_form">
                    <div class="col-md-6 col-xl-4 data_group_form">
                        <label for="date-birth">{{ __('validation.attributes.date-birth') }}</label>
                        <input type="date" class="form-control @error('date-birth') is-invalid @enderror" id="date-birth"
                               name="date-birth" value="{{ old('date-birth', $patient->date_birth) }}">
                    </div>

                    <div class="col-md-6 col-xl-4 data_group_form">
                        <label for="place-birth">{{ __('validation.attributes.place-birth') }}</label>
                        <input type="text" class="form-control @error('place-birth') is-invalid @enderror" id="place-birth"
                               name="place-birth" value="{{ old('place-birth', $patient->place_birth) }}">
                    </div>

                    <div class="col-md-6 col-xl-4 data_group_form">
                        <label for="age">{{ __('validation.attributes.age') }}</label>
                        <input type="text" class="form-control @error('age') is-invalid @enderror" id="age"
                               name="age" value="{{ old('age', $patient->age) }}">
                    </div>

                    <div class="col-md-6 col-xl-4 data_group_form">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                            <option value="male" {{ old('gender', $patient->gender) == 'male' ? 'selected' : ''}}>{{ __('trans.male') }}</option>
                            <option value="feminine" {{ old('gender', $patient->gender) == 'feminine' ? 'selected' : ''}}>{{ __('trans.feminine') }}</option>
                        </select>
                    </div>

                    <div class="col-md-6 col-xl-4 data_group_form">
                        <label for="occupation">{{ __('validation.attributes.occupation') }}</label>
                        <input type="text" class="form-control @error('occupation') is-invalid @enderror" id="occupation"
                               name="occupation" value="{{ old('occupation', $patient->occupation) }}">
                    </div>

                    <div class="col-md-6 col-xl-4 data_group_form">
                        <label for="marital-status">{{ __('validation.attributes.marital-status') }}</label>

                        <select class="form-control @error('marital-status') is-invalid @enderror" id="marital-status"
                                name="marital-status">
                            <option></option>
                            <option value="significant other" {{ (old('marital-status', $patient->marital_status) == 'significant other') ? 'selected' : '' }}>{{ __('trans.significant-other') }}</option>
                            <option value="married" {{ (old('marital-status', $patient->marital_status) == 'married') ? 'selected' : '' }}>{{ __('trans.married') }}</option>
                            <option value="single" {{ (old('marital-status', $patient->marital_status) == 'single') ? 'selected' : '' }}>{{ __('trans.single') }}</option>
                            <option value="divorced" {{ (old('marital-status', $patient->marital_status) == 'divorced') ? 'selected' : '' }}>{{ __('trans.divorced') }}</option>
                        </select>
                    </div>
                </div>

                <!-- Contacts and address Patient -->
                <h2 class="col-12 title_section_form">Contacts and address</h2>

                <div class="col-12 data_row_form">
                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="cellphone">{{ __('validation.attributes.cellphone') }}</label>
                        <input type="number" class="form-control @error('cellphone') is-invalid @enderror" id="cellphone" name="cellphone" required value="{{ old('cellphone', $patient->cellphone) }}">
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="phone">{{ __('validation.attributes.phone') }}</label>
                        <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone"
                               name="phone" required value="{{ old('phone', $patient->phone) }}">
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="email">{{ __('validation.attributes.email') }}</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                               name="email" required value="{{ old('email', $patient->email) }}">
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="address">{{ __('validation.attributes.address') }}</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                               name="address" value="{{ old('address', $patient->address) }}">
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="neighborhood">{{ __('validation.attributes.neighborhood') }}</label>
                        <input type="text" class="form-control @error('neighborhood') is-invalid @enderror" id="neighborhood"
                               name="neighborhood" value="{{ old('neighborhood', $patient->neighborhood) }}">
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="city">{{ __('validation.attributes.city') }}</label>
                        <input type="text" class="form-control @error('city') is-invalid @enderror" id="city"
                               name="city" value="{{ old('city', $patient->city) }}">
                    </div>
                </div>

                <!-- Medical security Patient -->
                <h2 class="col-12 title_section_form">Medical security</h2>

                <div class="col-12 data_row_form">
                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="medical-entity">{{ __('validation.attributes.medical-entity') }}</label>
                        <input type="text" class="form-control @error('medical-entity') is-invalid @enderror"
                               id="medical-entity" name="medical-entity" required value="{{ old('medical-entity', $patient->entity) }}">
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="contributory-regime">{{ __('validation.attributes.contributory-regime') }}</label>
                        <input type="text" class="form-control  @error('contributory-regime') is-invalid @enderror"
                               id="contributory-regime" name="contributory-regime" value="{{ old('contributory-regime', $patient->contributory_regime) }}">
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="status-medical">{{ __('validation.attributes.status-medical') }}</label>
                        <ul class="row m-0">
                            <li class="col-4 li_input_form">
                                <input class="inputRadio_form @error('status-medical') is-invalid @enderror"
                                       type="radio" value="1" id="status-medical" name="status-medical" {{ (old('status-medical', $patient->status_medical) == 1) ? 'checked':'' }}>
                                {{ __('trans.active') }}
                            </li>
                            <li class="col-4 li_input_form">
                                <input class="inputRadio_form @error('status-medical') is-invalid @enderror"
                                       type="radio" value="0" id="status-medical" name="status-medical" {{ (old('status-medical', $patient->status_medical) == 0) ? 'checked':'' }}>
                                {{ __('trans.inactive') }}
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Medical security Patient -->
                <h2 class="col-12 title_section_form">Additional Information</h2>

                <div class="col-12 data_row_form">
                    <div class="col-md-8 data_group_form">
                        <label for="observation">{{ __('validation.attributes.observation') }}</label>
                        <textarea cols="30" rows="10" class="form-control @error('observation') is-invalid @enderror"
                                  name="observation" id="observation">
                            {{ old('observation') }}
                        </textarea>
                    </div>

                    <div class="col-md-4 data_group_form">
                        <label for="status">{{ __('validation.attributes.status') }}</label>
                        <ul class="row m-0">
                            <li class="col-4 li_input_form">
                                <input class="inputRadio_form @error('status') is-invalid @enderror"
                                       type="radio" value="1" id="status" name="status" {{ (old('status', $patient->status) == 1) ? 'checked':'' }}>
                                {{ __('trans.active') }}
                            </li>
                            <li class="col-4 li_input_form">
                                <input class="inputRadio_form @error('status') is-invalid @enderror"
                                       type="radio" value="0" id="status" name="status" {{ (old('status', $patient->status) == 0) ? 'checked':'' }}>
                                {{ __('trans.inactive') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="button_container_form">
                <a href="{{ route('tenant.patients.index') }}" type="submit" class="button_cancel_form">
                    {{ __('trans.cancel') }}<i class="fas fa-times-circle"></i>
                </a>
                <button type="submit" class="button_save_form">
                    {{ __('trans.save') }}<i class="fas fa-save"></i>
                </button>
            </div>
        </div>
    </form>
@endsection

@section('scripts')

@endsection
