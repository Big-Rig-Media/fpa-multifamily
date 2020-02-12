@if ( $phone )
  <a href="tel:{{ preg_replace('/[^0-9]/', '', $phone) }}">{{ $phone }}</a>
@endif
