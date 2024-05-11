<x-layout>
    <x-slot name='title'> Homepage Presto.it </x-slot>

    {{-- messaggio per comunicare all'amministratore che un utente è diventato revisore dopo che l'amministratore ha cliccato sul link nella mail --}}
    @if (session('message'))
    <div class="alert alert-success custom-alert">
    {{ session('message') }}
    </div>
    @endif

    @if (session('access.denied'))
    <div class="alert alert-danger custom-alert">
    {{ session('access.denied') }}
    </div>
    @endif

    <x-header />


<div class="container mt-5 mb-5" >
    <div class="row justify-content-around">
        @foreach ($announcements as $announcement)
        <div class="col-12 col-md-4 ">
            <x-card :announcement="$announcement" />
        </div>
        @endforeach
    </div>
</div>



</x-layout>