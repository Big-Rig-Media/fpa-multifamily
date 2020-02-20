{{--
  Template Name: Investment Strategies Template
--}}

@extends('layouts.app')

@section('content')
  <section class="brm-section brm-section--about">
    <div class="text-black text-center brm-container brm-container--small">
      @while(have_posts()) @php the_post() @endphp
        @include('partials.content-page')
      @endwhile
      @include('partials.sections.section-tabbed-data', ['default' => true])
      {!! do_shortcode('[employee id=157]') !!}
    </div>
  </section>
  @include('partials.sections.section-core-plus')
@endsection
