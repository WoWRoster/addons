<?php
/**
 * WoWRoster.net WoWRoster
 *
 * spanish localisaton - thx to Subxero
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2002-2007 WoWRoster.net
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    SVN: $Id$
 * @link       http://www.wowroster.net
 * @package    ApiSync
*/

// -[ esES Localization ]-

// Button names
$lang['async_button1']			= 'ApiSync Personaje|Sincroniza el personaje con la Armería de Blizzard';
$lang['async_button2']			= 'ApiSync Personaje|Sincroniza el personaje con la Armería de Blizzard';
$lang['async_button3']			= 'ApiSync Personaje|Sincroniza el personaje con la Armería de Blizzard';
$lang['async_button4']			= 'ApiSync Miembros|Sincroniza el listado de miembros con la Armería de Blizzard';
$lang['async_button5']			= 'ApiSync nueva Hermandad|Añade una nueva Hermandad y sincroniza<br />la lista de miembros con la Armería de Blizzard';

// Config strings
$lang['admin']['ApiSync_conf']			= 'Configuración ApiSync|Configure base settings for ApiSync';
$lang['admin']['ApiSync_ranks']			= 'Ranks|Configure guild ranks for ApiSync';
$lang['admin']['ApiSync_images']			= 'Images|Configure image displaying for ApiSync';
$lang['admin']['ApiSync_access']			= 'Access Rights|Configure access rights for ApiSync';
$lang['admin']['ApiSync_debug']			= 'Debugging|Configure debug settings for ApiSync';

$lang['admin']['ApiSync_host']			= 'Servidor|Servidor con el que sincronizar.';
$lang['admin']['ApiSync_minlevel']		= 'Nivel Minimo|Nivel minimo de los personajes para sincronizar.';
$lang['admin']['ApiSync_synchcutofftime']	= 'Tiempo de Sync minimo|Tiempo en dias.<br />Todos los personajes que no se hayan actualizado en los ultimos (x) dias seran sincronizados.';
$lang['admin']['ApiSync_use_ajax']	= 'Use AJAX|Wether to use AJAX for status update or not.';
$lang['admin']['ApiSync_reloadwaittime']	= 'Tiempo de espera recarga|Tiempo en segundos.<br />Tiempo que espera antes de empezar la siguiente sincronización.';
$lang['admin']['ApiSync_fetch_timeout'] = 'Tiempo de espera agotado para la Armory|Tiempo en segundos que se espera para recibir un solo archivo XML antes de ser cancelado.';
$lang['admin']['ApiSync_skip_start'] = 'Saltar pagina inicial|Saltar pagina inicial al actualizar con ApiSync.';
$lang['admin']['ApiSync_status_hide'] = 'Hide status windows initialy|Hide the status windows of ApiSync on the first load.';
$lang['admin']['ApiSync_protectedtitle']	= "Rango Hermandad protegidos|Los personajes con este rango estan protegidos<br />no podran ser borrados por una actualización del listado de miembros desde la armería.<br />Amenudo el problema suele ocurrir con los personajes banqueros.<br />Es posible añadir mas de uno separandolo con \",\". Ejem. Banco,Almacen";

$lang['admin']['ApiSync_rank_set_order']	= "Guild Rank Set Order|Defines in which order the guild titles will be set.";
$lang['admin']['ApiSync_rank_0']	= "Title Guild Leader|This title will be set if in WoWRoster for that guild non is defined.";
$lang['admin']['ApiSync_rank_1']	= "Title Rank 1|This title will be set if in WoWRoster for that guild non is defined.";
$lang['admin']['ApiSync_rank_2']	= "Title Rank 2|This title will be set if in WoWRoster for that guild non is defined.";
$lang['admin']['ApiSync_rank_3']	= "Title Rank 3|This title will be set if in WoWRoster for that guild non is defined.";
$lang['admin']['ApiSync_rank_4']	= "Title Rank 4|This title will be set if in WoWRoster for that guild non is defined.";
$lang['admin']['ApiSync_rank_5']	= "Title Rank 5|This title will be set if in WoWRoster for that guild non is defined.";
$lang['admin']['ApiSync_rank_6']	= "Title Rank 6|This title will be set if in WoWRoster for that guild non is defined.";
$lang['admin']['ApiSync_rank_7']	= "Title Rank 7|This title will be set if in WoWRoster for that guild non is defined.";
$lang['admin']['ApiSync_rank_8']	= "Title Rank 8|This title will be set if in WoWRoster for that guild non is defined.";
$lang['admin']['ApiSync_rank_9']	= "Title Rank 9|This title will be set if in WoWRoster for that guild non is defined.";

