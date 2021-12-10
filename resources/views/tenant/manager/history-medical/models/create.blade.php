@extends('tenant.layouts.app')

@section('styles')

@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <nav aria-label="breadcrumb" class="agenda_path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.manager.models-medical-history.index') }}">
                        {{ __('manager.models') }}
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.manager.models-medical-history.create') }}">
                        {{ __('manager.add-model') }}
                    </a>
                </li>
            </ol>
        </nav>
    </nav>

    <form action="{{ route('tenant.manager.models-medical-history.store') }}" method="post" class="form">
        @csrf
        <div class="main_target_form">
            <div class="form_row">
                <!-- User information -->
                <h2 class="col-12 title_section_form">{{ __('manager.model-information') }}</h2>

                <div class="col-12 data_row_form">
                    <div class="col-md-6 data_group_form">
                        <label for="name">{{ __('validation.attributes.name') }}</label>
                        <input type="text" class="input_dataGroup_form @error('name') is-invalid @enderror" id="name" name="name"  value="{{ old('name') }}">
                    </div>

                    <div class="col-md-6 data_group_form"> <!-- Input type radius -->
                        <div class="pr-0 pl-0 pr-md-2">
                            <label class="label_input_radio">{{ __('validation.attributes.status') }}</label>

                            <div class="row row_input_radio">
                                <div class="col-5 col-xl-3 content_input_radio @error('status') is-invalid @enderror">
                                    <input class="mr-1" type="radio" id="status-1" value="1" name="status" {{ (old('status') == 1) ? 'checked':'' }}>
                                       <label class="form-check-label" for="status-1">{{ __('trans.active') }}</label>
                                </div>

                                <div class="col-5 col-xl-3 content_input_radio @error('status') is-invalid @enderror">
                                    <input class="mr-1" type="radio" id="status-0" value="0" name="status" {{ (old('status') == 0) ? 'checked':'' }}>
                                       <label class="form-check-label" for="status-0">{{ __('trans.inactive') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container_button"> <!-- Botones inferiores -->
                <a href="{{ route('tenant.manager.models-medical-history.index') }}" class="button_third">{{ __('trans.cancel') }}
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
