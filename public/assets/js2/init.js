// Assign a loading element
const preloader = $(".mini-preloader");

// to stop loading animation once the page is fully loaded (with images)
$(window).on("load", function () {
  preloader.fadeOut();
});

$(document).ready(function () {
  // .collapsible-property .collapsible-header
  if ($(window).width() > 600) {
    $(".collapsible").collapsible("open", 0);
    $(".collapsible").collapsible("open", 1);
    $(".collapsible").collapsible("open", 2);
    $(".collapsible").collapsible("open", 3);
  } else {
    $(".collapsible-1").collapsible("open", 0);
  }

  $(".modal").modal();

  info = $("#home").data("info");

  if (info == "Thank you!") {
    Materialize.toast(info + " your message has been sent", 4000);
  } else {
    Materialize.toast(info, 4000);
  }

  $(".button-collapse").sideNav();

  $(".slider").slider({
    indicators: true,

    height: 500,

    transition: 600,

    interval: 6500,
  });

  $(".slider img").css("filter", "brightness(85%)");

  $(".parallax").parallax();

  $(".scrollspy").scrollSpy({
    scrollOffset: 50,
  });

  $(".button-collapse").sideNav();

  $(".mobile").click(function (event) {
    $(".button-collapse").sideNav("hide");
  });

  var options = [
    {
      selector: "#staggered-test",
      offset: 200,
      callback: function (el) {
        Materialize.showStaggeredList($(el));
      },
    },

    {
      selector: "#staggered-test1",
      offset: 300,
      callback: function (el) {
        Materialize.showStaggeredList($(el));
      },
    },

    {
      selector: "#image-profile",
      offset: 100,
      callback: function (el) {
        Materialize.fadeInImage($(el));
      },
    },
    {
      selector: "#imgs",
      offset: 300,
      callback: function (el) {
        Materialize.showStaggeredList($(el));
      },
    },

    {
      selector: "#navbar",
      offset: 500,
      callback: function (el) {
        $(this).css("background-color", "white");
      },
    },
  ];

  Materialize.scrollFire(options);

  var $backToTop = $(".back-to-top");

  $(window).on("scroll", function () {
    if ($(this).scrollTop() > 400) {
      $(".nav-index").removeClass("bg-nav");

      $("nav").removeClass("darken-1");

      $(".brand-logo").addClass("bg-base");

      $backToTop.fadeIn();

      // $('nav').addClass('nav-light');

      $(".nav-link").addClass("grey-text");

      $(".nav-link").addClass("text-darken-4");

      $(".nav-wrapper li.active").addClass("scroll");
    } else {
      $(".nav-wrapper li.active").removeClass("scroll");
      $(".nav-index").addClass("bg-nav");

      $("nav").addClass("darken-1");

      $backToTop.fadeOut();

      $(".brand-logo").removeClass("bg-base");
      $("nav").removeClass("nav-light");

      $("#nav-link").removeClass(".nav-link");

      $(".nav-link").removeClass("grey-text");

      $(".nav-link").addClass("text-darken-4");
    }
  });
  $(".materialboxed").materialbox();
});
$(".materialboxed12").materialbox();

lightGallery(document.getElementById("property-gallery"), {
  download: false,
  selector: ".item",
});

lightGallery(document.getElementById("property-img"), {
  download: false,
});
lightGallery(document.getElementById("property-denah"), {
  download: false,
});
lightGallery(document.getElementById("promo-img"), {
  download: false,
});
