

def help():
    print('Невірна команда')
    print('1) літо/осінь/зима/весна')
    print('2) Число без плюса')
    weather()



def weather():
    print('Виберіть пору року')
    season = str(input())
    print('Яка температура повітря')
    temp = int(input())
    sky = str()

    if (season == "літо"):
        if (temp > 30):
            temp = "25-30"
            sky = 'Ясно'
        elif (temp > 20):
            temp = "15-25"
            sky = 'Хмарно'
        elif (temp < 20):
            temp = "10-20"
            sky = 'Дощ'
        else:
            help()
        print()
        print("На небі: " + sky)
        print("Температура: " + temp + "C")
    elif (season == 'осінь'):
        if (temp > 20):
            temp = "10-15"
            sky = 'Ясно'
        elif (temp > 10):
            temp = "5-10"
            sky = 'Хмарно'
        elif (temp < 10):
            temp = "5-10"
            sky = 'Дощ'
        else:
            help()
        print()
        print("На небі: " + sky)
        print("Температура: " + temp + "C")
    elif (season == 'зима'):
        if (temp > 0):
            temp = "-5 - 0"
            sky = 'Ясно'
        elif (temp > -10):
            temp = "-15 - 5"
            sky = 'Хмарно'
        elif (temp < -10):
            temp = "-10 - -20"
            sky = 'Дощ'
        else:
            help()
        print()
        print("На небі: " + sky)
        print("Температура: " + temp + "C")
    elif (season == 'весна'):
        if (temp > 20):
            temp = "10-15"
            sky = 'Ясно'
        elif (temp > 10):
            temp = "5-10"
            sky = 'Хмарно'
        elif (temp < 10):
            temp = "5-10"
            sky = 'Дощ'
        else:
            help()
        print()
        print("На небі: " + sky)
        print("Температура: " + temp + "C")
    else:
        print('Невідома команда')


weather()