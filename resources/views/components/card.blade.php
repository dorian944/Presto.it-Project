<div class="card-container margin-custom-card-width-1920 ">
  <div class="card mb-4 rounded-5" style="width: 20rem; ">
      <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,300) : 'https://picsum.photos/200'}}" class="card-img-top p-3 img-fluid z-3" alt="Immagine articolo">
      <div class="card-body z-3">
        <h5 class="card-head ">{{$announcement->title}}</h5>
          <p class="card-text">{{$announcement->body}}</p>
          <p class="card-text">{{$announcement->price}} &euro;</p>
          <p class="card-text">
            <a class= "color-categoria-card" href="{{route('categoryShow', ['category' => $announcement->category->id])}}" > {{$announcement->category->name}}</a>
          </p>
          <p class="card-text">{{__('ui.pubblicato_da')}} {{$announcement->user->name}}</p>
          <p class="card-text">
          <a  href="{{route('announcements.show', compact('announcement'))}}" class="btn button-custom  ">{{__('ui.dettaglio')}}</a> <br>
          </p>


          <p class="card-footer">{{__('ui.pubblicato_il')}} {{$announcement->created_at->format('d/m/Y')}}</p>
      </div>
  </div>
</div>
