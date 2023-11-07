import "./bootstrap";
import {
    Livewire,
    Alpine,
} from "../../vendor/livewire/livewire/dist/livewire.esm";
import focus from "@alpinejs/focus";

// import Alpine from "alpinejs";

// window.Alpine = Alpine;

// Alpine.start();
Alpine.plugin(focus);

Livewire.start();
