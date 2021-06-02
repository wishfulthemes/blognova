;(function ($) {
  $(".menu-item-has-children .submenu-icon").attr("tabindex", "0")
  $(".menu-item-has-children .submenu-icon").on("click", function () {
    $(this).siblings(".sub-menu").toggleClass("show")
    console.log("this function works")
  })

  $(".menu-item-has-children .submenu-icon").on("keypress", function (e) {
    console.log("this functionworks on keypress")
    var keycode = e.keyCode ? e.keyCode : e.which
    if (keycode == "13") {
      $(this).siblings(".sub-menu").toggleClass("show")
    }
  })
  $(".sub-menu .menu-item:last-child").on("focusout", function () {
    $(this).parent().removeClass("show")
  })
  $(".sub-menu").on("focusout", function () {
    $(this).children("sub-menu").removeClass("show")
  })

  var nextMenuItem = $(".menu-item-has-children").siblings("menu-item")
  console.log(nextMenuItem)
  nextMenuItem.on("mousein", function () {
    console.log("this function works on focus")
  })
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
