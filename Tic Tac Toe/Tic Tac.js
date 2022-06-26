const U1name = document.querySelector("#U1NameTaker");
const U2name = document.querySelector("#U2NameTaker");
const form = document.querySelector('.mainForm');
const P1name = document.querySelector("#U1Name");
const P2name = document.querySelector("#U2Name");
const winner = document.querySelector("#winDeclarer");
const newGame = document.querySelector("#newGameBtn");
const U1Box = document.querySelector(".U1");
const U2Box = document.querySelector(".U2");
const PABtn = document.querySelector("#playAgainBtn");
const U1score = document.querySelector("#U1Score");
const U2score = document.querySelector("#U2Score");
const Boxes = document.querySelector('.mainTicTacContainer').childNodes;
let turn=1, P1Score=0, P2Score=0, toRemove=[], moves=0;
document.querySelector('.GameContainer').style.height = document.querySelector(".nameInputForm").style.height = `${screen.height}px`;

form.addEventListener('submit', e => {
  e.preventDefault();
  if(U1name.value.length > 12 || U2name.value.length > 12){
    alert("Player's name cannot be larger than 12 characters.");
    return;
  }else{
    window.location.href="#'";
  }
  P1name.innerHTML = U1name.value;
  P2name.innerHTML = U2name.value;
  startNew();
})

Boxes.forEach((elem, index) => index%2===0?toRemove.push(elem):0)
toRemove.forEach(elem => elem.remove());

const removeListeners = () => {
  for(let j = 0; j < Boxes.length; j++){
    Boxes[j].removeEventListener('click', boxFunc)
  }
}

let checkWin = () => {
  if(Boxes[0].circle === true && Boxes[1].circle === true && Boxes[2].circle === true || Boxes[3].circle === true && Boxes[4].circle === true && Boxes[5].circle === true || Boxes[6].circle === true && Boxes[7].circle  === true && Boxes[8].circle === true || Boxes[0].circle === true && Boxes[3].circle === true && Boxes[6].circle === true || Boxes[0].circle === true && Boxes[4].circle === true && Boxes[8].circle === true || Boxes[2].circle === true && Boxes[4].circle === true && Boxes[6].circle === true || Boxes[1].circle === true && Boxes[4].circle === true && Boxes[7].circle === true || Boxes[2].circle === true && Boxes[5].circle === true && Boxes[8].circle === true){
    winner.innerHTML = `${P1name.innerHTML} Wins!`;
    PABtn.style.display = "block";
    U1score.innerHTML = `Score: ${++P1Score}`;
    removeListeners()
  }else if(Boxes[0].cross === true && Boxes[1].cross === true && Boxes[2].cross === true || Boxes[3].cross === true && Boxes[4].cross === true && Boxes[5].cross === true || Boxes[6].cross === true && Boxes[7].cross  === true && Boxes[8].cross === true || Boxes[0].cross === true && Boxes[3].cross === true && Boxes[6].cross === true || Boxes[0].cross === true && Boxes[4].cross === true && Boxes[8].cross === true || Boxes[2].cross === true && Boxes[4].cross === true && Boxes[6].cross === true || Boxes[1].cross === true && Boxes[4].cross === true && Boxes[7].cross === true || Boxes[2].cross === true && Boxes[5].cross === true && Boxes[8].cross === true){
    winner.innerHTML = `${P2name.innerHTML} Wins!`;
    PABtn.style.display = "block";
    U2score.innerHTML = `Score: ${++P2Score}`;
    removeListeners()
  }else if(moves === 9){
    winner.innerHTML = `Match Tie!`;
    PABtn.style.display = "block";
    removeListeners()
  }
};

const boxFunc = e => {
  e.target.innerHTML = `${
    turn === 0 ? "<img src='Pictures/Tic Tac Cross.png'>"
    : "<img src='Pictures/Tic Tac Circle.png'>"
  }`
  turn === 0 ? e.target.cross = true : e.target.circle = true;
  turn === 1 ? turn = 0 : turn++; moves++
  checkWin();clickCheck()
}

function clickCheck(){
  if(turn === 0){
    U2Box.style.borderStyle = "solid";
    U2Box.style.borderWidth = "1px";
    U2Box.style.borderColor = "white";

    U1Box.style.borderStyle = "solid";
    U1Box.style.borderColor = "gray";
    U1Box.style.borderWidth = "1px";
  }else if(turn === 1){
    U1Box.style.borderStyle = "solid";
    U1Box.style.borderWidth = "1px";
    U1Box.style.borderColor = "white";

    U2Box.style.borderStyle = "solid";
    U2Box.style.borderColor = "gray";
    U2Box.style.borderWidth = "1px";
  };
};

const startNew = newGame => {
  debugger;
  moves = 0;
  winner.innerHTML = ``;
  turn = parseInt(Math.random()*2);
  PABtn.style.display = "none";
  clickCheck()

  if(newGame){
    P1Score = 0;
    P2Score = 0;
    U1score.innerHTML = U2score.innerHTML = `Score: 0`;
  }

  for(let i=0; i<Boxes.length; i++){
    Boxes[i].innerHTML = '';
    Boxes[i].circle = false; Boxes[i].cross = false;
    Boxes[i].addEventListener("click", boxFunc, {once:true});
  }
}

PABtn.addEventListener("click", ()=>{startNew(false)});
newGame.addEventListener("click", ()=>{startNew(true)});

clickCheck();
