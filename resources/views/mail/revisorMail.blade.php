{{-- mail da strutturare da zero con html no <x-layout> --}}
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Presto.it</title>
    </head>
    <body>
        <div>
            <h1>Richiesta utente per diventare revisore</h1>
            <p>Nome: {{$name}}</p>
            {{-- la mail non deve essere modificata dall'utente altrimenti non corrisponde nel database e da errore --}}
            <p>Email: {{$user->email}}</p>
            <p>Messaggio utente: {{$user_message}}</p>
            <p>Per renderlo revisore clicca qui:</p>
            {{-- compact user.... error perchè noi abbiamo non i dati dell'utente loggato come nel video, ma i dati dell'utente del form--}}
            {{-- compact ('email') non lo prende quindi solo mail ok lo prende ma dà error nel presto:MakeUserRevisor--}}
            {{-- <a href="{{route('make.revisor', 'email')}}">Rendi revisore</a> --}}

            <a href="{{route('make.revisor', compact('user'))}}">Rendi revisore</a>


        </div>
    </body>
    </html>