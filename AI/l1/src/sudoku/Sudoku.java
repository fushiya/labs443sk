package sudoku;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;
import java.util.Scanner;

public class Sudoku {
    private int[][] table = new int[9][9];
    private List<int[][]> answerList = new ArrayList<>();
    private int empyCells[][]; // координати нулів
    private int maxSizeAnswer = 100;

    public int getmaxSizeAnswer() {
        return maxSizeAnswer;
    }

    public void setmaxSizeAnswer(int maxSizeAnswer) {
        this.maxSizeAnswer = maxSizeAnswer;
    }

    public List<int[][]> getAnswerList() {
        return answerList;
    }

    public void setAnswerList(List<int[][]> answerList) {
        this.answerList = answerList;
    }

    public int[][] getTable() {
        return table;
    }

    public void setTable(int[][] table) {
        this.table = table;
    }

    private void changeValueCell(int indexCoordinates) {
        if (answerList.size() == maxSizeAnswer) return;
        for (int i = indexCoordinates; i < empyCells[0].length; i++) { // цикл для пересування по координатам нулів матриці
            if (empyCells[0][i] == -1) break; // додаткова умова виходу із циклу
            int numbers[] = getNumberValues(empyCells[0][i], empyCells[1][i]); // список можливих варіантів числі для даної порожньої комірки
            for (int j = 0; j < 9; j++) { // цикл для пересування по можливим варіантам
                if (numbers[j] == 0) {
                    return; // додаткова умова виходу із функції
                }
                table[empyCells[0][i]][empyCells[1][i]] = numbers[j];
                if (getEmpyCells()[0][0] == -1) {
                    addAnswer(table);
                    if (answerList.size() % 1 == 0) {
                        for (int k = 0; k < 9; k++) {
                            if (k % 3 == 0) System.out.println();
                            for (int l = 0; l < 9; l++) {
                                if (l % 3 == 0) System.out.print(" ");
                                System.out.print(table[k][l] + " ");
                           }
                            System.out.println();
                        }
                        System.out.println();
                        Scanner scanner = new Scanner(System.in);
                        scanner.next();
                    }
                }
                changeValueCell(indexCoordinates + 1);
                table[empyCells[0][i]][empyCells[1][i]] = 0;
            }
        }
    }

    public void findAnswers() {
        empyCells = getEmpyCells(); // отримую координати нулів
        changeValueCell(0);

        for (int i = 0; i < 81; i++) { // підчищаю матрицю
            if (empyCells[0][i] == -1) break; // додаткова умова виходу із циклу
            table[empyCells[0][i]][empyCells[1][i]] = 0;
        }
    }

    private int[][] getEmpyCells() { // функія повернить координати порожніх клітинок матриці
        int[][] coordinates = new int[2][81];
        int coordinatesLength = 0;
        // інінціалізую всі коортинати числом -1;
        for (int i = 0; i < 81; i++) {
            coordinates[0][i] = -1;
        }
        for (int i = 0; i < 9; i++) {
            for (int j = 0; j < 9; j++) {
                if (table[i][j] == 0) {
                    coordinates[0][coordinatesLength] = i;
                    coordinates[1][coordinatesLength] = j;
                    coordinatesLength++;
                }
            }
        }
        return coordinates;
    }

    // функція повертатиме всі можливі варіанти цифр для однієї комірки
    private int[] getNumberValues(int i, int j) {
        int result[] = new int[9];
        int resultLength = 0;
        for (int k = 1; k <= 9; k++) { // цикл перебератиме всі цифри
            boolean isNumber = true;
            for (int l = 0; l < 9; l++) { // цикл для перевірки числа по горизонталі та вертикалі
                if (table[i][l] == k || table[l][j] == k) isNumber = false;
            }
            // перевіряю число в клітках 3х3
            int minValueI = 0, maxValueI = 0;
            int minValueJ = 0, maxValueJ = 0;
            for (int l = 3; l < 9; l += 3) {
                if (i < l && maxValueI == 0) {
                    minValueI = l - 3;
                    maxValueI = l;
                }
                if (j < l && maxValueJ == 0) {
                    minValueJ = l - 3;
                    maxValueJ = l;
                }
            }
            for (int l = minValueI; l < maxValueI; l++) {
                for (int m = minValueJ; m < maxValueJ; m++) {
                    if (table[l][m] == k) isNumber = false;
                }
            }
            if (!isNumber) continue; // якщо чило (k) не підходить, то я його не записую

            result[resultLength] = k;
            resultLength++;
        }
        return result;
    }

    private void addAnswer(int[][] table) {
        int newTable[][] = new int[9][9];
        for (int i = 0; i < 9; i++) {
            newTable[i] = table[i].clone();
        }
        answerList.add(newTable);
    }

    public static void main(String[] args) {
        Sudoku sudoku = new Sudoku();
        int table[][] = new int[][]{
                {0, 0, 0, 0, 9, 0, 0, 0, 0},
                {0, 0, 0, 0, 0, 0, 0, 0, 0},
                {0, 0, 3, 0, 0, 0, 0, 0, 0},
                {0, 0, 5, 0, 0, 0, 0, 0, 0},
                {0, 0, 0, 0, 0, 0, 0, 0, 0},
                {0, 0, 0, 0, 0, 0, 0, 0, 0},
                {0, 0, 6, 0, 0, 0, 0, 0, 0},
                {0, 0, 0, 0, 1, 0, 0, 0, 0},
                {0, 0, 0, 0, 0, 0, 0, 0, 0}
        };
        sudoku.setTable(table);
        sudoku.findAnswers();
        for (int[] ints : sudoku.getAnswerList().get(0)) {
            System.out.println(Arrays.toString(ints));
        }
        System.out.println(sudoku.getAnswerList().size() + " варіантів");
    }

}
