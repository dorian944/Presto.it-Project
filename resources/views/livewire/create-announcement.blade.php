<div>
    {{-- Stop trying to control. --}}
    
    {{-- form inserimento dati: usando livewire al posto di name inseriremi wire:model --}}
    <div class=" p-5">
        <h2>Inserisci annuncio</h2>
        <form class="shadow p-5 bg-grigio-light" wire:submit="store">
            
            @if (session('AnnouncementCreated'))
            <div class="alert alert-success">
                {{ session('AnnouncementCreated') }}
            </div>
            @endif
            
            {{-- action sostituito da wire:submit="store" --}}
            {{-- il @csrf token non serve più --}}
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" wire:model.live="title">
                @error('title')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="body" class="form-label">Descrizione</label>
                <input type="text" class="form-control" id="body" wire:model.live="body">
                @error('body')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            
            <div class="mb-3 ">
                <label for="price" class="form-label">Prezzo</label>
                <input type="number" class="form-control" id="price" wire:model.live="price">
                @error('price')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            
            {{-- categoria  --}}
            {{-- <div class="mb-3">
                <label class="form-label">Categoria</label>
                <select class="form-select" wire:model="category_id">
                    <option selected hidden >Seleziona una categoria</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div> --}}
            
            
            
            
            
            
            <button type="submit" class="btn btn-custom">Insert</button>
        </form>
    </div>
    {{-- chiusura div component --}}
</div>

