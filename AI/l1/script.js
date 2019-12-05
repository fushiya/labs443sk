let out = ``;
let count = 0;
for (let i=0; i<3; i++) {
    for (let j=0; j<3; j++) {
        out+=`<div class="game-block" data-count="${count}"></div>`;
        count++;
    }
}

document.querySelector('.game-box').innerHTML = out;
count = 0;
out = ``;

for (let i=0; i<9; i++) {
    for (let j=0; j<9; j++) {
        out =`<div class="game-cell" data-x="${j}" data-y="${i}"></div>`;
        switch(i+1) {
            case 0: document.querySelector(`.game-block[data-count="${0}"]`).innerHTML += out; break;
            case 1: document.querySelector(`.game-block[data-count="${1}"]`).innerHTML += out; break;
            case 2: document.querySelector(`.game-block[data-count="${2}"]`).innerHTML += out; break;
            case 3: document.querySelector(`.game-block[data-count="${3}"]`).innerHTML += out; break;
            case 4: document.querySelector(`.game-block[data-count="${4}"]`).innerHTML += out; break;
            case 5: document.querySelector(`.game-block[data-count="${5}"]`).innerHTML += out; break;
            case 6: document.querySelector(`.game-block[data-count="${6}"]`).innerHTML += out; break;
            case 7: document.querySelector(`.game-block[data-count="${7}"]`).innerHTML += out; break;
            case 8: document.querySelector(`.game-block[data-count="${8}"]`).innerHTML += out; break;
            default: console.log(i+1); break;
        }
    }   
    document.querySelector(`.game-block[data-count="${i}"]`).innerHTML = out;
    out = ``;
}       

delete count;
delete out;