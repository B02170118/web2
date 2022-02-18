/**
* 發送簡訊 api
*/
$("#send").click(function(){
    if (!$("#floatingphone").val()) {
        alert('未輸入手機');
    }else{
        // let chatAjaxUrl = "{{route('api.chat.sendMessage')}}";
        // $.post(chatAjaxUrl,{
        //     message:message,
        //     chatChannelKey:"{{$chatKey}}",
        //     "_token": $('#token').val()
        // }, function(result) {
        //     console.log(result);
        // });
    }
});

