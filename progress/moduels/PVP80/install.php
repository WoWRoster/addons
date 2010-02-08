<?php


class PVP80Install
{

      var $fullname = 'LvL 80 PVP sets';
      var $description = 'Guild LvL 80 PVP sets';
      var $icon = 'inv_misc_tabardpvp_02';
      var $version = '1.0';
      var $credits = array(
		array(	"name"=>	"Ulminia warcraftalliance@gmail.com",
				"info"=>	"Retired Roster Dev Now addon Dev!"),
	);


      var $info = array(

      	'PvP80DeathKnight' => Array(


		'arenas10d1' => Array(
            
                	'item_texture' => 'Spell_Deathknight_DeathStrike',
                	'item_quality' => 'q6',
                	'item_sub_head' => 'q5|',
			'info' => Array(
					Array( 'item_id' => '40817', 'item_texture' => '' ,'item_quality' => 'q3' ,'item_name' => 'Savage Gladiator\'s Dreadplate Helm' ),
					Array( 'item_id' => '40857', 'item_texture' => '' ,'item_quality' => 'q3' ,'item_name' => 'Savage Gladiator\'s Dreadplate Shoulders' ),
					Array( 'item_id' => '40779', 'item_texture' => '' ,'item_quality' => 'q3' ,'item_name' => 'Savage Gladiator\'s Dreadplate Chestpiece' ),
					Array( 'item_id' => '40799', 'item_texture' => '' ,'item_quality' => 'q3' ,'item_name' => 'Savage Gladiator\'s Dreadplate Gauntlets' ),
					Array( 'item_id' => '40837', 'item_texture' => '' ,'item_quality' => 'q3' ,'item_name' => 'Savage Gladiator\'s Dreadplate Legguards' ),
			),
		),
				
		'arenas10d2' => Array(
            
                	'item_texture' => 'Spell_Deathknight_DeathStrike',
                	'item_quality' => 'q6',
                	'item_sub_head' => 'q5|',
			'info' => Array( 
					Array( 'item_id' => '40820', 'item_texture' => '' ,'item_quality' => 'q4' ,'item_name' => 'Hateful Gladiator\'s Dreadplate Helm' ),     
					Array( 'item_id' => '40860', 'item_texture' => '' ,'item_quality' => 'q4' ,'item_name' => 'Hateful Gladiator\'s Dreadplate Shoulders' ),     
					Array( 'item_id' => '40781', 'item_texture' => '' ,'item_quality' => 'q4' ,'item_name' => 'Hateful Gladiator\'s Dreadplate Chestpiece' ),     
					Array( 'item_id' => '40803', 'item_texture' => '' ,'item_quality' => 'q4' ,'item_name' => 'Hateful Gladiator\'s Dreadplate Gauntlets' ),     
					Array( 'item_id' => '40841', 'item_texture' => '' ,'item_quality' => 'q4' ,'item_name' => 'Hateful Gladiator\'s Dreadplate Legguards' ),     
			),
		),				
		'arenas10d3' => Array(
            
                	'item_texture' => 'Spell_Deathknight_DeathStrike',
                	'item_quality' => 'q6',
                	'item_sub_head' => 'q5|',
			'info' => Array(
					Array( 'item_id' => '40824', 'item_texture' => '' ,'item_quality' => 'q4' ,'item_name' => 'Deadly Gladiator\'s Dreadplate Helm' ),     
					Array( 'item_id' => '40863', 'item_texture' => '' ,'item_quality' => 'q4' ,'item_name' => 'Deadly Gladiator\'s Dreadplate Shoulders' ),     
					Array( 'item_id' => '40784', 'item_texture' => '' ,'item_quality' => 'q4' ,'item_name' => 'Deadly Gladiator\'s Dreadplate Chestpiece' ),     
					Array( 'item_id' => '40806', 'item_texture' => '' ,'item_quality' => 'q4' ,'item_name' => 'Deadly Gladiator\'s Dreadplate Gauntlets' ),     
					Array( 'item_id' => '40845', 'item_texture' => '' ,'item_quality' => 'q4' ,'item_name' => 'Deadly Gladiator\'s Dreadplate Legguards' ),     
			),
		),
	),
	
	);
      
      var $upgrade = array(
            Array( 'item_id' => '40817', 'item_texture' => 'INV_Helmet_135' ,'item_quality' => 'q3' ,'item_name' => 'Savage Gladiator\'s Dreadplate Helm' ),
      );
 
}


