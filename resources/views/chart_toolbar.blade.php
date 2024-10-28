<div id="toolbar" class="mt-2">
    <select id="symbolDropdown" class="btn btn-small btn-light-success">
        <script src="resources/js/visualization/symbols.js"></script>
    </select>
    <select id="chartTypeDropdown" class="btn btn-small btn-light-success">
		<script src="resources/js/visualization/types.js"></script></div>
    </select>
    {{$csvdata}}
    <button class="btn btn-small btn-light-success" data-bs-toggle="modal" data-bs-target="#kt_price_point_edit">Edit Price Point</button>
    <div class="modal fade" id="kt_price_point_edit" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-start mw-650px">
            <div class="modal-content">
                <div class="modal-header" id="kt_modal_add_user_header">
                    <h2 class="fw-bold">Change Price Points</h2>
                    <span >You can change the price points of the last date or add </span>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7 d-flex row">
                  
                    <div class="border border-secondary col">
                        <span>Last Date</span>
                        @php
                        $pricepoint = $csvdata[count($csvdata) - 1];
                        @endphp
                        <div class="pointdate" style="cursor: pointer;">
                            {{ date('Y-m-d H:i:s', $pricepoint[0] / 1000) }}
                        </div>
                        <form class="price-points-form" id="price-point" method="POST" action="{{ route('pricePointUpdate') }}">
                            @csrf
                            <input  name="symbol" value="{{ $symbol }}"/> 
                            <input type="hidden" name="timestamp" value="{{ $pricepoint[0] }}"/> 
                            <div class="d-flex">
                            <div class="form-group m-2">
                                <label for="open">Open:</label>
                                <input type="number" name="open" id="open" class="form-control" value="{{ $pricepoint[1] }}" required>
                            </div>
                            <div class="form-group m-2">
                                <label for="high">High:</label>
                                <input type="number" name="high" id="high" class="form-control" value="{{ $pricepoint[2] }}" required>
                            </div>
                            </div>
                            <div class="d-flex">
                            <div class="form-group m-2">
                                <label for="low">Low:</label>
                                <input type="number" name="low" id="low" class="form-control" value="{{ $pricepoint[3] }}" required>
                            </div>
                            <div class="form-group m-2">
                                <label for="close">Close:</label>
                                <input type="number" name="close" id="close" class="form-control" value="{{ $pricepoint[4] }}" required>
                            </div>
                            </div>
                            <button type="submit" class="btn btn-small btn-primary">Save</button>
                        </form>
                    </div>
                    <div class="border border-secondary">
                        <span>New Date</span>
                        <form class="price-points-form" id="price-point-form" method="POST" action="{{ route('pricePointUpdate') }}">
                            @csrf 
                            <input  name="symbol" value="{{ $symbol }}"/> 
                            <div class="form-group m-2">
                                <label for="open">New Date:</label>
                                <input name="timestamp" placeholder="2024-09-03 00:00:00" value="" required/> 
                            </div>
                            <div class="d-flex">
                            <div class="form-group m-2">
                                <label for="open">Open:</label>
                                <input type="number" name="open" id="open" class="form-control" value="{{ $pricepoint[1] }}" required>
                            </div>
                            <div class="form-group m-2">
                                <label for="high">High:</label>
                                <input type="number" name="high" id="high" class="form-control" value="{{ $pricepoint[2] }}" required>
                            </div>
                            </div>
                            <div class="d-flex">
                            <div class="form-group m-2">
                                <label for="low">Low:</label>
                                <input type="number" name="low" id="low" class="form-control" value="{{ $pricepoint[3] }}" required>
                            </div>
                            <div class="form-group m-2">
                                <label for="close">Close:</label>
                                <input type="number" name="close" id="close" class="form-control" value="{{ $pricepoint[4] }}" required>
                            </div>
                            </div>
                            <button type="submit" class="btn btn-small btn-primary">Save</button>
                        </form>
                    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.price-points-form').on('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            var form = $(this); 
            var saveButton = form.find('button[type="submit"]');
            saveButton.prop('disabled', true).text('Saving...'); // Disable button and change text

            // Send AJAX request
            $.ajax({
                url: form.attr('action'), 
                type: 'POST',
                data: form.serialize(), 
                success: function(response) {                    
                    alert('Data updated successfully!');
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error('Error updating data:', error);
                    alert('An error occurred while updating data.');
                },
                complete: function() {
                    saveButton.prop('disabled', false).text('Save'); 
                }
            });
        });
    });
    

</script>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.price-points-form').on('submit', function(event) {
            event.preventDefault(); 

            var form = $(this); 
  
            var saveButton = form.find('button[type="submit"]');
            saveButton.prop('disabled', true).text('Saving...');

            // Send AJAX request
            $.ajax({
                url: form.attr('action'), 
                type: 'POST',
                data: form.serialize(),
                success: function(response) {
                    document.dispatchEvent(new CustomEvent('pricepPointUpdated', { detail: form.serialize() }));                    
                  
                    alert('Price Point updated successfully!');
                },
                error: function(xhr, status, error) {
               
                    console.error('Error updating data:', error);
                    alert('An error occurred while updating data.');
                }
            });
        });
    });
</script>
							
