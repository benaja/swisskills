/**
 * Swiss Competition 2015 - Trade 17 - Web Design
 *
 * JS Errors: Logical Error 3
 *
 * The class Overlay will generate an overlay with
 * a given content. The content is wrapped in a div
 * by default but a custom overlay element can be
 * used for it.
 *
 * @todo: Fix the class by changing only one line.
 */

Overlay = function(content, overlayElement) {
    var overlay = {};
        auto_show = true,
        el = overlayElement,
        root = document.body;

    overlay.show = function() {
        if("undefined" === typeof el) {
            var el = document.createElement('div');
        }

        el.style.borderStyle = "none";
        el.style.borderWidth = "0px";
        el.style.position = "absolute";
        el.style.zIndex = 100;
        el.innerHTML = content;

        overlay.el = el;

        // append the overlay to the body
        root.appendChild(overlay.el);
    };

    overlay.remove = function() {
        overlay.el.parentNode.removeChild(overlay.el);
        overlay.el = null;
    }

    return overlay;
};

// all code below is correct and is only there to
// show you the usage of the Overlay class
var content = 'Lorem ipsum Minim aliqua sint do mollit ullamco enim sed Ut proident anim nostrud id occaecat nostrud dolore proident ex officia exercitation ut fugiat aliquip dolor irure culpa non magna do dolor eiusmod magna sint magna nulla laboris nisi exercitation.';
var overlay = new Overlay(content, document.createElement('span'));
overlay.show();
