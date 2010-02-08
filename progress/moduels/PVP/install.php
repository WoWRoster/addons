<?php


class PVPInstall
{

      var $fullname = 'PVP Items';
      var $description = 'Guild pvp sets';
      var $icon = 'inv_bannerpvp_03';
      var $version = '1.1';
      var $credits = array(
		array(	"name"=>	"Ulminia warcraftalliance@gmail.com",
				"info"=>	"Retired Roster Dev Now addon Dev!"),
	);


      var $info = array(

      'PVPHunter' => Array(

            'pvpea2' => Array(
            
                  'item_texture' => 'INV_BannerPVP_02',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps1',
                  'info' => Array(
                        Array( 'item_id' => '16465', 'item_texture' => 'INV_Helmet_05', 'item_quality' => 'q4', 'item_name' => 'Field Marshal\'s Chain Helm' ),
                        Array( 'item_id' => '16468', 'item_texture' => 'INV_Shoulder_10', 'item_quality' => 'q4', 'item_name' => 'Field Marshal\'s Chain Spaulders' ),
                        Array( 'item_id' => '16466', 'item_texture' => 'INV_Chest_Chain_03', 'item_quality' => 'q4', 'item_name' => 'Field Marshal\'s Chain Breastplate' ),
                        Array( 'item_id' => '16463', 'item_texture' => 'INV_Gauntlets_10', 'item_quality' => 'q4', 'item_name' => 'Marshal\'s Chain Grips' ),
                        Array( 'item_id' => '16467', 'item_texture' => 'INV_Pants_Mail_17', 'item_quality' => 'q4', 'item_name' => 'Marshal\'s Chain Legguards' ),
                        Array( 'item_id' => '16462', 'item_texture' => 'INV_Boots_Plate_07', 'item_quality' => 'q4', 'item_name' => 'Marshal\'s Chain Boots' ),
                  ),
            ),

            'pvpra2' => Array(
            
                  'item_texture' => 'INV_BannerPVP_02',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps2',
                  'info' => Array(
                        Array( 'item_id' => '23306', 'item_texture' => 'INV_Helmet_21', 'item_quality' => 'q3',  'item_name' => 'Lieutenant Commander\'s Chain Helm' ),
                        Array( 'item_id' => '23307', 'item_texture' => 'INV_Shoulder_16', 'item_quality' => 'q3',  'item_name' => 'Lieutenant Commander\'s Chain Shoulders' ),
                        Array( 'item_id' => '23292', 'item_texture' => 'INV_Chest_Chain_04', 'item_quality' => 'q3',  'item_name' => 'Knight-Captain\'s Chain Hauberk' ),
                        Array( 'item_id' => '23279', 'item_texture' => 'INV_Gauntlets_17', 'item_quality' => 'q3',  'item_name' => 'Knight-Lieutenant\'s Chain Vices' ),
                        Array( 'item_id' => '23293', 'item_texture' => 'INV_Pants_03', 'item_quality' => 'q3',  'item_name' => 'Knight-Captain\'s Chain Legguards' ),
                        Array( 'item_id' => '23278', 'item_texture' => 'INV_Boots_05', 'item_quality' => 'q3',  'item_name' => 'Knight-Lieutenant\'s Chain Greaves' ),
                  ),
            ),

            'pvpeh2' => Array(
            
                  'item_texture' => 'INV_BannerPVP_01',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps1',
                  'info' => Array(
                        Array( 'item_id' => '16566', 'item_texture' => 'INV_Helmet_09', 'item_quality' => 'q4', 'item_name' => 'Warlord\'s Chain Helmet' ),
                        Array( 'item_id' => '16568', 'item_texture' => 'INV_Shoulder_29', 'item_quality' => 'q4', 'item_name' => 'Warlord\'s Chain Shoulders' ),
                        Array( 'item_id' => '16565', 'item_texture' => 'INV_Chest_Chain_11', 'item_quality' => 'q4', 'item_name' => 'Warlord\'s Chain Chestpiece' ),
                        Array( 'item_id' => '16571', 'item_texture' => 'INV_Gauntlets_11', 'item_quality' => 'q4', 'item_name' => 'General\'s Chain Gloves' ),
                        Array( 'item_id' => '16567', 'item_texture' => 'INV_Pants_Mail_16', 'item_quality' => 'q4', 'item_name' => 'General\'s Chain Legguards' ),
                        Array( 'item_id' => '16569', 'item_texture' => 'INV_Boots_Plate_06', 'item_quality' => 'q4', 'item_name' => 'General\'s Chain Boots' ),
                  ),
            ),

            'pvprh2' => Array(
            
                  'item_texture' => 'INV_BannerPVP_01',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps2',
                  'info' => Array(
                        Array( 'item_id' => '23251', 'item_texture' => 'INV_Helmet_03', 'item_quality' => 'q3',  'item_name' => 'Champion\'s Chain Helm' ),
                        Array( 'item_id' => '23252', 'item_texture' => 'INV_Shoulder_01', 'item_quality' => 'q3',  'item_name' => 'Champion\'s Chain Shoulders' ),
                        Array( 'item_id' => '22874', 'item_texture' => 'INV_Chest_Chain_04', 'item_quality' => 'q3',  'item_name' => 'Legionnaire\'s Chain Hauberk' ),
                        Array( 'item_id' => '22862', 'item_texture' => 'INV_Gauntlets_17', 'item_quality' => 'q3',  'item_name' => 'Blood Guard\'s Chain Vices' ),
                        Array( 'item_id' => '22875', 'item_texture' => 'INV_Pants_03', 'item_quality' => 'q3',  'item_name' => 'Legionnaire\'s Chain Legguards' ),
                        Array( 'item_id' => '22843', 'item_texture' => 'INV_Boots_05', 'item_quality' => 'q3',  'item_name' => 'Blood Guard\'s Chain Greaves' ),
                  ),
            ),
      ),
    
      'PVPMage' => Array(
            
            'pvpea3' => Array(
            
                  'item_texture' => 'INV_BannerPVP_02',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps1',
                  'info' => Array(
                        Array( 'item_id' => '16441', 'item_texture' => 'INV_Helmet_24', 'item_quality' => 'q4', 'item_name' => 'Field Marshal\'s Coronet' ),
                        Array( 'item_id' => '16444', 'item_texture' => 'INV_Shoulder_23', 'item_quality' => 'q4', 'item_name' => 'Field Marshal\'s Silk Spaulders' ),
                        Array( 'item_id' => '16443', 'item_texture' => 'INV_Chest_Cloth_12', 'item_quality' => 'q4', 'item_name' => 'Field Marshal\'s Silk Vestments' ),
                        Array( 'item_id' => '16440', 'item_texture' => 'INV_Gauntlets_14', 'item_quality' => 'q4', 'item_name' => 'Marshal\'s Silk Gloves' ),
                        Array( 'item_id' => '16442', 'item_texture' => 'INV_Pants_08', 'item_quality' => 'q4', 'item_name' => 'Marshal\'s Silk Leggings' ),
                        Array( 'item_id' => '16437', 'item_texture' => 'INV_Boots_Cloth_03', 'item_quality' => 'q4', 'item_name' => 'Marshal\'s Silk Footwraps' ),
                  ),
            ),

            'pvpra3' => Array(
            
                  'item_texture' => 'INV_BannerPVP_01',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps2',
                  'info' => Array(
                        Array( 'item_id' => '23318', 'item_texture' => 'INV_Helmet_06', 'item_quality' => 'q3',  'item_name' => 'Lieutenant Commander\'s Silk Cowl' ),
                        Array( 'item_id' => '23319', 'item_texture' => 'INV_Shoulder_02', 'item_quality' => 'q3',  'item_name' => 'Lieutenant Commander\'s Silk Mantle' ),
                        Array( 'item_id' => '23305', 'item_texture' => 'INV_Chest_Cloth_28', 'item_quality' => 'q3',  'item_name' => 'Knight-Captain\'s Silk Tunic' ),
                        Array( 'item_id' => '23290', 'item_texture' => 'INV_Gauntlets_06', 'item_quality' => 'q3',  'item_name' => 'Knight-Lieutenant\'s Silk Handwraps' ),
                        Array( 'item_id' => '23304', 'item_texture' => 'INV_Pants_11', 'item_quality' => 'q3',  'item_name' => 'Knight-Captain\'s Silk Legguards' ),
                        Array( 'item_id' => '23291', 'item_texture' => 'INV_Boots_05', 'item_quality' => 'q3',  'item_name' => 'Knight-Lieutenant\'s Silk Walkers' ),
                  ),
            ),

            'pvpeh3' => Array(
            
                  'item_texture' => 'INV_BannerPVP_01',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps2',
                  'info' => Array(
                        Array( 'item_id' => '16533', 'item_texture' => 'INV_Helmet_08', 'item_quality' => 'q4', 'item_name' => 'Warlord\'s Silk Cowl' ),
                        Array( 'item_id' => '16536', 'item_texture' => 'INV_Shoulder_19', 'item_quality' => 'q4', 'item_name' => 'Warlord\'s Silk Amice' ),
                        Array( 'item_id' => '16535', 'item_texture' => 'INV_Chest_Leather_01', 'item_quality' => 'q4', 'item_name' => 'Warlord\'s Silk Raiment' ),
                        Array( 'item_id' => '16540', 'item_texture' => 'INV_Gauntlets_19', 'item_quality' => 'q4', 'item_name' => 'General\'s Silk Handguards' ),
                        Array( 'item_id' => '16534', 'item_texture' => 'INV_Pants_07', 'item_quality' => 'q4', 'item_name' => 'General\'s Silk Trousers' ),
                        Array( 'item_id' => '16539', 'item_texture' => 'INV_Boots_05', 'item_quality' => 'q4', 'item_name' => 'General\'s Silk Boots' ),
                  ),
            ),

            'pvprh3' => Array(
            
                  'item_texture' => 'INV_BannerPVP_02',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps2',
                  'info' => Array(
                        Array( 'item_id' => '23263', 'item_texture' => 'INV_Helmet_06', 'item_quality' => 'q3',  'item_name' => 'Champion\'s Silk Cowl' ),
                        Array( 'item_id' => '23264', 'item_texture' => 'INV_Shoulder_02', 'item_quality' => 'q3',  'item_name' => 'Champion\'s Silk Mantle' ),
                        Array( 'item_id' => '22886', 'item_texture' => 'INV_Chest_Cloth_28', 'item_quality' => 'q3',  'item_name' => 'Legionnaire\'s Silk Tunic' ),
                        Array( 'item_id' => '22870', 'item_texture' => 'INV_Gauntlets_06', 'item_quality' => 'q3',  'item_name' => 'Blood Guard\'s Silk Handwraps' ),
                        Array( 'item_id' => '22883', 'item_texture' => 'INV_Pants_11', 'item_quality' => 'q3',  'item_name' => 'Legionnaire\'s Silk Legguards' ),
                        Array( 'item_id' => '22860', 'item_texture' => 'INV_Boots_05', 'item_quality' => 'q3',  'item_name' => 'Blood Guard\'s Silk Walkers' ),
                  ),
            ),
      ),

      'PVPPriest' => Array(

            'pvpea4' => Array(
            
                  'item_texture' => 'INV_BannerPVP_02',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps1',
                  'info' => Array(
                        Array( 'item_id' => '17602', 'item_texture' => 'INV_Helmet_24', 'item_quality' => 'q4', 'item_name' => 'Field Marshal\'s Headdress' ),
                        Array( 'item_id' => '17604', 'item_texture' => 'INV_Shoulder_02', 'item_quality' => 'q4', 'item_name' => 'Field Marshal\'s Satin Mantle' ),
                        Array( 'item_id' => '17605', 'item_texture' => 'INV_Chest_Cloth_02', 'item_quality' => 'q4', 'item_name' => 'Field Marshal\'s Satin Vestments' ),
                        Array( 'item_id' => '17608', 'item_texture' => 'INV_Gauntlets_14', 'item_quality' => 'q4', 'item_name' => 'Marshal\'s Satin Gloves' ),
                        Array( 'item_id' => '17603', 'item_texture' => 'INV_Pants_06', 'item_quality' => 'q4', 'item_name' => 'Marshal\'s Satin Pants' ),
                        Array( 'item_id' => '17607', 'item_texture' => 'INV_Boots_07', 'item_quality' => 'q4', 'item_name' => 'Marshal\'s Satin Sandals' ),
                  ),
            ),

            'pvpra4' => Array(
            
                  'item_texture' => 'INV_BannerPVP_02',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps2',
                  'info' => Array(
                        Array( 'item_id' => '23316', 'item_texture' => 'INV_Helmet_17', 'item_quality' => 'q3',  'item_name' => 'Lieutenant Commander\'s Satin Hood' ),
                        Array( 'item_id' => '23317', 'item_texture' => 'INV_Shoulder_01', 'item_quality' => 'q3',  'item_name' => 'Lieutenant Commander\'s Satin Mantle' ),
                        Array( 'item_id' => '23303', 'item_texture' => 'INV_Chest_Leather_01', 'item_quality' => 'q3',  'item_name' => 'Knight-Captain\'s Satin Tunic' ),
                        Array( 'item_id' => '23288', 'item_texture' => 'INV_Gauntlets_17', 'item_quality' => 'q3',  'item_name' => 'Knight-Lieutenant\'s Satin Handwraps' ),
                        Array( 'item_id' => '23302', 'item_texture' => 'INV_Pants_11', 'item_quality' => 'q3',  'item_name' => 'Knight-Captain\'s Satin Legguards' ),
                        Array( 'item_id' => '23289', 'item_texture' => 'INV_Boots_05', 'item_quality' => 'q3',  'item_name' => 'Knight-Lieutenant\'s Satin Walkers' ),
                  ),
            ),

            'pvpeh4' => Array(
            
                  'item_texture' => 'INV_BannerPVP_01',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps1',
                  'info' => Array(
                        Array( 'item_id' => '17623', 'item_texture' => 'INV_Helmet_08', 'item_quality' => 'q4', 'item_name' => 'Warlord\'s Satin Cowl' ),
                        Array( 'item_id' => '17622', 'item_texture' => 'INV_Shoulder_19', 'item_quality' => 'q4', 'item_name' => 'Warlord\'s Satin Mantle' ),
                        Array( 'item_id' => '17624', 'item_texture' => 'INV_Chest_Leather_01', 'item_quality' => 'q4', 'item_name' => 'Warlord\'s Satin Robes' ),
                        Array( 'item_id' => '17620', 'item_texture' => 'INV_Gauntlets_27', 'item_quality' => 'q4', 'item_name' => 'General\'s Satin Gloves' ),
                        Array( 'item_id' => '17625', 'item_texture' => 'INV_Pants_07', 'item_quality' => 'q4', 'item_name' => 'General\'s Satin Leggings' ),
                        Array( 'item_id' => '17618', 'item_texture' => 'INV_Boots_05', 'item_quality' => 'q4', 'item_name' => 'General\'s Satin Boots' ),
                  ),
            ),

            'pvprh4' => Array(
            
                  'item_texture' => 'INV_BannerPVP_01',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps2',
                  'info' => Array(
                        Array( 'item_id' => '23261', 'item_texture' => 'INV_Helmet_17', 'item_quality' => 'q3',  'item_name' => 'Champion\'s Satin Hood' ),
                        Array( 'item_id' => '23262', 'item_texture' => 'INV_Shoulder_01', 'item_quality' => 'q3',  'item_name' => 'Champion\'s Satin Mantle' ),
                        Array( 'item_id' => '22885', 'item_texture' => 'INV_Chest_Leather_01', 'item_quality' => 'q3',  'item_name' => 'Legionnaire\'s Satin Tunic' ),
                        Array( 'item_id' => '22869', 'item_texture' => 'INV_Gauntlets_17', 'item_quality' => 'q3',  'item_name' => 'Blood Guard\'s Satin Handwraps' ),
                        Array( 'item_id' => '22882', 'item_texture' => 'INV_Pants_11', 'item_quality' => 'q3',  'item_name' => 'Legionnaire\'s Satin Legguards' ),
                        Array( 'item_id' => '22859', 'item_texture' => 'INV_Boots_05', 'item_quality' => 'q3',  'item_name' => 'Blood Guard\'s Satin Walkers' ),
                  ),
            ),
      ),

      'PVPWarlock' => Array(

            'pvpea7' => Array(
            
                  'item_texture' => 'INV_BannerPVP_02',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps1',
                  'info' => Array(
                        Array( 'item_id' => '17578', 'item_texture' => 'INV_Helmet_24', 'item_quality' => 'q4', 'item_name' => 'Field Marshal\'s Coronal' ),
                        Array( 'item_id' => '17580', 'item_texture' => 'INV_Shoulder_02', 'item_quality' => 'q4', 'item_name' => 'Field Marshal\'s Dreadweave Shoulders' ),
                        Array( 'item_id' => '17581', 'item_texture' => 'INV_Chest_Cloth_09', 'item_quality' => 'q4', 'item_name' => 'Field Marshal\'s Dreadweave Robe' ),
                        Array( 'item_id' => '17584', 'item_texture' => 'INV_Gauntlets_14', 'item_quality' => 'q4', 'item_name' => 'Marshal\'s Dreadweave Gloves' ),
                        Array( 'item_id' => '17579', 'item_texture' => 'INV_Pants_Cloth_09', 'item_quality' => 'q4', 'item_name' => 'Marshal\'s Dreadweave Leggings' ),
                        Array( 'item_id' => '17583', 'item_texture' => 'INV_Boots_07', 'item_quality' => 'q4', 'item_name' => 'Marshal\'s Dreadweave Boots' ),
                  ),
            ),

            'pvpra7' => Array(
            
                  'item_texture' => 'INV_BannerPVP_02',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps2',
                  'info' => Array(
                        Array( 'item_id' => '23310', 'item_texture' => 'INV_Helmet_08', 'item_quality' => 'q3',  'item_name' => 'Lieutenant Commander\'s Dreadweave Cowl' ),
                        Array( 'item_id' => '23311', 'item_texture' => 'INV_Shoulder_01', 'item_quality' => 'q3',  'item_name' => 'Lieutenant Commander\'s Dreadweave Spaulders' ),
                        Array( 'item_id' => '23297', 'item_texture' => 'INV_Chest_Leather_01', 'item_quality' => 'q3',  'item_name' => 'Knight-Captain\'s Dreadweave Tunic' ),
                        Array( 'item_id' => '23282', 'item_texture' => 'INV_Gauntlets_19', 'item_quality' => 'q3',  'item_name' => 'Knight-Lieutenant\'s Dreadweave Handwraps' ),
                        Array( 'item_id' => '23296', 'item_texture' => 'INV_Pants_06', 'item_quality' => 'q3',  'item_name' => 'Knight-Captain\'s Dreadweave Legguards' ),
                        Array( 'item_id' => '23283', 'item_texture' => 'INV_Boots_05', 'item_quality' => 'q3',  'item_name' => 'Knight-Lieutenant\'s Dreadweave Walkers' ),
                  ),
            ),

            'pvpeh7' => Array(
            
                  'item_texture' => 'INV_BannerPVP_01',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps1',
                  'info' => Array(
                        Array( 'item_id' => '17591', 'item_texture' => 'INV_Helmet_08', 'item_quality' => 'q4', 'item_name' => 'Warlord\'s Dreadweave Hood' ),
                        Array( 'item_id' => '17590', 'item_texture' => 'INV_Shoulder_19', 'item_quality' => 'q4', 'item_name' => 'Warlord\'s Dreadweave Mantle' ),
                        Array( 'item_id' => '17592', 'item_texture' => 'INV_Chest_Leather_01', 'item_quality' => 'q4', 'item_name' => 'Warlord\'s Dreadweave Robe' ),
                        Array( 'item_id' => '17588', 'item_texture' => 'INV_Gauntlets_19', 'item_quality' => 'q4', 'item_name' => 'General\'s Dreadweave Gloves' ),
                        Array( 'item_id' => '17593', 'item_texture' => 'INV_Pants_07', 'item_quality' => 'q4', 'item_name' => 'General\'s Dreadweave Pants' ),
                        Array( 'item_id' => '17586', 'item_texture' => 'INV_Boots_05', 'item_quality' => 'q4', 'item_name' => 'General\'s Dreadweave Boots' ),
                  ),
            ),

            'pvprh7' => Array(
            
                  'item_texture' => 'INV_BannerPVP_01',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps2',
                  'info' => Array(
                        Array( 'item_id' => '23255', 'item_texture' => 'INV_Helmet_08', 'item_quality' => 'q3',  'item_name' => 'Champion\'s Dreadweave Cowl' ),
                        Array( 'item_id' => '23256', 'item_texture' => 'INV_Shoulder_01', 'item_quality' => 'q3',  'item_name' => 'Champion\'s Dreadweave Spaulders' ),
                        Array( 'item_id' => '22884', 'item_texture' => 'INV_Chest_Leather_01', 'item_quality' => 'q3',  'item_name' => 'Legionnaire\'s Dreadweave Tunic' ),
                        Array( 'item_id' => '22865', 'item_texture' => 'INV_Gauntlets_19', 'item_quality' => 'q3',  'item_name' => 'Blood Guard\'s Dreadweave Handwraps' ),
                        Array( 'item_id' => '22881', 'item_texture' => 'INV_Pants_06', 'item_quality' => 'q3',  'item_name' => 'Legionnaire\'s Dreadweave Legguards' ),
                        Array( 'item_id' => '22855', 'item_texture' => 'INV_Boots_05', 'item_quality' => 'q3',  'item_name' => 'Blood Guard\'s Dreadweave Walkers' ),
                  ),
            ),
      ),

      'PVPRogue' => Array(

            'pvpea5' => Array(
            
                  'item_texture' => 'INV_BannerPVP_02',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps2',
                  'info' => Array(
                        Array( 'item_id' => '16455', 'item_texture' => 'INV_Helmet_41', 'item_quality' => 'q4', 'item_name' => 'Field Marshal\'s Leather Mask' ),
                        Array( 'item_id' => '16457', 'item_texture' => 'INV_Shoulder_23', 'item_quality' => 'q4', 'item_name' => 'Field Marshal\'s Leather Epaulets' ),
                        Array( 'item_id' => '16453', 'item_texture' => 'INV_Chest_Cloth_07', 'item_quality' => 'q4', 'item_name' => 'Field Marshal\'s Leather Chestpiece' ),
                        Array( 'item_id' => '16454', 'item_texture' => 'INV_Gauntlets_21', 'item_quality' => 'q4', 'item_name' => 'Marshal\'s Leather Handgrips' ),
                        Array( 'item_id' => '16456', 'item_texture' => 'INV_Pants_06', 'item_quality' => 'q4', 'item_name' => 'Marshal\'s Leather Leggings' ),
                        Array( 'item_id' => '16446', 'item_texture' => 'INV_Boots_08', 'item_quality' => 'q4', 'item_name' => 'Marshal\'s Leather Footguards' ),
                  ),
            ),

            'pvpra5' => Array(
            
                  'item_texture' => 'INV_BannerPVP_02',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps2',
                  'info' => Array(
                        Array( 'item_id' => '23312', 'item_texture' => 'INV_Helmet_09', 'item_quality' => 'q3',  'item_name' => 'Lieutenant Commander\'s Leather Helm' ),
                        Array( 'item_id' => '23313', 'item_texture' => 'INV_Shoulder_14', 'item_quality' => 'q3',  'item_name' => 'Lieutenant Commander\'s Leather Shoulders' ),
                        Array( 'item_id' => '23298', 'item_texture' => 'INV_Chest_Leather_05', 'item_quality' => 'q3',  'item_name' => 'Knight-Captain\'s Leather Chestpiece' ),
                        Array( 'item_id' => '23284', 'item_texture' => 'INV_Gauntlets_15', 'item_quality' => 'q3',  'item_name' => 'Knight-Lieutenant\'s Leather Grips' ),
                        Array( 'item_id' => '23299', 'item_texture' => 'INV_Pants_08', 'item_quality' => 'q3',  'item_name' => 'Knight-Captain\'s Leather Legguards' ),
                        Array( 'item_id' => '23285', 'item_texture' => 'INV_Boots_05', 'item_quality' => 'q3',  'item_name' => 'Knight-Lieutenant\'s Leather Walkers' ),
                  ),
            ),

            'pvpeh5' => Array(
            
                  'item_texture' => 'INV_BannerPVP_01',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps1',
                  'info' => Array(
                        Array( 'item_id' => '16561', 'item_texture' => 'INV_Helmet_09', 'item_quality' => 'q4', 'item_name' => 'Warlord\'s Leather Helm' ),
                        Array( 'item_id' => '16562', 'item_texture' => 'INV_Shoulder_07', 'item_quality' => 'q4', 'item_name' => 'Warlord\'s Leather Spaulders' ),
                        Array( 'item_id' => '16563', 'item_texture' => 'INV_Chest_Chain_16', 'item_quality' => 'q4', 'item_name' => 'Warlord\'s Leather Breastplate' ),
                        Array( 'item_id' => '16560', 'item_texture' => 'INV_Gauntlets_25', 'item_quality' => 'q4', 'item_name' => 'General\'s Leather Mitts' ),
                        Array( 'item_id' => '16564', 'item_texture' => 'INV_Pants_06', 'item_quality' => 'q4', 'item_name' => 'General\'s Leather Legguards' ),
                        Array( 'item_id' => '16558', 'item_texture' => 'INV_Boots_08', 'item_quality' => 'q4', 'item_name' => 'General\'s Leather Treads' ),
                  ),
            ),

            'pvprh5' => Array(
            
                  'item_texture' => 'INV_BannerPVP_01',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps2',
                  'info' => Array(
                        Array( 'item_id' => '23257', 'item_texture' => 'INV_Helmet_09', 'item_quality' => 'q3',  'item_name' => 'Champion\'s Leather Helm' ),
                        Array( 'item_id' => '23258', 'item_texture' => 'INV_Shoulder_14', 'item_quality' => 'q3',  'item_name' => 'Champion\'s Leather Shoulders' ),
                        Array( 'item_id' => '22879', 'item_texture' => 'INV_Chest_Leather_05', 'item_quality' => 'q3',  'item_name' => 'Legionnaire\'s Leather Chestpiece' ),
                        Array( 'item_id' => '22864', 'item_texture' => 'INV_Gauntlets_15', 'item_quality' => 'q3',  'item_name' => 'Blood Guard\'s Leather Grips' ),
                        Array( 'item_id' => '22880', 'item_texture' => 'INV_Pants_08', 'item_quality' => 'q3',  'item_name' => 'Legionnaire\'s Leather Legguards' ),
                        Array( 'item_id' => '22856', 'item_texture' => 'INV_Boots_05', 'item_quality' => 'q3',  'item_name' => 'Blood Guard\'s Leather Walkers' ),
                  ),
            ),
      ),

      'PVPDruid' => Array(

            'pvpea1' => Array(
            
                  'item_texture' => 'INV_BannerPVP_02',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps1',
                  'info' => Array(
                        Array( 'item_id' => '16451', 'item_texture' => 'INV_Helmet_41', 'item_quality' => 'q4', 'item_name' => 'Field Marshal\'s Dragonhide Helmet' ),
                        Array( 'item_id' => '16449', 'item_texture' => 'INV_Shoulder_23', 'item_quality' => 'q4', 'item_name' => 'Field Marshal\'s Dragonhide Spaulders' ),
                        Array( 'item_id' => '16452', 'item_texture' => 'INV_Chest_Cloth_07', 'item_quality' => 'q4', 'item_name' => 'Field Marshal\'s Dragonhide Breastplate' ),
                        Array( 'item_id' => '16448', 'item_texture' => 'INV_Gauntlets_21', 'item_quality' => 'q4', 'item_name' => 'Marshal\'s Dragonhide Gauntlets' ),
                        Array( 'item_id' => '16450', 'item_texture' => 'INV_Pants_06', 'item_quality' => 'q4', 'item_name' => 'Marshal\'s Dragonhide Legguards' ),
                        Array( 'item_id' => '16459', 'item_texture' => 'INV_Boots_08', 'item_quality' => 'q4', 'item_name' => 'Marshal\'s Dragonhide Boots' ),
                  ),
            ),

            'pvpra1' => Array(
            
                  'item_texture' => 'INV_BannerPVP_02',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps2',
                  'info' => Array(
                        Array( 'item_id' => '23308', 'item_texture' => 'INV_Helmet_09', 'item_quality' => 'q3',  'item_name' => 'Lieutenant Commander\'s Dragonhide Headguard' ),
                        Array( 'item_id' => '23309', 'item_texture' => 'INV_Shoulder_07', 'item_quality' => 'q3',  'item_name' => 'Lieutenant Commander\'s Dragonhide Shoulders' ),
                        Array( 'item_id' => '23294', 'item_texture' => 'INV_Chest_Leather_07', 'item_quality' => 'q3',  'item_name' => 'Knight-Captain\'s Dragonhide Chestpiece' ),
                        Array( 'item_id' => '23280', 'item_texture' => 'INV_Gauntlets_25', 'item_quality' => 'q3',  'item_name' => 'Knight-Lieutenant\'s Dragonhide Grips' ),
                        Array( 'item_id' => '23295', 'item_texture' => 'INV_Pants_06', 'item_quality' => 'q3',  'item_name' => 'Knight-Captain\'s Dragonhide Leggings' ),
                        Array( 'item_id' => '23281', 'item_texture' => 'INV_Boots_08', 'item_quality' => 'q3',  'item_name' => 'Knight-Lieutenant\'s Dragonhide Treads' ),
                  ),
            ),

            'pvpeh1' => Array(
            
                  'item_texture' => 'INV_BannerPVP_01',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps1',
                  'info' => Array(
                        Array( 'item_id' => '16550', 'item_texture' => 'INV_Helmet_09', 'item_quality' => 'q4', 'item_name' => 'Warlord\'s Dragonhide Helmet' ),
                        Array( 'item_id' => '16551', 'item_texture' => 'INV_Shoulder_07', 'item_quality' => 'q4', 'item_name' => 'Warlord\'s Dragonhide Epaulets' ),
                        Array( 'item_id' => '16549', 'item_texture' => 'INV_Chest_Chain_16', 'item_quality' => 'q4', 'item_name' => 'Warlord\'s Dragonhide Hauberk' ),
                        Array( 'item_id' => '16555', 'item_texture' => 'INV_Gauntlets_25', 'item_quality' => 'q4', 'item_name' => 'General\'s Dragonhide Gloves' ),
                        Array( 'item_id' => '16552', 'item_texture' => 'INV_Pants_06', 'item_quality' => 'q4', 'item_name' => 'General\'s Dragonhide Leggings' ),
                        Array( 'item_id' => '16554', 'item_texture' => 'INV_Boots_08', 'item_quality' => 'q4', 'item_name' => 'General\'s Dragonhide Boots' ),
                  ),
            ),

            'pvprh1' => Array(
            
                  'item_texture' => 'INV_BannerPVP_01',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps2',
                  'info' => Array(
                        Array( 'item_id' => '23253', 'item_texture' => 'INV_Helmet_09', 'item_quality' => 'q3',  'item_name' => 'Champion\'s Dragonhide Headguard' ),
                        Array( 'item_id' => '23254', 'item_texture' => 'INV_Shoulder_07', 'item_quality' => 'q3',  'item_name' => 'Champion\'s Dragonhide Shoulders' ),
                        Array( 'item_id' => '22877', 'item_texture' => 'INV_Chest_Leather_07', 'item_quality' => 'q3',  'item_name' => 'Legionnaire\'s Dragonhide Chestpiece' ),
                        Array( 'item_id' => '22863', 'item_texture' => 'INV_Gauntlets_25', 'item_quality' => 'q3',  'item_name' => 'Blood Guard\'s Dragonhide Grips' ),
                        Array( 'item_id' => '22878', 'item_texture' => 'INV_Pants_06', 'item_quality' => 'q3',  'item_name' => 'Legionnaire\'s Dragonhide Leggings' ),
                        Array( 'item_id' => '22852', 'item_texture' => 'INV_Boots_08', 'item_quality' => 'q3',  'item_name' => 'Blood Guard\'s Dragonhide Treads' ),
                  ),
            ),
      ),
      'PVPShaman' => Array(

            'pvpeh6' => Array(
            
                  'item_texture' => 'INV_BannerPVP_01',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps1',
                  'info' => Array(
                        Array( 'item_id' => '16578', 'item_texture' => 'INV_Helmet_09', 'item_quality' => 'q4', 'item_name' => 'Warlord\'s Mail Helm' ),
                        Array( 'item_id' => '16580', 'item_texture' => 'INV_Shoulder_29', 'item_quality' => 'q4', 'item_name' => 'Warlord\'s Mail Spaulders' ),
                        Array( 'item_id' => '16577', 'item_texture' => 'INV_Chest_Chain_11', 'item_quality' => 'q4', 'item_name' => 'Warlord\'s Mail Armor' ),
                        Array( 'item_id' => '16574', 'item_texture' => 'INV_Gauntlets_11', 'item_quality' => 'q4', 'item_name' => 'General\'s Mail Gauntlets' ),
                        Array( 'item_id' => '16579', 'item_texture' => 'INV_Pants_Mail_15', 'item_quality' => 'q4', 'item_name' => 'General\'s Mail Leggings' ),
                        Array( 'item_id' => '16573', 'item_texture' => 'INV_Boots_Plate_06', 'item_quality' => 'q4', 'item_name' => 'General\'s Mail Boots' ),
                  ),
            ),

            'pvprh6' => Array(
            
                  'item_texture' => 'INV_BannerPVP_01',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps2',
                  'info' => Array(
                        Array( 'item_id' => '23259', 'item_texture' => 'INV_Helmet_09', 'item_quality' => 'q3',  'item_name' => 'Champion\'s Mail Headguard' ),
                        Array( 'item_id' => '23260', 'item_texture' => 'INV_Shoulder_04', 'item_quality' => 'q3',  'item_name' => 'Champion\'s Mail Pauldrons' ),
                        Array( 'item_id' => '22876', 'item_texture' => 'INV_Chest_Chain_16', 'item_quality' => 'q3',  'item_name' => 'Legionnaire\'s Mail Hauberk' ),
                        Array( 'item_id' => '22867', 'item_texture' => 'INV_Gauntlets_11', 'item_quality' => 'q3',  'item_name' => 'Blood Guard\'s Mail Vices' ),
                        Array( 'item_id' => '22887', 'item_texture' => 'INV_Pants_09', 'item_quality' => 'q3',  'item_name' => 'Legionnaire\'s Mail Legguards' ),
                        Array( 'item_id' => '22857', 'item_texture' => 'INV_Boots_07', 'item_quality' => 'q3',  'item_name' => 'Blood Guard\'s Mail Greaves' ),
                  ),
            ),
      ),

      'PVPWarrior' => Array(

            'pvpea8' => Array(
            
                  'item_texture' => 'INV_BannerPVP_02',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps1',
                  'info' => Array(
                        Array( 'item_id' => '16478', 'item_texture' => 'INV_Helmet_05', 'item_quality' => 'q4', 'item_name' => 'Field Marshal\'s Plate Helm' ),
                        Array( 'item_id' => '16480', 'item_texture' => 'INV_Shoulder_20', 'item_quality' => 'q4', 'item_name' => 'Field Marshal\'s Plate Shoulderguards' ),
                        Array( 'item_id' => '16477', 'item_texture' => 'INV_Chest_Plate03', 'item_quality' => 'q4', 'item_name' => 'Field Marshal\'s Plate Armor' ),
                        Array( 'item_id' => '16484', 'item_texture' => 'INV_Gauntlets_29', 'item_quality' => 'q4', 'item_name' => 'Marshal\'s Plate Gauntlets' ),
                        Array( 'item_id' => '16479', 'item_texture' => 'INV_Pants_04', 'item_quality' => 'q4', 'item_name' => 'Marshal\'s Plate Legguards' ),
                        Array( 'item_id' => '16483', 'item_texture' => 'INV_Boots_Plate_09', 'item_quality' => 'q4', 'item_name' => 'Marshal\'s Plate Boots' ),
                  ),
            ),

            'pvpra8' => Array(
            
                  'item_texture' => 'INV_BannerPVP_02',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps2',
                  'info' => Array(
                        Array( 'item_id' => '23314', 'item_texture' => 'INV_Helmet_09', 'item_quality' => 'q3',  'item_name' => 'Lieutenant Commander\'s Plate Helm' ),
                        Array( 'item_id' => '23315', 'item_texture' => 'INV_Shoulder_11', 'item_quality' => 'q3',  'item_name' => 'Lieutenant Commander\'s Plate Shoulders' ),
                        Array( 'item_id' => '23300', 'item_texture' => 'INV_Chest_Plate16', 'item_quality' => 'q3',  'item_name' => 'Knight-Captain\'s Plate Hauberk' ),
                        Array( 'item_id' => '23286', 'item_texture' => 'INV_Gauntlets_26', 'item_quality' => 'q3',  'item_name' => 'Knight-Lieutenant\'s Plate Gauntlets' ),
                        Array( 'item_id' => '23301', 'item_texture' => 'INV_Pants_06', 'item_quality' => 'q3',  'item_name' => 'Knight-Captain\'s Plate Leggings' ),
                        Array( 'item_id' => '23287', 'item_texture' => 'INV_Boots_Plate_09', 'item_quality' => 'q3',  'item_name' => 'Knight-Lieutenant\'s Plate Greaves' ),
                  ),
            ),

            'pvpeh8' => Array(
            
                  'item_texture' => 'INV_BannerPVP_01',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps1',
                  'info' => Array(
                        Array( 'item_id' => '16542', 'item_texture' => 'INV_Helmet_09', 'item_quality' => 'q4', 'item_name' => 'Warlord\'s Plate Headpiece' ),
                        Array( 'item_id' => '16544', 'item_texture' => 'INV_Shoulder_11', 'item_quality' => 'q4', 'item_name' => 'Warlord\'s Plate Shoulders' ),
                        Array( 'item_id' => '16541', 'item_texture' => 'INV_Chest_Plate16', 'item_quality' => 'q4', 'item_name' => 'Warlord\'s Plate Armor' ),
                        Array( 'item_id' => '16548', 'item_texture' => 'INV_Gauntlets_10', 'item_quality' => 'q4', 'item_name' => 'General\'s Plate Gauntlets' ),
                        Array( 'item_id' => '16543', 'item_texture' => 'INV_Pants_04', 'item_quality' => 'q4', 'item_name' => 'General\'s Plate Leggings' ),
                        Array( 'item_id' => '16545', 'item_texture' => 'INV_Boots_Plate_04', 'item_quality' => 'q4', 'item_name' => 'General\'s Plate Boots' ),
                  ),
            ),

            'pvprh8' => Array(
            
                  'item_texture' => 'INV_BannerPVP_01',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps2',
                  'info' => Array(
                        Array( 'item_id' => '23244', 'item_texture' => 'INV_Helmet_09', 'item_quality' => 'q3',  'item_name' => 'Champion\'s Plate Helm' ),
                        Array( 'item_id' => '23243', 'item_texture' => 'INV_Shoulder_11', 'item_quality' => 'q3',  'item_name' => 'Champion\'s Plate Shoulders' ),
                        Array( 'item_id' => '22872', 'item_texture' => 'INV_Chest_Plate16', 'item_quality' => 'q3',  'item_name' => 'Legionnaire\'s Plate Hauberk' ),
                        Array( 'item_id' => '22868', 'item_texture' => 'INV_Gauntlets_26', 'item_quality' => 'q3',  'item_name' => 'Blood Guard\'s Plate Gauntlets' ),
                        Array( 'item_id' => '22873', 'item_texture' => 'INV_Pants_06', 'item_quality' => 'q3',  'item_name' => 'Legionnaire\'s Plate Leggings' ),
                        Array( 'item_id' => '22858', 'item_texture' => 'INV_Boots_Plate_09', 'item_quality' => 'q3',  'item_name' => 'Blood Guard\'s Plate Greaves' ),
                  ),
            ),
      ),

      'PVPPaladin' => Array(

            'pvpea4' => Array(
            
                  'item_texture' => 'INV_BannerPVP_02',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps1',
                  'info' => Array(
                        Array( 'item_id' => '16474', 'item_texture' => 'INV_Helmet_05', 'item_quality' => 'q4', 'item_name' => 'Field Marshal\'s Lamellar Faceguard' ),
                        Array( 'item_id' => '16476', 'item_texture' => 'INV_Shoulder_20', 'item_quality' => 'q4', 'item_name' => 'Field Marshal\'s Lamellar Pauldrons' ),
                        Array( 'item_id' => '16473', 'item_texture' => 'INV_Chest_Plate03', 'item_quality' => 'q4', 'item_name' => 'Field Marshal\'s Lamellar Chestplate' ),
                        Array( 'item_id' => '16471', 'item_texture' => 'INV_Gauntlets_29', 'item_quality' => 'q4', 'item_name' => 'Marshal\'s Lamellar Gloves' ),
                        Array( 'item_id' => '16475', 'item_texture' => 'INV_Pants_04', 'item_quality' => 'q4', 'item_name' => 'Marshal\'s Lamellar Legplates' ),
                        Array( 'item_id' => '16472', 'item_texture' => 'INV_Boots_Plate_09', 'item_quality' => 'q4', 'item_name' => 'Marshal\'s Lamellar Boots' ),
                  ),
            ),

            'pvpra4' => Array(
            
                  'item_texture' => 'INV_BannerPVP_02',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps2',
                  'info' => Array(
                        Array( 'item_id' => '23276', 'item_texture' => 'INV_Helmet_05', 'item_quality' => 'q3',  'item_name' => 'Lieutenant Commander\'s Lamellar Headguard' ),
                        Array( 'item_id' => '23277', 'item_texture' => 'INV_Shoulder_28', 'item_quality' => 'q3',  'item_name' => 'Lieutenant Commander\'s Lamellar Shoulders' ),
                        Array( 'item_id' => '23272', 'item_texture' => 'INV_Chest_Plate03', 'item_quality' => 'q3',  'item_name' => 'Knight-Captain\'s Lamellar Breastplate' ),
                        Array( 'item_id' => '23274', 'item_texture' => 'INV_Gauntlets_29', 'item_quality' => 'q3',  'item_name' => 'Knight-Lieutenant\'s Lamellar Gauntlets' ),
                        Array( 'item_id' => '23273', 'item_texture' => 'INV_Pants_06', 'item_quality' => 'q3',  'item_name' => 'Knight-Captain\'s Lamellar Leggings' ),
                        Array( 'item_id' => '23275', 'item_texture' => 'INV_Boots_Plate_03', 'item_quality' => 'q3',  'item_name' => 'Knight-Lieutenant\'s Lamellar Sabatons' ),
                  ),
            ),
      ),
      );
      
