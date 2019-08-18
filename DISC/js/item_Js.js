$(document).ready(function () {
    getAllItem();
    $('#btnadd').click(function () {
        var fromedata= $("#myForm").serialize();
        $.ajax({
            url:"../api/service/ItemService.php",
            method:"POST",
            async: true,
            data: fromedata+"&operation=saveItem"
        }).done(function (resp) {
            alert(resp);
            // getAllCustomer();
        })
    });

    $('#btnupdate').click(function () {
        var fromedata= $("#myForm").serialize();
        $.ajax({
            url:"../api/service/ItemService.php",
            method:"POST",
            async: true,
            data: fromedata+"&operation=updateItem"
        }).done(function (resp) {
            alert(resp);
            // getAllCustomer();
        })
    });

    $('#btndelete').click(function () {
        // alert("ok")
        var fromedata= $("#myForm").serialize();
        $.ajax({
            url:"../api/service/ItemService.php",
            method:"POST",
            async: true,
            data: fromedata+"&operation=deleteItem"
        }).done(function (resp) {
            alert(resp);

        })
    });
    //
    function getAllItem() {
        $('#customerall tr').remove();
        $.ajax({
            url:"../api/service/ItemService.php",
            method: "POST",
            async: true,
            data:"&operation=getAll",
            dataType: "json"
        }).done(function (resp) {
            alert("sdkslk");
            for (var i in resp) {
                var temp = resp[i];
                var row = "<tr><td>" + temp[0] +
                    "</td><td>" + temp[1] +
                    "</td><td>" + temp[2] +
                    "</td><td>" + temp[3] +
                    "</td></tr>";
                $('#customerall').append(row);
            }
        });
    }

});

