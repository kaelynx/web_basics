/*
    Kent State University
    CS 44105/54105 Web Programming I
    Fall 2017
    Assignment 3
    The World’s Hardest Game 2 Remake
    worldshardestgame.js
    Author 1: Abdulkareem Alali, aalali1@kent.edu
    Author 2: Kaelyn Campbell, kcampb41@kent.edu
*/

const DARKBLUE = 'rgb(0,0,139)';
const GOLD = 'rgb(255,255,0)';
const BACKGROUND_IMAGE = "images/world-hardest-game-2-bg-level-1.png";
const SCREENS = {
    screen1 : {
        /*var gradient = context.createLinearGradient(0,0,canvas.width,canvas.height);
        gradient.addColorStop(0,"black");
        gradient.addColorStop(1,"white");
        context.fillStyle = gradient;
        context.fillRect(10,10,canvas.width,canvas.height);*/
    },

    screen3 : {
        gameCenterWall : {
            top : 100,
            bottom : 355,
            }
    }
}
const BALLS = {
    pair1 : {
        ball1 : ["p1b1", 400, 225, 11, 4.5, DARKBLUE],
        ball2 : ["p1b2", 443, 225, 11, 4.5, DARKBLUE]
    },
    pair2 : {
        ball1 : ["p2b1", 572, 225, 11, 4.5, DARKBLUE],
        ball2 : ["p2b1", 615, 225, 11, 4.5, DARKBLUE]
    },
    pair3 : {
        ball1 : ["p3b1", 486, 225, 11, -4.5, DARKBLUE],
        ball2 : ["p3b1", 529, 225, 11, -4.5, DARKBLUE]
    }
}

const COINS = {
    coin1 : ["c1", 421.5, 265, 11, 11, 0, 0, 2 * Math.PI, GOLD],
    coin2 : ["c2", 507.5, 185, 11, 11, 0, 0, 2 * Math.PI, GOLD],
    coin3 : ["c3", 593.5, 265, 11, 11, 0, 0, 2 * Math.PI, GOLD]
}

var canvas = document.querySelector("canvas");
var context = canvas.getContext("2d");
var punch; 
var collect;
var collected = 0;
var music;
var coin;
var obs;
var piece;
var paused = false;
var getSpan = document.getElementsByTagName('span');
var death = 0;
var game_start = false;
var s = document.createElement('span');
var s2 = document.createElement('span');
var m = document.createTextNode("Mute");
var p = document.createTextNode("Pause");
s.appendChild(p);
s2.appendChild(m);
var para = document.getElementsByTagName("p")[0];
para.insertBefore(s2, para.childNodes[2]);
para.insertBefore(s, para.childNodes[2]);

document.getElementsByTagName("span")[3].addEventListener("click", function(){
    music.paused ? music.play() : music.pause();
    punch.pause();
    collect.pause();
});

document.getElementsByTagName("span")[2].addEventListener("click", function(){
    if(game_start == true){
    togglePause();
    }
});

window.addEventListener("load", function(){
    //DOM Loaded
    intro_screen()
    //startGame(); 
});

window.addEventListener("click", posCheck);

window.addEventListener("keydown", function(e) {
    if([37, 38, 39, 40].indexOf(e.keyCode) > -1) {
        e.preventDefault();
    }
}, false);

/*
window.addEventListener("click", function(event){
    if(!game_start /*&& x >= 550 && x <= 700 && y <=450 && y >= 400){
        clearCanvas();
        second_screen();
        //wait(2000);
        //clearCanvas();
        startGame();
    }
});
*/

function posCheck(event) {
    var mouse = getMouse(canvas, event);
    if((mouse.x > canvas.width/2 - 50 && mouse.x < canvas.width/2 + 50) && (mouse.y > 330 && mouse.y < 430)) {
        //clearCanvas();
        second_screen();
        startGame();
    }
}

function getMouse(canvas, event) {
    var r = canvas.getBoundingClientRect();
    return {
        x: event.clientX - r.left,
        y: event.clientY - r.top
    };
}

function togglePause() {
    if(!paused) {
        paused = true;
    } else if (paused) {
        paused = false;
    }
}

function wait(milliseconds) {
   var currentTime = new Date().getTime();
   while (currentTime + milliseconds >= new Date().getTime()) {
    //pause
   }
}

function intro_screen(){
    context.textAlign = "center";
    var gradient = context.createLinearGradient(0,0,canvas.width,canvas.height);
    gradient.addColorStop(0,"black");
    gradient.addColorStop(.5, "grey");
    gradient.addColorStop(1,"black");
    context.fillStyle = gradient;
    context.fillRect(0,0,canvas.width,canvas.height);

    context.fillStyle = "white";
    context.font = "20px Arial";
    context.fillText("THE WORLD'S", 390, 210);

    context.fillStyle = "0099cc";
    context.font = "50px mono45-headline, monospace";
    context.fillText("HARDEST GAME", canvas.width/2, canvas.height/2);

    context.fillStyle = "white";
    context.font = "20px Arial";
    context.fillText("VERSION 2.0", 615, 265);

    context.fillStyle = "white";
    context.font = "40px Arial";
    context.fillText("BEGIN", canvas.width/2, 400);
}

