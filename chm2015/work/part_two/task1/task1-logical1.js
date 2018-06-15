/**
 * Swiss Competition 2015 - Trade 17 - Web Design
 *
 * JS Errors: Logical Error 1
 *
 * The following function will toggle all checkboxes
 * inside a html element with the given id.
 *
 * @todo: The checkboxes are not changing. Fix the error by
 *        adding, deleting or changing only one character.
 */

function toggle_checkboxes(id) {
    if (!document.getElementById){ return; }
    if (!document.getElementsByTagName){ return; }

    var inputs = document.getElementById(id).getElementsByTagName("input");
    for(var x=0; x < inputs.length; x++) {
        if (inputs[x].type == 'checkbox'){
            inputs[x].checked = inputs[x].checked;
        }
    }
}
