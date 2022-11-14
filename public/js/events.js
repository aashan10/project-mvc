class ViperEvents {
    $events = [];

    addEventListener(eventName, callback) {
        this.$events[eventName] = callback;
        document.addEventListener('ViperEvents.' + eventName, callback);
    }

    removeEventListener(eventName, listener) {
        document.removeEventListener('ViperEvents.' + eventName, listener);
    }
}

const Events = new ViperEvents();