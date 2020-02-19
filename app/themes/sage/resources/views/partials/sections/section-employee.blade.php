@if( $employee )
  <div class="w-full bg-accent-5 shadow">
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
      <div class="md:flex md:flex-col md:flex-1 p-10 text-white">
        <h5 class="mb-0 text-white">{{ $employee->post_title }}</h5>
        {!! apply_filters('the_content', $employee->post_excerpt) !!}
      </div>
    </div>
  </div>
@endif
