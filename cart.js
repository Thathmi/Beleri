//deletefromCart

function deletefromCart(id) {

    var cid = id;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                //window.location = "cart.php";
                window.location.reload();
            }
        }
    }

    r.open("GET", "deleteFromCartProcess.php?id=" + cid, true);
    r.send();
}

function detailsmodel(id) {
    alert(id);
}
var dm;

function deletemodal(id) {
    // alert("ok");
    var dm = document.getElementById("deleteModal" + id);
    k = new bootstrap.Modal(dm);
    k.show();
    // alert("pl");
}

function remove() {
    // alert("giya");
    var dm = document.getElementById("deleteModal");
    k = new bootstrap.Modal(dm);
    k.hide();
}

// function qtyload() {
//     setInterval(qtyno, 1000);
// }

// function qtyno() {

//     var qty = document.getElementById("qtyinput").value;
//     // alert(qty);
//     var r = new XMLHttpRequest();

//     r.onreadystatechange = function() {
//         if (r.readyState == 4) {
//             var t = r.responseText;

//         }
//     }

//     r.open("GET", "cart.php?q=" + qty, true);
//     r.send();
// }