<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Desafio Boltons</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
              integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
              rel="stylesheet" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous">
        </script>
    </head>

    <body>
        <p>
            <h1 class="fs-1 mt-4 text-center">Desafio - Boltons</h1>
        </p>

        <div style="width: 900px; margin: auto;">

            @if(isset($mensagem))
                <div class="alert alert-success text-center mx-auto col-md-6">
                    {{ $mensagem }}
                </div>
            @endif

            <div class="p-3 text-center d-flex">
                <div class="p-1 m-2 col-md-9">
                    <form class="p-3 d-flex shadow-lg bg-white rounded"
                          action="{{ route('search') }}" method="GET">
                        <input class="form-control me-2" name="search" aria-label="Search" required="true"
                               type="text" placeholder="Chave de Acesso" value="{{ $input ?? '' }}">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>
                </div>

                <div class="p-1 m-2 col-md-3">
                    <form class="p-3 d-flex shadow-lg bg-white rounded"
                          action="{{ route('sync') }}" method="POST">
                        @csrf
                        <button class="btn btn-outline-primary mx-auto" type="submit">Sincronizar NFes</button>
                    </form>
                </div>
            </div>

            <div class="m-4 col-md-6">
                @if(isset($result))
                    <label class="fs-5">{{ $result }}</label>
                @endif
            </div>
        </div>
    </body>
</html>
