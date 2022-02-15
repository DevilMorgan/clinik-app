@extends('system.layouts.app')

@section('titles', 'Plantillas')

@section('styles')
@endsection

@section('content')
    <section class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="my-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Variable historia clínica</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12">
                <h2>Editar Variable {{ $variable->name }}({{ __('manager.' . $variable->hc_variable_type->name) }})</h2>
            </div>
            <div class="col-12">
                <form action="{{ route('system.history-clinic.variables.update', ['variable' => $variable->id]) }}" method="post" id="form-variables-create">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="name">Nombre</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $variable->name) }}"/>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="code">Código</label>
                            <input type="text" id="code" name="code" class="form-control" value="{{ old('code', $variable->code) }}"/>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="description">Descripción</label>
                            <textarea id="description" name="description" class="form-control">{{ old('description', $variable->description) }}</textarea>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="status-1" name="status"
                                       value="1" {{ old('status', $variable->status) == 1 ? 'checked':'' }} />
                                <label class="form-check-label" for="status-1">Activado</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="status-0" name="status"
                                       value="0" {{ old('status', $variable->status) == 0 ? 'checked':'' }} />
                                <label class="form-check-label" for="status-0">Desactivado</label>
                            </div>
                        </div>

                        @if($variable->hc_variable_type_id == 1 || $variable->hc_variable_type_id == 4 || $variable->hc_variable_type_id == 5 || $variable->hc_variable_type_id == 6)
                            <div class="col-12">
                                <h4>{{ __('manager.variable-information') }} ({{ __('manager.' . $variable->hc_variable_type->name) }} {{ __('manager.config') }})</h4>
                            </div>
                        @endif

                        <div class="col-12 row mb-3">
                            @switch($variable->hc_variable_type_id)
                                @case(1)
                                <div class="col-md-6 data_group_form">
                                    <label for="type-numeric">{{ __('validation.attributes.type-numeric') }}</label>

                                    <select class="form-control @error('type-numeric') is-invalid @enderror" id="type-numeric" name="type-numeric">
                                        <option></option>
                                        <option value="integer" {{ old('type-numeric', $variable->config['type-numeric']) == 'integer' ? 'selected':''}}>{{ __('manager.integer') }}</option>
                                        <option value="decimal" {{ old('type-numeric', $variable->config['type-numeric']) == 'decimal' ? 'selected':''}}>{{ __('manager.decimal') }}</option>
                                    </select>
                                </div>
                                @break
                                @case(4)
                                <div class="col-md-4">
                                    <label for="step">{{ __('validation.attributes.step') }}</label>
                                    <select class="form-control @error('step') is-invalid @enderror" id="step" name="step">
                                        <option value="0.001" {{ old('step', $variable->config['step']) == 0.001 ? 'selected':''}} >0.001</option>
                                        <option value="0.01" {{ old('step', $variable->config['step']) == 0.01 ? 'selected':''}} >0.01</option>
                                        <option value="0.1" {{ old('step', $variable->config['step']) == 0.1 ? 'selected':''}} >0.1</option>
                                        <option value="1" {{ old('step', $variable->config['step']) == 1 ? 'selected':''}} >1</option>
                                        <option value="2" {{ old('step', $variable->config['step']) == 2 ? 'selected':''}} >2</option>
                                        <option value="5" {{ old('step', $variable->config['step']) == 5 ? 'selected':''}} >5</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="min">{{ __('validation.attributes.min') }}</label>
                                    <input type="number" class="form-control @error('min') is-invalid @enderror"
                                           id="min" name="min" value="{{ old('min', $variable->config['min']) }}"/>
                                </div>

                                <div class="col-md-4">
                                    <label for="max">{{ __('validation.attributes.max') }}</label>
                                    <input type="number" class="form-control @error('max') is-invalid @enderror"
                                           id="max" name="max" value="{{ old('max', $variable->config['max']) }}"/>
                                </div>
                                @break
                                @case(5)
                                <div class="col-md-6">
                                    <label for="name-true">{{ __('validation.attributes.name-true') }}</label>
                                    <input type="text" class="form-control @error('name-true') is-invalid @enderror"
                                           id="name-true" name="name-true" value="{{ old('name-true', $variable->config['name-true']) }}"/>
                                </div>

                                <div class="col-md-6">
                                    <label for="name-false">{{ __('validation.attributes.name-false') }}</label>
                                    <input type="text" class="form-control @error('name-false') is-invalid @enderror"
                                           id="name-false" name="name-false" value="{{ old('name-false', $variable->config['name-false']) }}"/>
                                </div>
                                @break
                                @case(6)
                                <div class="col-12 mb-3">
                                    <label class="label_input_radio" for="is_multiple">{{ __('validation.attributes.is_multiple') }}</label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('is_multiple') is-invalid @enderror"
                                               type="radio" id="is_multiple-1" name="is_multiple"
                                               value="1" {{ old('is_multiple', $variable->config['is_multiple']) == 1 ? 'checked':'' }} />
                                        <label class="form-check-label" for="is_multiple-1">Activado</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('is_multiple') is-invalid @enderror"
                                               type="radio" id="is_multiple-0" name="is_multiple"
                                               value="0" {{ old('is_multiple', $variable->config['is_multiple']) == 0 ? 'checked':'' }} />
                                        <label class="form-check-label" for="is_multiple-0">Desactivado</label>
                                    </div>
                                </div>
                                <div class="col-8" id="list-items">
                                    @php
                                        $list = old('list', $variable->config['list']); $end = array_key_last($list);
                                    @endphp
                                    @if(!empty($list))
                                        @foreach($list as $key => $item)
                                            @if($key != $end)
                                                <div class="input-group mb-3 item">
                                                    <input type="text" class="form-control @error('list.' . $key) is-invalid @enderror" id="list" name="list[]" value="{{ $item }}">
                                                    <button class="btn btn-outline-danger remove-list" type="button">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                                <div class="col-8" id="div-list">
                                    <label for="list">{{ __('validation.attributes.list') }}</label>
                                    <div class="input-group mb-3 item">
                                        <input type="text" class="form-control @error('list.0') is-invalid @enderror"
                                               id="list" name="list[]" value="{{ old('list.0', $list[$end]) }}">
                                        <button class="btn btn-outline-primary" type="button" id="add-list">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                @break
                                @case(7)
                                <div class="col-8" id="list-items">
                                    @php
                                        $list = old('list', $variable->config['list']); $end = array_key_last($list);
                                    @endphp
                                    @if(!empty($list))
                                        @foreach($list as $key => $item)
                                            @if($key != $end)
                                                <div class="input-group mb-3 item">
                                                    <input type="text" class="form-control @error('list.' . $key) is-invalid @enderror" id="list" name="list[]" value="{{ $item }}">
                                                    <button class="btn btn-outline-danger remove-list" type="button">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                                <div class="col-8" id="div-list">
                                    <label for="list">{{ __('validation.attributes.list') }}</label>
                                    <div class="input-group mb-3 item">
                                        <input type="text" class="form-control @error('list.0') is-invalid @enderror"
                                               id="list" name="list[]" value="{{ old('list.0', $list[$end]) }}">
                                        <button class="btn btn-outline-primary" type="button" id="add-list">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                @break
                            @endswitch
                        </div>

                        <div class="col-12 mb-3 d-flex justify-content-end">
                            <a href="{{ route('system.history-clinic.variables.index') }}" class="btn btn-secondary mx-2">
                                Regresar <i class="fas fa-angle-left"></i>
                            </a>
                            <button class="btn btn-success" type="submit">
                                Guardar <i class="fas fa-save"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        @if($variable->hc_variable_type_id == 6 or $variable->hc_variable_type_id == 7)
        $('#add-list').click(function (e) {
            let content = $(this).parents('.item');
            console.log(content);
            let content_clone = content.clone();

            content_clone.find('.fas').addClass('fa-trash').removeClass('fa-plus');
            content_clone.find('.btn').addClass('btn-outline-danger').removeClass('btn-outline-primary');
            content_clone.find('.btn').removeAttr('id').addClass('remove-list');

            content.find('.form-control').val('');

            $('#list-items').append(content_clone);
        });
        $('#list-items').on('click', '.remove-list', function (e) {
            $(this).parents('.item').remove();
        });
        @endif
    </script>
@endsection
