$(document).ready(function() {

    function resetAllSelections() {
        $('#toh').removeClass('brick-moving');
        $('#toh').find('.brick-base').removeClass('brick-base');
        $('#toh').find('span.active').removeClass('active');
    };

    $('#toh .brick.selectable span').bind('click.toh', function(e) {
        e.preventDefault();
        e.stopPropagation();
        var el = $(this);

        if (el.hasClass('active')) {
            el.removeClass('active');
            el.parents('.stack').removeClass('brick-base');
            $('#toh').removeClass('brick-moving');

            $('#toh #message').text('Select a brick by clicking on it.');
        } else {
            resetAllSelections();
            el.addClass('active');
            el.parents('.stack').addClass('brick-base');
            $('#toh').addClass('brick-moving');

            $('#toh #message').text('Click on a stack to place the brick.');
        }
    });

    $('#toh .stack').bind('click.toh', function(e) {
        e.preventDefault();
        e.stopPropagation();

        var activeBrick = $('#toh .brick.selectable .active').parent();

        // only continue when a brick was selected
        if (0 >= activeBrick.length) {
            return;
        }

        var el = $(this);
        var activeBrickStack = activeBrick.parents('.stack');
        var brickHeight = activeBrickStack.find('.brick').length;

        var selectedStackId = el.index();
        var activeStackId = activeBrickStack.index();
        var activeBrickId = brickHeight - activeBrick.index() - 1;

        if (activeStackId !== selectedStackId) {
            var distance = el.index() - activeBrickStack.index();

            var direction = 'right';
            if (0 > distance) {
                direction = 'left';
                distance = distance * (-1);
            }

            var form = $('#toh #move');

            form.find('[name="fromStackId"]').val(activeStackId);
            form.find('[name="fromBrickId"]').val(activeBrickId);
            form.find('[name="direction"]').val(direction);
            form.find('[name="steps"]').val(distance);

            form.submit();
        }
    });

});