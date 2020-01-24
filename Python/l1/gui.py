from tkinter import *

root = Tk()
root.title("lab 1")
root.geometry("400x300")

engToMorse = Button(text="eng -> morse", width="25")
engToMorse.grid(column=0, row=0)

morseToEng = Button(text="morse -> eng")
morseToEng.grid(column=1, row=0)

root.mainloop()