function second_screen() {
    //clearCanvas();
    var gradient = context.createLinearGradient(0,0,canvas.width,canvas.height);
    gradient.addColorStop(0,"0099cc");
    gradient.addColorStop(.5, "CCE5F4");
    gradient.addColorStop(1,"0099cc");
    context.fillStyle = gradient;
    context.fillRect(0,0,canvas.width,canvas.height);

    context.textAlign = "center";
    context.fillStyle = "black";
    context.font = "40px Arial";
    context.fillText("YOU DON'T STAND A CHANCE", canvas.width/2, canvas.height/2);

    wait(2000);
    clearCanvas();
    //startGame();
}

function clearCanvas(){
    context.clearRect(0, 0, canvas.width, canvas.height);
}

function startGame(){
    //Begin
    //game.clear();
    window.removeEventListener("click", posCheck);
    game_start = true;
    //clearCanvas();
    //game.intro_screen();
    game.init();
    piece = new component(30, 30, "red", 240, 210);
    obs = new obstacles(game);  
    punch = new Audio("soundeffects/RealisticPunch.mp3");
    music = new Audio("soundeffects/World'sHardestGame2ThemeSong.mp3");
    collect = new Audio("soundeffects/CoinCollect.wav");
    music.addEventListener('ended', function() {
    this.currentTime = 0;
    this.play();
    }, false);
    music.play(); 
}

function endGame() {
    death++;
    collected = 0;
    document.getElementsByTagName("span")[5].innerHTML = death;
    game.clear();
    obs = new obstacles(game);
    piece = new component(30, 30, "red", 240, 210);
}

function winGame() {
    var test = false;
    if (collected == 3) {
        test = true;
        alert("You made it!");
        death = -1;
        endGame();
    } else {
        test = false;
    }
}

//Engine
var game = {
    //canvas: null,
    //context : null,
    init : function() {
        this.canvas = document.querySelector("canvas");
        this.context = this.canvas.getContext("2d");
        this.interval = setInterval(update, 20); 

        window.addEventListener('keydown', function (e) {
            game.keys = (game.keys || []);
            game.keys[e.keyCode] = (e.type == "keydown");
        })
        window.addEventListener('keyup', function (e) {
            game.keys[e.keyCode] = (e.type == "keydown");            
        })       
    },
    drawBackground: function(){
        if (this.context != undefined){
            var img = new Image;
            img.src = BACKGROUND_IMAGE;
            this.context.drawImage(img, 0, 0);
        }
        piece.update();
    },
    stop : function() {
        clearInterval(this.interval);
    },    
    clear : function() {
        this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
    },
    getContext: function(){
        return this.context;
    }
    /*intro_screen: function(){
        this.context.font = "50px Impact";
        this.context.fillStyle = "0099cc";
        this.context.textAlign = "center";
        this.context.fillText("The Worlds Hardest Game", this.canvas.width/2, this.canvas.height/2);
        window.addEventListener("keydown", function(event){

        if(event.keyCode == 13 && !game_start){
                //this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
                startGame();
        }
        })
    }*/
}

function obstacles(game){
    //create the array of balls & coins that will be animated
    this.game = game;
    this.balls = [ ball.construct(BALLS.pair1.ball1),
                   ball.construct(BALLS.pair1.ball2),
                   ball.construct(BALLS.pair2.ball1),
                   ball.construct(BALLS.pair2.ball2),
                   ball.construct(BALLS.pair3.ball1),
                   ball.construct(BALLS.pair3.ball2)
                ];
    this.coins = [  coin.construct(COINS.coin1),
                    coin.construct(COINS.coin2),
                    coin.construct(COINS.coin3)
                ];
    this.animate = function(){
        //loop through the balls array
        //draw the balls
        this.game.drawBackground();
        for (var i = 0; i < this.balls.length; i++){
            this.balls[i].animate(this.game.getContext());
        }
        //draw the coins
        for (var i = 0; i < this.coins.length; i++){
            this.coins[i].animate(this.game.getContext());
        } 
    }
}

