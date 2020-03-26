@if( have_rows('section_5_builder') )
  @while( have_rows('section_5_builder') ) @php the_row() @endphp
    @php
      $type = get_sub_field('section_5_builder_type');
    @endphp
    @if( $type === 'content' )
      {!! get_sub_field('section_5_builder_content') !!}
    @elseif( $type === 'card' )
      @if( have_rows('section_5_builder_cards') )
        <div id="cards-5" class="w-full flex flex-row flex-wrap md:justify-center mb-2">
          @while( have_rows('section_5_builder_cards') ) @php the_row() @endphp
            @php
              $icon = get_sub_field('section_5_builder_card_icon');
              $number = get_sub_field('section_5_builder_card_number');
              $caption = get_sub_field('section_5_builder_card_caption');
            @endphp
            <div class="flex flex-col flex-wrap items-center w-full md:w-auto mb-4 md:mb-5 mx-3 py-5 px-5 bg-primary-1 shadow">
              @if( $icon )
              @endif
              @if( $number )
                <span class="text-5xl text-md:5xl font-poynteroldstyledisplaysemibold leading-none text-white">{!! $number !!}</span>
              @endif
              @if( $caption )
                <span class="mt-1 text-xl text-white">{{ $caption }}</span>
              @endif
            </div>
          @endwhile
        </div>
      @endif
    @endif
  @endwhile
  <hr>
@endif
