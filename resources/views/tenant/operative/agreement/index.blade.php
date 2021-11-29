@extends('tenant.layouts.app')

@section('styles')
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/DataTables/datatables.min.css') }}"/>--}}
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <nav aria-label="breadcrumb" class="agenda_path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.operative.agreement.index') }}">
                        {{ __('trans.agreements') }}
                    </a>
                </li>
                {{--                <li class="breadcrumb-item"><a href="{{ route('tenant.operative.agreement.create') }}">{{ __('trans.add-agreement') }}</a></li>--}}
            </ol>
        </nav>
    </nav>
    <div class="agenda_row my-3">
        <h1 class="title_list">{{ __('trans.agreement') }}&nbsp;<i class="fas fa-handshake"></i></h1>
        <a href="{{ route('tenant.operative.agreement.create') }}" class="button_primary">{{ __('trans.add-agreement') }}
            <i class="fas fa-handshake"></i>
        </a>
    </div>

    <table id="patients-table" class="table table-hover table_agenda my-3" style="width:100%">
        <thead>
        <tr>
            <th>{{ __('trans.name') }}</th>
            <th>{{ __('trans.code') }}</th>
            <th>{{ __('trans.action') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($agreements as $agreement)
            <tr>
                <td>{{ $agreement->name }}</td>
                <td>{{ $agreement->code }}</td>
                <td>
                    <a href="{{ route('tenant.operative.agreement.edit', ['agreement' => $agreement->id]) }}" data-toggle="tooltip" data-container=".tooltip-danger"
                       title="Edit user" class="action_table">
                        <i class="fas fa-user-edit"></i> Edit
                    </a>
                    <a href="{{ route('tenant.operative.agreement.co-pay', ['agreement' => $agreement->id]) }}" data-toggle="tooltip" data-container=".tooltip-danger"
                       title="Edit user" class="action_table">
                        <i class="fas fa-money-bill-wave"></i> {{ __('trans.co-pay') }}
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('plugin/DataTables/datatables.min.js') }}"></script>

@endsection
