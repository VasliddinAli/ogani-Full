"use strict";
$(document).ready(function () {
  /*------------------
        Preloader
    --------------------*/
  $(window).on("load", function () {
    $(".loader").fadeOut();
    $("#preloder").delay(100).fadeOut("slow");

    /*------------------
            Gallery filter
        --------------------*/
    $(".featured__controls li").on("click", function () {
      $(".featured__controls li").removeClass("active");
      $(this).addClass("active");
    });
    if ($(".featured__filter").length > 0) {
      var containerEl = document.querySelector(".featured__filter");
      var mixer = mixitup(containerEl);
    }
  });

  /*------------------
        Background Set
    --------------------*/
  $(".set-bg").each(function () {
    var bg = $(this).data("setbg");
    $(this).css("background-image", "url(" + bg + ")");
  });

  //Humberger Menu
  $(".humberger__open").on("click", function () {
    $(".humberger__menu__wrapper").addClass("show__humberger__menu__wrapper");
    $(".humberger__menu__overlay").addClass("active");
    $("body").addClass("over_hid");
  });

  $(".humberger__menu__overlay").on("click", function () {
    $(".humberger__menu__wrapper").removeClass(
      "show__humberger__menu__wrapper"
    );
    $(".humberger__menu__overlay").removeClass("active");
    $("body").removeClass("over_hid");
  });

  /*------------------
    Navigation
  --------------------*/
  $(".mobile-menu").slicknav({
    prependTo: "#mobile-menu-wrap",
    allowParentLinks: true,
  });

  /*-----------------------
        Categories Slider
    ------------------------*/
  $(".categories__slider").owlCarousel({
    loop: true,
    margin: 0,
    items: 4,
    dots: false,
    nav: true,
    navText: [
      "<span class='fa fa-angle-left'><span/>",
      "<span class='fa fa-angle-right'><span/>",
    ],
    animateOut: "fadeOut",
    animateIn: "fadeIn",
    smartSpeed: 1200,
    autoHeight: false,
    autoplay: true,
    responsive: {
      0: {
        items: 1,
      },

      480: {
        items: 2,
      },

      768: {
        items: 3,
      },

      992: {
        items: 4,
      },
    },
  });

  $(".hero__categories__all").on("click", function () {
    $(".hero__categories ul").slideToggle(400);
  });

  /*--------------------------
        Latest Product Slider
    ----------------------------*/
  $(".latest-product__slider").owlCarousel({
    loop: true,
    margin: 0,
    items: 1,
    dots: false,
    nav: true,
    navText: [
      "<span class='fa fa-angle-left'><span/>",
      "<span class='fa fa-angle-right'><span/>",
    ],
    smartSpeed: 1200,
    autoHeight: false,
    autoplay: true,
  });

  /*-----------------------------
        Product Discount Slider
    -------------------------------*/
  $(".product__discount__slider").owlCarousel({
    loop: true,
    margin: 0,
    items: 3,
    dots: true,
    smartSpeed: 1200,
    autoHeight: false,
    autoplay: true,
    responsive: {
      320: {
        items: 1,
      },

      480: {
        items: 2,
      },

      768: {
        items: 2,
      },

      992: {
        items: 3,
      },
    },
  });

  /*---------------------------------
        Product Details Pic Slider
    ----------------------------------*/
  $(".product__details__pic__slider").owlCarousel({
    loop: true,
    margin: 20,
    items: 4,
    dots: true,
    smartSpeed: 1200,
    autoHeight: false,
    autoplay: true,
  });

  /*-----------------------
    Price Range Slider
  ------------------------ */
  // var rangeSlider = $(".price-range"),
  //   minamount = $("#minamount"),
  //   maxamount = $("#maxamount"),
  //   minPrice = rangeSlider.data("min"),
  //   maxPrice = rangeSlider.data("max");
  // rangeSlider.slider({
  //   range: true,
  //   min: minPrice,
  //   max: maxPrice,
  //   values: [minPrice, maxPrice],
  //   slide: function (ui) {
  //     minamount.val("$" + ui.values[0]);
  //     maxamount.val("$" + ui.values[1]);
  //   },
  // });
  // minamount.val("$" + rangeSlider.slider("values", 0));
  // maxamount.val("$" + rangeSlider.slider("values", 1));

  /*--------------------------
        Select
    ----------------------------*/
  // $("select").niceSelect();

  /*------------------
    Single Product
  --------------------*/
  $(".product__details__pic__slider img").on("click", function () {
    var imgurl = $(this).data("imgbigurl");
    var bigImg = $(".product__details__pic__item--large").attr("src");
    if (imgurl != bigImg) {
      $(".product__details__pic__item--large").attr({
        src: imgurl,
      });
    }
  });

  // /*-------------------
  //   Quantity change
  // --------------------- */
  // var proQty = $(".pro-qty");
  // proQty.prepend('<span class="dec qtybtn">-</span>');
  // proQty.append('<span class="inc qtybtn">+</span>');
  // proQty.on("click", ".qtybtn", function () {
  //   var $button = $(this);
  //   var oldValue = $button.parent().find("input").val();
  //   if ($button.hasClass("inc")) {
  //     var newVal = parseFloat(oldValue) + 1;
  //   } else {
  //     if (oldValue > 0) {
  //       var newVal = parseFloat(oldValue) - 1;
  //     } else {
  //       newVal = 0;
  //     }
  //   }
  //   $button.parent().find("input").val(newVal);
  // });





  // product qty section
  let $qty_up = $(".qty .qty-up");
  let $qty_down = $(".qty .qty-down");
  let $deal_price = $("#deal-price");
  // let $input = $(".qty .qty_input");

  // click on qty up button
  $qty_up.click(function (e) {
    let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
    let $price = $(`.product_price[data-id='${$(this).data("id")}']`);

    // change product price using ajax call
    $.ajax({
      url: "../ajax.php",
      type: "post",
      data: { itemid: $(this).data("id") },
      success: function (result) {
        let obj = JSON.parse(result);
        let item_price = obj[0]["item_price"];

        if ($input.val() >= 1 && $input.val() <= 9) {
          $input.val(function (i, oldval) {
            return ++oldval;
          });

          // increase price of the product
          $price.text(parseInt(item_price * $input.val()).toFixed(2));

          // set subtotal price
          let subtotal = parseInt($deal_price.text()) + parseInt(item_price);
          $deal_price.text(subtotal.toFixed(2));
        }
      },
    }); // closing ajax request
  }); // closing qty up button

  // click on qty down button
  $qty_down.click(function (e) {
    let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
    let $price = $(`.product_price[data-id='${$(this).data("id")}']`);

    // change product price using ajax call
    $.ajax({
      url: "../ajax.php",
      type: "post",
      data: { itemid: $(this).data("id") },
      success: function (result) {
        let obj = JSON.parse(result);
        let item_price = obj[0]["item_price"];

        if ($input.val() > 1 && $input.val() <= 10) {
          $input.val(function (i, oldval) {
            return --oldval;
          });

          // increase price of the product
          $price.text(parseInt(item_price * $input.val()).toFixed(2));

          // set subtotal price
          let subtotal = parseInt($deal_price.text()) - parseInt(item_price);
          $deal_price.text(subtotal.toFixed(2));
        }
      },
    }); // closing ajax request
  }); // closing qty down button
});
