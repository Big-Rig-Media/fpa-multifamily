{{--
  Template Name: About Template
--}}

@extends('layouts.app')

@section('content')
  <section class="brm-section brm-section--about js-background" data-mobile="/app/uploads/2020/02/about-background-960x568.jpg" data-desktop="/app/uploads/2020/02/about-background.jpg">
    <div class="text-black text-center brm-container brm-container--small">
      @while(have_posts()) @php the_post() @endphp
        @include('partials.content-page')
      @endwhile
      @include('partials.sections.section-tabbed-data', ['default' => true])
    </div>
  </section>
  @include('partials.sections.section-headquarters')
  @include('partials.sections.section-affliates')
  @include('partials.sections.section-employee-spotlight')
  @include('partials.sections.section-offices')
@endsection
