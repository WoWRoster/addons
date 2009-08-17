This README file details how to configure the
ventrilotest.php script in order to issue status requests to
a Ventrilo server and process the response. The document and
examples are written assuming that a Windows based WEB/PHP
server will be used. If you plan on running these scripts on
a Linux/Unix based platform then you will need to make the
appropriate changes.

This document will not teach you how to administrate a
WEB/PHP server. It is your responsibility to learn these
things on your own or have someone else teach it to you.

Before you can even use the ventrilotest.php file you will
need to tweak the $stat->m_cmdprog path first. Please read
the entire document before doing so.

With the exception of the ventrilostatus.php script, all of
the other php files are for example purposes. Feel free to
customize them or create new ones based on these examples.

Please be advised that the ventrilo_status program must be
on the same machine where you plan on running these PHP
scripts, or accessible from the same machine.

These scripts were tested on PHP Version 4.2.2 and 4.3.3 but
should work with any version 4 system as far as we know.

Be advised that if your web/php server is running Linux then
you must install the Linux version of the ventrilo_status
program. Likewise, if your web server is running Windows
then you must install the Windows version of the
ventrilo_status.exe program. The same goes for all of the
other supported server platforms. Installing the windows
ventrilo_status.exe program on a Linux machine will not work
no matter how hard you try.

Before you can issue status requests to a Ventrilo server
you must first configure the Ventrilo server to receive and
process UDP messages. This can be done in the servers INI
file under that [Status] section. All servers version 2.1.2
or higher come with examples showing all of the options.
However, the UDP support is disabled by default so that they
are compliant with older versions. You must read the
"ventrilo_srv.htm" file that comes with each of the servers
in order to understand what and how to configure the
[Status] section of the server. We will give examples here
but we will not be addressing the advanced options to
prevent server abuse. This is your responsibility and you
can only learn how to do it by reading the ventrilo_srv.htm
file and having a working knowledge about network interface
cards, IP addresses and network administration. If you do
not have these skills then you should let someone more
qualified configure the server for you.

In the ventrilo_srv.ini file and under the [Status] section
you should:

Uncomment the example Intf=0.0.0.0 by removing the # sign in
front of it. This will enable processing of all UDP messages
from all network cards in the system.

Comment out all of the FilterGen and FilterDetail lines.
This can be done by placing a # sign in front of them.

After changing the INI file you will need to restart the
Ventrilo server.

You can manually start the ventrilo_status program from a
command prompt and give it the details for requesting the
status of a server. Instructions on how to do this can be
found in the ventrilo_srv.htm file.

Now, open the ventrilotest.php file with an editor.

There are several key lines that must be filled in properly
in order to issue requests to the Ventrilo server via the
ventrilostatus.php script. Each example will be followed by
a description.

$stat->m_cmdprog = "c:/var/www/html/ventrilo_status";

This informs the ventrilostatus.php script of the path and
name of the program to be spawned externally. The example
shows a Windows style path, so if you are using a Linux/Unix
style OS you will need to change that accordingly. For some
machines removing the path and leaving just the
"ventrilo_status" program name will be sufficient but will
imply that the program is located in the same location as
the script it self and that the PHP server is configured to
support such behavior. The example is designed for clarity
and is not necessarily a valid location since the
configuration of your web server is entirely beyond our
control or knowledge.

$stat->m_cmdcode = "2";

This will request the advanced details, assuming that the
server is configured to support it. See the ventrilo_srv.htm
file for details about other command codes.

$stat->m_cmdhost = "127.0.0.1";

This specifies the IP address or host name of the machine to
be statused. The address 127.0.0.1 implies that the Ventrilo
server is running on the same machine as the web server. It
also assumes that the Ventrilo server will accept status
request messages from that interface.

$stat->m_cmdport = "3784";

This specifies the port number of the Ventrilo server. If
you have more then one Ventrilo server on a single machine,
or if a single server you are statusing runs on a different
port number, then you must supply the correct port number
here. 3784 is the default port number for all servers but is
controlled by the person who configures the server.

