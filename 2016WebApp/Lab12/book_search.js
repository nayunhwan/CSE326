window.onload = function() {
    $("b_xml").onclick=function(){
    	    //construct a Prototype Ajax.request object
		new Ajax.Request("books.php", {
			method: "get",
			parameters: {category: getCheckedRadio($$("input"))},
			onFailed: ajaxFailed,
			onSuccess: showBooks_XML
		});
    }

    $("b_json").onclick=function(){
    	    //construct a Prototype Ajax.request object
		new Ajax.Request("books_json.php", {
			method: "get",
			parameters: {category: getCheckedRadio($$("input"))},
			onFailed: ajaxFailed,
			onSuccess: showBooks_JSON
		});
    }
};

function getCheckedRadio(radio_button)
{
	for (var i = 0; i < radio_button.length; i++){
		if(radio_button[i].checked){
			return radio_button[i].value;
		}
	}
	return undefined;
}

function showBooks_XML(ajax) {

    var book = ajax.responseXML.getElementsByTagName("book");

    var ul = $("books");
    var l = ul.childElements();
    // l의 갯수만큼 다시 리셋해준다.
    for (var i = 0; i < l.length; i++) {
    	l[i].remove();
    }

    for (var i = 0 ; i < book.length; i++)
	{
        var title = book[i].getElementsByTagName("title")[0].firstChild.nodeValue;
        var author = book[i].getElementsByTagName("author")[0].firstChild.nodeValue;
        var year = book[i].getElementsByTagName("year")[0].firstChild.nodeValue;

        var li = document.createElement("li");
        li.innerHTML = title + ", by " + author + " [" + year + "]";
        ul.appendChild(li);
	}
}

function showBooks_JSON(ajax)
{
    var ul = $("books");
    var l = ul.childElements();
    // l의 갯수만큼 다시 리셋해준다.
    for (var i = 0; i < l.length; i++) {
        l[i].remove();
    }
    var data = JSON.parse(ajax.responseText).books;

    for (var i = 0; i < data.length; i++) {
        var li = document.createElement("li");
        li.innerHTML = data[i].title + ", by " +
            data[i].author + " (" + data[i].year + ")";
       	ul.appendChild(li);
    }
}

function ajaxFailed(ajax, exception) {
	var errorMessage = "Error making Ajax request:\n\n";
	if (exception) {
		errorMessage += "Exception: " + exception.message;
	} else {
		errorMessage += "Server status:\n" + ajax.status + " " + ajax.statusText +
		                "\n\nServer response text:\n" + ajax.responseText;
	}
	alert(errorMessage);
}
