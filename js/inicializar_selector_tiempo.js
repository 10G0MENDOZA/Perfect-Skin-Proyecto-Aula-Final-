document.addEventListener('DOMContentLoaded', function () {
    flatpickr(".flatpickr-time", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "h:i K",
        time_24hr: false
    });
});