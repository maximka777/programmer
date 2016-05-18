/**
 * Created by Nastya on 16.05.2016.
 */

function getXmlHttp() {
    var xmlhttp;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e){
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

function setDisabled(elem, flag){
    elem.disabled = flag;
}

function btnClick() {

    var status_elem = document.getElementById('vote_status');
    var captcha_elem = document.getElementById('capcha');
    var submit_btn = document.getElementById('submit-btn');
    var captcha_value = captcha_elem.value;
    if (captcha_value.length == 6) {
        var params = 'capcha=' + captcha_value;
        //alert(captcha_value);
        var req = getXmlHttp();
        req.onreadystatechange = function () {
            if (req.readyState == 4) {
                status_elem.innerHTML = req.statusText;
                if (req.status == 200) {
                    var responseText = req.responseText;
                    status_elem.innerHTML = responseText;
                    if (responseText == "Correct CAPTCHA :)")
                        setDisabled(submit_btn, false);
                    else
                        setDisabled(submit_btn, true);
                }
            }
        }
        req.open('POST', 'validator.php', true);
        req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        req.setRequestHeader("Content-length", params.length);
        req.setRequestHeader("Connection", "keep-alive");
        req.send(params);
    }
    else{
        submit_btn.disabled = true;
        status_elem.innerHTML("Текст capcha не совпал :(");
    }
}
