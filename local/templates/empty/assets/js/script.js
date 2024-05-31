$.fancybox.defaults.loop = true;

$(document).ready(function() {
    $('.cardbascet').on('click', '.bascet', function() {
        let id = $(this).parent().data('id');
        if ($(this).hasClass('addnew')) {
            activeBasket('add', id);
            $(this).parent().children(".plusminus").children(".coll").text(1);
            $(this).addClass('d-none');
            $(this).parent().children(".delall").removeClass('d-none');
            $(this).parent().children(".plusminus").removeClass('d-none');
        }
        if ($(this).hasClass('delall')) {
            activeBasket('del', id);
            $(this).addClass('d-none');
            $(this).parent().children(".plusminus").addClass('d-none');
            $(this).parent().children(".addnew").removeClass('d-none');
        }
        if ($(this).hasClass('minus')) {
            let bascet = activeBasket('minus', id);
            let inArr = false;
            for (i = 0; i < bascet.length; i++) {
                if (bascet[i][0] == id) {
                    inArr = true;
                    $(this).parent().children(".coll").text(bascet[i][1]);
                    break;
                }
            }
            if (!inArr) {
                $(this).parent().parent().children(".delall").addClass('d-none');
                $(this).parent().parent().children(".plusminus").addClass('d-none');
                $(this).parent().parent().children(".addnew").removeClass('d-none');
            }
        }
        if ($(this).hasClass('plus')) {
            let bascet = activeBasket('add', id);
            for (i = 0; i < bascet.length; i++) {
                if (bascet[i][0] == id) {
                    $(this).parent().children(".coll").text(bascet[i][1]);
                    break;
                }
            }

        }
        console.log(id);
        return false;
    });

});

function activeBasket(action, id) {

    var basket = JSON.parse(getCookie('basket'));
    if (basket === null || !(basket instanceof Array))
        basket = [];
    var inArr = false;
    if (action == 'del' && !inArr) {
        for (i = 0; i < basket.length; i++) {
            if (basket[i][0] == id) {
                basket.splice(i, 1);
                inArr = true;
                break;
            }
        }
    }
    if (action == 'add' && !inArr) {
        for (i = 0; i < basket.length; i++) {
            if (basket[i][0] == id) {
                basket[i][1]++;
                inArr = true;
                break;
            }
        }
        if (!inArr) {
            let newItem = [id, 1]
            basket.push(newItem);
        }
    }

    if (action == 'minus' && !inArr) {
        for (i = 0; i < basket.length; i++) {
            if (basket[i][0] == id) {
                basket[i][1]--;
                if (basket[i][1] <= 0)
                    basket.splice(i, 1);
                inArr = true;
                break;
            }
        }
    }
    var d = new Date();
    d.setMonth(d.getMonth() + 1);
    setCookie('basket', JSON.stringify(basket), d.toUTCString(), '/');

    $('.top_head_favor span').text(basket.length);

    return basket;
}

function setCookie(name, value, time, path) {
    document.cookie = name + "=" + value +
        ((time) ? "; time=" + time : "") +
        ((path) ? "; path=" + path : "");
}

function getCookie(name) {

    var cookie = " " + document.cookie;
    var search = " " + name + "=";
    var setStr = null;
    var offset = 0;
    var end = 0;
    if (cookie.length > 0) {
        offset = cookie.indexOf(search);
        if (offset != -1) {
            offset += search.length;
            end = cookie.indexOf(";", offset);
            if (end == -1) {
                end = cookie.length;
            }
            setStr = cookie.substring(offset, end);

        }
    }
    return (setStr);
}