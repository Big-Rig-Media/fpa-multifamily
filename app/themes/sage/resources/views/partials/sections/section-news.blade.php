@if( $posts )
  <section class="brm-section brm-section--news js-background" data-mobile="" data-desktop="">
    <div class="brm-container">
      <h2>In the News</h2>
      <div class="grid-news">
        @foreach( $posts as $post )
          <div>
            <h6>{{ $post->post_title }}</h6>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endif
