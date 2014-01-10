function btnClick(value) {
    var mainText = document.getElementById('mainText');
    if (value == 'C') {
        mainText.value = '0';
    } else if (value == 'CE') {
        var mainTextLength = mainText.value.length;
        if (mainTextLength > 1) {
            mainText.value = mainText.value.substr(0, mainTextLength - 1);
        }
        else {
            mainText.value = '0';
        }
    }
    else {
        if (mainText.value == '0') {
            if (value == '00' || value == '000') {
                mainText.value = '0';
                return;
            }
            mainText.value = value;
        }
        else {
            mainText.value += value;
        }
    }
}


//ajax get result
function getResult() {
    try {
        var xhr = new XMLHttpRequest();
    } catch (e) {
        try {
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
        catch (e) {
            alert('java script is not enable or some problem with create XMLHttpRequest');
        }
    }
    var mainText = document.getElementById('mainText');
    var mainTextValueEncode = encodeURIComponent(mainText.value);

    xhr.open("GET", "./getResult.php?expr=" + mainTextValueEncode);
    xhr.send(null);
    xhr.onreadystatechange = function getData() {
        if (xhr.readyState == 4 &&
            xhr.status == 200) {
            mainText.value = xhr.responseText;
        }
    }
}
