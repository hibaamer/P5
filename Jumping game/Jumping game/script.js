var character = document.getElementById("character");
var block = document.getElementById("block");
var counter=0;

let score = 0;
let highScore = 0;


function jump() {
    if(character.classList == "animate"){return}
    character.classList.add("animate");
    setTimeout(function(){
        character.classList.remove("animate");
    },300);
}



var checkDead = setInterval(function() {
    let characterTop = parseInt(window.getComputedStyle(character).getPropertyValue("top"));
    let blockLeft = parseInt(window.getComputedStyle(block).getPropertyValue("left"));
    if(blockLeft<20 && blockLeft>0 && characterTop>=130){
       block.style.animation = "none";
       block.style.display = "none";
        alert("Game Over. High score: " + score);
 
        //counter=0;
       block.style.animation = "block 1s infinite linear";
      
 
    }else{
      // ++counter;
       ++score;

       document.getElementById("currentScore").innerHTML =  "Score:" + score;
       if (score > highScore){
        highScore = score;
        document.getElementById("highScore").innerHTML =  "High Score:" + highScore;
        document.getElementById("score").innerHTML =  highScore;
       } else {
        document.getElementById("highScore").innerHTML =  "High Score:" + score;
        document.getElementById("score").innerHTML =  score;
       }
        
       
       
       
       
       
      
    }
}, 100);


    
    




