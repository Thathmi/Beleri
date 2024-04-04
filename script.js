function changeView() {

    var signUpBox = document.getElementById("signUpBox");
    var signInBox = document.getElementById("signInBox");

    signUpBox.classList.toggle("d-none");
    signInBox.classList.toggle("d-none");

}

function signup() {

    var fn = document.getElementById("f");
    var l = document.getElementById("l");
    var e = document.getElementById("e");
    var m = document.getElementById("m");
    var p = document.getElementById("p");


    var f = new FormData();
    f.append("f", fn.value);
    f.append("l", l.value);
    f.append("e", e.value);
    f.append("m", m.value);
    f.append("p", p.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == 1) {

                fn.value = "";
                l.value = "";
                m.value = "";
                p.value = "";
                e.value = "";

                var w = document.getElementById("wish").innerHTML = '<div id="message"> <div id="inner-message" class="alert alert-success alert-dismissible fade show" role="alert" style="width:50%;margin-left:auto;margin-right:auto;height:50px;font-size:15px"> <svg xmlns="http://www.w3.org/2000/svg" id="info-fill"  width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:"> <use xlink:href="#exclamation-triangle-fill"/>         </svg> <strong>Your Account has successfuly created. Please log in .</strong> <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button></div> </div>        ';


                document.getElementById("mssg").innerHTML = "";

            } else {
                document.getElementById("mssg").innerHTML = text;
            }
        }
    }

    r.open("POST", "signUpProcess.php", true);
    r.send(f);

    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);
}

function signIn() {

    var e1 = document.getElementById("e1");
    var p1 = document.getElementById("p1");
    var remember = document.getElementById("remember");

    var formData1 = new FormData();
    formData1.append("email", e1.value);
    formData1.append("pass", p1.value);
    formData1.append("remember", remember.checked);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "success") {
                window.location = "index.php";
            } else {
                document.getElementById("mssg1").innerHTML = text;
            }
        }
    }
    r.open("POST", "signInProcess.php", true);
    r.send(formData1);
}

function signInSeller() {

    var e1 = document.getElementById("e");
    var p1 = document.getElementById("p");
    var remember = document.getElementById("remembers");

    var formData1 = new FormData();
    formData1.append("email", e1.value);
    formData1.append("pass", p1.value);
    formData1.append("remember", remember.checked);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "success") {
                window.location = "sellerhomepage.php";
            } else {
                document.getElementById("mssg1").innerHTML = text;
            }
        }
    }
    r.open("POST", "sellersignin.php", true);
    r.send(formData1);
}

function signupSeller() {

    var fn = document.getElementById("f");
    var l = document.getElementById("l");
    var e = document.getElementById("e2");
    var m = document.getElementById("m");
    var p = document.getElementById("p2");
    // var b = document.getElementById("b");

    // alert(fn.value);
    var f = new FormData();
    f.append("f", fn.value);
    f.append("l", l.value);
    f.append("e", e.value);
    f.append("m", m.value);
    f.append("p", p.value);
    // f.append("b", b.value);
    // alert("ok");
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            // alert(text);
            if (text == 1) {


                fn.value = "";
                l.value = "";
                m.value = "";
                p.value = "";
                // b.value = "";
                e.value = "";

                var w = document.getElementById("wish").innerHTML = '<div id="message"> <div id="inner-message" class="alert alert-success alert-dismissible fade show" role="alert" style="width:50%;margin-left:auto;margin-right:auto;height:50px;font-size:15px"> <svg xmlns="http://www.w3.org/2000/svg" id="info-fill"  width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:"> <use xlink:href="#exclamation-triangle-fill"/>         </svg> <strong>Your Account has successfuly created. Please log in .</strong> <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button></div> </div>        ';


                document.getElementById("mssg").innerHTML = "";

            } else {
                document.getElementById("mssg").innerHTML = text;
            }
        }
    }

    r.open("POST", "sellersignUp.php", true);
    r.send(f);

    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);
}

var bm;

function forgotSeller() {

    var email = document.getElementById("e");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {
                // alert("verification email sent,please check your inbox.")


                var m = document.getElementById("forgetpasswordModal");
                bm = new bootstrap.Modal(m);
                bm.show();
            } else {
                var w = document.getElementById("wish").innerHTML = '<div id="message"> <div id="inner-message" class="alert alert-danger alert-dismissible fade show" role="alert" style="width:50%;margin-left:auto;margin-right:auto;height:50px;font-size:15px"> <svg xmlns="http://www.w3.org/2000/svg" id="info-fill"  width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:"> <use xlink:href="#exclamation-triangle-fill"/>         </svg> <strong>' + text + '</strong> <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button></div> </div>        ';

            }
        }
    }
    r.open("GET", "forgotPasswordSeller.php?e=" + email.value, true);
    r.send();

    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);
}
var bm1;

