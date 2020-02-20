@if( have_rows('affliate_stats') )
  @php
    $i = 0;
  @endphp
  <div class="w-full flex flex-row flex-wrap md:flex-no-wrap md:items-start md:justify-center">
    @while( have_rows('affliate_stats') ) @php the_row() @endphp
      @php
        $gradient = $i === 0 ? 'gold' : '';
        $number = $i === 0 ? 'text-white text-shadow' : 'text-primary-2';
        $text = $i === 0 ? 'text-white' : 'text-primary-1';
      @endphp
      <div class="flex flex-col flex-wrap items-center mx-1 py-5 px-5 bg-white shadow {{ $gradient }}">
        <span class="text-5xl text-md:5xl font-poyntertextromanoneregular leading-none {{ $number }}">{!! get_sub_field('affliate_stat_number') !!}</span>
        <span class="mt-5 text-xl text-center {{ $text }}">{!! get_sub_field('affliate_stat_text') !!}</span>
      </div>
      @php $i++ @endphp
    @endwhile
  </div>
@endif
