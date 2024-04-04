var bm;

function code() {

    var email = document.getElementById("e").value;

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {
                // alert("verification email sent,please check your inbox.")

                var m = document.getElementById("codeModal");
                bm = new bootstrap.Modal(m);
                bm.show();

            } else {
                var w = document.getElementById("wish").innerHTML = '<div id="message"> <div id="inner-message" class="alert alert-danger alert-dismissible fade show" role="alert" style="width:50%;margin-left:auto;margin-right:auto;height:50px;font-size:15px"> <svg xmlns="http://www.w3.org/2000/svg" id="info-fill"  width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:"> <use xlink:href="#exclamation-triangle-fill"/>         </svg> <strong>' + text + '</strong> <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button></div> </div>        ';

            }
        }
    }
    r.open("GET", "adminverificationprocess.php?e=" + email, true);
    r.send();

    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);
}

function codemodal() {

    var vc = document.getElementById("vc");
    var e = document.getElementById("e");



    var formData = new FormData();
    formData.append("c", vc.value);
    formData.append("e", e.value);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == 1) {

                bm.hide();
                window.location = "adminpanel.php";

            } else {
                var w = document.getElementById("wish").innerHTML = '<div id="message"> <div id="inner-message" class="alert alert-danger alert-dismissible fade show" role="alert" style="width:50%;margin-left:auto;margin-right:auto;height:50px;font-size:15px"> <svg xmlns="http://www.w3.org/2000/svg" id="info-fill"  width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:"> <use xlink:href="#exclamation-triangle-fill"/>         </svg> <strong>' + text + '</strong> <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button></div> </div>        ';

            }
        }
    };
    r.open("POST", "codeverify.php", true);
    r.send(formData);

    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);

}
var dm1

function mssg() {

    var dm1 = document.getElementById("mssgmodal");
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

                var w = document.getElementById("wish").innerHTML = '<div id="message"> <div id="inner-message" class="alert alert-success alert-dismissible fade show" role="alert" style="width:50%;margin-left:auto;margin-right:auto;height:50px;font-size:15px"> <svg xmlns="http://www.w3.org/2000/svg" id="info-fill"  width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:"> <use xlink:href="#exclamation-triangle-fill"/>         </svg> <strong>Category Added successfully</strong> <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button></div> </div>        ';

                setTimeout(function() {
                    window.location.reload(1);
                }, 300);




            } else {
                var w = document.getElementById("wish").innerHTML = '<div id="message"> <div id="inner-message" class="alert alert-danger alert-dismissible fade show" role="alert" style="width:50%;margin-left:auto;margin-right:auto;height:50px;font-size:15px"> <svg xmlns="http://www.w3.org/2000/svg" id="info-fill"  width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:"> <use xlink:href="#exclamation-triangle-fill"/>         </svg> <strong>' + t + '</strong> <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button></div> </div>        ';

            }

        }
    };
    request.open("GET", "addcategory.php?name=" + n, true);
    request.send();

    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);
}

function addBrand() {
    var n = document.getElementById("nameBrand").value;
    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var t = request.responseText;
            if (t == "success") {
                var w = document.getElementById("wish").innerHTML = '<div id="message"> <div id="inner-message" class="alert alert-success alert-dismissible fade show" role="alert" style="width:50%;margin-left:auto;margin-right:auto;height:50px;font-size:15px"> <svg xmlns="http://www.w3.org/2000/svg" id="info-fill"  width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:"> <use xlink:href="#exclamation-triangle-fill"/>         </svg> <strong>Brand Added successfully</strong> <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button></div> </div>        ';

                setTimeout(function() {
                    window.location.reload(1);
                }, 300);


            } else {
                var w = document.getElementById("wish").innerHTML = '<div id="message"> <div id="inner-message" class="alert alert-danger alert-dismissible fade show" role="alert" style="width:50%;margin-left:auto;margin-right:auto;height:50px;font-size:15px"> <svg xmlns="http://www.w3.org/2000/svg" id="info-fill"  width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:"> <use xlink:href="#exclamation-triangle-fill"/>         </svg> <strong>' + t + '</strong> <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button></div> </div>        ';

            }

        }
    };
    request.open("GET", "addBrand.php?name=" + n, true);
    request.send();

    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);
}

function addModel() {

    var n = document.getElementById("nameModel").value;
    var s = document.getElementById("s").value;


    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var t = request.responseText;
            if (t == "success") {
                var w = document.getElementById("wish").innerHTML = '<div id="message"> <div id="inner-message" class="alert alert-success alert-dismissible fade show" role="alert" style="width:50%;margin-left:auto;margin-right:auto;height:50px;font-size:15px"> <svg xmlns="http://www.w3.org/2000/svg" id="info-fill"  width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:"> <use xlink:href="#exclamation-triangle-fill"/>         </svg> <strong>Model  Added  Successfuly</strong> <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button></div> </div>        ';

                n.innerHTML = null;

                // window.location = "addNew.php";



            } else {
                var w = document.getElementById("wish").innerHTML = '<div id="message"> <div id="inner-message" class="alert alert-danger alert-dismissible fade show" role="alert" style="width:50%;margin-left:auto;margin-right:auto;height:50px;font-size:15px"> <svg xmlns="http://www.w3.org/2000/svg" id="info-fill"  width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:"> <use xlink:href="#exclamation-triangle-fill"/>         </svg> <strong>' + t + '</strong> <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button></div> </div>        ';

            }

        }
    };
    request.open("GET", "addModel.php?name=" + n + "&select=" + s, true);
    request.send();

    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);
}