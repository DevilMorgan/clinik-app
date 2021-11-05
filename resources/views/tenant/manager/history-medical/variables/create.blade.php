@extends('tenant.layouts.app')

@section('styles')

@endsection

@section('content')
    <form action="{{ route('tenant.manager.history-medical-variables.store', ['type' => $type->id ]) }}" method="post" class="form">
        @csrf
        <div class="main_target_form">
            <div class="form_row">
                <!-- User information -->
                <h2 class="col-12 title_section_form">{{ __('manager.variable-information') }} ({{ __('manager.' . $type->name) }})</h2>

                <div class="col-12 data_row_form">
                    <div class="col-md-6 data_group_form">
                        <label for="name">{{ __('validation.attributes.name') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"  value="{{ old('name') }}">
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
                        <label for="category">{{ __('validation.attributes.category') }}</label>
                        <select class="form-control @error('category') is-invalid @enderror"
                                id="category" name="category">
                            <option></option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'checked':''}}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                            <option value="decimal" {{ old('type-numeric') == 'decimal' ? 'checked':''}}>{{ __('manager.decimal') }}</option>
                        </select>
                    </div>
                </div>

                @if($type->id == 1 || $type->id == 4 || $type->id == 5 || $type->id == 6)
                    <h2 class="col-12 title_section_form">{{ __('manager.config') }}</h2>
                @endif
                <div class="col-12 data_row_form">
                    @switch($type->id)
                        @case(1)
                        <div class="col-md-6 data_group_form">
                            <label for="type-numeric">{{ __('validation.attributes.type-numeric') }}</label>
                            <select class="form-control @error('type-numeric') is-invalid @enderror"
                                    id="type-numeric" name="type-numeric">
                                <option></option>
                                <option value="integer" {{ old('type-numeric') == 'integer' ? 'checked':''}}>{{ __('manager.integer') }}</option>
                                <option value="decimal" {{ old('type-numeric') == 'decimal' ? 'checked':''}}>{{ __('manager.decimal') }}</option>
                            </select>
                        </div>
                        @break
                        @case(4)
                        <div class="col-md-4 data_group_form">
                            <label for="step">{{ __('validation.attributes.step') }}</label>
                            <select class="form-control @error('step') is-invalid @enderror"
                                    id="step" name="step">
                                <option></option>
                                <option value="0.001" {{ old('type-numeric') == 0.001 ? 'checked':''}} >0.001</option>
                                <option value="0.01" {{ old('type-numeric') == 0.01 ? 'checked':''}} >0.01</option>
                                <option value="0.1" {{ old('type-numeric') == 0.1 ? 'checked':''}} >0.1</option>
                                <option value="1" {{ old('type-numeric') == 1 ? 'checked':''}} >1</option>
                                <option value="2" {{ old('type-numeric') == 2 ? 'checked':''}} >2</option>
                                <option value="5" {{ old('type-numeric') == 5 ? 'checked':''}} >5</option>
                            </select>
                        </div>
                        <div class="col-md-4 data_group_form">
                            <label for="min">{{ __('validation.attributes.min') }}</label>
                            <input type="number" class="form-control @error('min') is-invalid @enderror"
                                   id="min" name="min" />
                        </div>
                        <div class="col-md-4 data_group_form">
                            <label for="max">{{ __('validation.attributes.max') }}</label>
                            <input type="number" class="form-control @error('max') is-invalid @enderror"
                                   id="max" name="max" />
                        </div>
                        @break
                        @case(5)
                        <div class="col-md-4 data_group_form">
                            <label for="name-true">{{ __('validation.attributes.name-true') }}</label>
                            <input type="text" class="form-control @error('name-true') is-invalid @enderror"
                                   id="name-true" name="name-true" />
                        </div>
                        <div class="col-md-4 data_group_form">
                            <label for="value-true">{{ __('validation.attributes.value-true') }}</label>
                            <input type="text" class="form-control @error('value-true') is-invalid @enderror"
                                   id="value-true" name="value-true" />
                        </div>
                        <div class="col-md-4 data_group_form">
                            <label for="name-false">{{ __('validation.attributes.name-false') }}</label>
                            <input type="text" class="form-control @error('name-false') is-invalid @enderror"
                                   id="name-false" name="name-false" />
                        </div>
                        <div class="col-md-4 data_group_form">
                            <label for="name-false">{{ __('validation.attributes.value-false') }}</label>
                            <input type="text" class="form-control @error('name-false') is-invalid @enderror"
                                   id="name-false" name="name-false" />
                        </div>
                        @break
                        @case(6)
                        <div class="col-md-12 data_group_form">
                            <label for="is_multiple">{{ __('validation.attributes.is_multiple') }}</label>
                            <ul class="row m-0">
                                <li class="col-4 li_input_form">
                                    <input class="inputRadio_form @error('is_multiple') is-invalid @enderror"
                                           type="radio" value="1" id="is_multiple" name="is_multiple" {{ (old('is_multiple') == 1) ? 'checked':'' }}>
                                    {{ __('manager.yes') }}
                                </li>
                                <li class="col-4 li_input_form">
                                    <input class="inputRadio_form @error('is_multiple') is-invalid @enderror"
                                           type="radio" value="0" id="is_multiple" name="is_multiple" {{ (old('is_multiple') == 0) ? 'checked':'' }}>
                                    {{ __('manager.not') }}
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-8 data_group_form" id="div-list">
                            <label for="list">{{ __('validation.attributes.list') }}</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control @error('list.0') is-invalid @enderror"
                                       id="list" name="list[]" value="{{ old('list.0') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary" type="button" id="add-list">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            @php
                                $list = old('list');
                            @endphp
                            @if(!empty($list))
                                @foreach($list as $key => $item)
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control @error('list.' . $key) is-invalid @enderror"
                                               id="list" name="list[]" value="{{ old('list.' . $key) }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-danger remove-list" type="button" id="button-addon2">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        @break
                    @endswitch
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
    <script>
        @if($type->id == 6)
        $('#add-list').click(function (e) {
            $('#div-list').append(' <div class="input-group mb-3">' +
                '<input type="text" class="form-control" id="list" name="list[]">' +
                '<div class="input-group-append">' +
                '<button class="btn btn-outline-danger remove-list" type="button">' +
                '<i class="fas fa-trash"></i>' +
                '</button>' +
                '</div>' +
                '</div>');
        });
        $('#div-list').on('click', '.remove-list', function (e) {
            var btn = $(this);
            var content = btn.parent().parent();

            content.remove();
        });
        @endif
    </script>
@endsection
