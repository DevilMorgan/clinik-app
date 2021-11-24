
@extends('tenant.layouts.app')

@section('styles')

@endsection

@section('content')
    @php
        $categories = $historyMedical->record_categories;
        $model = $historyMedical->history_medical_model;
    @endphp
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-auto">
                <h2>{{ $model->name }}</h2>
            </div>
        </div>
        <form id="form-create-history-medical" method="post" enctype="multipart/form-data"
              action="{{ route('tenant.operative.medical-history.store', ['record' => $record]) }}">
            @csrf
            <input type="hidden" name="delete-record-categories" id="delete-record-categories">
            <!-- loop for categories -->
            @foreach($model->history_medical_categories as $category)
                @php
                    $recordCategory = $historyMedical->record_categories->filter(function ($item) use ($category){
                        return $item->history_medical_category_id == $category->id;
                    });
                @endphp
                <div class="row main_target_form">
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
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('trans.close') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!----------------------------------- Body Category ------------------------>
                    <div class="col-12">
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
                                                                        <option value="{{ $item }}" {{ ($values != false and in_array($item, $values)) ? 'selected':'' }}>{{ $item }}</option>
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
                                                        <option value="{{ $item }}" {{ ($values != false and in_array($item, $values)) ? 'selected':'' }} >{{ $item }}</option>
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
            <div class="row main_target_form d-flex justify-content-end">
                <button class="btn btn-info" id="btn-save">
                    <i class="fas fa-save"></i> {{ __('trans.save') }}
                </button>
            </div>
        </form>
    </section>
@endsection

@section('scripts')
    <script>

        var count = 0;

        $(document).ready(function(){
            setInterval(function(){
                saveData();
            }, 10000);
        });

        $('#form-create-history-medical').submit(function(e){
            e.preventDefault();
            var form = $(this);

            Swal.fire({
                title: '{{ __('trans.are-you-sure') }}?',
                text: "{{ __('trans.finished-history-medical') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '{{ __('trans.finish') }}',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        '{{ __('trans.finished') }}',
                        '{{ __('trans.message-save-success') }}',
                        'success'
                    )
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
    </script>
@endsection
