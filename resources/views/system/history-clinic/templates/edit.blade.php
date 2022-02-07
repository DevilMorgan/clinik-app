@extends('system.layouts.app')

@section('titles', 'Plantillas')

@section('styles')
@endsection

@section('content')
    @php //dd($template->hc_specialties->pluck('id')->toArray()) @endphp
    @php //dd($specialties) @endphp
    <section class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="my-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Plantilla historia clínica</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12">
                <h2>Crear plantilla</h2>
            </div>
            <div class="col-12">
                <form action="{{ route('system.history-clinic.templates.update', ['template' => $template->id]) }}" method="post" id="form-templates-create">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="name">Nombre</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $template->name) }}"/>
                    </div>
                    <div class="mb-3">
                        <label for="code">Código</label>
                        <input type="text" id="code" name="code" class="form-control" value="{{ old('code', $template->code) }}"/>
                    </div>
                    <div class="mb-3">
                        <label for="description">Descripción</label>
                        <textarea id="description" name="description" class="form-control">{{ old('description', $template->description) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="specialties">Especialidades</label>
                        <select name="specialties[]" id="specialties" class="form-control" multiple>
                            @isset($specialties)
                                @foreach($specialties as $specialty)
                                    <option value="{{ $specialty->id }}"
                                        {{ (collect(old('specialties', $template->hc_specialties->isNotEmpty() ? $template->hc_specialties->pluck('id')->toArray():null))->contains($specialty->id)) ? 'selected':'' }}>
                                        {{ $specialty->name }}
                                    </option>
                                @endforeach
                            @endisset
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="status-1" name="status"
                                   value="1" {{ old('status', $template->status) == 1 ? 'checked':'' }} />
                            <label class="form-check-label" for="status-1">Activado</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="status-0" name="status"
                                   value="0" {{ old('status', $template->status) == 0 ? 'checked':'' }} />
                            <label class="form-check-label" for="status-0">Desactivado</label>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-end">
                        <a href="{{ route('system.history-clinic.templates.index') }}" class="btn btn-secondary mx-2">
                            Regresar <i class="fas fa-angle-left"></i>
                        </a>
                        <button class="btn btn-success" type="submit">
                            Guardar <i class="fas fa-save"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
@endsection
