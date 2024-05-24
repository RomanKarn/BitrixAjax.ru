$(document).ready(function () {

    PopUpHide();
    $('body').on('click',".open-pop-button", function () {
        let pathDetailUrl = $(this).data('pathdetalurl');
        console.log(pathDetailUrl);
        $.ajax({
            type: "GET",
            url:  pathDetailUrl,
            success: function (response) {
                let data = $(response).find("#datatime").html();
                let name = $(response).find("#detailname").html();
                let text = $(response).find("#detailtext").html();
                PopSetData(data,name,text);
                event.preventDefault();
                PopUpShow();
            }
        });
    });
    $(".close-pop-button").on('click', function () {
        event.preventDefault();
        PopUpHide();
    });
});

function PopSetData(data,name,text)
{
    $("#datapup").html(data);
    $("#namepup").html(name);
    $("#textpup").html(text);
}

function PopUpShow() {
    $("#popup1").show();
}
function PopUpHide() {
    $("#popup1").hide();
}