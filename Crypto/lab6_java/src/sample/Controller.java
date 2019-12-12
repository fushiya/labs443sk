package sample;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.Label;
import javafx.scene.control.TextArea;
import javafx.scene.control.TextField;
import javafx.stage.FileChooser;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileReader;
import java.io.PrintWriter;
import java.util.Random;

public class Controller {
    @FXML
    private TextArea textArea;

    @FXML
    private Label hashLabel;

    public static final String
            characters = "абвгґдеєжзиіїйклмнопрстуфхцчшщьюя";

    private String hash;
    private void RSA(boolean encrypt) {
        StringBuilder text = new StringBuilder(textArea.getText());
        StringBuilder output = new StringBuilder();
        int p = 3;
        int q = 11;
        int n = p * q;
        int e = 7;
        int d = 3;

        for (char c : textArea.getText().toCharArray()) {
            int step;
            if (encrypt) {
                if (characters.indexOf(String.valueOf(c).toLowerCase()) == -1) continue;
                hash += String.valueOf(c).toLowerCase();
                step = (int) (Math.pow(characters.indexOf(String.valueOf(c).toLowerCase()), e) % n);
            } else {
                step = (int) (Math.pow(characters.indexOf(String.valueOf(c).toLowerCase()), d) % n);
            }
            output.append(characters.toCharArray()[step]);
        }

        textArea.setText(output.toString());
    }

    public void Encrypt(javafx.event.ActionEvent actionEvent) {
        hash = "";
        RSA(true);
        hashLabel.setText("Хеш оригінального тексту = " + hash.hashCode());
    }

    public void Decrypt(javafx.event.ActionEvent actionEvent) {
        RSA(false);
        hashLabel.setText("Хеш розшифрованого тексту = " + textArea.getText().hashCode());
    }

    public void clickOpenFile(ActionEvent actionEvent) {
        FileChooser fileChooser = new FileChooser();
        try (BufferedReader reader = new BufferedReader(
                new FileReader(fileChooser.showOpenDialog(null)))) {
            StringBuilder readFile = new StringBuilder();
            while (reader.ready()) {
                readFile.append((char) reader.read());
            }
            textArea.setText(readFile.toString());
        } catch (Exception e) {

        }

    }

    public void clickSaveFile(ActionEvent actionEvent) {
        FileChooser fileChooser = new FileChooser();
        File file = fileChooser.showSaveDialog(null);
        if (file != null) {
            try {
                PrintWriter writer;
                writer = new PrintWriter(file);
                writer.println(textArea.getText());
                writer.close();
            } catch (Exception e) {
            }
        }
    }

    private int getPrimeNumber() {
        FileChooser fileChooser = new FileChooser();
        try (BufferedReader reader = new BufferedReader(
                new FileReader("D:\\Learn\\labs443sk1s\\Crypto\\lab6_java\\src\\sample\\PrimeNumbers"))) {
            StringBuilder readFile = new StringBuilder();
            while (reader.ready()) {
                readFile.append((char) reader.read());
            }
            Random random = new Random();
            return Integer.parseInt(readFile.toString().split("\n")[random.nextInt(500)].trim());
        } catch (Exception e) {

        }
        return -1;
    }

}
