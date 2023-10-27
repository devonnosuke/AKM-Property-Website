$(document).ready(function () {
  $(".button-collapse").sideNav();
  $(".slider").slider({
    indicators: true,

    height: 600,

    transition: 600,

    interval: 7000,
  });
  $(".modal").modal();
  $(".parallax").parallax();
  $(".materialboxed").materialbox();
  $(".materialboxed12").materialbox();
});
