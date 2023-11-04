// Assign a loading element
const preloader = $(".preloader");

// to stop loading animation once the page is fully loaded (with images)
$(window).on("load", function () {
  preloader.fadeOut();
});

const rupiah = (number) => {
  return new Intl.NumberFormat("id-ID", {
    style: "currency",
    currency: "IDR",
  }).format(number);
};

$(document).ready(function (event) {
  // for img multiple upload
  // ImgUpload();

  const lightGallInit = document.querySelectorAll(".lightGallery");
  for (let i = 0; i < lightGallInit.length; i++) {
    lightGallery(lightGallInit[i]);
  }

  // for dropdown menu
  $(".dropdown-button").dropdown();

  // to show modal after submit if validation error
  const flashDataModal = $(".flash-data-modal").data("flashdata");
  if (flashDataModal) {
    $(document).ready(function () {
      $(flashDataModal).modal("open");
    });
  }

  // the flash data for notificaton success
  const flashData = $(".flash-data").data("flashdata");
  const tableName = $(".table-name").html();

  // the type is the action name like Deleted, Updated or Created for flash data info
  if (flashData) {
    // Materialize.toast(typeData+' Data\'s has been '+flashData, 4000);
    doneAlert(tableName, flashData);
  }

  // to show toast if login error
  const alertLogin = $(".alert-danger");
  if (alertLogin) {
    Materialize.toast(alertLogin.data("message"));
  }

  // to show sweetalert2 success notif
  function doneAlert(tableName, flashData, reload) {
    Materialize.toast(tableName + " Data's has been " + flashData, 2000);
    Swal.fire({
      template: "#my-template",

      title: "Done!",

      text: tableName + " Data's has been " + flashData,

      icon: "success",

      confirmButtonText: "OK",
    }).then(() => {
      if (reload) {
        preloader.fadeIn();
        document.location.reload();
      }
    });
  }

  // for delete with ajax operations
  $(".delete-btn").click(function (e) {
    const deleteRoutes = $(this).data("href");

    Swal.fire({
      title: "Are you sure ?",

      text: "Data cannot be recovered after deletion",

      icon: "warning",

      showCancelButton: true,

      confirmButtonText: '<i class="bi bi-check left alert-icon"></i>Yes',

      cancelButtonText: '<i class="bi bi-x left alert-icon"></i>No',

      cancelButtonColor: "#d33",
    }).then((result) => {
      if (result.isConfirmed) {
        preloader.fadeIn();
        $(".load-info").html("Almost done");

        $.ajax({
          url: deleteRoutes,
          type: "DELETE",
          success: function (result) {
            // Do something with the result
            doneAlert(tableName, "Deleted!", true);
          },
        });
      }
    });
  });

  $(".logout-btn").click(function (e) {
    e.preventDefault();

    const href = $(this).attr("href");

    Swal.fire({
      template: "#my-template",
      title: "Are you sure to exit ?",

      icon: "warning",

      showCancelButton: true,

      confirmButtonText: '<i class="bi bi-check left alert-icon"></i>Yes',

      cancelButtonText: '<i class="bi bi-x left alert-icon"></i>No',

      cancelButtonColor: "#d33",
    }).then((result) => {
      if (result.value) {
        document.location.href = href;
      }
    });
  });

  // Assign modal and button with materialize modal and sidenav button
  $(".modal").modal();
  $(".button-collapse").sideNav();

  $(".mobile").click(function (event) {
    $(".button-collapse").sideNav("hide");
  });

  // to set slider by materialize slider
  $(".slider").slider({
    indicators: false,

    height: 435,

    transition: 600,

    interval: 6000,
  });

  $(".slider img").css("filter", "brightness(55%)");

  // Assign parallax and scrollspy with materialize

  $(".parallax").parallax();

  $(".scrollspy").scrollSpy({
    scrollOffset: 55,
  });

  $(".menu-item").hover(
    function () {
      $(this).addClass("active-list");
    },
    function () {
      $(this).removeClass("active-list");
    }
  );

  // Set function for clock, hello and date in topbar
  function formatAMPM(date) {
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? "PM" : "AM";
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? "0" + minutes : minutes;
    var strTime = hours + "." + minutes + " " + ampm;
    return strTime;
  }

  //   function hello(hours) {
  //     if (hours >= 6 && hours <= 11) {
  //       return "Good Morning!";
  //     } else if (hours >= 11 && hours <= 15) {
  //       return "Good Afternoon!";
  //     } else if (hours > 15 && hours <= 18) {
  //       return "Good Afternoon!";
  //     } else {
  //       return "Good Evening!";
  //     }
  //   }

  function hello(hours) {
    if (hours >= 4 && hours <= 9) {
      return "Selamat Pagi!";
    } else if (hours >= 10 && hours <= 14) {
      return "Selamat Siang!";
    } else if (hours >= 15 && hours <= 16) {
      return "Selamat Sore!";
    } else {
      return "Selamat Malam!";
    }
  }

  // show the clock, hello and date in topbar
  setInterval(function () {
    let today = new Date();

    let mm = String(today.toDateString()).padStart(2, "0"); //January is 0!
    let time = formatAMPM(today);

    let hours = today.getHours();

    // Convert day to indonesian
    let hari;
    mmArray = mm.split(/(\s+)/);
    switch (mmArray[0]) {
      case "Sun":
        hari = "Minggu ";
        break;
      case "Mon":
        hari = "Senin ";
        break;
      case "Tue":
        hari = "Selasa ";
        break;
      case "Wed":
        hari = "Rabu ";
        break;
      case "Thu":
        hari = "Kamis ";
        break;
      case "Fri":
        hari = "Jumat ";
        break;
      case "Sat":
        hari = "Sabtu ";
        break;
      default:
        break;
    }

    mm =
      hari +
      mmArray[4] +
      mmArray[5] +
      mmArray[2] +
      mmArray[3] +
      mmArray[1] +
      mmArray[6];

    $("#date").text(mm);
    $("#jam").text(time);
    $("#hello").text(hello(hours));
  }, 1000);

  // toast notification for deleted images
  // $(".notif").click(function() {

  // 	Materialize.toast('Image deleted successfully', 5000);

  // });

  $(".modal-close").click(function () {
    preloader.hide();
  });

  // to check Chips Feature to run or not
  function runFeatureField(status, chips, inputChips) {
    chips.material_chip("data");
    const featureFieldStatus = inputChips.data("status");

    // console.log(chips);
    if (featureFieldStatus == true) {
      // console.log('Feature Status is True');
      if (status == true) {
        inputChipsToSend(inputChips, chips);
        // console.log('inputChipsToSend() Active!');
      } else {
        generateChips(chips, inputChips);
        // console.log('generateChips() Not!');
      }
    } else {
      console.log("Feature Status is False");
    }
  }

  let chipsBebas = $(".chips-bebas");
  let inputBebas = $(".input-bebas");

  let inputFeature = $(".input-feature");
  let chipsFeature = $(".chips-features");

  // for button loading animation on submit
  function loadingSubmit(form, btnText, btnSubmit, loadingIcon) {
    $(form).submit(() => {
      $(btnSubmit).addClass("disabled");
      $(btnText).addClass("hidden-text");
      $(loadingIcon).addClass("show-inline");

      runFeatureField(true, chipsBebas, inputBebas);
      runFeatureField(true, $(".chips-bonus"), $(".input-bonus"));
      runFeatureField(true, chipsFeature, inputFeature);
    });
  }

  let form = $(".form"),
    modalForm = $(".modal-form");
  let btnSubmit = $(".btn-submit"),
    btnModalSubmit = $(".btn-modal-submit");
  let btnText = $(".btn-text");
  let loadingIcon = $(".loading-icon"),
    loadingIconModal = $(".loading-icon-modal");

  loadingSubmit(form, btnText, btnSubmit, loadingIcon);
  loadingSubmit(modalForm, btnText, btnModalSubmit, loadingIconModal);

  // for mini loading
  let menuLink = $(".menu-link");
  let editButton = $(".btn-card");
  let backButton = $(".back-btn");
  let miniLoading = $(".mini-loading");
  let miniPreloader = $(".mini-preloader");

  menuLink.click(() => {
    $(".button-collapse").sideNav("hide");
    miniPreloader.css("display", "block");
    miniLoading.slideDown();
  });

  editButton.click(() => {
    miniPreloader.css("display", "block");
    miniLoading.slideDown();
  });

  backButton.click(() => {
    miniPreloader.css("display", "block");
    miniLoading.slideDown();
  });

  // =========== Chips Section
  // const chipss = $(".chips-placeholder");
  // chipss.material_chip("data");
  // console.log(chipss);

  function inputChipsToSend(inputChips, chips) {
    let tags = "";
    chips.material_chip("data").forEach((tag) => {
      tags += "," + tag.tag;
    });
    inputChips.val(tags.substr(1));
  }

  function generateChips(chips, inputChips) {
    // console.log(chips.material_chip("data"));
    let dataFeature = inputChips.data("value").split(",");

    let placeholder = inputChips.data("placeholder");
    let secondaryPlaceholder = inputChips.data("secondary-placeholder");

    let dataFeatureReady = [];
    dataFeature.forEach((data) => {
      dataFeatureReady.push({ tag: data });
    });

    let dataChips = {
      placeholder: placeholder,
      secondaryPlaceholder: secondaryPlaceholder,
    };

    if (dataFeature[0] == "") {
      chips.material_chip(dataChips);
    } else {
      chips.material_chip(Object.assign({ data: dataFeatureReady }, dataChips));
    }
    // }
  }

  // runFeatureField(false);
  runFeatureField(false, chipsBebas, inputBebas);
  runFeatureField(false, $(".chips-bonus"), $(".input-bonus"));
  runFeatureField(false, chipsFeature, inputFeature);

  if ($(window).width() < 767) {
    $(".tooltipped").tooltip("remove");
  }

  $(".btn-link").on("click", () => {
    Materialize.toast("Link Telah Dicopy!", 3000);
  });

  $(".select-property").material_select();

  let specCount;

  let count = 1;

  if ($(".spec_count").data("edit") == true) {
    count = $(".spec_count").val();
  }

  $(".spec-btn").click(() => {
    $("#spec").append(`
    <div class="input-field col s6">
        <input id="pondasi" type="text" name="spec_name[${count}]" value="" data-length="56" maxlength="56" required>
        <label for="pondasi">Nama Spesifikasi</label>
    </div>
    <div class="input-field col s6">
        <input id="pondasi" type="text" name="spec[${count}]" value="" data-length="56" maxlength="56" required>
        <label for="pondasi">Spesifikasi</label>
    </div>  
    `);
    count++;
    specCount = $(".spec_count").val(count - 1);
  });

  let spec_name_old = $(".spec_name_old").val();
  spec_name_old = spec_name_old.split(",");

  let spec_old = $(".spec_old").val();
  spec_old = spec_old.split(",");

  let spec_count = $(".spec_count").val();

  if ($(".spec_count").data("edit") == true) {
    for (let i = 0; i < spec_count; i++) {
      $("#spec").append(`
      <div class="input-field col s6">
          <input id="pondasi" type="text" name="spec_name[${i}]" value="${spec_name_old[i]}" data-length="56" maxlength="56" required>
          <label for="pondasi">Nama Spesifikasi</label>
      </div>
      <div class="input-field col s6">
          <input id="pondasi" type="text" name="spec[${i}]" value="${spec_old[i]}" data-length="56" maxlength="56" required>
          <label for="pondasi">Spesifikasi</label>
      </div>
      `);
    }
  } else {
    if ($(".spec_count").val()) {
      for (let i = 0; i < $(".spec_count").val(); i++) {
        $("#spec").append(`
      <div class="input-field col s6">
          <input id="pondasi" type="text" name="spec_name[${count}]" value="${spec_name_old[count]}" data-length="56" maxlength="56" required>
          <label for="pondasi">Nama Spesifikasi</label>
      </div>
      <div class="input-field col s6">
          <input id="pondasi" type="text" name="spec[${count}]" value="${spec_old[count]}" data-length="56" maxlength="56" required>
          <label for="pondasi">Spesifikasi</label>
      </div>  
      `);
        count++;
      }
    }
  }

  $(".delete-spec-btn").click(() => {
    if ($("#spec div").length >= 3) {
      $("#spec").find("div:last").remove();
      $("#spec").find("div:last").remove();
      count--;
    }
  });
});

