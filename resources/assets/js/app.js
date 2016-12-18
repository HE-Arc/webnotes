
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: 'body'
});

/**
 * WEBNOTE JS
 */
$(function() {
    /* ICON UPLOADER */
    $("#icon-edit").click(function () {
        $("#input-icon-edit").click();
    });
    // Create the preview image
    $("#input-icon-edit").change(function (){
        var img = $('#icon-edit');
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            img.attr('src', e.target.result);
        };
        reader.readAsDataURL(file);
    });

    /* CREATE & EDIT PAGE - Members management*/
    $("#searchMember").keyup(function () {
        var jqxhr = $.getJSON( "/searchusers", {'term' : $("#searchMember").val()}, function(data) {
            $("#foundedMembers").empty();
            $.each(data, function (i, item) {
                $("#foundedMembers").append(new Option(item.name, item.id));
            });
        });
    });
    $("#addMember").click(function(){
        var option = $("#foundedMembers option:selected");
        var exist = false;
        $('#members-list .list-group-item').each(function(){
            if(this.id == option.val()) {
                exist = true;
            }
        });
        if(!exist) {
            $("#members-list").append(
                "<div id='" + option.val() + "' class='list-group-item'>"
                + "<div class='media-body'>"
                + "<h4 class='media-heading'>" + option.text() + "</h4>"
                + "<div class='checkbox'>"
                + "<label>"
                + "<input class='adminGroup' type='checkbox'>Administrateur"
                + "</label>"
                + "</div>"
                + "</div>"
                + "<div class='media-right media-middle'>"
                + "<button type='button' class='btn btn-default removeMember'><span class='glyphicon glyphicon-remove-circle' aria-hidden='true'></span></button>"
                + "</div>"
                + "</div>"
            );
        }
    });

    $(".removeMember").click(function(){
        this.closest(".list-group-item").remove();
    });

    $('#form_group').submit(function(){
        // e.preventDefault();
        var members = new Array();
        var membersPermission = new Array;
        var i = 0;
        $('#members-list .list-group-item').each(function(){
            members[i] = this.id;
            membersPermission[i] = $(this).find('.adminGroup').prop("checked") ? 1 : 0;
            i = i + 1;
        });
        $("#members").val(JSON.stringify(members));
        $("#membersPermission").val(membersPermission);
    });

    /* GROUP :: PROFILE PAGE */
    $(".group-profile .btn-pref .btn").click(function () {
        $(".group-profile .btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
        $(this).removeClass("btn-default").addClass("btn-primary");
    });

    /* NOTE :: CREATE & EDIT PAGE - Groups management*/
    $("#searchGroup").keyup(function () {
        var jqxhr = $.getJSON( "/searchgroups", {'term' : $("#searchGroup").val()}, function(data) {
            $("#foundedGroups").empty();
            $.each(data, function (i, item) {
                $("#foundedGroups").append(new Option(item.name, item.id));
            });
        });
    });
    $("#addGroup").click(function(){
        var option = $("#foundedGroups option:selected");
        var exist = false;
        $('#groups-list .list-group-item').each(function(){
            if(this.id == option.val()) {
                exist = true;
            }
        });
        if(!exist) {
            $("#groups-list").append(
                "<div id='" + option.val() + "' class='list-group-item'>"
                + "<div class='media-body'>"
                + "<h4 class='media-heading'>" + option.text() + "</h4>"
                + "<div class='checkbox'>"
                + "<label>"
                + "<input class='adminGroup' type='checkbox'>Administrateur"
                + "</label>"
                + "</div>"
                + "</div>"
                + "<div class='media-right media-middle'>"
                + "<button type='button' class='btn btn-default removeGroup'><span class='glyphicon glyphicon-remove-circle' aria-hidden='true'></span></button>"
                + "</div>"
                + "</div>"
            );
        }
    });

    $(".removeGroup").click(function(){
        this.closest(".list-group-item").remove();
    });

    $('#form_note').submit(function(){
        // e.preventDefault();
        var members = new Array();
        var membersPermission = new Array();
        var groups = new Array();
        var groupsPermission = new Array();
        var i = 0;
        $('#members-list .list-group-item').each(function(){
            members[i] = this.id;
            membersPermission[i] = $(this).find('.adminGroup').prop("checked") ? 1 : 0;
            i = i + 1;
        });
        $("#members").val(JSON.stringify(members));
        $("#membersPermission").val(membersPermission);

        i = 0;
        $('#groups-list .list-group-item').each(function(){
            groups[i] = this.id;
            groupsPermission[i] = $(this).find('.adminGroup').prop("checked") ? 1 : 0;
            i = i + 1;
        });

        $("#groups").val(JSON.stringify(groups));
        $("#groupsPermission").val(groupsPermission);
    });
//
//     /* NOTE :: CREATE & EDIT PAGE */
//     // Pour la rechercher d'utilisateurs
//     $("#searchMemberNote").keyup(function () {
//         var jqxhr = $.getJSON( "/searchusers", {'term' : $("#searchMemberNote").val()}, function(data) {
//             $("#foundedMembersNote").empty();
//             $.each(data, function (i, item) {
//                 $("#foundedMembersNote").append(new Option(item.name, item.id));
//             });
//         });
//     });
//
//     $("#addMemberNote").click(function(){
//         var option = $("#foundedMembersNote option:selected");
//         var exist = false;
//         $('#members option').each(function(){
//             if(this.value == option.val()) {
//                 exist = true;
//             }
//         });
//         if(!exist) {
//             $("#members").append(option);
//         }
//     });
//
//     $("#removeMemberNote").click(function(){
//         $("#members option:selected").remove();
//     });
//
//     // Pour la recherche de groupes
//     $("#searchGroupNote").keyup(function () {
//         var jqxhr = $.getJSON( "/searchgroups", {'term' : $("#searchGroupNote").val()}, function(data) {
//             $("#foundedGroupNote").empty();
//             $.each(data, function (i, item) {
//                 $("#foundedGroupNote").append(new Option(item.name, item.id));
//             });
//         });
//     });
//
//     $("#addGroupNote").click(function(){
//         var option = $("#foundedGroupNote option:selected");
//         var exist = false;
//         $('#groups option').each(function(){
//             if(this.value == option.val()) {
//                 exist = true;
//             }
//         });
//         if(!exist) {
//             $("#groups").append(option);
//         }
//     });
//
//     $("#removeGroupNote").click(function(){
//         $("#groups option:selected").remove();
//     });
//
//     $('#form_note').on('submit', function(){
//         $('#members option').prop('selected', true);
//         $('#groups option').prop('selected', true);
//     });
});