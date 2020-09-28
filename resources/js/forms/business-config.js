$("input[name=contact_person]").change(() => {
    if ($("#contact-information").is(":hidden")) {
        $("#contact-information").show()
    } else  {
        $("#contact-information").hide();
    }
});

$("input[name=billing_address]").change(() => {
    if ($("#billing-address").is(":hidden")) {
        $("#billing-address").show()
    } else  {
        $("#billing-address").hide();
    }
});