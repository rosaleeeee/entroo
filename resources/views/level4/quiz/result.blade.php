<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('result_mbti.css') }}" rel="stylesheet">
        <link href="{{ asset('nav.css') }}" rel="stylesheet">
        <title>Result</title>
    </head>
    <body>
        
        @include('layouts.sidebar')
        <div class="container_result">
            @php
            if ($results_E >= $results_I) {$v1 = ($results_E) / ($results_E + $results_I);} else {$v1 = ($results_I) / ($results_E + $results_I);}           
            if ($results_F >= $results_T) {$v3 = ($results_F) / ($results_F + $results_T);} else {$v3 = ($results_T) / ($results_F + $results_T);}
            if ($results_N >= $results_S) {$v2 = ($results_N) / ($results_N + $results_S);} else {$v2 = ($results_S) / ($results_N + $results_S);}
            if ($results_P >= $results_J) {$v4 = ($results_P) / ($results_P + $results_J);} else {$v4 = ($results_J) / ($results_P + $results_J);}
            if ($v1 == 0.5) {$v1 =0.51;}
            if ($v2 == 0.5) {$v2 =0.51;}
            if ($v3 == 0.5) {$v3 =0.51;}
            if ($v4 == 0.5) {$v4 =0.51;}
            @endphp

            <h1>Your MBTI Type is: {{ $mbti_type }}</h1>
            <div class="x">    
            <div>
            <div class="pie animate no-round" style="--p:{{$v1 * 100}};--c:orange;"> {{round($v1 * 100)}}%</div>        
            @if ($results_E >= $results_I) <p class="text1" > Extraversion</P> @else <P class="text1" > Introversion </p> @endif
            </div>
            <div>   
            <div class="pie animate no-round" style="--p:{{$v2 * 100}};--c:orange;"> {{round($v2 * 100)}}%</div>
            @if ($results_N >= $results_S) <p class="text1" > Intuition  </P> @else <P class="text1" > Sensing </p> @endif
            </div>
            <div>
            <div class="pie animate no-round" style="--p:{{$v3 * 100}};--c:orange;"> {{round($v3 * 100)}}%</div>
            @if ($results_F >= $results_T) <p class="text1" > Feeling </P> @else <P class="text1" > Thinking </p> @endif           
            </div>
            <div>
            <div class="pie animate no-round" style="--p:{{$v4 * 100}};--c:orange;"> {{round($v4 * 100)}}%</div>
            @if ($results_P >= $results_J) <p class="text1" > Perceiving </P> @else <P class="text1" > Judging </p> @endif
            </div>
            </div>    
            <p>E: {{ $results_E }}</p>
            <p>I: {{ $results_I }}</p>
            <p>S: {{ $results_S }}</p>
            <p>N: {{ $results_N }}</p>
            <p>T: {{ $results_T }}</p>
            <p>F: {{ $results_F }}</p>
            <p>J: {{ $results_J }}</p>
            <p>P: {{ $results_P }}</p>    
    <h1>About Your Type</h1> 

    @if ($mbti_type == 'INTJ')
        <p class="info_mbti">INTJs are strategic, analytical, and independent individuals known for their ability to see the big picture and develop long-term plans. They are highly logical and excel at solving complex problems, often using their innovative thinking to create unique solutions. INTJs value intelligence and competence and strive for excellence in everything they do. They prefer to work independently or with a small group of like-minded individuals, valuing efficiency and productivity. Though reserved, INTJs are confident in their abilities and are often seen as visionary leaders. They are driven by a desire to achieve their goals and make significant contributions to their fields. Their decision-making is guided by logic and objective analysis, and they are often critical of inefficiency and incompetence. INTJs enjoy intellectual challenges and are constantly seeking to expand their knowledge and understanding of the world.</p>
    @elseif ($mbti_type == 'INTP')
        <p class="info_mbti">INTPs are analytical, logical, and innovative individuals who excel at understanding complex concepts and solving intricate problems. They are deeply curious and enjoy exploring new ideas and theories, often delving into abstract and theoretical subjects. INTPs value knowledge and are constantly seeking to expand their understanding of the world around them. They are independent thinkers who prefer to work alone or with a small group of like-minded individuals. INTPs are reserved and private, but they are also open-minded and enjoy engaging in intellectual debates and discussions. They are logical and objective, often relying on their analytical skills to make decisions. INTPs are innovative and enjoy finding unique solutions to problems, often thinking outside the box. They are driven by a desire to understand how things work and are often seen as intellectuals and scholars. Their ability to see connections between seemingly unrelated ideas makes them effective problem solvers and thinkers.</p>
    @elseif ($mbti_type == 'INFJ')
        <p class="info_mbti">INFJs are insightful, compassionate, and idealistic individuals who are driven by a deep desire to make a positive impact on the world. They are deeply introspective and value authenticity and integrity in themselves and others. INFJs are often visionaries, with a strong sense of purpose and a passion for helping others. They possess a unique ability to understand the emotions and motivations of those around them, making them empathetic and supportive. INFJs are creative and enjoy expressing themselves through art, writing, or other forms of personal expression. They are often seen as insightful and inspiring leaders, capable of guiding others towards a shared vision. Their decisions are influenced by their values and a deep understanding of human nature. INFJs seek meaningful connections and are dedicated to improving the lives of those they care about. They are often found in roles that allow them to advocate for social causes and bring about positive change.</p>
    @elseif ($mbti_type == 'INFP')
        <p class="info_mbti">INFPs are idealistic, empathetic, and imaginative individuals who are driven by a desire to find and create meaning in their lives. They are deeply introspective and value authenticity and integrity, both in themselves and in others. INFPs are creative and enjoy expressing themselves through writing, art, or other forms of personal expression. They are empathetic and can easily understand the emotions and motivations of others, making them compassionate and supportive friends and partners. INFPs often feel a strong sense of purpose and are passionate about helping others and making a positive impact on the world. They prefer to work independently or in small, close-knit groups, where they can fully express their individuality. Their decisions are guided by their values and a deep understanding of human nature. INFPs are driven by their ideals and are often seen as dreamers, striving to create a better world for themselves and those around them.</p>
    @elseif ($mbti_type == 'ISFJ')
        <p class="info_mbti">ISFJs are loyal, compassionate, and detail-oriented individuals who are deeply committed to helping others and maintaining harmony in their environment. They are known for their reliability and practical approach to problem-solving, often going above and beyond to ensure that the needs of those around them are met. ISFJs are highly empathetic and sensitive to the emotions of others, often putting the well-being of others before their own. They excel in roles that require meticulous attention to detail and a strong sense of duty, often thriving in healthcare, education, and administrative positions. ISFJs value tradition and stability, seeking to preserve and uphold the values and customs that are important to them. They are patient and nurturing, often taking on caregiving roles in their personal and professional lives. ISFJs are modest and prefer to work behind the scenes, often avoiding the spotlight in favor of supporting others. Their decision-making is guided by a strong sense of responsibility and a desire to create a safe and comfortable environment for everyone. ISFJs are dedicated and hardworking, always striving to make a positive impact on the lives of those around them.</p>
    @elseif ($mbti_type == 'ISFP')
        <p class="info_mbti">ISFPs are gentle, creative, and spontaneous individuals who value personal freedom and self-expression. They are known for their artistic talents and a keen appreciation for beauty and aesthetics, often finding joy in creative pursuits such as art, music, and nature. ISFPs are deeply in touch with their emotions and are guided by their personal values and beliefs, often seeking to live a life that is true to themselves. They are empathetic and compassionate, often showing kindness and understanding towards others. ISFPs prefer to live in the moment and enjoy new experiences, often seeking out adventures and opportunities for personal growth. They are independent and prefer to follow their own path rather than conform to societal expectations. ISFPs are sensitive and reserved, often needing time alone to recharge and reflect on their experiences. Their decision-making is guided by their feelings and a desire to create harmony and beauty in their surroundings. ISFPs are flexible and adaptable, often thriving in environments that allow them to explore their creativity and individuality.</p>
    @elseif ($mbti_type == 'ISTJ')
        <p class="info_mbti">ISTJs are dependable, organized, and methodical individuals who excel at creating order and stability in their environment. They are known for their reliability and strong work ethic, often taking on responsibilities and following through on their commitments. ISTJs value tradition and structure, often seeking to uphold and maintain established systems and procedures. They are logical and detail-oriented, often thriving in roles that require precision and accuracy, such as accounting, engineering, or law enforcement. ISTJs are practical and realistic, preferring to focus on concrete facts and practical solutions rather than abstract theories. They are reserved and private, often keeping their personal lives and emotions to themselves. ISTJs value honesty and integrity, often holding themselves and others to high standards of conduct. Their decision-making is guided by a careful analysis of the facts and a consideration of the long-term consequences. ISTJs are dependable and responsible, always striving to fulfill their duties and obligations. They are loyal and committed, often forming strong, lasting relationships based on mutual trust and respect.</p>
    @elseif ($mbti_type == 'ISTP')
        <p class="info_mbti">ISTPs are analytical, practical, and action-oriented individuals who excel at solving problems and understanding how things work. They are known for their technical skills and a hands-on approach to learning and exploring their environment. ISTPs are curious and independent, often seeking out new challenges and opportunities to test their skills. They are logical and observant, able to quickly assess situations and come up with effective solutions. ISTPs value their freedom and autonomy, often preferring to work alone or in environments that allow them to operate independently. They are adaptable and resourceful, often thriving in dynamic and unpredictable situations. ISTPs are reserved and private, often keeping their thoughts and feelings to themselves. Their decision-making is guided by a logical and objective analysis of the facts, and they are skilled at making quick, effective decisions in high-pressure situations. ISTPs enjoy physical activities and often have a strong interest in sports, mechanics, or other hands-on pursuits. They are practical and realistic, always looking for efficient and effective ways to achieve their goals.</p>
    @elseif ($mbti_type == 'ENTP')
        <p class="info_mbti">ENTPs are innovative, curious, and quick-witted individuals who enjoy engaging in intellectual challenges and debates. They are natural problem solvers and excel at thinking on their feet, often coming up with creative and unconventional solutions. ENTPs are highly sociable and enjoy discussing ideas and theories with others, often playing the devil's advocate to stimulate conversation and explore different perspectives. They are enthusiastic and energetic, always looking for new opportunities and experiences. ENTPs value knowledge and are constantly seeking to learn and understand more about the world around them. They are independent thinkers who enjoy exploring new ideas and possibilities, often questioning established norms and conventions. ENTPs are confident and assertive, often taking on leadership roles and inspiring others with their vision and ideas. Their decision-making is guided by logic and rationality, and they are skilled at analyzing complex problems. ENTPs are driven by a desire to innovate and create, always looking for ways to push the boundaries and make a difference.</p>
    @elseif ($mbti_type == 'ENFP')
        <p class="info_mbti">ENFPs are enthusiastic, creative, and sociable individuals who thrive on new experiences and ideas. They are energetic and curious, always eager to explore new possibilities and meet new people. ENFPs are highly empathetic and skilled at understanding others' emotions and perspectives, which makes them excellent communicators and collaborators. They are often seen as inspiring and charismatic, able to motivate and encourage those around them. ENFPs value authenticity and individuality and seek to create a life that is true to their values and beliefs. They enjoy creative expression and often pursue artistic or unconventional careers. ENFPs are adaptable and spontaneous, preferring flexibility over rigid schedules. They are driven by their ideals and a desire to make a positive impact on the world. Their decision-making is influenced by their values and their understanding of human nature. ENFPs are passionate about their interests and are always looking for ways to bring more excitement and meaning into their lives.        </p>
    @elseif ($mbti_type == 'ENTJ')
        <p class="info_mbti">ENTJs are assertive, strategic, and efficient individuals who excel at organizing and leading others towards a common goal. They are natural leaders, known for their confidence, ambition, and ability to think strategically. ENTJs are highly goal-oriented and driven by a desire to achieve success and make a significant impact in their field. They are logical and analytical, often using their problem-solving skills to develop effective plans and strategies. ENTJs value competence and efficiency and expect the same from those around them. They are decisive and confident in their abilities, often taking charge in challenging situations and inspiring others with their vision and determination. ENTJs are skilled at managing and organizing resources, often excelling in leadership and executive roles. Their decision-making is guided by objective analysis and a focus on achieving their goals. ENTJs are driven by a desire to succeed and are often seen as dynamic and influential leaders, capable of making a significant impact on their environment.        </p>
    @elseif ($mbti_type == 'ENFJ')
        <p class="info_mbti">ENFJs are warm, charismatic, and altruistic individuals who are driven by a desire to help others and make a positive impact on the world. They are natural leaders, known for their ability to inspire and motivate those around them. ENFJs are highly empathetic and skilled at understanding others' emotions and needs, often putting the needs of others before their own. They are sociable and enjoy building meaningful connections with others, often taking on mentoring or coaching roles. ENFJs value harmony and cooperation and strive to create a positive and supportive environment for those around them. They are creative and enjoy expressing themselves through art, writing, or other forms of personal expression. ENFJs are driven by their ideals and a desire to make a difference in the lives of others. Their decision-making is guided by their values and a deep understanding of human nature. ENFJs are often seen as inspiring and influential leaders, capable of bringing people together and guiding them towards a shared vision of a better future.        </p>
    @elseif ($mbti_type == 'ESTP')
        <p class="info_mbti">ESTPs are energetic, pragmatic, and action-oriented individuals who thrive in dynamic environments and love to be at the center of the action. They are known for their spontaneity and ability to think on their feet, often excelling in fast-paced situations where quick decisions are required. ESTPs are highly observant and practical, with a knack for understanding the immediate needs of a situation and responding accordingly. They are natural problem-solvers who enjoy hands-on activities and are often skilled in technical or mechanical tasks. ESTPs are charismatic and sociable, often drawing people to them with their enthusiasm and sense of adventure. They enjoy taking risks and are not afraid to challenge the status quo if it means achieving their goals. ESTPs are persuasive and can be very convincing, making them effective in roles that require negotiation or sales. They prefer to live in the moment and seek out new experiences, often getting bored with routine and predictability. ESTPs are direct and straightforward, valuing efficiency and practicality over theoretical concepts. They are independent and self-reliant, often preferring to take the lead and make their own way in the world.  </p>
    @elseif ($mbti_type == 'ESFP')
        <p class="info_mbti">ESFPs are outgoing, fun-loving, and spontaneous individuals who love to live in the moment and enjoy life to the fullest. They are known for their vibrant personalities and ability to bring joy and excitement to any situation. ESFPs are highly social and thrive on interactions with others, often forming close, personal connections with ease. They have a strong appreciation for beauty and aesthetics, often being drawn to artistic and creative pursuits. ESFPs are empathetic and warm, often going out of their way to make others feel comfortable and appreciated. They are practical and realistic, preferring to focus on the here and now rather than worrying about the future. ESFPs are adaptable and flexible, often thriving in environments that allow them to express their creativity and spontaneity. They are energetic and enthusiastic, often being the life of the party and enjoying activities that involve excitement and adventure. ESFPs are sensitive to the needs and feelings of others, often using their charm and sociability to build strong, supportive relationships. They prefer to take a hands-on approach to learning and problem-solving, often relying on their instincts and practical knowledge to navigate challenges.   </p>
    @elseif ($mbti_type == 'ESFJ')
        <p class="info_mbti">ESFJs are warm, caring, and sociable individuals who are deeply committed to helping others and fostering a sense of community. They are known for their empathy and ability to understand and respond to the emotional needs of those around them. ESFJs are practical and organized, often excelling in roles that require attention to detail and a focus on service, such as healthcare, education, or hospitality. They value tradition and stability, often seeking to create and maintain harmonious and supportive environments. ESFJs are sociable and outgoing, often forming close, personal connections with ease and enjoying activities that involve social interaction and teamwork. They are dependable and responsible, often taking their commitments seriously and following through on their promises. ESFJs are detail-oriented and methodical, often excelling in roles that require precision and accuracy. They are empathetic and compassionate, often going out of their way to make others feel comfortable and appreciated. ESFJs are goal-oriented and driven, often setting high standards for themselves and those around them. They are confident and assertive, often being seen as reliable and trustworthy leaders who can be counted on to get the job done.</p>
    @else
        <p class="info_mbti">ESTJs are organized, logical, and decisive individuals who excel at managing people and processes to achieve their goals. They are known for their strong work ethic and ability to create order and efficiency in any situation. ESTJs are practical and realistic, often focusing on concrete facts and evidence to make decisions. They value tradition and structure, often seeking to uphold established systems and procedures. ESTJs are natural leaders who are skilled at organizing and directing others, often taking charge in group situations and ensuring that tasks are completed efficiently. They are dependable and responsible, often taking their commitments seriously and following through on their promises. ESTJs are straightforward and direct, valuing honesty and integrity in themselves and others. They are goal-oriented and driven, often setting high standards for themselves and those around them. ESTJs are detail-oriented and methodical, often excelling in roles that require precision and accuracy, such as management, administration, or law enforcement. They are confident and assertive, often being seen as reliable and trustworthy leaders who can be counted on to get the job done.  </p>
    @endif

    <div class="big">

    <div class="container_card">

        <div class="card">
          <div class="face face1">
            <div class="content_card">
              <span class="stars"></span>
              <h2 class="java">Java</h2>
              <p class="java">Java is a class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible.</p>
            </div>
          </div>
          <div class="face face2">
            <h2>01</h2>
          </div>
        </div>
      
        <div class="card">
          <div class="face face1">
            <div class="content_card">
              <span class="stars"></span>
              <h2 class="python">Python</h2>
              <p class="python">Python is an interpreted, high-level and general-purpose programming language.</p>
            </div>
          </div>
          <div class="face face2">
            <h2>02</h2>
          </div>
        </div>
      
        <div class="card">
          <div class="face face1">
            <div class="content_card">
              <span class="stars"></span>
              <h2 class="cSharp">C#</h2>
              <p class="cSharp">C# is a general-purpose, multi-paradigm programming language encompassing static typing, strong typing, lexically scoped and component-oriented programming disciplines.</p>
            </div>
          </div>
          <div class="face face2">
            <h2>03</h2>
          </div>
        </div>
      </div>
    </div>

        </div>
    </body>
    </html>
    </x-app-layout>
    