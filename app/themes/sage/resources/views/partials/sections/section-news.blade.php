@if( $posts )
  <section class="brm-section brm-section--news has-shadow js-background" data-mobile="/app/uploads/2020/02/news-background-960x1735.jpg" data-desktop="/app/uploads/2020/02/news-background.jpg">
    <div class="brm-container brm-container--small">
      <h2 class="text-center">In the News</h2>
      <div class="-mx-base md:-mx-0 grid-news js-carousel-news">
        @foreach( $posts as $post )
          <div class="px-2 md:px-0">
            <div class="flex flex-col flex-wrap p-5 text-grey-darker bg-white post-card">
              <div class="mb-5 pb-5 border-b border-solid border-primary-2">
                <h6 class="mb-2 font-poyntertextregular">
                  <a class="text-current no-underline" href="{{ App::url($post) }}">{{ $post->post_title }}</a>
                </h6>
                <span class="block mb-3 text-sm font-mulisemibolditalic text-primary-2">
                  <span>{{ date('F j, Y', strtotime($post->post_date)) }}</span>
                  •
                  <span class="text-grey-dark">{{ get_the_author_meta('display_name', $post->post_author) }}</span>
                </span>
                {!! apply_filters('the_content', wp_trim_words($post->post_content, 10, '...')) !!}
              </div>
              @if( App::url($post) )
                <a class="ml-auto mr-0 brm-btn brm-btn--primary" href="{{ App::url($post) }}">Read More</a>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endif
