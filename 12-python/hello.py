#!/usr/bin/python

print 'content-type: text/html'
print ''

name = "Rob"

if name == "Rob" or name == "Kirsten":
    print "Hello " + name + "!"
else:
    print "I don't know."