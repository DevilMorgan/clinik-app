@extends('system.layouts.app')

@section('titles', 'Plantillas')

@section('styles')
@endsection

@section('content')
    <section class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="my-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Plantilla historia clínica</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Código</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Configuración</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                    @isset($variables)
                        @foreach($variables as $variable)
                            <tr>
                                <td>{{ $variable->id }}</td>
                                <td>{{ $variable->name }}</td>
                                <td>{{ $variable->code }}</td>
                                <td>{{ __('manager.' . $variable->hc_variable_type->name) }}</td>
                                <td>{{ $variable->description }}</td>
                                <td><pre>{!! json_encode($variable->config) !!}</pre></td>
                                <td>{{ ($variable->status) ? 'Activado':'Desactivado' }}</td>
                                <td>
                                    <a href="{{ route('system.history-clinic.variables.edit', ['variable' => $variable->id]) }}"
                                       class="btn btn-primary">
                                        Editar <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endisset
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-end">
                    <div class="dropdown">
                        <button class="btn btn-success " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Crear <i class="fas fa-plus"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            @isset($variableTypes)
                                @foreach($variableTypes as $type)
                                    <li>
                                        <a class="dropdown-item" href="{{ route('system.history-clinic.variables.create', ['type' => $type->id]) }}">
                                            {{ __('manager.' . $type->name) }}
                                        </a>
                                    </li>
                                @endforeach
                            @endisset
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
@endsection
