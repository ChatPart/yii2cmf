/**
 * Created by xq on 16-12-6.
 */
$(function(){
    var uri = $("#cate-uri");
    //uri.val()
    $("select[name='Cate[type]']").change(function(){
        var cheched = $(this).children(":selected").val();
        //var cheched = $("select[name$='Cate[type]']:selected").val();
        //alert(cheched);

        var id = $('#model_id').val();
        //alert(id);
        switch (cheched){
            case '1':
                uri.text('/document/list?cate='+id);
                //uri.attr('disabled',1);
                break;
            case '2':
                //uri.attr('disabled',1);
                uri.text(null);
                break;
            case '3':
                uri.attr('disabled',false);
                uri.text(null);
                break;
            case '4':
                //alert(1);
               // uri.text('frontend/info?cate='+id);
               uri.attr('disabled',1);
                break;
            /*default:
                uri.attr('disabled',false);
                uri.val(null);*/
        }
    })

    /*if(cheched=='1'){

    }*/
})