function resetValidate() {
  $("input").removeClass("invalid");
}

function previewImg(input, path, preview) {
  const img = document.querySelector(input);
  const imgPreview = document.querySelector(preview);

  if (path) {
    const imgLabel = document.querySelector(path);
    imgLabel.textContent = img.files[0].name;
  }

  const imgFile = new FileReader();
  imgFile.readAsDataURL(img.files[0]);

  imgFile.onload = function (e) {
    imgPreview.src = e.target.result;
  };
}

function checkContactType() {
  let option = $("#contact_type");
  let contact_label = $("#contact_label");
  let linkField = $("#link");

  if (option.val() == "envelope") {
    contact_label.text("Email");
    linkField.attr("type", "email");
  } else if (
    option.val() == "telephone" ||
    option.val() == "telegram" ||
    option.val() == "whatsapp"
  ) {
    contact_label.text("Phone Number");
    linkField.attr("type", "number");
  } else {
    contact_label.text(option.val() + " links");
    linkField.attr("type", "url");
  }
}
var headingWrapper = $(".heading-wrapper");

$(window).on("scroll", function () {
  if ($(this).scrollTop() > 50) {
    return headingWrapper.addClass("scroll");
  }
  return headingWrapper.removeClass("scroll");
});

function tooglePwd() {
  let x = document.getElementById("password");

  let icon = $("#eye");

  if (x.type === "password") {
    icon.attr("class", "purple-text darken-1 bi bi-eye-fill");
    x.type = "text";
  } else {
    icon.attr("class", "purple-text darken-1 bi bi-eye-slash-fill");
    x.type = "password";
  }
}

