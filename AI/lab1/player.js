let lastClickCell = [0,0];

const drawCell = () => {
    document.querySelectorAll(`.game-cell`).forEach((e) => {
        e.onclick = (context) => {
            let random = Math.floor((Math.random() * 9) + 1);
            e.innerText = random;
            arrSudokuCell[e.dataset.y][e.dataset.y] = random;
            lastClickCell[0] = e.dataset.y;
            lastClickCell[1] = e.dataset.x;
        }
    });
}

const main_player =() => {
    drawCell();
}