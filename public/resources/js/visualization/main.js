document.addEventListener('DOMContentLoaded', () => {
    const dropdown = document.getElementById('symbolDropdown');
    // Initialize Pusher
    Pusher.logToConsole = true;
    const pusher = new Pusher('65db8d333bfaf7067936', {
        cluster: 'ap2',
        forceTLS: true
    });

    // Define chart properties
    const chartId = window.chartId;
    const containerId = 'chart' + window.chartId;

    const chartProperties = {
        height: 400,
        timeScale: {
            timeVisible: true,
            secondsVisible: false,
        },
        layout: {
            background: { color: 'transparent' },
            textColor: '#A9A9A9',
        }    
    };

    function removeCurrentSeries() {
        if (candleSeries) {
            chart.removeSeries(candleSeries);
        }
    }
    const domElement = document.getElementById(containerId);
    const chart =LightweightCharts.createChart(domElement, chartProperties);
    var candleSeries = chart.addCandlestickSeries();
    const defaultSymbol = 'BNBUSDT';
    var chartData = [];
    var currentSymbol = 'BNBUSDT';

    // `https://api.binance.com/api/v3/klines?symbol=${symbol}&interval=1d&limit=1000`
    

    /* CHART TYPE FUNCTIONS - lines, bar... */

    //Change chart type
    function changeChartType(chartType) {
        removeCurrentSeries();
        switch (chartType.chartType) {
            case 'CandleStick':
                candleSeries = chart.addCandlestickSeries(); 
                updateChart(currentSymbol);
                break; 
            case 'Line':
                candleSeries = chart.addAreaSeries();
                updateChart(currentSymbol);
                break; 
            case 'Bar':
                candleSeries = chart.addBarSeries();  
                updateChart(currentSymbol);      
                break; ;
        }};
    // Subscribe to Pusher channel and listen chart type change events
    const chartchannel = pusher.subscribe(window.chartId +'chart-type-channel');
    chartchannel.bind('chart-type-updated', function(data) {
        console.log('Received broadcast event:', data);
        if (data) {
          console.log('Chart updated on server:', data);
          changeChartType(data.type);
        } else {
            console.log(data);
            console.error('Event does not contain a symbol:', data);
        }
    });

    // Listen for custom event to update chart type */
    document.addEventListener('chartSelected', (event) => {
        const chartType = event.detail;
        fetch('/update-chart-type', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ chartType: chartType })
        })
        .then(response => response.json())
        .then(data => {
            console.log(chartType);
            changeChartType(chartType);
        })
        .catch(err => console.error('Error updating symbol:', err));
    });

    
    /* SYMBOL FUNCTIONS */
    
    // Function to handle symbol update
    function handleSymbolUpdate(symbol) {
        updateChart(symbol);
    }
    // Subscribe to Pusher channel and listen symbol change events
    const channel = pusher.subscribe(window.chartId +'symbol-channel');
    channel.bind('symbol-updated', function(data) {
        console.log('Received broadcast event:', data);
        if (data.symbol) {
          console.log('Symbol updated on server:', data.symbol);
            handleSymbolUpdate(data.symbol);
        } else {
            console.error('Event does not contain a symbol:', data);
        }
    });
    // Listen for custom event to update symbol
    document.addEventListener('symbolSelected', (event) => {
        const selectedSymbol = event.detail;
        console.log('Symbol selected:', selectedSymbol); // Debugging line
        fetch('/updatesymbol', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ symbol: selectedSymbol })
        })
        .then(response => response.json())
        .then(data => {
            currentSymbol=selectedSymbol;
            handleSymbolUpdate(selectedSymbol);
        })
        .catch(err => console.error('Error updating symbol:', err));
    });

    updateChart(defaultSymbol);

    
    /* PRICE POINT FUNCTIONS */

    // Function to update price point data
    function updateChart(symbol) {
        const url= `chart_data/${symbol}/${chartId}.csv`
        console.log("the url",url);
        fetch(url)
            .then(res => res.json())
            .then(data => {
                const cdata = data.map(d => ({
                    time: d[0] / 1000,
                    open: parseFloat(d[1]),
                    high: parseFloat(d[2]),
                    low: parseFloat(d[3]),
                    close: parseFloat(d[4])
                }));
                data=cdata;
                chartData=cdata;
                candleSeries.setData(cdata);
                chart.timeScale().fitContent();
            })
            .catch(err => console.error('Error fetching klines data:', err));
    }
    //Subscribe to Pusher channel and listen price point update events
    const pricePointChannel = pusher.subscribe(window.chartId + 'price-point-channel');
    pricePointChannel.bind('price-point-updated', function(data) {    
        if (data && data.timestamp) {
            console.log('Price point updated on server:', data);
            var timestamp = data.timestamp;
            if (typeof timestamp !== 'number') {
                const date = new Date(timestamp);
                if (isNaN(date.getTime())) {
                    console.log('Invalid date string');
                    return null;
                }
                else{
                        timestamp=date.getTime();
                }
            }
            
            // Convert timestamp from milliseconds to seconds
            const timestampInSeconds = Math.floor(timestamp / 1000);
            
            // Create a new data point
            const newDataPoint = {
                time: timestampInSeconds,
                open: parseFloat(data.open),
                high: parseFloat(data.high),
                low: parseFloat(data.low),
                close: parseFloat(data.close)
            };

            // Check if the timestamp already exists in the chart data
            const existingIndex = chartData.findIndex(point => point.time === timestampInSeconds);

            if (existingIndex !== -1) {
                console.log("exists");
                // Update the existing data point
                chartData[existingIndex] = newDataPoint; 
                candleSeries.update(newDataPoint);
            } else {
                console.log("new data",newDataPoint);
                // Add new data point
                chartData.push(newDataPoint); 
                candleSeries.update(newDataPoint); 
            }
        } else {
            console.error('Price point update failed:', data);
        }
    }); 
    // listen for price point update event 
    document.addEventListener('pricepPointUpdated', (event) => {
        const formData= event.detail;
        const parsedData = new URLSearchParams(formData);    
        var timestamp = parsedData.get('timestamp');
        if (typeof timestamp !== 'number') {
            const date = new Date(timestamp);
            if (isNaN(date.getTime())) {
                console.log('Invalid date string');
                return null;
            }
            else{
                    timestamp=date.getTime();
            }
        } 
        const open = parsedData.get('open');
        const high = parsedData.get('high');
        const low = parsedData.get('low');
        const close = parsedData.get('close');
        const timestampInSeconds = Math.floor(timestamp / 1000);
        const newDataPoint = {
                time: timestampInSeconds,
                open: parseFloat(open),
                high: parseFloat(high),
                low: parseFloat(low),
                close: parseFloat(close)
            };
         candleSeries.update(newDataPoint);
         console.log(newDataPoint);

    });
    
});
   
