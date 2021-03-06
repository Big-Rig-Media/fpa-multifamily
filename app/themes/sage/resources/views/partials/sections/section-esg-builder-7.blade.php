@if( have_rows('section_7_builder') )
  @while( have_rows('section_7_builder') ) @php the_row() @endphp
    @php
      $type = get_sub_field('section_7_builder_type');
    @endphp
    @if( $type === 'content' )
      {!! get_sub_field('section_7_builder_content') !!}
      @if( get_sub_field('section_7_builder_gallery') )
        <ul class="flex flex-row flex-wrap items-center justify-center mt-10 list-reset">
          @foreach( get_sub_field('section_7_builder_gallery') as $gallery_item )
            <li class="mb-5 mx-10 list-none">
              <img src="{{ $gallery_item['url'] }}" alt="{{ $gallery_item['alt'] }}" />
            </li>
          @endforeach
        </ul>
      @endif
    @elseif( $type === 'card' )
      <div class="md:flex md:flex-row md:flex-wrap md:justify-between">
        <div class="w-full">
          @if( have_rows('section_7_builder_cards') )
            <div id="cards-7" class="w-full flex flex-row flex-wrap md:justify-center mb-5">
              @while( have_rows('section_7_builder_cards') ) @php the_row() @endphp
                @php
                  $icon = get_sub_field('section_7_builder_card_icon');
                  $caption_top = get_sub_field('section_7_builder_card_caption_top');
                  $number = get_sub_field('section_7_builder_card_number');
                  $caption_bottom = get_sub_field('section_7_builder_card_caption_bottom');
                @endphp
                <div class="w-full md:w-auto text-center">
                  @if( $caption_top )
                    <span class="inline-block mb-1 text-base text-white uppercase">{{ $caption_top }}</span>
                  @endif
                  <div class="flex flex-col md:flex-row flex-wrap md:flex-no-wrap items-center w-full md:w-auto my-4 md:mb-5 md:mx-3 py-5 px-10 bg-primary-1 shadow">
                    @if( $icon )
                    @endif
                    @if( $number )
                      <span class="text-5xl text-md:5xl font-poynteroldstyledisplaysemibold leading-none text-white js-increment" data-num="{{ preg_replace('/[^0-9]/', '', strip_tags($number)) }}">
                        <span>{!! $number !!}</span>
                      </span>
                    @endif
                    @if( $caption_bottom )
                      <span class="inline-block mt-1 md:ml-3 text-xl text-white">{{ $caption_bottom }}</span>
                    @endif
                  </div>
                </div>
              @endwhile
            </div>
            {!! get_sub_field('section_7_builder_content_more') !!}
          @endif
        </div>
        <!--
        <div class="hidden md:block md:w-px bg-white"></div>
        <div class="md:w-1/3 mt-10 md:mt-0 text-center">
          <span class="block mb-10 text-base text-white uppercase">organizations we support</span>
          <img class="block mb-5 mx-auto md:ml-0 md:mr-auto" src="/app/uploads/2020/03/habitat-for-humanity.png" alt="Habitat for Humanity" />
          <img class="block mx-auto md:ml-auto md:mr-0" src="/app/uploads/2020/03/boys-girls-clubs-of-america.png" alt="Boys and Girls Club of America" />
        </div>
        -->
      </div>
    @endif
  @endwhile
  @if( get_field('section_7_call_to_action_text') && get_field('section_7_call_to_action_url') )
    <div class="my-8 md:mb-0 text-center">
      <a class="brm-btn brm-btn--tertiary" href="{{ get_field('section_7_call_to_action_url') }}">
        {{ get_field('section_7_call_to_action_text') }}
      </a>
    </div>
  @endif
@endif
