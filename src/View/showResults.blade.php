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
                <form action="#" method="get">
                    <div class="card-header mt-3">
                        <div class="row">
                            <div class="col">
                                Titolo: <strong>{{$responses[0]->survey->title}}</strong><br>
                                Descrizione: <strong>{{$responses[0]->survey->description}}</strong><br>
                                Voto: <strong>{{$voto}}/{{$valoreTotale}}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach($responses as $response)
                            @if($response->question->type == 'linear_scale')
                                <div class="container">
                                    <div class="card-body">
                                        <div class="mx-0 mx-sm-auto">
                                            <div class="text-center">
                                                <p>
                                                    <strong>{{$response->question->question}}</strong>
                                                </p>
                                            </div>
                                            <div class="text-center mb-3">
                                                <div class="d-inline mx-3">
                                                    {{$response->question->fromAnswer}}
                                                </div>
                                                @foreach($response->question->answers as $answer)
                                                    <div class="form-check form-check-inline">

                                                        @if($response->answer->id == $answer->id)
                                                            <input class="form-check-input" type="radio" checked
                                                                   disabled>
                                                        @else
                                                            <input class="form-check-input" type="radio" disabled>
                                                        @endif

                                                        <label class="form-check-label"
                                                               for="inlineRadio1">{{$answer->answer}}</label>
                                                    </div>
                                                @endforeach
                                                <div class="d-inline me-4">
                                                    {{$response->question->toAnswer}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @elseif($response->question->type == 'single_choice')
                                <div class="container">
                                    <div class="card-body">
                                        <div class="row col-5">
                                            <p class="fw-bold">{{$response->question->question}}</p>
                                            @foreach($response->question->answers as $answer)
                                                <div class="form-check mb-2">
                                                    <label class="form-check-label" for="radioExample1">
                                                        {{$answer->answer}}
                                                        @if($response->answer->id == $answer->id)
                                                            <input class="form-check-input" type="radio" checked
                                                                   disabled>
                                                        @else
                                                            <input class="form-check-input" type="radio" disabled>
                                                        @endif
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @elseif($response->question->type == 'open-ended')
                                <div class="container">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="container text-center mt-3">
                                                <div class="col">
                                                    <p class="fw-bold">{{$response->question->question}}</p>
                                                </div>
                                                @if($response->question->immagine)
                                                    <div
                                                        style="width: 100px; height: 100px; overflow: hidden; display: flex; justify-content: center; align-items: center; margin: auto;">
                                                        <img src="{{ asset($response->question->immagine) }}"
                                                             alt="Descrizione dell'immagine"
                                                             style="max-width: 100%; max-height: 100%; object-fit: cover;">

                                                    </div>


                                                @endif
                                            </div>
                                            <div class="card mt-4">
                                                {{$response->text_answer}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @elseif($response->question->type == 'multiple_choice')
                                <div class="container">
                                    <div class="card-body">
                                        <div class="row col-5">
                                            <p class="fw-bold">{{$response->question->question}}</p>
                                            @foreach($response->question->answers as $answer)
                                                <div class="form-check">
                                                    @if($answer->id == $response->answer_id)
                                                        <input class="form-check-input" type="checkbox" checked
                                                               disabled>
                                                    @else
                                                        <input class="form-check-input" type="checkbox" disabled>
                                                    @endif
                                                    <label class="form-check-label"
                                                           for="flexCheckDefault">
                                                        {{$answer->answer}}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
