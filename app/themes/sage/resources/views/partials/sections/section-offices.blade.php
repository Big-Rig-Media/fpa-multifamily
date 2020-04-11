@if( get_field('fpa_offices_content') )
  <section id="our-offices" class="brm-section brm-section--offices">
    <div class="text-black text-center brm-container brm-container--small">
      <h2>FPA Offices</h2>
      {!! get_field('fpa_offices_content') !!}
      @include('partials.sections.section-map-offices')
      @if( $offices )
        <ul class="md:hidden list-reset">
          @foreach( $offices as $office )
            <li class="w-full mb-5 text-left">
              <h6 class="mb-0">
                <a class="text-current no-underline" href="{{ TemplateAbout::address($office) }}">{{ $office->post_title }}</a>
              </h6>
              @if( TemplateAbout::formatAddress($office) )
                <span class="block">
                  <a class="inline-flex items-center text-primary-1 no-underline" href="{{ TemplateAbout::address($office) }}">
                    <svg class="w-icon h-icon mr-2 fill-primary-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                      <path d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"/>
                    </svg>
                    {!! TemplateAbout::formatAddress($office) !!}
                  </a>
                </span>
              @endif
              @if( TemplateAbout::phone($office) )
                <span class="block mt-3">
                  <a class="text-primary-1 no-underline" href="tel:{{ preg_replace('/[^0-9]/', '', TemplateAbout::phone($office)) }}">
                    <svg class="w-icon h-icon mr-2 fill-primary-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                      <path d="M497.39 361.8l-112-48a24 24 0 00-28 6.9l-49.6 60.6A370.66 370.66 0 01130.6 204.11l60.6-49.6a23.94 23.94 0 006.9-28l-48-112A24.16 24.16 0 00122.6.61l-104 24A24 24 0 000 48c0 256.5 207.9 464 464 464a24 24 0 0023.4-18.6l24-104a24.29 24.29 0 00-14.01-27.6z"/>
                    </svg>
                    {{ TemplateAbout::phone($office) }}
                  </a>
                </span>
              @endif
            </li>
          @endforeach
        </ul>
      @endif
    </div>
  </section>
@endif
