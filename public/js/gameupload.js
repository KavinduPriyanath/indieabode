//Validation before submitting the form to upload a new game
$(document).ready(function () {
  let gameNameOkay = false;
  let taglineOkay = false;
  let platformOkay = false;
  let featuresOkay = false;
  let coverImgOkay = false;
  let gamefileOkay = false;
  let screenshotsOkay = false;

  $(".platform-checkboxes").click(function () {
    if ($("[name='platform[]']:checked").length != 0) {
      $("#platformCheck").hide();
      platformOkay = true;
    }
  });

  $(".feature-checkboxes").click(function () {
    if ($("[name='game-features[]']:checked").length != 0) {
      $("#featureCheck").hide();
      featuresOkay = true;
    }
  });

  //Check for the availability of game name the developer chose
  $("#game-title").keyup(function () {
    gameNameAvailability();
  });

  //Check whether the chosen tagline length is compatible with game platforms cards
  $("#game-tagline").keyup(function () {
    taglineValidity();
  });

  //Hiding no cover image error msg when new image is uploaded
  $("#upload-button").change(function () {
    if ($("#upload-button")[0].files.length != 0) {
      $("#coverImgCheck").hide();
      coverImgOkay = true;
    }
  });

  //Hiding no game file error msg when new game file is uploaded
  $("#upload-game").change(function () {
    if ($("#upload-game")[0].files.length != 0) {
      $("#gameFileCheck").hide();
      gamefileOkay = true;
    }
  });

  //Hiding no screenshots error msg when new image is uploaded as a screenshot
  $("#file-input").change(function () {
    if ($("#file-input")[0].files.length != 0) {
      $("#screenshotsCheck").hide();
      screenshotsOkay = true;
    }
  });

  function gameNameAvailability() {
    let gameName = $("#game-title").val();

    var data = {
      gameName: gameName,
    };

    $.ajax({
      type: "POST",
      url: "/indieabode/gameupload/gameNameAvailabilityCheck",
      data: data,
      success: function (response) {
        if (gameName.length == 0) {
          $("#gameNameCheck").show();
          $("#gameNameCheck").text("Game Name Cannot be empty");
          gameNameOkay = false;
        } else if (response == "available") {
          $("#gameNameCheck").hide();
          gameNameOkay = true;
        } else if (response == "unavailable") {
          $("#gameNameCheck").show();
          $("#gameNameCheck").css("background-color", "rgb(225, 132, 132)");
          $("#gameNameCheck").text("You alreay have a game with this name");
          gameNameOkay = false;
        } else if (response == "warning") {
          $("#gameNameCheck").show();
          $("#gameNameCheck").css("background-color", "#ffff80");
          $("#gameNameCheck").text(
            "Warning: Platform already has a game with this name"
          );
          gameNameOkay = true;
        }
      },
    });
  }

  function taglineValidity() {
    let tagline = $("#game-tagline").val();

    if (tagline.length < 40) {
      $("#gameTaglineCheck").show();
      $("#gameTaglineCheck").text("Must use more than 40 characters");
      taglineOkay = false;
    } else if (tagline.length > 40 && tagline.length < 70) {
      $("#gameTaglineCheck").hide();
      taglineOkay = true;
    } else {
      $("#gameTaglineCheck").show();
      $("#gameTaglineCheck").text("Cannot exceed 70 characters");
      taglineOkay = false;
    }
  }

  function platformSelectorCheck() {
    let checkedPlatformCount = $("[name='platform[]']:checked").length;

    if (checkedPlatformCount == 0) {
      $("#platformCheck").show();
      $("#platformCheck").text("Must select atleast one platform");
      platformOkay = false;
    }
  }

  function featureSelectorCheck() {
    let featureSelectorCount = $("[name='game-features[]']:checked").length;

    if (featureSelectorCount == 0) {
      $("#featureCheck").show();
      $("#featureCheck").text("Must select atleast one feature");
      featuresOkay = false;
    }
  }

  function coverImgCheck() {
    if ($("#upload-button")[0].files.length == 0) {
      $("#coverImgCheck").show();
      $("#coverImgCheck").text("Select a cover img");
      coverImgOkay = false;
    }
  }

  function gameFileCheck() {
    if ($("#upload-game")[0].files.length == 0) {
      $("#gameFileCheck").show();
      $("#gameFileCheck").text("Select a game file");
      gamefileOkay = false;
    }
  }

  function screenshotsCheck() {
    if ($("#file-input")[0].files.length == 0) {
      $("#screenshotsCheck").show();
      $("#screenshotsCheck").text("Select at leaset one screenshot");
      screenshotsOkay = false;
    }
  }

  $(".submit-btn").click(function (e) {
    let formSubmit = false;
    gameNameAvailability();
    taglineValidity();
    platformSelectorCheck();
    featureSelectorCheck();
    coverImgCheck();
    gameFileCheck();
    screenshotsCheck();

    if (
      gameNameOkay == false ||
      taglineOkay == false ||
      platformOkay == false ||
      featuresOkay == false ||
      coverImgOkay == false ||
      gamefileOkay == false ||
      screenshotsOkay == false
    ) {
      formSubmit = false;
    } else {
      formSubmit = true;
    }

    if (formSubmit == false) {
      e.preventDefault();
    }
  });
});
