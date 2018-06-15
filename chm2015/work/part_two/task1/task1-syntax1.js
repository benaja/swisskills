/**
 * Swiss Competition 2015 - Trade 17 - Web Design
 *
 * JS Errors: Syntax Error 1
 *
 * The following function will preload given images.
 *
 * @todo: Fix the script by adopting the preloadImages function
 */

var images = new Array();

function Image() {
    return {
        src: '',
        preload: function() {
            console.log('loading image ' + this.src);
            // this function will preload the images
            // and is not required for this task.
        }
    }
}

function preloadImages(){
    for (0; i < preloadImages.arguments.length; i++){
        images[i] = new Image();
        images[i].src = preloadImages.arguments[i];
        images[i].preload();
    }
}

preloadImages("logo.jpg", "main_bg.jpg", "body_bg.jpg", "header_bg.jpg");
