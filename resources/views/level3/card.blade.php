<x-app-layout>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        main {
            display: flex;
            height: 85vh;
        }

        .sidebar {
            width: 100px;
            color: black;
            padding: 20px;
        }

        .container {
            flex: 1;
            padding: 20px;
            margin-left: 200px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 35px;
            margin: 0 auto;
            padding: 40px 0;
        }

        .card {
            position: relative;
            width: 300px;
            height: 400px;
            margin: 0 auto;
            background: #05124e;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
            transition: transform 0.5s;
            perspective: 1000px;
        }

        .card:hover {
            transform: scale(1.05);
            border-radius: 15px;
        }

        .face {
            position: absolute;
            width: 100%;
            height: 100%;
            transition: transform 0.5s ease-in-out;
            backface-visibility: hidden;
            border-radius: 15px;
        }

        .face1 {
            background: #05124e;
            display: flex;
            justify-content: center;
            align-items: center;
            transform: rotateY(180deg); /* Initially hidden */
            border-radius: 15px;
        }

        .face1 .content_card {
            padding: 20px;
            color: #fff;
            text-align: center;
        }

        .content_card h2 {
            font-size: 1.8em;
            margin-bottom: 10px;
        }

        .content_card p {
            font-size: 1.1em;
        }

        .face2 {
            background: #eaeaea;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 15px;
        }

        .face2 .h2_immg {
            text-align: center;
        }

        .h2_immg img {
            max-width: 80%;
            max-height: 150px;
            margin-bottom: 10px;
        }

        .card:hover .face1 {
            transform: rotateY(0deg); /* Show face1 on hover */
            border-radius: 15px;
        }

        .card:hover .face2 {
            transform: rotateY(180deg); /* Hide face2 on hover */
            border-radius: 15px;
        }

        .bottom-right-button {
            display: block;
            margin: 20px auto;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .bottom-right-button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 1200px) {
            .cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .cards {
                grid-template-columns: 1fr;
            }

            .container {
                margin-left: 20px;
            }
        }
    </style>

    <main>
        <div class="sidebar">
            @include('layouts.sidebar')
        </div>
        <section class="container">
            <div class="cards">
                <!-- Card 1 -->
                <div class="card">
                    <div class="face face1">
                        <div class="content_card">
                            <h2 class="contenu_card_title">Community Manager</h2>
                            <p class="contenu_card">
                                Develops community engagement strategies and fosters relationships within the community.
                            </p>
                        </div>
                    </div>
                    <div class="face face2">
                        <div class="h2_immg">
                            <img class="immg" src="{{ asset('images/cm.png') }}" alt="Community Manager">
                            <h2>Community Manager</h2>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="card">
                    <div class="face face1">
                        <div class="content_card">
                            <h2 class="contenu_card_title">Sales Manager</h2>
                            <p class="contenu_card">
                                Leads the sales team to meet or exceed sales targets while developing sales strategies.
                            </p>
                        </div>
                    </div>
                    <div class="face face2">
                        <div class="h2_immg">
                            <img class="immg" src="{{ asset('images/sm.png') }}" alt="Sales Manager">
                            <h2>Sales Manager</h2>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="card">
                    <div class="face face1">
                        <div class="content_card">
                            <h2 class="contenu_card_title">Partnership Manager</h2>
                            <p class="contenu_card">
                                Develops and maintains strategic partnerships with other companies and stakeholders.
                            </p>
                        </div>
                    </div>
                    <div class="face face2">
                        <div class="h2_immg">
                            <img class="immg" src="{{ asset('images/ps.png') }}" alt="Partnership Manager">
                            <h2>Partnership Manager</h2>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="card">
                    <div class="face face1">
                        <div class="content_card">
                            <h2 class="contenu_card_title">Marketing Manager</h2>
                            <p class="contenu_card">
                                Oversees marketing strategies and campaigns to drive brand awareness and business growth.
                            </p>
                        </div>
                    </div>
                    <div class="face face2">
                        <div class="h2_immg">
                            <img class="immg" src="{{ asset('images/mm.png') }}" alt="Marketing Manager">
                            <h2>Marketing Manager</h2>
                        </div>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="card">
                    <div class="face face1">
                        <div class="content_card">
                            <h2 class="contenu_card_title">Product Manager</h2>
                            <p class="contenu_card">
                                Manages the product lifecycle from concept to launch, ensuring market fit and business success.
                            </p>
                        </div>
                    </div>
                    <div class="face face2">
                        <div class="h2_immg">
                            <img class="immg" src="{{ asset('images/pm.png') }}" alt="Product Manager">
                            <h2>Product Manager</h2>
                        </div>
                    </div>
                </div>

                <!-- Card 6 -->
                <div class="card">
                    <div class="face face1">
                        <div class="content_card">
                            <h2 class="contenu_card_title">Operations Manager</h2>
                            <p class="contenu_card">
                                Oversees the day-to-day operations to ensure smooth and efficient business processes.
                            </p>
                        </div>
                    </div>
                    <div class="face face2">
                        <div class="h2_immg">
                            <img class="immg" src="{{ asset('images/om.png') }}" alt="Operations Manager">
                            <img class="immg" src="{{ asset('images/cfo.png') }}" alt="Chief Financial Officer">
                            <h2>Operations Manager</h2>
                        </div>
                    </div>
                </div>

                <!-- Card 7 -->
                <div class="card">
                    <div class="face face1">
                        <div class="content_card">
                            <h2 class="contenu_card_title">Financial Manager</h2>
                            <p class="contenu_card">
                                Manages financial planning, budgeting, and financial risks for the business.
                            </p>
                        </div>
                    </div>
                    <div class="face face2">
                        <div class="h2_immg">
                            <img class="immg" src="{{ asset('images/fm.png') }}" alt="Financial Manager">
                            <h2>Financial Manager</h2>
                        </div>
                    </div>
                </div>

                <!-- Card 8 -->
                <div class="card">
                    <div class="face face1">
                        <div class="content_card">
                            <h2 class="contenu_card_title">HR Manager</h2>
                            <p class="contenu_card">
                                Oversees recruitment, employee relations, and human resource policies.
                            </p>
                        </div>
                    </div>
                    <div class="face face2">
                        <div class="h2_immg">
                            <img class="immg" src="{{ asset('images/hr.png') }}" alt="HR Manager">
                            <h2>HR Manager</h2>
                        </div>
                    </div>
                </div>

                <!-- Card 9 -->
                <div class="card">
                    <div class="face face1">
                        <div class="content_card">
                            <h2 class="contenu_card_title">IT Manager</h2>
                            <p class="contenu_card">
                                Oversees the company's technology infrastructure and ensures efficient IT operations.
                            </p>
                        </div>
                    </div>
                    <div class="face face2">
                        <div class="h2_immg">
                            <img class="immg" src="{{ asset('images/it.png') }}" alt="IT Manager">
                            <h2>IT Manager</h2>
                        </div>
                    </div>
                </div>
            </div>

            <button class="bottom-right-button" onclick="window.location.href='howtoplay'">DONE</button>
        </section>
    </main>
</x-app-layout>
