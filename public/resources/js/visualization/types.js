document.addEventListener('DOMContentLoaded', () => {
            const dropdown = document.getElementById('chartTypeDropdown');

            const symbolDropdown = document.getElementById('symbolDropdown');

            const currentSymbol= symbolDropdown.value;

            // types
            const exampleTypes = [
                'CandleStick',
                'Bar',
                'Line',         
            ];

            // Populate dropdown with example symbols
            exampleTypes.forEach(type => {
                const option = document.createElement('option');
                option.value = type;
                option.textContent = type;
                dropdown.appendChild(option);
            });

            // Set default type
            const defaultType = 'CandleStick'; 
            dropdown.value = defaultType;

            // Notify when a type is selected 
            function notifySymbol(selectedChart) {
                document.dispatchEvent(new CustomEvent('chartSelected', {detail: {
                    chartType: selectedChart,
                    currentSymbol: currentSymbol
                }}));
            }

            // Initial notification for default type
            notifySymbol(defaultType);

            dropdown.addEventListener('change', (event) => {
                const selectedChart = event.target.value;
                if (selectedChart) {
                    notifySymbol(selectedChart);
                }
            });
        });

