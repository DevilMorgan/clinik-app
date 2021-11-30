@extends('tenant.layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <nav aria-label="breadcrumb" class="agenda_path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.operative.agreement.index') }}">
                        {{ __('trans.agreements') }}
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.operative.agreement.co-pay', ['agreement' => $agreement->id]) }}">
                        {{ __('trans.agreement-co-pay') }}
                    </a>
                </li>
            </ol>
        </nav>
    </nav>
    <form action="{{ route('tenant.operative.agreement.co-pay-save', ['agreement' => $agreement->id]) }}" method="post" class="form">
        @csrf
        <div class="main_target_form">
            <div class="form_row">
                <h2 class="col-12 title_section_form">{{ __('trans.agreement-co-pay') }} - {{ $agreement->name }}</h2>
                <div class="col-12 data_row_form">
                    @foreach($dateTypes as $item)
                        @php
                            $status = isset($item->agreements[0]);$price = ($status) ? $item->agreements[0]->pivot->price : null;
                        @endphp
                        <div class="col-md-6 data_group_form">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">{{ $item->name }}</span>
                                </div>

                                <input type="number" class="form-control co-pay-price-{{ $item->id }}"
                                       name="co-pay[{{ $item->id }}][price]" placeholder="0000"
                                       value="{{ old( 'co-pay.' . $item->id . '.price', $price) }}"
                                    {{ old( 'status.' . $item->id, $status) == true ? '' : 'disabled' }}>

                                <input type="hidden" name="co-pay[{{ $item->id }}][date_type_id]"
                                       value="{{ $item->id }}" class="co-pay-price-{{ $item->id }}"
                                    {{ old( 'status.' . $item->id, $status) == true ? '' : 'disabled' }}>

                                <input type="hidden" name="co-pay[{{ $item->id }}][agreement_id]"
                                       value="{{ $agreement->id }}" class="co-pay-price-{{ $item->id }}"
                                    {{ old( 'status.' . $item->id, $status) == true ? '' : 'disabled' }}>

                                <div class="input-group-append">
                                    <div class="input-group-text">

                                        <input type="checkbox" name="status[{{ $item->id }}]" data-id="{{ $item->id }}"
                                               class="check-co-pay"
                                            {{ old( 'status.' . $item->id, $status) == true ? 'checked' : '' }}>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="container_button">
                <a href="{{ route('tenant.operative.agreement.index') }}" type="submit" class="button_third">{{ __('trans.cancel') }}
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
        $('.check-co-pay').click(function (e) {
            var check = $(this);

            if (check.prop('checked')) {
                $('.co-pay-price-' + check.data('id')).prop('disabled', false);
            } else {
                $('.co-pay-price-' + check.data('id')).prop('disabled', true);
            }
        });
    </script>
@endsection
