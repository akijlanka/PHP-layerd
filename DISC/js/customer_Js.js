$(document).ready(function () {
    getAllCustomer();
    $('#btnadd').click(function () {
        var fromedata= $("#myForm").serialize();
        $.ajax({
            url:"../api/service/CustomerService.php",
            method:"POST",
            async: true,
            data: fromedata+"&operation=saveCust"
        }).done(function (resp) {
            alert(resp);
            getAllCustomer();
            clearAll();
        })
    });

    $('#btnupdate').click(function () {
        var fromedata= $("#myForm").serialize();
        $.ajax({
            url:"../api/service/CustomerService.php",
            method:"POST",
            async: true,
            data: fromedata+"&operation=updateCust"
        }).done(function (resp) {
            alert(resp);
            getAllCustomer();
            clearAll();
        })
    });

    $('#btndelete').click(function () {
        // alert("ok")
        var fromedata= $("#myForm").serialize();
        $.ajax({
            url:"../api/service/CustomerService.php",
            method:"POST",
            async: true,
            data: fromedata+"&operation=deleteCust"
        }).done(function (resp) {
            alert(resp);
getAllCustomer();
clearAll();
        })
    });
    //
    function getAllCustomer() {
        $('#customerall tr').remove();
        $.ajax({
            url:"../api/service/CustomerService.php",
            method: "POST",
            async: true,
            data:"&operation=getAll",
            dataType:'json'
        }).done(function (resp) {

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

    function clearAll() {
        $("input").each(function (e) {
            $(this).val("");
        })
    }
    function cancelFunc() {
        $("#update").hide();
        $("#cancel").hide();
        $("#delete").hide();
        $("#add").show();
        clearAll();
    }

});

