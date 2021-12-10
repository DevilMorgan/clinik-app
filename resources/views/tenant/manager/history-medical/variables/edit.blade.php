@extends('tenant.layouts.app')

@section('styles')

@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <nav aria-label="breadcrumb" class="agenda_path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.manager.history-medical-variables.index') }}">
                        {{ __('manager.variable') }}
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.manager.history-medical-variables.edit', ['variable' => $variable->id]) }}">
                        {{ __('manager.edit-variable') }} - {{ __('manager.' . $variable->variable_type->name) }}
                    </a>
                </li>
            </ol>
        </nav>
    </nav>

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
                        <input type="text" class="input_dataGroup_form @error('name') is-invalid @enderror" id="name" name="name"  value="{{ old('name', $variable->name) }}">
                    </div>

                    <div class="col-md-6 data_group_form"> <!-- Input type radius -->
                        <div class="pr-0 pl-0 pr-md-2">
                            <label class="label_input_radio">{{ __('validation.attributes.status') }}</label>

                            <div class="row row_input_radio">
                                <div class="col-5 col-xl-3 content_input_radio @error('status') is-invalid @enderror">
                                    <input class="mr-2" type="radio" id="status-1" value="1" name="status" {{ (old('status', $variable->status) == 1) ? 'checked':'' }}>
                                    <label class="form-check-label" for="status-1">{{ __('trans.active') }}</label>
                                </div>

                                <div class="col-5 col-xl-3 content_input_radio @error('status') is-invalid @enderror">
                                    <input class="mr-2" type="radio" id="status-0" value="0" name="status" {{ (old('status', $variable->status) == 0) ? 'checked':'' }}>
                                    <label class="form-check-label" for="status-0">{{ __('trans.inactive') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="category">{{ __('validation.attributes.category') }}</label>

                        <select class="input_dataGroup_form @error('category') is-invalid @enderror" id="category" name="category">
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

                            <select class="input_dataGroup_form @error('type-numeric') is-invalid @enderror" id="type-numeric" name="type-numeric">
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

                            <select class="input_dataGroup_form @error('step') is-invalid @enderror" id="step" name="step">
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
                            <input type="number" class="input_dataGroup_form @error('min') is-invalid @enderror" id="min" name="min" value="{{ old('min', $variable->config['min']) }}"/>
                        </div>

                        <div class="col-md-4 data_group_form">
                            <label for="max">{{ __('validation.attributes.max') }}</label>
                            <input type="number" class="input_dataGroup_form @error('max') is-invalid @enderror" id="max" name="max" value="{{ old('max', $variable->config['max']) }}"/>
                        </div>

                        @break
                        @case(5)
                        <div class="col-md-4 data_group_form">
                            <label for="name-true">{{ __('validation.attributes.name-true') }}</label>
                            <input type="text" class="input_dataGroup_form @error('name-true') is-invalid @enderror" id="name-true" name="name-true" value="{{ old('name-true', $variable->config['name-true']) }}"/>
                        </div>

                        <div class="col-md-4 data_group_form">
                            <label for="value-true">{{ __('validation.attributes.value-true') }}</label>
                            <input type="text" class="input_dataGroup_form @error('value-true') is-invalid @enderror" id="value-true" name="value-true" value="{{ old('value-true', $variable->config['value-true']) }}"/>
                        </div>

                        <div class="col-md-4 data_group_form">
                            <label for="name-false">{{ __('validation.attributes.name-false') }}</label>
                            <input type="text" class="input_dataGroup_form @error('name-false') is-invalid @enderror" id="name-false" name="name-false" value="{{ old('name-false', $variable->config['name-false']) }}"/>
                        </div>

                        <div class="col-md-4 data_group_form">
                            <label for="value-false">{{ __('validation.attributes.value-false') }}</label>
                            <input type="text" class="input_dataGroup_form @error('value-false') is-invalid @enderror" id="value-false" name="value-false" value="{{ old('value-false', $variable->config['name-false']) }}"/>
                        </div>
                        @break
                        @case(6)
                        <div class="col-md-6 data_group_form"> <!-- Input type radius -->
                            <div class="p-0">
                                <label class="label_input_radio">{{ __('validation.attributes.is_multiple') }}</label>

                                <div class="row row_input_radio">
                                    <div class="col-5 col-xl-3 content_input_radio @error('is_multiple') is-invalid @enderror">
                                        <input class="mr-2" type="radio" id="is_multiple-1" value="1" name="is_multiple" {{ (old('is_multiple', $variable->config['is_multiple']) == 1) ? 'checked':'' }}>
                                        <label class="form-check-label" for="is_multiple-1">{{ __('manager.yes') }}</label>
                                    </div>

                                    <div class="col-5 col-xl-3 content_input_radio @error('is_multiple') is-invalid @enderror">
                                        <input class="mr-2" type="radio" id="is_multiple-0" value="0" name="is_multiple" {{ (old('is_multiple', $variable->config['is_multiple']) == 0) ? 'checked':'' }}>
                                        <label class="form-check-label" for="is_multiple-0">{{ __('manager.not') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row col-12 data_group_form m-0" id="div-list">
                            <div class="row col-12 p-0 m-0">
                                @php
                                    $list = old('list', $variable->config['list']);
                                @endphp
                                <label class="col-12 px-0 px-md-1" for="list">{{ __('validation.attributes.list') }}</label>

                                <div class="col-md-6 d-flex px-0 px-md-1 mb-3">
                                    <input type="text" class="input_dataGroup_form @error('list.0') is-invalid @enderror" id="list" name="list[]" value="{{ $list[0] }}">

                                    <div class="input-group-append">
                                        <button class="button_primary m-0 px-3" type="button" id="add-list">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                @if(!empty($list))
                                    @foreach($list as $key => $item)
                                        @if($key != 0)
                                            <div class="col-md-6 d-flex px-0 px-md-1 mb-3">
                                                <input type="text" class="input_dataGroup_form @error('list.' . $key) is-invalid @enderror" id="list" name="list[]" value="{{ $item }}">

                                                <div class="input-group-append">
                                                    <button class="button_third m-0 px-3 remove-list" type="button" id="button-addon2">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        @break
                    @endswitch
                </div>
            </div>

            <div class="container_button">
                <a href="{{ route('tenant.manager.history-medical-variables.index') }}" class="button_third">{{ __('trans.cancel') }}
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
    <script>
        @if($variable->variable_type_id == 6)
        $('#add-list').click(function (e) {
            $('#div-list').append(

            '<div class="col-md-6 d-flex px-0 px-md-1 mb-3">' +
                '<input type="text" class="input_dataGroup_form" id="list" name="list[]">' +
            
                '<div class="input-group-append">' +
                    '<button class="button_third m-0 px-3 remove-list" type="button">' +
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
