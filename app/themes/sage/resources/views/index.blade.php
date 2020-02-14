@php global $wp_query @endphp

@extends('layouts.app')

@section('content')
  <section class="brm-section brm-section--news">
    <div class="brm-container brm-container--small">
      @if (!have_posts())
        <div class="brm-alert brm-alert--error">
          <p>{{ __('Sorry, no results were found.', 'sage') }}</p>
        </div>
      @endif

      <div class="grid-news">
        @while (have_posts()) @php the_post() @endphp
          @include('partials.content-'.get_post_type())
        @endwhile
      </div>
    </div>
  </section>
  @if( $wp_query->max_num_pages > 1 )
    <section class="bg-white brm-section brm-section--pagination">
      <div class="brm-container brm-container--small">
        {!! App\pagination($wp_query) !!}
      </div>
    </section>
  @endif
@endsection
