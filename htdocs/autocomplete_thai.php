<script>
  $(function () {
    $("#insure").autocomplete({
        minLength: 0
        , source: "autocom_insure.php"
        , open: function () {
            var valInput = $(this).val();
            if (valInput != "") {
                $(".ui-menu-item a").each(function () {
                    var matcher = new RegExp("(" + valInput + ")", "ig");
                    var s = $(this).text();
                    var newText = s.replace(matcher, "<b>$1</b>");
                    $(this).html(newText);
                });
            }
        }
    });
});
    
$(function () {
    $("#med_own").autocomplete({
        minLength: 0
        , source: "autocom_med_own.php"
        , open: function () {
            var valInput = $(this).val();
            if (valInput != "") {
                $(".ui-menu-item a").each(function () {
                    var matcher = new RegExp("(" + valInput + ")", "ig");
                    var s = $(this).text();
                    var newText = s.replace(matcher, "<b>$1</b>");
                    $(this).html(newText);
                });
            }
        }
        , select: function (event, ui) {
            $("#h_input").val(ui.item.id);
        }
    });
});
$(function () {
    $("#input3").autocomplete({
        minLength: 0
        , source: "autocom_med_visit.php"
        , open: function () {
            var valInput = $(this).val();
            if (valInput != "") {
                $(".ui-menu-item a").each(function () {
                    var matcher = new RegExp("(" + valInput + ")", "ig");
                    var s = $(this).text();
                    var newText = s.replace(matcher, "<b>$1</b>");
                    $(this).html(newText);
                });
            }
        }
        , select: function (event, ui) {
            $("#h_input3").val(ui.item.id);
        }
    });
}); 
    $(function () {
    $("#pname").autocomplete({
        minLength: 0
        , source: "autocom_pname.php"
        , open: function () {
            var valInput = $(this).val();
            if (valInput != "") {
                $(".ui-menu-item a").each(function () {
                    var matcher = new RegExp("(" + valInput + ")", "ig");
                    var s = $(this).text();
                    var newText = s.replace(matcher, "<b>$1</b>");
                    $(this).html(newText);
                });
            }
        }
    });
}); 
     $(function () {
    $("#search").autocomplete({
        minLength: 0
        , source: "autocom_patient.php"
        , open: function () {
            var valInput = $(this).val();
            if (valInput != "") {
                $(".ui-menu-item a").each(function () {
                    var matcher = new RegExp("(" + valInput + ")", "ig");
                    var s = $(this).text();
                    var newText = s.replace(matcher, "<b>$1</b>");
                    $(this).html(newText);
                });
            }
        }
    });
}); 
    </script>