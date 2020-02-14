@if( $employees )
  <section class="brm-section brm-section--employees">
    <div class="text-center brm-container brm-container--small">
      <div class="grid-employees">
        @foreach( $employees as $employee )
          <div>
            @if( App::image($employee->ID, 'w246x272') )
              @if( $employee->post_content )
                <a href="#{{ $employee->post_name }}" data-fancybox>
                  <img
                    class="border border-solid border-primary-2 rounded-team-card"
                    loading="lazy"
                    srcset="{{ App::image($employee->ID, 'w246x272') }} 246w, {{ App::image($employee->ID, 'w492x544') }} 492w"
                    sizes="(max-width: 767px) 246px, 492px"
                    src="{{ App::image($employee->ID, 'w246x272') }}"
                    alt="{{ $employee->post_title }}"
                  />
                </a>
              @else
                <img
                  class="border border-solid border-primary-2 rounded-team-card"
                  loading="lazy"
                  srcset="{{ App::image($employee->ID, 'w246x272') }} 246w, {{ App::image($employee->ID, 'w492x544') }} 492w"
                  sizes="(max-width: 767px) 246px, 492px"
                  src="{{ App::image($employee->ID, 'w246x272') }}"
                  alt="{{ $employee->post_title }}"
                />
              @endif
            @endif
            <div class="md:px-8">
              @if( $employee->post_content )
                <h6 class="mt-3 mb-0">
                  <a class="text-current no-underline" href="#{{ $employee->post_name }}" data-fancybox>{{ $employee->post_title }}</a>
                </h6>
              @else
                <h6 class="mt-3 mb-0">{{ $employee->post_title }}</h6>
              @endif
              @if( TemplateTeam::position($employee) )
                <span class="block mb-3 text-sm text-primary-1">{{ TemplateTeam::position($employee) }}</span>
              @endif
            </div>
            @if( $employee->post_content )
              <div id="{{ $employee->post_name }}" class="shadow hidden">
                <div class="flex flex-col md:flex-row flex-wrap md:flex-no-wrap md:items-start md:justify-between w-full max-w-xl mx-auto">
                  <div class="md:w-1/3">
                    <img
                      class="border border-solid border-primary-2 rounded-team-card"
                      loading="lazy"
                      srcset="{{ App::image($employee->ID, 'w246x272') }} 246w, {{ App::image($employee->ID, 'w492x544') }} 492w"
                      sizes="(max-width: 767px) 246px, 492px"
                      src="{{ App::image($employee->ID, 'w246x272') }}"
                      alt="{{ $employee->post_title }}"
                    />
                  </div>
                  <div class="md:w-2/3 md:pl-10">
                    <h6 class="mb-0">{{ $employee->post_title }}</h6>
                    @if( TemplateTeam::position($employee) )
                      <span class="block mb-5 text-sm text-primary-1">{{ TemplateTeam::position($employee) }}</span>
                    @endif
                    {!! apply_filters('the_content', $employee->post_content) !!}
                    @if( TemplateTeam::vcard($employee) )
                      <a href="{{ TemplateTeam::vcard($employee) }}">Download vCard</a>
                    @endif
                  </div>
                </div>
              </div>
            @endif
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endif
