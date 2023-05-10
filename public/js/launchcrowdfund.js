$(document).ready(function () {
  let titleOkay = false;
  let taglineOkay = false;
  let expectedAmountOkay = false;
  let coverImgOkay = false;
  let screenshotsOkay = false;

  $("#gig-title").keyup(function () {
    crowdfundTitleAvailability();
  });

  $("#gig-tagline").keyup(function () {
    crowdfundTaglineAvailability();
  });

  $("#expected-cost").keyup(function () {
    crowdfundAmountValidation();
  });

  //Hiding no cover image error msg when new image is uploaded
  $("#upload-button").change(function () {
    if ($("#upload-button")[0].files.length != 0) {
      $("#coverImgCheck").hide();
      coverImgOkay = true;
    }
  });

  //Hiding no screenshots error msg when new image is uploaded as a screenshot
  $("#file-input").change(function () {
    if ($("#file-input")[0].files.length != 0) {
      $("#screenshotsCheck").hide();
      screenshotsOkay = true;
    }
  });

  function coverImgCheck() {
    if ($("#upload-button")[0].files.length == 0) {
      $("#coverImgCheck").show();
      $("#coverImgCheck").text("Select a cover img");
      coverImgOkay = false;
    }
  }

  function screenshotsCheck() {
    if ($("#file-input")[0].files.length == 0) {
      $("#screenshotsCheck").show();
      $("#screenshotsCheck").text("Select at least one screenshot");
      screenshotsOkay = false;
    }
  }

  function crowdfundTitleAvailability() {
    let crowdfundTitle = $("#gig-title").val();

    if (crowdfundTitle.length == 0) {
      $("#titleCheck").show();
      $("#titleCheck").text("Crowdfund Title Cannot be empty");
      titleOkay = false;
    } else if (crowdfundTitle.length > 0 && crowdfundTitle.length < 29) {
      $("#titleCheck").hide();
      titleOkay = true;
    } else if (crowdfundTitle.length > 29) {
      $("#titleCheck").show();
      $("#titleCheck").text("Crowdfund Title Cannot exceed 29 letters");
      titleOkay = false;
    }
  }

  function crowdfundTaglineAvailability() {
    let gigTagline = $("#gig-tagline").val();

    if (gigTagline.length < 70) {
      $("#taglineCheck").show();
      $("#taglineCheck").text("Must use more than 70 characters");
      taglineOkay = false;
    } else if (gigTagline.length > 70 && gigTagline.length < 100) {
      $("#taglineCheck").hide();
      taglineOkay = true;
    } else {
      $("#taglineCheck").show();
      $("#taglineCheck").text("Cannot exceed 100 characters");
      taglineOkay = false;
    }
  }

  function crowdfundAmountValidation() {
    var regex = /^\d*[.]?\d*$/;
    let inputtedCost = $("#expected-cost").val();

    console.log(inputtedCost.length);

    if (inputtedCost.length == 0) {
      $("#expectedAmountCheck").show();
      $("#expectedAmountCheck").text("Cannot be empty");
      expectedAmountOkay = false;
    } else {
      if (regex.test(inputtedCost)) {
        if (parseInt(inputtedCost) < 50) {
          $("#expectedAmountCheck").show();
          $("#expectedAmountCheck").text(
            "Only allowed to launch crowdfunds for greater than $50"
          );
          expectedAmountOkay = false;
        } else if (parseInt(inputtedCost) > 1000) {
          $("#expectedAmountCheck").show();
          $("#expectedAmountCheck").text(
            "Only allowed to launch crowdfunds for orders less than $1000"
          );
          expectedAmountOkay = false;
        } else {
          $("#expectedAmountCheck").hide();
          expectedAmountOkay = true;
        }
      } else {
        $("#expectedAmountCheck").show();
        $("#expectedAmountCheck").text("Only numeric values are allowed");
        expectedAmountOkay = false;
      }
    }
  }

  $(".submit-btn").click(function (e) {
    let formSubmit = false;

    crowdfundTitleAvailability();
    crowdfundTaglineAvailability();
    crowdfundAmountValidation();
    coverImgCheck();
    screenshotsCheck();

    if (
      titleOkay == false ||
      taglineOkay == false ||
      expectedAmountOkay == false ||
      coverImgOkay == false ||
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
