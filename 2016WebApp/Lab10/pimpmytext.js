function all() {
    document.getElementById("check").onchange = hello2;
    document.getElementById("bigbutton").onclick = hello1;
    document.getElementById("snoopbutton").onclick = hello3;
}

window.onload = all;


function hello1(){
    setInterval(function hello() {
        // var checkbox = document.getElementById("check");
        // var isBling = checkbox.checked;
        if ($("check").checked) {
            alert("Hello, world!");
        }
        // $("txtinput").style.fontSize == "24pt";

        if($("txtinput").style.fontSize == "")
        {
            $("txtinput").style.fontSize = "12pt";
        }
        var currentsize = parseInt($("txtinput").style.fontSize);
        currentsize = currentsize + 2;
        $("txtinput").style.fontSize = currentsize + "pt";
    }, 500);
}


function hello2() {
    // alert("check changed");
    if ($("check").checked)
    {
        $("txtinput").style.fontWeight = "bold";
        $("txtinput").style.color = "green";
        $("txtinput").style.textDecoration = "underline";
    }
    else if (!$("check").checked)
    {
        $("txtinput").style.fontWeight = "normal";
        $("txtinput").style.color = "black";
        $("txtinput").style.textDecoration = "none";
    }
}

function hello3() {
    var value = $("txtinput").value;
    var upper = value.toUpperCase();
    var lines = upper.split(".");
    upper = lines.join("-izzle.");

    $("txtinput").value = upper;
}