function forgot() {

    var email = document.getElementById("e1");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {
                // alert("verification email sent,please check your inbox.")

                var m = document.getElementById("forgetpasswordModal1");
                bm1 = new bootstrap.Modal(m);
                bm1.show();
            } else {
                // alert(text);
                var w = document.getElementById("wish").innerHTML = '<div id="message"> <div id="inner-message" class="alert alert-danger alert-dismissible fade show" role="alert" style="width:50%;margin-left:auto;margin-right:auto;height:50px;font-size:15px"> <svg xmlns="http://www.w3.org/2000/svg" id="info-fill"  width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:"> <use xlink:href="#exclamation-triangle-fill"/>         </svg> <strong>' + text + '</strong> <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button></div> </div>        ';

            }
        }
    }
    r.open("GET", "forgotPassword.php?e=" + email.value, true);
    r.send();

    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);
}

function showPassword1() {

    var np = document.getElementById("np");
    var npb = document.getElementById("npb");

    if (npb.innerHTML == "Show") {
        np.type = "text";
        npb.innerHTML = "Hide";
    } else {
        np.type = "password";
        npb.innerHTML = "Show";
    }

}

function showPassword2() {

    var rnp = document.getElementById("rnp");
    var rnpb = document.getElementById("rnpb");

    if (rnpb.innerHTML == "Show") {
        rnp.type = "text";
        rnpb.innerHTML = "Hide";
    } else {
        rnp.type = "password";
        rnpb.innerHTML = "Show";
    }

}

function resetPassword() {

    var e = document.getElementById("e1");
    var np = document.getElementById("np");
    var rnp = document.getElementById("rnp");
    var vc = document.getElementById("vc");

    var formData = new FormData();
    formData.append("e", e.value);
    formData.append("np", np.value);
    formData.append("rnp", rnp.value);
    formData.append("vc", vc.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == 1) {
                // alert("Password Reset Success");
                var w = document.getElementById("wish").innerHTML = '<div id="message"> <div id="inner-message" class="alert alert-success alert-dismissible fade show" role="alert" style="width:50%;margin-left:auto;margin-right:auto;height:50px;font-size:15px"> <svg xmlns="http://www.w3.org/2000/svg" id="info-fill"  width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:"> <use xlink:href="#exclamation-triangle-fill"/>         </svg> <strong>Password Reset Successfuly.</strong> <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button></div> </div>        ';

                bm1.hide();

            } else {
                var w = document.getElementById("wish").innerHTML = '<div id="message"> <div id="inner-message" class="alert alert-danger alert-dismissible fade show" role="alert" style="width:50%;margin-left:auto;margin-right:auto;height:50px;font-size:15px"> <svg xmlns="http://www.w3.org/2000/svg" id="info-fill"  width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:"> <use xlink:href="#exclamation-triangle-fill"/>         </svg> <strong>' + text + '</strong> <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button></div> </div>        ';

            }
        }
    };
    r.open("POST", "resetPassword.php", true);
    r.send(formData);

    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);

}

function resetPasswordSeller() {

    var e = document.getElementById("e");
    var np = document.getElementById("np");
    var rnp = document.getElementById("rnp");
    var vc = document.getElementById("vc");

    var formData = new FormData();
    formData.append("e", e.value);
    formData.append("np", np.value);
    formData.append("rnp", rnp.value);
    formData.append("vc", vc.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == 1) {
                // alert("Password Reset Success");
                var w = document.getElementById("wish").innerHTML = '<div id="message"> <div id="inner-message" class="alert alert-success alert-dismissible fade show" role="alert" style="width:50%;margin-left:auto;margin-right:auto;height:50px;font-size:15px"> <svg xmlns="http://www.w3.org/2000/svg" id="info-fill"  width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:"> <use xlink:href="#exclamation-triangle-fill"/>         </svg> <strong>Password Reset Successfuly.</strong> <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button></div> </div>        ';
                bm.hide();

            } else {
                var w = document.getElementById("wish").innerHTML = '<div id="message"> <div id="inner-message" class="alert alert-danger alert-dismissible fade show" role="alert" style="width:50%;margin-left:auto;margin-right:auto;height:50px;font-size:15px"> <svg xmlns="http://www.w3.org/2000/svg" id="info-fill"  width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:"> <use xlink:href="#exclamation-triangle-fill"/>         </svg> <strong>' + text + '</strong> <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button></div> </div>        ';

            }
        }
    };
    r.open("POST", "resetPasswordSeller.php", true);
    r.send(formData);

    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);

}
var dm;