jQuery(document).ready(function () {
  ImgUpload();
  ImgUploadOnly();
});

function ImgUploadOnly() {
  var imgWrap = "";
  var imgArray = [];

  $(".upload__inputfileonly").each(function () {
    $(this).on("change", function (e) {
      imgWrap = $(this).closest(".upload__box").find(".upload__img-wrap");
      var maxLength = $(this).attr("data-max_length");

      var files = e.target.files;
      var filesArr = Array.prototype.slice.call(files);
      var iterator = 0;
      filesArr.forEach(function (f, index) {
        if (!f.type.match("image.*")) {
          return;
        }

        if (imgArray.length > maxLength) {
          return false;
        } else {
          var len = 0;
          for (var i = 0; i < imgArray.length; i++) {
            if (imgArray[i] !== undefined) {
              len++;
            }
          }
          if (len > maxLength) {
            return false;
          } else {
            imgArray.push(f);

            var reader = new FileReader();
            reader.onload = function (e) {
              var html =
                "<div class='upload__img-box'><div style='background-image: url(" +
                e.target.result +
                ")' data-number='" +
                $(".upload__img-close").length +
                "' data-file='" +
                f.name +
                "' class='img-bg'></div></div>";
              imgWrap.append(html);
              iterator++;
            };
            reader.readAsDataURL(f);
          }
        }
      });
    });
  });
}

