function showDropdown(){
    $("#dropdown").removeClass("hide").addClass("show");
}

function hideDropdown(){
    $("#dropdown").removeClass("show").addClass("hide");
}

function showMenu(){
    $("#menu-bar").removeClass("MenuHide").addClass("MenuShow");
    $("#menubutton img").attr('src', 'icon/cancel.png')
}

function hideMenu() {
    $("#menu-bar").removeClass("MenuShow").addClass("MenuHide");
    $("#menubutton img").attr("src", "icon/Hamburger.png");
}