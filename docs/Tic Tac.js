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
const Boxes = [...document.querySelector('.mainTicTacContainer').children];
let turn=1, P1Score=0, P2Score=0, moves=0;
document.querySelector('.GameContainer').style.height = document.querySelector(".nameInputForm").style.height = `${screen.height}px`;

form.addEventListener('submit', e => {
  e.preventDefault();
  window.location.href="#'";
  P1name.innerHTML = U1name.value;
  P2name.innerHTML = U2name.value;
  startNew();
})

const removeListeners = () => Boxes.forEach(box=>box.removeEventListener('click', boxFunc));

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
  e.target.innerHTML = `<img src='Pictures/Tic Tac ${turn===0?'Cross':'Circle'}.png'>`
  turn === 0 ? e.target.cross = true : e.target.circle = true;
  turn === 1 ? turn = 0 : turn++; moves++
  checkWin();clickCheck()
}

function clickCheck(){
  U1Box.style.border=`1px solid ${turn?'white':'gray'}`;
  U2Box.style.border=`1px solid ${turn?'gray':'white'}`;
};

const startNew = newGame => {
  moves = 0;
  winner.innerHTML = ``;
  turn = parseInt(Math.random()*2);
  PABtn.style.display = "none";
  clickCheck()

  if(newGame){
    P1Score = P2Score = 0;
    U1score.innerHTML = U2score.innerHTML = `Score: 0`;
  }

  Boxes.forEach(box=>{
    box.innerHTML='';
    box.circle=box.cross=false;
    box.addEventListener('click', boxFunc, {once:true});
  })
}

PABtn.addEventListener("click", ()=>{startNew(false)});
newGame.addEventListener("click", ()=>{startNew(true)});

clickCheck();
