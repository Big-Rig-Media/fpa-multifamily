<section class="brm-section brm-section--intro">
  <div class="brm-container">
    @while(have_posts()) @php the_post() @endphp
      <!--@include('partials.page-header')-->
      @include('partials.content-page')
    @endwhile
  </div>
</section>