function ImgUpload() {
  var imgWrap = "";
  var imgArray = [];

  $(".upload__inputfile").each(function () {
    $(this).on("change", function (e) {
      imgWrap = $(this).closest(".upload__box").find(".upload__img-wrap");
      var maxLength = $(this).attr("data-max_length");

      var files = e.target.files;
      var filesArr = Array.prototype.slice.call(files);
      var iterator = 0;
      filesArr.forEach(function (f, index) {
        if (!f.type.match("image.*")) {
          return;
        }

        if (imgArray.length > maxLength) {
          return false;
        } else {
          var len = 0;
          for (var i = 0; i < imgArray.length; i++) {
            if (imgArray[i] !== undefined) {
              len++;
            }
          }
          if (len > maxLength) {
            return false;
          } else {
            imgArray.push(f);

            var reader = new FileReader();
            reader.onload = function (e) {
              var html =
                "<div class='upload__img-box'><div style='background-image: url(" +
                e.target.result +
                ")' data-number='" +
                $(".upload__img-close").length +
                "' data-file='" +
                f.name +
                "' class='img-bg'><div class='upload__img-close'></div></div></div>";
              imgWrap.append(html);
              iterator++;
            };
            reader.readAsDataURL(f);
          }
        }
      });
    });
  });

  $("body").on("click", ".upload__img-close", function (e) {
    var file = $(this).parent().data("file");
    for (var i = 0; i < imgArray.length; i++) {
      if (imgArray[i].name === file) {
        imgArray.splice(i, 1);
        break;
      }
    }
    $(this).parent().parent().remove();
  });
}

function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}

function loadingUploadBar() {
  $(".loading-upload").modal();
  $("#modal-loading-upload").modal("open");
}

// function initLightGallery(id) {

// }

lightGallery(document.getElementById("property-gallery"));
