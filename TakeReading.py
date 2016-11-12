#!/usr/bin/python

import time, json
from envirophat import light, motion, weather, leds, analog

#out = open("enviro.log", "w")
#out.write("light\trgb\tmotion\theading\ttemp\tpress\n")

lux = light.light()
#leds.on()
rgb = str(light.rgb())[1:-1].replace(" ", "")
acc = str(motion.accelerometer())[1:-1].replace(" ", "")
heading = motion.heading()
temp = weather.temperature()
press = weather.pressure()
moist = analog.read(0)
soiltemp = analog.read(1)
reading = {"lux": lux, "rgb":rgb, "acc":acc, "heading":heading, "temp":temp, "press":press, "moist":moist, "soiltemp":soiltemp}
#print("%f|%s|%s|%f|%f|%f|%f|%f" % (lux, rgb, acc, heading, temp, press, moist, soiltemp))
print reading







