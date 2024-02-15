<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <div class="container">
                <form action="{{route('surveys.storeQuestion',['survey'=>$survey->id,'module'=>$module->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Domanda</span>
                        <label class="ml-auto">Points: 5 </label>

                    </div>
                    <div class="mx-auto max-w-md text-center mb-4 mt-4">
                        <select name="type" id="type" onchange="toggleAnswerFields()">
                            <option value="single_choice">Scelta singola</option>
                            <option value="open-ended">Risposta Aperta</option>
                            <option value="linear_scale">Scala Lineare</option>
                            <option value="multiple_choice">Scelta multipla</option>
                        </select>
                        <div class="mx-auto max-w-md text-center mb-4 mt-4">
                            <label for="question" class="block text-stone-100">Domanda<span
                                    class="font-bold text-base text-red-600">*</span></label><br>
                            <input placeholder="Domanda" type="text" name="question"
                                   class="block bg-stone-300 border-stone-600 focus:border-stone-700 focus:ring-stone-700 w-full shadow-md"
                                   id="question" required>
                        </div>


                        <div id="linear_scale" class="mx-auto max-w-md text-center">
                            <label for="from">Da:</label>
                            <select name="from" id="type1">
                                <option>0</option>
                            </select>
                            <label for="to">A:</label>
                            <select name="to" id="type2">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                            </select><br>
                            <input placeholder="Etichetta" type="text" name="fromAnswer"
                                   class="block bg-stone-300 border-stone-600 focus:border-stone-700 focus:ring-stone-700 w-full shadow-md mt-2"
                                   id="etichetta1"><br>
                            <input placeholder="Etichetta" type="text" name="toAnswer"
                                   class="block bg-stone-300 border-stone-600 focus:border-stone-700 focus:ring-stone-700 w-full shadow-md mt-2"
                                   id="etichetta2" >
                        </div>

                        <div id="image" class="mx-auto max-w-md text-center mb-4 mt-4">
                            <label for="image"></label>
                            <input type="file" name="image" accept="image/*">
                        </div>

                        <div id="risposta_multipla">
                            <div id="dynamicFields" ></div>
                            <button type="button" class="btn btn-dark" onclick="addQuestion()">+</button>
                            <button type="button" class="btn btn-dark" onclick="show()">Aggancia ad un modulo</button>
                        </div>


                    </div>
                    <button type="submit" class="btn btn-dark float-end mt-auto mb-2">Salva</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>


<script>
    function toggleAnswerFields() {
        var questionType = document.getElementById('type').value;
        var answerFields = document.querySelectorAll('[name^="answers["]');
        var image = document.getElementById('image')
        var risposta_multipla = document.getElementById('risposta_multipla')
        var scala_lineare = document.getElementById('linear_scale')


        if (questionType === 'multiple_choice' || questionType === 'single_choice') {
            image.style.display = "none"
            scala_lineare.style.display = "none"
            risposta_multipla.style.display = 'block'
        } else if (questionType === 'open-ended') {
            risposta_multipla.style.display = "none"
            image.style.display = "block"
        } else if (questionType === 'linear_scale') {
            scala_lineare.style.display = "block"
            image.style.display = "none"
            risposta_multipla.style.display = 'none'
        } else {
            image.style.display = "block";
        }

    }

    var counter = 0;
    function addQuestion() {
        var dynamicFields = document.getElementById('dynamicFields');
        var newQuestion = document.createElement('div');
        newQuestion.className = 'mb-4';

        newQuestion.innerHTML =
            '<div class="flex items-center relative">' +
            '<span for="answer" onclick="removeQuestion(this)">X</span>' +
            '<input id="answer" placeholder="Opzione" type="text" name="answers['+counter+'][answer]" class="ms-2">' +
            '</div>'+
            '<select name="answers['+counter+'][value]" class="ml-auto">'+
            '<option value = 1 >1</option>'+
            '<option value = 2 >2</option>'+
            '<option value = 3 >3</option>'+
            '<option value = 4 >4</option>'+
            '<option value = 5 >5</option>'+
            '</select>'+
            '<div id="aggancia">'+
            '<select name="answers['+counter+'][next_module_id]">'+
            '<option value=>Modulo successivo</option>'+
            '@foreach($survey->modules as $modules)'+
            '<option value={{$modules->id}}>{{$modules->title}}</option>'+
            '@endforeach'+
            '</select>'+
            '</div>';





        dynamicFields.appendChild(newQuestion);

        counter++
    }

    function removeQuestion(buttonElement) {
        console.log("Question removed!");
        var questionContainer = buttonElement.parentNode.parentNode;


        var dynamicFields = document.getElementById('dynamicFields');


        dynamicFields.removeChild(questionContainer);
    }

    function show(){
        var elements = document.querySelectorAll('[id="aggancia"]');

        // Itera su tutti gli elementi e nascondili
        elements.forEach(function(element) {
            if(element.style.display == 'block'){
                element.style.display = 'none'
            }else{
                element.style.display = 'block'
            }
        });





    }

    window.onload = function () {
        toggleAnswerFields();

    };
</script>
