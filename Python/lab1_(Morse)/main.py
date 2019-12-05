alphabet = {
    "A": ".-",
    "B": "-...",
    "C": "-.-.",
    "D": "-..",
    "E": ".",
    "F": "..-.",
    "G": "--.",
    "H": "....",
    "I": "..",
    "J": ".---",
    "K": "-.-",
    "L": ".-..",
    "M": "--",
    "N": "-.",
    "O": "---",
    "P": ".--.",
    "Q": "--.-",
    "R": ".-.",
    "S": "...",
    "T": "-",
    "U": "..-",
    "V": "...-",
    "W": ".--",
    "X": "-..-",
    "Y": "-.--",
    "Z": "--..",
    "1": ".----",
    "2": "..---",
    "3": "...--",
    "4": "....-",
    "5": ".....",
    "6": "-....",
    "7": "--...",
    "8": "---..",
    "9": "----.",
    "0": "-----",
    ".": ".......",
    ",": ".-.-.-",
    ":": "---...",
    ";": "-.-.-.",
    "(": "-.--.-",
    ")": "-.--.-",
    "'": ".----.",
    '"': ".-..-.",
    "-": "-....-",
    "/": "-..-.",
    "?": "..--..",
    "!": "--..--",
    " ": "-...-",
    "@": ".--.-."
}



def English_To_Morse(txt):
    txt = txt.upper()
    out = ""
    for char in txt:
        out += alphabet.get(char, "InputError") + " "
    print(out)

def Morse_To_English(txt):
    txt = txt.upper().split()
    out = ""
    for char in txt:
        for l,v in alphabet.items():
            if (v == char):
                out += l
    print(out.title())

def run():
    i = "eng"
    s = True

    while(s):
        vuln = input("Input: ")

        if ("lang = ") in vuln:
            i = vuln[7:]
            print("set "+ i +" language")
        elif i == "morse":
            Morse_To_English(vuln)
        elif i == "eng":
            English_To_Morse(vuln)
        elif "close" in vuln:
            s = False
        else:
            print("Unknow input")

run()