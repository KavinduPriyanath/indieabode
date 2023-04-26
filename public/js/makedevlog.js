$(document).ready(function () {
  let devlogTitleOkay = false;
  let devlogTaglineOkay = false;
  let devlogCoverImg = false;

  $("#title").keyup(function () {
    devlogTitleAvailability();
  });

  $("#tagline").keyup(function () {
    devlogTaglineAvailability();
  });

  //Hiding no cover image error msg when new image is uploaded
  $("#upload-button").change(function () {
    if ($("#upload-button")[0].files.length != 0) {
      $("#devlogCoverImgCheck").hide();
      devlogCoverImg = true;
    }
  });

  function coverImgCheck() {
    if ($("#upload-button")[0].files.length == 0) {
      $("#devlogCoverImgCheck").show();
      $("#devlogCoverImgCheck").text("Select a cover img");
      devlogCoverImg = false;
    }
  }

  function devlogTitleAvailability() {
    let devlogTitle = $("#title").val();

    if (devlogTitle.length == 0) {
      $("#devlogTitleCheck").show();
      $("#devlogTitleCheck").text("Devlog Title Cannot be empty");
      devlogTitleOkay = false;
    } else if (devlogTitle.length > 0 && devlogTitle.length < 29) {
      $("#devlogTitleCheck").hide();
      devlogTitleOkay = true;
    } else if (devlogTitle.length > 29) {
      $("#devlogTitleCheck").show();
      $("#devlogTitleCheck").text("Devlog Title Cannot exceed 29 letters");
      devlogTitleOkay = false;
    }
  }

  function devlogTaglineAvailability() {
    let devlogTagline = $("#tagline").val();

    if (devlogTagline.length < 40) {
      $("#devlogTaglineCheck").show();
      $("#devlogTaglineCheck").text("Must use more than 40 characters");
      devlogTaglineOkay = false;
    } else if (devlogTagline.length >= 40 && devlogTagline.length < 70) {
      $("#devlogTaglineCheck").hide();
      devlogTaglineOkay = true;
    } else {
      $("#devlogTaglineCheck").show();
      $("#devlogTaglineCheck").text("Cannot exceed 70 characters");
      devlogTaglineOkay = false;
    }
  }

  $("#devsubmit").click(function (e) {
    let formSubmit = false;

    devlogTitleAvailability();
    devlogTaglineAvailability();
    coverImgCheck();

    if (
      devlogTitleOkay == false ||
      devlogTaglineOkay == false ||
      devlogCoverImg == false
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
