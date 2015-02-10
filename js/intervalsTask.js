var intervalsTask = {
    saveTitle: function(elem){
        //6045636&update=true&title=DDDUMMYTASK
        var inputTitle = $("#inputTitle-" + elem).val();
        var obj = {title: inputTitle}
        
        //this works but ajax a url that then curls
        $.ajax({
            type: "POST",
            url: "/taskOpen.php?taskid=" + elem + "&update=true&title=" + inputTitle,
            data: '',
            success: function(data) {
            }
        });
        /*
        can't use this method because of authentication
        $.ajax({
            type: "PUT",
            contentType: "application/json",
            url: "https://api.myintervals.com/task/" + elem + "/",
            data: JSON.stringify(obj),
            success: function(data) {
            }
        }); */
    }
}