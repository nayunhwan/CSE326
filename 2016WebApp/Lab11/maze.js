/**
 * Created by JulianPro on 2016. 12. 1..
 */

/* Lab 11 - Maze game
*
*/
//use strict
"use strict";
var loser = null;  // whether the user has hit a wall
var end = false;

window.onload = function() {
    end = false;
    var boundary = $$("#maze div.boundary");
    for(var i = 0; i < boundary.length; i++) {
        boundary[i].onmouseover = function () {
            overBoundary(event);
        };
    }
    var endpoint = $("end");
    endpoint.onmouseover = function(){overEnd();};

    var startbtn = $("start");
    startbtn.onclick = function(){startClick();};

    var body = document.body;
    body.observe("mouseover", overBody);

    // document.onmouseover = function(){overBody()};
};

// called when mouse enters the walls;
// signals the end of the game with a loss
function overBoundary(event) {
    if(end === false && loser === false)
    {
        loser = true;
        var bound = $$("#maze div.boundary");
        for(var j = 0 ; j < bound.length; j++){
            bound[j].addClassName("youlose");
        }
        if(loser === true) {
            $("status").textContent = "youlose :)";
        }
        end = true;
    }
}

// called when mouse is clicked on Start div;
// sets the maze back to its initial playable state
function startClick() {
    var bound = $$("#maze div.youlose");
    for(var i = 0 ; i < bound.length; i++){
        bound[i].removeClassName("youlose");
    }

    loser = false;
    end = false;
    $("status").textContent = "Click the \"S\" to begin.";
}

// called when mouse is on top of the End div.
// signals the end of the game with a win
function overEnd() {
    if(loser === false && end === false) {
        $("status").textContent = "you win :)";
        end = true;
    }
}

// test for mouse being over document.body so that the player
// can't cheat by going outside the maze
function overBody(event) {
    if(loser === false && end === false && event.element()==document.body)
    {
        overBoundary();
    }
}
