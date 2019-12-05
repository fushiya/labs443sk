const setGame = () => {

    document.querySelectorAll(`.game-cell`).forEach((e)=>{
        e.innerText = ``;
        if (e.classList.contains('numb')) {
            e.classList.remove('numb');
        }
    });

    let complication = [];
    for (let i=0; i<15; i++) {
        complication.push(Math.ceil(Math.random() * 8));
    }
    console.log(complication);

    let arrCells = [];
    const randomCells = () => {
        var newCell = Math.floor(Math.random() * 81);

        if (arrCells.indexOf(newCell)) {
            arrCells.push(newCell);
        } else {
            randomCells();
        }
    }

    for (let i=0; i<complication.length; i++) {
        randomCells();
        document.querySelector(`.game-cell[data-count="${arrCells[i]}"]`).innerText = complication[i];
        document.querySelector(`.game-cell[data-count="${arrCells[i]}"]`).classList.add('numb');
    }

}