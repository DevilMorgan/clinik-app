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
                        <th scope="col">Descripción</th>
                        <th scope="col">Especialidades</th>
                        <th scope="col">Status</th>
                        <th scope="col">acción</th>
                    </tr>
                    </thead>
                    <tbody>
                    @isset($templates)
                        @foreach($templates as $template)
                            <tr>
                                <td>{{ $template->id }}</td>
                                <td>{{ $template->name }}</td>
                                <td>{{ $template->code }}</td>
                                <td>{{ $template->description }}</td>
                                <td></td>
                                <td>{{ ($template->status) ? 'Activado':'Desactivado' }}</td>
                                <td>
                                    <a href="{{ route('system.history-clinic.templates.edit', ['template' => $template->id]) }}"
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
                    <a href="{{ route('system.history-clinic.templates.create') }}" class="btn btn-success">
                        Crear <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
@endsection
