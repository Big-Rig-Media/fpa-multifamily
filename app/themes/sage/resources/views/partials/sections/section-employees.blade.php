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
              @if( App::employeePosition($employee) )
                <span class="block mb-3 text-sm text-primary-1">{{ App::employeePosition($employee) }}</span>
              @endif
            </div>
            @if( $employee->post_content )
              <div id="{{ $employee->post_name }}" class="shadow hidden">
                <div class="flex flex-col md:flex-row flex-wrap md:flex-no-wrap md:items-start md:justify-between relative w-full max-w-xl mx-auto">
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
                    @if( App::employeePosition($employee) )
                      <span class="block mb-5 text-sm text-primary-1"><em>{{ App::employeePosition($employee) }}</em></span>
                    @endif
                    @if( App::vcard($employee) )
                      <a class="md:absolute md:pin-t md:pin-r brm-btn brm-btn--primary" href="{{ App::vcard($employee) }}">Download</a>
                    @endif
                    @if( App::employeeOffice($employee) )
                      <span class="block mb-1">{{ App::employeeOffice($employee) }}</span>
                    @else
                      @if( get_field('employee_special_address', $employee->ID) )
                        <span class="block mb-1">{{ get_field('employee_special_address', $employee->ID) }}</span>
                      @endif
                    @endif
                    @if( App::employeePhone($employee) || App::employeeFax($employee) || App::employeeEmail($employee) || App::employeeCellPhone($employee) )
                      <div class="flex flex-col md:flex-row md:flex-wrap md:items-center mb-3">
                        @if( App::employeePhone($employee) )
                          <span class="inline-block md:mr-1"><strong>Phone:</strong> <a class="text-current no-underline" href="tel:{{ preg_replace('/[^0-9]/', '', App::employeePhone($employee)) }}">{{ App::employeePhone($employee) }}</a> <span class="hidden md:inline-block"></span></span>
                        @endif
                        @if( App::employeeCellPhone($employee) )
                          <span class="inline-block md:mr-1"><strong>Cell:</strong> <a class="text-current no-underline" href="tel:{{ preg_replace('/[^0-9]/', '', App::employeeCellPhone($employee)) }}">{{ App::employeeCellPhone($employee) }}</a> <span class="hidden md:inline-block"></span></span>
                        @endif
                        @if( App::employeeEmail($employee) )
                          <span class="inline-block md:mr-1"><strong>Email:</strong> <a class="text-current no-underline" href="mailto:{{ App::employeeEmail($employee) }}">{{ App::employeeEmail($employee) }}</a></span>
                        @endif
                      </div>
                    @endif
                    @if( App::employeeTerritory($employee) )
                      <span class="block mb-5"><strong>Territories:</strong> {{ App::employeeTerritory($employee) }}</span>
                    @endif
                    {!! apply_filters('the_content', $employee->post_content) !!}
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
