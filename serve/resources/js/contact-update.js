$("form[name='contact-edit']").on("submit", function (e) {
    e.preventDefault();
    const contactEdit = {
        name: e.target.name.value,
        email: e.target.email.value,
        phone: e.target.phone.value,
        id: e.target.id_contact.value,
    };

    $(".btn-save").css("display", "none");
    $(".btn-spinner").css("display", "block");

    $.ajax({
        type: "patch",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: "/contact/" + contactEdit.id,
        data: JSON.stringify(contactEdit),
        dataType: "json",
        contentType: "application/json",
        success: function (response) {
            $(".btn-spinner").css("display", "none");
            $(".btn-save").css("display", "block");
            $("#alert-edit").addClass("show");
            return true;
        },
        error: function (response) {
            $(".btn-spinner").css("display", "none");
            $(".btn-save").css("display", "block");
            return true;
        },
    });
});
