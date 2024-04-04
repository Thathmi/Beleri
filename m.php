<!DOCTYPE html>

<html>

<head>
    <title>Beleri | Messages</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="resources/2.jpg" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
</head>
<style>
#wrapper {
    max-width: 800px;
    min-height: 500px;
    display: flex;
    margin: auto;
}

#left_pannel {
    min-height: 400px;
    background-color: red;
    flex: 1;
    text-align: center;

}

#profile_img {
    width: 50%;
    height: 70px;
    border: solid thin none;
    border-radius: 50%;
    margin: 10px;
}

#left_pannel label {
    width: 100%;
    height: 20px;
    display: block;
    font-size: 13px;
    background-color: grey;
    border-bottom: solid thin white;
    cursor: pointer;
    padding: 5px;
    transition: all 1s ease;
}

#left_pannel label:hover {
    background-color: white;


}

#left_pannel label img {
    float: right;
    width: 25px;

}

#right_pannel {
    min-height: 400px;
    background-color: green;
    flex: 4;

}

#header {
    background-color: blue;
    height: 70px;
    text-align: center;
    color: white;
}

#inner_left_pannel {
    background-color: purple;
    flex: 1;
    min-height: 430px;

}

#inner_right_pannel {
    background-color: pink;
    min-height: 430px;
    flex: 2;
    transition: all 2s ease;
}
#radio_chat:checked ~ #inner_right_pannel {
 flex: 0;
}
</style>

<body>

    <div id="wrapper">
        <div id="left_pannel">
            <div style="padding: 10px;">
                <img id="profile_img" src="resources/demoProfileImg.jpg" alt="">
                <br />
                <span style="font-size: 15px;color:white">name</span>
                <br />
                <span style="opacity:0.5;font-size: 13px">email</span>

                <div>
                    <br>
                    <!-- me lable walata icons dnna -->
                    <label id="label_chat"  for="radio_chat">chat <img src="" alt=""></label>
                    <label id="label_settings" for="radio_settings">cob <img src="" alt=""></label>
                    <!-- <label for="">set <img src="" alt=""></label> -->
                </div>

            </div>
        </div>

        <div id="right_pannel">

            <div id="header">Messages</div>

            <div id="container" style="display: flex;">

                <input type="radio" id="radio_chat" name="myradio" style="display: none;">
                <input type="radio" id="radio_settings" name="myradio" style="display: none;">

                <div id="inner_left_pannel">


                </div>
                <div id="inner_right_pannel"></div>
            </div>
        </div>
    </div>


    <script src="bootstrap.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>
<script>

function _(element){
   return document.getElementById(element);
}


var label = _("label_chat");
label.addEventListener("click",function(){

    var inner_pannel = _("inner_left_pannel");

    var ajax = new XMLHttpRequest();
ajax.onload = function(){

    if(ajax.status ==200 || ajax.readyState ==4){
        inner_pannel.innerHTML = ajax.responseText;
    }
}
ajax.open("POST","mFile.php",true);
ajax.send();

});
   

inner_pannel.innerHTML = "this is some data";
</script>