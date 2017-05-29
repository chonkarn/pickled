<!--style-->
<style>
    .ui-autocomplete-loading {
        background: white url("images/ui-anim_basic_16x16.gif") right center no-repeat;
    }
    
    .ui-autocomplete {
        max-height: 100px;
        max-width: 525px;
        overflow-y: auto;
        /* prevent horizontal scrollbar */
        overflow-x: hidden;
    }
    /* IE 6 doesn't support max-height
   * we use height instead, but this forces the menu to always be this tall
   */
    
    * html .ui-autocomplete {
        height: 100px;
        width: 100px;
    }

</style>

<script>
    function inputhidden(value) {
        var value = value;
        var y = "_input";
        var z = "_label";
        var x = document.getElementById(value).value;
        if (x === "else") {
            value = value.concat(y);
            document.getElementById(value).style.visibility = 'visible';
            value = value.concat(z);
            document.getElementById(value).style.visibility = 'visible';
        } else {
            value = value.concat(y);
            document.getElementById(value).style.visibility = 'hidden';
            value = value.concat(z);
            document.getElementById(value).style.visibility = 'hidden';
        }
    }

    function cancer_check() {
        if (document.getElementById("cancer").checked == true) {
            document.getElementById("cancer_input").disabled = false;
        } else {
            document.getElementById("cancer_input").disabled = true;
        }
    }

    function other_check() {
        if (document.getElementById("other").checked == true) {
            document.getElementById("other_input").disabled = false;
        } else {
            document.getElementById("other_input").disabled = true;
        }
    }

    //    function alcohol_check() {
    //        if (document.getElementById("alcohol-1").checked == true) {
    //            document.getElementById("div_alcohol").style.visibility = 'hidden';
    //        }
    //        else {
    //            document.getElementById("div_alcohol").style.visibility = 'visible';
    //        }
    //    }

    function alcohol_check() {
        if (document.getElementById("alcohol-1").checked == true) {
            document.getElementById("alcohol_input").disabled = true;
        } else {
            document.getElementById("alcohol_input").disabled = false;
        }
    }

    //    function cigarette_check() {
    //        if (document.getElementById("cigarette-1").checked == true) {
    //            document.getElementById("div_cigarette").style.visibility = 'hidden';
    //        }
    //        else {
    //            document.getElementById("div_cigarette").style.visibility = 'visible';
    //        }
    //    }

    function cigarette_check() {
        if (document.getElementById("cigarette-1").checked == true) {
            document.getElementById("cigarette_amount").disabled = true;
            document.getElementById("cigarette_period").disabled = true;
        } else {
            document.getElementById("cigarette_amount").disabled = false;
            document.getElementById("cigarette_period").disabled = false;
        }
    }

    function surgery_check() {
        if (document.getElementById("surgery-1").checked == true) {
            document.getElementById("surgery_input").style.visibility = 'hidden';
        } else {
            document.getElementById("surgery_input").style.visibility = 'visible';
        }
    }

    function allgeric_check() {
        if (document.getElementById("allgeric-1").checked == true) {
            document.getElementById("allergic_input").style.visibility = 'hidden';
        } else {
            document.getElementById("allergic_input").style.visibility = 'visible';
        }
    }

    function alternative_check() {
        if (document.getElementById("alternative-1").checked == true) {
            document.getElementById("alternative_input").style.visibility = 'hidden';
        } else {
            document.getElementById("alternative_input").style.visibility = 'visible';
        }
    }

    //add input
    var count = 2;
    $(document).ready(function() {
        //delete
        $("#deleteDiv").click(function() {
            $("#problems").remove();
        });

        //
        var value = "#problem";
        var main = "#main";
        testt(main);
        testt(value);
        $("#addRelate").click(function() {
            var cloning;
            if (count < 4) {
                //clone label "ข้อมูลญาติคนที่"
                //                $("#relate_label").clone().appendTo("#relate");
                var div = document.getElementById("relate_label");
                var clone = div.cloneNode(true);
                clone.id = "clone" + count;
                var cloneTest = clone.id;
                var xx = document.getElementById("relate");
                xx.appendChild(clone);
                //clone input
                cloning = $("#relate_input").clone().attr("id", "relate_input" + count);

                $("#relate_label div.relate_name").find("input:text").val("").end;
                cloning.appendTo("#relate");
            } else {
                document.getElementById("addRelate").value = "เพิ่มได้แค่3คน";
                document.getElementById("addRelate").disabled = true;
            }
            $("#" + cloneTest + " span").html(count);
            count++;
        });

        var c = 2;
        $("#addProblems").click(function() {
            var input;
            if (c < 21) {
                //clone label
                var div = document.getElementById("pp");
                clone = div.cloneNode(true);
                clone.id = "clone" + c;
                var test = clone.id;
                var xx = document.getElementById("problems");
                xx.appendChild(clone);
                //clone input
                input = $("#p1").clone();
                var oname = "p" + c;
                input.attr("id", oname);
                var newname = "problem" + c;
                var newDel = "deleteDiv" + c;
                input.find("input:text").attr("name", newname);
                input.find("input:text").attr("id", newname).on("keydown", function(event) {
                    if (event.keyCode === $.ui.keyCode.TAB && $(this).autocomplete("instance").menu.active) {
                        event.preventDefault();
                    }
                }).autocomplete({
                    source: function(request, response) {
                        if (request.term.length < 4) {
                            $.getJSON("autocomplete_search_less4.php", {
                                term: extractLast(request.term)
                            }, response);
                        } else {
                            $.getJSON("autocomplete_search_more4.php", {
                                term: extractLast(request.term)
                            }, response);
                        }
                    },
                    focus: function() {
                        return false;
                    }
                });
                input.find("input:button").attr("id", newDel).click(function() {
                    $("#" + newname).remove();
                    $("#" + test).remove();
                    $("#" + newDel).remove();
                    c--;
                });
                input.find("input:text").val("").end().appendTo("#problems");
            } else {
                document.getElementById("addProblems").value = "เพิ่มได้แค่20ปัญหา";
                document.getElementById("addProblems").disabled = true;
            }
            $("#" + test + " span").html(c);
            c++;
        });
    });

    //autocom
    function split(val) {
        return val.split(/,\s*/);
    }

    function extractLast(term) {
        return split(term).pop();
    }

    function testt(value) {
        $(value).on("keydown", function(event) {
            if (event.keyCode === $.ui.keyCode.TAB && $(this).autocomplete("instance").menu.active) {
                event.preventDefault();
            }
        }).autocomplete({
            source: function(request, response) {
                if (request.term.length < 4) {
                    $.getJSON("autocomplete_search_less4.php", {
                        term: extractLast(request.term)
                    }, response);
                } else {
                    $.getJSON("autocomplete_search_more4.php", {
                        term: extractLast(request.term)
                    }, response);
                }
            },
            focus: function() {
                return false;
            }
        });
    }

</script>