$lang['admin']['ApiSync_char_update_access'] = 'Nivel de acceso Personajes|Quien puede hacer actualizaciones de personajes';
$lang['admin']['ApiSync_guild_update_access'] = 'Nivel de acceso Hermandad|Quien puede hacer actualizaciones de hermandades';
$lang['admin']['ApiSync_guild_memberlist_update_access'] = 'Nivel de acceso Listado de miembros|Quien puede hacer actualizaciones del listado de miembros';
$lang['admin']['ApiSync_realm_update_access'] = 'Nivel de acceso Reino|Quien puede hacer actualizaciones de reinos';
$lang['admin']['ApiSync_guild_add_access'] = 'Nivel de acceso añadir Hermandad|Quien puede añadir nuevas hermandades';

$lang['admin']['ApiSync_logo'] = 'ApiSync Logo|';
$lang['admin']['ApiSync_pic1'] = 'ApiSync Image 1|';
$lang['admin']['ApiSync_pic2'] = 'ApiSync Image 2|';
$lang['admin']['ApiSync_pic3'] = 'ApiSync Image 3|';
$lang['admin']['ApiSync_effects'] = 'ApiSync Image Effects|';
$lang['admin']['ApiSync_logo_show'] = 'Show Logo|';
$lang['admin']['ApiSync_pic1_show'] = $lang['admin']['ApiSync_pic2_show'] = $lang['admin']['ApiSync_pic3_show'] = 'Show Image|';
$lang['admin']['ApiSync_pic_effects'] = 'Activated|Use JavaScript effects for images.';
$lang['admin']['ApiSync_logo_pos_left'] = $lang['admin']['ApiSync_pic1_pos_left'] = $lang['admin']['ApiSync_pic2_pos_left'] = $lang['admin']['ApiSync_pic3_pos_left'] = 'Image position horizontal|';
$lang['admin']['ApiSync_logo_pos_top'] = $lang['admin']['ApiSync_pic1_pos_top'] = $lang['admin']['ApiSync_pic2_pos_top'] = $lang['admin']['ApiSync_pic3_pos_top'] = 'Image position vertikal|';
$lang['admin']['ApiSync_logo_size'] = $lang['admin']['ApiSync_pic1_size'] = $lang['admin']['ApiSync_pic2_size'] = $lang['admin']['ApiSync_pic3_size'] = 'Image size|';
$lang['admin']['ApiSync_pic1_min_rows'] = $lang['admin']['ApiSync_pic2_min_rows'] = $lang['admin']['ApiSync_pic3_min_rows'] = 'Minimun Rows|Minimum number of rows in the status display<br />to display the image.';

$lang['admin']['ApiSync_debuglevel']		= 'Debug Level|Adjust the debug level for ApiSync.<br /><br />Quiete - No Messages<br />Base Infos - Base messages<br />Armory & Job Method Infos - All messages of Armory and Job methods<br />All Methods Info - Messages of all Methods  <b style="color:red;">(Be careful - very much data)</b>';
$lang['admin']['ApiSync_debugdata']		= 'Debug Data|Raise debug output by methods arguments and returns<br /><b style="color:red;">(Be careful - much more infos on high debug level)</b>';
$lang['admin']['ApiSync_javadebug']		= 'Debug Java|Enable JavaScript debugging.<br />Not implemented yet.';
$lang['admin']['ApiSync_xdebug_php']		= 'XDebug Session PHP|Enable sending XDEBUG variable with POST.';
$lang['admin']['ApiSync_xdebug_ajax']	= 'XDebug Session AJAX|Enable sending XDEBUG variable  with Ajax POST.';
$lang['admin']['ApiSync_xdebug_idekey']	= 'XDebug Session IDEKEY|Define IDEKEY for Xdebug sessions.';
$lang['admin']['ApiSync_sqldebug']		= 'SQL Debug|Enable SQL debugging for ApiSync.<br />Not useful in combination with roster SQL debugging / duplicate data.';
$lang['admin']['ApiSync_updateroster']	= "Update Roster|Enable roster updates.<br />Good for debugging<br />Not implemented yet.";


