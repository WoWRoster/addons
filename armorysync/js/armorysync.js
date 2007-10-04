/**
 * WoWRoster.net WoWRoster
 *
 * ArmorySync javascript
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2002-2007 WoWRoster.net
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    SVN: $Id$
 * @link       http://www.wowroster.net
 * @since      File available since Release 2.6.0
*/


function toggleStatus() {
    showHide('update_details','update_details_img','img/minus.gif','img/plus.gif');
    document.linker.StatusHidden.value=(document.linker.StatusHidden.value=='OFF'?'ON':'OFF');
}

function doUpdateStatus(result) {

    if ( result.hasChildNodes() ) {
        var perc = result.getElementsByTagName('progress_perc')[0].firstChild.data;
        var perc_left = result.getElementsByTagName('progress_perc_left')[0].firstChild.data;
        var progress_text = decode(result.getElementsByTagName('progress_text')[0].firstChild.data);

        var newProgressText = document.createTextNode(progress_text);
        document.getElementById('progress_text').replaceChild(newProgressText, document.getElementById('progress_text').firstChild);


        while ( document.getElementById('progress_bar').hasChildNodes() ) {
            var firstChild = document.getElementById('progress_bar').firstChild
            document.getElementById('progress_bar').removeChild(firstChild);
        }

        if ( perc ) {
            var newTD = document.createElement("td");
            newTD.bgColor = "#660000";
            newTD.height = "12px";
            newTD.setAttribute('width', perc+'%');
            document.getElementById('progress_bar').appendChild(newTD);
        }

        if ( perc_left ) {
            var newTD = document.createElement("td");
            newTD.bgColor = "#FFF7CE";
            newTD.height = "12px";
            newTD.setAttribute('width', perc_left+'%');
            document.getElementById('progress_bar').appendChild(newTD);
        }


        var status = result.getElementsByTagName('armorysync_status')[0];
        var childCount = status.childNodes.length;
        for (var i = 0; i <= childCount-1; i++) {
            var child = status.childNodes[i];
            var childName = child.nodeName;

            //alert('Child: '+childName);
            var element;
            if ( child.childNodes[0] && child.childNodes[0].nodeName == 'image' ) {
                var url = decode(child.childNodes[0].firstChild.data);
                element = document.createElement("img");
                element.src = url;
                if ( child.childNodes[1] && child.childNodes[1].nodeName == 'overlib' ) {

                    var libChild = child.childNodes[1];
                    var libType = libChild.firstChild.nodeName;
                    var libData = '';

                    var libChildCount = libChild.childNodes.length;
                    //alert('libChildCount: '+ libChildCount);

                    for ( var j = 0; j < libChildCount; j++ ) {
                        //alert(libChild.childNodes[j].nodeName);
                        libData = libData+ libChild.childNodes[j].firstChild.data;
                    }

                    libData = decode( libData );

                    if ( libType == 'char' ) {
                        element.setAttribute('onmouseover', 'return overlib(\''+libData+'\',CAPTION,\'Update Log\',WRAP);');
                        element.setAttribute('onmouseout', 'return nd();');
                    }

                    if ( libType == 'memberlist' ) {
                        element.setAttribute('onclick', "return overlib('<div style=\"height:300px;width:500px;overflow:auto;\">"+ libData+ "</div>',CAPTION,'Update Log',STICKY, OFFSETX, 250, CLOSECLICK);");
                        element.setAttribute('onmouseover', 'return overlib(\'Click me\',CAPTION,\'Update Log\',WRAP);');
                        element.setAttribute('onmouseout', 'return nd();');
                    }
                }
            } else {
                if ( child.hasChildNodes() ) {
                    var text = decode(child.firstChild.data);
                    element = document.createTextNode(text);
                } else {
                    element = document.createTextNode('');
                }
            }
            document.getElementById(childName).replaceChild(element, document.getElementById(childName).firstChild);
        }

        if ( result.getElementsByTagName('reload')[0] ) {
            var reload = result.getElementsByTagName('reload')[0].firstChild.data || 5000;

            if ( reload ) {
                self.setTimeout('nextStep()', reload);
            }
        }
    }
}


function decode(text) {
    return decode_utf8(URLDecode(text));
}


