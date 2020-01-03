var canvas = new fabric.Canvas('c');
 
  
canvas.on('mouse:down', function(options) {
  console.log(options);
 if (options.target ==undefined ) {
 /* canvas.add(new fabric.Circle({ radius: 30, fill: '#f55', top: options.e.offsetY-15, left: options.e.offsetX-15,stroke: 'red',
	strokeWidth: 3 }));
  

  canvas.item(0).set({
    borderColor: 'red',
    cornerColor: 'green',
    cornerSize: 6,
    transparentCorners: false
  });
  canvas.setActiveObject(canvas.item(0));*/
 
  //this.__canvases.push(canvas);
  
  
  var cic1 =new fabric.Circle({ radius: 30, fill: '#f55', top: options.e.offsetY-15, left: options.e.offsetX-15,stroke: 'red',
	strokeWidth: 3 });
  
  var text1 = new fabric.Text('25', {
	  fontSize: 30,
    textAlign: 'center',
        originX: 'center',
        originY: 'center',
        left: options.e.offsetX+15,
        top: options.e.offsetY+15
	});
  var group = new fabric.Group([ cic1,text1  ], {
	  left: options.e.offsetX-30,
	  top: options.e.offsetY-30,
	});
	canvas.add(group);
  }
  
  
});