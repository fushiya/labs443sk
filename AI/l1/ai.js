const solutionGame = (oX, oY) => {
    let checkCell = document.querySelector(`.game-cell[data-x="${oX}"][data-y="${oY}"]`);

    // checkYLine(oX, oY);
    console.log(document.querySelector(`.game-cell[data-x="${i}"][data-y="${j}"]`).innerText);
    let arr = [];
    for (let i=0; i<10; i++) {
        arr[i] = [];
        for (let j=0; j<10; j++) {
            try {
                arr[i][j] = document.querySelector(`.game-cell[data-x="${i}"][data-y="${j}"]`).innerText || 0;
            } catch(ex) {
                console.log(document.querySelector(`.game-cell[data-x="${i}"][data-y="${j}"]`));
            }
        }
    }
    // console.log(arr);

    // const unique = (arr) => {
    //     let res = [];
    //     for (let el of arr) {
    //         if (res.includes(el)) {
    //         } else {
    //             break;
    //             return false;
    //         }
    //     }
    //     return true;
    // }

    // const checkYLine = (x, y) => {
    //     let checkLine = document.querySelectorAll(`.game-cell[data-y="${y}"]`).innerText;
    //     if (unique(checkLine())) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
}
