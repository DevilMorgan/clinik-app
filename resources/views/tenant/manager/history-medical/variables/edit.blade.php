@extends('tenant.layouts.app')

@section('styles')

@endsection

@section('content')
    <form action="{{ route('tenant.manager.history-medical-variables.update', ['variable' => $variable->id]) }}" method="post" class="form">
        @csrf
        @method('put')
        <div class="main_target_form">
            <div class="form_row">
                <!-- User information -->
                <h2 class="col-12 title_section_form">
                    {{ __('manager.variable-information') }}
                    ({{ __('manager.' . $variable->variable_type->name) }})
                </h2>

                <div class="col-12 data_row_form">
                    <div class="col-md-6 data_group_form">
                        <label for="name">{{ __('validation.attributes.name') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"  value="{{ old('name', $variable->name) }}">
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="status">{{ __('validation.attributes.status') }}</label>
                        <ul class="row m-0">
                            <li class="col-4 li_input_form">
                                <input class="inputRadio_form @error('status') is-invalid @enderror"
                                       type="radio" value="1" id="status" name="status" {{ (old('status', $variable->status) == 1) ? 'checked':'' }}>
                                {{ __('trans.active') }}
                            </li>
                            <li class="col-4 li_input_form">
                                <input class="inputRadio_form @error('status') is-invalid @enderror"
                                       type="radio" value="0" id="status" name="status" {{ (old('status', $variable->status) == 0) ? 'checked':'' }}>
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
                                <option value="{{ $category->id }}"
                                    {{ (old('category', $variable->history_medical_category_id) == $category->id) ? 'selected':''}}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                @if($variable->variable_type_id == 1 || $variable->variable_type_id == 4 || $variable->variable_type_id == 5 || $variable->variable_type_id == 6)
                    <h2 class="col-12 title_section_form">{{ __('manager.config') }}</h2>
                @endif
                <div class="col-12 data_row_form">
                    @switch($variable->variable_type_id)
                        @case(1)
                        <div class="col-md-6 data_group_form">
                            <label for="type-numeric">{{ __('validation.attributes.type-numeric') }}</label>
                            <select class="form-control @error('type-numeric') is-invalid @enderror"
                                    id="type-numeric" name="type-numeric">
                                <option></option>
                                <option value="integer" {{ old('type-numeric', $variable->config['type-numeric']) == 'integer' ? 'selected':''}}>
                                    {{ __('manager.integer') }}
                                </option>
                                <option value="decimal" {{ old('type-numeric', $variable->config['type-numeric']) == 'decimal' ? 'selected':''}}>
                                    {{ __('manager.decimal') }}
                                </option>
                            </select>
                        </div>
                        @break
                        @case(4)
                        <div class="col-md-4 data_group_form">
                            <label for="step">{{ __('validation.attributes.step') }}</label>
                            <select class="form-control @error('step') is-invalid @enderror"
                                    id="step" name="step">
                                <option></option>
                                <option value="0.001" {{ old('step', $variable->config['step']) == 0.001 ? 'selected':''}} >0.001</option>
                                <option value="0.01" {{ old('step', $variable->config['step']) == 0.01 ? 'selected':''}} >0.01</option>
                                <option value="0.1" {{ old('step', $variable->config['step']) == 0.1 ? 'selected':''}} >0.1</option>
                                <option value="1" {{ old('step', $variable->config['step']) == 1 ? 'selected':''}} >1</option>
                                <option value="2" {{ old('step', $variable->config['step']) == 2 ? 'selected':''}} >2</option>
                                <option value="5" {{ old('step', $variable->config['step']) == 5 ? 'selected':''}} >5</option>
                            </select>
                        </div>
                        <div class="col-md-4 data_group_form">
                            <label for="min">{{ __('validation.attributes.min') }}</label>
                            <input type="number" class="form-control @error('min') is-invalid @enderror"
                                   id="min" name="min" value="{{ old('min', $variable->config['min']) }}"/>
                        </div>
                        <div class="col-md-4 data_group_form">
                            <label for="max">{{ __('validation.attributes.max') }}</label>
                            <input type="number" class="form-control @error('max') is-invalid @enderror"
                                   id="max" name="max" value="{{ old('max', $variable->config['max']) }}"/>
                        </div>
                        @break
                        @case(5)
                        <div class="col-md-4 data_group_form">
                            <label for="name-true">{{ __('validation.attributes.name-true') }}</label>
                            <input type="text" class="form-control @error('name-true') is-invalid @enderror"
                                   id="name-true" name="name-true" value="{{ old('name-true', $variable->config['name-true']) }}"/>
                        </div>
                        <div class="col-md-4 data_group_form">
                            <label for="value-true">{{ __('validation.attributes.value-true') }}</label>
                            <input type="text" class="form-control @error('value-true') is-invalid @enderror"
                                   id="value-true" name="value-true" value="{{ old('value-true', $variable->config['value-true']) }}"/>
                        </div>
                        <div class="col-md-4 data_group_form">
                            <label for="name-false">{{ __('validation.attributes.name-false') }}</label>
                            <input type="text" class="form-control @error('name-false') is-invalid @enderror"
                                   id="name-false" name="name-false" value="{{ old('name-false', $variable->config['name-false']) }}"/>
                        </div>
                        <div class="col-md-4 data_group_form">
                            <label for="value-false">{{ __('validation.attributes.value-false') }}</label>
                            <input type="text" class="form-control @error('value-false') is-invalid @enderror"
                                   id="value-false" name="value-false" value="{{ old('value-false', $variable->config['name-false']) }}"/>
                        </div>
                        @break
                        @case(6)
                        <div class="col-md-12 data_group_form">
                            <label for="is_multiple">{{ __('validation.attributes.is_multiple') }}</label>
                            <ul class="row m-0">
                                <li class="col-4 li_input_form">
                                    <input class="inputRadio_form @error('is_multiple') is-invalid @enderror"
                                           type="radio" value="1" id="is_multiple" name="is_multiple"
                                        {{ (old('is_multiple', $variable->config['is_multiple']) == 1) ? 'checked':'' }}>
                                    {{ __('manager.yes') }}
                                </li>
                                <li class="col-4 li_input_form">
                                    <input class="inputRadio_form @error('is_multiple') is-invalid @enderror"
                                           type="radio" value="0" id="is_multiple" name="is_multiple"
                                        {{ (old('is_multiple', $variable->config['is_multiple']) == 0) ? 'checked':'' }}>
                                    {{ __('manager.not') }}
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-8 data_group_form" id="div-list">
                            @php
                                $list = old('list', $variable->config['list']);
                            @endphp
                            <label for="list">{{ __('validation.attributes.list') }}</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control @error('list.0') is-invalid @enderror"
                                       id="list" name="list[]" value="{{ $list[0] }}">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary" type="button" id="add-list">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            @if(!empty($list))
                                @foreach($list as $key => $item)
                                    @if($key != 0)
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control @error('list.' . $key) is-invalid @enderror"
                                                   id="list" name="list[]" value="{{ $item }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-danger remove-list" type="button" id="button-addon2">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endif
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
        @if($variable->variable_type_id == 6)
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
