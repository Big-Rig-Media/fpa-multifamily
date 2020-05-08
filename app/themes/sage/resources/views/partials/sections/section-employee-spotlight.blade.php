@if( $employees )
  <section class="brm-section brm-section--spotlight has-shadow">
    <div class="brm-container brm-container--small">
      <h2 class="text-center">Team Member Snapshot</h2>
      <div class="mb-10 js-carousel-employees">
        @foreach( $employees as $employee )
          <div class="w-full">
            <div class="flex flex-col flex-wrap text-center">
              <div class="w-full max-w-spotlight-image mb-2 mx-auto">
                @if( App::image($employee->ID, 'w162x181') )
                  <img
                    class="border border-solid border-primary-2 rounded-team-card"
                    loading="lazy"
                    srcset="{{ App::image($employee->ID, 'w162x181') }} 162w, {{ App::image($employee->ID, 'w324x362') }} 324w"
                    sizes="(max-width: 767px) 324px, 162px"
                    src="{{ App::image($employee->ID, 'w162x181') }}"
                    alt="{{ $employee->post_title }}"
                  />
                @endif
              </div>
              <div class="w-full max-w-spotlight-content mx-auto text-black">
                <h5 class="mb-5 text-primary-2">{{ $employee->post_title }}</h5>
                {!! apply_filters('the_content', $employee->post_excerpt) !!}
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <div class="text-center">
          <a class="brm-btn brm-btn--primary" href="{{ get_permalink(34) }}">Meet the Whole Team</a>
      </div>
    </div>
  </section>
@endif
