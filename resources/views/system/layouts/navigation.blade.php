<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Zaabra admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Historia Clínica
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('system.history-clinic.templates.index') }}">
                                Plantillas
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('system.history-clinic.modules.index') }}">
                                Módulos
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('system.history-clinic.variables.index') }}">
                                Variables
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('system.history-clinic.specialties.index') }}">
                                Especialidades
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
