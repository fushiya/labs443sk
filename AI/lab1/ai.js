const checkLineX = (oX, oY) => {
    let cell = arrSudokuCell[oY][oX];
    for (let i=0; i<arrSudokuCell[oY].length; i++) {
        if (oX == i) {
            continue;
        }
        if (arrSudokuCell[oY][oX] == arrSudokuCell[oY][i] && arrSudokuCell[oY][i] > 0) {
            return false;
        }
    }
    delete cell;
    return true;
}

const checkLineY = (oX, oY) => {
    let cell = arrSudokuCell[oY][oX];
    for (let i=0; i<arrSudokuCell[oY].length; i++) {
        if (oX == i) {
            continue;
        }
        if (arrSudokuCell[oY][oX] == arrSudokuCell[i][oY] && arrSudokuCell[i][oY] > 0) {
            return false;
        }
    }
    delete cell;
    return true;
}

const checkBlock = (oX, oY) => {
    let cell = arrSudokuCell[oY][oX];

}

const main_ai = () => {
    checkLineX(lastClickCell[0], lastClickCell[1]) ? console.log("oX: clear") : console.log("oX: error");
    checkLineY(lastClickCell[0], lastClickCell[1]) ? console.log("oY: clear") : console.log("oY: error");
}