{{--
  Template Name: About Template
--}}

@extends('layouts.app')

@section('content')
  <section class="brm-section brm-section--about">
    <div class="brm-container">
      @while(have_posts()) @php the_post() @endphp
        @include('partials.content-page')
      @endwhile
    </div>
  </section>
  @include('partials.sections.section-offices')
  @include('partials.sections.section-employee-spotlight')
@endsection
