
@extends('tenant.layouts.app')

@section('styles')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugin/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugin/select2/css/select2-bootstrap4.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/DataTables/datatables.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/DataTables/datatables.min.css') }}"/>
@endsection

@section('content')
    @php
        $categories = $historyMedical->record_categories;
        $model = $historyMedical->history_medical_model;
        $patient = $historyMedical->basic_information;
        $diagnosis = $historyMedical->diagnosis;
        //dd($diagnosis);
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
                <h2 class="col-12 title_section_form">{{ __('trans.basic-information') }}</h2>

                <div class="col-12 data_row_form">
                    <div class="col-md-6 data_group_form">
                        <label for="name-patient">{{ __('validation.attributes.name') }}</label>
                        <input type="text" name="patient[name]" id="name-patient" class="input_dataGroup_form" readonly value="{{ $patient->patient_name }}"/>
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="last_name-patient">{{ __('validation.attributes.last_name') }}</label>
                        <input type="text" name="patient[last_name]" id="last_name-patient" class="input_dataGroup_form" readonly value="{{ $patient->patient_last_name }}"/>
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="id_card-patient">{{ __('validation.attributes.id_card') }}</label>
                        <input type="text" name="patient[id_card]" id="id_card-patient" class="input_dataGroup_form" readonly value="{{ $patient->patient_id_card }}"/>
                    </div>
                </div>

                <div class="col-12 data_row_form">
                    <div class="col-md-4 data_group_form">
                        <label for="occupation-patient">{{ __('validation.attributes.occupation') }}</label>
                        <input type="text" name="patient[occupation]" id="occupation-patient" class="input_dataGroup_form" value="{{ old('patient.occupation', $patient->patient_occupation) }}"/>
                    </div>

                    <div class="col-md-4 data_group_form">
                        <label for="marital-status-patient">{{ __('validation.attributes.marital-status') }}</label>

                        <select class="input_dataGroup_form @error('patient.marital_status') is-invalid @enderror" id="marital-status-patient" name="patient[marital_status]">
                            <option value="significant other" {{ (old('patient.marital_status',  $patient->patient_marital_status) == 'significant other') ? 'selected' : '' }}>{{ __('trans.significant-other') }}</option>
                            <option value="married" {{ (old('patient.marital_status',  $patient->patient_marital_status) == 'married') ? 'selected' : '' }}>{{ __('trans.married') }}</option>
                            <option value="single" {{ (old('patient.marital_status',  $patient->patient_marital_status) == 'single') ? 'selected' : '' }}>{{ __('trans.single') }}</option>
                            <option value="divorced" {{ (old('patient.marital_status',  $patient->patient_marital_status) == 'divorced') ? 'selected' : '' }}>{{ __('trans.divorced') }}</option>
                        </select>
                    </div>

                    <div class="col-md-4 data_group_form">
                        <label for="cellphone-patient">{{ __('validation.attributes.cellphone') }}</label>
                        <input type="text" name="patient[cellphone]" id="cellphone-patient" class="input_dataGroup_form" value="{{ old('patient.cellphone', $patient->patient_cellphone) }}"/>
                    </div>

                    <div class="col-md-4 data_group_form">
                        <label for="email-patient">{{ __('validation.attributes.email') }}</label>
                        <input type="text" name="patient[email]" id="email-patient" class="input_dataGroup_form" value="{{ old('patient.email', $patient->patient_email) }}"/>
                    </div>

                    <div class="col-md-4 data_group_form">
                        <label for="phone-patient">{{ __('validation.attributes.phone') }}</label>
                        <input type="text" name="patient[phone]" id="phone-patient" class="input_dataGroup_form" value="{{ old('patient.phone', $patient->patient_phone) }}"/>
                    </div>

                    <div class="col-md-4 data_group_form">
                        <label for="address-patient">{{ __('validation.attributes.address') }}</label>
                        <input type="text" name="patient[address]" id="address-patient" class="input_dataGroup_form" value="{{ old('patient.address', $patient->patient_address) }}"/>
                    </div>

                    <div class="col-md-4 data_group_form">
                        <label for="neighborhood-patient">{{ __('validation.attributes.neighborhood') }}</label>
                        <input type="text" name="patient[neighborhood]" id="neighborhood-patient" class="input_dataGroup_form" value="{{ old('patient.neighborhood', $patient->patient_neighborhood) }}"/>
                    </div>

                    <div class="col-md-4 data_group_form">
                        <label for="city-patient">{{ __('validation.attributes.city') }}</label>
                        <input type="text" name="patient[city]" id="city-patient" class="input_dataGroup_form" value="{{ old('patient.city', $patient->patient_city) }}"/>
                    </div>

                    <div class="col-md-4 data_group_form">
                        <label for="entity-patient">{{ __('validation.attributes.medical-entity') }}</label>
                        <input type="text" name="patient[entity]" id="medical-entity-patient" class="input_dataGroup_form" value="{{ old('patient.entity', $patient->patient_entity) }}"/>
                    </div>

                    <div class="col-md-4 data_group_form">
                        <label for="contributory-regime-patient">{{ __('validation.attributes.contributory-regime') }}</label>

                        <select name="patient[contributory_regime]" id="contributory-regime-patient" class="input_dataGroup_form @error('patient.contributory_regime') is-invalid @enderror">
                            <option value="Cotizante" {{ (old('patient.contributory_regime', $patient->patient_contributory_regime) == 'Cotizante') ? 'selected' : '' }} >Cotizante</option>
                            <option value="Beneficiario" {{ (old('patient.contributory_regime', $patient->patient_contributory_regime) == 'Beneficiario') ? 'selected' : '' }} >Beneficiario</option>
                            <option value="Subsidiado" {{ (old('patient.contributory_regime', $patient->patient_contributory_regime) == 'Subsidiado') ? 'selected' : '' }} >Subsidiado</option>
                            <option value="Otro" {{ (old('patient.contributory_regime', $patient->patient_contributory_regime) == 'Otro') ? 'selected' : '' }} >Otro</option>
                        </select>
                    </div>

                    <div class="col-md-4 data_group_form"> <!-- Input type radius -->
                        <div class="pr-0 pl-0 pr-md-2">
                            <label class="label_input_radio">{{ __('validation.attributes.status-medical') }}</label>

                            <div class="row row_input_radio">
                                <div class="col-5 col-xl-3 content_input_radio">
                                    <input class="mr-1" type="radio" name="patient[status_medical]" id="status-medical-patient-1" value="1" {{ (old('patient.status_medical', $patient->patient_status_medical) == 1) ? 'checked':'' }}>
                                    <label class="form-check-label" for="status-medical-patient-1">{{ __('trans.active') }}</label>
                                </div>

                                <div class="col-5 col-xl-3 content_input_radio">
                                    <input class="mr-1" type="radio" name="patient[status_medical]" id="status-medical-patient-0" value="0" {{ (old('patient.status_medical', $patient->patient_status_medical) == 0) ? 'checked':'' }}>
                                    <label class="form-check-label" for="status-medical-patient-0">{{ __('trans.inactive') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Responsable -->
            <div id="responsable" class="row main_target_form content-data">
                <div class="col-12">
                    <div class="row">
                        <div class="col">
                            <h3 class="title_section_form">{{ __('trans.responsable') }}</h3>
                        </div>
                        <div class="col-auto">
                            <input type="checkbox" data-toggle="toggle" class="required-content"
                                   data-on="{{ __('trans.active') }}" data-off="{{ __('trans.inactive') }}"
                                   data-onstyle="primary" data-offstyle="secondary" id="required-days-off"
                                   name="responsable-required" {{ (!empty($patient->responsable_id_card)) ? 'checked':''}} >
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row content-body">
                        <div class="col-md-3 form-group">
                            <label for="responsable-name">{{ __('trans.name') }}</label>
                            <input type="text" class="form-control" name="responsable[name]" id="responsable-name"
                                   value="{{ old('responsable.name', $patient->responsable_name) }}" />
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="responsable-last_name">{{ __('trans.last_name') }}</label>
                            <input type="text" class="form-control" name="responsable[last_name]" id="responsable-last_name"
                                   value="{{ old('responsable.last_name', $patient->responsable_last_name) }}" />
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="responsable-relationship">{{ __('trans.relationship') }}</label>
                            <input type="text" class="form-control" name="responsable[relationship]" id="responsable-relationship"
                                   value="{{ old('responsable.relationship', $patient->responsable_relationship) }}" />
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="responsable-cellphone">{{ __('trans.cellphone') }}</label>
                            <input type="text" class="form-control" name="responsable[cellphone]" id="responsable-cellphone"
                                   value="{{ old('responsable.cellphone', $patient->responsable_cellphone) }}" />
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="responsable-card_type_id">{{ __('trans.card_type_id') }}</label>
                            <select name="responsable[card_type_id]" id="responsable-card_type_id" class="form-control">
                                @foreach($cardTypes as $item)
                                    <option value="{{ $item->id }}" {{ old('responsable.card_type_id', $patient->responsable_card_type_id) == $item->id ? 'selected':'' }} >{{ $item->name_short }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="responsable-id_card">{{ __('trans.id_card') }}</label>
                            <input type="text" class="form-control" name="responsable[id_card]" id="responsable-id_card"
                                   value="{{ old('responsable.id_card', $patient->responsable_id_card) }}" />
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="responsable-email">{{ __('trans.email') }}</label>
                            <input type="email" class="form-control" name="responsable[email]" id="responsable-email"
                                   value="{{ old('responsable.email', $patient->responsable_email) }}" />
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="responsable-address">{{ __('trans.address') }}</label>
                            <input type="text" class="form-control" name="responsable[address]" id="responsable-address"
                                   value="{{ old('responsable.address', $patient->responsable_address) }}" />
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
                    <div class="row main_target_form category-content content-data">
                        <!----------------------------------- Head Category ------------------------>
                        <div class="col-12 data_row_form justify-content-end">
                            <h2 class="col title_section_form">{{ $category->name }}</h2>
                            <div class="col-auto ">
                                @if($category->end_records)
                                    <button type="button" class="button_primary m-0" data-toggle="modal" data-target="#modal-{{ $category->id }}">{{ __('trans.previous-records') }}
                                        <i class="fas fa-history pl-3"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modal-{{ $category->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header head_modal">
                                                    <h4 id="staticBackdropLabel">{{ __('trans.previous-records-of', ['category' => $category->name]) }}</h4>

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
                                                                                    <td>{{ $data->value['value'] }}</td>
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

                                                <div class="footer_modal">
                                                    <div class="container_button"> <!-- Buttons -->
                                                        <button type="button" class="button_third" data-dismiss="modal">{{ __('trans.close') }}
                                                            <i class="fas fa-times-circle pl-2"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="col-auto ">
                                @if(!$category->required)
                                    <input type="checkbox" data-toggle="toggle" class="required-category" data-on="{{ __('trans.active') }}" data-off="{{ __('trans.inactive') }}"
                                           data-onstyle="primary" data-offstyle="secondary" id="required-{{ $category->id }}" name="values[{{ $category->id }}][required]" {{ (!$recordCategory->isEmpty()) ? 'checked':''}} >
                                @endif
                            </div>
                        </div>

                        <!----------------------------------- Body Category ------------------------>
                        <div class="col-12 content-body">
                            <!-- input for save category -->
                            <input type="hidden" name="values[{{ $category->id }}][id]" value="{{ $category->id }}">
                            <!-- option for multi register category -->
                            @if($category->is_various)
                                {{--                            <!-- add register multi save of the category -->--}}
                                <div id="category-{{ $category->id }}" class="content-category-group">
                                    <!-- validate exists previews register -->
                                    @if(isset($recordCategory))
                                        @php $last = $recordCategory->last();@endphp
                                        @foreach($recordCategory as $record)
                                            @if($last != $record)
                                                <div class="row form_row mt-3" style="border: 1px solid var(--green); border-radius: 5px;">
                                                    <!-- content button delete register category -->
                                                    <div class="col-12 d-flex justify-content-end mt-1">
                                                        <button class="button_third remove-register px-3" type="button"
                                                                data-category="category-{{ $category->id }}">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>

                                                    <div class="col-12 row group-variables m-0 p-0">
                                                        <!-- input for save code register category -->
                                                        <input type="hidden" name="values[{{ $category->id }}][data][{{ $record->code }}][code_category]" value="{{ $record->code }}" class="code-category">
                                                    @foreach($category->history_medical_variables as $variable)
                                                        <!-- search register of variable -->
                                                            @php
                                                                $id = $record->record_data->search(function($item, $key) use ($variable){
                                                                    return ($item->history_medical_variable_id == $variable->id);
                                                                });
                                                            @endphp
                                                            <div class="col-md-6 form-group px-2">
                                                                <label for="{{ $variable->id }}">{{ $variable->name }}</label>
                                                                <!-- save title of variable for the register -->
                                                                <input type="hidden" id="{{ $variable->id }}-title" value="{{ $variable->name }}"
                                                                       name="values[{{ $category->id }}][data][{{ $record->code }}][{{ $variable->id }}][title-value]">
                                                                <!-- save id of variable for the register -->
                                                                <input type="hidden" id="{{ $variable->id }}-id" value="{{ $variable->id }}"
                                                                       name="values[{{ $category->id }}][data][{{ $record->code }}][{{ $variable->id }}][id]">
                                                                <!-- validate type of variable, for type variable of print different -->
                                                                @switch($variable->variable_type_id)
                                                                    @case(1)
                                                                    <input type="number" id="{{ $variable->id }}" class="input_dataGroup_form"
                                                                           name="values[{{ $category->id }}][data][{{ $record->code }}][{{ $variable->id }}][value]"
                                                                           value="{{ ($id !== false) ? $record->record_data[$id]->value['value']:'' }}">
                                                                    @break
                                                                    @case(2)
                                                                    <textarea name="values[{{ $category->id }}][data][{{ $record->code }}][{{ $variable->id }}][value]"
                                                                              id="{{ $variable->id }}"
                                                                              class="form-control textArea_form">{{ ($id !== false) ? $record->record_data[$id]->value['value']:'' }}</textarea>
                                                                    @break
                                                                    @case(3)
                                                                    @php
                                                                        @endphp
                                                                    <input type="text" id="{{ $variable->id }}" class="input_dataGroup_form"
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
                                                                            class="input_dataGroup_form">
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
                                <div class="row form_row mt-3" style="border: 1px solid var(--green-strong); border-radius: 5px;">
                                    <div class="col-12 d-flex justify-content-end mt-1">
                                        <button class="button_primary add-register px-3" type="button"
                                                data-category="category-{{ $category->id }}">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <div class="col-12 row group-variables m-0 p-0">
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
                                            <div class="col-md-6 form-group px-2">
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
                                                           name="values[{{ $category->id }}][data][0][{{ $variable->id }}][value]" class="input_dataGroup_form"
                                                           value="{{ ($id !== false) ? $last->record_data[$id]->value['value']:'' }}">
                                                    @break
                                                    @case(2)
                                                    <textarea name="values[{{ $category->id }}][data][0][{{ $variable->id }}][value]"
                                                              id="{{ $variable->id }}"
                                                              class="form-control textArea_form">{{ ($id !== false) ? $last->record_data[$id]->value['value']:'' }}</textarea>
                                                    @break
                                                    @case(3)
                                                    <input type="text" id="{{ $variable->id }}"
                                                           name="values[{{ $category->id }}][data][0][{{ $variable->id }}][value]" class="input_dataGroup_form"
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
                                                            class="input_dataGroup_form">
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
                                    {{-- <!-- variables of the category -->--}}
                                    @foreach($category->history_medical_variables as $variable)
                                        {{-- <!-- validate if exists register category -->--}}
                                        @php
                                            $id = (!$recordCategory->isEmpty()) ? $recordCategory->first()->record_data->search(function($item, $key) use ($variable){
                                                return ($item->history_medical_variable_id == $variable->id);
                                            }) : false;
                                            $record = $recordCategory->first();
                                        @endphp
                                        <div class="col-md-6 form-group px-2">
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
                                                       name="values[{{ $category->id }}][data][0][{{ $variable->id }}][value]" class="input_dataGroup_form"
                                                       value="{{ ($id !== false) ? $record->record_data[$id]->value['value']:'' }}">
                                                @break
                                                @case(2)
                                                <textarea name="values[{{ $category->id }}][data][0][{{ $variable->id }}][value]"
                                                          id="{{ $variable->id }}"
                                                          class="form-control textArea_form">{{ ($id !== false) ? $record->record_data[$id]->value['value']:'' }}</textarea>
                                                @break
                                                @case(3)
                                                <input type="text" id="{{ $variable->id }}"
                                                       name="values[{{ $category->id }}][data][0][{{ $variable->id }}][value]" class="input_dataGroup_form"
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
                                                <select id="{{ $variable->id }}" name="values[{{ $category->id }}][data][0][{{ $variable->id }}][value]" class="input_dataGroup_form">
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
            <div id="diagnosis" class="main_target_form">
                <div class="data_row_form justify-content-end m-0">
                    <h2 class="col title_section_form">{{ __('trans.diagnosis') }}</h2>

                    @if(isset($patientOriginal->history_medical_records))
                        <div class="col-auto">
                            <!-- Button trigger modal -->
                            <button type="button" class="button_primary m-0" data-toggle="modal" data-target="#modal-diagnosis">{{ __('trans.previous-records') }}
                                <i class="fas fa-history pl-3"></i>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modal-diagnosis" data-backdrop="static" data-keyboard="false" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header head_modal">
                                            <h4 id="staticBackdropLabel">{{ __('trans.previous-records-of', ['category' => __('trans.diagnosis')]) }}</h4>

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

                                        <div class="footer_modal">
                                            <div class="container_button"> <!-- Buttons -->
                                                <button type="button" class="button_third" data-dismiss="modal">{{ __('trans.close') }}
                                                    <i class="fas fa-times-circle pl-2"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                @php //dd($historyMedical->diagnosis)@endphp
                <div class="data_row_form m-0">
                    <div class="col-12 content-diagnosis p-0 mb-2">
                        <label for="diagnosis-first">{{ __('validation.attributes.diagnosis') }}</label>
                        <input type="hidden" name="diagnosis[first][code]" id="diagnosis-first-code" class="diagnosis-code" value="{{ $diagnosis->code ?? ''}}">

                        <select name="diagnosis[first][description]" id="diagnosis-first" class="input_dataGroup_form select2" style="width: 100%;">
                            @if(isset($diagnosis->description))
                                <option value="{{ $diagnosis->description }}" selected="selected">
                                    {{ $diagnosis->description }}
                                </option>
                            @endif
                        </select>
                    </div>

                    <div class="col-12 content-diagnosis p-0">
                        <label for="diagnosis-description">{{ __('validation.attributes.diagnosis-optional-one') }}</label>
                        <input type="hidden" name="diagnosis[optional-one][code]" id="diagnosis-optional-one-code" class="diagnosis-code" {{ isset($diagnosis->code_optional_one) ?: 'disabled' }} value="{{ $diagnosis->code_optional_one  ?? ''}}">

                        <div class="d-flex mb-3">
                            <select name="diagnosis[optional-one][description]" id="diagnosis-optional-one" class="input_dataGroup_form select2" style="width: 100%;" {{ isset($diagnosis->description_optional_one) ?: 'disabled' }}>
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
                    <div class="col-12 content-diagnosis p-0">
                        <label for="diagnosis-description">{{ __('validation.attributes.diagnosis-optional-two') }}</label>
                        <input type="hidden" name="diagnosis[optional-two][code]" id="diagnosis-optional-two-code" class="diagnosis-code"  {{ isset($diagnosis->code_optional_two) ?: 'disabled' }} value="{{ $diagnosis->code_optional_two  ?? ''}}">

                        <div class="d-flex mb-3">
                            <select name="diagnosis[optional-two][description]" id="diagnosis-optional-two" class="input_dataGroup_form select2" style="width: 100%;" {{ isset($diagnosis->description_optional_two) ?: 'disabled' }}>
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
            </div>

            <!-- Abstract -->
            <div id="abstract" class="row main_target_form">

                <div class="col-12">
                    <div class="row">
                        <div class="col">
                            <h3 class="title_section_form">{{ __('trans.abstract') }}</h3>
                        </div>
                        @if(isset($patientOriginal->history_medical_records))
                            <div class="col-auto">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-info modal-records" data-toggle="modal" data-target="#modal-abstract">
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
                    <textarea name="diagnosis[abstract]" id="diagnosis-abstract" class="form-control">{{ old('diagnosis.abstract', $diagnosis->abstract) }}</textarea>
                </div>
            </div>

            <!-- Procedures -->
            <div id="procedures" class="row main_target_form content-data">
                <div class="col-12">
                    <div class="row">
                        <div class="col">
                            <h3 class="title_section_form">{{ __('trans.procedures') }}</h3>
                        </div>
                        @if(isset($patientOriginal->history_medical_records))
                            <div class="col-auto">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-info modal-records" data-toggle="modal" data-target="#modal-days_off">
                                    {{ __('trans.previous-records') }} <i class="fas fa-history"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="modal-procedures" data-backdrop="static" data-keyboard="false" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">{{ __('trans.previous-records-of', ['category' => __('trans.procedures')]) }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="accordion" id="accordion-procedures">
                                                    @foreach($patientOriginal->history_medical_records as $patientRecord)
                                                        @if(!empty($patientRecord->diagnosis->procedures) )
                                                            @php $id = Str::random('4'); @endphp
                                                            <div class="card">
                                                                <div class="card-header" id="headingOne">
                                                                    <h2 class="mb-0 w-100">
                                                                        <button class="btn btn-link btn-block text-left"
                                                                                type="button" data-toggle="collapse"
                                                                                data-target="#collapse-procedures-{{ $id }}"
                                                                                aria-expanded="true">
                                                                            {{ date('d-M/Y h:i a', strtotime($patientRecord->created_at)) }}
                                                                        </button>
                                                                    </h2>
                                                                </div>

                                                                <div id="collapse-procedures-{{ $id }}" class="collapse"
                                                                     aria-labelledby="headingOne" data-parent="#accordion-procedures">
                                                                    <div class="card-body">
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
                        <div class="col-auto">
                            <input type="checkbox" data-toggle="toggle" class="required-content"
                                   data-on="{{ __('trans.active') }}" data-off="{{ __('trans.inactive') }}"
                                   data-onstyle="primary" data-offstyle="secondary" id="procedures-required"
                                   name="procedures-required" {{ $diagnosis->procedures->isNotEmpty() ? 'checked':'' }} >
                        </div>
                    </div>
                </div>
                <div class="col-12">

                    <div class="row content-category-group" id="list-procedures">
                        @if($diagnosis->procedures->isNotEmpty())
                            @foreach($diagnosis->procedures as $key => $procedure)
                                <div class="col-12">
                                    <div class="input-group">
                                        <input type="hidden" name="procedures[{{ $key }}][code]"
                                               class="form-control" value="{{ $procedure->code }}">
                                        <input type="text" name="procedures[{{ $key }}][description]"
                                               class="form-control" value="{{ $procedure->description }}" readonly="">
                                        <input type="number" name="procedures[{{ $key }}][amount]"
                                               class="form-control " value="{{ $procedure->amount }}" placeholder="Cantidad">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-danger remove-procedures" type="button">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="row content-body">
                        <div class="col-12 form-group">
                            <label for="cups-select">{{ __('trans.cups-search') }}</label>

                            <div class="input-group mb-3">

                                <select id="cups-select"></select>

                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary" type="button" id="add-procedures">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- medical prescription -->
            <div id="medical-prescription" class="row main_target_form content-data">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm">
                            <h3 class="title_section_form">{{ __('trans.medical-prescription') }}</h3>
                        </div>

                        <div class="col-auto">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-medical-prescription">
                                {{ __('trans.add-medicine') }} <i class="fas fa-pills"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="modal-medical-prescription" data-backdrop="static"
                                 data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table w-100" id="table-medicine">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>{{ __('trans.active-principle') }}</th>
                                                    <th>{{ __('trans.name') }}</th>
                                                    <th>{{ __('trans.presentation') }}</th>
                                                    <th>{{ __('trans.laboratory') }}</th>
                                                    <th>{{ __('trans.action') }}</th>
                                                </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Understood</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if(isset($patientOriginal->history_medical_records))
                            <div class="col-auto">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-info modal-records" data-toggle="modal" data-target="#modal-prescriptions">
                                    {{ __('trans.previous-records') }} <i class="fas fa-history"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="modal-prescriptions" data-backdrop="static" data-keyboard="false" tabindex="-1">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">{{ __('trans.previous-records-of', ['category' => __('trans.prescription')]) }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="accordion" id="accordion-procedures">
                                                    @foreach($patientOriginal->history_medical_records as $patientRecord)
                                                        @if( $patientRecord->diagnosis->prescription->isNotEmpty() )
                                                            @php $id = Str::random('4'); @endphp
                                                            <div class="card">
                                                                <div class="card-header" id="headingOne">
                                                                    <h2 class="mb-0 w-100">
                                                                        <button class="btn btn-link btn-block text-left"
                                                                                type="button" data-toggle="collapse"
                                                                                data-target="#collapse-procedures-{{ $id }}"
                                                                                aria-expanded="true">
                                                                            {{ date('d-M/Y h:i a', strtotime($patientRecord->created_at)) }}
                                                                        </button>
                                                                    </h2>
                                                                </div>

                                                                <div id="collapse-procedures-{{ $id }}" class="collapse"
                                                                     aria-labelledby="headingOne" data-parent="#accordion-procedures">
                                                                    <div class="card-body">
                                                                        <table class="table table-responsive">
                                                                            <thead>
                                                                            <tr>
                                                                                <th>ID</th>
                                                                                <th>{{ __("trans.name") }}</th>
                                                                                <th>{{ __("trans.pharmaceutical-quantity") }}</th>
                                                                                <th>{{ __("trans.dose") }}</th>
                                                                                <th>{{ __("trans.days") }}</th>
                                                                                <th>{{ __("trans.via_administration") }}</th>
                                                                                <th>{{ __("trans.frequency") }}</th>
                                                                                <th>{{ __("trans.amount") }}</th>
                                                                                <th>{{ __("trans.indications") }}</th>
                                                                                <th>{{ __("trans.recommendations") }}</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            @foreach($patientRecord->diagnosis->prescription as $item)
                                                                                <tr>
                                                                                    <td>{{ $item->cums_id }}</td>
                                                                                    <td>{{ $item->name }}</td>
                                                                                    <td>{{ $item->pharmaceutical_quantity }}</td>
                                                                                    <td>{{ $item->dose }}</td>
                                                                                    <td>{{ $item->frequency }}</td>
                                                                                    <td>{{ $item->via_administration }}</td>
                                                                                    <td>{{ $item->amount }}</td>
                                                                                    <td>{{ $item->duration }}</td>
                                                                                    <td>{{ $item->indications }}</td>
                                                                                    <td>{{ $item->recommendations }}</td>
                                                                                </tr>
                                                                            @endforeach
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
                <div class="col-12">
                    <div class="row-cols-12 content-body" id="list-medical-prescription">
                        @if($diagnosis->prescription->isNotEmpty())
                            @foreach($diagnosis->prescription as $key => $item)
                                <div class="row main_target_form item-medical">
                                    <div class="col-12 justify-content-end d-flex">
                                        <button class="button_third remove-medicine px-3 " type="button">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    <div class="col-12">
                                        <input type="hidden" name="medical[{{ $key }}][id]" value="{{ $item->cums_id }}" class="medical-ids">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="medical-0-name">Nombre</label>
                                                <input type="text" name="medical[{{ $key }}][name]" id="medical-0-name"
                                                       class="form-control input_dataGroup_form"
                                                       value="{{ $item->name }}" readonly />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="medical-0-control">Cantidad farmacéutica</label>
                                                <input type="text" name="medical[{{ $key }}][pharmaceutical-quantity]"
                                                       id="medical-0-control" class="form-control input_dataGroup_form"
                                                       value="{{ $item->pharmaceutical_quantity }}" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md col-group">
                                                <label for="medical-0-dose">Dosis</label>
                                                <input type="text" name="medical[{{ $key }}][dose]"
                                                       id="medical-0-dose" class="form-control input_dataGroup_form"
                                                       value="{{ $item->dose }}">
                                            </div>
                                            <div class="col-md col-group">
                                                <label for="medical-0-days">Días</label>
                                                <input type="text" name="medical[{{ $key }}][days]"
                                                       id="medical-0-days" class="form-control input_dataGroup_form"
                                                       value="{{ $item->frequency }}">
                                            </div>
                                            <div class="col-md col-group">
                                                <label for="medical-0-via_administration">Vía de administración</label>
                                                <input type="text" name="medical[{{ $key }}][via_administration]"
                                                       id="medical-0-via_administration"
                                                       class="form-control input_dataGroup_form"
                                                       value="{{ $item->via_administration }}">
                                            </div>
                                            <div class="col-md col-group">
                                                <label for="medical-0-frequency">Frecuencia (Horas)</label>
                                                <input type="text" name="medical[{{ $key }}][frequency]"
                                                       id="medical-0-frequency"
                                                       class="form-control input_dataGroup_form"
                                                       value="{{ $item->amount }}" />
                                            </div>
                                            <div class="col-md col-group">
                                                <label for="medical-0-amount">Cantidad</label>
                                                <input type="text" name="medical[{{ $key }}][amount]"
                                                       id="medical-0-amount"
                                                       class="form-control input_dataGroup_form"
                                                       value="{{ $item->duration }}" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label for="medical-0-indications">Indicaciones</label>
                                                <textarea name="medical[{{ $key }}][indications]"
                                                          id="medical-0-indications"
                                                          class="form-control textArea_form">{{ $item->indications }}</textarea>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="medical-0-recommendations">Recomendaciones</label>
                                                <textarea name="medical[{{ $key }}][recommendations]"
                                                          id="medical-0-recommendations"
                                                          class="form-control textArea_form">{{ $item->recommendations }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <!-- Days Off -->
            <div id="days_off" class="row main_target_form content-data">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm">
                            <h3 class="title_section_form">{{ __('trans.days_off') }}</h3>
                        </div>
                        @if(isset($patientOriginal->history_medical_records))
                            <div class="col-auto">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-info modal-records" data-toggle="modal" data-target="#modal-days_off">
                                    {{ __('trans.previous-records') }} <i class="fas fa-history"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="modal-days_off" data-backdrop="static" data-keyboard="false" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">{{ __('trans.previous-records-of', ['category' => __('trans.days_off')]) }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="accordion" id="accordion-days_off">
                                                    @foreach($patientOriginal->history_medical_records as $patientRecord)
                                                        @if(isset($patientRecord->diagnosis->days_off) )
                                                            @php $id = Str::random('4'); @endphp
                                                            <div class="card">
                                                                <div class="card-header" id="headingOne">
                                                                    <h2 class="mb-0 w-100">
                                                                        <button class="btn btn-link btn-block text-left"
                                                                                type="button" data-toggle="collapse"
                                                                                data-target="#collapse-days_off-{{ $id }}"
                                                                                aria-expanded="true">
                                                                            {{ date('d-M/Y h:i a', strtotime($patientRecord->created_at)) }}
                                                                        </button>
                                                                    </h2>
                                                                </div>

                                                                <div id="collapse-days_off-{{ $id }}" class="collapse"
                                                                     aria-labelledby="headingOne" data-parent="#accordion-days_off">
                                                                    <div class="card-body">
                                                                        <label>{{ __('validation.attributes.days-off') }} : {{ $patientRecord->diagnosis->days_off }}</label>
                                                                        <br>
                                                                        {{ $patientRecord->diagnosis->description_days_off }}
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
                        <div class="col-auto">
                            <input type="checkbox" data-toggle="toggle" class="required-content"
                                   data-on="{{ __('trans.active') }}" data-off="{{ __('trans.inactive') }}"
                                   data-onstyle="primary" data-offstyle="secondary" id="required-days-off"
                                   name="diagnosis[required-days-off]" {{ (!empty($diagnosis->days_off)) ? 'checked':''}} >
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row content-body">
                        <div class="col-12 form-group">
                            <label for="diagnosis-days-off">{{ __('validation.attributes.days-off') }}</label>
                            <input type="number" name="diagnosis[days_off]" id="diagnosis-days-off" class="form-control"
                                   value="{{ old('diagnosis.abstract', $diagnosis->days_off) }}"/>
                        </div>
                        <div class="col-12 form-group">
                            <label for="diagnosis-description-days-off">{{ __('validation.attributes.description-days-off') }}</label>
                            <textarea name="diagnosis[description_days_off]" id="diagnosis-description-days-off"
                                      class="form-control">{{ old('diagnosis.abstract', $diagnosis->description_days_off) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- buttons -->
            <div class="container_button mb-5">
                <button class="button_primary" id="btn-save">{{ __('trans.save') }}
                    <i class="fas fa-save pl-2"></i>
                </button>
            </div>
        </form>

        <form action="{{ route('tenant.operative.medical-history.finished', ['record' => $historyMedical->id]) }}" id="form-finished-history-medical" class="d-none" method="post">
            @csrf
        </form>
    </section>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="{{ asset('plugin/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('plugin/select2/js/i18n/es.js') }}"></script>

    <script type="text/javascript" src="{{ asset('plugin/DataTables/datatables.min.js') }}"></script>

    <script>

        var count = 0;

        $(document).ready(function(){
            setInterval(function(){
                //saveData();
            }, 10000);

            var swi = $('.required-content:not(:checked)');
            var content = swi.parents('.content-data');

            content.find('.content-body').find('input, textarea, button, select')
                .attr('disabled',!swi.prop('checked'));
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

            form.find('.add-register').removeClass('button_primary').addClass('button_third');
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

        $('.required-content').on('change' ,function (e) {
            var swi = $(this);
            var content = swi.parents('.content-data');

            if (swi.prop('checked'))
            {
                content.find('.content-body').find('input, textarea, button, select')
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
                        content.find('.content-body').find('input, textarea, button, select')
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

        var cups_select = $('#cups-select').select2({
            theme: "bootstrap4",
            language: "es",
            ajax: {
                url: '{{ route('cups-search') }}',
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
        });

        var count_procedures = {{ count($diagnosis->procedures) }};
        $('#add-procedures').click(function (e) {
            count_procedures++;

            let data = cups_select.select2('data')[0];
            cups_select.val(null).trigger("change");

            let append = '<div class="col-12">' +
                '<div class="input-group">' +
                '<input type="hidden" name="procedures[' + count_procedures + '][code]" class="form-control" ' +
                'value="' + data.id + '">' +
                '<input type="text" name="procedures[' + count_procedures + '][description]" class="form-control" ' +
                'value="' + data.text + '" readonly>' +
                '<input type="number" name="procedures[' + count_procedures + '][amount]" class="form-control " ' +
                'value="1" placeholder="{{ __('trans.amount') }}">' +
                '<div class="input-group-append">' +
                '<button class="btn btn-outline-danger remove-procedures" type="button" >' +
                '<i class="fas fa-trash"></i>' +
                '</button>' +
                '</div>' +
                '</div>' +
                '</div>';

            $('#list-procedures').append(append);
        });

        $('#list-procedures').on('click', '.remove-procedures', function (e) {
            Swal.fire({
                title: '{{ __('trans.are-you-sure') }}?',
                text: "{{ __('trans.message-remove-procedure') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '{{ __('trans.delete') }}',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    let content = $(this).parents('.input-group');
                    content.remove();
                    {{--Swal.fire(--}}
                    {{--    '{{ __('trans.inactivated') }}',--}}
                    {{--    '{{ __('trans.message-deleted-success') }}',--}}
                    {{--    'success'--}}
                    {{--);--}}
                }
            });
        });

        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#table-medicine thead th').each( function () {
                var title = $(this).text();
                if (title !== '{{ __('trans.action') }}')
                {
                    $(this).append( '<input type="text" placeholder="{{ __('trans.search') }} '+title+'" class="form-control"/>' );
                }
            } );

            var datatable = $('#table-medicine').DataTable({
                processing: true,
                serverSide: true,
                ordering: false,
                searching: true,
                ajax: "{{ route('cums-search') }}",
                columns: [
                    { "data": "id","name": "id" },
                    { "data": "active_principle","name": "active_principle" },
                    { "data": "product","name": "product" },
                    { "data": "reference_unit","name": "reference_unit" },
                    { "data": "role_name","name": "role_name" },
                    { "data": "action","name": "action" },
                    //{ "data": "pharmaceutical_form" }
                ],
                initComplete: function () {
                    // Apply the search
                    this.api().columns().every( function () {
                        var that = this;

                        $( 'input', this.header() ).on( 'keyup change clear', function () {
                            if ( that.search() !== this.value ) {
                                that
                                    .search( this.value )
                                    .draw();
                            }
                        } );
                    } );
                }
            });
            var count_medicine = 0;
            $('#table-medicine tbody').on('click', '.add-medicine', function (e) {
                count_medicine++;

                let data = datatable.row($(this).parents('tr')).data();

                $('#modal-medical-prescription').modal('hide');

                let status = true;
                $.each($('.medical-ids'), function (key, item) {
                    if ($(item).val() == data.id) status = false;
                });

                if (status)
                {
                    let content = '<div class="row main_target_form item-medical">' +
                        '<div class="col-12 justify-content-end d-flex">' +
                        '<button class="button_third remove-medicine px-3 " type="button">' +
                        '<i class="fas fa-trash"></i>' +
                        '</button>' +
                        '</div>' +
                        '<div class="col-12">' +
                        '<input type="hidden" name="medical[' + count_medicine + '][id]" value="' + data.id + '" class="medical-ids">' +
                        '<div class="row">' +
                        '<div class="col-md-6">' +
                        '<label for="medical-0-name">{{ __("trans.name") }}</label>' +
                        '<input type="text" name="medical[' + count_medicine + '][name]" id="medical-0-name"' +
                        'class="form-control input_dataGroup_form"' +
                        'value="' + data.product + ((data.reference_unit) ? ' / ' + data.reference_unit:'') + '" readonly/>' +
                        '</div>' +
                        '<div class="col-md-6">' +
                        '<label for="medical-0-control">{{ __("trans.pharmaceutical-quantity") }}</label>' +
                        '<input type="text" name="medical[' + count_medicine + '][pharmaceutical-quantity]" id="medical-0-control"' +
                        'class="form-control input_dataGroup_form"' +
                        'value="' + data.amount_cum + ' / ' + data.unit + ' / ' + data.pharmaceutical_form + '" readonly/>' +
                        '</div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-md col-group">' +
                        '<label for="medical-0-dose">{{ __("trans.dose") }}</label>' +
                        '<input type="text" name="medical[' + count_medicine + '][dose]" id="medical-0-dose"' +
                        'class="form-control input_dataGroup_form"' +
                        'value=""/>' +
                        '</div>' +
                        '<div class="col-md col-group">' +
                        '<label for="medical-0-days">{{ __("trans.days") }}</label>' +
                        '<input type="text" name="medical[' + count_medicine + '][days]" id="medical-0-days"' +
                        'class="form-control input_dataGroup_form"' +
                        'value=""/>' +
                        '</div>' +
                        '<div class="col-md col-group">' +
                        '<label for="medical-0-via_administration">{{ __("trans.via_administration") }}</label>' +
                        '<input type="text" name="medical[' + count_medicine + '][via_administration]"' +
                        'id="medical-0-via_administration" class="form-control input_dataGroup_form"' +
                        'value="' + data.via_administration + '"/>' +
                        '</div>' +
                        '<div class="col-md col-group">' +
                        '<label for="medical-0-frequency">{{ __("trans.frequency") }}</label>' +
                        '<input type="text" name="medical[' + count_medicine + '][frequency]"' +
                        'id="medical-0-frequency" class="form-control input_dataGroup_form"' +
                        'value=""/>' +
                        '</div>' +
                        '<div class="col-md col-group">' +
                        '<label for="medical-0-amount">{{ __("trans.amount") }}</label>' +
                        '<input type="text" name="medical[' + count_medicine + '][amount]"' +
                        'id="medical-0-amount" class="form-control input_dataGroup_form"' +
                        'value=""/>' +
                        '</div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-md-6 form-group">' +
                        '<label for="medical-0-indications">{{ __("trans.indications") }}</label>' +
                        '<textarea name="medical[' + count_medicine + '][indications]" id="medical-0-indications"' +
                        'class="form-control textArea_form"></textarea>' +
                        '</div>' +
                        '<div class="col-md-6 form-group">' +
                        '<label for="medical-0-recommendations">{{ __("trans.recommendations") }}</label>' +
                        '<textarea name="medical[' + count_medicine + '][recommendations]" id="medical-0-recommendations"' +
                        'class="form-control textArea_form"></textarea>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>';

                    $('#list-medical-prescription').append(content);
                } else {
                    Swal.fire(
                        '{{ __('trans.error') }}',
                        '{{ __('trans.message-repeated-medicine') }}',
                        'error'
                    );
                }
            });

            $('#list-medical-prescription').on('click', '.remove-medicine', function (e) {
                let content = $(this).parents('.item-medical');
                Swal.fire({
                    title: '{{ __('trans.are-you-sure') }}?',
                    text: "{{ __('trans.message-remove-medicine') }}",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: '{{ __('trans.delete') }}',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    reverseButtons: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        content.remove();
                    }
                });
            });
        });
    </script>
@endsection
