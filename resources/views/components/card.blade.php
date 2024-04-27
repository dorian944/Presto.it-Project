<div class="card" style="width: 18rem;">
    <img src="https://picsum.photos/200" class="card-img-top p-3 rounded" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{$announcement->title}}</h5>
      <p class="card-text">{{$announcement->body}}</p>
      <p class="card-text">{{$announcement->price}}</p>
      <a href="{{route('announcements.show' , compact('announcement'))}}" class="btn btn-primary">Dettaglio</a>
      <a href="#" class="btn btn-primary my-2">Categoria: {{$announcement->category->name}}</a>
      <p class="card-footer">Pubblicato il: {{$announcement->created_at->format('d/m/Y')}}</p>
    </div>
  </div>