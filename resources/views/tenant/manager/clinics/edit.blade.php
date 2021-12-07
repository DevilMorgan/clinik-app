@extends('tenant.layouts.app')

@section('styles')

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

                <div class="col-12 data_row_form" id="content-surgeries">
                    @if(is_object($sur) and !is_null($sur))
                        @foreach($sur as $key => $item)
                            @if($key != 0)
                                <div class="input-group">
                                    @if(isset($item['id']))
                                        <input class="form-control surgery-id" type="hidden" id="id-{{ $key }}" name="surgeries[{{ $key }}][id]" value="{{ $item['id'] }}">
                                    @endif
                                    <input type="number" placeholder="{{ __('trans.number') }}" aria-label="{{ __('trans.number') }}"
                                           class="form-control @error('surgeries.' . $key . '.number') is-invalid @enderror"
                                           id="number-{{ $key }}" name="surgeries[{{ $key }}][number]" value="{{ $item['number'] }}">

                                    <input type="text" placeholder="{{ __('trans.type') }}" aria-label="{{ __('trans.type') }}"
                                           class="form-control @error('surgeries.' . $key . '.type') is-invalid @enderror"
                                           id="type-{{ $key }}" name="surgeries[{{ $key }}][type]" value="{{ $item['type'] }}">

                                    <div class="input-group-append">
                                        <button class="btn btn-remove-surgery btn-outline-danger" type="button">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
                <div class="col-12 data_row_form">
                    <div class="input-group">

                        <input class="form-control surgery-id" type="hidden" id="id-0" name="surgeries[0][id]"
                               value="{{ old('surgeries.0.id', (isset($clinic->surgeries[0]->id)) ? $clinic->surgeries[0]->id : null) }}">

                        <input type="number" placeholder="{{ __('trans.number') }}" aria-label="{{ __('trans.number') }}"
                               class="form-control @error('surgeries.0.number') is-invalid @enderror" id="number-0" name="surgeries[0][number]"
                               value="{{ old('surgeries.0.number', (isset($clinic->surgeries[0]->number)) ? $clinic->surgeries[0]->number : null) }}">

                        <input type="text" placeholder="{{ __('trans.type') }}" aria-label="{{ __('trans.type') }}"
                               class="form-control @error('surgeries.0.type') is-invalid @enderror" id="type-0" name="surgeries[0][type]"
                               value="{{ old('surgeries.0.type', (isset($clinic->surgeries[0]->type)) ? $clinic->surgeries[0]->type : null) }}">

                        <div class="input-group-append">
                            <button class="btn btn-outline-info" type="button" id="btn-add-surgery">
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
    <script>
        var count = {{ is_object($sur) ? count($sur) : 0 }};
        $('#btn-add-surgery').click(function (e) {
            count++;
            var btn = $(this);
            var content = btn.parent().parent();

            var new_content = content.clone();
            $.each(new_content.find('.input_dataGroup_form'), function (key, item) {
                var i = $(item);
                var name = i.attr('name').replace('0', count);
                i.attr('name', name);
                var id = i.attr('id').replace('0', count);
                i.attr('id', id);
            });

            var btn_remove = new_content.find('#btn-add-surgery')
                .removeAttr('id')
                .removeClass('btn-outline-info')
                .addClass('btn-remove-surgery')
                .addClass('btn-outline-danger')
                .html('<i class="fas fa-trash"></i>');

            $('#content-surgeries').append(new_content);

            content.find('.input_dataGroup_form').val('');
        });

        $('#content-surgeries').on('click', '.btn-remove-surgery', function (e) {
            var btn = $(this);
            var content = btn.parent().parent();

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
