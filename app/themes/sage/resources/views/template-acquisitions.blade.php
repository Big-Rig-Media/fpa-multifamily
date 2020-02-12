{{--
  Template Name: Acquisitions Template
--}}

@extends('layouts.app')

@section('content')
  <section class="brm-section brm-section--acquisitions">
    <div class="brm-container">
      @while(have_posts()) @php the_post() @endphp
        @include('partials.content-page')
      @endwhile
      @if( $brokers )
        @foreach( $brokers as $broker )
          @if( TemplateAcquisitions::dispositions($broker) )
            @foreach( TemplateAcquisitions::dispositions($broker) as $disposition )
              {{ $disposition->post_title }}
            @endforeach
          @endif
        @endforeach
      @endif
    </div>
  </section>
@endsection
