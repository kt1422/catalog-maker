<div class="container-fluid px-5 mt-3">
    <h1>Catalog</h1>
    <hr>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="d-flex bg-body-secondary flex-column p-3 rounded-3 shadow">
            <div class="mb-3">
                <label for="header" class="form-label">Header</label>
                <input type="text" class="form-control" name="header" id="header" placeholder="Enter your header or title" required>
            </div>
            <div class="mb-3">
                <label for="pager" class="form-label">Page starts at</label>
                <input type="number" class="form-control" name="pager" id="pager" value="1" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Images</label>
                <input type="file" class="form-control" name="image[]" id="image" accept="image/png, image/jpeg" onchange="getFiles(event.target.files)" multiple required>
            </div>
            <div id="imgfile"></div>
            <div>
                <button type="submit" name="generate" class="btn btn-primary" disabled>Generate PDF</button>
                <!-- <a class="btn btn-primary pt-2" href="./views/generate_pdf.php" target="_blank">Generate Report</a> -->
            </div>
        </div>
    </form>
</div>
<script>
    function getFiles(files){
        $('div.images').remove();
        for(let i=0; i<files.length; i++){
            $("#imgfile").append('<div class="d-flex gap-3 mb-3 images">'+
            '<div><img class="thumbnail" src="'+URL.createObjectURL(files[i])+'"></div>'+
            '<div class="col"><label for="img'+(i+1)+'" class="form-label">Image '+(i+1)+': </label>'+
            '<input type="text" class="form-control" id="img'+(i+1)+'" name="items[]" value="'+files[i].name+'" placeholder="Enter item name"></div>'+
            '</div>');
        }
        if(files.length > 0){
            $(":submit").removeAttr("disabled");
        }else{
            $(":submit").attr("disabled", true);
        }
    }
</script>