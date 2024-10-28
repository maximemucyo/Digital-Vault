document.addEventListener('DOMContentLoaded', () => {
    const dropdown = document.getElementById('dates');
    const baseUrl = '../../../chart_data/default.csv'; 
    var pricepoints=[]
    fetch(baseUrl)
        .then(res => res.json())
        .then(data => {
            const cdata = data.map(d => ({
                time: d[0] / 1000,
            }));
            pricepoints=cdata;
        })   
    pricepoints.forEach(symbol => {
        const option = document.createElement('option');
        option.value = symbol;
        option.textContent = symbol;
        dropdown.appendChild(option);
    });

    // dropdown.addEventListener('change', (event) => {
    //     const selectedChart = event.target.value;
    //     if (selectedChart) {
    //         notifySymbol(selectedChart);
    //     }
    // });
});
