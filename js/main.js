$(document).ready(function(){
    updateloginname();
$("#loginform").submit(function (e){
    var values = $(this).serialize();
    e.preventDefault(); 
    $.ajax({
        type: 'post',
        url: '../PHPstuff/login.php',
        data: values,
        success: function () {
            updateloginname();
            updateErr();
        }
    });

});


$("#regform").submit(function (e){
    var values = $(this).serialize();
    e.preventDefault(); 
    $.ajax({
        type: 'post',
        url: '../PHPstuff/Register.php',
        data: values,
        success: function () {
            updateErr();

        }
    });

});

$("#logout").submit(function (e){
    var values = $(this).serialize();
    e.preventDefault(); 
    $.ajax({
        type: 'post',
        url: '../PHPstuff/logout.php',
        data: values,
        success: function () {
            updateloginname();
            updateErr();
        }
    });

});


});

function updateloginname() {
    var LoginName = getCookie("Username");
    if(LoginName.length == 0){
        LoginName = "Guest";
    } 
    $("#loginname").html(LoginName);
}

function updateErr() {
    var err= getCookie("err");

    console.log(err.length + "/" + err);
    err = err.split('+').join(' ');
    $("#err").html("this is an error message : " + err);
}



function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}