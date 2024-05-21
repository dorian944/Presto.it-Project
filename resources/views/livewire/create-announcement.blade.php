<div class="min-vh-100">
    {{-- Stop trying to control. --}}

    {{-- form inserimento dati: usando livewire al posto di name inseriremi wire:model --}}
    <div class=" p-5">
        <h2 class="mb-5 text-center"> {{__('ui.button_header')}} </h2>
        <form class=" shadow rounded-4 p-5 bg-grigio-light bg-white " wire:submit="store">

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
                <label for="price" class="form-label">{{__('ui.prezzo')}} &euro;</label>
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
            {{-- fine categorie --}}
            <div class="mb-3">
                <label for="img">{{__("ui.label_immagine")}}</label>
                <input wire:model="temporary_images" required id="img" type="file" name="images" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img" />
                    @error('temporary_images.*')
                    <p class="text-danger mt-2">{{$message}}</p>
                    @enderror
            </div>
            @if (!empty($images))
            <div class="row">
                <div class="col-12">
                    <p>Photo preview:</p>
                    <div class="row border border-4 border-info rounded shadow py-4">
                        @foreach ($images as $key => $image )
                            <div class="col my-3">
                                <div class="img-preview-custom mx-auto shadow rounded" style="background-image: url({{$image->temporaryUrl()}});">
                                </div>
                                    <button type="button" class="btn btn-danger shadow d-block text-center mt-2 mx-auto" wire:click="removeImage({{$key}})">{{__("ui.cancella")}}
                                    </button>
                            </div>
                            
                        @endforeach
                    </div>
                </div>
            </div>
            @endif








            <button type="submit" class="button-custom mt-3 ">{{__('ui.button_inserisci')}} </button>
        </form>
    </div>
    {{-- chiusura div component --}}
</div>