function deletemodal(id) {

    var dm = document.getElementById("deleteModal" + id);
    k = new bootstrap.Modal(dm);
    k.show();

}



function deleteproduct(id) {

    var productid = id;
    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var t = request.responseText;
            if (t == "success") {
                k.hide();
                window.location = "sellerproductview.php";
            }

        }
    };
    request.open("GET", "deleteproductprocess.php?id=" + productid, true);
    request.send();
}



function option(o) {
    alert("ok");
    alert(o.value);
}

function addFilters(cid) {
    // var search = document.getElementById("s");
    var id = cid;
    // alert("ok");
    var op = document.getElementById("o").value;
    // alert(op);
    var age;
    if (document.getElementById("n").checked) {
        age = 1;

    } else if (document.getElementById("o").checked) {
        age = 2;
    } else {
        age = 0;
    }

    var qty;
    if (document.getElementById("l").checked) {
        qty = 1;

    } else if (document.getElementById("h").checked) {
        qty = 2;
    } else {
        qty = 0;
    }

    var condition;
    if (document.getElementById("b").checked) {
        condition = 1;

    } else if (document.getElementById("u").checked) {
        condition = 2;
    } else {
        condition = 0;
    }

    var price;
    if (document.getElementById("pl").checked) {
        price = 1;

    } else if (document.getElementById("ph").checked) {
        price = 2;
    } else {
        price = 0;
    }

    var f = new FormData();

    // f.append("s", search.value);
    f.append("a", age);
    f.append("q", qty);
    f.append("c", condition);
    f.append("p", price);
    f.append("cid", id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);

            var mainbox = document.getElementById("table1");
            mainbox.innerHTML = t;
        }
    };
    r.open("POST", "filterProcess.php", true);
    r.send(f);

}

function addFiltersSeller() {
    var search = document.getElementById("s");

    var age;
    if (document.getElementById("n").checked) {
        age = 1;

    } else if (document.getElementById("o").checked) {
        age = 2;
    } else {
        age = 0;
    }

    var qty;
    if (document.getElementById("l").checked) {
        qty = 1;

    } else if (document.getElementById("h").checked) {
        qty = 2;
    } else {
        qty = 0;
    }

    var condition;
    if (document.getElementById("b").checked) {
        condition = 1;

    } else if (document.getElementById("u").checked) {
        condition = 2;
    } else {
        condition = 0;
    }

    var f = new FormData();

    f.append("s", search.value);
    f.append("a", age);
    f.append("q", qty);
    f.append("c", condition);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            var mainbox = document.getElementById("mainbox");
            mainbox.innerHTML = t;
        }
    };
    r.open("POST", "filterprocessSeller.php", true);
    r.send(f);

}

function sendid(id) {

    var id = id;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "updateProduct.php";
            }
        }
    };
    r.open("GET", "sendproductprocess.php?id=" + id, true);
    r.send();

}

function changeStatus(id) {
    var productid = id;
    var statuscheck = document.getElementById("check");
    var statuslabel = document.getElementById("checklabel" + id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "deactive") {
                statuslabel.innerHTML = "Make your product active";

            } else if (t == "active") {
                statuslabel.innerHTML = "Make your product deactive"
            }
        }
    };
    r.open("GET", "statuschangeProcess.php?id=" + productid, true);
    r.send();
}

function qty_inc(qty) {
    var qpty = qty;

    var input = document.getElementById("qtytxt");

    if (input.value <= qpty) {
        if (input.value <= 2) {
            var newvalue = parseInt(input.value) + 1;

            input.value = newvalue.toString();

        } else {
            // alert("Maximum quantity count");
            var w = document.getElementById("wish").innerHTML = '<div id="message"> <div id="inner-message" class="alert alert-danger alert-dismissible fade show" role="alert" style="width:50%;margin-left:auto;margin-right:auto;height:50px;font-size:15px"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>         </svg> <strong>Maximum Quantity !</strong> <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button></div> </div>        ';

        }
    } else {
        // alert("Maximum quantity count");
        var w = document.getElementById("wish").innerHTML = '<div id="message"> <div id="inner-message" class="alert alert-info alert-dismissible fade show" role="alert" style="width:50%;margin-left:auto;margin-right:auto;height:50px;font-size:15px"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>         </svg> <strong>Minimum Quantity !</strong> <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button></div> </div>        ';

    }

    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);
}

