@if( get_field('fpa_offices_content') )
  <section class="brm-section brm-section--offices">
    <div class="text-black text-center brm-container brm-container--small">
      <h2>FPA Offices</h2>
      {!! get_field('fpa_offices_content') !!}
      @if( $offices )
        <ul class="md:hidden flex flex-row flex-wrap justify-between -mx-base list-reset">
          @foreach( $offices as $office )
            <li class="w-1/2 mb-5 px-base text-left">
              <h6 class="mb-0">{{ $office->post_title }}</h6>
              @if( get_field('office_address', $office) )
                <span class="block">
                  <a class="text-primary-1 no-underline" href="{{ TemplateAbout::address($office) }}">{{ get_field('office_address', $office) }}</a>
                </span>
              @endif
            </li>
          @endforeach
        </ul>
      @endif
    </div>
  </section>
@endif
