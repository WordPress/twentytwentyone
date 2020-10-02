( function() {
	var links = document.querySelectorAll('.more');

	links.forEach( link => {
		var post = link.previousElementSibling;
		post.appendChild(link);
	} );
} )();