//
// Just in case we need that someone
//
//function URLEncode(plaintext)
//{
//	// The Javascript escape and unescape functions do not correspond
//	// with what browsers actually do...
//	var SAFECHARS = "0123456789" +					// Numeric
//					"ABCDEFGHIJKLMNOPQRSTUVWXYZ" +	// Alphabetic
//					"abcdefghijklmnopqrstuvwxyz" +
//					"-_.!~*'()";					// RFC2396 Mark characters
//	var HEX = "0123456789ABCDEF";
//
//	var encoded = "";
//	for (var i = 0; i < plaintext.length; i++ ) {
//		var ch = plaintext.charAt(i);
//	    if (ch == " ") {
//		    encoded += "+";				// x-www-urlencoded, rather than %20
//		} else if (SAFECHARS.indexOf(ch) != -1) {
//		    encoded += ch;
//		} else {
//		    var charCode = ch.charCodeAt(0);
//			if (charCode > 255) {
//			    alert( "Unicode Character '"
//                        + ch
//                        + "' cannot be encoded using standard URL encoding.\n" +
//				          "(URL encoding only supports 8-bit characters.)\n" +
//						  "A space (+) will be substituted." );
//				encoded += "+";
//			} else {
//				encoded += "%";
//				encoded += HEX.charAt((charCode >> 4) & 0xF);
//				encoded += HEX.charAt(charCode & 0xF);
//			}
//		}
//	} // for
//
//	return encoded;
//};

function URLDecode(encoded)
{
   // Replace + with ' '
   // Replace %xx with equivalent character
   // Put [ERROR] in output if %xx is invalid.
   var HEXCHARS = "0123456789ABCDEFabcdef";
   var plaintext = "";
   var i = 0;
   while (i < encoded.length) {
       var ch = encoded.charAt(i);
	   if (ch == "+") {
	       plaintext += " ";
		   i++;
	   } else if (ch == "%") {
			if (i < (encoded.length-2)
					&& HEXCHARS.indexOf(encoded.charAt(i+1)) != -1
					&& HEXCHARS.indexOf(encoded.charAt(i+2)) != -1 ) {
				plaintext += unescape( encoded.substr(i,3) );
				i += 3;
			} else {
				//alert( 'Bad escape combination near ...' + encoded.substr(i) );
				plaintext += "%[ERROR]";
				i++;
			}
		} else {
		   plaintext += ch;
		   i++;
		}
	} // while
   return plaintext;
};

//
// Just in case we need that someone
//
//function encode_utf8(rohtext) {
//     // dient der Normalisierung des Zeilenumbruchs
//     rohtext = rohtext.replace(/\r\n/g,"\n");
//     var utftext = "";
//     for(var n=0; n<rohtext.length; n++)
//         {
//         // ermitteln des Unicodes des  aktuellen Zeichens
//         var c=rohtext.charCodeAt(n);
//         // alle Zeichen von 0-127 => 1byte
//         if (c<128)
//             utftext += String.fromCharCode(c);
//         // alle Zeichen von 127 bis 2047 => 2byte
//         else if((c>127) && (c<2048)) {
//             utftext += String.fromCharCode((c>>6)|192);
//             utftext += String.fromCharCode((c&63)|128);}
//         // alle Zeichen von 2048 bis 66536 => 3byte
//         else {
//             utftext += String.fromCharCode((c>>12)|224);
//             utftext += String.fromCharCode(((c>>6)&63)|128);
//             utftext += String.fromCharCode((c&63)|128);}
//         }
//     return utftext;
//}

function decode_utf8(utftext) {
     var plaintext = ""; var i=0; var c=c1=c2=0;
     // while-Schleife, weil einige Zeichen uebersprungen werden
     while(i<utftext.length)
         {
         c = utftext.charCodeAt(i);
         if (c<128) {
             plaintext += String.fromCharCode(c);
             i++;}
         else if((c>191) && (c<224)) {
             c2 = utftext.charCodeAt(i+1);
             plaintext += String.fromCharCode(((c&31)<<6) | (c2&63));
             i+=2;}
         else {
             c2 = utftext.charCodeAt(i+1); c3 = utftext.charCodeAt(i+2);
             plaintext += String.fromCharCode(((c&15)<<12) | ((c2&63)<<6) | (c3&63));
             i+=3;}
         }
     return plaintext;
}