$lang['bindings']['bind_on_pickup'] = "Se liga al recogerlo";
$lang['bindings']['bind_on_equip'] = "Se liga al equiparlo";
$lang['bindings']['bind'] = "Ligado";

// Addon strings
$lang['RepStanding']['Exalted'] = 'Exaltado';
$lang['RepStanding']['Revered'] = 'Venerado';
$lang['RepStanding']['Honored'] = 'Honorable';
$lang['RepStanding']['Friendly'] = 'Amistoso';
$lang['RepStanding']['Neutral'] = 'Neutral';
$lang['RepStanding']['Unfriendly'] = 'Enemigo';
$lang['RepStanding']['Hostile'] = 'Hostil';
$lang['RepStanding']['Hated'] = 'Odiado';

$lang['Skills']['Class Skills'] = "Habilidades de clase";
$lang['Skills']['Professions'] = "Profesiones";
$lang['Skills']['Secondary Skills'] = "Habilidades secundarias";
$lang['Skills']['Weapon Skills'] = "Armas disponibles";
$lang['Skills']['Armor Proficiencies'] = "Armaduras disponibles";
$lang['Skills']['Languages'] = "Lenguas";


$lang['Classes']['Druid'] = 'Druida';
$lang['Classes']['Hunter'] = 'Cazador';
$lang['Classes']['Mage'] = 'Mago';
$lang['Classes']['Paladin'] = 'Paladín';
$lang['Classes']['Priest'] = 'Sacerdote';
$lang['Classes']['Rogue'] = 'Pícaro';
$lang['Classes']['Shaman'] = 'Shamán';
$lang['Classes']['Warlock'] = 'Brujo';
$lang['Classes']['Warrior'] = 'Guerrero';

$lang['Talenttrees']['Druid']['Balance'] = "Equilibrio";
$lang['Talenttrees']['Druid']['Feral Combat'] = "Combate feral";
$lang['Talenttrees']['Druid']['Restoration'] = "Restauración";
$lang['Talenttrees']['Hunter']['Beast Mastery'] = "Dominio de bestias";
$lang['Talenttrees']['Hunter']['Marksmanship'] = "Puntería";
$lang['Talenttrees']['Hunter']['Survival'] = "Supervivencia";
$lang['Talenttrees']['Mage']['Arcane'] = "Arcano";
$lang['Talenttrees']['Mage']['Fire'] = "Fuego";
$lang['Talenttrees']['Mage']['Frost'] = "Escarcha";
$lang['Talenttrees']['Paladin']['Holy'] = "Sagrado";
$lang['Talenttrees']['Paladin']['Protection'] = "Protección";
$lang['Talenttrees']['Paladin']['Retribution'] = "Represión";
$lang['Talenttrees']['Priest']['Discipline'] = "Disciplina";
$lang['Talenttrees']['Priest']['Holy'] = "Sagrado";
$lang['Talenttrees']['Priest']['Shadow'] = "Sombras";
$lang['Talenttrees']['Rogue']['Assassination'] = "Asesinato";
$lang['Talenttrees']['Rogue']['Combat'] = "Combate";
$lang['Talenttrees']['Rogue']['Subtlety'] = "Sutileza";
$lang['Talenttrees']['Shaman']['Elemental'] = "Elemental";
$lang['Talenttrees']['Shaman']['Enhancement'] = "Mejora";
$lang['Talenttrees']['Shaman']['Restoration'] = "Restauración";
$lang['Talenttrees']['Warlock']['Affliction'] = "Aflicción";
$lang['Talenttrees']['Warlock']['Demonology'] = "Demonología";
$lang['Talenttrees']['Warlock']['Destruction'] = "Destrucción";
$lang['Talenttrees']['Warrior']['Arms'] = "Armas";
$lang['Talenttrees']['Warrior']['Fury'] = "Furia";
$lang['Talenttrees']['Warrior']['Protection'] = "Protección";

$lang['misc']['Rank'] = "Rango";

$lang['guild_short'] = "Herman.";
$lang['character_short'] = "Pers.";
$lang['skill_short'] = "Habil.";
$lang['reputation_short'] = "Repu.";
$lang['equipment_short'] = "Equipo";
$lang['talents_short'] = "Talen.";

$lang['started'] = "empezo";
$lang['finished'] = "acabo";

