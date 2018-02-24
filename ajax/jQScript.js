/**
 * Created by luv.sharma on 2/8/18.
 */
$(document).ready(function(){
    $("#button2").click(function(){
        $("#div1").load("ajax_info.txt");
    });

    //NOT WORKING
    $("#button3").click(function(){
        $("#div3").load("demo_test.txt");
    });


    $("#button4").click(function(){
        $("#div4").load("demo_test.txt", function(responseTxt, statusTxt, xhr){
            if(statusTxt == "success")
                alert("External content loaded successfully!");
            if(statusTxt == "error")
                alert("Error: " + xhr.status + ": " + xhr.statusText);
        });
    });
});