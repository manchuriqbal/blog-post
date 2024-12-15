<div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
    <div class="row">
        @if ($featuredpost)
          <div class="col-lg-6 px-0">
            <h1 class="display-4 fst-italic">{{Str::limit(ucfirst($featuredpost->title), 60, '...')}}</h1>
            <p class="lead my-3">{{ \Illuminate\Support\Str::limit($featuredpost->content, 200, '...') }}</p>
            <p class="lead mb-0"><a href="{{route('user.posts.show', $featuredpost->slug)}}" class="text-body-emphasis fw-bold">Continue reading...</a></p>
          </div>
          <div class="col-lg-6 px-0">
              <img src="{{asset($featuredpost->getThumbnail())}}"
               alt=""
               style="width: 100%; height: 350px; object-fit: cover;">
          </div>
        @endif

    </div>
  </div>

  <div class="row mb-2">
    @foreach ($featuredposts as $post)

    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            @php
                $firstCategory = $post->categories->first()
            @endphp
          <strong class="d-inline-block mb-2 text-primary-emphasis">
            {{ucfirst($firstCategory->name)}}
          </strong>


          <h3 class="mb-0">{{Str::limit(ucfirst($post->title), 30,'...')}}</h3>
          <div class="mb-1 text-body-secondary">{{$post->created_at->format('M d, Y')}}</div>
          <p class="card-text mb-auto">{{ \Illuminate\Support\Str::limit($post->content, 70, '...') }}</p>
          <a href="{{route('user.posts.show', $post->slug)}}" class="icon-link gap-1 icon-link-hover stretched-link">
            Continue reading...
          </a>
        </div>
        <div class="col-auto d-none d-lg-block">
            <img src="{{ $post->getThumbnail() }}" alt="{{ $post->name }}" class="bd-placeholder-img" width="200" height="250">
        </div>


      </div>
    </div>

    @endforeach
  </div>
