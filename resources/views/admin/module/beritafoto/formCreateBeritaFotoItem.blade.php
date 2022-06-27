<form action="{{ isset($foto) && $mode=='edit'? 
    route('admin.transaksi.beritafoto.updateFoto') : 
    route('admin.transaksi.beritafoto.storeFoto') }}" method="post" enctype="multipart/form-data">
    @csrf




    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Judul</label>
        <div class="col-sm-10">
            <input type="hidden" name="beritafotos_id" value="{{ isset($berita)? $berita->id: $foto->beritafotos_id }}">
            
            <input type="hidden" name="foto_item_id" value="{{ isset($foto)? $foto->id:'' }}">
            
            <input type="text" class="form-control" id="title" 
            onchange="slugify(this)"
                onkeyup="slugify(this)" placeholder="Judul"
                name="title" value="{{ isset($foto)?$foto->title:'' }}">
                slug:
            <input type="text" readonly 
                style="border:none; font-style:italic; font-size:1rem;" 
                class="form-control" id="slug" placeholder="Slug Judul"
                name="slug" value="{{ isset($foto)?$foto->slug:'' }}">
            <div>Slug ini penting untuk alamat akses atau url identitas, misalnya : <br> www.xeample.go.id/berita/<i>judul-berita-terbaru-ini</i></div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Keterangan / cuplikan berita</label>
        <div class="col-sm-10">
            <textarea type="text" class="form-control" id="desc" placeholder="Keterangan untuk cuplikan berita"
                name="img_desc" cols="30" rows="3">{{ isset($foto)?$foto->img_desc:'' }}</textarea>
            <div>Keterangan singkat: ini berguna untuk meta desc / cuplikan berita mempermudah penelusuran di mesin pencari atau SEO</div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Foto</label>
        <div class="col-sm-10">
            <input type="file" onchange="displayImage(this);" accept="image/x-png,image/gif,image/jpeg,image/jpg"
                class="form-control" id="file" placeholder="" name="file">

                <br>
            <div id="img_value">


               

                

            @if(isset($foto) && $foto->img_thumb != "" )
                <div>Foto aktif sekarang</div>
                <a target="_blank" href=" {{ $base_link_media_thumbnail .$foto->img_thumb}}">
                <img id="canvas" style="border:none; height:20vh; width:50wv;" 
                src="{{$base_link_media_thumbnail .$foto->img_thumb}}" />
            </a>
            @endif
        
            </div>
            <br>
        </div>
    </div>



    <br>
    <button type="submit" class="btn btn-primary">  
        {{ isset($foto) && $mode=='edit'? 
        " Perbarui Foto Berita" : 
        " Tambah Foto Berita" }}
    </button>
    <a href="{{isset($foto) ?  route('admin.transaksi.beritafoto.addFoto.{id}',$foto->id) : 
    route('admin.transaksi.beritafoto.index') }}" class="btn btn-default">
        Batal
    </a>
    

    <br>
    <br>

</form>

<br><br>


<script>


function goBack(){
    document.referrer;
}

function isBeritaVideo(elem){
    if(elem.value == "no"){
        $("#prop_src_video").hide();
    }else{
        $("#prop_src_video").show();
    }
}


function slugify(elem)
{
    var str = elem.value;

    str = str.replace(/^\s+|\s+$/g, '');

    // Make the string lowercase
    str = str.toLowerCase();

    // Remove accents, swap ñ for n, etc
    var from = "ÁÄÂÀÃÅČÇĆĎÉĚËÈÊẼĔȆÍÌÎÏŇÑÓÖÒÔÕØŘŔŠŤÚŮÜÙÛÝŸŽáäâàãåčçćďéěëèêẽĕȇíìîïňñóöòôõøðřŕšťúůüùûýÿžþÞĐđßÆa·/_,:;";
    var to   = "AAAAAACCCDEEEEEEEEIIIINNOOOOOORRSTUUUUUYYZaaaaaacccdeeeeeeeeiiiinnooooooorrstuuuuuyyzbBDdBAa------";
    for (var i=0, l=from.length ; i<l ; i++) {
        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }

    // Remove invalid chars
    str = str.replace(/[^a-z0-9 -]/g, '') 
    // Collapse whitespace and replace by -
    .replace(/\s+/g, '-') 
    // Collapse dashes
    .replace(/-+/g, '-'); 

    $("#slug").val(str)

    // document.getElementById("slug").value = str;

    return str;
}


function displayImage(elem) {
    const [file] = elem.files
    console.log(elem.files)
    var image = document.getElementById("canvas");
    if(file){
        var img = `
        <div>
            <img id="canvas" 
        style="border:none; height:20vh; width:50wv;" 
        src="${URL.createObjectURL(file)}" />
        </div>
        
        

        `;
        $("#img_value").html(img);
        // image.src = URL.createObjectURL(file) ;  
    }else{
        image.src = "#" ;  
    }



    
        
}

function displayVideo(elem) {
    const [file] = elem.files
    console.log(elem.files)
    var image = document.getElementById("canvas");
    if(file){
        var img = `
        <div>
            <video id="canvas_video" 
        style="border:none; height:20vh; width:50wv;" 
        src="${URL.createObjectURL(file)}" ></video>
        </div>

        `;
        $("#video_value").html(img);
        // image.src = URL.createObjectURL(file) ;  
    }else{
        image.src = "#" ;  
    } 
}

function setUpTextEditor(){

    // console.log(CKEDITOR);

    // var content_field = document.getElementById("konten");
    // CKEDITOR.replace(content_field,{
    //     language:'en-gb'
    // });
    // CKEDITOR.config.allowedContent = true;

    CKEDITOR.replace( 'content' );
}




</script>