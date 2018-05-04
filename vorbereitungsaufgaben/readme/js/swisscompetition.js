/*global jQuery, window */
(function ($, window) {
    'use strict';
    $(function () {
        function setMark(obj, change) {
            var id    = obj.data('markingId'),
                badge = obj.find('.badge'),
                value = '';

            if (undefined === id) {
                return;
            }

            value = $.parseJSON(window.sessionStorage.getItem(id));

            if (true === change) {
                if (true === value) {
                    window.sessionStorage.removeItem(id);
                    value = false;
                } else {
                    window.sessionStorage.setItem(id, true);
                    value = true;
                }
            }

            if (true === value) {
                badge.addClass('badge-success');
            } else {
                badge.removeClass('badge-success');
            }
        }

        $('#colorSchemes a:last').tab('show');

        $('.marking .list-group-item').each(function () {
            setMark($(this), false);
        });

        $('.marking .list-group-item').click(function () {
            setMark($(this), true);
        });
    });
}(jQuery, window));