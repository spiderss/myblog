$(function () {
    pageInitModule.setWidth();
    pageInitModule.setSidebar();
    pageInitModule.setCarousel();
})
$(window).resize(function () {
    pageInitModule.setWidth();
})
$(window).scroll(function () {
    pageInitModule.setScrollToTop();
});

/*
 * init page when page load
 */
var pageInitModule = (function (mod) {
    mod.setCarousel = function () {
        try {
            $('.carousel').hammer().on('swipeleft', function () {
                $(this).carousel('next');
            });
            $('.carousel').hammer().on('swiperight', function () {
                $(this).carousel('prev');
            });
        } catch (e) {
            console.log("you mush import hammer.js and jquery.hammer.js to let the carousel can be touched on mobile");
        }
    };
    mod.setWidth = function () {
        if ($(window).width() < 768) {
            $(".sidebar").css({ left: -220 });
            $(".all").css({ marginLeft: 0 });
        } else {
            $(".sidebar").css({ left: 0 });
            $(".all").css({ marginLeft: 220 });
        }
    };
    mod.setScrollToTop = function () {
        var top = $(window).scrollTop();
        if (top < 60) {
            $('#goTop').hide();
        } else {
            $('#goTop').show();
        }
    };
    mod.setSidebar = function () {
        $('[data-target="sidebar"]').click(function () {
            var asideleft = $(".sidebar").offset().left;
            if (asideleft == 0) {
                $(".sidebar").animate({ left: -220 });
                $(".all").animate({ marginLeft: 0 });
            }
            else {
                $(".sidebar").animate({ left: 0 });
                $(".all").animate({ marginLeft: 220 });
            }
        });
        $(".has-sub>a").click(function () {
            $(this).parent().siblings().find(".sub-menu").slideUp();
            $(this).parent().find(".sub-menu").slideToggle();
        })
        var _strcurrenturl = window.location.href.toLowerCase();
        $(".navbar-nav a[href],.sidebar a[href]").each(function () {
            var href = $(this).attr("href").toLowerCase();
            var isActive = false;
            $(".breadcrumb>li a[href]").each(function (index) {
                if (href == $(this).attr("href").toLowerCase()) {
                    isActive = true;
                    return false;
                }
            })
            if (_strcurrenturl.indexOf(href) > -1 || isActive) {
                $(this).parent().addClass("active");
                if ($(this).parents("ul").attr("class") == "sub-menu") {
                    $(this).parents("ul").slideDown();
                    $(this).parents(".has-sub").addClass("active");
                }
            }
        })
    }
    return mod;
})(window.pageInitModule || {});

/*以上为布局文件 不能删除 20180418*/
$(function(){
    /*退出*/
    $(".ajax-logout").click(function () {
        console.log("点击了")
        $.get("/admin/admins/logout",{},function(data){
            alert("退出成功")
        })
    })
    /*退出 20180502*/
    /*ajax 删除*/

    $(".ajax-delete").click(function(){
        var url=$(this).attr("href");
        if(confirm("你确定要删除吗"))
        {
            $.get(url,{},function (data) {
                if(data.code==1)
                {
                    alert(data.msg);
                    setTimeout(function () {
                        window.location.reload();
                    },1500)
                }else{
                    alert(data.msg);
                }
            })
        }

        return false;
    })

})



