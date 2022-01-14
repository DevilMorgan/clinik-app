@extends('tenant.layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/DataTables/css/jquery.dataTables.min.css') }}"/>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <nav aria-label="breadcrumb" class="agenda_path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('tenant.operative.information.index') }}">{{ __('trans.information') }}</a></li>
                <li class="breadcrumb-item"><a href="#">{{ __('trans.prescriptions') }}</a></li>
            </ol>
        </nav>
    </nav>

    <section class="container-fluid">
        <div class="row">
            <div class="col-12">
                <table id="prescriptions-table" class="display nowrap my-3" style="width:100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{ __('trans.patient') }}</th>
                        <th>{{ __('trans.id_card') }}</th>
                        <th>{{ __('trans.date') }}</th>
                        <th>{{ __('trans.document') }}</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($documents as $document)
                        <tr>
                            <td>{{ $document->id }}</td>
                            <td>{{ $document->record->basic_information->full_name_patient }}</td>
                            <td>{{ $document->record->basic_information->patient_id_card }}</td>
                            <td>{{ date('M-d/Y h:i a', strtotime($document->record->date)) }}</td>
                            <td>
                                <a href="{{ asset($document->directory) }}" class="btn btn-link" target="_blank">
                                    {{ $document->reference }}.pdf
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-12">
                <a href="{{ route('tenant.operative.information.index') }}" class="btn btn-default">
                    <i class="fas fa-arrow-left"></i> {{ __('trans.return') }}
                </a>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('plugin/DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#prescriptions-table').DataTable( {
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                },
                responsive: true
            } );
        } );
    </script>
@endsection
