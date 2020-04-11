@if( $employee )
  @php
    $primary_color = $background === 'white' ? 'text-primary-1' : 'text-white';
    $accent_color = $background === 'white' ? 'text-black' : 'text-white';
  @endphp
  <div id="{{ $employee->post_name }}" class="w-full {{ $width }} my-10 mx-auto bg-{{ $background }} shadow">
    <div class="flex flex-col md:flex-row flex-wrap md:flex-no-wrap {{ $align }}">
      @if( App::image($employee->ID, 'w162x181') )
        <img
          loading="lazy"
          srcset="{{ App::image($employee->ID, 'w162x181') }} 162w, {{ App::image($employee->ID, 'w324x362') }} 324w"
          sizes="(max-width: 767px) 324px, 162px"
          src="{{ App::image($employee->ID, 'w162x181') }}"
          alt="{{ $employee->post_title }}"
        />
      @endif
      <div class="md:flex md:flex-col md:flex-1 relative {{ $padding }} {{ $accent_color }} text-left">
        <h5 class="mb-0 {{ $primary_color }}">{{ $employee->post_title }}</h5>
        @if( App::employeePosition($employee) )
          <span class="block mb-5 text-base {{ $accent_color }}"><em>{{ App::employeePosition($employee) }}</em></span>
        @endif
        @if( App::vcard($employee) )
          @php
            if ( is_page_template(['views/template-acquisitions.blade.php']) ) {
              $class = 'md:absolute pin-t pin-r mb-5 md:mb-0 brm-btn brm-btn--primary';
              $style = '';
            } else {
              $class = 'md:absolute mb-5 md:mb-0 brm-btn brm-btn--primary';
              $style = 'top:40px;right:20px';
            }
          @endphp
          <a class="{{ $class }}" href="{{ App::vcard($employee) }}" style="{{ $style }}">Download</a>
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
      </div>
    </div>
  </div>
@endif
