function goToAddProduct() {
    window.location = "addproduct%20.php";
}

function signout() {
    window.location = "signOut.php";
}

function basic_search() {
    var searchSelect = document.getElementById("basic_search_select").value;
    var searchText = document.getElementById("basic_search_txt").value;
    var cardrow = document.getElementById("pdetails");
    cardrow.className = "d-none";
    var cardcat = document.getElementById("pcat");
    cardcat.className = "d-none";

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            var ar = JSON.parse(t);

            // alert(ar);

            for (var i = 0; i < ar.length; i++) {


                var divrow = document.createElement("div");
                divrow.className = "row";
                var div = document.createElement("div");
                div.className = "card col-6 col-lg-2  mt-1 mb-1 ms-1";
                var img = document.createElement("img");
                img.src = "resources/mobile images/" + ar[i]["image"];
                var div1 = document.createElement("div");
                div1.className = "card-body";

                var h5 = document.createElement("h5");
                h5.className = "card-title";
                h5.innerHTML = ar[i]["title"];

                var span1 = document.createElement("span");
                span1.innerHTML = "New";

                var span2 = document.createElement("span");
                span2.className = "card-text text-primary";
                span2.innerHTML = ar[i]["price"];

                var br = document.createElement("br");

                // var span3 = document.createElement("span");
                // span3.className = "card-text text-warning";
                // span3.innerHTML = "In Stock";

                var input = document.createElement("input");
                input.type = "number";
                input.value = ar[i]["qty"];
                input.className = "form-control mb-1";

                var a1 = document.createElement("a");
                a1.className = "btn btn-success d-grid mt-2 disabled";
                a1.innerHTML = "Buy Now"

                var a2 = document.createElement("a");
                a2.className = "btn btn-danger d-grid mt-2 disabled";
                a2.innerHTML = "Add To Cart";

                divrow.appendChild(div);
                div.appendChild(div1);
                div.appendChild(img);
                div1.appendChild(h5);
                h5.appendChild(span1);
                div1.appendChild(span2);
                div1.appendChild(br);
                div1.appendChild(span3);
                div1.appendChild(input);
                div1.appendChild(a1);
                div1.appendChild(a2);

                document.getElementById("pdiv").appendChild(div);

            }

        }
    };
    r.open("GET", "basicSearchProcess.php?t=" + searchText + "&s=" + searchSelect, true);
    r.send();
}

function search() {

    var search = document.getElementById("search").value;
    var searchSelect = document.getElementById("basic_search_select").value;
    // alert(searchSelect);
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            var table = document.getElementById("table");
            table.innerHTML = text;
        }
    };

    r.open("GET", "basicsearch.php?i=" + search + "&t=" + searchSelect, true);

    r.send();
}

function searchpage(pid) {
    var id = pid;
    var search = document.getElementById("search").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {

            var text = r.responseText;
            var table = document.getElementById("table1");
            table.innerHTML = text;
        }
    };

    r.open("GET", "basicsearchcategory.php?i=" + search + "&t=" + id, true);

    r.send();
}

function addtoWatchlist(id) {

    var pid = id;
    var heart = document.getElementById("wishheart");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                // window.location = "watchlist.php";
                // $(wishheart).find("i").toggleClass("bi bi-suit-heart-fill");
                heart.removeClass = 'bi bi-suit-heart';
                heart.addClass = 'bi bi-suit-heart-fill';
            } else {
                // alert(t);

                // Swal.fire('Any fool can use a computer')
                var w = document.getElementById("wish").innerHTML = '<div id="message"> <div id="inner-message" class="alert alert-warning alert-dismissible fade show" role="alert" style="width:50%;margin-left:auto;margin-right:auto;height:50px;font-size:15px"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>         </svg> <strong>Item is already on the wishlist!</strong> <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button></div> </div>        ';


            }
        }
    };

    r.open("GET", "addToWatchlistProcess.php?id=" + pid, true);
    r.send();

    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);
}


// addToCart

function addToCart(id) {

    var qtytxt = document.getElementById("qtytxt").value;

    var pid = id;

    // alert(qtytxt);
    // alert(pid);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                window.location = "cart.php";
                // window.location.reload();
            } else {
                var w = document.getElementById("wish").innerHTML = '<div id="message"> <div id="inner-message" class="alert alert-info alert-dismissible fade show" role="alert" style="width:50%;margin-left:auto;margin-right:auto;height:50px;font-size:15px"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>         </svg> <strong>Item is already on the cart!</strong> <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button></div> </div>        ';

            }
        }
    }

    r.open("GET", "addToCartProcess.php?id=" + pid + "&txt=" + qtytxt, true);
    r.send();

    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);
}

function addToCartwish(id) {

    var qtytxt = 1;

    var pid = id;

    // alert(qtytxt);
    // alert(pid);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                window.location = "cart.php";
                // window.location.reload();
            } else {
                var w = document.getElementById("wish").innerHTML = '<div id="message"> <div id="inner-message" class="alert alert-info alert-dismissible fade show" role="alert" style="width:50%;margin-left:auto;margin-right:auto;height:50px;font-size:15px"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>         </svg> <strong>Item is already on the cart!</strong> <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button></div> </div>        ';

            }
        }
    }

    r.open("GET", "addToCartProcess.php?id=" + pid + "&txt=" + qtytxt, true);
    r.send();

    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);
}


function cart() {
    window.location = "cart.php";
}

function wish() {
    window.location = "watchlist.php";
}

function cat(cid) {
    var id = cid;

    var f = new FormData();

    f.append("c", cid);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
            if (r.readyState == 4) {
                var t = r.responseText;
                window.location = "categoryPage.php";
                // alert(t);
                // if (t == 1) {
                //
                // }


            }
        }
        // alert(id);
    r.open("POST", "cat.php", true);
    r.send(f);


}