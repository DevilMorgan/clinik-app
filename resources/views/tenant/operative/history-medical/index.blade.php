@extends('tenant.layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/DataTables/css/jquery.dataTables.min.css') }}"/>
@endsection

@section('content')
    @php $user = Auth::user()@endphp
    <nav aria-label="breadcrumb">
        <nav aria-label="breadcrumb" class="agenda_path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.patients.index') }}">
                        {{ __('trans.patients') }}
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.operative.medical-history.index', ['patient' => $patient->id]) }}">
                        {{ __('trans.medical-history') }}
                    </a>
                </li>
            </ol>
        </nav>
    </nav>

    <div class="agenda_row my-3">
        <h1 class="title_list">{{ __('trans.medical-history') }}&nbsp;<i class="fas fa-file-signature"></i></h1>
        <button type="button" class="button_save_form" data-toggle="modal" data-target="#modal-create-history-medical">
            {{ __('trans.add-medical-history') }}&nbsp;<i class="fas fa-plus"></i>
        </button>
    </div>

    <table id="patients-table" class="display nowrap table_agenda my-3" style="width:100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>{{ __('trans.date') }}</th>
            <th>{{ __('manager.model') }}</th>
            <th>{{ __('trans.action') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($patient->history_medical_records as $record)
            <tr>
                <td>{{ $record->id }}</td>
                <td>{{ date('d/M Y h:i a', strtotime($record->date)) }}</td>
                <td>{{ $record->history_medical_model->name }}</td>
                <td>
                    @can('today-edit-history-medical', $record)
                        <a href="{{ route('tenant.operative.medical-history.register', ['patient' => $patient->id, 'record' => $record->id]) }}"
                           class="action_table">
                            <i class="fas fa-edit"></i> {{ __('trans.edit') }}
                        </a>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Create History medical -->
    <div class="modal fade modalC" id="modal-create-history-medical" role="dialog" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Header Modal-->
                <div class="modal-header head_modal">
                    <h1 class="" id="exampleModalLabel">{{ __('trans.medical-history') }}</h1>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <form action="{{ route('tenant.operative.medical-history.create', ['patient' => $patient->id]) }}" id="form-create-history-medical" method="post">
                    @csrf
                    <!-- Body Modal-->
                    <div class="modal-body p-4">
                        <div class="items_deleted_quote">
                            <h3 class="" id="">{{ __('trans.add-medical-history') }}</h3>
                            <i class="fas fa-plus"></i>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="date-history-medical">{{ __('validation.attributes.date-history-medical') }}</label>
                                <input type="datetime-local" name="date-history-medical" required id="date-history-medical" class="input_dataGroup_form" value="{{ date('Y-m-d\TH:i') }}">
                            </div>

                            <div class="form-group">
                                <label for="history-medical">{{ __('validation.attributes.history-medical') }}</label>

                                <select name="history-medical" id="history-medical" class="input_dataGroup_form" required>
                                    @foreach($historyMedical as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="surgery">{{ __('validation.attributes.surgery') }}</label>

                                <select class="input_dataGroup_form @error('surgery') is-invalid @enderror"
                                        id="surgery" name="surgery">
                                    @if(isset($clinics) and (is_array($clinics) or is_object($clinics)))
                                        @foreach($clinics as $clinic)
                                            <optgroup label="{{ $clinic->name }}">
                                                @foreach($clinic->surgeries as $surgery)
                                                    <option value="{{ $surgery->id }}" {{ old('surgery', $user->surgery_id) == $surgery->id ? 'selected' : '' }}>{{ "$surgery->number - $surgery->type" }}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="footer_modal">
                        <div class="button_container_form"> <!-- Buttons -->
                            <button type="button" class="button_cancel_form select_cancel" data-dismiss="modal">
                                {{ __('trans.cancel') }} &nbsp;<i class="fas fa-times-circle"></i>
                            </button>

                            <button type="submit" id="btn-confirm-cancel" class="button_save_form" >
                                {{ __('trans.confirm') }} &nbsp;<i class="fas fa-check-circle"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('plugin/DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#patients-table').DataTable( {
                responsive: true
            } );
        } );
    </script>
@endsection
