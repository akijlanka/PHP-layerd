loadItems();
loadCustomers();
getAll();

function clearAll() {
    $('input').val("");
    $('#tbl tbody').html("");
    $('#tot').text("Total : 00.00");
    getAll();
}

function getAll() {
    $('#tbl-od tbody').html("");
    $.ajax({
        url: "../api/service/OrderService.php",
        method: "POST",
        async: true,
        data: "&operation=getAll",
        dataType: "json"
    }).done(function (resp) {
        for (var i in resp) {
            var temp = resp[i];
            $('#tbl-od tbody').append(
                "<tr>" +
                "<td>" + temp[0] + "</td>" +
                "<td>" + temp[1] + "</td>" +
                "<td>" + temp[2] + "</td>" +
                "</tr>"
            );
        }
    });
}

function loadItems() {
    $.ajax({
        url: "../api/service/ItemService.php",
        method: "POST",
        async: true,
        data: "&operation=getAll",
        dataType: "json"
    }).done(function (res) {
        for (var i of  res) {
            $('#items').append("<option>" + i[0] + "</option>");
        }
    });
}

function loadCustomers() {
    $.ajax({
        url: "../api/service/CustomerService.php",
        method: "POST",
        async: true,
        data: "&operation=getAll",
        dataType: "json"
    }).done(function (res) {
        for (var i of  res) {
            $('#cid').append("<option>" + i[0] + "</option>");
        }
    });
}

$('#items').change(function () {
    var formdata = $('#order_form').serialize();
    $.ajax({
        url: "../api/service/ItemService.php",
        method: "POST",
        async: true,
        data: formdata + "&operation=search",
        dataType: 'json'
    }).done(function (data) {
        $('#itemName').val(data[1]);
        $('#avi_qty').val(data[2]);
        $('#price').val(data[3]);
    });
});
$('#addToCart').click(function () {

    var bol = false;
    var row;
    var newQ = Number.parseInt($("#qty").val());
    $("#tbl tbody tr").each(function () {
        if ($(this).find("td:first").text() == $("#items").val()) {
            bol = true;
            row = $(this);
            return;
        }
    });
    if (bol) {
        var oldQ = Number.parseInt($(row).find("td:eq(2)").text());
        $(row).find("td:eq(2)").text(newQ + oldQ);
    } else {
        $('#tbl tbody').append(
            "<tr>" +
            "<td>" + $('#items').val() + "</td>" +
            "<td>" + $('#itemName').val() + "</td>" +
            "<td>" + $('#qty').val() + "</td>" +
            "<td>" + $('#price').val() + "</td>" +
            "</tr>"
        );
    }
    countTotal();
});
$('#tbl tbody').on('click', 'tr', function () {
    $('#items').val($(this).find("td:eq(0)").text());
    $('#itemName').val($(this).find("td:eq(1)").text());
    $('#qty').val($(this).find("td:eq(2)").text());
    $('#price').val($(this).find("td:eq(3)").text());
});

function countTotal() {
    var tot = 0;
    $("#tbl tbody tr").each(function () {
        var qty = parseInt($(this).find("td:eq(2)").text());
        var price = parseFloat($(this).find("td:eq(3)").text());

        tot += qty * price;
    });
    $("#tot").text("Total : " + tot);
}

$('#place_order').click(function () {
    var tableData = [];
    $('#tbl tbody tr').each(function () {
        var itemcode = $(this).find("td:eq(0)").text(),
            qty = parseInt($(this).find("td:eq(2)").text()),
            unitprice = parseFloat($(this).find("td:eq(3)").text());
        tableData.push({
            code: itemcode,
            qty: qty,
            price: unitprice
        });
    });
    var tbldata = JSON.stringify(tableData);
    var orderdata = $('#order_form').serialize();
    $.ajax({
        url: "../api/service/OrderService.php",
        method: "POST",
        async: true,
        data: orderdata + "&operation=add&x=" + tbldata
    }).done(function (res) {
        alert(res);
        clearAll();
    });
});