@extends('tenant.layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugin/select2/css/select2.min.css') }}">
{{--    <link rel="stylesheet" href="{{ asset('plugin/select2/css/select2-bootstrap4.min.css') }}">--}}
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
                    <a href="{{ route('tenant.manager.history-medical-categories.create') }}">
                        {{ __('manager.add-category') }}
                    </a>
                </li>
            </ol>
        </nav>
    </nav>

    <form action="{{ route('tenant.manager.history-medical-categories.store') }}" method="post" class="form">
        @csrf
        <div class="main_target_form">
            <div class="form_row">
                <!-- User information -->
                <h2 class="col-12 title_section_form">{{ __('manager.category-information') }}</h2>

                <div class="col-12 data_row_form">
                    <div class="col-md-6 data_group_form">
                        <label for="name">{{ __('validation.attributes.name') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"  value="{{ old('name') }}">
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="models">{{ __('validation.attributes.models') }}</label>
                        <select class="form-control @error('models') is-invalid @enderror"
                               id="models" name="models[]" multiple>
                            @foreach($models as $model)
                                <option value="{{ $model->id }}" {{ (collect(old('models'))->contains($model->id)) ? 'selected':'' }}>{{ $model->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="is_various">{{ __('validation.attributes.is_various') }}</label>
                        <ul class="row m-0">
                            <li class="col-4 li_input_form">
                                <input class="inputRadio_form @error('is_various') is-invalid @enderror"
                                       type="radio" value="1" id="is_various" name="is_various" {{ (old('is_various') == 1) ? 'checked':'' }}>
                                {{ __('manager.yes') }}
                            </li>
                            <li class="col-4 li_input_form">
                                <input class="inputRadio_form @error('is_various') is-invalid @enderror"
                                       type="radio" value="0" id="is_various" name="is_various" {{ (old('is_various') == 0) ? 'checked':'' }}>
                                {{ __('manager.not') }}
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="status">{{ __('validation.attributes.status') }}</label>
                        <ul class="row m-0">
                            <li class="col-4 li_input_form">
                                <input class="inputRadio_form @error('status') is-invalid @enderror"
                                       type="radio" value="1" id="status" name="status" {{ (old('status') == 1) ? 'checked':'' }}>
                                {{ __('trans.active') }}
                            </li>
                            <li class="col-4 li_input_form">
                                <input class="inputRadio_form @error('status') is-invalid @enderror"
                                       type="radio" value="0" id="status" name="status" {{ (old('status') == 0) ? 'checked':'' }}>
                                {{ __('trans.inactive') }}
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="">{{ __('validation.attributes.status') }}</label>
                        <p>
                        <div class="form-check form-check-inline @error('status') is-invalid @enderror">
                            <input class="form-check-input" type="radio" name="end_records" id="end_records-1"
                                   value="option1" {{ (old('end_records') == 1) ? 'checked':'' }}>
                            <label class="form-check-label" for="end_records-1">{{ __('trans.active') }}</label>
                        </div>
                        <div class="for-check form-check-inline @error('status') is-invalid @enderror">
                            <input class="form-check-input" type="radio" name="end_records" id="end_records-0"
                                   value="option1" {{ (old('end_records') == 0) ? 'checked':'' }}>
                            <label class="form-check-label" for="end_records-0">{{ __('trans.inactive') }}</label>
                        </div>
                    </div>

                </div>
            </div>

            <div class="button_container_form">
                <a href="{{ route('tenant.manager.history-medical-categories.index') }}" class="button_cancel_form">
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
