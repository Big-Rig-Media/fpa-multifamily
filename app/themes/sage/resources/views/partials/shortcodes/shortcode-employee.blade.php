@if( $employee )
  @php
    $primary_color = $background === 'white' ? 'text-primary-1' : 'text-white';
    $accent_color = $background === 'white' ? 'text-black' : 'text-white';
  @endphp
  <div id="{{ $employee->post_name }}" class="w-full max-w-card my-10 mx-auto bg-{{ $background }} shadow">
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
      <div class="md:flex md:flex-col md:flex-1 py-10 px-3 {{ $accent_color }} text-left">
        <h5 class="mb-0 {{ $primary_color }}">{{ $employee->post_title }}</h5>
        @if( App::employeePosition($employee) )
          <span class="block mb-5 text-sm {{ $primary_color }}">{{ App::employeePosition($employee) }}</span>
        @endif
        @if( App::employeeOffice($employee) )
          <span class="block mb-1">{{ App::employeeOffice($employee) }}</span>
        @endif
        @if( App::employeePhone($employee) || App::employeeFax($employee) || App::employeeEmail($employee) )
          <div class="flex flex-col md:flex-row md:flex-no-wrap md:items-center mb-3">
            @if( App::employeePhone($employee) )
              <span><strong>Phone:</strong> <a class="text-current no-underline" href="tel:{{ preg_replace('/[^0-9]/', '', App::employeePhone($employee)) }}">{{ App::employeePhone($employee) }}</a> <span class="hidden md:inline-block">&#124;</span></span>
            @endif
            @if( App::employeeFax($employee) )
              <span><strong>Fax:</strong> {{ App::employeeFax($employee) }} <span class="hidden md:inline-block">&#124;</span></span>
            @endif
            @if( App::employeeEmail($employee) )
              <span><strong>Email:</strong> <a class="text-current no-underline" href="mailto:{{ App::employeeEmail($employee) }}">{{ App::employeeEmail($employee) }}</a></span>
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
