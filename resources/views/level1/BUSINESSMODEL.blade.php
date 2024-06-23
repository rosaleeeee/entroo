<x-app-layout>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('BUSINESMODEL.css') }}" rel="stylesheet">
        <title>start</title>
    </head>  
<body>
    @include('layouts.sidebar')
    
    <!-- Help Button -->
  <button id="helpBtn">Help</button>

<!-- The Popup -->
<div id="popup" class="popup">
    <div class="popup-content">
        <span class="close">&times;</span>
        <h2>Game Rules</h2>
        <p>you'll work with an empty Business Model Canvas, where each cell contains the name of a key component along with a brief definition. Your task is to drag each component cell to its correct position. Need more info? Click on the "Details" button. Here's how scoring works: Correct placement on the first try earns you 5 points, on the second try earns you 3 points, and on the third try earns you 1 point. If you're incorrect on the fourth try, you'll lose 1 point, and the correct answer will be shown. </p>
    </div>
</div>

<script>
    // Get the popup
    var popup = document.getElementById('popup');

    // Get the button that opens the popup
    var btn = document.getElementById('helpBtn');

    // Get the <span> element that closes the popup
    var span = document.getElementsByClassName('close')[0];

    // When the user clicks the button, open the popup
    btn.onclick = function() {
        popup.style.display = 'block';
    }

    // When the user clicks on <span> (x), close the popup
    span.onclick = function() {
        popup.style.display = 'none';
    }

    // When the user clicks anywhere outside of the popup, close it
    window.onclick = function(event) {
        if (event.target == popup) {
            popup.style.display = 'none';
        }
    }
</script>

  
<div class="wrapper">
<h1>Business Model Canvas</h1>
<div class="bmc">
  <div>
    <h3>Key Partners</h3>
  </div>
  <div>
    <h3>Key Activities</h3>
  </div>
  <div>
    <h3>Key Resources</h3>
  </div>
  <div>
    <h3>Value Proposition</h3>
  </div>
  <div>
    <h3>Customer Relationship</h3>
  </div>
  <div>
    <h3>Channels</h3>
  </div>
  <div>
    <h3>Customers Segments</h3>
  </div>
  <div>
    <h3>Cost Structure</h3>
  </div>
  <div>
    <h3>Revenue Streams</h3>
  </div>
</div>
</div>
<div class="submit">
  <button class="submit-button">Submit</button>
</div>
</body>

</x-app-layout>