function ball(name, x, y, radius, speed, color){
    this.name = name,
    this.x = x,
    this.y = y,
    this.radius = radius,
    this.speed = speed,
    this.color = color,
    this.animate = function(ctx){
        //Draw ball
        ctx.fillStyle = this.color;
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2, true);
        ctx.fill()

        //Animate
        var wall = SCREENS.screen3.gameCenterWall;        
        if (this.y - this.radius + this.speed < wall.top
         || this.y + this.radius + this.speed > wall.bottom){
          this.speed = -this.speed;
        }
        this.y += this.speed
    }
}

function component(width, height, color, x, y) {
    this.width = width;
    this.height = height;
    this.speedX = 0;
    this.speedY = 0;    
    this.x = x;
    this.y = y;
    this.update = function() {
        ctx = game.context;
        ctx.fillStyle = color;
        ctx.fillRect(this.x, this.y, this.width, this.height);
        for (var i = 0; i < obs.balls.length; i++) {
            if (RectCircleColliding(obs.balls[i],this)) {
                if(!music.paused){
                    punch.play();
                }
                endGame();
            }
        }
        for (var i = 0; i < obs.coins.length; i++) {
            if(coinColliding(obs.coins[i], piece)){
                if(!music.paused){
                    collect.play();
                }
                collected++;
                obs.coins[i].removeCoin(); 
            }
        }
    }
    this.newPos = function() {
        //this.x += this.speedX;
        //this.y += this.speedY;

        piece.speedX = 0;
        piece.speedY = 0;  

        if (game.keys && game.keys[37]) {piece.speedX = -4; }
        if (game.keys && game.keys[39]) {piece.speedX = 4; }
        if (game.keys && game.keys[38]) {piece.speedY = -4; }
        if (game.keys && game.keys[40]) {piece.speedY = 4; }

        if (this.x >= 212 && this.y >= 144 && this.y + (this.height) <= 310 && this.x <= 800 - this.width 
            /*|| this.x >= 400 && this.y >= 135 && this.y + (this.height) <= 350 && this.x <= 800 - this.width*/){
            this.x += this.speedX;
            this.y += this.speedY;
        } 
        else {
            if (this.x <= 212) {this.x = 212;}
            if (/*this.x < 400 && */this.y <= 144) {this.y = 144;}
            if (/*this.x <= 400 && */this.y + (this.height) > 310) {this.y = 310 - (this.height);} 
            if (this.x >= 400 && this.y + (this.height) > 350) {this.y = 350 - (this.height);}
            if (this.x >= 800 - this.width) {this.x = 800 - (this.width);}
        }
        if (this.x >= 725) {
            winGame();
        }         
    }

}

function coin(name, x, y, Xradius, Yradius, rotation, startP, endP, color){
    this.name = name,
    this.speed = 0;
    this.x = x,
    this.y = y,
    this.Xradius = Xradius,
    this.Yradius = Yradius,
    this.rotation = rotation,
    this.startP = startP,
    this.endP = endP,
    this.color = color,
    this.animate = function(ctx){
        //Draw coin
        ctx.fillStyle = this.color;
        ctx.beginPath();
        ctx.ellipse(this.x, this.y, this.Xradius, this.Yradius, this.rotation, this.startP, this.endP);
        ctx.fill()

        //Animate
        if(this.Xradius == 11) {
            this.speed = -1;
        }
        if(this.Xradius == 0) {
            this.speed = 1;
        }
        this.Xradius += this.speed;
    }
    this.removeCoin = function() {
        this.x = null;
        this.y = null;
        this.Xradius = 0;
        this.Yradius = 0;
        this.rotation = 0;
        this.startP = 0;
        this.endP = 0;
    }
}

function RectCircleColliding(ball,piece){
    var distX = Math.abs(ball.x - piece.x-piece.width/2);
    var distY = Math.abs(ball.y - piece.y-piece.height/2);

    if (distX > (piece.width/2 + ball.radius)) { return false; }
    if (distY > (piece.height/2 + ball.radius)) { return false; }

    if (distX <= (piece.width/2)) { return true; } 
    if (distY <= (piece.height/2)) { return true; }

    var dx=distX-piece.width/2;
    var dy=distY-piece.height/2;
    return (dx*dx+dy*dy<=(ball.radius*ball.radius));
}

function coinColliding(coin,piece){
    var distX = Math.abs(coin.x - piece.x-piece.width/2);
    var distY = Math.abs(coin.y - piece.y-piece.height/2);

    if (distX > (piece.width/2 + coin.Xradius)) { return false; }
    if (distY > (piece.height/2 + coin.Xradius)) { return false; }

    if (distX <= (piece.width/2)) { return true; } 
    if (distY <= (piece.height/2)) { return true; }

    var dx=distX-piece.width/2;
    var dy=distY-piece.height/2;
    return (dx*dx+dy*dy<=(coin.Xradius*coin.Xradius));
}

function update() {
    if (!paused) {
        //clearCanvas();
        game.clear();
        obs.animate();
        piece.newPos(); 
    }
}


