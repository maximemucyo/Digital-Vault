import Papa from 'papaparse';
import { parseFullSymbol, makeApiRequest, generateSymbol } from './helpers.js';
//import { subscribeOnStream, unsubscribeFromStream } from './streaming.js';

const lastBarsCache = new Map();
const baseUrl = '../../../chart_data/default.csv'; // Base URL to fetch CSV files

const configurationData = {
    supported_resolutions: ['1D', '1W', '1M'],
    exchanges: [
        { value: 'Bitfinex', name: 'Bitfinex', desc: 'Bitfinex' },
        { value: 'Kraken', name: 'Kraken', desc: 'Kraken bitcoin exchange' }
    ],
    symbols_types: [
        { name: 'crypto', value: 'crypto' }
    ]
};

// Fetch all symbols from the server if needed
async function getAllSymbols() {
    // Here you might use a static list or fetch from an API if necessary
    return [];
}

// Convert CSV data to TradingView bars
function convertToBars(csvData) {
    return csvData.map(row => ({
        time: new Date(row.time).getTime(), 
        low: row.low,
        high: row.high,
        open: row.open,
        close: row.close
    }));
}

async function fetchCSVData(symbolName) {
    try {
        const response = await fetch(`${baseUrl}`);
        const text = await response.text();
        const result = Papa.parse(text, { header: true, dynamicTyping: true });
        console.log('result',result);
        return result.data;
    } catch (error) {
        console.error('Error fetching CSV data:', error);
        return [];
    }
}

export default {
    onReady: (callback) => {
        console.log('[onReady]: Method call');
        setTimeout(() => callback(configurationData));
    },

    searchSymbols: async (userInput, exchange, symbolType, onResultReadyCallback) => {
        console.log('[searchSymbols]: Method call');
        const symbols = await getAllSymbols();
        const newSymbols = symbols.filter(symbol => {
            const isExchangeValid = exchange === '' || symbol.exchange === exchange;
            const isFullSymbolContainsInput = symbol.full_name
                .toLowerCase()
                .indexOf(userInput.toLowerCase()) !== -1;
            return isExchangeValid && isFullSymbolContainsInput;
        });
        onResultReadyCallback(newSymbols);
    },

    resolveSymbol: async (symbolName, onSymbolResolvedCallback, onResolveErrorCallback) => {
        console.log('[resolveSymbol]: Method call', symbolName);
        const symbols = await getAllSymbols();
        const symbolItem = symbols.find(({ full_name }) => full_name === symbolName);
        if (!symbolItem) {
            console.log('[resolveSymbol]: Cannot resolve symbol', symbolName);
            onResolveErrorCallback('cannot resolve symbol');
            return;
        }
        const symbolInfo = {
            ticker: symbolItem.full_name,
            name: symbolItem.symbol,
            description: symbolItem.description,
            type: symbolItem.type,
            session: '24x7',
            timezone: 'Etc/UTC',
            exchange: symbolItem.exchange,
            minmov: 1,
            pricescale: 100,
            has_intraday: false,
            has_no_volume: true,
            has_weekly_and_monthly: false,
            supported_resolutions: configurationData.supported_resolutions,
            volume_precision: 2,
            data_status: 'streaming'
        };
        console.log('[resolveSymbol]: Symbol resolved', symbolName);
        onSymbolResolvedCallback(symbolInfo);
    },

    getBars: async (symbolInfo, resolution, periodParams, onHistoryCallback, onErrorCallback) => {
        const { from, to, firstDataRequest } = periodParams;
        console.log('[getBars]: Method call', symbolInfo, resolution, from, to);
        const parsedSymbol = parseFullSymbol(symbolInfo);
        const symbolName = `${parsedSymbol.exchange}-${parsedSymbol.fromSymbol}-${parsedSymbol.toSymbol}`;
        try {
            console.log("sys",symbolName)
            const csvData = await fetchCSVData(symbolName);
            let bars = convertToBars(csvData).filter(bar => bar.time >= from && bar.time < to);
            console.log(csvData)
            if (firstDataRequest) {
                lastBarsCache.set(symbolInfo.full_name, bars[bars.length - 1]);
            }
            console.log(`[getBars]: returned ${bars.length} bar(s)`);
            return bars;
            // onHistoryCallback(bars, { noData: bars.length === 0 });
        } catch (error) {
            console.log('[getBars]: Get error', error);
            // onErrorCallback(error);
        }
    },

    // subscribeBars: (symbolInfo, resolution, onRealtimeCallback, subscriberUID, onResetCacheNeededCallback) => {
    //     console.log('[subscribeBars]: Method call with subscriberUID:', subscriberUID);
    //     subscribeOnStream(
    //         symbolInfo,
    //         resolution,
    //         onRealtimeCallback,
    //         subscriberUID,
    //         onResetCacheNeededCallback,
    //         lastBarsCache.get(symbolInfo.full_name)
    //     );
    // },

    // unsubscribeBars: (subscriberUID) => {
    //     console.log('[unsubscribeBars]: Method call with subscriberUID:', subscriberUID);
    //     unsubscribeFromStream(subscriberUID);
    // }
};
