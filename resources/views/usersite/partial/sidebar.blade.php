<div class="col-md-4">
    <div class="position-sticky" style="top: 2rem;">
      <div class="p-4 mb-3 bg-body-tertiary rounded">
        <h4 class="fst-italic">About</h4>
        <p class="mb-0">Customize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.</p>
      </div>

      <div>

          <h4 class="fst-italic">Recent posts</h4>
          @foreach ($recentpost as $post)
            <ul class="list-unstyled">
            <li>
                <a href="{{route('user.posts.show', $post->slug)}}" class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top">
                <div>
                    <img src="{{asset($post->getThumbnail())}}" width="100%" height="96" alt="">
                </div>
                <div class="col-lg-8">
                    <h6 class="mb-0">{{ucfirst($post->title)}}</h6>
                    <small class="text-body-secondary">
                        <i class="fas fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($post->published_at)->diffForHumans()  }}
                    </small>
                    <br>
                    <small class="text-body-secondary">
                        <i class="fas fa-user"></i> {{ $post->author->fullName() }}
                    </small>
                </div>
                </a>
            </li>

            </ul>
        @endforeach
      </div>

      <div class="p-4">
        <h4 class="fst-italic">Archives</h4>
        <ol class="list-unstyled mb-0">
          <li><a href="#">March 2021</a></li>
          <li><a href="#">February 2021</a></li>
          <li><a href="#">January 2021</a></li>
          <li><a href="#">December 2020</a></li>
          <li><a href="#">November 2020</a></li>
          <li><a href="#">October 2020</a></li>
          <li><a href="#">September 2020</a></li>
          <li><a href="#">August 2020</a></li>
          <li><a href="#">July 2020</a></li>
          <li><a href="#">June 2020</a></li>
          <li><a href="#">May 2020</a></li>
          <li><a href="#">April 2020</a></li>
        </ol>
      </div>

      <div class="p-4">
        <h4 class="fst-italic">Elsewhere</h4>
        <ol class="list-unstyled">
          <li><a href="#">GitHub</a></li>
          <li><a href="#">Twitter</a></li>
          <li><a href="#">Facebook</a></li>
        </ol>
      </div>
    </div>
  </div>
