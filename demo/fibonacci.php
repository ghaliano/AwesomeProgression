<script src="../p5/p5.js"></script>

<?php

include('../AwesomeProgression.php');
$awesomeProgression = new AwesomeProgression();

$fibonachi = json_encode($awesomeProgression->fibonacci(isset($_GET['i'])?$_GET['i']:10, true));
?>

<form style="position: absolute; right:0; top:0; background: white; padding: 3px;">
<input name="i" type="text"/> <button type="submit">Update</button>
</form>

<script>
	var data = <?php echo $fibonachi ?>;
	
	var unite = 10;
	var canvasW = 1200;
	var canvasH = 700;
	
	function drawTile() 
	{
		stroke(50);
		for (var i=0; i<canvasW; i += 2 * unite) {
			line(i, 0, i, canvasH);
		}

		for (var i=0; i<canvasH	; i += 2 * unite) {
			line(0, i, canvasW	, i);
		}
	}

	function setup() {
		createCanvas(canvasW, canvasH);
		background(0);
		noSmooth();
		drawTile();
		var x0 = canvasW/4;
		var y0 = canvasH/4;
		var x = x0;
		var y = y0;
		j = 0;
		for (n=1; n<data.length; n++) {		
			var width = height = data[n] * unite;
			if (n>2) {
				if (j == 4) {
					p = -data[n-2];
					k = -data[n];
					j = 0;
				}
				else if (j == 3) {
					p = data[n-1];
					k = -data[n-2];
				}
				else if (j == 2) {
					p = 0;
					k = data[n-1];
				}
				else if (j == 1) {
					p = -data[n];
					k = 0;
				}
				else if (j == 0) {
					p = -data[n-2];
					k = -data[n]; 
				}

				translate(
					p * unite, 
					k * unite
				);

				j++;
			} else {
				translate((n * width) - width, 0);
			}

			fill(alpha(color(0, 126, 255, (n+1) * 10)));
			stroke(10);

			rect(x0, y0, width, height);
			stroke(255);
			var fontsize = data[n] * 2;
			textSize(fontsize);
			text("" + data[n], x0 + width/2 - fontsize/2, y0 + height/2 + fontsize/2); 
		}
	} 

</script>