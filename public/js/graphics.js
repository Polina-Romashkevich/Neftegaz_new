function Graphics() {
    $.ajax({
        url: "/diagram/histogram",
        contentType: false,
        type: 'GET',
        success: function (data) {
            alert(data.result);
        },
        error: function () { alert('error'); }
    });
}