$stat->m_cmdpass = "";

This option allows you to enter the clear-text password that
has been defined in the [Status] section of the
ventrilo_srv.ini file. Please note that this password is
different from the main client connection password. It is
also case sensitive.

When starting the ventrilotest.php script from a web browser
one of several things will happen. It will either:

  A)   Work perfectly and give you all of the requested
     information from the server
B)   Display the error: No response from server.
C)   Display the error: PHP Unable to start external status
process.

If (A) then nothing else needs to be done unless you want to
tweak the server and tighten down the hatches, which we
would encourage you to do. However, if it suddenly stops
working then you are not configuring the system correctly
and the responsibility is yours to figure it out. If you do
not fully understand the advanced options of the servers INI
file then you should let some more qualified set it up for
you.

If (B) then you are at least able to spawn the external
status program successfully. This usually means that you
either didn't specify the correct IP address or host name in
the m_cmdhost option, the wrong port number in the m_cmdport
option, the wrong password in the m_cmdpass option, the
server is not up and running, the server is not accessible
from this machine due to router/firewall constraints or any
Filter commands in the server INI file.

If (C) then you have not specified the correct path and file
name for the ventrilo_status program. Actually, that's just
one example of why you can't spawn the program. The
following notes will give other possible reasons for failure
to start the application.

As mentioned, make sure that the path to the program is
formatted correctly i.e. if your web server is running Linux
or Unix then the path would not start with C: and the path
it self would most likely be completely different.

Make sure that the path and file names are spelled
correctly. Linux/Unix based operating systems are usually
case sensitive.

Remember, on Linux/Unix systems the web server runs as a
different user account. If you installed the ventrilo_status
program under your own account name then it must be
accessible from the web/php server account as well.

On Linux/Unix systems the access rights to the location of
the program must be correct and accessible from the web
server which runs under a different account name.

On Linux/Unix systems the access rights for the program it
self must be set correctly. Performing a "chmod 0755
ventrilo_status" should make it so that anyone can spawn the
application. We will leave security issues regarding this
example up to you as we are not hear to teach you these
things.

Your PHP configuration file called "php.ini" might not be
configured correctly to allow spawning of external
applications via the PHP function exec(). This file is
usually located in the /etc directory on Linux/Unix or the
%SYSTEMROOT% directory on NT/2000/XP systems. Refer to your
PHP server's configuration options for it's actual location
if you are unable to find it.

Please note that if your are renting a virtual web server
from a hosting service then you probably will not have the
ability to view and/or change the current state of the
php.ini file. You will need to contact them in order to
determine it's current settings and whether or not they
would allow any changes to be made.

The following php.ini options will directly impact the
ability of the ventrilotest.php script to function properly.
Each option is commented after its example. Be sure to read
the documentation embedded in the php.ini file for each
option available.

safe_mode = on

If this option is set to off then none of the other
safe_mode_ options should have any real effect. Setting it
to on will severely restrict the ability of any of these
scripts from functioning depending on the configuration of
the following variables.

safe_mode_exec_dir = /var/bin

This option will restrict all externally spawned
applications with the exec() function to the specified
directory. Thus, if you have not installed the
ventrilo_status program in the specified directory then you
will not be able to execute it.

On Windows based systems running IIS and PHP you might need
to make the following permission changes:

Give the IUSR_<computer name> account read and execute
permission to C:\Windows\System32\cmd.exe

If you are using NT4 or Win2000 then that path will probably
need to be changed to C:\WINNT\System32\cmd.exe

The reason for this is because PHP doesn't start the
ventrilo_status.exe program directly. Instead it spawns a
command shell (the cmd.exe program) and it will then spawn
the ventrilo_status.exe program.

You should also consider the path names used to start the
ventrilo_status program or any Apache paths that might need
to be setup. Some programs have problems starting other
external processes if any type of path has a space in it.
For example, the standard C:\Program Files\ in windows has a
space in it which could be causing problems.


