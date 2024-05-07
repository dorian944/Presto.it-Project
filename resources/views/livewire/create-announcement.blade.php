<div>
    {{-- Stop trying to control. --}}

    {{-- form inserimento dati: usando livewire al posto di name inseriremi wire:model --}}
    <div class=" p-5">
        <h2 class="mb-5 text-center"> {{__('ui.button_header')}} </h2>
        <form class="shadow rounded-4 p-5 bg-grigio-light" wire:submit="store">

            @if (session('AnnouncementCreated'))
            <div class="alert alert-success">
                {{ session('AnnouncementCreated') }}
            </div>
            @endif

            {{-- action sostituito da wire:submit="store" --}}
            {{-- il @csrf token non serve più --}}
            <div class="mb-3">
                <label for="title" class="form-label">{{__('ui.titolo')}} </label>
                <input type="text"  id="title" wire:model.live="title" class="form-control @error('title') is-invalid @enderror">
                @error('title')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">{{__('ui.descrizione')}} </label>
                <input type="text"  id="body" wire:model.live="body" class="form-control @error('body') is-invalid @enderror">
                @error('body')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3 ">
                <label for="price" class="form-label">{{__('ui.prezzo')}} </label>
                <input type="number"  id="price" wire:model.live="price" class="form-control @error('price') is-invalid @enderror">
                @error('price')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            {{-- categorie  --}}
            <div class="mb-3">
                {{-- <label class="form-label">Categoria</label> --}}
                <label class="form-label" for="category">{{__('ui.categoria')}} </label>

                {{-- <select class="form-select" wire:model="category_id"> --}}
                    {{-- defer per far si che le select non vadano in conflitto col caricamento della pagina --}}
                <select class="form-select" wire:model.defer="category" id="category">

                    <option selected hidden >{{__('ui.seleziona_categoria')}} </option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{ $category->name }}</option>
                        @endforeach
                </select>
            </div>






            <button type="submit" class="button-custom">{{__('ui.button_inserisci')}} </button>
        </form>
    </div>
    {{-- chiusura div component --}}
</div>
