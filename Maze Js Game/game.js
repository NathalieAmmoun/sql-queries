window.onload=function(){
var score=0;
var isStatus= false;
var start = document.getElementById("start");
var boundary = document.getElementsByClassName("boundary");
var status = document.getElementById("status");
var end = document.getElementById("end");
var game = document.getElementById("game")

//RESET MAZE
start.addEventListener("click", resetMaze);
function resetMaze(){
    status.innerHTML = "Game Reset"
    score = 0;
    isStatus = false;
    for (var i =0; i< boundary.length; i++){
        boundary[i].style.backgroundColor = "#eeeeee";
    }}
//Hover Over S to Start The GAME
start.addEventListener("mouseover", startGame);
function startGame(){
    isStatus=true;
    status.innerHTML = "Game Started " + score;
    for (var i =0; i< boundary.length; i++){
        boundary[i].style.backgroundColor = "#eeeeee";
    }
    game.style.backgroundColor ="white";
}
//CHEATER!!
game.addEventListener("mouseleave", cheater);
function cheater(){
    if(isStatus){
    score -= 10;
    isStatus = false;
    status.innerHTML = "YOU ARE CHEATING, YOU LOST! " + score;
    for (var i =0; i< boundary.length; i++){
        boundary[i].style.backgroundColor = "#ff8888";
    }
}
}
//Moving Over Boundary
for (var i =0; i< boundary.length; i++){
    boundary[i].addEventListener("mouseover", gameLost);
    function gameLost(){
    if(isStatus){
    score -= 10;
    isStatus = false;
    status.innerHTML ="You Lost! " + score;
    for (var i =0; i< boundary.length; i++){
        boundary[i].style.backgroundColor = "#ff8888";
    }    
}
        }
    }
//reaching END
end.addEventListener("mouseover", gameWon);
    function gameWon(){
    if (isStatus){
        score +=5;
        status.innerHTML= "You Won! " + score;
        game.style.backgroundColor ="green";   
    }
        isStatus=false;
}

}
