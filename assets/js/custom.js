;(function ($) {
  //make dropdown icons tabbable
  $(".menu-item-has-children .submenu-icon").attr("tabindex", "0")
  //dristibute a speical class for the top level menu item
  //toggle submenu on click
  $(".menu-item-has-children .submenu-icon").on("click", function () {
    $(this).siblings(".sub-menu").toggleClass("show")
    // console.log("this function works")
  })
  //hide submenu on click outside it's container
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
  // //show submenu on enter keypress
  $(".menu-item-has-children .submenu-icon").on("keypress", function (e) {
    var keycode = e.keyCode ? e.keyCode : e.which
    if (keycode == "13") {
      $(this).siblings(".sub-menu").toggleClass("show")
    }
  })
  // //hide submenu on reverse selection
  $(".menu-item-has-children a").on("focusin", function () {
    $(this).siblings(".sub-menu").removeClass("show")
  })
  $(".menu-item a").on("focusin", function () {
    var menuItem = $(this).parent().siblings(".menu-item")
    menuItem.children(".sub-menu").removeClass("show")
  })

  //show searchbar on focus
  $(".link-item--search a").on("focusin", function () {
    console.log("focus on search icon")
    $(".link-item--search .search-overlay").addClass("show")
  })
  //hide searchbar on focus out

  $(".search-button").on("focusout", function () {
    $(".search-overlay").removeClass("show")
  })
  $(".actual-overlay").on("click", function () {
    $(".search-overlay").removeClass("show")
  })
  $(document).keyup(function (e) {
    if (e.key === "Escape") {
      // escape key maps to keycode `27`
      // <DO YOUR WORK HERE>
      $(".search-overlay").removeClass("show")
      console.log("esc key pressed")
      if ($(".menu-item-has-children .sub-menu .menu-item-has-children .sub-menu").hasClass("show")) {
        $(".menu-item-has-children .sub-menu .menu-item-has-children .sub-menu").removeClass("show")
      } else {
        $(".menu-item-has-children .sub-menu").removeClass("show")
      }
    }
  })

  //toggle menu
  $(".menu-toggle").on("click", function () {
    $("#site-navigation").toggleClass("show")
    $("body").toggleClass("menu-opened")
    $(".menu-toggle").toggleClass("show")
  })
})(jQuery)
