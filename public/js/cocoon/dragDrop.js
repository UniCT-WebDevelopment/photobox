(function() {

    // getElementById
    function $id(id) {
        return document.getElementById(id);
    }


    // output information
    function Output(msg) {
        var m = $id("messages");
        m.innerHTML = msg + m.innerHTML;
    }


    // file drag hover
    function FileDragHover(e) {
        e.stopPropagation();
        e.preventDefault();
        e.target.className = (e.type == "dragover" ? "hover" : "");
    }


    // file selection
    function FileSelectHandler(e) {

        // cancel event and hover styling
        FileDragHover(e);

        // fetch FileList object
        var files = e.target.files || e.dataTransfer.files;

        if(files[0] != undefined)
            $('#filename p').remove();

        if(files[0].type == "image/png" || files[0].type == "image/jpg" || files[0].type == "image/jpeg"){
            $('#filename').append("<p>Name: <strong>" + files[0].name + "</strong></p>");

            submitbutton.style.display = "block";
        } else {
            $('#filename').append("<strong> <p style=\"color:red\">Formato file non accettato</p></strong>");
            submitbutton.style.display = "none";
            files = undefined;
        }

        console.log(files);
    }


    // output file information
    function ParseFile(file) {

        var totalBytes = file.size;
        var size = 0;
        if(totalBytes < 1000000){
            size = Math.floor(totalBytes/1000) + 'KB</strong>';
        }else{
            size = Math.floor(totalBytes/1000000) + 'MB</strong>';
        }

        Output(
            "<p>File information: <strong>" + file.name +
            "</strong> Type: <strong>" + file.type +
            "</strong> Size: <strong>" + size +
            "</p>"
        );

    }




    // initialize
    function Init() {

        var fileselect = $id("fileselect"),
            filedrag = $id("filedrag"),
            submitbutton = $id("submitbutton");

        // file select
        fileselect.addEventListener("change", FileSelectHandler, false);

        // is XHR2 available?
        var xhr = new XMLHttpRequest();
        if (xhr.upload) {

            // file drop
            filedrag.addEventListener("dragover", FileDragHover, false);
            filedrag.addEventListener("dragleave", FileDragHover, false);
            filedrag.addEventListener("drop", FileSelectHandler, false);
            filedrag.style.display = "block";

            // remove submit button
            submitbutton.style.display = "none";
            fileselect.style.display = "none";
        }

    }

    // call initialization file
    if (window.File && window.FileList && window.FileReader) {
        Init();
    }


})();