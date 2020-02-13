@if( $posts )
  <section class="brm-section brm-section--news js-background" data-mobile="" data-desktop="">
    <div class="brm-container">
      <h2 class="text-center">In the News</h2>
      <div class="-mx-base md:-mx-0 grid-news js-carousel-news">
        @foreach( $posts as $post )
          <div>
            <div class="flex flex-col flex-wrap p-5 bg-white post-card">
              <div class="mb-5 pb-8 border-b border-solid border-primary-2">
                <h6 class="mb-2">{{ $post->post_title }}</h6>
                <span class="block mb-5 text-sm text-primary-2">
                  <span>{{ date('F j, Y', strtotime($post->post_date)) }}</span>
                  •
                  <span class="text-grey-dark">{{ get_the_author_meta('display_name', $post->post_author) }}</span>
                </span>
                {!! apply_filters('the_content', $post->post_content) !!}
              </div>
              <a class="ml-auto mr-0 brm-btn brm-btn--primary" href="{{ get_permalink($post->ID) }}">Read More</a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endif
