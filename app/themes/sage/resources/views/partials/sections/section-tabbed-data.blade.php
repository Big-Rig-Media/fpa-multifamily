@php
  $rows = $default ? 'tabs' : 'core_plus_tabs';
  $caption = $default ? 'tab_caption' : 'core_plus_tab_caption';
  $data = $default ? 'tab_data' : 'core_plus_tab_data';
  $number = $default ? 'tab_number' : 'core_plus_tab_number';
  $text = $default ? 'tab_text' : 'core_plus_tab_text';
  $active = $default ? 'active_tab' : 'core_plus_active_tab';
@endphp
@if( have_rows($rows) )
  <div class="tabs">
    @php
      $i = 0;
      $j = 0;
    @endphp
    @while( have_rows($rows) ) @php the_row() @endphp
      <div id="{{ strtolower(get_sub_field($caption)) }}" class="flex-col flex-wrap tab {{ $i === (int) get_field($active) ? 'flex is-active' : 'hidden' }}">
        <div class="w-full flex flex-row flex-wrap md:flex-no-wrap md:items-start md:justify-center">
          @if( have_rows($data) )
            @while( have_rows($data) ) @php the_row() @endphp
              <div class="flex flex-col flex-wrap w-full md:w-auto mb-4 md:mb-0 mx-1 py-5 px-5 bg-white shadow">
                <span class="text-5xl text-md:5xl font-poynteroldstyledisplaysemibold leading-none text-primary-2">{{ get_sub_field($number) }}</span>
                <span class="mt-5 text-xl text-primary-1">{{ get_sub_field($text) }}</span>
              </div>
            @endwhile
          @endif
          </div>
      </div>
      @php $i++ @endphp
    @endwhile
    <div class="flex flex-row flex-no-wrap justify-center w-full md:max-w-half mb-10 md:mt-10 md:mb-0 mx-auto tab-buttons">
      @while( have_rows($rows) ) @php the_row() @endphp
        <button class="w-1/4 text-center pointer {{ $j === (int) get_field($active) ? 'is-active js-tab-activate' : 'js-tab-activate' }}" data-tab="{{ strtolower(get_sub_field($caption)) }}">{{ get_sub_field($caption) }}</button>
        @php $j++ @endphp
      @endwhile
    </div>
  </div>
  <p class="mt-10 text-center">Click Bar for Individual Stats.</p>
@endif
