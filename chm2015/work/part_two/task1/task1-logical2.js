/**
 * Swiss Competition 2015 - Trade 17 - Web Design
 *
 * JS Errors: Logical Error 2
 *
 * This module adds the function doNothing to a given context.
 * The module is defined correctly but somehow it is not working.
 *
 * @todo: Fix the module that it is working.
 */

(function (context) {
    "use strict";

    function doNothing() {
        return (function (notDefined) {
            return notDefined;
        }());
    }

    if (context.doNothing === "undefined") {
        context.doNothing = doNothing;
    } else {
        throw "`doNothing` was already defined.";
    }
}(this));
