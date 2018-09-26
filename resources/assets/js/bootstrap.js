
// window._ = require('lodash');
window.Popper = require('popper.js').default;

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
    require('datatables.net-bs4')();
} catch (e) {}

(function ($) {
    if ($('#voters-table').length) {
        window.votersTable = $('#voters-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: window.votersDatatablesUrl,
            columns: [
                {data: 'id', name: 'voters.id'},
                {data: 'name', name: 'voters.name'},
                {data: 'classroom.name', name: 'classroom.name'},
                {data: 'access_code', name: 'voters.access_code', searchable: false, sortable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });

        $('.filter-classroom').on('change', function(e) {
            if (this.value === 'all') {
                window.votersTable.column(2).search('').draw();
            } else {
                window.votersTable.column(2).search(this.value).draw();
            }
        });

        $('#edit-voter-modal').on('show.bs.modal', function(e) {
            let $button = $(e.relatedTarget);
            let $modal = $(this);
            let voter = $button.data('voter');

            $modal.find('input[name="id"]').val(voter.id);
            $modal.find('input[name="name"]').val(voter.name);
            $modal.find('select[name="classroom_id"] option[value='+voter.classroom_id+']').prop('selected', true);
            $modal.find('input[name="access_code"]').val(voter.access_code);
        });
    }
})(jQuery);

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

// window.axios = require('axios');

// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

// let token = document.head.querySelector('meta[name="csrf-token"]');
//
// if (token) {
//     window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
// } else {
//     console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
// }

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });
