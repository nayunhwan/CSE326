/* CSE326 : Web Application Development
 * Lab 10 - Maze Assignment
 * 
 */

"use strict";

var loser = null;  // whether the user has hit a wall
var start = false;

window.onload = function() {

	var boundaries = $$('.boundary');
	boundaries.forEach(function(boundary) {
		boundary.onmouseover = overBoundary;
	});

	$('start').observe('click', startClick);
	$('end').observe('mouseover', overEnd);
	$(document.body).observe('mouseover', overBody);
};

// called when mouse enters the walls; 
// signals the end of the game with a loss
function overBoundary(event) {
	if (!loser && start) {
		loser = true;
		start = false;
		var boundaries = $$('.boundary');
			boundaries.forEach(function(boundary) {
				boundary.addClassName('youlose');
			});
		alert('You lose! :(');
		$('status').update('You lose!');
	}
}

// called when mouse is clicked on Start div;
// sets the maze back to its initial playable state
function startClick() {
	loser = false;
	start = true;
	var boundaries = $$('.boundary');
	boundaries.forEach(function(boundary) {
		boundary.removeClassName('youlose');
	});
	$('status').update('Click the \"S\" to begin.');
}

// called when mouse is on top of the End div.
// signals the end of the game with a win
function overEnd() {
	if (!loser && start) {
		loser = true;
		start = false;
		alert('You Win! :)');
		$('status').update('You win!');
	}
}

// test for mouse being over document.body so that the player
// can't cheat by going outside the maze
function overBody(event) {
	if (!loser && start && event.element() === $(document.body)) {
		overBoundary();
	}
}



