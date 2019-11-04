console.log("main.js OK");

// Ajout des classes bootstrap sur les menus de navigation

var li_bootstrap_nav_menu = document.querySelectorAll("ul.navbar-nav > li");
var a_bootstrap_nav_menu = document.querySelectorAll("ul.navbar-nav > li > a");

// Ajout d'une classe sur balise li
li_bootstrap_nav_menu.forEach(function(element) {
    element.classList.add("nav-item");
});

// Ajout d'une classe sur balise a
a_bootstrap_nav_menu.forEach(function(element) {
    element.classList.add("nav-link");
});



