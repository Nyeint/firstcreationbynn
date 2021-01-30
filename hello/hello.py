import random
import greeting
import platform
from greeting import person1
import datetime
import math
import json
import re
import os
import numpy as np

myvar = "John"
my_var = "John"
_my_var = "John"
myVar = "John"
MYVAR = "John"
myvar2 = "John"

#Illegal variable names:
# emyvar = "John"
# my@ var = "John"
# my var = "John"

x=y=z="orange"
print(x)

# function 
# global variable
def myFunc():
    a='hey'
    global b
    b="I'm global"

myFunc()
print(b)

# get data type
print((type(x)))

#list
sequence = ["apple", "banana", "cherry"]  #same as (("apple", "banana", "cherry"))
print(sequence[1])
for x in sequence:
    print(x)
if "apple" in sequence:
    print("Yes! apple is in sequenct list")
sequence.append("orange")
print(sequence)
sequence.insert(3,"damson")
print(sequence)
sequence.remove("orange")
sequence.pop(1)     #remove the last item if index is not specified
del sequence[0]     #remove the list if index is not specified
print(sequence)
sequence1=sequence.copy() #copy the list
sequence2=list(sequence)  #copy the list
sequence3=sequence1+sequence2   #join two lists
sequence1.extend(sequence2)     #add sequence2 to sequence1
sequence.clear()    #empty the list
print(sequence)


#tuple
#cannot remove any item from tuple because tuple is 'unchangable'
#but can delete the tuple completely
#most of method are like as 'list'
sequence = ("apple", "banana", "cherry")
sequence1=("apple",)   #add ','  to create tuple with only one item
print(sequence[1])

#range
sequence = range(6)
print(sequence[5])
# print(sequence[6])   Error

#mapping
map = {"name":"nyeint", "age":23}     # same as dict(name="nyeint",age=23)
print(map["name"])  # same as map.get("name")
map["age"]=22       # change age
map["hair"]="black" # add item
map.pop("hair")     # remove item
map.popitem()       # remove the last inserted item
for x in map:
    print(map[x])
for x in map.values():
    print(x)
for x,y in map.items():    #loop both key and value
    print(x,y)
map1=map.copy()     #copy
map2=dict(map)      #copy
map.clear()         #clear

#set type
st={"apple","banana","cherry"}
st.add("damson")   #add item
st.update(["orange", "mango", "grapes"])  #insert items in st   
print("HEY !!!!",st)
st.remove("orange")   #remove item
st.discard("orange")  #remove item
# st.pop(1)             #remove item
st.clear()            #empty set
st1=st.union(st)      #create new set by joining two sets
print(st1)
del st                #delete set

#frozen set type
fst=frozenset({"apple", "banana", "cherry"})
print(fst)

##binary Type  --> bool, bytes, bytearray, memoryview
#bool
a=True

#bytes
byte = b"Hello"
print(byte[4])         #means for 'o'

#bytearray
byteA = bytearray(5)
print(byteA)

#memoryview
mv = memoryview(bytes(5))
print(mv[0])

#random
print(random.randrange(1,3))

# change float data type to 'complex' data type
a=5.5
b=complex(a)
print(b)

b = " Hello, World!"
#slicing
print(b[2:5])
#negative indexing
print(b[-5:-2])

print(len(b))
print(b.strip())
print(b.lower())
print(b.upper())
print(b.replace("H","J"))
print(b.split(","))

#return bool in function
def myFunction() :
  return True

if myFunction():
  print("YES!")
else:
  print("NO!")

def my_function(*kids):             #if the number of argument is unknow, add '*'
  print("The youngest child is " + kids[2]) #print for Linus
my_function("Emil", "Tobias", "Linus")

def my_function(**kids):            # if the number of keyword parameters
  print("The youngest child is " + kids['email'])  
my_function(email="Emil", name="Tobias", nickname="Linus")



#check an object is integer or not
x = 5
print(isinstance(x, int))

#lambda
x=lambda x: x+5
print(x(10))

def myFunction(n):
  return lambda x,y:x+y+n
funCall=myFunction(4)
print(funCall(10,9))


# Classes and Objects
class Person:
  def __init__ (self,name,age):
    self.name=name
    self.age=age
  def callInit(ss):
    print("Hello my name is "+ss.name)
  
person=Person("nyeint",23)
person.name="Seint"     # set name to 'Seint'
del person.age          # delete age
person.callInit()
print(person.name)

# Inheritance
class Student(Person):
  # pass
  def __init__(self, name, age):
    super().__init__(name, age)
    self.graduationyear = 2019

student=Student('Swanm',19)
print(student.graduationyear)
print(student.name)

