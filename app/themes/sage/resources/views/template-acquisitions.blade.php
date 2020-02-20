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
      @include('partials.sections.section-map-acquisitions')
      <div class="hidden">
        {!! do_shortcode('[employee id=123 background=ford]') !!}
        {!! do_shortcode('[employee id=148 background=ronak]') !!}
        {!! do_shortcode('[employee id=149 background=dan]') !!}
        {!! do_shortcode('[employee id=150 background=dana]') !!}
        {!! do_shortcode('[employee id=151 background=parker]') !!}
      </div>
    </div>
  </section>
@endsection
