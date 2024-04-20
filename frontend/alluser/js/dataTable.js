$(document).ready(function() {
    $("#btn_ok").click(function(e) {
        e.preventDefault();
        // alert("ok");
        let timerInterval;
        let origin = $("#origin_province").val();
        let terminal = $("#terminal_province").val();

        console.log(terminal + origin);

        Swal.fire({
            title: "กำลังทำการค้นหาสถานี",
            html: "โปรดรอสักครู่เดียวนะครับ -3-",
            timer: 3000,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading();
                // const b = Swal.getHtmlContainer().querySelector("b");
                // timerInterval = setInterval(() => {
                //   b.textContent = Swal.getTimerLeft();
                // }, 100);
            },
            willClose: () => {
                clearInterval(timerInterval);
            },
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                // console.log("I was closed by the timer");
                $.ajax({
                    url: "service/provinceObj.php",
                    method: "post",
                    data: {
                        origin: origin,
                        terminal: terminal,
                        act: "getStation",
                    },
                    success: function(data) {
                        row = JSON.parse(data);
                        console.log(row);
                        if (row.status == 1) {
                            let p_origin = row[0].station_origin_name;
                            let t_terminal = row[0].station_terminal_name;
                            window.location.href =
                                "show_station.php?p_origin=" +
                                p_origin +
                                "&t_terminal=" +
                                t_terminal;
                        } else if (row.status == 0) {
                            Swal.fire({
                                icon: "error",
                                text: "ยังไม่มีสถานีนะครับ",
                            });
                        } else if (row.status == 2) {
                            Swal.fire({
                                icon: "error",
                                text: "คุณยังไม่เป็นสมาชิก กรุณาสมัครสมาชิกก่อนนะครับ",
                            });
                        }
                    },
                });
            }
        });
    });
});