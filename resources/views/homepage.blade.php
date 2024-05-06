<x-layout>
    <x-slot name='title'> Homepage Presto.it </x-slot>

    {{-- messaggio per comunicare all'amministratore che un utente è diventato revisore dopo che l'amministratore ha cliccato sul link nella mail --}}
    @if (session('message'))
    <div class="alert alert-success">
    {{ session('message') }}
    </div>
    @endif

    @if (session('access.denied'))
    <div class="alert alert-danger">
    {{ session('access.denied') }}
    </div>
    @endif

    <x-header />


<div class="container" >
    <div class="row justify-content-around
    ">
        @foreach ($announcements as $announcement)
        <div class="col-12 col-md-3 m-3">
            <x-card :announcement="$announcement" />
        </div>
        @endforeach
    </div>
</div>



</x-layout>