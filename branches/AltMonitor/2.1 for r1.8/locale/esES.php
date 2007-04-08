<?php
/******************************
 * WoWRoster.net  Roster
 * Copyright 2002-2006
 * Licensed under the Creative Commons
 * "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * Short summary
 *  http://creativecommons.org/licenses/by-nc-sa/2.5/
 *
 * Full license information
 *  http://creativecommons.org/licenses/by-nc-sa/2.5/legalcode
 * -----------------------------
 *
 * $Id$
 *
 ******************************/

// -[ esES Localization ]-

// Installer
$lang['AltMonitor_install_page']= 'Instalador de AltMonitor';
$lang['AltMonitor_install']     = 'Las tablas de AltMonitor no estan instaladas todavia. Haz click en Install para empezar la instalacion.';
$lang['AltMonitor_upgrade']     = 'Las tablas de AltMonitor no estan al dia. Haz click en Update para actualizar la base de datos o haz click en Install para borra y volver a vrear las tablas de AltMonitor.';
$lang['AltMonitor_no_upgrade']  = 'Las tablas de AltMonitor estan al dia. Haz click en Reinstall debajo para reinstalar las tablas.';
$lang['AltMonitor_uninstall']   = 'Esto borrara la configuracion de AltMonitor y las relaciones Main/Alt. Haz click en "Uninstall" para proceder.';
$lang['AltMonitor_installed']   = 'Felicidades, AltMonitor se ha instalado correctamente. Haz click en el link de debajo para configurarlo.';
$lang['AltMonitor_uninstalled'] = 'AltMonitor ha sido desinstalado. Necesitas borrar el addon de tu servidor web.';

// Main/Alt display
$lang['AltMonitor_Menu']        = 'Mains/Alts';
$lang['AltMonitor_NoAction']    = 'Comprueba si has escrito bien la direccion URL, se ha encontrado una accion incorrecta. Si has llegado aqui mediante un link de este addon, informa del error en los foros de wowroster.net.';
$lang['main_name']              = 'Nombre del Main';
$lang['altlist_menu']           = 'Abrir/Cerrar todas las tablas';
$lang['altlist_close']          = 'Cerrar todas';
$lang['altlist_open']           = 'Abrir todas';

// Configuration
$lang['AltMonitor_config']      = 'Ir a la configuracion de AltMonitor';
$lang['AltMonitor_config_page'] = 'Configuracion de AltMonitor';
$lang['documentation']          = 'Documentacion';
$lang['updMainAlt']             = 'Actualizar relaciones';
$lang['uninstall']              = 'Uninstall';

// Page names
$lang['admin']['build']         = 'Main/Alt Relations|Configure how the Main/Alt relations are detected.';
$lang['admin']['display']       = 'Display|Configure display options specific to AltMonitor.';
$lang['admin']['documentation'] = 'Documentation|AltMonitor documentation on the WoWRoster wiki.';
$lang['admin']['updMainAlt']    = 'Update Relations|Update the Main/Alt relations using the data already in the DB.';

// Settings names on build page
$lang['admin']['getmain_regex'] = 'Regex|Las 3 variables de arriba definen como el Regex se extrae de la info de los miembros. <br /> Mira el link al Wiki para mas detalles. <br /> Este campo especifica como utilizar el Regex.';
$lang['admin']['getmain_field'] = 'Aplicar en campo|Las 3 variables de arriba indican como se extrae el regex de la info de los miembros. <br /> Mira el link al wiki para mas detalles. <br /> Este campo especifica que campo del miembro se utiliza cuando el regex esta encendido.';
$lang['admin']['getmain_match'] = 'Use match no|The top 3 variables define how the regex is extracted from the member info. <br /> See the wiki link for details. <br /> This field specifies which return value of the regex is used.';

$lang['admin']['getmain_main']  = 'Identificador del Main|Si el regex coincide con este valor el personaje se asume como Main. ';
$lang['admin']['defmain']       = 'Sin resultados|Configura como quieres que el personaje sea identificado por el regex, ya que este no devolvio ningun resultado.';
$lang['admin']['invmain']       = 'Resultados Incorrectos|Configura como quieres que el personaje sea identificado por el regex, ya que este devolvio un resultado que dice que el personaje no es un miembro de la guild o es igual al identificador del Main.';
$lang['admin']['altofalt']      = 'Alt de Alt|Especifica que hacer si el personaje es un alt que no pertenece a ningun Main.';

$lang['admin']['update_type']   = 'Tipo de actualizacion|Especificar en que trigger escribe para actualizar la relacion entre main/alt.';

// Settings names on display page
$lang['admin']['showmain']      = 'Mostrar el nombre del Main|Especifica si quieres que se muestre el nombre del Main en la lista de Alts.';
$lang['admin']['altopen']       = 'Campo de Alt|Especifica si quieres que por defecto esten abiertos o cerrados los campos de Alt.';
$lang['admin']['mainlessbottom']= 'Mostrar los Alts que no tiene Main.|Especifica si quieres que los Alts que no tienen Main se muetren al principio o al final de la lista.';

// Translator:
//
// BarryZGZ
