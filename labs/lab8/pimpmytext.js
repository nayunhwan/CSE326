
"use strict";

window.onload = function() {
	document.getElementById("biggerBtn").onclick = helloWorld;
	document.getElementById("check").onchange = bling;
	document.getElementById("snoopifyBtn").onclick = snoopify;
	document.getElementById("igpayBtn").onclick = igpay;
	document.getElementById("malkovitchBtn").onclick = malkovitch;
}

function helloWorld() {
	alert("Hello, world!");	
	// $("textInput").style.fontSize = "24pt";
	setInterval(function() {
		if ($("textInput").style.fontSize == "") {
		   $("textInput").style.fontSize = "12pt";
	    }

	    $("textInput").style.fontSize = parseInt($("textInput").style.fontSize) + 2 + "pt";	
	}, 500);

}

function bling() {
	alert("Bling");
	if ($("check").checked) {
		$("textInput").style.fontWeight = "bold";
		$("textInput").style.color = "green";
		$("textInput").style.textDecoration = "underline";
		$(document.body).style.backgroundImage = "url('http://selab.hanyang.ac.kr/courses/cse326/2017/labs/images/8/hundred.jpg')"
	} else {
		$("textInput").style.fontWeight = "normal";
		$("textInput").style.color = "black";
		$("textInput").style.textDecoration = "none";
		$(document.body).style.backgroundImage = "none"
	}
}

function snoopify() {
	var val = $("textInput").value.toUpperCase().split(".").join("-izzle.");
	$("textInput").value = val;
}

function igpay() {
	var val = $("textInput").value;
	var tmpVal = val;
	for (var i = 0; i < val.length; i++) {
		var vowel = ["a", "e", "i", "o", "u"];
		if (vowel.indexOf(val[i].toLowerCase()) == -1) {
			tmpVal = tmpVal.slice(1) + val[i];
		} else {
			break;
		}
	}
	$("textInput").value = tmpVal + 'ay';
}

function malkovitch() {
	var val = $("textInput").value;
	if (val.length >= 5) {
		$("textInput").value = 'malkovitch';
	}
}