# Blue Chat Room Site

Chat-room site, with accounts and passwords, and individual rooms, as well as nice graphics.
Mostly python for account management (hashing and salts too), which is run through php (which makes up the display content), and javascript for updating the comments in the room.
Requires ```accounts.txt``` file, and environment variable ```key``` to store and perform very simple (xor) encryption on the account/password data.
The timeout for an account login (for the cookie and for the salt to perform) is an hour.
The main colour scheme is white and blue, and darker blues for hovered elements.
In case of an issue, incorrect password, account name already in use, timeout etc, there is automatic redirection with a (mostly) unique error message to the login page.

To run, copy repo and start basic php supporting server; there are no dependenices for the python (all modules are built-in).
