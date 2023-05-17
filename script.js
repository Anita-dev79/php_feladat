$(document).ready(function(){
    $.ajax({
        method: "POST",
        url: "server.php",
        data: {
            get_list: 1,
            c_id: 0
        }
    })
    .done(function(response){
        //alert(response);
        if (response.indexOf("Connection") >= 0){
            $(".myModalText").text("Database connection problem! Please try again!");
            $("#myModal").modal('show');
            return;
        }
        $(".c_list").html("<table id='customer' class='display' style='width:100%'></table>");
        var jsonData = JSON.parse(response);

        table = $('#customer').DataTable({
            retrieve: true,
            data: jsonData,
            pageLength: 10,
            aaSorting: [ [0,'asc'] ],
            rowId: 'id',
            createdRow: function (row, data, dataIndex) {
                $(row).addClass('c_check');
            },
            columns: [
                { title: '#', data: "rowId" },
                { title: 'Name', data: "name" },
                { title: 'Address', data: "address" },
                { title: 'Customer ID', data: "accountId" },
                { title: 'Contract date', data: "date" },
            ]
        });
    });
    $("#c_new").on("click", function(e){
        e.preventDefault();
        $("#admin_head").text("New customer");
        $(".c_detail").removeClass("d-none");
        $("#c_update").addClass("d-none");
        $("#c_insert").removeClass("d-none");
        $("#name").val("");
        $("#address").val("");
        $("#customerId").val("");
        $("#contractDate").val("");
        $("#id").text("");
    })
    $("#c_insert").on("click",function(e){
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "server.php",
            data: {
                c_new: 1,
                name: $("#name").val(),
                address: $("#address").val(),
                accountId: $("#customerId").val(),
                contractDate: $("#contractDate").val(),
            }
        })
        .done(function(response){
            if (response == "Success!"){
                location.reload();
            } else {
                err = response;
                switch (response){
                    case "1":
                        err = "Please set the name of the customer!";
                        $("#name").focus();
                        break;
                    case "2":
                        err = "Please set the address of the customer!";
                        $("#address").focus();
                        break;
                    case "3":
                        err = "Please set the contract date!";
                        $("#contractDate").focus();
                }
                $(".myModalText").text(err);
                $("#myModal").modal('show');
            }
        })
    })
    $(document).on("click",".c_check", function(e){
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "server.php",
            data: {
                get_list: 1,
                c_id: $(this).attr("id")
            }
        })
        .done(function(response){
            $("#admin_head").text("Customer update");
            $(".c_detail").removeClass("d-none");
            $("#c_insert").addClass("d-none");
            $("#c_update").removeClass("d-none");
            var jsonData = jQuery.parseJSON(response);
            $.each(jsonData, function (key, value) {
                $("#name").val(value.name);
                $("#address").val(value.address);
                $("#customerId").val(value.accountId);
                $("#contractDate").val(value.date);
                $("#id").text(value.id);
            });
        })
    })
    $("#c_update").on("click", function(e){
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "server.php",
            data: {
                c_update: 1,
                name: $("#name").val(),
                address: $("#address").val(),
                accountId: $("#customerId").val(),
                contractDate: $("#contractDate").val(),
                id: $("#id").text(),
            }
        })
        .done(function(response){
            if (response == "Success!"){
                location.reload();
            } else {
                err = "Unable to update the record. Please try again!";
                switch (response){
                    case "1":
                        err = "Please set the name of the customer!";
                        $("#name").focus();
                        break;
                    case "2":
                        err = "Please set the address of the customer!";
                        $("#address").focus();
                        break;
                    case "3":
                        err = "Please set the contract date!";
                        $("#contractDate").focus();
                }
                alert(err);
            }
        })

    })
})