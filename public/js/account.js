/**
 * Created by nicolas on 30.11.16.
 */

function getOverview(id){
    $.ajax({
        type: "GET",
        url: '/account/overview/' + id,
        success: function(data){
            $('#div1').html(data);
        }
    });
}

function getAccountSettings(){
    $.ajax({
        type: "GET",
        url: '/account/accountSettings',
        success: function(data){
            $('#div1').html(data);
        }
    });
}

function deleteAccount(){
    $.ajax({
        type: "GET",
        url: '/account/delete',
        success:function(data){
            $('#div1').html(data);
        }
    });
}

function getHelp(){
    $.ajax({
        type: "GET",
        url: '/account/help',
        success: function(data){
            $('#div1').html(data);
        }
    });
}

function getResetPass(){
    $.ajax({
        type: "GET",
        url: '/account/resetPass',
        success: function (data) {
            $('#div1').html(data);

        }
    });
}

