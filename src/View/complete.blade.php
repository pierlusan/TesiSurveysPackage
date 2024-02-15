
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
                <form action="{{route('surveys.saveResponse',['survey'=>$survey->id,'module'=>$module->id])}}" method="post">
                    @csrf
                    <div class="card-header mt-3">
                        <div class="row">
                            <div class="col">
                                Titolo: <strong>{{$survey->title}}</strong><br>
                                Descrizione: <strong>{{$survey->description}}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col">
                                        Titolo: <strong>{{$module->title}}</strong><br>
                                        Descrizione: <strong>{{$module->description}}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @foreach($module->questions as $key=>$question)
                                    @if($question->type == 'linear_scale')
                                        <div class="container">
                                            <div class="card-body">
                                                <div class="mx-0 mx-sm-auto">
                                                    <div class="text-center">
                                                        <p>
                                                            <strong>{{$question->question}}</strong>
                                                        </p>
                                                    </div>
                                                    <div class="text-center mb-3">
                                                        <div class="d-inline mx-3">
                                                            {{$question->fromAnswer}}
                                                        </div>
                                                        @foreach($question->answers as $answer)
                                                            <div class="form-check form-check-inline" >

                                                                <input type="radio"
                                                                       name="responses[{{$key}}][answer]"
                                                                       value="{{$answer->id}}" required>
                                                                <input type="hidden" name="responses[{{$key}}][question]"
                                                                       value="{{$question->id }}">



                                                                <label class="form-check-label"
                                                                       for="inlineRadio1">{{$answer->answer}}</label>
                                                            </div>
                                                        @endforeach
                                                        <div class="d-inline me-4">
                                                            {{$question->toAnswer}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif($question->type == 'single_choice')
                                        <div class="container">
                                            <div class="card-body">
                                                <div class="row col-5">
                                                    <p class="fw-bold">{{$question->question}}</p>
                                                    @foreach($question->answers as $answer)
                                                        <div class="form-check mb-2">


                                                            <input class="form-check-input" type="radio"
                                                                   name="responses[{{$key}}][answer]"
                                                                   value="{{$answer->id}}" id="radioExample{{$key}}" required>
                                                            <label class="form-check-label" for="radioExample{{$key}}">
                                                                {{$answer->answer}}
                                                            </label>


                                                            <input type="hidden" name="responses[{{$key}}][question]"
                                                                   value="{{$question->id }}">
                                                            {{$answer->next_module_id}}
                                                            <input type="hidden" name="responses[{{$key}}][questionPoints]"
                                                                   value="{{$question->points }}">

                                                            <input type="hidden" name="responses[{{$key}}][next]"
                                                                   value="{{$answer->next_module_id}}">

                                                            <input type="hidden" name="responses[{{$key}}][answerValue]"
                                                                   value="{{$answer->value }}">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @elseif($question->type == 'open-ended')
                                        <div class="container">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="container text-center mt-3">
                                                        <div class="col">
                                                            <p class="fw-bold">{{$question->question}}</p>
                                                        </div>
                                                        @if($question->immagine)
                                                            <div
                                                                style="width: 100px; height: 100px; overflow: hidden; display: flex; justify-content: center; align-items: center; margin: auto;">
                                                                <img src="{{ asset($question->immagine) }}"
                                                                     alt="Descrizione dell'immagine"
                                                                     style="max-width: 100%; max-height: 100%; object-fit: cover;">
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="form-group mt-4">
                                                        <input type="text" class="form-control"
                                                               name="responses[{{$key}}][textAnswer]" required>
                                                        <input type="hidden" name="responses[{{$key}}][question]"
                                                               value="{{$question->id }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif($question->type == 'multiple_choice')
                                        <div class="container">
                                            <div class="card-body">
                                                <div class="row col-5">
                                                    <p class="fw-bold">{{$question->question}}</p>
                                                    <input type="hidden" name="responses[{{$key}}][question]"
                                                           value="{{$question->id }}">
                                                    @foreach($question->answers as $key2=>$answer)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                   name="responses[{{$key}}][answers][]"
                                                                   value="{{$answer->id}}"
                                                                   id="flexCheckDefault"
                                                            />
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
                        </div>
                        <div class="mt-3 text-end">
                            <button type="submit" class="btn btn-dark mb-3">Avanti</button>
                        </div>
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

