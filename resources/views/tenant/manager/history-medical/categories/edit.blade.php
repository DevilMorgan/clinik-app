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
                        <label for="name">{{ __('validation.attributes.name') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                               value="{{ old('name', $history_medical_category->name) }}">
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="models">{{ __('validation.attributes.models') }}</label>
                        @php
                            $oldModels = old('models', $oldModelsArray);
                        @endphp
                        <select class="form-control @error('models') is-invalid @enderror"
                                id="models" name="models[]" multiple>
                            @foreach($models as $model)
                                <option value="{{ $model->id }}" {{ (collect($oldModels)->contains($model->id)) ? 'selected':'' }}>{{ $model->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="is_various">{{ __('validation.attributes.is_various') }}</label>
                        <ul class="row m-0">
                            <li class="col-4 li_input_form">
                                <input class="inputRadio_form @error('is_various') is-invalid @enderror"
                                       type="radio" value="1" id="is_various" name="is_various"
                                    {{ (old('is_various', $history_medical_category->is_various) == 1) ? 'checked':'' }}>
                                {{ __('manager.yes') }}
                            </li>
                            <li class="col-4 li_input_form">
                                <input class="inputRadio_form @error('is_various') is-invalid @enderror"
                                       type="radio" value="0" id="is_various" name="is_various"
                                    {{ (old('is_various', $history_medical_category->is_various) == 0) ? 'checked':'' }}>
                                {{ __('manager.not') }}
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="status">{{ __('validation.attributes.status') }}</label>
                        <ul class="row m-0">
                            <li class="col-4 li_input_form">
                                <input class="inputRadio_form @error('status') is-invalid @enderror"
                                       type="radio" value="1" id="status" name="status"
                                    {{ (old('status', $history_medical_category->status) == 1) ? 'checked':'' }}>
                                {{ __('trans.active') }}
                            </li>
                            <li class="col-4 li_input_form">
                                <input class="inputRadio_form @error('status') is-invalid @enderror"
                                       type="radio" value="0" id="status" name="status"
                                    {{ (old('status', $history_medical_category->status) == 0) ? 'checked':'' }}>
                                {{ __('trans.inactive') }}
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="">{{ __('validation.attributes.end_records') }}</label>
                        <br>
                        <div class="form-check form-check-inline @error('end_records') is-invalid @enderror">
                            <input class="form-check-input" type="radio" id="end_records-1" name="end_records" value="1"
                                {{ (old('end_records', $history_medical_category->end_records) == 1) ? 'checked':'' }}>
                            <label class="form-check-label" for="end_records-1">{{ __('trans.active') }}</label>
                        </div>
                        <div class="form-check form-check-inline @error('end_records') is-invalid @enderror">
                            <input class="form-check-input" type="radio" id="end_records-0" name="end_records" value="0"
                                {{ (old('end_records', $history_medical_category->end_records) == 0) ? 'checked':'' }}>
                            <label class="form-check-label" for="end_records-0">{{ __('trans.inactive') }}</label>
                        </div>
                    </div>

                </div>
            </div>

            <div class="container_button">
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
