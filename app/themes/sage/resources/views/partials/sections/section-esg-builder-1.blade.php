@if( have_rows('section_1_builder') )
  @while( have_rows('section_1_builder') ) @php the_row() @endphp
    @php
      $type = get_sub_field('section_1_builder_type');
    @endphp
    @if( $type === 'content' )
      {!! get_sub_field('section_1_builder_content') !!}
    @elseif( $type === 'card' )
      @if( have_rows('section_1_builder_cards') )
        <div id="cards-1" class="w-full flex flex-row flex-wrap md:justify-center mb-2 md:px-10">
          @while( have_rows('section_1_builder_cards') ) @php the_row() @endphp
            @php
              $icon = get_sub_field('section_1_builder_card_icon');
              $number = get_sub_field('section_1_builder_card_number');
              $caption = get_sub_field('section_1_builder_card_caption');
            @endphp
            <div class="flex flex-col flex-wrap items-center w-full md:w-auto mb-4 md:mb-5 mx-4 py-5 px-5 bg-white shadow">
              @if( $icon )
                <img class="block mb-3" src="{{ $icon['url'] }}" width="67" height="67" />
              @endif
              @if( $number )
                <span class="text-5xl text-md:5xl font-poynteroldstyledisplaysemibold leading-none text-primary-2 js-increment" data-num="{{ preg_replace('/[^0-9]/', '', strip_tags($number)) }}">{!! $number !!}</span>
              @endif
              @if( $caption )
                <span class="mt-1 text-xl text-primary-1 text-center">{!! $caption !!}</span>
              @endif
            </div>
          @endwhile
        </div>
      @endif
    @endif
  @endwhile
  <hr>
@endif
