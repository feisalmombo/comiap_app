<div id="progressWrap">
    <span id="progressPercent">80%</span> 
    <div id="circleBg"></div>  
    <div id="percentBg"></div>
    <canvas id="myCanvas" width="200" height="200"> 
    Your browser doesn't support fancy progressbar.
    </canvas>
</div>

<script>
    var canvas = document.getElementById('myCanvas'); // 1
    var context = canvas.getContext('2d');
    var centerX = canvas.width / 2;
    var centerY = canvas.height / 2;
    var radius = 70; // 2
    var per = (3.1/5); // 3
    document.getElementById("progressPercent").
          innerHTML = Math.round((per)*100)+"%"; // 4
    context.beginPath(); // 5
    context.arc(centerX, centerY, 
          radius, 0, per*2*Math.PI, false); // 6
    context.lineWidth = 16;
    context.lineCap = 'round';
    context.strokeStyle = '#0196da';
    context.stroke();
</script>