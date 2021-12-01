@extends('tenant.layouts.app')

@section('styles')

@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <nav aria-label="breadcrumb" class="agenda_path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.manager.provider-service.index') }}">
                        {{ __('manager.provider-service') }}
                    </a>
                </li>
            </ol>
        </nav>
    </nav>

    <form action="{{ route('tenant.manager.provider-service.update') }}" method="post" class="form" enctype="multipart/form-data">
        @csrf
        <div class="main_target_form">
            <div class="form_row">
                <!-- User information -->
                <h2 class="col-12 title_section_form">{{ __('manager.provider-service-information') }}</h2>

                <div class="col-8 col-md-3 col-xl-2 imgUser_container_form">
                    <img src="{{ (isset($perfil['LOGO'])) ? asset('tenancy/' . $perfil['LOGO']->config_data->value) : '' }}" class="img_user_form" id="img-logo">
                    <input type="file" class="input_imgUser_form" id="logo"  name="logo"
                           onchange="get_imagen('logo', 'img-logo')">
                    <label for="" class="label_imgUser_form">{{ __('manager.logo') }}</label>
                </div>

                <div class="col-12 col-md-9 col-xl-10 data_row_form">
                    <div class="col-md-6 data_group_form">
                        <label for="name">{{ __('validation.attributes.name') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name" required value="{{ old('name', (isset($perfil['NAME'])) ? $perfil['NAME']->config_data->value : null) }}">
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="phone">{{ __('validation.attributes.phone') }}</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                               id="phone" name="phone" required value="{{ old('phone', (isset($perfil['PHONE'])) ? $perfil['PHONE']->config_data->value:null) }}">
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="type_card">{{ __('validation.attributes.type_card') }}</label>
                        <select class="input_dataGroup_form" id="type_card" name="type_card" required>
                            <option></option>
                            @foreach($card_types as $item)
                                <option value="{{ $item->id }}" {{ old('type_card', (isset($perfil['TYPE_CARD'])) ? $perfil['TYPE_CARD']->config_data->value:null) == $item->id ? 'selected' : '' }}>{{ $item->name_short }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="id_card">{{ __('validation.attributes.id_card') }}</label>
                        <input type="text" class="input_dataGroup_form @error('id_card') is-invalid @enderror"
                               id="id_card" name="id_card" required value="{{ old('id_card', (isset($perfil['ID_CARD'])) ? $perfil['ID_CARD']->config_data->value:null) }}">
                    </div>
                </div>

                <div class="col-12 data_row_form">
                    <div class="col-md-4 data_group_form">
                        <label for="type_taxpayer">{{ __('validation.attributes.type_taxpayer') }}</label>
                        <select class="input_dataGroup_form @error('type_taxpayer') is-invalid @enderror"
                               id="type_taxpayer" name="type_taxpayer" required >
                            <option value="natural" {{ old('type_card', (isset($perfil['TYPE_TAXPAYER'])) ? $perfil['TYPE_TAXPAYER']->config_data->value:null) == 'natural' ? 'selected' : '' }}>Natural</option>
                            <option value="jurídica" {{ old('type_card', (isset($perfil['TYPE_TAXPAYER'])) ? $perfil['TYPE_TAXPAYER']->config_data->value:null) == 'jurídica' ? 'selected' : '' }}>Jurídica</option>
                        </select>
                    </div>

                    <div class="col-md-4 data_group_form">
                        <label for="email">{{ __('validation.attributes.email') }}</label>
                        <input type="email" class="input_dataGroup_form @error('email') is-invalid @enderror"
                               id="email" name="email" required value="{{ old('email', (isset($perfil['EMAIL'])) ? $perfil['EMAIL']->config_data->value:null) }}">
                    </div>

                    <div class="col-md-4 data_group_form">
                        <label for="city">{{ __('validation.attributes.city') }}</label>
                        <input type="text" class="input_dataGroup_form @error('city') is-invalid @enderror"
                               id="city" name="city" required value="{{ old('city', (isset($perfil['CITY'])) ? $perfil['CITY']->config_data->value:null) }}">
                    </div>
                </div>
            </div>

            <div class="container_button">
{{--                <a href="{{ route('tenant.manager.models-medical-history.index') }}" class="button_third">{{ __('trans.cancel') }}<i class="fas fa-times-circle pl-2"></i>--}}
{{--                </a>--}}
                <button type="submit" class="button_primary">
                    {{ __('trans.save') }}<i class="fas fa-save pl-2"></i>
                </button>
            </div>
        </div>
    </form>
@endsection

@section('scripts')

@endsection
