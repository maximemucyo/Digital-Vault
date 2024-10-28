
<div class="modal-body scroll-y mx-5 mx-xl-10 my-7 d-flex row p-0 mt-0" id="price_points_form"> 
<span class="p-2 text-success fw-bolder">You can change the price points of the last date or add a new date</span> 
    <div class="border col-12 shadow p-2">
        @php
        $pricepoint = $csvdata[count($csvdata) - 1];
        @endphp
        <div class="pointdate">
            <span class="fw-bold me-5">Last Date</span>
            {{ date('Y-m-d H:i:s', $pricepoint[0] / 1000) }}
        </div>
        <form class="price-points-form" id="price-point" method="POST" action="{{ route('pricePointUpdate') }}">
            @csrf 
            <input id="symbol" name="symbol" class="symbol d-none" value="{{$symbol}}"/>
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
            <div class="d-flex justify-content-end align-items-end">
                <button type="submit" class="btn btn-small btn-success">Save</button>
            </div>
        </form>
    </div>
    <div class="border col-12 shadow p-2 shadow mt-4">
        <span class="fw-bold">New Date</span>
        <form class="price-points-form" id="price-point-form" method="POST" action="{{ route('pricePointUpdate') }}">
            @csrf 
            <input id="symbol2" name="symbol" class="symbol d-none" value="{{$symbol}}"/>
            <div class="form-group m-2">
                <label for="open">New Date:</label>
                <input name="timestamp" type="date" placeholder="2024-09-03 00:00:00" value="" required/> 
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
            <div class="d-flex justify-content-end align-items-end">
                <button type="submit" class="btn btn-small btn-success">Save</button>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.price-points-form').on('submit', function(event) {
            const dropdown = document.getElementById('symbolDropdown');
            const symbol = document.getElementById('symbol');
            symbol.value=dropdown.value;
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
                    Swal.fire({
                    title: 'Updated!',
                    text: 'Price Point updated successfully!',
                    icon: 'success'
                    });
                    // alert('Price Point updated successfully!');
                },
                complete: function() {
                    saveButton.prop('disabled', false).text('Save'); 
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error('Error updating data:', error);
                    alert('An error occurred while updating data.');
                }
            });
        });
});
</script>
        </div>
    </div>
</div>