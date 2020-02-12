{{--
  Template Name: Reservation Template
--}}

@extends('layouts.app')

@section('content')
  @include('partials.sections.section-intro')
  @include('partials.sections.section-builder')
  <script>
    (function ($) {
      $(document).ready(function() {
        // Define DOM elements to use
        const checkInInput = $('#input_1_8');
        const checkOutInput = $('#input_1_9');

        // Enable read only
        checkInInput.prop('readonly', true);
        checkOutInput.prop('readonly', true);

        // Disable Check Out
        checkOutInput.prop('disabled', true);

        // Handle Check In
        checkInInput.datepicker({
          dateFormat: 'mm/dd/yy',
          minDate: new Date(),
          onSelect: selectedDate => {
            // Set date data
            let checkInDate = new Date(selectedDate);
            let checkOutDate = new Date(checkInDate);

            // Enable Check Out
            checkOutInput.prop('disabled', false);

            // Set checkout date
            checkOutDate.setDate(checkOutDate.getDate() + 1);

            // Set checkout input data
            checkOutInput.datepicker('setDate', checkOutDate);
          },
          showOn: 'both',
        });

        // Handle Check Out
        checkOutInput.datepicker({
          dateFormat: 'mm/dd/yy',
          minDate: new Date(),
          showOn: 'both',
        });
      });
    })(jQuery);
  </script>
@endsection
