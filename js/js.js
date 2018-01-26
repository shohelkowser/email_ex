$(function () {
    var x = $('.shohel').length;
    var i = 1;
    x = x + 1;
    for (i; i < x; i++) {
        var val1 = $(".myone" + i).text();
        console.log(i + "--first--" + val1);
        var valall = 'url.php?url=' + val1 + '&id=' + i;
        if (val1 == 0) {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var res = this.responseText;
                    var result = res.split(" ");
                    if (res.length < 3) {
                        $(".email" + result[0]).text("Now Email Found");
                    } else {
                        $(".email" + result[0]).text(res);
                    }
                }
            };
            xmlhttp.open("GET", valall, true);
            xmlhttp.send();
        }
    }
    // alert("End...");  
});