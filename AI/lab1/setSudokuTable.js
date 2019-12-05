let arrSudokuCell = [
    [0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,0]
];

let arrSudokuCellBlock = [
    [[0,0],[0,1],[0,2],[1,0],[1,1],[1,2],[2,0],[2,1],[2,2]],
    [[0,3],[0,4],[0,5],[1,3],[1,4],[1,5],[2,3],[2,4],[2,5]],
    [[0,6],[0,7],[0,8],[1,6],[1,7],[1,8],[2,6],[2,7],[2,8]],
    [[3,0],[3,1],[3,2],[4,0],[4,1],[4,2],[5,0],[5,1],[5,2]],
    [[3,3],[3,4],[3,5],[4,3],[4,4],[4,5],[5,3],[5,4],[5,5]],
    [[3,6],[3,7],[3,8],[4,6],[4,7],[4,8],[5,6],[5,7],[5,8]],
    [[6,0],[6,1],[6,2],[7,0],[7,1],[7,2],[8,0],[8,1],[8,2]],
    [[6,3],[6,4],[6,5],[7,3],[7,4],[7,5],[8,3],[8,4],[8,5]],
    [[6,6],[6,7],[6,8],[7,6],[7,7],[7,8],[8,6],[8,7],[8,8]]
];

const drawSudokuCell = () => {
    let out = ``;
    for (let i=0; i<9; i++) {
        for (let j=0; j<9; j++) {
            out += `<div class="game-cell" data-x="${j}" data-y="${i}"></div>`;
        }
    }
    document.querySelector('.game-box').innerHTML = out;
    delete out;
}

const drawSudokuBlock = () => {
    let countBlocks = 0;
    for (let i=0; i<arrSudokuCellBlock.length; i++) {
        for (let j=0; j<arrSudokuCellBlock[i].length; j++) {
            document.querySelector(`.game-cell[data-x="${arrSudokuCellBlock[i][j][0]}"][data-y="${arrSudokuCellBlock[i][j][1]}"]`).setAttribute("data-block", countBlocks);
        }
        countBlocks++;
    }
    delete countBlocks;
}

const findEmplyCell = (numb) => {
    let x = Math.floor(Math.random() * 9);
    let y = Math.floor(Math.random() * 9);
    if (arrSudokuCell[x][y] != 0) {
        findEmplyCell(numb);
    } else {
        arrSudokuCell[x][y] = numb;
        delete x;
        delete y;
        return;
    }
}

const setRandomNumbers = (countNumbers) => {
    for (let i=0; i<countNumbers; i++) {
        let random = Math.floor((Math.random() * 9) + 1);
        findEmplyCell(+random);
    }
    console.log(arrSudokuCell);
    delete random;
}

const drawRandomNumbers = () => {
    for (let i=0; i<arrSudokuCell.length; i++) {
        for (let j=0; j<arrSudokuCell[i].length; j++) {
            if (arrSudokuCell[i][j]) {
                document.querySelector(`.game-cell[data-x="${j}"][data-y="${i}"]`).innerText = arrSudokuCell[i][j];
            }
        }
    }
}

const setClearTable = () => {
    for (let i=0; i<arrSudokuCell.length; i++) {
        for (let j=0; j<arrSudokuCell[i].length; j++) {
            arrSudokuCell[i][j] = 0;
        }
    }
    document.querySelectorAll('.game-cell').forEach((e) => e.innerText = "");
}

const main_setSudokuTable = (countNumbers) => {
    setClearTable();
    drawSudokuCell();
    drawSudokuBlock();
    setRandomNumbers(countNumbers);
    drawRandomNumbers();
}