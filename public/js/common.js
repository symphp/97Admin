$(function () {
    jQuery('.panel .tools .fa-chevron-down').click(function () {
        var el = jQuery(this).parents(".panel").children(".panel-body");
        if (jQuery(this).hasClass("fa-chevron-down")) {
            jQuery(this).removeClass("fa-chevron-down").addClass("fa-chevron-up");
            el.slideUp(200);
        } else {
            jQuery(this).removeClass("fa-chevron-up").addClass("fa-chevron-down");
            el.slideDown(200);
        }
    });

    $('.father').on('click',function () {
        var el = $(this).parents(".panel-success").find(".panel-border .icheckbox_flat-green");
        var ck = $(this).parents(".panel-success").find(".children");
        if($(this).find($(":checkbox")).prop('checked')){
            //取消勾选子菜单
            el.removeClass('checked');
            ck.attr('checked',false)
        } else {
            //勾选所有子菜单
            el.addClass('checked');
            ck.attr('checked',true);
        }
    })

    $('.son').on('click',function () {
        $(this).parents(".panel-success").find(".icheckbox_flat-green:eq(1)").addClass('checked');
    })
})
