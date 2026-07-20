import './bootstrap';
import '../css/app.css';

// Leaflet
import L from 'leaflet';
import 'leaflet/dist/leaflet.css';
window.L = L;

// Chart.js
import Chart from 'chart.js/auto';
window.Chart = Chart;

console.log('✅ Global Risk Monitor Loaded');