      var $upgrade = array(
      'U' => Array(
      ),
      'I' => Array(
      'PVPHunter222' => Array(

            'pvpea2' => Array(
            
                  'item_texture' => 'INV_BannerPVP_02',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps1',
                  'info' => Array(
                        Array( 'item_id' => '16465', 'item_texture' => 'INV_Helmet_05', 'item_quality' => 'q4', 'item_name' => 'Field Marshal\'s Chain Helm' ),
                        Array( 'item_id' => '16468', 'item_texture' => 'INV_Shoulder_10', 'item_quality' => 'q4', 'item_name' => 'Field Marshal\'s Chain Spaulders' ),
                        Array( 'item_id' => '16466', 'item_texture' => 'INV_Chest_Chain_03', 'item_quality' => 'q4', 'item_name' => 'Field Marshal\'s Chain Breastplate' ),
                        Array( 'item_id' => '16463', 'item_texture' => 'INV_Gauntlets_10', 'item_quality' => 'q4', 'item_name' => 'Marshal\'s Chain Grips' ),
                        Array( 'item_id' => '16467', 'item_texture' => 'INV_Pants_Mail_17', 'item_quality' => 'q4', 'item_name' => 'Marshal\'s Chain Legguards' ),
                        Array( 'item_id' => '16462', 'item_texture' => 'INV_Boots_Plate_07', 'item_quality' => 'q4', 'item_name' => 'Marshal\'s Chain Boots' ),
                  ),
            ),

            'pvpra2' => Array(
            
                  'item_texture' => 'INV_BannerPVP_02',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps2',
                  'info' => Array(
                        Array( 'item_id' => '23306', 'item_texture' => 'INV_Helmet_21', 'item_quality' => 'q3',  'item_name' => 'Lieutenant Commander\'s Chain Helm' ),
                        Array( 'item_id' => '23307', 'item_texture' => 'INV_Shoulder_16', 'item_quality' => 'q3',  'item_name' => 'Lieutenant Commander\'s Chain Shoulders' ),
                        Array( 'item_id' => '23292', 'item_texture' => 'INV_Chest_Chain_04', 'item_quality' => 'q3',  'item_name' => 'Knight-Captain\'s Chain Hauberk' ),
                        Array( 'item_id' => '23279', 'item_texture' => 'INV_Gauntlets_17', 'item_quality' => 'q3',  'item_name' => 'Knight-Lieutenant\'s Chain Vices' ),
                        Array( 'item_id' => '23293', 'item_texture' => 'INV_Pants_03', 'item_quality' => 'q3',  'item_name' => 'Knight-Captain\'s Chain Legguards' ),
                        Array( 'item_id' => '23278', 'item_texture' => 'INV_Boots_05', 'item_quality' => 'q3',  'item_name' => 'Knight-Lieutenant\'s Chain Greaves' ),
                  ),
            ),

            'pvpeh2' => Array(
            
                  'item_texture' => 'INV_BannerPVP_01',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps1',
                  'info' => Array(
                        Array( 'item_id' => '16566', 'item_texture' => 'INV_Helmet_09', 'item_quality' => 'q4', 'item_name' => 'Warlord\'s Chain Helmet' ),
                        Array( 'item_id' => '16568', 'item_texture' => 'INV_Shoulder_29', 'item_quality' => 'q4', 'item_name' => 'Warlord\'s Chain Shoulders' ),
                        Array( 'item_id' => '16565', 'item_texture' => 'INV_Chest_Chain_11', 'item_quality' => 'q4', 'item_name' => 'Warlord\'s Chain Chestpiece' ),
                        Array( 'item_id' => '16571', 'item_texture' => 'INV_Gauntlets_11', 'item_quality' => 'q4', 'item_name' => 'General\'s Chain Gloves' ),
                        Array( 'item_id' => '16567', 'item_texture' => 'INV_Pants_Mail_16', 'item_quality' => 'q4', 'item_name' => 'General\'s Chain Legguards' ),
                        Array( 'item_id' => '16569', 'item_texture' => 'INV_Boots_Plate_06', 'item_quality' => 'q4', 'item_name' => 'General\'s Chain Boots' ),
                  ),
            ),

            'pvprh2' => Array(
            
                  'item_texture' => 'INV_BannerPVP_01',
                  'item_quality' => 'q6',
                  'item_sub_head' => 'q5|pvps2',
                  'info' => Array(
                        Array( 'item_id' => '23251', 'item_texture' => 'INV_Helmet_03', 'item_quality' => 'q3',  'item_name' => 'Champion\'s Chain Helm' ),
                        Array( 'item_id' => '23252', 'item_texture' => 'INV_Shoulder_01', 'item_quality' => 'q3',  'item_name' => 'Champion\'s Chain Shoulders' ),
                        Array( 'item_id' => '22874', 'item_texture' => 'INV_Chest_Chain_04', 'item_quality' => 'q3',  'item_name' => 'Legionnaire\'s Chain Hauberk' ),
                        Array( 'item_id' => '22862', 'item_texture' => 'INV_Gauntlets_17', 'item_quality' => 'q3',  'item_name' => 'Blood Guard\'s Chain Vices' ),
                        Array( 'item_id' => '22875', 'item_texture' => 'INV_Pants_03', 'item_quality' => 'q3',  'item_name' => 'Legionnaire\'s Chain Legguards' ),
                        Array( 'item_id' => '22843', 'item_texture' => 'INV_Boots_05', 'item_quality' => 'q3',  'item_name' => 'Blood Guard\'s Chain Greaves' ),
                  ),
            ),
      ),
      
      ),
      
      
      
      
      ); 
}


