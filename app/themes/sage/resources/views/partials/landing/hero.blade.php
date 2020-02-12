<div class="brm-container brm-container--flex-spread">
  <div class="brm-hero__content">
    {!! get_field('hero_content') !!}
  </div>
  <div class="brm-hero__form">
    {!! do_shortcode('[gravityform id="2" title="false" description="false"]') !!}
    <script>
      (function ($) {
        $(document).ready(function() {
          // Define DOM elements to use
          const checkInInput = $('#input_2_2');
          const checkOutInput = $('#input_2_3');

          if (checkInInput && checkOutInput) {
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
          }
        });
      })(jQuery);
    </script>
  </div>
</div>
