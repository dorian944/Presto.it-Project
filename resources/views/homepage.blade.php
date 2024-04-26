<x-layout>
    {{-- <x-slot name ='title'> Homepage Presto.it </x-slot> --}}
    <x-header />
<div class="container">
    <div class="row">
        @foreach ($announcements as $announcement)
        <div class="col-12 col-md-3">
            <x-card :announcement="$announcement" />
        </div>
        @endforeach
    </div>
</div>
    

</x-layout>