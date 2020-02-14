{{--
  Template Name: Acquisitions Template
--}}

@extends('layouts.app')

@section('content')
  <section class="brm-section brm-section--acquisitions">
    <div class="brm-container brm-container--small">
      @while(have_posts()) @php the_post() @endphp
        @include('partials.content-page')
      @endwhile
    </div>
  </section>
@endsection
