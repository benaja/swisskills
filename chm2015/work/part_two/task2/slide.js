/**
 * Swiss Competition 2015 - Trade 17 - Web Design
 *
 * In order to implement the sliding puzzle,
 * you may extend or replace the given code.
 */

document.addEventListener("DOMContentLoaded", function(event) {
    // Here the puzzle.construct function is called and the game begins
    var puzzle = new SlidingPuzzle(
        document.getElementById("puzzle-container")
    );
});

/**
 * Sliding Puzzle Class
 */
function SlidingPuzzle(element)
{
    var puzzle = {},
        puzzleContainer = element;

    puzzle.construct = function()
    {
        // constructor code here...
    }

    // implementation here...

    return puzzle.construct();
}
