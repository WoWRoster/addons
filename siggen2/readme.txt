SigGEN2

The next generation in WoWRoster signature generation

The code here is very alpha and is not even ready to be used.
This is also off the top of my head after not working on this for about a year.
So the documention on the intended use is almost non-existant, but here it is anyway.
Feel free to ask questions and I will try to expand on this when I can.

The main generator code should be good to go but the front-end access
(viewing a signature) and config are not even started yet.



The basic idea behind SigGEN2 is modularization, layers, tags, and tag formatters.

-Modularization-
Any generation output is handled by modules. Each module comes complete with
the generation handler and admin configuration code.


-Layers-
Image layers are no longer hard coded in the generation code. Each layer is now
a SigGEN module.


-Tags-
Textand images are no longer hard coded into the generation code.
All variable text and image data are handled by tags.

This will give the character's level, name, race, class, and exp
[level] [name]: [race] [class] [exp]


-Tag Formatters-
Tags can be extended with tag formatters.
Tag formatters change standard text output with color, size, and hopefully
other abilities.

This is the same as above, but with formatters
[level:size(20):color(ff3333)] [name:color(66ffff)]: [race] [class] [exp:format_exp:color(00ff00)]

* level will have font-size 20 and color 'ff3333'
* name will have the color '66ffff'
* exp will pass through a special formatter called format_exp which will combine
  all the exp data into a more readable format and will have the color '00ff00'

Currently, tag formatters are coded in inc/tagmodify.class.php
I'm not sure if they extendable via modules yet. But i would like them to be.


-Off the top random thoughts-
Per player settings stored as "themes"
"Designs" are kinda like configs in the old SigGen,
  they are the basic types like signature, avatar, guild banner
"Themes" are configs and styles for a design,
  basically the second half of the old configs from v0.x SigGen
"Layers" are...well..layers. Any image or piece of text is a layer
