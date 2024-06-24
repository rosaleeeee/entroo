
<x-app-layout>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('BUSINESMODEL.css') }}" rel="stylesheet">
    <title>Business Model Canvas</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
    <body>
        @include('layouts.sidebar')

        <!-- Help Button -->
        <button id="helpBtn">Help</button>

        <!-- The Popup -->
        <div id="popup" class="popup">
            <div class="popup-content">
                <span class="close">&times;</span>
                <h2>Game Rules</h2>
                <p>You'll work with an empty Business Model Canvas, where each cell contains the name of a key component along with a brief definition. Your task is to drag each component cell to its correct position. Need more info? Click on the "Details" button. Here's how scoring works: Correct placement on the first try earns you 5 points, on the second try earns you 3 points, and on the third try earns you 1 point. If you're incorrect on the fourth try, you'll lose 1 point, and the correct answer will be shown.</p>
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

        <!-- Page Content -->
        <main>
            <div class="wrapper">
                <!-- Nouvelles cellules draggable à gauche -->
                <div class="draggable-container">
                    <div class="draggable-column">
                        <div class="draggable" id="cell1">
                            <h3>External collaborators crucial for business operations.</h3>
                            <button class="learn-more-btn">Learn More</button>
                            <div id="popup1" class="popup">
                                <div class="popup-content">
                                    <span class="close">&times;</span>
                                    <h2>Details</h2>
                                    <p>External entities such as suppliers, business partners, or other companies that collaborate to enhance operational efficiency, mitigate risks, or access additional resources.</p>
                                </div>
                            </div>
                        </div>
                        <div class="draggable" id="cell2">
                            <h3>Essential tasks for creating and delivering value.</h3>
                            <button class="learn-more-btn">Learn More</button>
                            <div id="popup2" class="popup">
                                <div class="popup-content">
                                    <span class="close">&times;</span>
                                    <h2>Details</h2>
                                    <p>Essential tasks and processes that a business must perform to create and deliver its value proposition, reach customers, and sustain its operations effectively.</p>
                                </div>
                            </div>
                        </div>
                        <div class="draggable" id="cell3">
                            <h3>Necessary assets for business operations.</h3>
                            <button class="learn-more-btn">Learn More</button>
                            <div id="popup3" class="popup">
                                <div class="popup-content">
                                    <span class="close">&times;</span>
                                    <h2>Details</h2>
                                    <p>The critical assets, whether physical, financial, intellectual, or human, required for a business to operate and deliver its value proposition to customers.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Business Model Canvas (existant) -->
                    <div class="bmc" id="bmc">
                        <div class="droppable" data-category="Key Resources"><h3>Key Resources</h3></div>
                        <div class="droppable" data-category="Key Activities"><h3>Key Activities</h3></div>
                        <div class="droppable" data-category="Key Partnerships"><h3>Key Partnerships</h3></div>
                        <div class="droppable" data-category="Value Propositions"><h3>Value Propositions</h3></div>
                        <div class="droppable" data-category="Customer Relationships"><h3>Customer Relationships</h3></div>
                        <div class="droppable" data-category="Channels"><h3>Channels</h3></div>
                        <div class="droppable" data-category="Customer Segments"><h3>Customer Segments</h3></div>
                        <div class="droppable" data-category="Cost Structure"><h3>Cost Structure</h3></div>
                        <div class="droppable" data-category="Revenue Streams"><h3>Revenue Streams</h3></div>
                    </div>

                    <!-- Nouvelles cellules draggable à droite -->
                    <div class="draggable-column">
                        <div class="draggable" id="cell4">
                            <h3>Unique offerings creating customer value.</h3>
                            <button class="learn-more-btn">Learn More</button>
                            <div id="popup4" class="popup">
                                <div class="popup-content">
                                    <span class="close">&times;</span>
                                    <h2>Details</h2>
                                    <p>The unique combination of products or services that create value for specific customer segments, addressing their needs or solving their problems better than competitors.</p>
                                </div>
                            </div>
                        </div>
                        <div class="draggable" id="cell5">
                            <h3>Ways to attract and retain customers.</h3>
                            <button class="learn-more-btn">Learn More</button>
                            <div id="popup5" class="popup">
                                <div class="popup-content">
                                    <span class="close">&times;</span>
                                    <h2>Details</h2>
                                    <p>The types of interactions and connections a business establishes with its customers to attract, retain, and support them throughout their journey with the company.</p>
                                </div>
                            </div>
                        </div>
                        <div class="draggable" id="cell6">
                            <h3>Methods to deliver products/services to customers.</h3>
                            <button class="learn-more-btn">Learn More</button>
                            <div id="popup6" class="popup">
                                <div class="popup-content">
                                    <span class="close">&times;</span>
                                    <h2>Details</h2>
                                    <p>The various ways and platforms through which a business reaches and interacts with its customers to deliver its value proposition, including physical and digital channels.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Nouvelles cellules draggable en bas -->
                <div class="draggable-container">
                    <div class="draggable" id="cell7">
                        <h3>Targeted groups for products/services.</h3>
                        <button class="learn-more-btn">Learn More</button>
                        <div id="popup7" class="popup">
                            <div class="popup-content">
                                <span class="close">&times;</span>
                                <h2>Details</h2>
                                <p>Distinct groups of people or organizations that a business targets or serves with its products or services, each having unique needs, preferences, and behaviors.</p>
                            </div>
                        </div>
                    </div>
                    <div class="draggable" id="cell8">
                        <h3>Main expenses for business operations.</h3>
                        <button class="learn-more-btn">Learn More</button>
                        <div id="popup8" class="popup">
                            <div class="popup-content">
                                <span class="close">&times;</span>
                                <h2>Details</h2>
                                <p>The comprehensive breakdown of all costs incurred to operate a business, including fixed and variable expenses, essential for understanding and managing profitability.</p>
                            </div>
                        </div>
                    </div>
                    <div class="draggable" id="cell9">
                        <h3>Sources generating business income.</h3>
                        <button class="learn-more-btn">Learn More</button>
                        <div id="popup9" class="popup">
                            <div class="popup-content">
                                <span class="close">&times;</span>
                                <h2>Details</h2>
                                <p>The sources through which a business earns income from its customer segments, encompassing different pricing mechanisms, sales models, and monetization strategies.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button id="submitBtn" class="submit-button">Submit</button>
        </main>

        <script>
            $(document).ready(function() {
                $(".draggable").draggable({
                    revert: "invalid",
                    zIndex: 100,
                    scroll: false
                });

                $(".droppable").droppable({
                    accept: ".draggable",
                    drop: function(event, ui) {
                        $(this).append(ui.helper.css({
                            left: 0,
                            top: 0,
                            position: "relative"
                        }));
                    }
                });

                $(".learn-more-btn").click(function() {
                    var popupId = $(this).closest(".draggable").attr("id");
                    $("#" + popupId + " .popup").css("display", "block");
                });

                $(".close").click(function() {
                    $(this).closest(".popup").css("display", "none");
                });

                // Set up CSRF token for all AJAX requests
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // Function to check answers on submit
                $("#submitBtn").click(function() {
                    var userAnswers = {};

                    $(".droppable").each(function() {
                        var cellId = $(this).children(".draggable").attr("id");
                        var droppedText = $(this).find("h3").text().trim();
                        userAnswers[cellId] = droppedText;
                    });

                    var attempts = 1; // Assuming a variable to track attempts

                    // Send AJAX request to backend to check answers and calculate score
                    $.ajax({
                        url: '/check-answers',
                        type: 'POST',
                        data: {
                            userAnswers: userAnswers,
                            attempts: attempts
                        },
                        success: function(response) {
                            console.log('Response:', response); // Log the response for debugging
                            if (response.allCorrect) {
                                alert(response.message);
                            } else {
                                alert("Sorry, you didn't get all answers correct. The correct answers will now be displayed.");
                                $(".droppable").each(function() {
                                    var cellId = $(this).children(".draggable").attr("id");
                                    $(this).find(".draggable").css({ left: 0, top: 0, position: "relative" }).appendTo($(this));
                                });
                            }
                            attempts = response.attempts; // Update attempts from response
                        },
                        error: function(xhr) {
                            console.error('Error:', xhr.responseText); // Log the error response for debugging
                            alert("An error occurred. Please try again.");
                        }
                    });
                });
            });
        </script>
    </body>
</x-app-layout>
