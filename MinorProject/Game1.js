let userScore = 0 ;
let compScore = 0;

const choices = document.querySelectorAll(".choice");
const msg = document.querySelector("#msg");

const userScorePara = document.querySelector("#user-score");
const compScorePara = document.querySelector("#comp-score");

const genCompChoice = () =>{
    const options = ["rock", "paper", "scissor"];
    const randIdx = Math.floor(Math.random() * 3);
    return options[randIdx];
}

const drawGame = () => {
    msg.innerText = "Game Draw. Play Again.";
    msg.style.backgroundColor = "#081b31";
}

const showWinner = (userWin, userChoice,compChoice) =>{
    if(userWin){
        userScore++;
        userScorePara.innerText = userScore;
        msg.innerText = "You Win !";
        msg.style.backgroundColor = "green";
    } else {
        compScore++;
        compScorePara.innerText = compScore;
        msg.innerText = `You Lose.  ${compChoice} beats  your ${userChoice}`;
        msg.style.backgroundColor = "red";
    }
}

const playGame = (userChoice) =>{
    console.log("User Choice =",  userChoice);

    const compChoice = genCompChoice();
    console.log("comp choice = ", compChoice);

    if(userChoice === compChoice){
        //Draw Game
        drawGame();
        } else {
            let userWin = true;
            if(userChoice === "rock"){
                //scissors , paper
               userWin = compChoice === "paper" ? false : true;
            } else if(userChoice === "paper"){
                //rock, scissors
                userWin = compChoice === "scissor" ? false : true;
            } else {
                //rock, paper
                userWin = compChoice === "rock" ? false: true;
            }
             showWinner(userWin, userChoice, compChoice);
        }
};

choices.forEach((choice) => {
    choice.addEventListener("click", () => {
        const userChoice= choice.getAttribute("Id");
        playGame(userChoice);
       
    });
});



// //CHAT GPT WALA CODE HAI NEECHE WALA UPR WALE ME PAPER PAPER WIN HO RAHA THA

// let userScore = 0;
// let compScore = 0;

// const choices = document.querySelectorAll(".choice");
// const msg = document.querySelector("#msg");

// const userScorePara = document.querySelector("#user-score");
// const compScorePara = document.querySelector("#comp-score");

// const genCompChoice = () => {
//     const options = ["rock", "paper", "scissor"];
//     const randIdx = Math.floor(Math.random() * 3);
//     return options[randIdx];
// };

// const drawGame = () => {
//     msg.innerText = "Game Draw. Play Again.";
//     msg.style.backgroundColor = "#081b31";
// };

// const showWinner = (userWin, userChoice, compChoice) => {
//     if (userWin) {
//         userScore++;
//         userScorePara.innerText = userScore;
//         msg.innerText = `You Win! Your ${userChoice} beats ${compChoice}.`;
//         msg.style.backgroundColor = "green";
//     } else {
//         compScore++;
//         compScorePara.innerText = compScore;
//         msg.innerText = `You Lose. ${compChoice} beats your ${userChoice}.`;
//         msg.style.backgroundColor = "red";
//     }
// };

// const playGame = (userChoice) => {
//     console.log("User Choice =", userChoice);

//     const compChoice = genCompChoice();
//     console.log("Comp Choice =", compChoice);

//     if (userChoice === compChoice) {
//         // Draw Game
//         drawGame();
//     } else {
//         let userWin = false;
//         if (
//             (userChoice === "rock" && compChoice === "scissor") ||
//             (userChoice === "paper" && compChoice === "rock") ||
//             (userChoice === "scissor" && compChoice === "paper")
//         ) {
//             userWin = true;
//         }
//         showWinner(userWin, userChoice, compChoice);
//     }
// };

// choices.forEach((choice) => {
//     choice.addEventListener("click", () => {
//         const userChoice = choice.getAttribute("id");
//         playGame(userChoice);
//     });
// });