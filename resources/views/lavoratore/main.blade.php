<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione Lavoratore</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            background-color: #fff;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body>

    <form method="POST" action="{{ route('lavoratore') }}" class="container mt-5 needs-validation" novalidate>
    		
        <input name="_token" type="hidden" value="{{ csrf_token() }}" id='token_csrf'>
        <input type="hidden" value="{{url('/')}}" id="url" name="url">
        
        <h1 class="text-center mb-4">INSERISCI I TUOI DATI</h1>

        <!-- Settore -->
        <div class="mb-3">
            <label for="settore" class="form-label text-warning">SETTORE</label>
            <select id="settore" name="settore" class="form-select" required >
                <option value="">Seleziona un settore</option>
                <option value="edilizia">Edilizia</option>
                <option value="legno">Legno</option>
                <option value="cemento">Cemento</option>
                <option value="lapidei">Lapidei</option>
                <option value="manufatti">Manufatti</option>
                <option value="laterizi">Laterizi</option>
            </select>
            <div class="invalid-feedback">Per favore, seleziona un settore.</div>

        </div>


        <!-- Nome e Cognome -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="cognome" class="form-label text-warning">COGNOME</label>
                <input type="text" id="cognome" name="cognome" class="form-control" required>
                <div class="invalid-feedback">Per favore, specifica il cognome.</div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="nome" class="form-label text-warning">NOME</label>
                <input type="text" id="nome" name="nome" class="form-control" required >
                <div class="invalid-feedback">Per favore, specifica il nome.</div>
            </div>
        </div>

        <!-- Data di Nascita e Codice Fiscale -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="data_nascita" class="form-label text-warning">DATA DI NASCITA*</label>
                <input type="date" id="data_nascita" name="data_nascita" class="form-control" required>
                <div class="invalid-feedback">Per favore, specifica la data di nascita.</div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="codfisc" class="form-label text-warning">CODICE FISCALE</label>
                <input type="text" id="codfisc" name="codfisc" class="form-control" required>
                <div class="invalid-feedback">Per favore, specifica il codice fiscale.</div>
            </div>
        </div>

        <!-- Telefono e Email -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="telefono" class="form-label text-warning">TELEFONO CELLULARE*</label>
                <input type="tel" id="telefono" name="telefono" class="form-control" required>
                <div class="invalid-feedback">Per favore, specifica il telefono.</div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">EMAIL</label>
                <input type="email" id="email" name="email" class="form-control">
            </div>
        </div>
        <div id='div_wait' style='display:none'><i class='fas fa-spinner fa-spin'></i></div>
        <div id='div_resp'></div>
        <div class="d-grid mt-4">
            <button type="submit" class="btn btn-primary btn-lg">CLICCA PER INIZIARE</button>
        </div>

        <div class="text-center mt-3">
            <p class="text-warning">IN GIALLO I CAMPI OBBLIGATORI</p>
        </div>
    </form>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!--script js utente-->
    <script src="{{ URL::asset('/') }}js/main.js?ver=<?= time() ?>"></script>

</body>
</html>
