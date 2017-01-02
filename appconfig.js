
// Place third party dependencies in the lib folder
//
// Configure loading modules from the lib directory,
// except 'app' ones, 
requirejs.config({
    "baseUrl": "./js",
    "paths": {
      "app": "../js",
	  "jquery": "lib/jquery-2.1.3",
	  "underscore": "lib/underscore-1.8.3",
	  "text": "lib/text-2.0.1"
    },
    "shim": {
        "jquery": { exports: '$' },
		'text': { exports: 'text'},
		'underscore': {exports: 'underscore'}
    }
});


var pageURL = document.location.href.split("/").slice(-1)[0].split("?")[0];

switch (pageURL.toUpperCase()) {
	case 'EXHIBITIONS.PHP':
		requirejs(["app/exhibitions"]);
		break;
	default:
		requirejs(["app/main"]);
}

