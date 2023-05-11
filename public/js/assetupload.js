//Validation before submitting the form to upload a new game
$(document).ready(function () {
  let assetNameOkay = false;
  let taglineOkay = false;
  let coverImgOkay = false;
  let assetfileOkay = false;
  let screenshotsOkay = false;

  //Check for the availability of asset name the creator chose
  $("#asset-title").keyup(function () {
    assetNameAvailability();
  });

  //Check whether the chosen tagline length is compatible with game platforms cards
  $("#asset-tagline").keyup(function () {
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
  $("#upload-asset").change(function () {
    if ($("#upload-asset")[0].files.length != 0) {
      $("#assetFileCheck").hide();
      assetfileOkay = true;
    }
  });

  //Hiding no screenshots error msg when new image is uploaded as a screenshot
  $("#file-input").change(function () {
    if ($("#file-input")[0].files.length != 0) {
      $("#screenshotsCheck").hide();
      screenshotsOkay = true;
    }
  });

  function assetNameAvailability() {
    let assetName = $("#asset-title").val();

    var data = {
      assetName: assetName,
    };

    $.ajax({
      type: "POST",
      url: "/indieabode/assetupload/assetNameAvailabilityCheck",
      data: data,
      success: function (response) {
        if (assetName.length == 0) {
          $("#assetNameCheck").show();
          $("#assetNameCheck").text("Asset Name Cannot be empty");
          assetNameOkay = false;
        } else if (assetName.length > 20) {
          $("#assetNameCheck").show();
          $("#assetNameCheck").text("Asset Name Cannot exceed 20 letters");
          assetNameOkay = false;
        } else {
          if (response == "available") {
            $("#assetNameCheck").hide();
            assetNameOkay = true;
          } else if (response == "unavailable") {
            $("#assetNameCheck").show();
            $("#assetNameCheck").css("background-color", "rgb(225, 132, 132)");
            $("#assetNameCheck").text(
              "You alreay have an asset with this name"
            );
            assetNameOkay = false;
          } else if (response == "warning") {
            $("#assetNameCheck").show();
            $("#assetNameCheck").css("background-color", "#ffff80");
            $("#assetNameCheck").text(
              "Warning: Platform already has an asset with this name"
            );
            assetNameOkay = true;
          }
        }
      },
    });
  }

  function taglineValidity() {
    let tagline = $("#asset-tagline").val();

    if (tagline.length < 40) {
      $("#assetTaglineCheck").show();
      $("#assetTaglineCheck").text("Must use more than 40 characters");
      taglineOkay = false;
    } else if (tagline.length > 40 && tagline.length < 200) {
      $("#assetTaglineCheck").hide();
      taglineOkay = true;
    } else {
      $("#assetTaglineCheck").show();
      $("#assetTaglineCheck").text("Cannot exceed 200 characters");
      taglineOkay = false;
    }
  }

  function coverImgCheck() {
    if ($("#upload-button")[0].files.length == 0) {
      $("#coverImgCheck").show();
      $("#coverImgCheck").text("Select a cover img");
      coverImgOkay = false;
    }
  }

  function assetFileCheck() {
    if ($("#upload-asset")[0].files.length == 0) {
      $("#assetFileCheck").show();
      $("#assetFileCheck").text("Select an asset file");
      assetfileOkay = false;
    }
  }

  function screenshotsCheck() {
    if ($("#file-input")[0].files.length == 0) {
      $("#screenshotsCheck").show();
      $("#screenshotsCheck").text("Select at least one screenshot");
      screenshotsOkay = false;
    }
  }

  $(".submit-btn").click(function (e) {
    let formSubmit = false;
    assetNameAvailability();
    taglineValidity();
    coverImgCheck();
    assetFileCheck();
    screenshotsCheck();

    if (
      assetNameOkay == false ||
      taglineOkay == false ||
      coverImgOkay == false ||
      assetfileOkay == false ||
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
