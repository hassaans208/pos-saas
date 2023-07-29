import './bootstrap';

import Alpine from 'alpinejs';

// import 'laravel-datatables-vite';

window.Alpine = Alpine;

Alpine.start();


$('button[type="submit"]').click(function () {
    let spinner = ` <svg class="animate-spin h-4 w-4 rounded-full bg-transparent border-2 border-transparent border-opacity-50" style="border-right-color: white; border-top-color: white;" viewBox="0 0 24 24"></svg>`
    $(this).children('#button').prepend(spinner)
    $(this).attr('disabled', true);
    $(this).children('#button').children('div').html('Saving...');
})
