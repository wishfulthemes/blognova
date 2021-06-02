;(function ($) {
  $(".menu-item-has-children .submenu-icon").on("click", function () {
    $(this).siblings(".sub-menu").toggleClass("show")
    console.log("this function works")
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
