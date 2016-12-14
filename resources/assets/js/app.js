
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

    /* CREATE & EDITION PAGE - Members management*/
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
        $('#members option').each(function(){
            if(this.value == option.val()) {
                exist = true;
            }
        });
        if(!exist) {
            $("#members").append(option);
        }
    });
    $("#removeMember").click(function(){
        $("#members option:selected").remove();
    });

    $('#form_group').on('submit', function(){
        $('#members option').prop('selected', true);
    });

    /* GROUP PROFILE PAGE */
    $(".group-profile .btn-pref .btn").click(function () {
        $(".group-profile .btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
        // $(".tab").addClass("active"); // instead of this do the below
        $(this).removeClass("btn-default").addClass("btn-primary");
    });
});