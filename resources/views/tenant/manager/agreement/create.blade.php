@extends('tenant.layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugin/jquery-ui-1.13/jquery-ui.min.css') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <nav aria-label="breadcrumb" class="agenda_path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.operative.agreement.index') }}">
                        {{ __('trans.agreements') }}
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.operative.agreement.create') }}">
                        {{ __('trans.add-agreement') }}
                    </a>
                </li>
            </ol>
        </nav>
    </nav>

    <form action="{{ route('tenant.operative.agreement.store') }}" method="post" class="form">
        @csrf
        <div class="main_target_form">
            <div class="form_row">
                <h2 class="col-12 title_section_form">{{ __('trans.agreement-information') }}</h2>

                <div class="col-12 data_row_form">
                    <div class="col-md-6 data_group_form">
                        <label for="name">{{ __('validation.attributes.name') }}(*)</label>
                        <input type="text" class="input_dataGroup_form @error('name') is-invalid @enderror"
                               id="name" name="name" value="{{ old('name') }}" required>
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="second_name">{{ __('validation.attributes.second_name') }}</label>
                        <input type="text" class="input_dataGroup_form @error('second_name') is-invalid @enderror"
                               id="second_name" name="second_name" value="{{ old('second_name') }}">
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="first_lastname">{{ __('validation.attributes.first_lastname') }}</label>
                        <input type="text" class="input_dataGroup_form @error('first_lastname') is-invalid @enderror"
                               id="first_lastname" name="first_lastname" value="{{ old('first_lastname') }}">
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="second_lastname">{{ __('validation.attributes.second_lastname') }}</label>
                        <input type="text" class="input_dataGroup_form @error('second_lastname') is-invalid @enderror"
                               id="second_lastname" name="second_lastname" value="{{ old('second_lastname') }}">
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="email">{{ __('validation.attributes.email') }}(*)</label>
                        <input type="email" class="input_dataGroup_form @error('email') is-invalid @enderror"
                               id="email" name="email" value="{{ old('email') }}" required>
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="email_optional">{{ __('validation.attributes.email_optional') }}</label>
                        <input type="email" class="input_dataGroup_form @error('email_optional') is-invalid @enderror"
                               id="email_optional" name="email_optional" value="{{ old('email_optional') }}">
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="code">{{ __('validation.attributes.code') }}(*)</label>
                        <input type="text" class="input_dataGroup_form @error('code') is-invalid @enderror"
                               id="code" name="code" value="{{ old('code') }}" required>
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="type_card">{{ __('validation.attributes.type_card') }}(*)</label>
                        <select class="input_dataGroup_form" id="type_card" name="type_card" required>
                            <option></option>
                            @foreach($card_types as $item)
                                <option value="{{ $item->id }}" {{ old('type_card') == $item->id ? 'selected' : '' }}>
                                    {{ $item->name_short }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="id_card">{{ __('validation.attributes.id_card') }}(*)</label>
                        <input type="text" class="input_dataGroup_form @error('id_card') is-invalid @enderror"
                               id="id_card" name="id_card" required value="{{ old('id_card') }}">
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="code_agreement">{{ __('validation.attributes.code_agreement') }}(*)</label>
                        <input type="text" class="input_dataGroup_form @error('code_agreement') is-invalid @enderror"
                               id="code_agreement" name="code_agreement" value="{{ old('code_agreement') }}">
                    </div>
                    <div class="col-md-6 data_group_form">
                        <label for="country">{{ __('validation.attributes.country') }}</label>
                        <input type="text" class="input_dataGroup_form @error('country') is-invalid @enderror country"
                               id="country" name="country" required value="{{ old('country') }}">
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="department">{{ __('validation.attributes.department') }}</label>
                        <input type="text" class="input_dataGroup_form @error('department') is-invalid @enderror department"
                               id="department" name="department" required value="{{ old('department') }}">
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="city">{{ __('validation.attributes.city') }}</label>
                        <input type="text" class="input_dataGroup_form @error('city') is-invalid @enderror city"
                               id="city" name="city" required value="{{ old('city') }}">
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="neighborhood">{{ __('validation.attributes.neighborhood') }}</label>
                        <input type="text" class="input_dataGroup_form @error('neighborhood') is-invalid @enderror"
                               id="neighborhood" name="neighborhood" value="{{ old('neighborhood') }}">
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="address">{{ __('validation.attributes.address') }}(*)</label>
                        <input type="text" class="input_dataGroup_form @error('address') is-invalid @enderror"
                               id="address" name="address" value="{{ old('address') }}" required>
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="address_type">{{ __('validation.attributes.address_type') }}</label>
                        <select class="input_dataGroup_form" id="address_type" name="address_type" >
                            <option value="house" {{ old('address_type') == 'house' ? 'selected':'' }}>{{ __('trans.house') }}</option>
                            <option value="office" {{ old('address_type') == 'office' ? 'selected':'' }}>{{ __('trans.office') }}</option>
                            <option value="surgery" {{ old('address_type') == 'surgery' ? 'selected':'' }}>{{ __('trans.surgery') }}</option>
                        </select>
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="postcode">{{ __('validation.attributes.postcode') }}</label>
                        <input type="text" class="input_dataGroup_form @error('postcode') is-invalid @enderror"
                               id="postcode" name="postcode" value="{{ old('postcode') }}">
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="economic_activity">{{ __('validation.attributes.economic_activity') }}</label>
                        <input type="text" class="input_dataGroup_form @error('economic_activity') is-invalid @enderror"
                               id="economic_activity" name="economic_activity" value="{{ old('economic_activity') }}">
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="business_type">{{ __('validation.attributes.business_type') }}</label>
                        <select class="input_dataGroup_form" id="business_type" name="business_type" >
                            <option value="private" {{ old('business_type') == 'private' ? 'selected':'' }}>{{ __('trans.private') }}</option>
                            <option value="public" {{ old('business_type') == 'public' ? 'selected':'' }}>{{ __('trans.public') }}</option>
                            <option value="mix" {{ old('business_type') == 'mix' ? 'selected':'' }}>{{ __('trans.mix') }}</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="container_button"> <!-- Buttons -->
                <a href="{{ route('tenant.operative.agreement.index') }}" type="submit" class="button_third">
                    {{ __('trans.cancel') }} <i class="fas fa-times-circle pl-2"></i>
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
@endsection
