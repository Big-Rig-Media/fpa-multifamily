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
        {!! do_shortcode('[employee id=121 background=tedesco align=md:items-start width=max-w-small padding="py-0 px-5"]') !!}
        {!! do_shortcode('[employee id=123 background=ford align=md:items-start width=max-w-small padding="py-0 px-5"]') !!}
        {!! do_shortcode('[employee id=148 background=ronak align=md:items-start width=max-w-small padding="py-0 px-5"]') !!}
        {!! do_shortcode('[employee id=149 background=dan align=md:items-start width=max-w-small padding="py-0 px-5"]') !!}
        {!! do_shortcode('[employee id=150 background=dana align=md:items-start width=max-w-small padding="py-0 px-5"]') !!}
        {!! do_shortcode('[employee id=151 background=parker align=md:items-start width=max-w-small padding="py-0 px-5"]') !!}
      </div>
    </div>
  </section>
@endsection
