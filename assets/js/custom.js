;(function ($) {
  //make dropdown icons tabbable
  $(".menu-item-has-children .submenu-icon").attr("tabindex", "0")
  //dristibute a speical class for the top level menu item
  //toggle submenu on click
  $(".menu-item-has-children .submenu-icon").on("click", function () {
    $(this).siblings(".sub-menu").toggleClass("show")
    // console.log("this function works")
  })
  // //show submenu on enter keypress
  $(".menu-item-has-children .submenu-icon").on("keypress", function (e) {
    console.log("this functionworks on keypress")
    var keycode = e.keyCode ? e.keyCode : e.which
    if (keycode == "13") {
      $(this).siblings(".sub-menu").toggleClass("show")
    }
  })
  // //hide submenu on reverse selection
  $(".menu-item-has-children a").on("focusin", function () {
    $(this).siblings(".sub-menu").removeClass("show")
    // var menuItem = $(this).parent().siblings(".menu-item")
    // menuItem.children(".sub-menu").removeClass("show")
    //$(this).parent().siblings(".menu-item").children(".sub-menu").removeClass("show")
    // console.log("this function works on menu item has children")
  })
  // $($(".menu-item a")).on("focusin", function () {
  //   var topLevelMenu = $(".menu-item a").siblings().find(".menu-item-has-children")
  //   //console.log(topLevelMenu)
  //   console.log(topLevelMenu)
  //   if (topLevelMenu) {
  //     console.log("top level menu")
  //   }
  // })
  // // $(".sub-menu .menu-item:last-child").on("focusout", function () {
  // //   $(this).parent().removeClass("show")
  // // })
  // // $(".sub-menu li").on("focusout", function () {
  // //   $(this).children("sub-menu").removeClass("show")
  // //   console.log("this function also workssssssssdjflasdkghl")
  // // })
  // var nextMenuItem = $(".menu-item-has-children").siblings("menu-item")
  // console.log(nextMenuItem)
  // nextMenuItem.on("mousein", function () {
  //   $(this).siblings(".menu-item-has-children sub-menu").removeClass("show")
  // })
  // $(".menu-item:not(:)")

  const $menu = $(".sub-menu")

  $(document).mouseup((e) => {
    if (
      !$menu.is(e.target) && // if the target of the click isn't the container...
      $menu.has(e.target).length === 0
    ) {
      // ... nor a descendant of the container
      $menu.removeClass("show")
    }
  })
})(jQuery)
