function showDropdown(){
    $("#dropdown").removeClass("hide").addClass("show");
    $("#ddlogin").attr("src", "icon/cancel.png");
}

function hideDropdown(){
    $("#dropdown").removeClass("show").addClass("hide");
    $("#ddlogin").attr("src", "icon/login.png");
}