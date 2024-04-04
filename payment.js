function paynow(id) {


    // var qty = document.getElementById("qtyinput").value;
    var qty = 1;
    // alert(qty);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            // alert(text);
            var obj = JSON.parse(text);

            var amount = obj["amount"];
            var email = obj["email"];

            if (text == "1") {
                // alert("Please sign in ");
                var w = document.getElementById("wish").innerHTML = '<div id="message"> <div id="inner-message" class="alert alert-danger alert-dismissible fade show" role="alert" style="width:50%;margin-left:auto;margin-right:auto;height:50px;font-size:15px"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>         </svg> <strong>Please Sign in !</strong> <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button></div> </div>        ';

                setTimeout(function() {
                    window.location = "log.php";
                }, 1000);
                // window.location = "log.php";

            } else if (text == "2") {
                // alert("Please Update your profile");
                var w = document.getElementById("wish").innerHTML = '<div id="message"> <div id="inner-message" class="alert alert-primary alert-dismissible fade show" role="alert" style="width:50%;margin-left:auto;margin-right:auto;height:50px;font-size:15px"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>         </svg> <strong>Please Update your profile!</strong> <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button></div> </div>        ';

                setTimeout(function() {
                    window.location = "userProfile.php";
                }, 1000);
                // window.location = "userprofile.php";

            } else {



                // Called when user completed the payment. It can be a successful payment or failure
                payhere.onCompleted = function onCompleted(orderId) {
                    // alert("payment completed");
                    var w = document.getElementById("wish").innerHTML = '<div id="message"> <div id="inner-message" class="alert alert-success alert-dismissible fade show" role="alert" style="width:50%;margin-left:auto;margin-right:auto;height:50px;font-size:15px"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>         </svg> <strong>payment completed</strong> <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button></div> </div>        ';

                    saveInvoice(orderId, id, email, amount, qty);
                };

                // Called when user closes the payment without completing
                payhere.onDismissed = function onDismissed() {
                    // alert("payment popup dismissed");
                    var w = document.getElementById("wish").innerHTML = '<div id="message"> <div id="inner-message" class="alert alert-warning alert-dismissible fade show" role="alert" style="width:50%;margin-left:auto;margin-right:auto;height:50px;font-size:15px"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>         </svg> <strong>payment popup dismissed!</strong> <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button></div> </div>        ';

                };

                // Called when error happens when initializing payment such as invalid parameters
                payhere.onError = function onError(error) {
                    // alert("invalid details");
                    var w = document.getElementById("wish").innerHTML = '<div id="message"> <div id="inner-message" class="alert alert-warning alert-dismissible fade show" role="alert" style="width:50%;margin-left:auto;margin-right:auto;height:50px;font-size:15px"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>         </svg> <strong>Invalid details!</strong> <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button></div> </div>        ';

                };

                // Put the payment variables here
                var payment = {
                    "sandbox": true,
                    "merchant_id": "1217987", // Replace your Merchant ID
                    "return_url": "http://localhost/Design%20project/singleproductview.php?id=" + id, // Important
                    "cancel_url": "http://localhost/Design%20project/singleproductview.php?id=" + id, // Important
                    "notify_url": "http://sample.com/notify",
                    "order_id": obj["id"],
                    "items": obj["item"],
                    "amount": amount,
                    "currency": "LKR",
                    "first_name": obj["fname"],
                    "last_name": obj["lname"],
                    "email": email,
                    "phone": obj["mobile"],
                    "address": obj["address"],
                    "city": obj["city"], 
                    "country": "Sri Lanka",
                    "delivery_address": obj["address"],
                    "delivery_city": obj["city"],
                    "delivery_country": "Sri Lanka",
                    "custom_1": "",
                    "custom_2": ""
                };

                // Show the payhere.js popup, when "PayHere Pay" is clicked

                payhere.startPayment(payment);


                //   };
            }
        }
    }

    r.open("GET", "buyNowProcess.php?id=" + id + "&qty=" + qty, true);
    r.send();

}

