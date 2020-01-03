<!DOCTYPE html>
<html>
<head>
	<title></title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
	<!--
<img id="uploadPreview" style="width: 100px; height: 100px;" />
<input id="uploadImage" type="file" name="myPhoto" onchange="PreviewImage();" />
<canvas id="myCanvas" width="800" height="600" style="border:1px solid;"> -->
	<canvas id="canvas" width=300 height=400></canvas>
<br>Original apect:<br>
<img id="image" src="http://i.imgur.com/5xZxGCa.jpg" style="width:500px;height:auto">
<script type="text/javascript">
	$(document).ready(function(){
		var canvas = document.getElementById('canvas');
	var ctx1 = canvas.getContext('2d'),img = new Image;

img.onload = draw;
img.src = 'http://i.imgur.com/5xZxGCa.jpg';
	});
	

function draw() {
    //drawImageProp(ctx, this, 0, 0, canvas.width, canvas.height);
    drawImageProp(ctx1, this, 0, 0, canvas.width, canvas.height, 0.1, 0.5);
}

/**
 * By Ken Fyrstenberg Nilsen
 *
 * drawImageProp(context, image [, x, y, width, height [,offsetX, offsetY]])
 *
 * If image and context are only arguments rectangle will equal canvas
*/
function drawImageProp(ctx, img, x, y, w, h, offsetX, offsetY) {

    if (arguments.length === 2) {
        x = y = 0;
        w = ctx.canvas.width;
        h = ctx.canvas.height;
    }

    /// default offset is center
    offsetX = typeof offsetX === 'number' ? offsetX : 0.5;
    offsetY = typeof offsetY === 'number' ? offsetY : 0.5;

    /// keep bounds [0.0, 1.0]
    if (offsetX < 0) offsetX = 0;
    if (offsetY < 0) offsetY = 0;
    if (offsetX > 1) offsetX = 1;
    if (offsetY > 1) offsetY = 1;

    var iw = img.width,
        ih = img.height,
        r = Math.min(w / iw, h / ih),
        nw = iw * r,   /// new prop. width
        nh = ih * r,   /// new prop. height
        cx, cy, cw, ch, ar = 1;

    /// decide which gap to fill    
    if (nw < w) ar = w / nw;
    if (nh < h) ar = h / nh;
    nw *= ar;
    nh *= ar;

    /// calc source rectangle
    cw = iw / (nw / w);
    ch = ih / (nh / h);

    cx = (iw - cw) * offsetX;
    cy = (ih - ch) * offsetY;

    /// make sure source rectangle is valid
    if (cx < 0) cx = 0;
    if (cy < 0) cy = 0;
    if (cw > iw) cw = iw;
    if (ch > ih) ch = ih;

    /// fill image in dest. rectangle
    ctx.drawImage(img, cx, cy, cw, ch,  x, y, w, h);
}
/*
    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
alert(oFREvent.target.result);
        };

    };
    */
</script>
</body>
</html>