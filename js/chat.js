$(document).ready(function(){
    var ReceiverID;
    var SenderID; //get these from somewhere later
    UpdateChat();
    Contacts();

    $("#sendmessageform").submit(function (e){
        var values = $(this).serialize();
        e.preventDefault(); 
        $.ajax({
            type: 'post',
            url: '../PHPstuff/sendmessage.php',
            data: values,
            success: function () {
                UpdateChat();
                document.getElementById("u1").value = "";
            }
        });

    });
    $("#conbody").submit(function (e){
        var values = $(this).serialize();
        e.preventDefault(); 
        $.ajax({
            type: 'post',
            url: '../PHPstuff/changechat.php',
            data: values,
            success: function () {
                UpdateChat();
            }
        });

    });

});


function UpdateChat(){ //need to be run every 1 sec or something 

    //run a fetch php script from php to throw all the messages into an array and insert to cookies
    
    $.ajax({
        type: 'post',
        url: '../PHPstuff/updatemessage.php',

        success: function (data) {
            $("#msgbody").html(data);
        }
    });
}

function Contacts(){
    $.ajax({
        type: 'post',
        url: '../PHPstuff/contacts.php',

        success: function (data) {
            $("#conbody").html(data);
        }
    });

}


function refreshData()
{
    x = 1;
    UpdateChat();
    setTimeout(refreshData, x*1000);
}
refreshData();