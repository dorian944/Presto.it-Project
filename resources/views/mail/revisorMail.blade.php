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
            <h1>{{__('ui.richiesta_revisore')}} </h1>
            <p>Name: {{$name}}</p>
            {{-- la mail non deve essere modificata dall'utente altrimenti non corrisponde nel database e da errore --}}
            <p>Email: {{$user->email}}</p>
            <p>{{__('ui.messaggio_utente')}}: {{$user_message}}</p>
            <p>{{__('ui.rendi_visibile')}} </p>


            <a href="{{route('make.revisor', compact('user'))}}"> {{__('ui.rendi_revisore')}} </a>


        </div>
    </body>
    </html>