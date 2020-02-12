@php global $wp_query @endphp

@extends('layouts.app')

@section('content')
  @if (!have_posts())
    <div class="brm-alert brm-alert--error">
      <p>{{ __('Sorry, no results were found.', 'sage') }}</p>
    </div>
  @endif

  <div class="posts">
    @while (have_posts()) @php the_post() @endphp
      @include('partials.content-'.get_post_type())
    @endwhile
  </div>

  @if($wp_query->max_num_pages > 1)
    {!! App\pagination($wp_query) !!}
  @endif
@endsection
