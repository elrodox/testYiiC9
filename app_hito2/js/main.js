/**
 * Created by elrodox on 26/11/14.
 */

$("a").click(function(e){
    e.preventDefault();
    $(".active").removeClass("active");
    $(this).parent().addClass("active");
    var link = $(this).attr("href");
    
    $.get(link, {ajax:1}, function(resp, estado){
        $("#contenido").fadeOut(300, function(){
            $("#contenido").html(resp);
            $("#contenido").fadeIn(300);
        });
    });
    
});

$("body").on("submit", "#formulario", function(e){
    e.preventDefault();
    e.stopPropagation();
    var data=$("#formulario").serialize();
    console.log(data);
    $.post(
        $(this).attr("action"), // "index.php?r=persona/create"
        data, // data
        function(resp, estado){
            console.log('estado: '+estado);
            console.log('resp: '+resp);
            $("tbody.lista-personas").append(resp);
        }
    );
    // $.ajax({
    //     type: 'POST',
    //     url: $(this).attr("action"),
    //     data:data,
    //     success:function(data, estado){
    //         console.log("estado: "+estado);
    //         console.log("resp: "+data);
    //         $("tbody.lista-personas").append(data);
    //     },
    //     error: function(data) { // if error occured
    //         alert("Error occured.please try again");
    //         alert(data);
    //     },
    //     dataType:'html'
    // });
});
$("body").on("click", "#editar", function(e){
    alert("oli");
});

$("body").on("click", "#eliminar", function(e){
    var tr = $(this).parent().parent();
    var valorID = tr.find("td.id").html();
    console.log("id: "+valorID);
    $.get(
        $(this).attr("href"),
        {
            id: valorID
        },
        function(resp, estado){
            console.log(estado);
            console.log(""+ resp);
            tr.fadeOut(1000, function(){
                tr.remove()
            });
        }
    );
});
