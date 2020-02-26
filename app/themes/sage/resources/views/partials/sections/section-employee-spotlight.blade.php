@if( $employees )
  <section class="brm-section brm-section--spotlight has-shadow">
    <div class="brm-container brm-container--small">
      <h2 class="text-center text-white">Team Member Spotlight</h2>
      <div class="mb-10 shadow js-carousel-employees">
        @foreach( $employees as $employee )
          <div class="w-full">
            <div class="flex flex-col md:flex-row flex-wrap md:flex-no-wrap">
              @if( App::image($employee->ID, 'w162x181') )
                <img
                  loading="lazy"
                  srcset="{{ App::image($employee->ID, 'w162x181') }} 162w, {{ App::image($employee->ID, 'w324x362') }} 324w"
                  sizes="(max-width: 767px) 324px, 162px"
                  src="{{ App::image($employee->ID, 'w162x181') }}"
                  alt="{{ $employee->post_title }}"
                />
              @endif
              <div class="md:flex md:flex-col md:justify-center md:flex-1 p-10 text-white bg-accent-1">
                <h5 class="mb-0 text-white">{{ $employee->post_title }}</h5>
                {!! apply_filters('the_content', $employee->post_excerpt) !!}
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <p class="text-center">
        <a class="brm-btn brm-btn--secondary" href="{{ get_permalink(34) }}">Meet the Whole Team</a>
      </p>
    </div>
  </section>
@endif
