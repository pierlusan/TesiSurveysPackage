<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="container">
                <form action="{{route('surveys.store')}}" method="post">
                    @csrf
                    <div class="card-header">
                        Crea questionario
                    </div>
                    <div class="mb-4 mt-4">
                        <label for="title" class="block text-stone-100">Titolo<span class="font-bold text-base text-red-600">*</span></label>
                        <input name="titolo" id="titolo" class="form-control" type="text" placeholder="Titolo" aria-label="default input example">
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-stone-100">Descrizione<span class="font-bold text-base text-red-600">*</span></label></label>
                        <input name="descrizione" id="descrizione" class="form-control" type="text" placeholder="Descrizione" aria-label="default input example">
                    </div>
                    <button type="submit" class="btn btn-dark float-end mt-auto mb-2">Avanti</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>




