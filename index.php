<!DOCTYPE html>
<html>
  <head>
    <title>Tic Tac Toe</title>
    <link rel="shortcut icon" href="Tic Tac Toe/Pictures/Logo.png" type="image/x-icon">
    <style>
      *, 
      *::before{
        margin: 0;
      }
      ::selection, .formHead, #U1NameTaker, #U2NameTaker, #winDeclarer, #U1Name, #U2Name, .scoreBlock, .playAgain, #newGameBtn{
        color: white;
      }
      html, .mainForm, #newGameBtn{
        overflow: hidden;
      }
      body{
        background: rgb(10, 10, 10);
        font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      }

      /* Animations */

      @keyframes shadow{
        0%{text-shadow: 0 0 5px white}
        100%{text-shadow: 0 0 10px white}
      }

      /* Form Taker */

      .nameInputForm, .centerAligner, .symImgContainer, .scoreBlock, .mainTicTac, .mainTicTacContainer{
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .mainForm{
        height: 250px;
        width: 500px;
        background: rgb(50, 50, 50);
        border: 2px solid white;
        top: calc(50% - 125px);
        border-radius: 5px;
      }
      .formHead, #winDeclarer{
        text-align: center;
      }
      .formHead{
        animation: shadow 1s alternate infinite;
        font-size: 50px;
        height: 75px;
      }
      .PlayerInputContainer{
        width: 60%;
        margin-left: 5%;margin-top: 5%;
        padding-right: 5%;
      }
      #U1NameTaker, #U2NameTaker{
        width: 100%;
        height: 30px;
        font-size: 20px;
        padding: 5px;
        border: none;
        border-bottom: 2px solid rgb(214, 214, 214);
        outline: none;
        background: transparent;
      }
      #U1NameTaker::placeholder, #U2NameTaker::placeholder{
        color: rgb(214, 214, 214);
      }
      #U1NameTaker:focus, #U2NameTaker:focus{
        border-bottom: 2px solid white
      }
      .submitHelper{
        width: 100px;
        height: 100px;
        left: 20px;
        top: 20px;
        border: 1px solid white;
        border-radius: 10px;
        cursor: pointer;
        background-color: black;
        background-image: url("Tic Tac Toe/Pictures/startArrow.png");
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
      }

      /* Tic Tac Game */

      .U2, .U1{
        border: 1px solid gray;
        width: calc(100% / 3);
        background-color: rgb(50, 50, 50);
        margin-bottom: -20px;
      }
      .symImgContainer{
        padding: 5px;
        align-items: center;
      }
      #winDeclarer{
        box-sizing: border-box;
        height: 60px;
        font-size: 45px;
        width: calc(100% / 2);
      }
      #U1Name, #U2Name, .indexGiver, .submitHelper, #newGameBtn::before{
        position: relative;
      }
      #U1Name, #U2Name{
        height: 50px;
        font-size: 40px;
        font-weight: 600;
        top: -5px;
        left: 10px;
      }
      #U1Name, #U2Name, .symImgContainer, .PlayerInputContainer, .submitHelper{
        display: inline-block;
      }
      .indexGiver{
        z-index: 20;
        top: -75px;
      }
      .scoreBlock{
        height: 25px;
        width: auto;
        font-size: 25px;
        border-top: 1px solid gray;
        padding: 10px;
      }
      .mainTicTacContainer{
        height: 450px;
        width: 455px;
        flex-wrap: wrap;
      }
      .mainTicTacContainer .mainTicTac{
        height: 150px;
        width: 150px;
      }
      .mainTicTacContainer .mainTicTac img{
        height: 100px;
        width: 100px;
      }
      .mainForm, .playAgain{
        position: absolute;
      }
      .playAgain{
        font-size: 40px;
        background: dimgray;
        height: 60px;
        width: 300px;
        box-shadow: 0px 0px 125px 10px white;
        bottom: -60%;
        left: calc(50% - 150px);
        border: 1px solid lightgray;
        font-variant: small-caps;
        z-index: 10;
        display: none;
        transition: border .2s, background .2s; 
      }
      .playAgain:hover{
        background: gray;
        border: 1px solid white;
      }
      .mainTicTac:first-child, .mainTicTac:nth-child(2), .mainTicTac:nth-child(3), .mainTicTac:nth-child(4), .mainTicTac:nth-child(6){
        border-bottom: 1px solid white;
      }
      .mainTicTac:first-child, .mainTicTac:nth-child(2), .mainTicTac:nth-child(7), .mainTicTac:nth-child(8){
        border-right: 1px solid white;
      }
      .mainTicTac:nth-child(5){
        border: 1px solid white;
        border-top: none;
      }
      #newGameBtn{
        box-sizing: content-box;
        height: 25px;
        padding: 5px;
        font-size: 20px;
        border: 1px solid white;
        background: black;
        margin-top: 32px;
        margin-bottom: 27px;
        margin-left: 5px;
        cursor: pointer;
      }
      #newGameBtn:active{
        border: 2px inset gray;
      }
      #newGameBtn::before{
        content: "";
        width: 10px;
        height: 75px;
        left: -30px;
        top: -30px;
        background: rgba(211, 211, 211, 0.5);
        display: block;
        transform: rotate(35deg);
        transition: .25s;
      }
      #newGameBtn:hover::before{
        left: 130px;
      }
    </style>
  </head>
  <body>
    <!-- <Name Input Form> -->
    <div class="nameInputForm">
      <form class="mainForm">
        <h1 class = "formHead">Enter Player Name</h1>
        <div class="PlayerInputContainer">
          <input type="text" id = "U1NameTaker" placeholder = "Player1" required>
          <input type="text" id = "U2NameTaker" placeholder = "Player2" required>
        </div>
        <button type="submit" id = "submitter" class="submitHelper">
        </button>
      </form>
    </div>
    <!-- </ Name Input Form> -->

    <div class="GameContainer" id="'">
      <div style="display:flex;">
        <div class="U1">
          <div style="display:flex;justify-content:space-between;align-items: center;">
            <p id = "U1Name">Player 1</p>
            <div class="symImgContainer">
              <img src="Tic Tac Toe/Pictures/Tic Tac Circle.png" height = "50px" width = "50px" title = "Symbol" alt="Circle">
            </div>
          </div>
          <div class="scoreBlock" id="U1Score">Score: 0</div>
        </div>
        <h1 id = "winDeclarer"></h1>
        <div class="U2">
          <div style="display:flex;justify-content:space-between;align-items: center;">
            <p id = "U2Name">Player 2</p>
            <div class="symImgContainer">
              <img src="Tic Tac Toe/Pictures/Tic Tac Cross.png" height = "50px" width = "50px" title = "Symbol" alt="Cross">
            </div>
          </div>
          <div class="scoreBlock" id="U2Score">Score: 0</div>
        </div>
      </div>
      <button class = "playAgain" id="playAgainBtn"> Play Again </button>
      <div class="centerAligner">
        <div class="mainTicTacContainer">
          <div class="mainTicTac"></div>
          <div class="mainTicTac"></div>
          <div class="mainTicTac"></div>
          <div class="mainTicTac"></div>
          <div class="mainTicTac"></div>
          <div class="mainTicTac"></div>
          <div class="mainTicTac"></div>
          <div class="mainTicTac"></div>
          <div class="mainTicTac"></div>
        </div>
      </div>
      <div class="centerAligner">
        <button id="newGameBtn"><span class="indexGiver">New Game</span></button>
      </div>
    </div>
    <script>
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
          turn === 0 ? "<img src='Tic Tac Toe/Pictures/Tic Tac Cross.png'>"
          : "<img src='Tic Tac Toe/Pictures/Tic Tac Circle.png'>"
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
    </script>
  </body>
</html>
