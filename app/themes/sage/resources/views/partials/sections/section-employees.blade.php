@if( $employees )
  <section class="brm-section brm-section--employees">
    <div class="text-center brm-container">
      <div class="grid-employees">
        @foreach( $employees as $employee )
          <div>
            @if( App::image($employee->ID, 'w246x272') )
              <img
                loading="lazy"
                srcset="{{ App::image($employee->ID, 'w246x272') }} 246w, {{ App::image($employee->ID, 'w492x544') }} 492w"
                sizes="(max-width: 767px) 246px, 492px"
                src="{{ App::image($employee->ID, 'w246x272') }}"
                alt="{{ $employee->post_title }}"
              />
            @endif
            <div class="md:px-8">
              <h6 class="mt-3 mb-0">{{ $employee->post_title }}</h6>
              @if( TemplateTeam::position($employee) )
                <span class="block mb-3 text-sm text-primary-1">{{ TemplateTeam::position($employee) }}</span>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endif
