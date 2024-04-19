function sendQuery() {
    $.ajax({
        method: "POST",
        url: location.origin + location.pathname,
        data: {orderId: "456"}
    })
        .done(function (response) {
            $('#status').html(response);
        });
}