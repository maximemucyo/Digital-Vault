<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    const dropdown = document.getElementById('symbolDropdown');
    
    function loadPricePoints(){
        let symbol =dropdown.value;
        if(symbol==""){
            symbol="BNBUSDT";
        }
        let loadPricePointsUrl = "{{ route('price_points', ['symbol' => '_SYMBOL']) }}".replace('_SYMBOL', symbol);
        console.log(symbol);
    console.log(loadPricePointsUrl);

    $.ajax({
        url:loadPricePointsUrl,
        type:"GET",
        dataType:"json",
        success:function(data){
            console.log(data);
            $('#price_points_forms').html(data.render);
        },
        error:function(error){
            console.log(error);
        }
    })
}
    loadPricePoints();

    dropdown.addEventListener('change', (event) => {
        loadPricePoints();
    });
    </script>