function checkout(id) {

    // alert(id);
    // var qty = document.getElementById("qtyinput").value;
    // alert(qty);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            // alert(text);
            var obj = JSON.parse(text);

            var amount = obj["amount"];
            var email = obj["email"];

            if (text == "1") {
                var w = document.getElementById("wish").innerHTML = '<div id="message"> <div id="inner-message" class="alert alert-danger alert-dismissible fade show" role="alert" style="width:50%;margin-left:auto;margin-right:auto;height:50px;font-size:15px"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>         </svg> <strong>Please Sign in !</strong> <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button></div> </div>        ';

                setTimeout(function() {
                    window.location = "log.php";
                }, 1000);

            } else if (text == "2") {
                var w = document.getElementById("wish").innerHTML = '<div id="message"> <div id="inner-message" class="alert alert-primary alert-dismissible fade show" role="alert" style="width:50%;margin-left:auto;margin-right:auto;height:50px;font-size:15px"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>         </svg> <strong>Please Update your profile!</strong> <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button></div> </div>        ';

                setTimeout(function() {
                    window.location = "userProfile.php";
                }, 1000);

            } else {



                // Called when user completed the payment. It can be a successful payment or failure
                payhere.onCompleted = function onCompleted(orderId) {
                    // alert("payment completed");
                    var w = document.getElementById("wish").innerHTML = '<div id="message"> <div id="inner-message" class="alert alert-success alert-dismissible fade show" role="alert" style="width:50%;margin-left:auto;margin-right:auto;height:50px;font-size:15px"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>         </svg> <strong>payment completed</strong> <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button></div> </div>        ';

                    saveInvoicecheckout(orderId, email, amount);
                };

                // Called when user closes the payment without completing
                payhere.onDismissed = function onDismissed() {
                    // alert("payment popup dismissed");
                    var w = document.getElementById("wish").innerHTML = '<div id="message"> <div id="inner-message" class="alert alert-warning alert-dismissible fade show" role="alert" style="width:50%;margin-left:auto;margin-right:auto;height:50px;font-size:15px"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>         </svg> <strong>payment popup dismissed!</strong> <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button></div> </div>        ';

                };

                // Called when error happens when initializing payment such as invalid parameters
                payhere.onError = function onError(error) {
                    // alert("invalid details");
                    var w = document.getElementById("wish").innerHTML = '<div id="message"> <div id="inner-message" class="alert alert-warning alert-dismissible fade show" role="alert" style="width:50%;margin-left:auto;margin-right:auto;height:50px;font-size:15px"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>         </svg> <strong>Invalid details!</strong> <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button></div> </div>        ';


                };

                // Put the payment variables here
                var payment = {
                    "sandbox": true,
                    "merchant_id": "1217987", // Replace your Merchant ID
                    "return_url": "http://localhost/Design%20project/singleproductview.php?id=" + id, // Important
                    "cancel_url": "http://localhost/Design%20project/singleproductview.php?id=" + id, // Important
                    "notify_url": "http://sample.com/notify",
                    "order_id": obj["id"],
                    "items": " ",
                    "amount": amount,
                    "currency": "LKR",
                    "first_name": obj["fname"],
                    "last_name": obj["lname"],
                    "email": email,
                    "phone": obj["mobile"],
                    "address": obj["address"],
                    "city": obj["city"],
                    "country": "Sri Lanka",
                    "delivery_address": obj["address"],
                    "delivery_city": obj["city"],
                    "delivery_country": "Sri Lanka",
                    "custom_1": "",
                    "custom_2": ""
                };

                // Show the payhere.js popup, when "PayHere Pay" is clicked

                payhere.startPayment(payment);


                //   };
            }
        }
    }

    r.open("GET", "checkout.php?id=" + id, true);
    r.send();

}

function saveInvoicecheckout(orderId, email, amount) {
    // alert("ok");
    var orderid = orderId;
    // var pid = id;
    var mail = email;
    var total = amount;
    // var pqty = qty;

    var f = new FormData();

    f.append("oid", orderid);
    // f.append("pid", pid);
    f.append("email", mail);
    f.append("total", total);
    // f.append("pqty", pqty);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == 1) {
                setTimeout(function() {
                    window.location = "invoicecheckout.php?id=" + orderid + "&t=" + total;
                }, 1000);
                // window.location = "invoicecheckout.php?id=" + orderid + "&t=" + total;
            }

        }
    }

    r.open("POST", "saveinvoicecheckout.php", true);
    r.send(f);


}

function saveInvoice(orderId, id, email, amount, qty) {

    var orderid = orderId;
    var pid = id;
    var mail = email;
    var total = amount;
    var pqty = qty;

    var f = new FormData();

    f.append("oid", orderid);
    f.append("pid", pid);
    f.append("email", mail);
    f.append("total", total);
    f.append("pqty", pqty);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == 1) {
                setTimeout(function() {
                    window.location = "invoice.php?id=" + orderid;
                }, 1000);
                // window.location = "invoice.php?id=" + orderid;
            }

        }
    }

    r.open("POST", "saveinvoice.php", true);
    r.send(f);


}