# Iteration
mytuple=("app","bot")
myit = iter(mytuple)
print(next(myit))
print(next(myit))

#module
greeting.sayName("Nyeint")

#platform
print(platform.system())
print(dir(greeting))
print(person1["age"])

#dateTime
x=datetime.datetime.now()
y=datetime.datetime(1997,4,22)
print(x,x.strftime("%B"))

#math
print(min(3,4,5))
print(max(3,4,5))
print(abs(-3.7))
print(pow(3,2))
print(math.sqrt(5))
print(math.ceil(1.4))
print(math.floor(1.4))

#json
# 'indent' is to define the number of indents
# 'separator'
# 'sort_keys'
print(json.dumps({"name": "John", "age": 30},indent=4,separators=('.','='),sort_keys=True))
print(json.dumps(["apple", "bananas"]))
print(json.dumps(("apple", "bananas")))
print(json.dumps("hello"))
print(json.dumps(42))
print(json.dumps(31.76))
print(json.dumps(True))
print(json.dumps(False))
print(json.dumps(None))

# Regular Expression Module
txt = "The rain in Spain"
x = re.search("^The.*Spain$",txt)  #Search the string to see if it starts with "The" and ends with "Spain"
x = re.findall("ai", txt)          # print list of all matches
x = re.search("\s", txt)           # serch the first white space character in string
print(x.start())
x = re.split("\s", txt)
x = re.split("\s", txt,1)          # split the first word by white space
x=re.sub("\s","9",txt)             # replace every white space with "9"
x=re.sub("\s","9",txt,2) 
x = re.search(r"\bS\w+", txt)      # Search for an upper case "S" character in the beginning of a word, 
                                   # and print its position eg: (12,17)
                                   # if print (x.group) and output will be 'Spain'
print(x)

# Try ... Except

try:
  print(x1)
except NameError:
  print("Variable x is not defined")
except:
  print("Something else went wrong")
else:
  print("Nothing went wrong")
finally:
  print("The try except is finished")

x=-1
        # I will close with command line because 'if exception works, the rest of the code under exception are just aborted'
        # if x<0:
        #   raise Exception("Sorry, no numbers below zero")

        # if not type(x) is int:
        #   raise TypeError("Only integers are allowed")

# User Input
# username = input("Enter username:")
# print("Username is : ",username)


#String Formatting
price = 49
stuff = "book"
text= "The is {} kyats costs"
text1= "The is {:.2f} kyats costs"
text2= "This {} is worth with {} kyats"
text3 = "This {0} is worth with {1} kyats. Do you want to buy this {0} ?"
print(text1.format(price)) 
print(text2.format(stuff,price))
print(text3.format(stuff,price))

# Read Files
f = open("C:/Users/LENOVO/Documents/test.txt","r")
# print(f.read())
print("ANDDDD")
print(f.read(4))      # read the first '4' characters
print(f.readline())   # read the first line 
for x in f:           # loop throught the file by line
  print(x)
f.close()

# Write files
f = open("C:/Users/LENOVO/Documents/test.txt","a")
f.write("\nI got nothing left")
f.close()

# Create file
f = open("C:/Users/LENOVO/Documents/test1.txt","x")
f.close()

# Delete file
if os.path.exists("C:/Users/LENOVO/Documents/test1.txt"):
  os.remove("C:/Users/LENOVO/Documents/test1.txt")
else:
  print("The file does not exist")


# NumPy
arr = np.array([1,2,3,4,5,6,7])
print(arr[:4])          #1,2,3,4
print(arr.dtype)
newarr = arr.astype('f')  # convert from int to float type
print(newarr)
x = arr.copy()            # copy array
y = arr.view()            # view array
print(arr[1:5:2])       # 2,4
arr = np.array([[1,2,3],[4,5,6]])
print(arr[0:2,2])       # 3,6 because of element of index 2 from array 0 and array 1 (0:2)
print(arr.shape)        # array shape
arr = arr.reshape(-1) # array reshape (change to ['1','2','3','4','5','6','a','b','c','d','e','f'])

arr = np.array([[[1,2,3],[4,5,6]],[['a','b','c'],['d','e','f']]])
print(arr[1,1,1:3])    # e,f 
# print(arr)
print(arr.ndim)
print(arr[1,0,1])

arr1 = np.array([[1, 2], [3, 4]])
arr2 = np.array([[5, 6], [7, 8]])
newarr = np.concatenate((arr1,arr2),axis=1)
newarr = np.concatenate((arr1,arr2))
print(newarr)

arr = np.array_split(newarr,4)     # equal to "np.hsplit(newarr,4)"
arr = np.array_split(newarr,4,axis=1)
print(arr)
print("HEHEHE")


# Matplotlib


