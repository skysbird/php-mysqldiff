
README
======

Not really required, but MySQLDiff should get a README to.
There ist not very much to tell about installation, because it is
very simple. The scripts themself should be self-explaining.

1. Installation
===============

To install MySQLDiff copy the archive file into a directory visible on
your webserver and decompress it using:

	tar xvfz mysqldiff-X.Y.Z.tar.gz

X.Y.Z is the number of the release. The archive file will create a
subdirectory with all required files.

Please copy or rename the containing config.inc.php.dist to config.inc.php.


2. Using MySQLDiff
==================

On the first two screens after invoking MySQLDiff you have to make
settings for the connection to source- and destination databases.
The source database is that database used by the live-system, while
the target database is that on your development system. In other
words the source database is that which is, the target that which
it should be.

The Diff shows all changes that have to be done to make the target
database equal to the source database, in question of it's layout.

The third screen contains different settings concerning diff procedure.

o  change table type - should the used table handler be changed or
   should it be ignored.
o  alter table options - should the differen table options be compared
   or should it be ignored.
o  table comments - consider changed table comments.
o  merge statements - If this option is activated all edits are
   summarized into one statement. If not each edit it done with an extra
   ALTER statment.
o  show connection state - show the states of a database connection
   possibly more debug informations on errors.
o  syntax highlighting - with this option activate all statements are
   displayed coloured.

Once you click the generate button the diff will be generated and
displayed on the following page.

We hope that MySQLDiff will help you doing a good job and wish you
success!

Lippe-Net Online-Service
Herforder Straﬂe 309
33609 Bielefeld
Germany
