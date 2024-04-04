// sendmessage

function sendmessage(mail) {

    var cemail = mail;
    var msgtxt = document.getElementById("msgtxt").value;

    var f = new FormData();
    f.append("e", cemail);
    f.append("t", msgtxt);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                // alert("Message Sent Successfully");
                // window.location = "messages.php";
                document.getElementById("msgtxt").value = null;

            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "sendmessageprocessSeller.php", true);
    r.send(f);

}

// refresher

function refresher(email) {

    setInterval(refreshmsgare, 500);
    setInterval(refreshrecentarea, 500);
}

// refres msg view area

function refreshmsgare(mail) {

    var chatrow = document.getElementById("chatrow");

    var f = new FormData();
    f.append("e", mail);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            chatrow.innerHTML = t;

        }
    }

    r.open("POST", "refreshmsgareaprocessSeller.php", true);
    r.send(f);

}

// refreshrecentarea

function refreshrecentarea() {

    var rcv = document.getElementById("rcv");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            rcv.innerHTML = t;
        }
    }

    r.open("POST", "refreshrecentareaprocessSeller.php", true);
    r.send();

}