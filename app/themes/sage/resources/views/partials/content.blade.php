<article {{ post_class() }}>
  <div class="w-full">
    <div class="flex flex-col flex-wrap p-5 text-grey-darker bg-white post-card">
      <div class="mb-5 pb-8 border-b border-solid border-primary-2">
        <h6 class="mb-2 font-poyntertextregular">
          <a class="text-current no-underline" href="{{ App::url($post) }}">{{ $post->post_title }}</a>
        </h6>
        <span class="block mb-5 text-sm font-mulisemibolditalic text-primary-2">
          <span>{{ date('F j, Y', strtotime($post->post_date)) }}</span>
          •
          <span class="text-grey-dark">{{ get_the_author_meta('display_name', $post->post_author) }}</span>
        </span>
        {!! apply_filters('the_content', $post->post_content) !!}
      </div>
      @if( App::url($post) )
        <a class="ml-auto mr-0 brm-btn brm-btn--primary" href="{{ App::url($post) }}">Read More</a>
      @endif
    </div>
  </div>
</article>
