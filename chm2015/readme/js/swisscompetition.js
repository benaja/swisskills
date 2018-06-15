/*global jQuery, window */
(function ($, window) {
    'use strict';
    $(function () {
        function setMark(obj, change) {
            var id    = $(".masthead .nav-pills .active a").text() + "-" + obj.parents(".row").index() + "-" + obj.parent().index() + "-" + obj.index(),
                badge = obj.find('.badge'),
                value = '';

            console.log(id);

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




        // I just liked to name it like this, it is just great as it is :D
        var allGood = true;

        // ah and the code here, no no no, it could not win a contest :) but hey, it works
        $.each(['prename', 'surname', 'email', 'birthdate', 'browser', 'source-code-editors'], function(index, key) {
            var fieldTr = $("#competitor-js tr[data-value='" + key + "']");

            if ("undefined" !== typeof competitorInformation[key] && '' !== $.trim(competitorInformation[key]) && 'YYYY-MM-DD' !== $.trim(competitorInformation[key])) {
                fieldTr.removeClass('danger').addClass('success');
                fieldTr.children("td:last").html($.trim(competitorInformation[key]));
            } else {
                allGood = false;
            }
        });

        var fieldTr = $("#competitor-js tr[data-value='school-company']");
        var schoolCompany = [];

        if ("undefined" !== typeof competitorInformation['school'] && '' !== $.trim(competitorInformation['school'])) {
            schoolCompany.push($.trim(competitorInformation['school']));
        }
        if ("undefined" !== typeof competitorInformation['company'] && '' !== $.trim(competitorInformation['company'])) {
            schoolCompany.push($.trim(competitorInformation['company']));
        }

        if (0 < schoolCompany.length) {
            fieldTr.removeClass('danger').addClass('success');
            fieldTr.children("td:last").html(schoolCompany.join(' / '));
        } else {
            allGood = false;
        }

        // TODO before Competition:
        // false === allGood instead of false
        if (false === allGood) {
            $('.container-narrow .sm-content').addClass('hide');
            $('#task-zero').removeClass('hide');
        }
    });
}(jQuery, window));