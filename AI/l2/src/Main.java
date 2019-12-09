import java.util.Scanner;

public class Main {

    public static void main(String[] args) {
        System.out.println("1. Телефон");
        System.out.println("2. Комп'ютер");
        System.out.println("3. Фотоапарат");
        System.out.println("4. Акумулятор");
        System.out.println("5. Піаніно");
        for (;;) {
            Scanner scanner = new Scanner(System.in);
            String line = scanner.nextLine();
            if (line == "q") break;
            boolean b1 = false, b2 = false, b3 = false, b4 = false, b5 = false;
            for (String str :
                    line.split(" ")) {
                switch (Integer.parseInt(str)) {
                    case (1):
                        b1 = true;
                        break;
                    case (2):
                        b2 = true;
                        break;
                    case (3):
                        b3 = true;
                        break;
                    case (4):
                        b4 = true;
                        break;
                    case (5):
                        b5 = true;
                        break;
                }
            }
            if (b1) {
                if (b1 && !b2 && !b3 && !b4 && !b5) System.out.println("Телефон");
                if (b2) {
                    if (b3 && b5) System.out.println("Cмартфон із камерою, та музикою");
                    else if (b3) System.out.println("Смартфон із камерою");
                    else if (b5) System.out.println("Смартфон із музикою");
                    else if (b4) System.out.println("Мобільний телефон");
                    else System.out.println("Смартфон");

                }
            } else if (b2) {
                if (b2 && !b3 && !b4) System.out.println("Комп'ютер");
                if (b4 && b3) System.out.println("Ноутбук із ккамерою");
                else if (b4) System.out.println("Ноутбук");
                else if (b3) System.out.println("Комп'ютер із камерою");
            } else if (b3) System.out.println("Фотоапарат");
            else if (b5) {
                if (!b4) System.out.println("Піаніно");
                else System.out.println("Сентизатор");
            } else if (b4) System.out.println("Акумулятор");
        }
    }
}
