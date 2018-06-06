$(document).ready(function () {

    function checkForm() {
        $('.email,.firstname,.lastname,.country,.phone').each(function () {
            $empty = $(this).val();
            if (!$empty) {
                $(this).css({
                    boxShadow: "0px 0px 10px 0px #CC5353",
                }).attr("placeholder", "נא להכניס " + $(this).data("name")).addClass("placeholder-error-color");
                $(this).next().addClass("glyphicon glyphicon-remove");
            }
        });
    }


    $('#AddToDb').click(function () {

        var mail = $('#email').val();
        var first_name = $('#firstName').val();
        var last_name = $('#lastName').val();
        var country = $('#country').val();
        var phone = $('#phone').val();
        if (!mail || !first_name || !last_name || !country || !phone) {
            checkForm();
        } else {
            $.ajax({
                type: "POST",
                data: {email: mail, firstName: first_name, lastName: last_name, country: country, phone: phone},
                url: "InsertInfo.php",
                success: function (data) {
                    if (data === "ok") {
                        swal({
                            title:"Congratulations!",
                            text: "Thank you for signing up to be a part of the Culidough community! 50 free tokens will be credited to your account as a reward for early registration! ",
                            type: "success"
                        });
                        $('.email').closest('form').find("input[type=text],input[type=email],input[type=tel],textarea").val("");
                    } else {
                         swal({
                            title: "wrong",
                            text: "your details are not submitted. Please contact us.",
                              type: "warning"
                        });
                        $('.email').closest('form').find("input[type=text],input[type=email],input[type=tel],textarea").val();
                    }
                }

            });
        }
    });
});







