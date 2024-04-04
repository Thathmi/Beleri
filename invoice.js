function printDiv() {
    // var divContets = document.getElementById("GFG").innerHTML;
    // var a = window.open('', '', 'height=500,width=500');
    // a.document.write('<html>');
    // // a.document.write('<body><h1>Div contetnts are <br/>');
    // a.document.write(divContets);
    // a.document.write('</body></html>');
    // a.document.close();
    // a.print();

    var restorepage = document.body.innerHTML;
    var page = document.getElementById("GFG").innerHTML;
    document.body.innerHTML = page;
    window.print();
    document.body.innerHTML = restorepage;
}