<x-app-layout> 
    <link href="{{ asset('lv3quiz.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
        <!-- Page Content -->
        
          
     <script>  
const questions=[
    {
        question:"hhhhhhhhhhhhhhhhhhhhhhh",
        answers:[
            {text:"shark1", correct: false},
            {text:"shark2", correct: false},
            {text:"shark3", correct: true},
            {text:"shark4", correct: false},

        ]
    },
    {
        question:"llllllllllllllllllllllllll",
        answers:[
            {text:"kkkk", correct: false},
            {text:"kkkk", correct: false},
            {text:"skkkkk", correct: true},
            {text:"mmmm", correct: false},

        ]
    },
    {
        question:"hhhhhhhhhhhhhhhhhhhhhhh",
        answers:[
            {text:"shark1", correct: false},
            {text:"shark2", correct: true},
            {text:"shark3", correct: false},
            {text:"shark4", correct: false},

        ]
    },
    {
        question:"hhhhhhhhhhhhhhhhhhhhhhh",
        answers:[
            {text:"shark1", correct: true},

            {text:"shark2", correct: false},
            {text:"shark3", correct: false},
            {text:"shark4", correct: false},

        ]
    },
    {
        question:"hhhhhhhhhhhhhhhhhhhhhhh",
        answers:[
            {text:"shark1", correct: false},
            {text:"shark2", correct: false},
            {text:"shark3", correct: false},
            {text:"shark4", correct: false},

        ]
    },
];
const questionElement=document.getElementById("question");
const answerButton=document.getElementById("answer-buttons");
const nextButton=document.getElementById("next-btn");

let currentQuestionIndex=0;
let score=0;

function startQuiz(){
    currentQuestionIndex=0;
    score=0;
    nextButton.innerHTML="Next";
    showQuestion();

}
function showQuestion(){
    resetState();
    let currentQuestion=questions[currentQuestionIndex];
    let questionNo=currentQuestionIndex + 1;
    questionElement.innerHTML=questionNo+"."+currentQuestion.question;
     
    currentQuestion.answers.forEach(answer =>{
        const button = document.createElement("button");
        button.innerHTML=answer.text;
        button.classList.add("btn");
        answerButton.appendChild(button);
        if(answer.correct){
            button.dataset.correct = answer.correct;
        }
        button.addEventListener("click",selectAnswer);
    });
}
  function resetState(){
    nextButton.style.display ="none";
    while(answerButton.firstChild){
        answerButton.removeChild(answerButton.firstChild);
    }
  }
  function selectAnswer(e){
    const selectedbtn = e.target;
    const isCorrect = selectedbtn.dataset.correct == "true";
    if(isCorrect){
        selectedbtn.classList.add("correct");
        score++;
    }else{
        selectedbtn.classList.add("incorrect");
    }
    Array.from(answerButton.children).forEach(button =>{
        if(button.dataset.correct == "true"){
            button.classList.add(correct);
        }
        button.disabled =  true;
    });
    nextButton.style.display="block";
  }
  function showScore(){
    resetState();
    questionElement.innerHTML = ` You scored ${score} out of ${questions.length}`;
    nextButton.innerHTML = "play Again";
    nextButton.style.display="block";

  }

  function handleNextButton(){
    currentQuestionIndex++;
    if(currentQuestionIndex < questions.length){
        showQuestion();
    }else{
        showScore();
    }
  }

  nextButton.addEventListener("click",()=>{
    if(currentQuestionIndex < questions.length){
        handleNextButton();
    }else{
        startQuiz();
    }

  });
startQuiz();

</script>
        
    <main >
            <div >
                <!-- start navbar --> 
                @include('layouts.sidebar')    
                <!-- end navbar -->
            </div>
            <section class="content">
           <div class="app">
            <h >Simple quiz</h>
            <div class="quiz">
                <h2 class="question">question goes here</h2>
                 <div class="answer-buttons">
                    <button class="btn">answer 1</button>
                    <button class="btn">answer 2</button>
                    <button class="btn">answer 3</button>
                    <button class="btn">answer 4</button>

                 </div>
                 <button id="next-btn">Next</button>
            </div>

            
           </div>
                
            </section>
           

    </main>
   
            

</x-app-layout> 