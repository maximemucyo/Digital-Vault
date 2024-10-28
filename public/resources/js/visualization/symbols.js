document.addEventListener('DOMContentLoaded', () => {
    const dropdown = document.getElementById('symbolDropdown');
    var symbols = [];

    fetch('/tokens')
        .then(response => response.json())
        .then(tokens => {
            console.log(tokens);
            symbols  = tokens;
            symbols.forEach(symbol => {
                const option = document.createElement('option');
                option.value = symbol;
                option.textContent = symbol;
                dropdown.appendChild(option);
            });
        })
        .catch(error => console.error('Error fetching symbols:', error));

    // Notify when a symbol is selected or the default symbol is set
    function notifySymbol(symbol) {
        document.dispatchEvent(new CustomEvent('symbolSelected', { detail: symbol }));
    }

    dropdown.addEventListener('change', (event) => {
        const selectedSymbol = event.target.value;
        dropdown.value =selectedSymbol;
        if (selectedSymbol) {
            notifySymbol(selectedSymbol);
        }
        
        //Change inputs with symbol classes to have the new value
        $('.symbol').each(function() {
            $(this).val(selectedSymbol);
            console.log("value", $(this).val());
        });
    });
 
});
