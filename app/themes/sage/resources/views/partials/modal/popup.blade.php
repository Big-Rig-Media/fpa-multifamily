@if( class_exists('ACF') )
  @if( get_field('popup_content', 'option') )
    <div class="brm-modal js-popup">
      {!! get_field('popup_content', 'option') !!}
    </div>
  @endif
@endif
