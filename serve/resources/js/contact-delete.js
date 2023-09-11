import { dataFormat } from "./data-format";
// import "";

$(document).ready(function () {
    $(".btn-delete-contact").each(function (index, element) {
        $(element).on("click", function (e) {
            const data = {
                id: $('input[name="id-contact"]')[index].value,
                _token: $("meta[name=csrf-token]").attr("content"),
            };

            $.ajax({
                type: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "contact/" + data.id,
                data: JSON.stringify(data),
                dataType: "json",
                contentType: "application/json",
                success: function (response) {
                    console.log(response.contact);
                    $(".contact-line")[index].remove();
                    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(
                        $("#liveToast")
                    );

                    $(".hour-deleted").text(dataFormat());
                    $(".info-deleted").text("Nome: " + response.contact.name);
                    toastBootstrap.show();
                },
                error: function (response) {
                    console.log(response);
                    // Ativar o alert para error
                    // Fazer toast de error
                },
            });
        });
    });
});
