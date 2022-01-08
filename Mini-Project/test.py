import sys
import pickle

#
result = sys.argv[1]

#result = result.

#result = result.split()
a = []
for i in result:
    i=int(i)
    a.append(i)

#print(type(a))
model = pickle.load(open('model.pkl', 'rb'))
x= model.predict([a])
x= x[0]
print(x)
#print(model.predict([[1, 2, 2, 2, 2, 2, 2, 2, 2, 2]]))
