const keyUp = 38;
const keyDown = 40;
const keyLeft = 37;
const keyRight = 39;

let isUp = false;
let isRight = false;
let isDown = false;

function up(e){
    if(e.keyCode == keyUp)
    {
        console.log("up");
        isUp = true;
    }
}

function right(e){
    if(e.keyCode == keyRight)
    {
        console.log("right");
        isRight = true;
    }
    else
    {
        isUp = false;
        isRight = false;
        isDown = false;
    }
}

function down(e){
    if(e.keyCode == keyDown)
    {
        console.log("down");
        isDown = true;
    }
    else
    {
        isUp = false;
        isRight = false;
        isDown = false;
    }
}

function left(e){
    if(e.keyCode == keyLeft)
    {
        window.location.href = '/MyToDo/action/pole.php';
        isUp = false;
        isRight = false;
        isDown = false;
    }
    else
    {
        isUp = false;
        isRight = false;
        isDown = false;
    }
}


function isKey(e){
    if(isUp)
    {
        if(isRight)
        {
            if(isDown)
            {
                left(e);
            }
            else
            {
                down(e);
            }
        }
        else
        {
            right(e);
        }
    }
    else
    {
        up(e);
    }
}

addEventListener("keydown", isKey);