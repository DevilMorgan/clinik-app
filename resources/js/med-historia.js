require('./bootstrap');

require('alpinejs');

window.Popper = require('popper.js').default;

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap/dist/js/bootstrap.bundle.min');
    //window.Swal = require('sweetalert2/src/sweetalert2');
    require('sweetalert2/src/sweetalert2');
} catch (e) {}

