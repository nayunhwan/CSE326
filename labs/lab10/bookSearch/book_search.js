window.onload = function() {
    $("b_xml").onclick=function(){
    	    //construct a Prototype Ajax.request object
          new Ajax.Request("./books.php", {
            method: "GET",
            parameters: {
              category: getCheckedRadio($$('input'))
            },
            onSuccess: showBooks_XML,
            onFailure: ajaxFailed,
            onException: ajaxFailed,
          });
    }
    $("b_json").onclick=function(){
    	    //construct a Prototype Ajax.request object
          new Ajax.Request("./books_json.php", {
            method: "GET",
            parameters: {
              category: getCheckedRadio($$('input'))
            },
            onSuccess: showBooks_JSON,
            onFailure: ajaxFailed,
            onException: ajaxFailed,
          });
    }
};

function getCheckedRadio(radio_button){
	for (var i = 0; i < radio_button.length; i++) {
		if(radio_button[i].checked){
			return radio_button[i].value;
		}
	}
	return undefined;
}

function showBooks_XML(ajax) {
	alert(ajax.responseText);
  $('books').childElements().forEach(function(child) {
    $(child).remove();
  });

  var books = [...ajax.responseXML.getElementsByTagName("book")];
  books.forEach(function(book) {
    var title = book.getElementsByTagName("title")[0].firstChild.nodeValue;
    var author = book.getElementsByTagName("author")[0].firstChild.nodeValue;
    var year = book.getElementsByTagName("year")[0].firstChild.nodeValue;

    var book = new Element('li').update(`${title}, by ${author} (${year})`);
    $('books').insert(book);
  });
}

function showBooks_JSON(ajax) {
	alert(ajax.responseText);
  $('books').childElements().forEach(function(child) {
    $(child).remove();
  });

  var books = JSON.parse(ajax.responseText).books;
  books.forEach(function(book) {
    console.log(book);
    var title = book.title;
    var author = book.author;
    var year = book.year;

    var book = new Element('li').update(`${title}, by ${author} (${year})`);
    $('books').insert(book);
  })
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
