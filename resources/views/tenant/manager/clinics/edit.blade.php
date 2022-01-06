@extends('tenant.layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugin/jquery-ui-1.13/jquery-ui.min.css') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <nav aria-label="breadcrumb" class="agenda_path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.manager.clinics.index') }}">{{ __('trans.clinics') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.manager.clinics.edit', ['clinic', $clinic->id]) }}">{{ __('trans.edit-clinic') }}</a>
                </li>
            </ol>
        </nav>
    </nav>
    <form action="{{ route('tenant.manager.clinics.update', $clinic->id) }}" method="post" class="form" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="main_target_form">
            <div class="form_row">
                <!-- User information -->
                <h2 class="col-12 title_section_form">{{ __('trans.clinic-information') }}</h2>

                <div class="col-md-6 data_group_form">
                    <label for="name">{{ __('validation.attributes.name') }} (*)</label>
                    <input type="text" class="input_dataGroup_form @error('name') is-invalid @enderror" id="name"
                           name="name" required value="{{ old('name', $clinic->name) }}">
                </div>

                <div class="col-md-6 data_group_form">
                    <label for="address">{{ __('validation.attributes.address') }} (*)</label>
                    <input type="text" class="input_dataGroup_form @error('address') is-invalid @enderror" id="address"
                           name="address" required value="{{ old('address', $clinic->address) }}">
                </div>

                <div class="col-md-6 data_group_form">
                    <label for="country">{{ __('validation.attributes.country') }} (*)</label>
                    <input type="text" class="input_dataGroup_form @error('country') is-invalid @enderror country"
                           id="country" name="country" required value="{{ old('country', $clinic->country) }}">
                </div>

                <div class="col-md-6 data_group_form">
                    <label for="department">{{ __('validation.attributes.department') }} (*)</label>
                    <input type="text" class="input_dataGroup_form @error('department') is-invalid @enderror department"
                           id="department" name="department" required value="{{ old('department', $clinic->department) }}">
                </div>

                <div class="col-md-6 data_group_form">
                    <label for="city">{{ __('validation.attributes.city') }} (*)</label>
                    <input type="text" class="input_dataGroup_form @error('city') is-invalid @enderror city"
                           id="city" name="city" required value="{{ old('city', $clinic->city) }}">
                </div>

                <div class="col-md-6 data_group_form">
                    <label for="schedule">{{ __('validation.attributes.schedule') }}</label>
                    <input type="text" class="input_dataGroup_form @error('schedule') is-invalid @enderror" id="schedule"
                           name="schedule" value="{{ old('schedule', $clinic->schedule) }}">
                </div>

                <div class="col-md-6 data_group_form">
                    <label for="phone">{{ __('validation.attributes.phone') }}</label>
                    <input type="text" class="input_dataGroup_form @error('phone') is-invalid @enderror" id="phone"
                           name="phone" value="{{ old('phone', $clinic->phone) }}">
                </div>

                <div class="col-md-6 data_group_form">
                    <label for="cellphone">{{ __('validation.attributes.cellphone') }}</label>
                    <input type="text" class="input_dataGroup_form @error('cellphone') is-invalid @enderror" id="cellphone"
                           name="cellphone" value="{{ old('cellphone', $clinic->cellphone) }}">
                </div>

                <!-- Additional information user -->
                <h2 class="col-12 title_section_form">{{ __('trans.surgeries') }}</h2>
                <input type="hidden" name="surgeries-delete" id="surgeries-delete">
                @php
                    $sur = old('surgeries', $clinic->surgeries);
                @endphp

                <div class="col-12" >
                    <div class="row" id="content-surgeries">
                        @if(is_object($sur) and !is_null($sur))
                            @foreach($sur as $key => $item)
                                @if($key != 0)
                                    <div class="col-12 data_row_form">
                                        @if(isset($item['id']))
                                            <input class="form-control surgery-id" type="hidden" id="id-{{ $key }}" name="surgeries[{{ $key }}][id]" value="{{ $item['id'] }}">
                                        @endif

                                        <div class="col-md-6 d-flex p-0 px-md-2 mb-3">
                                            <input type="number" placeholder="{{ __('trans.number') }}" aria-label="{{ __('trans.number') }}"
                                                   class="form-control input_especial @error('surgeries.' . $key . '.number') is-invalid @enderror"
                                                   id="number-{{ $key }}" name="surgeries[{{ $key }}][number]" value="{{ $item['number'] }}">
                                        </div>

                                        <div class="col-md-6 d-flex p-0 px-md-2 mb-3">
                                            <input type="text" placeholder="{{ __('trans.type') }}" aria-label="{{ __('trans.type') }}"
                                                   class="form-control input_especial @error('surgeries.' . $key . '.type') is-invalid @enderror"
                                                   id="type-{{ $key }}" name="surgeries[{{ $key }}][type]" value="{{ $item['type'] }}">

                                            <div class="input-group-append">
                                                <button class="button_primary button_third m-0 px-3 btn-remove-surgery" type="button">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="col-12 data_row_form">
                    <input class="form-control surgery-id" type="hidden" id="id-0" name="surgeries[0][id]"
                           value="{{ old('surgeries.0.id', (isset($clinic->surgeries[0]->id)) ? $clinic->surgeries[0]->id : null) }}">

                    <div class="col-md-6 d-flex p-0 px-md-2 mb-3">
                        <input type="number" placeholder="{{ __('trans.number') }}" aria-label="{{ __('trans.number') }}"
                               class="form-control input_especial @error('surgeries.0.number') is-invalid @enderror" id="number-0" name="surgeries[0][number]"
                               value="{{ old('surgeries.0.number', (isset($clinic->surgeries[0]->number)) ? $clinic->surgeries[0]->number : null) }}">
                    </div>

                    <div class="col-md-6 d-flex p-0 px-md-2 mb-3">
                        <input type="text" placeholder="{{ __('trans.type') }}" aria-label="{{ __('trans.type') }}"
                               class="form-control input_especial @error('surgeries.0.type') is-invalid @enderror" id="type-0" name="surgeries[0][type]"
                               value="{{ old('surgeries.0.type', (isset($clinic->surgeries[0]->type)) ? $clinic->surgeries[0]->type : null) }}">

                        <div class="input-group-append">
                            <button class="button_primary m-0 px-3" type="button" id="btn-add-surgery">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="container_button">
                <a href="{{ route('tenant.manager.clinics.index') }}" type="submit" class="button_third">
                    {{ __('trans.cancel') }}<i class="fas fa-times-circle pl-2"></i>
                </a>
                <button type="submit" class="button_primary">
                    {{ __('trans.save') }}<i class="fas fa-save pl-2"></i>
                </button>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('plugin/jquery-ui-1.13/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/location.js') }}"></script>

    <script>
        var count = {{ is_object($sur) ? count($sur) : 0 }};
        $('#btn-add-surgery').click(function (e) {
            count++;
            var btn = $(this);
            var content = btn.parents('.data_row_form');

            var new_content = content.clone();
            $.each(new_content.find('.input_especial'), function (key, item) {
                var i = $(item);
                var name = i.attr('name').replace('0', count);
                i.attr('name', name);
                var id = i.attr('id').replace('0', count);
                i.attr('id', id);
            });

            var btn_remove = new_content.find('#btn-add-surgery')
                .removeAttr('id')
                .removeClass('button_primary')
                .addClass('btn-remove-surgery')
                .addClass('button_third')
                .html('<i class="fas fa-trash"></i>');

            $('#content-surgeries').append(new_content);

            content.find('.input_especial').val('');
        });

        $('#content-surgeries').on('click', '.btn-remove-surgery', function (e) {
            var btn = $(this);
            var content = btn.parents('.data_row_form');

            //console.log(form.find('.code-category'));
            var value = $('#surgeries-delete');

            var id = $(content.find('.surgery-id')).val();

            if (value.val() === '')
            {
                value.val(id);
            } else {
                var myarr = value.val().split(";");

                myarr.push(id);

                value.val(myarr.join(';'));
            }

            content.remove();
        });
    </script>
@endsection
