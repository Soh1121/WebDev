#!/usr/bin/python

print 'content-type: text/html'
print ''

for i in range(5, 11):
    print i

print "Rob"

list = ["pizza", "chocholate", "ice cream"]

# I like eating ***

print "<br>"
for food in list:
    print "I like eating " + food + "."
    print "<br>"

x = 0
while x <= 10:
    print x
    x = x + 1
    # x += 1
print "<br>"

ages = {}
ages["Rob"] = 35
ages["Kirsteen"] = 36
ages["Tommy"] = 5
ages["Raphie"] = 1

for age in ages:
    print age + " is " + str(ages[age]) + "."
    