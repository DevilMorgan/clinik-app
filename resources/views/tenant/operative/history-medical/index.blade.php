
@extends('tenant.layouts.app')

@section('styles')

@endsection

@section('content')
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-auto">
                <h2>{{ $model->name }}</h2>
            </div>
        </div>
        @foreach($model->history_medical_categories as $category)
            <div class="row main_target_form">
                <div class="col-12">
                    <h3 class="title_section_form">{{ $category->name }}</h3>
                </div>
                <div class="col-12">
                    <form action="#">
                        @if($category->is_various == 1 && !empty($category->history_medical_records))
                            <div class="row form_row">
                                @foreach($category->history_medical_records as $records)
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $records->date }}</h5>
                                            <div class="card-text">
                                                @if(!empty($records->record_data))
                                                    <ul>
                                                        @foreach($records->record_data as $data)
                                                            <li><strong>{{ $data->value['label'] }}:</strong> {{ $data->value['value'] }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <div class="row form_row">
                            @foreach($category->history_medical_variables as $variable)
                                <div class="col-md-6 form-group">
                                    <label for="{{ $variable->id }}">{{ $variable->name }}</label>
                                    <br>
                                    @switch($variable->variable_type_id)
                                        @case(1)
                                        <input type="number" id="{{ $variable->id }}"
                                               name="{{ $variable->id }}" class="form-control">
                                        @break
                                        @case(2)
                                        <textarea name="{{ $variable->id }}" id="{{ $variable->id }}"
                                                  cols="30" rows="2" class="form-control textArea_form"></textarea>
                                        @break
                                        @case(3)
                                        <input type="text" id="{{ $variable->id }}"
                                               name="{{ $variable->id }}" class="form-control">
                                        @break
                                        @case(4)
                                        <input type="range" id="{{ $variable->id }}"
                                               name="{{ $variable->id }}" class="form-control">
                                        @break
                                        @case(5)
                                        <div class="form-check form-check-inline">
                                            <input type="radio" id="{{ $variable->id }}-yes"
                                                   name="{{ $variable->id }}" class="form-check-input" />
                                            <label  class="form-check-label" for="{{ $variable->id }}-yes">si</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" id="{{ $variable->id }}-not"
                                                   name="{{ $variable->id }}" class="form-check-input" />
                                            <label  class="form-check-label" for="{{ $variable->id }}-not">no</label>
                                        </div>
                                        @break
                                        @case(6)
                                        <select id="{{ $variable->id }}" name="{{ $variable->id }}"
                                                class="form-control">
                                            <option></option>
                                            @foreach($variable->config['list'] as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                        @break
                                    @endswitch
                                </div>
                            @endforeach
                        </div>
                        <div class="row button_container_form">
                            @if($category->is_various == 1)
                                <button type="submit" class="button_save_form">
                                    {{ __('trans.add') }}&nbsp;<i class="fas fa-plus"></i>
                                </button>
                            @else
                                <button type="submit" class="button_save_form">
                                    {{ __('trans.save') }}&nbsp;<i class="fas fa-save"></i>
                                </button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </section>
@endsection

@section('scripts')

@endsection
