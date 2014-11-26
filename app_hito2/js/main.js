/**
 * Created by elrodox on 26/11/14.
 */


$("#persona-form").submit(function(e){
    e.preventDefault();
    var data=$("#persona-form").serialize();
    $.ajax({
        type: 'POST',
        url: "http://localhost/DW/hito2/app_hito2/index.php?r=persona/create",
        data:data,
        success:function(data, estado){
            console.log("estado: "+estado);
            console.log("resp: "+data);
            $("tbody.lista-personas").append(data);
        },
        error: function(data) { // if error occured
            alert("Error occured.please try again");
            alert(data);
        },
        dataType:'html'
    });
});