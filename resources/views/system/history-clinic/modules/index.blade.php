@extends('system.layouts.app')

@section('titles', 'Plantillas')

@section('styles')
@endsection

@section('content')
    <section class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="my-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Módulos historia clínica</li>
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
                        <th scope="col">Descripción</th>
                        <th scope="col">Configuración</th>
                        <th scope="col">Estado</th>
                        <th scope="col">acción</th>
                    </tr>
                    </thead>
                    <tbody>
                    @isset($modules)
                        @foreach($modules as $module)
                            <tr>
                                <td>{{ $module->id }}</td>
                                <td>{{ $module->name }}</td>
                                <td>{{ $module->code }}</td>
                                <td>{{ $module->description }}</td>
                                <td>
                                    <span class="badge bg-primary">{{ __('manager.' . $module->type) }}</span>
                                    @if($module->is_required == 1)
                                        <span class="badge bg-success">{{ $module->is_required ? 'Es requerido':'' }}</span>
                                    @endif
                                    @if($module->is_end_records  == 1)
                                        <span class="badge bg-info">{{ $module->is_end_records ? 'Ver registros anteriores':'' }}</span>
                                    @endif
                                </td>
                                <td>{{ ($module->status) ? 'Activado':'Desactivado' }}</td>
                                <td>
                                    <a href="{{ route('system.history-clinic.modules.edit', ['module' => $module->id]) }}"
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
                    <a href="{{ route('system.history-clinic.modules.create') }}" class="btn btn-success">
                        Crear <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
@endsection
