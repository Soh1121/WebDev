#!/usr/bin/python

print 'content-type: text/html'
print ''

age = 35

print age

pi = 3.14

print pi

name = "Rob"

print name

print age / pi

number = "5"

print number * age

print '<br>'

print int(number) * 5

print int(number) * age

print int(number) * pi

str = "My name is Rob"
print str[0]
print str[0:6]
print str[5]

myList = ["Apple", "banana", "orange"]
print myList
print myList[1]
print myList[1:4]

myTuple = (1,2,3,4)
print myTuple

dict = {}
dict["dad"] = "Rob"
dict["mum"] = "Kirsten"
dict[1] = "Tommy"
dict[2] = "Raphie"
print dict
print dict["mum"]
print dict.keys()
print dict.values()