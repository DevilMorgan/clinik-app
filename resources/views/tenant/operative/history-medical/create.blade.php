
@extends('tenant.layouts.app')

@section('styles')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugin/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugin/select2/css/select2-bootstrap4.min.css') }}">
@endsection

@section('content')
    @php
        $categories = $historyMedical->record_categories;
        $model = $historyMedical->history_medical_model;
        $patient = $historyMedical->basic_information;
        $diagnosis = $historyMedical->diagnosis;
        //dd($patient);
    @endphp
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-auto">
                <h2>{{ $model->name }}</h2>
            </div>
        </div>
        <form id="form-create-history-medical" method="post" enctype="multipart/form-data"
              action="{{ route('tenant.operative.medical-history.store', ['record' => $historyMedical->id]) }}">
            @csrf
            <input type="hidden" name="delete-record-categories" id="delete-record-categories">
            <!--Basic information of patient -->
            <div id="basic-information" class="row main_target_form ">
                <div class="col-12">
                    <h3 class="title_section_form">{{ __('trans.basic-information') }}</h3>
                </div>
                <div class="col-12 row justify-content-center">
                    <div class="col-md-6">
                        <label for="name-patient">{{ __('validation.attributes.name') }}</label>
                        <input type="text" name="patient[name]" id="name-patient" class="form-control"
                               readonly value="{{ $patient->patient_name }}"/>
                    </div>
                    <div class="col-md-6">
                        <label for="last_name-patient">{{ __('validation.attributes.last_name') }}</label>
                        <input type="text" name="patient[last_name]" id="last_name-patient" class="form-control"
                               readonly value="{{ $patient->patient_last_name }}"/>
                    </div>
                    <div class="col-md-6">
                        <label for="id_card-patient">{{ __('validation.attributes.id_card') }}</label>
                        <input type="text" name="patient[id_card]" id="id_card-patient" class="form-control"
                               readonly value="{{ $patient->patient_id_card }}"/>
                    </div>
                </div>
                <div class="col-12 row">
                    <div class="col-md-4">
                        <label for="occupation-patient">{{ __('validation.attributes.occupation') }}</label>
                        <input type="text" name="patient[occupation]" id="occupation-patient" class="form-control"
                               value="{{ old('patient.occupation', $patient->patient_occupation) }}"/>
                    </div>
                    <div class="col-md-4">
                        <label for="marital-status-patient">{{ __('validation.attributes.marital-status') }}</label>
                        <select class="form-control @error('patient.marital_status') is-invalid @enderror" id="marital-status-patient"
                                name="patient[marital_status]">
                            <option value="significant other" {{ (old('patient.marital_status',  $patient->patient_marital_status) == 'significant other') ? 'selected' : '' }}>{{ __('trans.significant-other') }}</option>
                            <option value="married" {{ (old('patient.marital_status',  $patient->patient_marital_status) == 'married') ? 'selected' : '' }}>{{ __('trans.married') }}</option>
                            <option value="single" {{ (old('patient.marital_status',  $patient->patient_marital_status) == 'single') ? 'selected' : '' }}>{{ __('trans.single') }}</option>
                            <option value="divorced" {{ (old('patient.marital_status',  $patient->patient_marital_status) == 'divorced') ? 'selected' : '' }}>{{ __('trans.divorced') }}</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="cellphone-patient">{{ __('validation.attributes.cellphone') }}</label>
                        <input type="text" name="patient[cellphone]" id="cellphone-patient" class="form-control"
                               value="{{ old('patient.cellphone', $patient->patient_cellphone) }}"/>
                    </div>
                    <div class="col-md-4">
                        <label for="email-patient">{{ __('validation.attributes.email') }}</label>
                        <input type="text" name="patient[email]" id="email-patient" class="form-control"
                               value="{{ old('patient.email', $patient->patient_email) }}"/>
                    </div>
                    <div class="col-md-4">
                        <label for="phone-patient">{{ __('validation.attributes.phone') }}</label>
                        <input type="text" name="patient[phone]" id="phone-patient" class="form-control"
                               value="{{ old('patient.phone', $patient->patient_phone) }}"/>
                    </div>
                    <div class="col-md-4">
                        <label for="address-patient">{{ __('validation.attributes.address') }}</label>
                        <input type="text" name="patient[address]" id="address-patient" class="form-control"
                               value="{{ old('patient.address', $patient->patient_address) }}"/>
                    </div>
                    <div class="col-md-4">
                        <label for="neighborhood-patient">{{ __('validation.attributes.neighborhood') }}</label>
                        <input type="text" name="patient[neighborhood]" id="neighborhood-patient" class="form-control"
                               value="{{ old('patient.neighborhood', $patient->patient_neighborhood) }}"/>
                    </div>
                    <div class="col-md-4">
                        <label for="city-patient">{{ __('validation.attributes.city') }}</label>
                        <input type="text" name="patient[city]" id="city-patient" class="form-control"
                               value="{{ old('patient.city', $patient->patient_city) }}"/>
                    </div>
                    <div class="col-md-4">
                        <label for="entity-patient">{{ __('validation.attributes.medical-entity') }}</label>
                        <input type="text" name="patient[entity]" id="medical-entity-patient" class="form-control"
                               value="{{ old('patient.entity', $patient->patient_entity) }}"/>
                    </div>
                    <div class="col-md-4">
                        <label for="contributory-regime-patient">{{ __('validation.attributes.contributory-regime') }}</label>
                        <select name="patient[contributory_regime]" id="contributory-regime-patient"
                                class="form-control @error('patient.contributory_regime') is-invalid @enderror">
                            <option value="Cotizante" {{ (old('patient.contributory_regime', $patient->patient_contributory_regime) == 'Cotizante') ? 'selected' : '' }} >Cotizante</option>
                            <option value="Beneficiario" {{ (old('patient.contributory_regime', $patient->patient_contributory_regime) == 'Beneficiario') ? 'selected' : '' }} >Beneficiario</option>
                            <option value="Subsidiado" {{ (old('patient.contributory_regime', $patient->patient_contributory_regime) == 'Subsidiado') ? 'selected' : '' }} >Subsidiado</option>
                            <option value="Otro" {{ (old('patient.contributory_regime', $patient->patient_contributory_regime) == 'Otro') ? 'selected' : '' }} >Otro</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>{{ __('validation.attributes.status-medical') }}</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patient[status_medical]"
                                   id="status-medical-patient-1" value="1"
                                {{ (old('patient.status_medical', $patient->patient_status_medical) == 1) ? 'checked':'' }}>
                            <label class="form-check-label" for="status-medical-patient-1">{{ __('trans.active') }}</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patient[status_medical]"
                                   id="status-medical-patient-0" value="0"
                                {{ (old('patient.status_medical', $patient->patient_status_medical) == 0) ? 'checked':'' }}>
                            <label class="form-check-label" for="status-medical-patient-0">{{ __('trans.inactive') }}</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- loop for categories -->
            <div id="content-form">
                @foreach($model->history_medical_categories as $category)
                    @php
                        $recordCategory = $historyMedical->record_categories->filter(function ($item) use ($category){
                            return $item->history_medical_category_id == $category->id;
                        });
                    @endphp
                    <div class="row main_target_form category-content">
                        <!----------------------------------- Head Category ------------------------>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-8">
                                    <h3 class="title_section_form">{{ $category->name }}</h3>
                                </div>
                                <div class="col-auto">
                                @if($category->end_records)

                                    <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-{{ $category->id }}">
                                            {{ __('trans.previous-records') }} <i class="fas fa-history"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modal-{{ $category->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">{{ __('trans.previous-records-of', ['category' => $category->name]) }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="accordion" id="accordion-{{ $category->id }}">
                                                            @php //dd($category)@endphp
                                                            @foreach($category->record_categories as $record)
                                                                <div class="card">
                                                                    <div class="card-header" id="headingOne">
                                                                        <h2 class="mb-0 w-100">
                                                                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{ $record->id }}" aria-expanded="true" aria-controls="collapseOne">
                                                                                {{ date('d-M/Y h:i a', strtotime($record->created_at)) }}
                                                                            </button>
                                                                        </h2>
                                                                    </div>

                                                                    <div id="collapse-{{ $record->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion-{{ $category->id }}">
                                                                        <div class="card-body">
                                                                            <table class="table">
                                                                                <tbody>
                                                                                @foreach($record->record_data as $data)
                                                                                    <tr>
                                                                                        <td>{{ $data->value['label'] }}</td>
                                                                                        <td>{{ is_array($data->value['value']) ? implode(', ', $data->value['value']):$data->value['value'] }}</td>
                                                                                    </tr>
                                                                                @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('trans.close') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if(!$category->required)
                                        <input type="checkbox" data-toggle="toggle" class="required-category"
                                               data-on="{{ __('trans.active') }}" data-off="{{ __('trans.inactive') }}"
                                               data-onstyle="primary" data-offstyle="secondary" id="required-{{ $category->id }}"
                                               name="values[{{ $category->id }}][required]" {{ (!$recordCategory->isEmpty()) ? 'checked':''}} >
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!----------------------------------- Body Category ------------------------>
                        <div class="col-12 body-category">
                            <!-- input for save category -->
                            <input type="hidden" name="values[{{ $category->id }}][id]"
                                   value="{{ $category->id }}">
                            <!-- option for multi register category -->
                        @if($category->is_various)
                            <!-- add register multi save of the category -->
                                <div id="category-{{ $category->id }}" class="content-category-group">
                                    <!-- validate exists previews register -->
                                    @if(isset($recordCategory))
                                        @php $last = $recordCategory->last();@endphp
                                        @foreach($recordCategory as $record)
                                            @if($last != $record)
                                                <div class="row form_row " style="border: 1px solid deepskyblue">
                                                    <!-- content button delete register category -->
                                                    <div class="col-12 d-flex justify-content-end mt-1">
                                                        <button class="btn btn-danger remove-register" type="button"
                                                                data-category="category-{{ $category->id }}">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>

                                                    <div class="col-12 row group-variables">
                                                        <!-- input for save code register category -->
                                                        <input type="hidden"
                                                               name="values[{{ $category->id }}][data][{{ $record->code }}][code_category]"
                                                               value="{{ $record->code }}" class="code-category">

                                                    @foreach($category->history_medical_variables as $variable)
                                                        <!-- search register of variable -->
                                                            @php
                                                                $id = $record->record_data->search(function($item, $key) use ($variable){
                                                                    return ($item->history_medical_variable_id == $variable->id);
                                                                });
                                                            @endphp
                                                            <div class="col-md-6 form-group">
                                                                <label for="{{ $variable->id }}">{{ $variable->name }}</label>
                                                                <!-- save title of variable for the register -->
                                                                <input type="hidden" id="{{ $variable->id }}-title" value="{{ $variable->name }}"
                                                                       name="values[{{ $category->id }}][data][{{ $record->code }}][{{ $variable->id }}][title-value]">
                                                                <!-- save id of variable for the register -->
                                                                <input type="hidden" id="{{ $variable->id }}-id" value="{{ $variable->id }}"
                                                                       name="values[{{ $category->id }}][data][{{ $record->code }}][{{ $variable->id }}][id]">
                                                                <!-- validate type of variable, for type variable of print different -->
                                                                <br>
                                                                @switch($variable->variable_type_id)
                                                                    @case(1)
                                                                    <input type="number" id="{{ $variable->id }}" class="form-control"
                                                                           name="values[{{ $category->id }}][data][{{ $record->code }}][{{ $variable->id }}][value]"
                                                                           value="{{ ($id !== false) ? $record->record_data[$id]->value['value']:'' }}">
                                                                    @break
                                                                    @case(2)
                                                                    <textarea name="values[{{ $category->id }}][data][{{ $record->code }}][{{ $variable->id }}][value]"
                                                                              id="{{ $variable->id }}"
                                                                              class="form-control textArea_form">
                                                                {{ ($id !== false) ? $record->record_data[$id]->value['value']:'' }}
                                                            </textarea>
                                                                    @break
                                                                    @case(3)
                                                                    @php

                                                                        @endphp
                                                                    <input type="text" id="{{ $variable->id }}" class="form-control"
                                                                           name="values[{{ $category->id }}][data][{{ $record->code }}][{{ $variable->id }}][value]"
                                                                           value="{{ ($id !== false) ? $record->record_data[$id]->value['value']:'' }}"/>
                                                                    @break
                                                                    @case(4)
                                                                    <input type="range" id="{{ $variable->id }}" oninput="this.nextElementSibling.value = this.value"
                                                                           value="{{ ($id !== false) ? $record->record_data[$id]->value['value']:0 }}"
                                                                           name="values[{{ $category->id }}][data][{{ $record->code }}][{{ $variable->id }}][value]"
                                                                           class="custom-range"
                                                                           max="{{ $variable->config['max'] }}"
                                                                           min="{{ $variable->config['min'] }}"
                                                                           step="{{ $variable->config['step'] }}">
                                                                    <output>0</output>
                                                                    @break
                                                                    @case(5)
                                                                    <div class="form-check form-check-inline">
                                                                        <input type="radio" id="{{ $variable->id }}-yes" value="{{ $variable->config['value-true'] }}"
                                                                               class="form-check-input"
                                                                               name="values[{{ $category->id }}][data][{{ $record->code }}][{{ $variable->id }}][value]"
                                                                            {{ ($id !== false) ? ($record->record_data[$id]->value['value'] == $variable->config['value-true'] ) ? 'checked':'':'' }} />
                                                                        <label  class="form-check-label" for="{{ $variable->id }}-yes">{{ $variable->config['name-true'] }}</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input type="radio" id="{{ $variable->id }}-not" value="{{ $variable->config['value-false'] }}"
                                                                               name="values[{{ $category->id }}][data][{{ $record->code }}][{{ $variable->id }}][value]"
                                                                               class="form-check-input"
                                                                            {{ ($id !== false) ? ($record->record_data[$id]->value['value'] == $variable->config['value-false'] ) ? 'checked':'':'' }} />
                                                                        <label  class="form-check-label" for="{{ $variable->id }}-not">{{ $variable->config['name-false'] }}</label>
                                                                    </div>
                                                                    @break
                                                                    @case(6)
                                                                    @php
                                                                        $values = ($id !== false) ? $record->record_data[$id]->value['value']:false;
                                                                    @endphp
                                                                    <select id="{{ $variable->id }}"
                                                                            name="values[{{ $category->id }}][data][{{ $record->code }}][{{ $variable->id }}][value][]"
                                                                            class="form-control">
                                                                        @foreach($variable->config['list'] as $item)
                                                                            <option value="{{ $item }}" {{-- ($values != false and in_array($item, $values)) ? 'selected':'' --}}>{{ $item }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @break
                                                                @endswitch
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>

                                <!-- blank register multi save of the category -->
                                <div class="row form_row " style="border: 1px solid deepskyblue">
                                    <div class="col-12 d-flex justify-content-end mt-1">
                                        <button class="btn btn-info add-register" type="button"
                                                data-category="category-{{ $category->id }}">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <div class="col-12 row group-variables">
                                    @if(isset($recordCategory))
                                        @php $last = $recordCategory->last(); @endphp
                                    @else
                                        @php $last = null; @endphp
                                    @endif
                                    <!-- input for save code register category -->
                                        <input type="hidden" name="values[{{ $category->id }}][data][0][code_category]"
                                               value="{{ (isset($last)) ? $last->code :\Illuminate\Support\Str::random(10) }}" class="code-category">

                                    @foreach($category->history_medical_variables as $variable)
                                        <!-- validate if exists register category -->
                                            @if(isset($last))
                                                @php
                                                    $id = $last->record_data->search(function($item, $key) use ($variable){
                                                        return ($item->history_medical_variable_id == $variable->id);
                                                    });
                                                @endphp
                                            @else
                                                @php $id = false; @endphp
                                            @endif
                                            <div class="col-md-6 form-group">
                                                <label for="{{ $variable->id }}">{{ $variable->name }}</label>
                                                <!-- save title of variable for the register -->
                                                <input type="hidden" id="{{ $variable->id }}-title" value="{{ $variable->name }}"
                                                       name="values[{{ $category->id }}][data][0][{{ $variable->id }}][title-value]">
                                                <!-- save id of variable for the register -->
                                                <input type="hidden" id="{{ $variable->id }}-id" value="{{ $variable->id }}"
                                                       name="values[{{ $category->id }}][data][0][{{ $variable->id }}][id]">
                                                <!-- validate type of variable, for type variable of print different -->
                                                <br>
                                                @switch($variable->variable_type_id)
                                                    @case(1)
                                                    <input type="number" id="{{ $variable->id }}"
                                                           name="values[{{ $category->id }}][data][0][{{ $variable->id }}][value]" class="form-control"
                                                           value="{{ ($id !== false) ? $last->record_data[$id]->value['value']:'' }}">
                                                    @break
                                                    @case(2)
                                                    <textarea name="values[{{ $category->id }}][data][0][{{ $variable->id }}][value]" id="{{ $variable->id }}"
                                                              class="form-control textArea_form">
                                                {{ ($id !== false) ? $last->record_data[$id]->value['value']:'' }}
                                            </textarea>
                                                    @break
                                                    @case(3)
                                                    <input type="text" id="{{ $variable->id }}"
                                                           name="values[{{ $category->id }}][data][0][{{ $variable->id }}][value]" class="form-control"
                                                           value="{{ ($id !== false) ? $last->record_data[$id]->value['value']:'' }}">
                                                    @break
                                                    @case(4)
                                                    <input type="range" id="{{ $variable->id }}" oninput="this.nextElementSibling.value = this.value"
                                                           value="{{ ($id !== false) ? $last->record_data[$id]->value['value']:0 }}"
                                                           name="values[{{ $category->id }}][data][0][{{ $variable->id }}][value]" class="custom-range"
                                                           max="{{ $variable->config['max'] }}"
                                                           min="{{ $variable->config['min'] }}"
                                                           step="{{ $variable->config['step'] }}">
                                                    <output>0</output>
                                                    @break
                                                    @case(5)
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="{{ $variable->id }}-yes" value="{{ $variable->config['value-true'] }}"
                                                               name="values[{{ $category->id }}][data][0][{{ $variable->id }}][value]" class="form-check-input"
                                                            {{ ($id !== false) ? ($last->record_data[$id]->value['value'] == $variable->config['value-true'] ) ? 'checked':'':'' }} />
                                                        <label  class="form-check-label" for="{{ $variable->id }}-yes">{{ $variable->config['name-true'] }}</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="{{ $variable->id }}-not" value="{{ $variable->config['value-false'] }}"
                                                               name="values[{{ $category->id }}][data][0][{{ $variable->id }}][value]" class="form-check-input"
                                                            {{ ($id !== false) ? ($last->record_data[$id]->value['value'] == $variable->config['value-false'] ) ? 'checked':'':'' }} />
                                                        <label  class="form-check-label" for="{{ $variable->id }}-not">{{ $variable->config['name-false'] }}</label>
                                                    </div>
                                                    @break
                                                    @case(6)
                                                    @php
                                                        $values = ($id !== false) ? $last->record_data[$id]->value['value']:false;
                                                    @endphp
                                                    <select id="{{ $variable->id }}" name="values[{{ $category->id }}][data][0][{{ $variable->id }}][value]"
                                                            class="form-control">
                                                        @foreach($variable->config['list'] as $item)
                                                            <option value="{{ $item }}" {{-- ($values != false and in_array($item, $values)) ? 'selected':'' --}} >{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                    @break
                                                @endswitch
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                        @else

                            <!-- option for unique register category -->
                                <div class="row form_row">
                                    <!-- input for save code register category -->
                                    <input type="hidden" name="values[{{ $category->id }}][data][0][code_category]"
                                           value="{{ (!$recordCategory->isEmpty()) ? $recordCategory->first()->code : \Illuminate\Support\Str::random(10) }}" class="code-category">
                                    <!-- variables of the category -->
                                @foreach($category->history_medical_variables as $variable)
                                    <!-- validate if exists register category -->
                                        @php
                                            $id = (!$recordCategory->isEmpty()) ? $recordCategory->first()->record_data->search(function($item, $key) use ($variable){
                                                return ($item->history_medical_variable_id == $variable->id);
                                            }) : false;
                                            $record = $recordCategory->first();
                                        @endphp
                                        <div class="col-md-6 form-group">
                                            <label for="{{ $variable->id }}">{{ $variable->name }}</label>
                                            <!-- save title of variable for the register -->
                                            <input type="hidden" id="{{ $variable->id }}-title" value="{{ $variable->name }}"
                                                   name="values[{{ $category->id }}][data][0][{{ $variable->id }}][title-value]">
                                            <!-- save id of variable for the register -->
                                            <input type="hidden" id="{{ $variable->id }}-id" value="{{ $variable->id }}"
                                                   name="values[{{ $category->id }}][data][0][{{ $variable->id }}][id]">
                                            <!-- validate type of variable, for type variable of print different -->
                                            <br>
                                            @switch($variable->variable_type_id)
                                                @case(1)
                                                <input type="number" id="{{ $variable->id }}"
                                                       name="values[{{ $category->id }}][data][0][{{ $variable->id }}][value]" class="form-control"
                                                       value="{{ ($id !== false) ? $record->record_data[$id]->value['value']:'' }}">
                                                @break
                                                @case(2)
                                                <textarea name="values[{{ $category->id }}][data][0][{{ $variable->id }}][value]" id="{{ $variable->id }}"
                                                          class="form-control textArea_form">
                                                {{ ($id !== false) ? $record->record_data[$id]->value['value']:'' }}
                                            </textarea>
                                                @break
                                                @case(3)
                                                <input type="text" id="{{ $variable->id }}"
                                                       name="values[{{ $category->id }}][data][0][{{ $variable->id }}][value]" class="form-control"
                                                       value="{{ ($id !== false) ? $record->record_data[$id]->value['value']:'' }}">
                                                @break
                                                @case(4)
                                                <input type="range" id="{{ $variable->id }}" oninput="this.nextElementSibling.value = this.value"
                                                       value="{{ ($id !== false) ? $record->record_data[$id]->value['value']:0 }}"
                                                       name="values[{{ $category->id }}][data][0][{{ $variable->id }}][value]" class="custom-range"
                                                       max="{{ $variable->config['max'] }}"
                                                       min="{{ $variable->config['min'] }}"
                                                       step="{{ $variable->config['step'] }}">
                                                <output>0</output>
                                                @break
                                                @case(5)
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="{{ $variable->id }}-yes" value="{{ $variable->config['value-true'] }}"
                                                           name="values[{{ $category->id }}][data][0][{{ $variable->id }}][value]" class="form-check-input"
                                                        {{ ($id !== false) ? ($record->record_data[$id]->value['value'] == $variable->config['value-true'] ) ? 'checked':'':'' }} />
                                                    <label  class="form-check-label" for="{{ $variable->id }}-yes">{{ $variable->config['name-true'] }}</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="{{ $variable->id }}-not" value="{{ $variable->config['value-false'] }}"
                                                           name="values[{{ $category->id }}][data][0][{{ $variable->id }}][value]" class="form-check-input"
                                                        {{ ($id !== false) ? ($record->record_data[$id]->value['value'] == $variable->config['value-false'] ) ? 'checked':'':'' }} />
                                                    <label  class="form-check-label" for="{{ $variable->id }}-not">{{ $variable->config['name-false'] }}</label>
                                                </div>
                                                @break
                                                @case(6)
                                                @php
                                                    $values = ($id !== false) ? $record->record_data[$id]->value['value']:false;
                                                @endphp
                                                <select id="{{ $variable->id }}" name="values[{{ $category->id }}][data][0][{{ $variable->id }}][value]"
                                                        class="form-control">
                                                    @foreach($variable->config['list'] as $item)
                                                        <option value="{{ $item }}" {{ ($values != false and in_array($item, $values)) ? 'selected':'' }} >{{ $item }}</option>
                                                    @endforeach
                                                </select>
                                                @break
                                            @endswitch
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Diagnosis -->
            <div id="diagnosis" class="row main_target_form">

                <div class="col-12">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="title_section_form">{{ __('trans.diagnosis') }}</h3>
                        </div>
                        @if(isset($patientOriginal->history_medical_records))
                            <div class="col-auto">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-diagnosis">
                                    {{ __('trans.previous-records') }} <i class="fas fa-history"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="modal-diagnosis" data-backdrop="static" data-keyboard="false" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">{{ __('trans.previous-records-of', ['category' => __('trans.diagnosis')]) }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="accordion" id="accordion-diagnosis">
                                                    @foreach($patientOriginal->history_medical_records as $patientRecord)
                                                        @if(!empty($patientRecord->diagnosis) )
                                                            @php $id = Str::random('4'); @endphp
                                                            @php //dd($patientRecord->diagnosis); @endphp
                                                            <div class="card">
                                                                <div class="card-header" id="headingOne">
                                                                    <h2 class="mb-0 w-100">
                                                                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-diagnosis-{{ $id }}" aria-expanded="true" aria-controls="collapseOne">
                                                                            {{ date('d-M/Y h:i a', strtotime($patientRecord->created_at)) }}
                                                                        </button>
                                                                    </h2>
                                                                </div>

                                                                <div id="collapse-diagnosis-{{ $id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion-diagnosis">
                                                                    <div class="card-body">
                                                                        <table class="table">
                                                                            <tbody>
                                                                            <tr>
                                                                                <td>{{ __('validation.attributes.diagnosis') }}</td>
                                                                                <td>{{ $patientRecord->diagnosis->code . " - " . $patientRecord->diagnosis->description }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>{{ __('validation.attributes.diagnosis-optional-one') }}</td>
                                                                                <td>{{ $patientRecord->diagnosis->code_optional_one . " - " . $patientRecord->diagnosis->description_optional_one }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>{{ __('validation.attributes.diagnosis-optional-two') }}</td>
                                                                                <td>{{ $patientRecord->diagnosis->code_optional_two . " - " . $patientRecord->diagnosis->description_optional_two }}</td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('trans.close') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                @php //dd($historyMedical->diagnosis)@endphp
                <div class="col-12 content-diagnosis">
                    <label for="diagnosis-first">{{ __('validation.attributes.diagnosis') }}</label>
                    <input type="hidden" name="diagnosis[first][code]" id="diagnosis-first-code"
                           class="diagnosis-code" value="{{ $diagnosis->code ?? ''}}">
                    <select name="diagnosis[first][description]" id="diagnosis-first" class="form-control select2">
                        @if(isset($diagnosis->description))
                            <option value="{{ $diagnosis->description }}" selected="selected">
                                {{ $diagnosis->description }}
                            </option>
                        @endif
                    </select>
                </div>
                <div class="col-12 content-diagnosis">
                    <label for="diagnosis-description">{{ __('validation.attributes.diagnosis-optional-one') }}</label>
                    <input type="hidden" name="diagnosis[optional-one][code]" id="diagnosis-optional-one-code"
                           class="diagnosis-code" {{ isset($diagnosis->code_optional_one) ?: 'disabled' }}
                           value="{{ $diagnosis->code_optional_one  ?? ''}}">
                    <div class="input-group mb-3">
                        <select name="diagnosis[optional-one][description]" id="diagnosis-optional-one"
                                class="form-control select2" {{ isset($diagnosis->description_optional_one) ?: 'disabled' }}>
                            @if(isset($diagnosis->description_optional_one))
                                <option value="{{ $diagnosis->description_optional_one }}" selected="selected">
                                    {{ $diagnosis->description_optional_one }}
                                </option>
                            @endif
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <input type="checkbox" class="checked-diagnosis"
                                    {{ isset($diagnosis->description_optional_one) ? 'checked': '' }}>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 content-diagnosis">
                    <label for="diagnosis-description">{{ __('validation.attributes.diagnosis-optional-two') }}</label>
                    <input type="hidden" name="diagnosis[optional-two][code]" id="diagnosis-optional-two-code"
                           class="diagnosis-code"  {{ isset($diagnosis->code_optional_two) ?: 'disabled' }}
                           value="{{ $diagnosis->code_optional_two  ?? ''}}">
                    <div class="input-group mb-3">
                        <select name="diagnosis[optional-two][description]" id="diagnosis-optional-two"
                                class="form-control select2" {{ isset($diagnosis->description_optional_two) ?: 'disabled' }}>
                            @if(isset($diagnosis->description_optional_two))
                                <option value="{{ $diagnosis->description_optional_two }}" selected="selected">
                                    {{ $diagnosis->description_optional_two }}
                                </option>
                            @endif
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <input type="checkbox" class="checked-diagnosis"
                                    {{ isset($diagnosis->description_optional_two) ? 'checked': '' }}>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Abstract -->
            <div id="diagnosis" class="row main_target_form">

                <div class="col-12">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="title_section_form">{{ __('trans.abstract') }}</h3>
                        </div>
                        @if(isset($patientOriginal->history_medical_records))
                            <div class="col-auto">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-abstract">
                                    {{ __('trans.previous-records') }} <i class="fas fa-history"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="modal-abstract" data-backdrop="static" data-keyboard="false" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">{{ __('trans.previous-records-of', ['category' => __('trans.abstract')]) }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="accordion" id="accordion-abstract">
                                                    @foreach($patientOriginal->history_medical_records as $patientRecord)
                                                        @if(!empty($patientRecord->diagnosis) )
                                                            @php $id = Str::random('4'); @endphp
                                                            <div class="card">
                                                                <div class="card-header" id="headingOne">
                                                                    <h2 class="mb-0 w-100">
                                                                        <button class="btn btn-link btn-block text-left"
                                                                                type="button" data-toggle="collapse"
                                                                                data-target="#collapse-diagnosis-{{ $id }}"
                                                                                aria-expanded="true">
                                                                            {{ date('d-M/Y h:i a', strtotime($patientRecord->created_at)) }}
                                                                        </button>
                                                                    </h2>
                                                                </div>

                                                                <div id="collapse-diagnosis-{{ $id }}" class="collapse"
                                                                     aria-labelledby="headingOne" data-parent="#accordion-abstract">
                                                                    <div class="card-body">
                                                                        <label>{{ __('validation.attributes.abstract') }}</label>
                                                                        <br>
                                                                        {{ $patientRecord->diagnosis->abstract }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('trans.close') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-12 content-diagnosis">
                    <label for="diagnosis-abstract">{{ __('validation.attributes.abstract') }}</label>
                    <textarea name="diagnosis[abstract]" id="diagnosis-abstract" class="form-control">

                    </textarea>
                </div>
            </div>
            <!-- buttons -->
            <div class="row main_target_form d-flex justify-content-end">
                <button class="btn btn-info" id="btn-save">
                    <i class="fas fa-save"></i> {{ __('trans.save') }}
                </button>
            </div>
        </form>
        <form action="{{ route('tenant.operative.medical-history.finished', ['record' => $historyMedical->id]) }}"
              id="form-finished-history-medical" class="d-none" method="post">
            @csrf
        </form>
    </section>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="{{ asset('plugin/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('plugin/select2/js/i18n/es.js') }}"></script>
    <script>

        var count = 0;

        $(document).ready(function(){
            setInterval(function(){
                saveData();
            }, 10000);

            var swi = $('.required-category:not(:checked)');
            var content = swi.parent().parent().parent().parent().parent();

            content.find('.body-category').find('input, textarea, button, select').attr('disabled',!swi.prop('checked'));
        });

        $('#form-create-history-medical').submit(function(e){
            e.preventDefault();
            var form = $(this);

            Swal.fire({
                title: '{{ __('trans.are-you-sure') }}?',
                text: "{{ __('trans.finish-history-medical') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '{{ __('trans.finish') }}',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    var form_new = $('#form-finished-history-medical');
                    form_new.append($('.main_target_form').clone());
                    form_new.submit();
                }
            });
        });

        // Save data
        function saveData(){
            var form = $('#form-create-history-medical');
            // AJAX request
            $.ajax({
                url: form.attr('action'),
                type: 'post',
                data: form.serialize(),
                dataType: 'json',
                success: function(response){

                }
            });

        }

        $('.add-register').click(function (e) {
            var btn = $(this);

            var content = btn.parent().parent();

            var form = btn.parent().parent().clone();

            form.find('.add-register').removeClass('btn-info').addClass('btn-danger');
            form.find('.add-register').removeClass('add-register').addClass('remove-register');
            form.find('i').removeClass('fa-plus').addClass('fa-trash');

            count++;
            var elements = form.find('[name]');

            $.each(elements, function (key, item) {
                var name = $(item).attr('name');
                var name_replace = name.replace('[0]', '[' + count + ']');
                $(item).attr('name', name_replace);
            });

            $("#" + btn.data('category')).append(form);
            //console.log(form.find('.code-category'));
            $(content.find('.code-category')).attr('value', Math.random().toString(36).substr(2, 10));
            //btn.parent().parent().reset();

            content.find(':input').not(':button, :submit, :reset, :hidden, :checkbox, :radio').val('');
            content.find(':checkbox, :radio').prop('checked', false);
        });

        $('.content-category-group').on('click', '.remove-register', function (e) {
            var btn = $(this);

            Swal.fire({
                title: '{{ __('trans.are-you-sure') }}?',
                text: "{{ __('trans.delete-register-history-medical') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '{{ __('trans.delete') }}',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {

                    var form = btn.parent().parent();

                    //console.log(form.find('.code-category'));
                    var code = $(form.find('.code-category')).val();

                    var value = $('#delete-record-categories');

                    var myarr = value.val().split(";");

                    myarr.push(code);

                    value.val(myarr.join(';'));

                    form.remove();

                    Swal.fire(
                        '{{ __('trans.deleted') }}',
                        '{{ __('trans.message-delete-success') }}',
                        'success'
                    )
                }
            });
        });

        $('.required-category').on('change' ,function (e) {
            var swi = $(this);
            var content = swi.parent().parent().parent().parent().parent();

            if (swi.prop('checked'))
            {
                content.find('.body-category').find('input, textarea, button, select')
                    .attr('disabled',!swi.prop('checked'));

                var code = $(content.find('.code-category')).val();
                var value = $('#delete-record-categories');
                var myarr = value.val().split(";");
                $.each(myarr, function (key, item) {
                    if (item === code) delete myarr[key];
                });

                value.val(myarr.join(';'));
            } else {
                Swal.fire({
                    title: '{{ __('trans.are-you-sure') }}?',
                    text: "{{ __('trans.disabled-section-history-medical') }}",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: '{{ __('trans.inactive') }}',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    reverseButtons: true,
                }).then((result) => {
                    if (result.isConfirmed) {

                        //console.log(form.find('.code-category'));
                        var codes = $(content.find('.code-category'));

                        var value = $('#delete-record-categories');

                        var myarr = value.val().split(";");

                        $.each(codes, function (key, item) {
                            myarr.push($(item).val());
                        });

                        value.val(myarr.join(';'));

                        content.find('.content-category-group').children().remove();
                        content.find(':input').not(':button, :submit, :reset, :hidden, :checkbox, :radio').val('');
                        content.find(':checkbox, :radio').prop('checked', false);
                        content.find('.body-category').find('input, textarea, button, select')
                            .attr('disabled',!swi.prop('checked'));


                        Swal.fire(
                            '{{ __('trans.inactivated') }}',
                            '{{ __('trans.message-disabled-success') }}',
                            'success'
                        )
                    } else {
                        swi.prop('checked', true);
                    }
                });
            }

        });

        $('.select2').select2({
            theme: "bootstrap4",
            language: "es",
            ajax: {
                url: '{{ route('CIE10-search') }}',
                dataType: 'json',
                type: 'get',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: function (params) {
                    return {
                        term: params.term // search term
                    };
                },
                processResults: function (response) {

                    $.each(response.data, function (key, item) {
                        response.data[key].id = item.text;
                    });

                    return {
                        results: response.data
                    };
                },
                cache: true,
            },
            minimumInputLength: 3,
            formatResult: function(element){
                return '(' + element.id + ')' + element.text;
            },
            formatSelection: function(element){
                return '(' + element.id + ')' + element.text;
            },
            escapeMarkup: function(m) {
                return m;
            }
        }).on('select2:select', function (e) {
            var data = e.params.data;
            var select = $(this);
            //console.log(select.val())
            var content = select.parents('.content-diagnosis');

            $(content.find('.diagnosis-code')).val(data.code);
        });

        $('.checked-diagnosis').change(function (e) {
            var check = $(this);
            var content = check.parents('.content-diagnosis');

            !content.find('input, textarea, button, select').not('.checked-diagnosis')
                .attr('disabled',!check.prop('checked'))
        });
    </script>
@endsection
