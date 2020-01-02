<div id="dropzone">
    <form id="myDropzone" class="dropzone needsclick" action="/{{$pathUpload}}">
        @if($pathUpload == 'feedUploadPhoto')
        <input type="text" name="descrizione" id="descrizione" class="form-control" placeholder="Descrizione foto..."
            autocomplete="off" maxlength="250">
        @endif
        {{ csrf_field() }}
    </form>
</div>

<script type="text/javascript" src="js/cocoon/dropzone.js"></script>
<script type="text/javascript" src="js/cocoon/cropper.js"></script>

<script>
    Dropzone.options.myDropzone = {
        init: function() {
            this.on("success", function(files, response) {
                if(response === 'success') {
                    this.on("success", window.setTimeout("window.location.href='/{{$pathToReturn}}'", 1000));
                }
            });
        },
        transformFile: function(file, done) {
            // Create Dropzone reference for use in confirm button click handler
            var myDropZone = this;

            // Create the image editor overlay
            var editor = document.createElement('div');
            editor.style.position = 'fixed';
            editor.style.left = 0;
            editor.style.right = 0;
            editor.style.top = 0;
            editor.style.bottom = 0;
            editor.style.zIndex = 9999;
            editor.style.backgroundColor = '#000';
            document.body.appendChild(editor);

            // Create confirm button at the top left of the viewport
            var buttonConfirm = document.createElement('button');
            buttonConfirm.style.position = 'absolute';
            buttonConfirm.style.left = '10px';
            buttonConfirm.style.top = '10px';
            buttonConfirm.style.zIndex = 9999;
            buttonConfirm.textContent = 'Conferma';
            buttonConfirm.className = 'btn btn-primary';
            editor.appendChild(buttonConfirm);
            buttonConfirm.addEventListener('click', function() {
                // Get the canvas with image data from Cropper.js
                var canvas = cropper.getCroppedCanvas({
                    width: 512,
                    height: 512
                });

                // Turn the canvas into a Blob (file object without a name)
                canvas.toBlob(function(blob) {
                    // Create a new Dropzone file thumbnail
                    myDropZone.createThumbnail(
                        blob,
                        myDropZone.options.thumbnailWidth,
                        myDropZone.options.thumbnailHeight,
                        myDropZone.options.thumbnailMethod,
                        false, 
                        function(dataURL) {
                            // Update the Dropzone file thumbnail
                            myDropZone.emit('thumbnail', file, dataURL);
                            // Return the file to Dropzone
                            done(blob);
                        });
                    });

                    // Remove the editor from the view
                      document.body.removeChild(editor);
                });

            // Create an image node for Cropper.js
            var image = new Image();
            image.src = URL.createObjectURL(file);
            editor.appendChild(image);
  
            // Create Cropper.js
            var cropper = new Cropper(image, { aspectRatio: 1 });
        }
    };
</script>