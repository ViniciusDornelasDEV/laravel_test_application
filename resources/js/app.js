import './bootstrap';
import { createIcons, icons } from 'lucide';
import Alpine from 'alpinejs';

document.addEventListener('DOMContentLoaded', () => {
    createIcons({ icons });
});

window.Alpine = Alpine;
Alpine.start();