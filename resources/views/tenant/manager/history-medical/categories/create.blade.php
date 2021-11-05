@extends('tenant.layouts.app')

@section('styles')

@endsection

@section('content')
    <form action="{{ route('tenant.manager.history-medical-categories.store') }}" method="post" class="form">
        @csrf
        <div class="main_target_form">
            <div class="form_row">
                <!-- User information -->
                <h2 class="col-12 title_section_form">{{ __('manager.category-information') }}</h2>

                <div class="col-12 data_row_form">
                    <div class="col-md-4 data_group_form">
                        <label for="name">{{ __('validation.attributes.name') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"  value="{{ old('name') }}">
                    </div>

                    <div class="col-md-4 data_group_form">
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

                    <div class="col-md-4 data_group_form">
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
                </div>
            </div>

            <div class="button_container_form">
                <a href="{{ route('tenant.manager.models-medical-history.index') }}" class="button_cancel_form">
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
