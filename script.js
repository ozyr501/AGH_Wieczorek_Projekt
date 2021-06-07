function showDropdown(){
    $("#dropdown").removeClass("hide").addClass("show");
    $("#login i ").removeClass("fas fa-door-open").addClass("fas fa-times");
}

function hideDropdown(){
    $("#dropdown").removeClass("show").addClass("hide");
    $("#login i ").removeClass("fas fa-times").addClass("fas fa-door-open"); 
}