import './bootstrap';
import { createIcons, icons } from 'lucide';
import Alpine from 'alpinejs';
import 'trix';
import 'trix/dist/trix.css';

window.Alpine = Alpine;
Alpine.start();

Livewire.hook('component.init', ({ el, component }) => {
    createIcons({ icons })
})


Livewire.hook('morph.updated', ({ el, component }) => {
    createIcons({ icons })
})