$lang['ApiSyncTitle_Char'] = "ApiSync para Personajes";
$lang['ApiSyncTitle_Guild'] = "ApiSync para Hermandades";
$lang['ApiSyncTitle_Guildmembers'] = "ApiSync para listado de miembros de una Hermandad";
$lang['ApiSyncTitle_Realm'] = "ApiSync para Reinos";

$lang['next_to_update'] = "Siguiente Actualización: ";
$lang['nothing_to_do'] = "Nada para hacer por el momento";

$lang['error'] = "Error";
$lang['error_no_character'] = "Sin referencias del personaje.";
$lang['error_no_guild'] = "Sin referencias de la hermandad.";
$lang['error_no_realm'] = "Sin referencias del reino.";
$lang['error_use_menu'] = "Use el menu para sincronizar.";

$lang['error_guild_insert'] = "Error creando la hermandad.";
$lang['error_uploadrule_insert'] = "Error creando las reglas de subida.";
$lang['error_guild_notexist'] = "La hermandad facilitada no existe en la Armería.";
$lang['error_missing_params'] = "Faltan parametros. Por favor vuelve a intentarlo";
$lang['error_wrong_region'] = "Region incorrecta. Solo EU y US son regiones validas.";
$lang['ApiSync_guildadd'] = "Añadiendo Hermandad y sincronizando<br />listado de miembros con la Armería.";
$lang['ApiSync_charadd'] = "Adding Charakter and synchronize<br />with the Armory.";
$lang['ApiSync_add_help'] = "Información";
$lang['ApiSync_add_helpText'] = "Escribe la hermandad y el servidor exactamente como se muestran en la Armería de Blizzard.<br />Region es EU pra los europeos y US para las hermandades americanas. En primer lugar<br />se comprobara la existencia de la hermandad. Acto seguido se empezara con la<br />sincronización del listado de miembros.";

$lang['guildleader'] = "Maestro de la hermandad";

$lang['rage'] = "Ira";
$lang['energy'] = "Energía";
$lang['focus'] = "Focus";

$lang['ApiSync_credits'] = 'ApiSync Based off of armorysync built on blizzards API.';

$lang['start'] = "Empezar";
$lang['start_message'] = "Estas apunto de empezar a usar ApiSync con %s %s.<br /><br />Con esto toda la información de %s sera sobre escrita<br />con los detalles de la Armería de Blizzard. Solo se podra deshacer<br />subiendo de nuevo un wowroster.lua nuevo.<br /><br />Estas seguro de querer empezar el proceso";

$lang['start_message_the_char'] = "el personaje";
$lang['start_message_this_char'] = "este personaje";
$lang['start_message_the_guild'] = "la hermandad";
$lang['start_message_this_guild'] = "todos los personajes de esta hermandad";
$lang['start_message_the_realm'] = "el reino";
$lang['start_message_this_realm'] = "todos los personajes de este reino";

$lang['month_to_en'] = array(
    "enero" => "January",
    "febrero" => "February",
    "marzo" => "March",
    "abril" => "April",
    "mayo" => "May",
    "junio" => "June",
    "julio" => "July",
    "agosto" => "August",
    "septiembre" => "September",
    "octubre" => "October",
    "noviembre" => "November",
    "diciembre" => "December"
);

$lang['roster_deprecated'] = "WoWRoster deprecated";
$lang['roster_deprecated_message'] = "<br />You are using <b>WoWRoster</b><br /><br />Version: <strong style=\"color:red;\" >%s</strong><br /><br />To use <b>ApiSync</b> Version <strong style=\"color:yellow;\" >%s</strong><br />you will at least need <b>WoWRoster</b><br /><br />Version <strong style=\"color:green;\" >%s</strong><br /><br />Please update your <b>WoWRoster</b><br />&nbsp;";

$lang['ApiSync_not_upgraded'] = "ApiSync not upgraded";
$lang['ApiSync_not_upgraded_message'] = "<br />You have installed <b>ApiSync</b><br /><br />Version: <strong style=\"color:green;\" >%s</strong><br /><br />Right now there is <b>ApiSync</b><br /><br />Version <strong style=\"color:red;\" >%s</strong><br /><br />registered with <b>WoWRoster</b>.<br /><br />Please go to <b>WoWRoster</b> configuration<br />and upgrade your <b>ApiSync</b><br />&nbsp;";
