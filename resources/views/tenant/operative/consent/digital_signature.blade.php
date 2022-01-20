<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>{{ __('trans.digital-signature') }}</title>
</head>
<body>
<section class="container mt-5">
    <div class="row">
        <div class="col-4 d-flex justify-content-center">
            <img src="{{ asset('img/logo/clinikapp-logo.png') }}" alt="logo" class="img-fluid" />
        </div>
        <div class="col-4 d-flex justify-content-center">
            <h2 class="font-bold">{{ __('trans.consent') }}</h2>
        </div>
        <div class="col-4 d-flex justify-content-center">
            @if(isset($config['LOGO']['config_data']['value']))
                <img src="{{ asset('tenancy/' . $config['LOGO']->config_data['value']) }}" alt="logo" class="img-fluid" />
            @endif
        </div>
        <div class="col-12 mt-5">
            {!! $document->consent->content !!}
        </div>
        <div class="col-12 d-flex justify-content-center my-4">
            <canvas id="digital-signature" style="border: solid 1px #4cae4c"></canvas>
        </div>
        <div class="col-12 d-flex justify-content-center">
            <button type="button" class="btn btn-secondary mr-1" id="btn-clean">
                <i class="fas fa-chalkboard"></i> {{ __('trans.clean') }}
            </button>
            <button type="button" class="btn btn-primary"  id="btn-submit" disabled>
                <i class="fas fa-check"></i> {{ __('trans.accept') }}
            </button>
        </div>
    </div>
</section>

<form action="{{ route('consent-confirmation') }}" class="form" id="confirmation-consent-form" method="post">
    @csrf
    <input type="hidden" id="token_confirmation" name="token_confirmation" value="{{ $document->remember_token }}">
    <input type="hidden" id="image-digital-signature" name="image-digital-signature" value="{{ $document->remember_token }}">
</form>


<!-- Javascript -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

<script>
    const $canvas   = document.querySelector("#digital-signature"),
        $btnClean   = document.querySelector("#btn-clean"),
        $btnSubmit  = document.querySelector("#btn-submit");
        $form       = document.querySelector("#confirmation-consent-form");

    const context       = $canvas.getContext("2d");
    const COLOR_PINCEL  = "black";
    const COLOR_BACKGROUND = "white";
    const GROSOR = 2;

    let xBefore = 0, yBefore = 0, xPresent = 0, yPresent = 0;

    const getX = (clientX) => clientX - $canvas.getBoundingClientRect().left;
    const getY = (clientY) => clientY - $canvas.getBoundingClientRect().top;
    let startDrew = false; // Bandera que indica si el usuario está presionando el botón del mouse sin soltarlo

    const limpiarCanvas = () => {
        // Colocar color blanco en fondo de canvas
        context.fillStyle = COLOR_BACKGROUND;
        context.fillRect(0, 0, $canvas.width, $canvas.height);
        $btnSubmit.disabled = true;
    };
    limpiarCanvas();
    $btnClean.onclick = limpiarCanvas;

    window.getSignature = () => {
        return $canvas.toDataURL();
    };

    $btnSubmit.onclick = () => {
        //window.open("documento.html");
    };

    // Lo demás tiene que ver con pintar sobre el canvas en los eventos del mouse
    $canvas.addEventListener("mousedown", evento => {
        $btnSubmit.disabled = false;
        // En este evento solo se ha iniciado el clic, así que dibujamos un punto
        xBefore = xPresent;
        yBefore = yPresent;
        xPresent = getX(evento.clientX);
        yPresent = getY(evento.clientY);
        context.beginPath();
        context.fillStyle = COLOR_PINCEL;
        context.fillRect(xPresent, yPresent, GROSOR, GROSOR);
        context.closePath();
        // Y establecemos la bandera
        startDrew = true;
    });

    $canvas.addEventListener("mousemove", (evento) => {
        if (!startDrew) {
            return;
        }
        // El mouse se está moviendo y el usuario está presionando el botón, así que dibujamos todo

        xBefore = xPresent;
        yBefore = yPresent;
        xPresent = getX(evento.clientX);
        yPresent = getY(evento.clientY);
        context.beginPath();
        context.moveTo(xBefore, yBefore);
        context.lineTo(xPresent, yPresent);
        context.strokeStyle = COLOR_PINCEL;
        context.lineWidth = GROSOR;
        context.stroke();
        context.closePath();
    });

    ["mouseup", "mouseout"].forEach(nombreDeEvento => {
        $canvas.addEventListener(nombreDeEvento, () => {
            startDrew = false;
        });
    });

    $btnSubmit.onclick = async () => {
        // Convertir la imagen a Base64 y ponerlo en el enlace
        let data = $canvas.toDataURL("image/png");
        //const fd = new FormData();
        //fd.append("imagen", data); // Se llama "imagen", en PHP lo recuperamos con $_POST["imagen"]
        document.querySelector('#image-digital-signature').value = data;
        $form.submit();
    };

</script>
</body>
</html>
