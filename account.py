import datetime
import hashlib
import sys

username = sys.argv[1]

def hash_string(x):
    m = hashlib.sha256()
    m.update(x.encode('utf8'))
    return m.hexdigest()

password = hash_string(sys.argv[2])

with open('accounts.txt') as f:
    accounts = f.read().splitlines()

A, B = False, False

for i in accounts:
    a, b = i.split('###')
    if a == username:
        A = True
        B = (b == password)
        break

direct = False

if (not A):
    try:
        with open('accounts.txt', 'a') as f:
            a = username
            b = password
            f.write('###'.join([a, b]) + '\n')
        direct = True
    except Exception as e:
        print(e)

if (A and B):
    direct = True

elif A and (not B):
    direct = False
    print('/index.php?error=Login%20or%20Signup%20Unsuccessful')

if direct:
    now = datetime.datetime.now()
    date = str(datetime.datetime.now())[:-13]
    salt = hash_string(b + date)
    print(a + '###' + salt)