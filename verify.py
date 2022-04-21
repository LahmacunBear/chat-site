import datetime
import hashlib
import sys

def hash_string(x):
    m = hashlib.sha256()
    m.update(x.encode('utf8'))
    return m.hexdigest()

x, y = sys.argv[1], sys.argv[2]

with open('accounts.txt') as f:
    accounts = f.read().splitlines()

A, B = False, False

for i in accounts:
    a, b = i.split('###')
    if a == x:
        A = True
        now = datetime.datetime.now()
        date = str(datetime.datetime.now())[:-13]
        salt = hash_string(b + date)
        B = (salt == y)

if not (A and B):
    print('Unverified')