function qty_dec() {

    var input = document.getElementById("qtytxt");

    if (input.value > 1) {
        var newvalue = parseInt(input.value) - 1;

        input.value = newvalue.toString();
    }

}

function loadinimg(id) {

    var pid = id;
    var img = document.getElementById("pimg" + pid).src;



    var mainimg = document.getElementById("mainimg");

    mainimg.style.backgroundImage = "url(" + img + ")";


}

function blockuser(email) {

    var mail = email;

    var f = new FormData();

    f.append("e", mail);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                window.location = "manageusers.php";
            }
        }
    };
    r.open("POST", "userBlockProcess.php", true);
    r.send(f);

}

function blockseller(email) {

    var mail = email;

    var f = new FormData();

    f.append("e", mail);

    var re = new XMLHttpRequest();

    re.onreadystatechange = function() {
        if (re.readyState == 4) {
            var te = re.responseText;

            if (te == 1) {

                window.location = "manageseller.php";
            }
        }
    };
    re.open("POST", "sellerBlockProcess.php", true);
    re.send(f);

}

function blockproduct(pid) {

    var id = pid;

    var f = new FormData();

    f.append("e", id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == 1) {

                window.location = "manageproducts.php";
            }
        }
    };
    r.open("POST", "productBlockProcess.php", true);
    r.send(f);

}

function searchuser() {
    var text = document.getElementById("searchtext").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                window.location = "manageusers.php";
            }

        }
    };
    r.open("GET", "searchuser.php?s=" + text, true);
    r.send();



}

function searchseller() {
    var text = document.getElementById("searchtext").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                window.location = "manageseller.php";
            }

        }
    };
    r.open("GET", "searchseller.php?s=" + text, true);
    r.send();



}

function searchProduct() {

    var text = document.getElementById("searchtxt").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                window.location = "manageproducts.php";
            }

        }
    };
    r.open("GET", "searchproduct.php?s=" + text, true);
    r.send();



}

function userback() {

    window.location = "userback.php";

}

function advancesearch() {

    var keyword = document.getElementById("k").value;
    var category = document.getElementById("c").value;
    var brand = document.getElementById("b").value;
    var model = document.getElementById("m").value;
    var condition = document.getElementById("con").value;
    var color = document.getElementById("col").value;
    var pricefrom = document.getElementById("pf").value;
    var priceto = document.getElementById("pt").value;

    var f = new FormData();

    f.append("k", keyword);
    f.append("c", category);
    f.append("b", brand);
    f.append("m", model);
    f.append("con", condition);
    f.append("clr", color);
    f.append("pf", pricefrom);
    f.append("pt", priceto);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);


        }
    };
    r.open("POST", "advancedsearchProcess.php", true);
    r.send(f);


}

function dailysellings() {

    var from = document.getElementById("fromdate");
    var to = document.getElementById("todate");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                window.location = "sellinghistory.php";
            }
        }
    }

    r.open("GET", "dailysellingsprocess.php?f=" + from + "&t" + to, true);
    r.send();

}
// feedback
var k;

function addFeedback(id) {

    var feedmodel = document.getElementById("feedbackmodal" + id);

    k = new bootstrap.Modal(feedmodel);
    k.show();

}

// saveFeedBack

function savefeedback(id) {

    var pid = id;
    var feedtxt = document.getElementById("feedtxt").value;

    var f = new FormData();

    f.append("i", pid);
    f.append("ft", feedtxt);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                k.hide();
                alert("Thanks for the feedback");
            }
        }
    };

    r.open("POST", "savefeedbackprocess.php", true);
    r.send(f);

}
var dm1

function addcategory() {

    var dm1 = document.getElementById("addcat");
    k = new bootstrap.Modal(dm1);
    k.show();


}

function add() {
    var n = document.getElementById("name").value;
    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var t = request.responseText;
            if (t == "success") {
                alert("pl");
                k.hide();
                window.location = "manageproducts.php";
            } else {
                alert(t);
            }

        }
    };
    request.open("GET", "addcategory.php?name=" + n, true);
    request.send();
}

function mssgseller() {
    window.location = "messageSeller.php";
}