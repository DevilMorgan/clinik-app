
@extends('tenant.layouts.app')

@section('styles')

@endsection

@section('content')
    @php
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
            @foreach($model->history_medical_categories as $category)
                <div class="row main_target_form">
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
                    <div class="col-12">
                        @if($category->is_various)
                            <div id="category-{{ $category->id }}" class="content-category-group">

                            </div>
                            <div class="row form_row " style="border: 1px solid deepskyblue">
                                <div class="col-12 d-flex justify-content-end mt-1">
                                    <button class="btn btn-info add-register" type="button"
                                            data-category="category-{{ $category->id }}">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <div class="col-12 row group-variables">
                                    @foreach($category->history_medical_variables as $variable)
                                        <div class="col-md-6 form-group">
                                            <label for="{{ $variable->id }}">{{ $variable->name }}</label>
                                            <input type="hidden" name="values[{{ $variable->id }}][title-value]" id="{{ $variable->id }}-title" value="{{ $variable->name }}">
                                            <input type="hidden" name="values[{{ $variable->id }}][id]" id="{{ $variable->id }}-id" value="{{ $variable->id }}">
                                            <br>
                                            @switch($variable->variable_type_id)
                                                @case(1)
                                                <input type="number" id="{{ $variable->id }}"
                                                       name="values[{{ $variable->id }}][value][]" class="form-control">
                                                @break
                                                @case(2)
                                                <textarea name="values[{{ $variable->id }}][value][]" id="{{ $variable->id }}"
                                                          cols="30" rows="2" class="form-control textArea_form"></textarea>
                                                @break
                                                @case(3)
                                                <input type="text" id="{{ $variable->id }}"
                                                       name="values[{{ $variable->id }}][value][]" class="form-control">
                                                @break
                                                @case(4)
                                                <input type="range" id="{{ $variable->id }}" oninput="this.nextElementSibling.value = this.value"
                                                       value="0"
                                                       name="values[{{ $variable->id }}][value][]" class="custom-range"
                                                       max="{{ $variable->config['max'] }}"
                                                       min="{{ $variable->config['min'] }}"
                                                       step="{{ $variable->config['step'] }}">
                                                <output>0</output>
                                                @break
                                                @case(5)
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="{{ $variable->id }}-yes" value="{{ $variable->config['value-true'] }}"
                                                           name="values[{{ $variable->id }}][value][]" class="form-check-input" />
                                                    <label  class="form-check-label" for="{{ $variable->id }}-yes">{{ $variable->config['name-true'] }}</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="{{ $variable->id }}-not" value="{{ $variable->config['value-false'] }}"
                                                           name="values[{{ $variable->id }}][value][]" class="form-check-input" />
                                                    <label  class="form-check-label" for="{{ $variable->id }}-not">{{ $variable->config['name-false'] }}</label>
                                                </div>
                                                @break
                                                @case(6)
                                                <select id="{{ $variable->id }}" name="values[{{ $variable->id }}][value][]"
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
                            </div>
                        @else
                            <div class="row form_row">
                                @foreach($category->history_medical_variables as $variable)
                                    <div class="col-md-6 form-group">
                                        <label for="{{ $variable->id }}">{{ $variable->name }}</label>
                                        <input type="hidden" name="values[{{ $variable->id }}][title-value]" id="{{ $variable->id }}-title" value="{{ $variable->name }}">
                                        <input type="hidden" name="values[{{ $variable->id }}][id]" id="{{ $variable->id }}-id" value="{{ $variable->id }}">
                                        <br>
                                        @switch($variable->variable_type_id)
                                            @case(1)
                                            <input type="number" id="{{ $variable->id }}"
                                                   name="values[{{ $variable->id }}][value]" class="form-control">
                                            @break
                                            @case(2)
                                            <textarea name="values[{{ $variable->id }}][value]" id="{{ $variable->id }}"
                                                      cols="30" rows="2" class="form-control textArea_form"></textarea>
                                            @break
                                            @case(3)
                                            <input type="text" id="{{ $variable->id }}"
                                                   name="values[{{ $variable->id }}][value]" class="form-control">
                                            @break
                                            @case(4)
                                            <input type="range" id="{{ $variable->id }}" oninput="this.nextElementSibling.value = this.value"
                                                   value="0"
                                                   name="values[{{ $variable->id }}][value]" class="custom-range"
                                                   max="{{ $variable->config['max'] }}"
                                                   min="{{ $variable->config['min'] }}"
                                                   step="{{ $variable->config['step'] }}">
                                            <output>0</output>
                                            @break
                                            @case(5)
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="{{ $variable->id }}-yes" value="{{ $variable->config['value-true'] }}"
                                                       name="values[{{ $variable->id }}][value]" class="form-check-input" />
                                                <label  class="form-check-label" for="{{ $variable->id }}-yes">{{ $variable->config['name-true'] }}</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="{{ $variable->id }}-not" value="{{ $variable->config['value-false'] }}"
                                                       name="values[{{ $variable->id }}][value]" class="form-check-input" />
                                                <label  class="form-check-label" for="{{ $variable->id }}-not">{{ $variable->config['name-false'] }}</label>
                                            </div>
                                            @break
                                            @case(6)
                                            <select id="{{ $variable->id }}" name="values[{{ $variable->id }}][value]"
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
            })
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

            var form = btn.parent().parent().clone();

            form.find('.add-register').removeClass('btn-info').addClass('btn-danger');
            form.find('.add-register').removeClass('add-register').addClass('remove-register');
            form.find('i').removeClass('fa-plus').addClass('fa-trash');

            $("#" + btn.data('category')).append(form);

            //btn.parent().parent().reset();

            btn.parent().parent().find(':input').not(':button, :submit, :reset, :hidden, :checkbox, :radio').val('');
            btn.parent().parent().find(':checkbox, :radio').prop('checked', false);
        });

        $('.content-category-group').on('click', '.remove-register', function (e) {
            console.log('ok');
            var btn = $(this);
            btn.parent().parent().remove();
        });
    </script>
@endsection
