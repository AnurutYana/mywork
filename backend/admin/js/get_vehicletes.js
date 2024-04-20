$(document).ready(function() {
    let vihicleObj = $("#station_registration");
    $("#company_id").change(function() {
        let company = $(this).val();
        console.log(company);

        vihicleObj.html('<option value="">เลือกทะเบียนรถ</option>');

        $.ajax({
            url: "service/get_vehicle.php",
            method: "post",
            data: {
                act: "get_vehicle",
                id: company,
            },
            success: function(data) {
                row = JSON.parse(data);
                console.log(row);
                $.each(row, function(key, value) {
                    vihicleObj.append(
                        '<option value="' +
                        value.carservice_id +
                        '">' +
                        value.carservice_vehicle +
                        "</option>"
                    );
                });
            },
        });
    });
});