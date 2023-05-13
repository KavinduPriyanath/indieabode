$(document).ready(function () {
    let titleOkay = false;
    let themeOkay = false;
    let taglineOkay = false;
    let startDateOkay = false;
    let endDateOkay = false;
    let coverImgOkay = false;

    

    


    $("#jamTitle").keyup(function () {
        jamTitleAvailability();
    });

    $("#jamTheme").keyup(function () {
        jamThemeAvailability();
    });

    $("#jamTagline").keyup(function () {
        jamTaglineAvailability();
    });

    $("#Sdate").change(function () {
        jamSdateAvailability();
    });

    $("#Edate").change(function () {
        jamEdateAvailability();
    });
    

    //Hiding no cover image error msg when new image is uploaded
    $("#coverImg").change(function () {
        if ($("#coverImg")[0].files.length != 0) {
            $("#coverImgCheck").hide();
            coverImgOkay = true;
        }
    });



    function coverImgCheck() {
        if ($("#coverImg")[0].files.length == 0) {
            $("#coverImgCheck").show();
            $("#coverImgCheck").text("Select a cover img");
            coverImgOkay = false;
        }
    }

    

    function jamTitleAvailability() {
        let jamTitle = $("#jamTitle").val();

        if (jamTitle.length == 0) {
            $("#titleCheck").show();
            $("#titleCheck").text("Jam Title Cannot be empty");
            titleOkay = false;
            scrollToJamTitle();
        } else if (jamTitle.length > 0 && jamTitle.length < 30) {
            $("#titleCheck").hide();
            titleOkay = true;
        } else if (jamTitle.length > 30) {
            $("#titleCheck").show();
            $("#titleCheck").text("Jam Title Cannot exceed 30 letters");
            titleOkay = false;
            scrollToJamTitle();
        }
    }

    function scrollToJamTitle() {
        $('html, body').animate({
            scrollTop: $("#jamTitle").offset().top
        }, 100);
        $("#jamTitle").focus();
    }


    function themeValidity() {

        $checkedType = $("input[name='ranking']:checked").val();

        if ($checkedType == "Ranked") {
            let jamTheme = $('#jamTheme').val();
            if (jamTheme.length == 0) {
                themeOkay = false;
                $('#themeCheck').show();
                $('#themeCheck').text("Theme must be declared");
                scrollToJamTheme();
            } else {
                themeOkay = true;
                $('#themeCheck').hide();
            }
        } else if ($checkedType != "Ranked") {
            themeOkay = true;
            $('#themeCheck').hide();
        }

    }

    function scrollToJamTheme() {
        $('html, body').animate({
            scrollTop: $("#jamTheme").offset().top
        }, 100);
        $("#jamTheme").focus();
    }



    function jamTaglineAvailability() {
        let jamTagline = $("#jamTagline").val();

        if (jamTagline.length == 0) {
            $("#taglineCheck").show();
            $("#taglineCheck").text("Tagline cannot be empty");
            taglineOkay = false;
            scrollToJamTagline();
        } else if (jamTagline.length < 50) {
            $("#taglineCheck").show();
            $("#taglineCheck").text("Must use more than 50 characters");
            taglineOkay = false;
            scrollToJamTagline();
        } else if (jamTagline.length > 50 && jamTagline.length < 100) {
            $("#taglineCheck").hide();
            taglineOkay = true;
        } else {
            $("#taglineCheck").show();
            $("#taglineCheck").text("Cannot exceed 100 characters");
            taglineOkay = false;
            scrollToJamTagline();
        }
    }

    function scrollToJamTagline() {
        $('html, body').animate({
            scrollTop: $("#jamTagline").offset().top
        }, 100);
        $("#jamTagline").focus();
    }


    function jamSdateAvailability() {
        let jamStartDate = $("#Sdate").val();

        if (jamStartDate.length == 0) {
            $("#startDateCheck").show();
            $("#startDateCheck").text("Start Date & Time cannot be empty");
            scrollToJamSdate();
            startDateOkay = false;
        } else if (jamStartDate.length > 0) {
            $("#startDateCheck").hide();
            startDateOkay = true;
        }
    }

    function scrollToJamSdate() {
        $('html, body').animate({
            scrollTop: $("#Sdate").offset().top
        }, 100);
        $("#Sdate").focus();
    }

    function jamEdateAvailability() {
        let jamEndDate = $("#Edate").val();
        let jamStartDate = $("#Sdate").val();

        if (jamEndDate.length == 0) {
            $("#endDateCheck").show();
            $("#endDateCheck").text("End Date & Time cannot be empty");
            endDateOkay = false;
            scrollToJamEdate();
        } else if (jamEndDate == jamStartDate) {
            $("#endDateCheck").show();
            $("#endDateCheck").text("End Date & Time cannot be same as Start Date & Time");
            endDateOkay = false;
            scrollToJamEdate();
        } else {
            $("#endDateCheck").hide();
            endDateOkay = true;
        }
    }

    function scrollToJamEdate() {
        $('html, body').animate({
            scrollTop: $("#Edate").offset().top
        }, 100);
        $("#Edate").focus();
    }

  
   

    $(".submit").click(function (e) {
        let formSubmit = false;

        coverImgCheck();
        jamEdateAvailability();
        jamSdateAvailability();
        jamTaglineAvailability();
        jamTitleAvailability();
        themeValidity();
       

        console.log(titleOkay+" "+themeOkay+" "+taglineOkay+" "+startDateOkay+" "+coverImgOkay + " ");

        if (
            titleOkay == false ||
            themeOkay == false ||
            taglineOkay == false ||
            startDateOkay == false ||
            endDateOkay == false ||
            coverImgOkay == false
            
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
