<div class="card-container">
  <div class="card mb-4 rounded-5" style="width: 18rem;">
      <img src="{{!$announcement->images()->get()->isEmpty() ? Storage::url($announcement->images()->first()->path) : 'https://picsum.photos/200'}}" class="card-img-top p-3 rounded" alt="...">
      <div class="card-body">
          <h5 class="card-title">{{$announcement->title}}</h5>
          <p class="card-text">{{$announcement->body}}</p>
          <p class="card-text">{{$announcement->price}}</p>
          <a href="{{route('announcements.show', compact('announcement'))}}" class="btn button-custom">{{__('ui.dettaglio')}}</a>
          <a href="{{route('categoryShow', ['category' => $announcement->category->id])}}" class="btn button-custom my-2"> {{__('ui.Categorie')}}: {{$announcement->category->name}}</a>
          <p class="card-footer">{{__('ui.pubblicato_il')}} {{$announcement->created_at->format('d/m/Y')}}</p>
      </div>
  </div>
</div>
