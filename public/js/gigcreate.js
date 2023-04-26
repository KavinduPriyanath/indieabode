$(document).ready(function () {
  let gigTitleOkay = false;
  let gigTaglineOkay = false;
  let expectedCostOkay = false;
  let gigCoverImgOkay = false;
  let gigScreenshotsOkay = false;

  $("#gig-title").keyup(function () {
    gigTitleAvailability();
  });

  $("#gig-tagline").keyup(function () {
    gigTaglineAvailability();
  });

  $("#expected-cost").on("input", function (e) {
    gigCostValidation();
  });

  //Hiding no cover image error msg when new image is uploaded
  $("#upload-button").change(function () {
    if ($("#upload-button")[0].files.length != 0) {
      $("#coverImgCheck").hide();
      gigCoverImgOkay = true;
    }
  });

  //Hiding no screenshots error msg when new image is uploaded as a screenshot
  $("#file-input").change(function () {
    if ($("#file-input")[0].files.length != 0) {
      $("#screenshotsCheck").hide();
      gigScreenshotsOkay = true;
    }
  });

  function coverImgCheck() {
    if ($("#upload-button")[0].files.length == 0) {
      $("#coverImgCheck").show();
      $("#coverImgCheck").text("Select a cover img");
      gigCoverImgOkay = false;
    }
  }

  function screenshotsCheck() {
    if ($("#file-input")[0].files.length == 0) {
      $("#screenshotsCheck").show();
      $("#screenshotsCheck").text("Select at least one screenshot");
      gigScreenshotsOkay = false;
    }
  }

  function gigTitleAvailability() {
    let gigTitle = $("#gig-title").val();

    if (gigTitle.length == 0) {
      $("#gigTitleCheck").show();
      $("#gigTitleCheck").text("Gig Title Cannot be empty");
      gigTitleOkay = false;
    } else if (gigTitle.length > 0 && gigTitle.length < 29) {
      $("#gigTitleCheck").hide();
      gigTitleOkay = true;
    } else if (gigTitle.length > 29) {
      $("#gigTitleCheck").show();
      $("#gigTitleCheck").text("Gig Title Cannot exceed 29 letters");
      gigTitleOkay = false;
    }
  }

  function gigTaglineAvailability() {
    let gigTagline = $("#gig-tagline").val();

    if (gigTagline.length < 40) {
      $("#gigTaglineCheck").show();
      $("#gigTaglineCheck").text("Must use more than 40 characters");
      gigTaglineOkay = false;
    } else if (gigTagline.length > 40 && gigTagline.length < 70) {
      $("#gigTaglineCheck").hide();
      gigTaglineOkay = true;
    } else {
      $("#gigTaglineCheck").show();
      $("#gigTaglineCheck").text("Cannot exceed 70 characters");
      gigTaglineOkay = false;
    }
  }

  function gigCostValidation() {
    var regex = /^\d*[.]?\d*$/;
    let inputtedCost = $("#expected-cost").val();

    if (regex.test(inputtedCost)) {
      if (parseInt(inputtedCost) < 100) {
        $("#costCheck").show();
        $("#costCheck").text(
          "Only allowed to create gigs for orders greater than $100"
        );
        expectedCostOkay = false;
      } else if (parseInt(inputtedCost) > 10000) {
        $("#costCheck").show();
        $("#costCheck").text(
          "Only allowed to create gigs for orders less than $10000"
        );
        expectedCostOkay = false;
      } else {
        $("#costCheck").hide();
        expectedCostOkay = true;
      }
    } else if (inputtedCost.length == 0) {
      $("#costCheck").show();
      $("#costCheck").text("Cannot be empty");
      expectedCostOkay = false;
    } else {
      $("#costCheck").show();
      $("#costCheck").text("Only numeric values are allowed");
      expectedCostOkay = false;
    }
  }

  $(".submit-btn").click(function (e) {
    let formSubmit = false;

    gigTitleAvailability();
    gigTaglineAvailability();
    gigCostValidation();
    coverImgCheck();
    screenshotsCheck();

    if (
      gigTitleOkay == false ||
      gigTaglineOkay == false ||
      expectedCostOkay == false ||
      gigCoverImgOkay == false ||
      gigScreenshotsOkay == false
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
