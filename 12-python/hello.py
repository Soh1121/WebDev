#!/usr/bin/python

print 'content-type: text/html'
print ''

prime = [2]

for i in range(3, 51):
    flag = 0
    for j in prime:
        if i % j == 0:
            flag = 1
    if flag == 0:
        prime.append(i)

prime.insert(0, 1)
prime.insert(0, 0)
print prime