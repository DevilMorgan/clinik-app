@extends('tenant.layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugin/select2/css/select2.min.css') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <nav aria-label="breadcrumb" class="agenda_path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.patients.index') }}">
                        {{ __('manager.categories') }}
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.manager.history-medical-categories.edit', ['history_medical_category' => $history_medical_category->id]) }}">
                        {{ __('manager.edit-category') }}
                    </a>
                </li>
            </ol>
        </nav>
    </nav>

    <form action="{{ route('tenant.manager.history-medical-categories.update', ['history_medical_category' => $history_medical_category->id]) }}" method="post" class="form">
        @csrf
        @method('put')
        <div class="main_target_form">
            <div class="form_row">
                <!-- User information -->
                <h2 class="col-12 title_section_form">{{ __('manager.category-information') }}</h2>

                <div class="col-12 data_row_form">
                    <div class="col-md-6 data_group_form">
                        <label for="">{{ __('validation.attributes.name') }}</label>
                        <input type="text" class="input_dataGroup_form @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $history_medical_category->name) }}">
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label style="width: 100%">{{ __('validation.attributes.models') }}</label>
                        @php
                            $oldModels = old('models', $oldModelsArray);
                        @endphp
                        <select class="input_dataGroup_form @error('models') is-invalid @enderror" style="width: 100%" id="models" name="models[]" multiple>
                            @foreach($models as $model)
                                <option value="{{ $model->id }}" {{ (collect($oldModels)->contains($model->id)) ? 'selected':'' }}>{{ $model->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 data_group_form"> <!-- Input type radius -->
                        <div class="row m-0">
                            <div class="col-md-6 mb-3 pr-0 pl-0 mb-md-0 pr-md-2">
                                <label class="label_input_radio">{{ __('validation.attributes.is_various') }}</label>

                                <div class="row row_input_radio">
                                    <div class="col-5 col-xl-3 content_input_radio @error('is_various') is-invalid @enderror">
                                        <input class="mr-1" type="radio" id="is_various-1" value="1" name="is_various" {{ (old('is_various', $history_medical_category->is_various) == 1) ? 'checked':'' }}>
                                        <label class="form-check-label" for="is_various-1">{{ __('manager.yes') }}</label>
                                    </div>

                                    <div class="col-5 col-xl-3 content_input_radio @error('is_various') is-invalid @enderror">
                                        <input class="mr-1" type="radio" id="is_various-0" value="0" name="is_various" {{ (old('is_various', $history_medical_category->is_various) == 0) ? 'checked':'' }}>
                                        <label class="form-check-label" for="is_various-0">{{ __('manager.not') }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 pl-0 pr-0 pl-md-2">
                                <label class="label_input_radio">{{ __('validation.attributes.status') }}</label>

                                <div class="row row_input_radio">
                                    <div class="col-5 col-xl-3 content_input_radio @error('status') is-invalid @enderror">
                                        <input class="mr-1" type="radio" id="status-1" value="1" name="status" {{ (old('status', $history_medical_category->status) == 1) ? 'checked':'' }}>
                                        <label class="form-check-label" for="status-1">{{ __('trans.active') }}</label>
                                    </div>

                                    <div class="col-5 col-xl-3 content_input_radio @error('status') is-invalid @enderror">
                                        <input class="mr-1" type="radio" id="status-0" value="0" name="status" {{ (old('status', $history_medical_category->status) == 0) ? 'checked':'' }}>
                                        <label class="form-check-label" for="status-0">{{ __('trans.inactive') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 data_group_form"> <!-- Input type radius -->
                        <div class="row m-0">
                            <div class="col-md-6 mb-3 pr-0 pl-0 mb-md-0 pr-md-2">
                                <label class="label_input_radio">{{ __('validation.attributes.end_records') }}</label>
                
                                <div class="row row_input_radio">
                                    <div class="col-5 col-xl-3 content_input_radio @error('end_records') is-invalid @enderror">
                                        <input class="mr-1" type="radio" id="end_records-1" name="end_records" value="1" {{ (old('end_records', $history_medical_category->end_records) == 1) ? 'checked':'' }}>
                                        <label class="form-check-label" for="end_records-1">{{ __('trans.active') }}</label>
                                    </div>

                                    <div class="col-5 col-xl-3 content_input_radio @error('end_records') is-invalid @enderror">
                                        <input class="mr-1" type="radio" id="end_records-0" name="end_records" value="0" {{ (old('end_records', $history_medical_category->end_records) == 0) ? 'checked':'' }}>
                                        <label class="form-check-label" for="end_records-0">{{ __('trans.inactive') }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 pl-0 pr-0 pl-md-2">
                                <label class="label_input_radio">{{ __('validation.attributes.required') }}</label>
                                
                                <div class="row row_input_radio">
                                    <div class="col-5 col-xl-3 content_input_radio @error('required') is-invalid @enderror">
                                        <input class="mr-1" type="radio" id="required-1" name="required" value="1" {{ (old('required', $history_medical_category->required) == 1) ? 'checked':'' }}>
                                        <label class="form-check-label" for="required-1">{{ __('manager.yes') }}</label>
                                    </div>

                                    <div class="col-5 col-xl-3 content_input_radio @error('required') is-invalid @enderror">
                                        <input class="mr-1" type="radio" id="required-0" name="required" value="0" {{ (old('required', $history_medical_category->required) == 0) ? 'checked':'' }}>
                                        <label class="form-check-label" for="required-0">{{ __('manager.not') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container_button"> <!-- Botones inferiores -->
                <a href="{{ route('tenant.manager.history-medical-categories.index') }}" class="button_third">{{ __('trans.cancel') }}
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
    <script src="{{ asset('plugin/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('plugin/select2/js/i18n/es.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#models').select2({
                language: 'es',
                theme: 'classic',
            });
        });
    </script>
@endsection
