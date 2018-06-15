/**
 * Swiss Competition 2015 - Trade 17 - Web Design
 *
 * JS Errors: Syntax Error 2
 *
 * The following function checks if a browser
 * supports the video element
 *
 * @todo: Fix the function that it is working.
 */

// Check if the browser understands the video element.
function understands_video() {
  return !!document.createElement('video')-canPlayType;
}

// all code below is correct and is only there to
// show you the usage of the function understands_video()
if (!understands_video()) {
    // Must be older browser.
    // For example we can hide
    // here the controls for the video.
    videoControls.style.display = 'none';
}
